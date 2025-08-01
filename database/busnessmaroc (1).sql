-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 juil. 2025 à 17:31
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `busnessmaroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Maison', '2025-07-22 08:30:19', '2025-07-22 08:30:19'),
(2, 'Appartement', '2025-07-22 08:30:19', '2025-07-22 08:30:19'),
(3, 'Immeuble', '2025-07-22 08:30:19', '2025-07-22 08:30:19'),
(4, 'Chambre', '2025-07-22 08:30:19', '2025-07-22 08:30:19');

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

CREATE TABLE `chambres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `immobilier_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix_jour` double NOT NULL,
  `prix_mois` double NOT NULL,
  `prix_annee` double NOT NULL,
  `capacite` int(11) NOT NULL,
  `statut` enum('disponible','reservee','occupee') NOT NULL DEFAULT 'disponible',
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chambres`
--

INSERT INTO `chambres` (`id`, `immobilier_id`, `type`, `prix_jour`, `prix_mois`, `prix_annee`, `capacite`, `statut`, `description`, `image`, `created_at`, `updated_at`) VALUES
(23, 2, 'chambre_simple', 10000, 200000, 2000000, 1, 'reservee', 'Lit simple, climatisée', 'chambres/0vDDbxMn3kzfn8q0YcteLGzpg1lBqQ7lha56hbJI.jpg', '2025-07-24 12:04:56', '2025-07-29 10:31:50'),
(24, 2, 'chambre_double', 30000, 600000, 6000000, 3, 'reservee', 'Grand lit, climatisée', 'chambres/1X3RjzPSAxkd7NIhiOKUO3aC8lz7jfa2szqNrhZP.png', '2025-07-24 12:04:56', '2025-07-29 11:28:54'),
(25, 2, 'studio', 30000, 600000, 6000000, 3, 'occupee', 'Grand lit, climatisée', 'chambres/d7BTeTG5Svdc5oAM6T8hwjkWP3Fb3fq5oViseS6e.jpg', '2025-07-24 12:04:56', '2025-07-24 12:04:56'),
(46, 1, 'chambre_simple', 30000, 300000, 3000000, 2, 'disponible', 'Grand lit, climatisée', 'chambres/Df9K8Ib2eWWg1ds45Hl5wfiE8hfHJ47rS6sC8WWn.jpg', '2025-07-24 13:37:06', '2025-07-24 13:37:06'),
(47, 1, 'chambre_double', 20000, 200000, 2000000, 3, 'disponible', 'Grand lit, climatisée', 'chambres/DWGuITR16hyfyPlelWHfwQH6vh7Y5GTk4dfGXgQF.png', '2025-07-24 13:37:06', '2025-07-24 18:19:18'),
(48, 1, 'studio', 30000, 300000, 3000000, 2, 'reservee', 'Grand lit, climatisée', 'chambres/e1Qe16LK0kRuiu45hwXwECtiW8uPfdWyW5eHF8a0.png', '2025-07-24 13:37:06', '2025-07-29 11:35:08'),
(49, 1, 'suite', 40000, 400000, 4000000, 2, 'reservee', 'Grand lit, climatisée', 'chambres/eK2JhldAUA63YcHtgRLnEE11cdKJ1sHDFsfqEiSE.jpg', '2025-07-24 13:37:06', '2025-07-24 14:31:15'),
(59, 3, 'villa', 30000, 600000, 6000000, 3, 'disponible', 'Grand lit, climatisée', 'chambres/KxMbPncyQdAb8of4SZBIG7Cch2Lv6gQBaFn0B5i5.jpg', '2025-07-24 13:58:26', '2025-07-24 13:58:26'),
(60, 3, 'chambre_double', 10000, 200000, 2000000, 1, 'reservee', 'Lit simple, climatisée', 'chambres/O2MMpU5DPeI3pS75c0P4D5b1dmx8wkbpdtbRQH9f.jpg', '2025-07-24 13:58:26', '2025-07-24 13:58:26'),
(61, 3, 'studio', 40000, 400000, 4000000, 4, 'reservee', 'Lit simple, climatisée', NULL, '2025-07-24 13:58:26', '2025-07-29 11:47:54'),
(66, 4, 'chambre_simple', 10000, 100000, 100000, 1, 'disponible', 'Lit simple, climatisée', NULL, '2025-07-24 18:27:44', '2025-07-24 18:27:44'),
(67, 4, 'chambre_double', 10000, 100000, 100000, 1, 'disponible', 'Lit simple, climatisée', NULL, '2025-07-24 18:27:44', '2025-07-24 18:27:44');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `immobilier_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contrat_locations`
--

CREATE TABLE `contrat_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `immobilier_id` bigint(20) UNSIGNED NOT NULL,
  `chambre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `type_contrat` enum('jour','mois','annee') NOT NULL,
  `prix_total` decimal(15,2) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'en attente',
  `conditions_particulieres` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat_locations`
--

INSERT INTO `contrat_locations` (`id`, `user_id`, `immobilier_id`, `chambre_id`, `date_debut`, `date_fin`, `type_contrat`, `prix_total`, `statut`, `conditions_particulieres`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 23, '2025-07-29', '2025-08-10', 'jour', 120000.00, 'payee', NULL, NULL, NULL),
(2, 10, 2, 24, '2025-07-29', '2025-08-10', 'jour', 360000.00, 'payee', NULL, NULL, NULL),
(3, 10, 2, 24, '2025-07-29', '2025-08-10', 'jour', 360000.00, 'payee', NULL, NULL, NULL),
(4, 10, 2, 24, '2025-07-29', '2025-08-10', 'jour', 360000.00, 'payee', NULL, NULL, NULL),
(5, 10, 2, 24, '2025-07-29', '2025-08-10', 'jour', 360000.00, 'payee', NULL, NULL, NULL),
(6, 10, 1, 48, '2025-07-29', '2025-08-10', 'jour', 360000.00, 'payee', NULL, NULL, NULL),
(7, 10, 1, 48, '2025-07-29', '2025-08-10', 'jour', 360000.00, 'payee', NULL, NULL, NULL),
(8, 10, 1, 48, '2025-07-29', '2025-08-10', 'jour', 360000.00, 'payee', NULL, NULL, NULL),
(9, 10, 3, 61, '2025-07-29', '2025-08-29', 'mois', 800000.00, 'payee', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `immobilier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `immobiliers`
--

CREATE TABLE `immobiliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ville` varchar(255) NOT NULL,
  `quartier` varchar(255) DEFAULT NULL,
  `surface` double NOT NULL,
  `prix` double NOT NULL,
  `etage` int(11) DEFAULT NULL,
  `statut` enum('disponible','reserve','loue') NOT NULL DEFAULT 'disponible',
  `en_vedette` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `immobiliers`
--

INSERT INTO `immobiliers` (`id`, `user_id`, `category_id`, `titre`, `description`, `ville`, `quartier`, `surface`, `prix`, `etage`, `statut`, `en_vedette`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Maison moderne à louer à Mopti', 'Maison spacieuse avec jardin, salon, cuisine équipée, bien située à ACI 2000.', 'Mopti', 'ACI 2000', 265, 400000, 1, 'disponible', 0, '2025-07-22 08:43:39', '2025-07-24 13:37:06'),
(2, 1, 2, 'Maison moderne à louer à Ségou', 'Maison spacieuse avec jardin, salon, cuisine équipée, bien située à Sotuba.', 'Segou', 'Sotuba', 206, 450000, 1, 'disponible', 1, '2025-07-24 11:23:57', '2025-07-24 12:04:56'),
(3, 1, 1, 'Maison moderne à louer à Ségou', 'Maison spacieuse avec jardin, salon, cuisine équipée, bien située à Badalabougou.', 'Ségou', 'Badalabougou', 228, 500000, 1, 'loue', 0, '2025-07-24 11:29:32', '2025-07-24 13:58:26'),
(4, 1, 4, 'Maison moderne à louer à Mopti', 'Maison spacieuse avec jardin, salon, cuisine équipée, bien située à Badalabougou.', 'Mopti', 'Badalabougou', 110, 350000, NULL, 'disponible', 0, '2025-07-24 18:25:36', '2025-07-24 18:27:44');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_07_100714_create_permission_tables', 1),
(5, '2025_07_12_085816_create_categories_table', 1),
(6, '2025_07_12_085817_create_immobiliers_table', 1),
(7, '2025_07_12_085818_create_chambres_table', 1),
(8, '2025_07_12_085818_create_photos_table', 1),
(9, '2025_07_12_085819_create_favoris_table', 1),
(10, '2025_07_12_085820_create_contacts_table', 1),
(11, '2025_07_12_085820_create_vues_table', 1),
(12, '2025_07_18_130303_create_offres_table', 1),
(13, '2025_07_21_125352_create_contrat_locations_table', 1),
(14, '2025_07_24_121449_add_principale_to_photos_table', 2),
(15, '2025_07_24_125521_add_principale_to_photos_table', 3),
(16, '2025_07_28_173507_create_paiements_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `type_offre` enum('emploi','stage') NOT NULL,
  `date_publication` date NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `date_limite` date NOT NULL,
  `salaire` bigint(20) UNSIGNED DEFAULT NULL,
  `profil_recherche` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id`, `titre`, `type_offre`, `date_publication`, `entreprise`, `lieu`, `secteur`, `niveau`, `date_limite`, `salaire`, `profil_recherche`, `description`, `created_at`, `updated_at`) VALUES
(1, 'reporter-photographe', 'stage', '2025-07-24', 'Nicolas', 'Devaux, Niue', 'Télécommunication', 'BAC+2', '2025-07-30', NULL, 'Direction million couleur remettre scène brûler mourir. Oui boire neuf soudain pousser.', 'Détacher puis dominer dessus foule. Vieillard promettre fleur.\r\n Envoyez votre candidature avant le 2025-08-13.', '2025-07-24 14:42:53', '2025-07-24 14:42:53'),
(2, 'vitrailliste', 'emploi', '2025-07-24', 'Pelletier', 'FouquetVille, Inde', 'Éducation', 'BAC+5', '2025-07-30', 1000000, 'Lentement entretenir journée jamais parmi votre. Profondément fier manquer comprendre.', 'Seuil briser apporter digne. Visite théâtre terrible fonction.\r\n Envoyez votre candidature avant le 2025-07-26.', '2025-07-24 14:51:52', '2025-07-24 14:51:52'),
(3, 'clerc d\'huissier', 'stage', '2025-07-08', 'Lévêque', 'Rousseau, Ouganda', 'Informatique', 'BAC+5', '2025-07-30', NULL, 'Arme absolument voici groupe dame chaud fois. Race établir imposer aucun apparence.', 'Naissance aimer pendant objet dormir nez rapidement. Vendre cabinet port apparaître. Chaise seuil dernier fou remplir. Composer fixe dame.\r\n Envoyez votre candidature avant le 2025-07-27.', '2025-07-24 14:54:59', '2025-07-24 14:54:59'),
(4, 'rédacteur territorial territoriale', 'stage', '2025-07-24', 'Godard', 'Diallo, Lithuanie', 'Finance', 'BAC+3', '2025-07-31', NULL, 'Horizon respirer mieux ferme rencontrer quelqu\'un dernier.', 'Enfoncer accord quel pour. Humide rassurer visite chaud. Terre moyen conseil attitude poésie attitude.\r\n📩 Envoyez votre candidature avant le 2025-08-15.', '2025-07-24 14:58:25', '2025-07-24 14:58:25'),
(5, 'plombier', 'emploi', '2025-07-24', 'Masson Renaud SARL', 'Caron, Zimbabwe', 'Informatique', 'BAC+3', '2025-08-06', 754094, 'Face réveiller nombre moitié atteindre. Printemps pierre caresser demande soit tuer. Trembler saint sommeil or cinq charge.', 'Désir fauteuil mal. Tempête français adresser air ajouter.\r\n📩 Envoyez votre candidature avant le 2025-08-04.', '2025-07-24 15:01:02', '2025-07-24 15:01:02'),
(6, 'assistant en architecture', 'emploi', '2025-07-24', 'Blot S.A.', 'Sainte Lucy, Uruguay', 'Santé', 'BAC', '2025-08-31', 434129, 'Trop neuf résoudre prévenir faible contenir trop moitié. Quart port accord lentement intérieur nu.', 'Si entendre maison. Représenter désormais principe besoin français nuage art. Queue dernier léger blond autre sortir tout.📩 Envoyez votre candidature avant le 2025-08-04.', '2025-07-24 18:30:19', '2025-07-24 18:30:19');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contratlocation_id` bigint(20) UNSIGNED NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `date_paiement` date NOT NULL,
  `mode_paiement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id`, `contratlocation_id`, `montant`, `date_paiement`, `mode_paiement`, `created_at`, `updated_at`) VALUES
(1, 1, 120000.00, '2025-07-29', 'orange money', NULL, NULL),
(2, 2, 360000.00, '2025-07-29', 'orange money', NULL, NULL),
(3, 3, 360000.00, '2025-07-29', 'orange money', NULL, NULL),
(4, 4, 360000.00, '2025-07-29', 'orange money', NULL, NULL),
(5, 5, 360000.00, '2025-07-29', 'orange money', NULL, NULL),
(6, 6, 360000.00, '2025-07-29', 'orange money', NULL, NULL),
(7, 7, 360000.00, '2025-07-29', 'orange money', NULL, NULL),
(8, 8, 360000.00, '2025-07-29', 'orange money', NULL, NULL),
(9, 9, 800000.00, '2025-07-29', 'orange money', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `immobilier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `chambre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `principale` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `immobilier_id`, `chambre_id`, `url`, `created_at`, `updated_at`, `principale`) VALUES
(1, 1, NULL, 'photos/JkuqX1rhmsXATFiB65tNIvPTYrEXxmagSGUDuGll.png', '2025-07-22 08:43:39', '2025-07-24 13:37:06', 0),
(3, 3, NULL, 'photos/JkuqX1rhmsXATFiB65tNIvPTYrEXxmagSGUDuGll.png', '2025-07-24 11:29:32', '2025-07-24 13:58:26', 0),
(4, 2, NULL, 'photos/YxvhSVYA9kBnFnl8vwbq8ux53slcWsv1kw2Ctnzl.png', '2025-07-24 11:43:04', '2025-07-24 11:43:04', 0),
(5, 2, NULL, 'photos/YXWkMEyukITl7dnLHf6ppFLlsBYCMS256XWy8Axc.jpg', '2025-07-24 11:44:53', '2025-07-24 11:44:53', 0),
(6, 2, NULL, 'photos/KJI7SbYGrLdCWeIeA2aWndEpn93odfTTlTnQOMv5.png', '2025-07-24 12:04:56', '2025-07-24 12:04:56', 1),
(7, 1, NULL, 'photos/yu5KU5V9JnEZsUUdUWRkO4qLVoTv345o7JTFrIjC.png', '2025-07-24 12:05:31', '2025-07-24 13:37:06', 0),
(8, 1, NULL, 'photos/7Ywny8utoxU7qakst95iOVIJXkvHAcdlFtsoUnk3.png', '2025-07-24 13:36:58', '2025-07-24 13:37:06', 1),
(9, 3, NULL, 'photos/Gznok4ItRlexRmnM1Dd3wmrbuot4E8w3oyMZB7OI.png', '2025-07-24 13:37:52', '2025-07-24 13:58:26', 1),
(10, 4, NULL, 'photos/sMrG3l7rwt8G9iUN8B4ITIatAHD9rLxBu85diNN8.png', '2025-07-24 18:25:36', '2025-07-24 18:27:44', 0),
(11, 4, NULL, 'photos/VIu9QbxD2pgcA8xW67n2qRpaDd7WZYMPxav0T3ZX.png', '2025-07-24 18:27:27', '2025-07-24 18:27:44', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4XWgY3kALs34PcoYpW39NPIMiRBL8HfXCXeeTuYq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHh5S0ZBVmJjako5bnJIbzRKT1BiaExwaTV4V014cXhORGFQVkRVTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjEvYnVzbmVzc21hcm9jL3B1YmxpYy9sb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjEvYnVzbmVzc21hcm9jL3B1YmxpYy9yZXNlcnZhdGlvbi81OSI7fX0=', 1753801662);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `nom`, `prenom`, `telephone`, `adresse`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Siaba Noé', 'O\'Kon', 'Kyle', '+1-903-362-2689', '73333 Owen Shoal\nEmiliobury, OK 66520', 'superadmin', 'siabaneotraore@gmail.com', '2025-07-22 08:30:19', '$2y$12$hvLBaxPYanoq80wVaw.ojOxxztDJcy6QnhijFqd4YVg45TM5fO5iW', 'T2iTt8b9hIR8lkljU2PFTWBZtyw6q8ghUQtq0KTSzYucgwiuSs3vdH8qDHdp', '2025-07-22 08:30:19', '2025-07-22 08:30:19'),
(9, 'Oumar Ouologuem', 'Ouolo', 'Oumar', '92190993', 'Segou', 'client', 'ouologuem@digitafrika.io', NULL, '$2y$12$6oJruXyeaI6BwMoRAk5vv.8Q555vEY/wIK1q1v40NjAqzpHBL4Vtu', NULL, '2025-07-22 18:44:16', '2025-07-22 18:44:16'),
(10, 'Keka Baya', 'Watiesnoe', 'Keka', '78894556', 'A segou', 'client', 'kekabaya97@gmail.com', NULL, '$2y$12$xVqYowSZioYF/y4ZZ8sMdOdvioFdpnih9beo9Yk1wuNKID/8FQBJO', NULL, '2025-07-22 20:38:59', '2025-07-22 20:38:59');

-- --------------------------------------------------------

--
-- Structure de la table `vues`
--

CREATE TABLE `vues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `immobilier_id` bigint(20) UNSIGNED NOT NULL,
  `ip_visiteur` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chambres_immobilier_id_foreign` (`immobilier_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_immobilier_id_foreign` (`immobilier_id`);

--
-- Index pour la table `contrat_locations`
--
ALTER TABLE `contrat_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrat_locations_user_id_foreign` (`user_id`),
  ADD KEY `contrat_locations_immobilier_id_foreign` (`immobilier_id`),
  ADD KEY `contrat_locations_chambre_id_foreign` (`chambre_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favoris_user_id_foreign` (`user_id`),
  ADD KEY `favoris_immobilier_id_foreign` (`immobilier_id`);

--
-- Index pour la table `immobiliers`
--
ALTER TABLE `immobiliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `immobiliers_user_id_foreign` (`user_id`),
  ADD KEY `immobiliers_category_id_foreign` (`category_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiements_contratlocation_id_foreign` (`contratlocation_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_immobilier_id_foreign` (`immobilier_id`),
  ADD KEY `photos_chambre_id_foreign` (`chambre_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vues`
--
ALTER TABLE `vues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vues_immobilier_id_foreign` (`immobilier_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `chambres`
--
ALTER TABLE `chambres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contrat_locations`
--
ALTER TABLE `contrat_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `immobiliers`
--
ALTER TABLE `immobiliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `vues`
--
ALTER TABLE `vues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_immobilier_id_foreign` FOREIGN KEY (`immobilier_id`) REFERENCES `immobiliers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_immobilier_id_foreign` FOREIGN KEY (`immobilier_id`) REFERENCES `immobiliers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contrat_locations`
--
ALTER TABLE `contrat_locations`
  ADD CONSTRAINT `contrat_locations_chambre_id_foreign` FOREIGN KEY (`chambre_id`) REFERENCES `chambres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contrat_locations_immobilier_id_foreign` FOREIGN KEY (`immobilier_id`) REFERENCES `immobiliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contrat_locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_immobilier_id_foreign` FOREIGN KEY (`immobilier_id`) REFERENCES `immobiliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `immobiliers`
--
ALTER TABLE `immobiliers`
  ADD CONSTRAINT `immobiliers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `immobiliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_contratlocation_id_foreign` FOREIGN KEY (`contratlocation_id`) REFERENCES `contrat_locations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_chambre_id_foreign` FOREIGN KEY (`chambre_id`) REFERENCES `chambres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photos_immobilier_id_foreign` FOREIGN KEY (`immobilier_id`) REFERENCES `immobiliers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vues`
--
ALTER TABLE `vues`
  ADD CONSTRAINT `vues_immobilier_id_foreign` FOREIGN KEY (`immobilier_id`) REFERENCES `immobiliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
