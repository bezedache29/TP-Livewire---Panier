-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 09 mai 2021 à 13:48
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `panier`
--

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_04_29_081013_create_products_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'https://m.media-amazon.com/images/I/614CPR6NpLL._AC_UL320_SP_SAME_DOMAIN_ASSETS_257061_.jpg', 'Kaamelott : L\'intégrale des Six livres [DVD]', 'KAAMELOTT : LES SIX LIVRES\r\n\r\nL\'intégrale de la série créée par Alexandre Astier dans un coffret 21 DVD !\r\n\r\nRedécouvrez tous les épisodes de la série, les bonus et bêtisiers.', 6999, 10, NULL, NULL),
(2, 'https://m.media-amazon.com/images/I/917aEYcH2KL._AC_UL320_SP_SAME_DOMAIN_ASSETS_257061_.jpg', 'Kaamelott, Tome 1 : L\'Armée Du Nécromant', 'Ce premier album nous permet de faire connaissance avec les personnages principaux et habituels de Kaamelott de manière à les présenter aux lecteurs non initiés tout en proposant aux inconditionnels une situation inconnue jusque là.', 4313, 3, NULL, NULL),
(3, 'https://m.media-amazon.com/images/I/51tAcexuiPL._AC_UL320_SP_SAME_DOMAIN_ASSETS_257061_.jpg', 'Bavoir bébé kaamelott kadoc compote Blanc', 'Bavoir pour bébé 30 x 35cm avec fermeture velcro.\r\nImprimé à la demande le jour de votre commande.\r\n55% Polyester, 45% coton.', 1169, 5, NULL, NULL),
(4, 'https://m.media-amazon.com/images/I/21fkT18-jLL._AC_UL320_SP_SAME_DOMAIN_ASSETS_257061_.jpg', 'Kaamelott : Livre V - Coffret 4 DVD', 'Intégrale saison 5 en version Director\'s Cut :\r\n5-1. Corvus Corone (46\'04\")\r\n5-2. La roche et le fer (46\'49\")\r\n5-3. Vae Soli ! (46\'13\")\r\n5-4. Le dernier jour (57\'11\")\r\n5-5. Le royaume sans tête (55\'33\")\r\n5-6. Jizô (55\'17\")\r\n5-7. Le phare (44\'10\")\r\n5-8. Le garçon qui criait au loup (50\'20\")', 2500, 7, NULL, NULL),
(5, 'https://m.media-amazon.com/images/I/61+Jzq0dvyL._AC_UL320_SP_SAME_DOMAIN_ASSETS_257061_.jpg', 'Le management selon Kaamelott', 'Gwendal Fossois, spécialiste de la pop culture et fan de la série créée par Alexandre Astier, est notamment l\'auteur de la mythologie selon Game of Thrones et Agir et penser comme Dark Vador.', 1290, 6, NULL, NULL),
(6, 'https://m.media-amazon.com/images/I/51eAXyHjjfL._AC_UL320_SP_SAME_DOMAIN_ASSETS_257061_.jpg', 'Kaamelott : Livre IV - Coffret 3 DVD', 'Britannia, Ve siècle après Jésus-Christ. Le trouble règne au château de Kaamelott. Jamais la quête du Graal n\'avait paru si compromise.\r\nLancelot a enfin confié son lourd secret au chevalier Bohort : son amour pour la Reine Guenièvre. Apprenant la nouvelle, le Roi Arthur tente de contenir sa colère. Mais Lancelot décide de son plein gré de quitter la Table Ronde et de redevenir un chevalier errant.', 2330, 5, NULL, NULL),
(7, 'https://m.media-amazon.com/images/I/61F1qawDlwL._AC_UL320_SP_SAME_DOMAIN_ASSETS_257061_.jpg', 'La philosophie selon Kaamelott', 'Gwendal FOSSOIS, auteur spécialiste de la pop culture et fan de la série créée par Alexandre Astier, nous invite à découvrir l\'univers philosophique de Kaamelott et à porter un regard différent sur cette série désormais culte.', 1290, 4, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
