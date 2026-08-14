<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\Category;
use App\Models\Chambre;
use App\Models\Evenement;
use App\Models\Filiere;
use App\Models\Immobilier;
use App\Models\Photo;
use App\Models\Universite;
use App\Models\UniversitePhoto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SiteDataSeeder extends Seeder
{
    /**
     * Liste des images locales dans public/image/.
     * Ces chemins sont directement accessibles par le serveur web (pas de Storage nécessaire).
     */
    private array $publicImages = [];

    /**
     * Charge la liste des images depuis public/image/ une seule fois.
     */
    private function loadPublicImages(): void
    {
        if (!empty($this->publicImages)) {
            return;
        }

        $imageDir = public_path('image');
        $files    = glob($imageDir . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

        foreach ($files as $file) {
            // Retourne un chemin relatif à public/, ex: "image/IMG-20260811-WA0047.jpg"
            $this->publicImages[] = 'image/' . basename($file);
        }

        // Mélange aléatoire pour varier les assignations
        shuffle($this->publicImages);
    }

    /**
     * Retourne un chemin d'image aléatoire depuis public/image/.
     * Le chemin retourné est relatif au dossier public (ex: "image/IMG-20260811-WA0047.jpg").
     * Compatible avec les colonnes 'url' et 'image' des modèles.
     *
     * @param  string  $folder     (ignoré — conservé pour compatibilité de signature)
     * @param  string  $fallbackUrl (ignoré — on utilise nos images locales)
     */
    private function getImage(string $folder = '', string $fallbackUrl = ''): ?string
    {
        $this->loadPublicImages();

        if (empty($this->publicImages)) {
            return null;
        }

        return $this->publicImages[array_rand($this->publicImages)];
    }

    /**
     * Retourne N images distinctes depuis public/image/ (évite les doublons dans un même bien).
     *
     * @param  int  $count  Nombre d'images souhaitées
     * @return array<string>
     */
    private function getImages(int $count = 3): array
    {
        $this->loadPublicImages();

        if (empty($this->publicImages)) {
            return [];
        }

        $shuffled = $this->publicImages;
        shuffle($shuffled);

        return array_slice($shuffled, 0, min($count, count($shuffled)));
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

            // Photos du bien — utilise des images locales depuis public/image/
            $photoImages = $this->getImages(3);
            $isFirst = true;
            foreach ($photoImages as $imgPath) {
                Photo::create([
                    'immobilier_id' => $immobilier->id,
                    'url'           => $imgPath,
                    'principale'    => $isFirst,
                ]);
                $isFirst = false;
            }

            // Chambres du bien
            foreach ($data['chambres'] as $chambreData) {
                $chambreImg = $this->getImage();

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

        // ───────────────────────────────────────────
        // 5. Universités Partenaires & Filières
        // ───────────────────────────────────────────
        $this->command->line("\n  🎓  Création des universités partenaires...");

        $universitesData = [
            [
                'nom'         => 'Université Mohammed V de Rabat',
                'description' => 'Établissement public de référence au Maroc proposant une vaste gamme de formations d\'excellence en sciences, médecine, droit, économie et sciences humaines.',
                'ville'       => 'Rabat',
                'pays'        => 'Maroc',
                'adresse'     => 'Avenue des Nations Unies, Agdal, Rabat',
                'email'       => 'contact@um5.ac.ma',
                'telephone'   => '+212 5 37 67 34 20',
                'filieres'    => [
                    ['nom' => 'Médecine et Pharmacie', 'description' => 'Formation doctorale et spécialisée en santé publique et chirurgie.'],
                    ['nom' => 'Génie Informatique & IA', 'description' => 'Spécialisation en développement logiciel, big data et intelligence artificielle.'],
                    ['nom' => 'Sciences Économiques & Gestion', 'description' => 'Master et Licence en finance, comptabilité et management international.'],
                    ['nom' => 'Droit & Sciences Politiques', 'description' => 'Droit public, privé et études diplomatiques.'],
                ],
            ],
            [
                'nom'         => 'Université Hassan II de Casablanca',
                'description' => 'Plus grande université pluridisciplinaire du Maroc située dans la capitale économique, reconnue pour ses laboratoires de recherche avancée.',
                'ville'       => 'Casablanca',
                'pays'        => 'Maroc',
                'adresse'     => 'Route d\'El Jadida, Maarif, Casablanca',
                'email'       => 'contact@univh2c.ma',
                'telephone'   => '+212 5 22 23 06 80',
                'filieres'    => [
                    ['nom' => 'Ingénierie & Systèmes Embarqués', 'description' => 'Cursus d\'ingénieur d\'état en automatique et systèmes intelligents.'],
                    ['nom' => 'Commerce International & Logistique', 'description' => 'Management de la supply chain et stratégie commerciale globale.'],
                    ['nom' => 'Sciences Biologiques & Chimie', 'description' => 'Recherche fondamentale et appliquée aux biotechnologies.'],
                ],
            ],
            [
                'nom'         => 'Université Internationale de Rabat (UIR)',
                'description' => 'Université sous partenariat public-privé offrant un campus moderne d\'exception, un enseignement multilingue et des doubles diplômes internationaux.',
                'ville'       => 'Rabat',
                'pays'        => 'Maroc',
                'adresse'     => 'Technopolis Rabat-Salé, Rocade de Rabat',
                'email'       => 'contact@uir.ac.ma',
                'telephone'   => '+212 5 30 10 30 00',
                'filieres'    => [
                    ['nom' => 'Aéronautique & Énergies Renouvelables', 'description' => 'Formation sur les technologies vertes et ingénierie aérospatiale.'],
                    ['nom' => 'Rabat Business School', 'description' => 'École de commerce accréditée AACSB proposant des masters internationaux.'],
                    ['nom' => 'Architecture & Design Urbain', 'description' => 'Conception bioclimatique et urbanisme durable.'],
                ],
            ],
            [
                'nom'         => 'Université Cadi Ayyad de Marrakech',
                'description' => 'Centre universitaire majeur dans le sud marocain, pionnier dans l\'innovation pédagogique numérique et les sciences environnementales.',
                'ville'       => 'Marrakech',
                'pays'        => 'Maroc',
                'adresse'     => 'Boulevard Abdelkrim Al Khattabi, Marrakech',
                'email'       => 'contact@uca.ma',
                'telephone'   => '+212 5 24 43 48 13',
                'filieres'    => [
                    ['nom' => 'Tourisme, Hôtellerie & Patrimoine', 'description' => 'Management hôtelier et valorisation du patrimoine culturel.'],
                    ['nom' => 'Sciences de l\'Environnement & Eau', 'description' => 'Gestion durable des ressources en eau et agroécologie.'],
                    ['nom' => 'Mathématiques & Data Science', 'description' => 'Analyse quantitative, modélisation et intelligence artificielle.'],
                ],
            ],
        ];

        foreach ($universitesData as $uData) {
            $logoPath = $this->getImage();

            $univ = Universite::create([
                'uuid'        => (string) Str::uuid(),
                'nom'         => $uData['nom'],
                'description' => $uData['description'],
                'ville'       => $uData['ville'],
                'pays'        => $uData['pays'],
                'adresse'     => $uData['adresse'],
                'email'       => $uData['email'],
                'telephone'   => $uData['telephone'],
                'logo'        => $logoPath,
            ]);

            // Filières
            foreach ($uData['filieres'] as $fData) {
                Filiere::create([
                    'uuid'          => (string) Str::uuid(),
                    'universite_id' => $univ->id,
                    'nom'           => $fData['nom'],
                    'description'   => $fData['description'],
                ]);
            }

            // Photos de l'université
            $uPhotos = $this->getImages(3);
            foreach ($uPhotos as $uPhotoPath) {
                UniversitePhoto::create([
                    'universite_id' => $univ->id,
                    'photo'         => $uPhotoPath,
                ]);
            }

            $this->command->line("  ✅  Université : " . $univ->nom);
        }

        $this->command->info("\n  🎉  SiteDataSeeder terminé avec succès !");
        $this->command->info("  📊  " . Immobilier::count() . " biens | " . Chambre::count() . " chambres | " . Evenement::count() . " événements | " . Actualite::count() . " actualités | " . Universite::count() . " universités");
    }
}
