<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\Category;
use App\Models\Chambre;
use App\Models\Evenement;
use App\Models\Immobilier;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteDataSeeder extends Seeder
{
    /** Picks a random already-downloaded image from storage, copies a local premium image, or downloads a new one. */
    private function getImage(string $folder, string $fallbackUrl): ?string
    {
        // 1. Réutiliser une image déjà présente dans ce dossier (rapide, pas de réseau)
        $existing = Storage::disk('public')->files($folder);
        if (count($existing) > 0) {
            return $existing[array_rand($existing)];
        }

        // 2. Sinon, copier une de nos images premium locales des seeders (évite le réseau et garantit une belle image)
        $localImages = glob(database_path('seeders/images/*.{jpg,jpeg,png}'), GLOB_BRACE);
        if (!empty($localImages)) {
            $randomImage = $localImages[array_rand($localImages)];
            $extension = pathinfo($randomImage, PATHINFO_EXTENSION);
            $fileName = Str::random(20) . '.' . $extension;
            $storagePath = $folder . '/' . $fileName;
            Storage::disk('public')->put($storagePath, file_get_contents($randomImage));
            return $storagePath;
        }

        // 3. Sinon télécharger depuis l'URL
        return $this->downloadImage($fallbackUrl, $folder);
    }

    private function downloadImage(string $url, string $folder): ?string
    {
        try {
            $context = stream_context_create([
                'http' => ['timeout' => 15, 'ignore_errors' => true, 'header' => "User-Agent: Mozilla/5.0\r\n"],
                'ssl'  => ['verify_peer' => false, 'verify_peer_name' => false],
            ]);

            $content = @file_get_contents($url, false, $context);
            if (!$content || strlen($content) < 1000) {
                // Fallback : utiliser une image locale des seeders
                $localImages = glob(database_path('seeders/images/*.{jpg,jpeg,png}'), GLOB_BRACE);
                if (!empty($localImages)) {
                    $content = file_get_contents($localImages[array_rand($localImages)]);
                } else {
                    return null;
                }
            }

            $fileName = Str::random(20) . '.jpg';
            $path     = $folder . '/' . $fileName;
            Storage::disk('public')->put($path, $content);
            return $path;
        } catch (\Exception $e) {
            $this->command->warn("  ⚠  " . $e->getMessage());
            return null;
        }
    }

    public function run(): void
    {
        // ───────────────────────────────────────────
        // 0. Utilisateur admin de démonstration
        // ───────────────────────────────────────────
        $admin = User::firstOrCreate(
            ['email' => 'admin@businessmaroc.ma'],
            [
                'name'     => 'Admin Business Maroc',
                'password' => Hash::make('password123'),
                'role'     => 'superadmin',
            ]
        );

        // ───────────────────────────────────────────
        // 1. Catégories
        // ───────────────────────────────────────────
        $cats = ['Appartement', 'Maison', 'Immeuble', 'Chambre', 'Studio', 'Villa'];
        foreach ($cats as $nom) {
            Category::firstOrCreate(['nom' => $nom]);
        }
        $categories = Category::pluck('id', 'nom');

        // ───────────────────────────────────────────
        // 2. Biens Immobiliers avec photos
        // ───────────────────────────────────────────
        $biens = [
            [
                'titre'       => 'Appartement moderne au cœur de Casablanca',
                'description' => 'Bel appartement entièrement rénové au 3ème étage, idéalement situé à Maarif. Lumineux, calme et équipé. Proche des commerces, restaurants et transports en commun. Parfait pour une famille ou des professionnels.',
                'ville'       => 'Casablanca',
                'quartier'    => 'Maarif',
                'surface'     => 95,
                'prix'        => 8500,
                'etage'       => 3,
                'category'    => 'Appartement',
                'en_vedette'  => true,
                'images'      => ['https://picsum.photos/seed/apt1/800/600', 'https://picsum.photos/seed/apt1b/800/600', 'https://picsum.photos/seed/apt1c/800/600'],
                'chambres'    => [
                    ['type' => 'Standard', 'prix_jour' => 350, 'prix_mois' => 8500, 'prix_annee' => 90000, 'capacite' => 2],
                    ['type' => 'Confort',  'prix_jour' => 450, 'prix_mois' => 10000,'prix_annee' => 108000,'capacite' => 3],
                ],
            ],
            [
                'titre'       => 'Villa luxueuse avec piscine à Rabat',
                'description' => 'Magnifique villa de haut standing avec piscine privée, jardin paysager et vue panoramique sur l\'océan Atlantique. Matériaux nobles, finitions impeccables. Idéale pour une location saisonnière ou annuelle haut de gamme.',
                'ville'       => 'Rabat',
                'quartier'    => 'Souissi',
                'surface'     => 320,
                'prix'        => 35000,
                'etage'       => 0,
                'category'    => 'Villa',
                'en_vedette'  => true,
                'images'      => ['https://picsum.photos/seed/villa2/800/600', 'https://picsum.photos/seed/villa2b/800/600', 'https://picsum.photos/seed/villa2c/800/600'],
                'chambres'    => [
                    ['type' => 'VIP',     'prix_jour' => 1200, 'prix_mois' => 35000,'prix_annee' => 360000,'capacite' => 4],
                    ['type' => 'VIP',     'prix_jour' => 1000, 'prix_mois' => 30000,'prix_annee' => 300000,'capacite' => 3],
                    ['type' => 'Confort', 'prix_jour' => 600,  'prix_mois' => 18000,'prix_annee' => 180000,'capacite' => 2],
                ],
            ],
            [
                'titre'       => 'Maison familiale à Marrakech Palmeraie',
                'description' => 'Charmante maison traditionnelle (riad) avec patio central, fontaine et terrasse sur le toit. 4 chambres spacieuses, salon marocain authentique, salle à manger. Architecture arabo-andalouse préservée.',
                'ville'       => 'Marrakech',
                'quartier'    => 'Palmeraie',
                'surface'     => 210,
                'prix'        => 18000,
                'etage'       => 1,
                'category'    => 'Maison',
                'en_vedette'  => true,
                'images'      => ['https://picsum.photos/seed/riad3/800/600', 'https://picsum.photos/seed/riad3b/800/600', 'https://picsum.photos/seed/riad3c/800/600'],
                'chambres'    => [
                    ['type' => 'Standard', 'prix_jour' => 500, 'prix_mois' => 15000,'prix_annee' => 160000,'capacite' => 2],
                    ['type' => 'VIP',      'prix_jour' => 800, 'prix_mois' => 22000,'prix_annee' => 240000,'capacite' => 4],
                ],
            ],
            [
                'titre'       => 'Studio meublé à Agadir bord de mer',
                'description' => 'Studio tout confort avec vue mer partielle, à 200m de la plage d\'Agadir. Cuisine équipée, climatiseur, WiFi inclus. Idéal pour une personne seule ou un couple souhaitant profiter du littoral atlantique marocain.',
                'ville'       => 'Agadir',
                'quartier'    => 'Hay Mohammadi',
                'surface'     => 38,
                'prix'        => 4200,
                'etage'       => 2,
                'category'    => 'Studio',
                'en_vedette'  => false,
                'images'      => ['https://picsum.photos/seed/studio4/800/600', 'https://picsum.photos/seed/studio4b/800/600'],
                'chambres'    => [
                    ['type' => 'Standard', 'prix_jour' => 200, 'prix_mois' => 4200, 'prix_annee' => 45000,'capacite' => 2],
                ],
            ],
            [
                'titre'       => 'Appartement haut standing à Tanger Détroit',
                'description' => 'Superbe appartement panoramique avec vue imprenable sur le Détroit de Gibraltar et l\'Espagne. Grand balcon, double vitrage, parking sécurisé, gardiennage 24/7. Quartier résidentiel calme et prisé.',
                'ville'       => 'Tanger',
                'quartier'    => 'Cap Spartel',
                'surface'     => 130,
                'prix'        => 12000,
                'etage'       => 5,
                'category'    => 'Appartement',
                'en_vedette'  => true,
                'images'      => ['https://picsum.photos/seed/tanger5/800/600', 'https://picsum.photos/seed/tanger5b/800/600', 'https://picsum.photos/seed/tanger5c/800/600'],
                'chambres'    => [
                    ['type' => 'Confort', 'prix_jour' => 500, 'prix_mois' => 12000,'prix_annee' => 130000,'capacite' => 3],
                    ['type' => 'Standard','prix_jour' => 350, 'prix_mois' => 8000, 'prix_annee' => 85000, 'capacite' => 2],
                ],
            ],
            [
                'titre'       => 'Chambre meublée à Fès Médina',
                'description' => 'Chambre confortable dans une résidence sécurisée proche de l\'Université de Fès. Connexion WiFi, cuisine partagée, salon commun. Idéale pour les étudiants ou jeunes professionnels. Toutes charges comprises.',
                'ville'       => 'Fès',
                'quartier'    => 'Ville Nouvelle',
                'surface'     => 18,
                'prix'        => 1800,
                'etage'       => 1,
                'category'    => 'Chambre',
                'en_vedette'  => false,
                'images'      => ['https://picsum.photos/seed/chambre6/800/600', 'https://picsum.photos/seed/chambre6b/800/600'],
                'chambres'    => [
                    ['type' => 'Standard', 'prix_jour' => 80, 'prix_mois' => 1800,'prix_annee' => 20000,'capacite' => 1],
                ],
            ],
            [
                'titre'       => 'Immeuble de rapport au centre de Casablanca',
                'description' => 'Immeuble commercial et résidentiel R+5 avec ascenseur, 12 appartements et 4 locaux commerciaux au rez-de-chaussée. Entièrement loué, excellent rendement locatif. Acte propre, titre foncier.',
                'ville'       => 'Casablanca',
                'quartier'    => 'Bourgogne',
                'surface'     => 1200,
                'prix'        => 85000,
                'etage'       => 5,
                'category'    => 'Immeuble',
                'en_vedette'  => true,
                'images'      => ['https://picsum.photos/seed/immeuble7/800/600', 'https://picsum.photos/seed/immeuble7b/800/600'],
                'chambres'    => [
                    ['type' => 'Confort', 'prix_jour' => 800,  'prix_mois' => 20000,'prix_annee' => 220000,'capacite' => 4],
                    ['type' => 'Confort', 'prix_jour' => 700,  'prix_mois' => 18000,'prix_annee' => 190000,'capacite' => 3],
                    ['type' => 'Standard','prix_jour' => 500,  'prix_mois' => 12000,'prix_annee' => 130000,'capacite' => 2],
                ],
            ],
            [
                'titre'       => 'Maison avec jardin à Meknès',
                'description' => 'Belle maison individuelle avec jardin arboré de 400m², 3 chambres, salon, cuisine moderne et garage double. Quartier résidentiel calme et sécurisé. Proche des écoles et du centre commercial.',
                'ville'       => 'Meknès',
                'quartier'    => 'Hamria',
                'surface'     => 180,
                'prix'        => 9500,
                'etage'       => 0,
                'category'    => 'Maison',
                'en_vedette'  => false,
                'images'      => ['https://picsum.photos/seed/meknes8/800/600', 'https://picsum.photos/seed/meknes8b/800/600'],
                'chambres'    => [
                    ['type' => 'Standard', 'prix_jour' => 400, 'prix_mois' => 9500, 'prix_annee' => 100000,'capacite' => 5],
                ],
            ],
        ];

        foreach ($biens as $i => $data) {
            $this->command->line("  🏠  Création : " . $data['titre']);

            $catId = $categories[$data['category']] ?? $categories->first();

            $immobilier = Immobilier::create([
                'user_id'     => $admin->id,
                'category_id' => $catId,
                'titre'       => $data['titre'],
                'description' => $data['description'],
                'ville'       => $data['ville'],
                'quartier'    => $data['quartier'],
                'surface'     => $data['surface'],
                'prix'        => $data['prix'],
                'etage'       => $data['etage'],
                'statut'      => 'disponible',
                'en_vedette'  => $data['en_vedette'],
            ]);

            // Photos du bien — réutilise les images déjà en storage
            $isFirst = true;
            foreach ($data['images'] as $imgUrl) {
                $path = $this->getImage('photos', $imgUrl);
                if ($path) {
                    Photo::create([
                        'immobilier_id' => $immobilier->id,
                        'url'           => $path,
                        'principale'    => $isFirst,
                    ]);
                    $isFirst = false;
                }
            }

            // Chambres du bien
            foreach ($data['chambres'] as $chambreData) {
                $chambreImg = $this->getImage('chambres', 'https://picsum.photos/seed/room' . $i . rand(1,99) . '/600/400');

                Chambre::create([
                    'immobilier_id' => $immobilier->id,
                    'type'          => $chambreData['type'],
                    'prix_jour'     => $chambreData['prix_jour'],
                    'prix_mois'     => $chambreData['prix_mois'],
                    'prix_annee'    => $chambreData['prix_annee'],
                    'capacite'      => $chambreData['capacite'],
                    'statut'        => 'disponible',
                    'description'   => 'Chambre ' . $chambreData['type'] . ' confortable avec toutes les commodités. Linge de maison fourni. Idéale pour un séjour agréable.',
                    'image'         => $chambreImg,
                ]);
            }
        }

        // ───────────────────────────────────────────
        // 3. Événements
        // ───────────────────────────────────────────
        $this->command->line("\n  🎉  Création des événements...");

        $evenements = [
            [
                'titre'                => 'Salon de l\'Immobilier Marocain 2025',
                'description'          => 'Le plus grand événement immobilier du Maroc réunit promoteurs, agents, investisseurs et particuliers sous un même toit. Découvrez les dernières tendances, des offres exclusives, des conférences d\'experts et des opportunités d\'investissement uniques. Entrée gratuite pour les professionnels.',
                'lieu'                 => 'Office des Foires de Casablanca — Hall 5',
                'date_debut'           => now()->addDays(15),
                'date_fin'             => now()->addDays(18),
                'prix_ticket'          => 150,
                'nombre_limite_places' => 2000,
                'statut'               => 'à venir',
                'image_seed'           => 'event1',
            ],
            [
                'titre'                => 'Forum Emploi & Innovation Maroc 2025',
                'description'          => 'Rencontrez les meilleurs recruteurs marocains et internationaux, assistez à des ateliers CV et entretiens, participez à des conférences sur l\'entrepreneuriat et découvrez les startups marocaines les plus prometteuses de l\'année.',
                'lieu'                 => 'Centre de Conférences de Rabat',
                'date_debut'           => now()->addDays(30),
                'date_fin'             => now()->addDays(31),
                'prix_ticket'          => 0,
                'nombre_limite_places' => 1500,
                'statut'               => 'à venir',
                'image_seed'           => 'event2',
            ],
            [
                'titre'                => 'Fête de la Musique Gnawa — Marrakech',
                'description'          => 'Célébrez la richesse musicale du Maroc avec les maîtres gnawa de Marrakech et Essaouira. Soirée en plein air dans les jardins de la Menara avec des performances live, danses traditionnelles et gastronomie locale.',
                'lieu'                 => 'Jardins de la Menara, Marrakech',
                'date_debut'           => now()->addDays(45),
                'date_fin'             => now()->addDays(45),
                'prix_ticket'          => 200,
                'nombre_limite_places' => 800,
                'statut'               => 'à venir',
                'image_seed'           => 'event3',
            ],
            [
                'titre'                => 'Conférence Smart Cities Maroc',
                'description'          => 'Comment les villes marocaines deviennent-elles intelligentes ? Experts nationaux et internationaux débattent des enjeux de la mobilité, de l\'énergie, de la gestion des déchets et de la gouvernance numérique. Networking et expo startup inclus.',
                'lieu'                 => 'Technopark Casablanca — Salle Principale',
                'date_debut'           => now()->addDays(60),
                'date_fin'             => now()->addDays(60),
                'prix_ticket'          => 300,
                'nombre_limite_places' => 400,
                'statut'               => 'à venir',
                'image_seed'           => 'event4',
            ],
        ];

        foreach ($evenements as $evt) {
            $imgPath = $this->getImage(
                'evenements',
                "https://picsum.photos/seed/{$evt['image_seed']}/900/500"
            );

            Evenement::create([
                'titre'                => $evt['titre'],
                'description'          => $evt['description'],
                'lieu'                 => $evt['lieu'],
                'date_debut'           => $evt['date_debut'],
                'date_fin'             => $evt['date_fin'],
                'prix_ticket'          => $evt['prix_ticket'],
                'nombre_limite_places' => $evt['nombre_limite_places'],
                'statut'               => $evt['statut'],
                'image'                => $imgPath,
            ]);

            $this->command->line("  ✅  Événement : " . $evt['titre']);
        }

        // ───────────────────────────────────────────
        // 4. Actualités
        // ───────────────────────────────────────────
        $this->command->line("\n  📰  Création des actualités...");

        $actualites = [
            [
                'titre'            => 'Les prix de l\'immobilier au Maroc en 2025 : tendances et prévisions',
                'contenu'          => "Après une année 2024 marquée par une légère correction des prix, le marché immobilier marocain reprend de la vigueur en 2025. Les grandes villes comme Casablanca et Rabat affichent une hausse de 4 à 7 % des prix au mètre carré, portée par une demande soutenue et des taux de crédit immobilier en baisse progressive.\n\nLes experts s'attendent à ce que Tanger et Agadir, bénéficiant d'importants projets d'infrastructure, deviennent les nouveaux eldorados de l'investissement immobilier. Les primo-accédants, eux, se tournent de plus en plus vers les villes secondaires comme Meknès et Oujda où les prix restent accessibles.",
                'auteur'           => 'Youssef El Alami',
                'date_publication' => now()->subDays(5),
                'image_seed'       => 'news1',
            ],
            [
                'titre'            => 'Comment bien négocier son loyer au Maroc : guide pratique',
                'contenu'          => "La négociation du loyer est une étape cruciale souvent négligée par les locataires marocains. Voici les stratégies éprouvées pour obtenir le meilleur prix possible.\n\n**1. Faites vos recherches**\nAvant toute visite, consultez les plateformes d'annonces pour connaître les prix du marché dans le quartier ciblé. Cela vous donnera une base solide pour argumenter.\n\n**2. Soyez stratégique sur le timing**\nLes périodes de faible demande (janvier-février, juillet) sont plus propices aux négociations. Les propriétaires préfèrent baisser légèrement le loyer plutôt que de laisser le bien vacant.\n\n**3. Mettez en avant votre profil**\nUn locataire stable, avec un bon dossier financier (CDI, caution solide), est un atout. N'hésitez pas à le souligner.",
                'auteur'           => 'Fatima Zahra Berrada',
                'date_publication' => now()->subDays(12),
                'image_seed'       => 'news2',
            ],
            [
                'titre'            => '5 quartiers en plein essor à Casablanca où investir en 2025',
                'contenu'          => "Casablanca ne cesse de se transformer. Voici les 5 quartiers qui offrent les meilleures opportunités d'investissement immobilier cette année.\n\n**1. Sidi Maarouf** — Pôle technologique en expansion avec le CFC et Technopark.\n**2. Bouskoura** — Développement résidentiel majeur avec plusieurs programmes de villas.\n**3. Aïn Sebaâ** — Rénovation urbaine et proximité du port industriel.\n**4. Hay Hassani** — Quartier populaire en pleine gentrification avec de nombreuses rénovations.\n**5. Anfa Supérieur** — Valeur refuge avec des propriétés de prestige à prix encore raisonnables.",
                'auteur'           => 'Omar Benchekroun',
                'date_publication' => now()->subDays(20),
                'image_seed'       => 'news3',
            ],
            [
                'titre'            => 'Marché locatif étudiant : opportunités et défis pour les propriétaires',
                'contenu'          => "Avec plus de 1,2 million d'étudiants dans l'enseignement supérieur marocain, la demande de logements étudiants est structurellement forte. Les résidences universitaires publiques ne couvrant que 15 % des besoins, le marché privé joue un rôle essentiel.\n\nLes propriétaires qui ciblent ce segment bénéficient d'une forte rotation (garantie d'occupation annuelle), de loyers stables et d'une forte demande dans les villes universitaires comme Fès, Marrakech et Settat. En contrepartie, il faut anticiper l'usure du bien et proposer des contrats adaptés.",
                'auteur'           => 'Nadia Cherkaoui',
                'date_publication' => now()->subDays(30),
                'image_seed'       => 'news4',
            ],
            [
                'titre'            => 'Visa Résidence Maroc : ce que les étrangers doivent savoir pour louer',
                'contenu'          => "De plus en plus d'expatriés et de nomades numériques s'installent au Maroc, séduits par la qualité de vie, le coût abordable et la connectivité. Pour louer légalement, voici les démarches essentielles.\n\nLes étrangers résidant au Maroc doivent disposer d'un titre de séjour valide. Les contrats de bail doivent être enregistrés à la Conservation Foncière pour protéger les deux parties. Les dépôts de garantie sont encadrés par la loi et ne peuvent excéder deux mois de loyer.",
                'auteur'           => 'Karim Tahiri',
                'date_publication' => now()->subDays(45),
                'image_seed'       => 'news5',
            ],
        ];

        foreach ($actualites as $actu) {
            $imgPath = $this->getImage(
                'actualites',
                "https://picsum.photos/seed/{$actu['image_seed']}/800/500"
            );

            Actualite::create([
                'titre'            => $actu['titre'],
                'contenu'          => $actu['contenu'],
                'auteur'           => $actu['auteur'],
                'date_publication' => $actu['date_publication'],
                'image'            => $imgPath,
            ]);

            $this->command->line("  ✅  Actualité : " . Str::limit($actu['titre'], 55));
        }

        $this->command->info("\n  🎉  SiteDataSeeder terminé avec succès !");
        $this->command->info("  📊  " . Immobilier::count() . " biens | " . Chambre::count() . " chambres | " . Evenement::count() . " événements | " . Actualite::count() . " actualités");
    }
}
