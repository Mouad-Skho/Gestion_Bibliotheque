-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 11:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_bibliotheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteurs`
--

CREATE TABLE `auteurs` (
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `auteur_img` text DEFAULT NULL,
  `naissance` int(4) NOT NULL,
  `decide` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auteurs`
--

INSERT INTO `auteurs` (`id_auteur`, `nom`, `bio`, `auteur_img`, `naissance`, `decide`) VALUES
(1, 'Albert Camus (1913-1960)', 'Philosophe, écrivain et dramaturge français d\'origine algérienne, Albert Camus est l\'une des figures majeures de l\'existentialisme et de l\'absurde. Lauréat du prix Nobel de littérature en 1957, il est connu pour ses œuvres emblématiques telles que L\'Étranger, La Peste et Le Mythe de Sisyphe. Ses écrits explorent la condition humaine, l\'absurde et la quête de sens.', NULL, 1913, NULL),
(2, 'Antoine de Saint-Exupéry (1900-1944)', 'Écrivain, aviateur et poète français, Antoine de Saint-Exupéry est surtout connu pour son conte philosophique Le Petit Prince, traduit dans le monde entier. Ses œuvres, comme Vol de nuit et Terre des hommes, reflètent son expérience en aviation et abordent des thèmes comme l\'humanité, l\'amitié et le courage. Il disparut tragiquement lors d\'un vol de reconnaissance pendant la Seconde Guerre mondiale.', NULL, 1900, NULL),
(3, 'George Orwell (1903-1950)', 'Écrivain, essayiste et journaliste britannique, George Orwell, de son vrai nom Eric Arthur Blair, est célèbre pour ses romans dystopiques 1984 et La Ferme des animaux. Il critiqua avec ferveur les régimes totalitaires et les injustices sociales, laissant une empreinte durable sur la littérature engagée. Son style allie simplicité et profondeur dans l\'analyse politique et sociale.', NULL, 1903, NULL),
(4, 'Victor Hugo (1802-1885)', 'Poète, dramaturge et romancier français, Victor Hugo est une figure emblématique du romantisme. Ses œuvres les plus célèbres incluent Les Misérables et Notre-Dame de Paris, qui explorent les inégalités sociales, la justice et l\'amour. Engagé politiquement, il milita pour l\'abolition de la peine de mort et la liberté d\'expression, laissant un héritage littéraire et humanitaire inégalé.', NULL, 1802, NULL),
(5, 'Napoleon Hill (1883-1970)', 'était un auteur américain, célèbre pour ses écrits sur le succès personnel et la richesse. Son livre \"Réfléchissez et devenez riche\" est l\'un des plus célèbres ouvrages de développement personnel, offrant des principes pour atteindre la réussite financière et personnelle.', NULL, 1883, NULL),
(6, 'Niccolò Machiavelli (1469-1527)', 'était un philosophe politique et écrivain italien, connu pour son ouvrage \"Le Prince\", qui analyse le pouvoir politique et propose des stratégies pour les dirigeants. Il est considéré comme l\'un des penseurs les plus influents de la politique moderne.', NULL, 1469, NULL),
(7, 'Eiichirō Oda', 'Eiichirō Oda (尾田 栄一郎, Oda Eiichirō?), né le 1er janvier 1975 à Kumamoto dans la préfecture de Kumamoto, au Japon, est un mangaka.\r\n\r\nIl est connu pour avoir écrit le manga le plus vendu au début du XXIe siècle au Japon et dans le reste du monde : One Piece, entré dans le Livre Guinness des records pour être devenu le manga au tirage le plus important du monde en décembre 2014.', '../img/Oda.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `note` decimal(2,1) DEFAULT NULL
) ;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id_avis`, `id_livre`, `id_membre`, `commentaire`, `note`) VALUES
(1, 1, 2, 'كتاب رائع ويطرح أفكارًا عميقة.', '3.0'),
(2, 2, 3, 'قصة ممتعة ولكن طويلة بعض الشيء.', '4.0'),
(3, 4, 1, 'لم يعجبني أسلوب الكتابة.', '2.0'),
(4, 3, 5, 'تحفة أدبية بكل المقاييس.', '5.0'),
(5, 5, 4, 'مخيف ولكنه يحمل رسائل قوية.', '4.0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `id_genre`, `name`, `description`) VALUES
(1, 1, 'Romantic Fiction', ''),
(2, 1, 'Detective Fiction', ''),
(3, 1, 'Historical Fiction', ''),
(4, 3, 'Space Adventures', ''),
(5, 3, 'Robotics & AI', ''),
(6, 4, 'Philosophie', ''),
(7, 4, 'Aventure', ''),
(8, 4, 'Roman', ''),
(9, 3, 'Science-Fic', ''),
(15, 6, 'Littérature classique', ''),
(16, 1, 'Fiction contemporaine', ''),
(17, 7, 'Philosophie politique', ''),
(18, 7, 'Histoire', '');

-- --------------------------------------------------------

--
-- Table structure for table `editeurs`
--

CREATE TABLE `editeurs` (
  `id_editeur` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editeurs`
--

INSERT INTO `editeurs` (`id_editeur`, `name`, `address`, `contact`, `description`) VALUES
(2, 'test', 'testt', 'teest', ''),
(3, 'Antonio Blado d\'Asola', '', '', ''),
(4, 'Gallimard', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emprunts`
--

CREATE TABLE `emprunts` (
  `id_emprunt` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emprunts`
--

INSERT INTO `emprunts` (`id_emprunt`, `id_livre`, `id_membre`, `date_emprunt`, `date_retour`) VALUES
(1, 1, 2, '2024-12-01', NULL),
(2, 3, 1, '2024-11-25', '2024-12-05'),
(3, 2, 3, '2024-11-30', NULL),
(4, 5, 4, '2024-12-03', NULL),
(5, 4, 5, '2024-11-20', '2024-12-01');

--
-- Triggers `emprunts`
--
DELIMITER $$
CREATE TRIGGER `ResetStockAfterReturn` AFTER UPDATE ON `emprunts` FOR EACH ROW BEGIN
    IF NEW.date_retour IS NOT NULL THEN
        UPDATE Livres
        SET stock = stock + 1
        WHERE id_livre = NEW.id_livre;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateStockAfterBorrow` AFTER INSERT ON `emprunts` FOR EACH ROW BEGIN
    UPDATE Livres
    SET stock = stock - 1
    WHERE id_livre = NEW.id_livre AND stock > 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id_genre` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id_genre`, `name`, `description`) VALUES
(1, 'Fiction', ''),
(2, 'Non-Fiction', ''),
(3, 'Science Fiction', ''),
(4, 'Novels', ''),
(5, 'Politique', ''),
(6, 'Dystopie', ''),
(7, ' Essai politique', '');

-- --------------------------------------------------------

--
-- Table structure for table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(11) NOT NULL,
  `ISBN` text NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `id_editeur` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `annee_publication` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `Emplacement` text DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livres`
--

INSERT INTO `livres` (`id_livre`, `ISBN`, `titre`, `description`, `id_editeur`, `id_auteur`, `id_categorie`, `annee_publication`, `stock`, `Emplacement`, `img`) VALUES
(1, '', 'La Peste', 'Publié en 1947, La Peste est un roman allégorique qui raconte l\'épidémie de peste qui frappe la ville d\'Oran, en Algérie. À travers les expériences des habitants, Camus explore des thèmes profonds comme la solidarité, la résistance face à l\'absurde et la condition humaine. Le roman est souvent interprété comme une métaphore de la lutte contre le totalitarisme et les défis de l\'existence humaine. C\'est une œuvre majeure de l\'auteur, marquée par son style clair et sa réflexion philosophique.', 2, 1, 6, 1947, 4, NULL, '..\\img\\71JTYQvrywL._SL1500_.jpg'),
(2, '', 'Le Petit Prince', 'Publié en 1943, Le Petit Prince est un conte philosophique intemporel qui mêle poésie et réflexion sur l\'humanité. L\'histoire suit un aviateur naufragé dans le désert et sa rencontre avec un jeune prince venu d\'une autre planète. À travers ses aventures, le livre explore des thèmes universels comme l\'amour, l\'amitié, la solitude et la quête de sens.', 2, 2, 7, 1943, 9, NULL, '..\\img\\9782070581054_1_75.jpg'),
(3, '', 'Les Misérables', 'Publié en 1862, Les Misérables est une œuvre monumentale qui dépeint les injustices sociales de la France du XIXe siècle. À travers des personnages emblématiques comme Jean Valjean, Javert et Cosette, Victor Hugo explore des thèmes profonds comme la rédemption, l\'amour, la lutte contre la pauvreté et l\'inégalité. Ce roman est un plaidoyer pour la justice et la compassion.', 2, 4, 8, 1862, 2, NULL, '..\\img\\9782075128063_1_75.jpg'),
(4, '', 'L’Étranger', 'Publié en 1942, L\'Étranger est l\'une des œuvres les plus célèbres d\'Albert Camus. Le roman explore l\'absurde à travers l\'histoire de Meursault, un homme indifférent au monde qui l\'entoure. Après avoir commis un meurtre apparemment insensé, il est confronté à une société qui ne comprend pas son manque d\'émotions. L\'ouvrage questionne le sens de la vie, la justice et l\'existence humaine.', 2, 1, 6, 1942, 6, NULL, '..\\img\\9782070360024_1_75.jpg'),
(5, '', '1984', 'Publié en 1949, 1984 est un roman dystopique qui décrit une société totalitaire où la liberté individuelle est anéantie. L\'histoire suit Winston Smith, un homme en quête de vérité et de liberté dans un monde dominé par \"Big Brother\". Le livre dénonce les dangers de la surveillance, de la propagande et de la manipulation des masses, offrant une critique puissante des régimes totalitaires', 2, 3, 9, 1949, 5, NULL, '..\\img\\3744438.jpg'),
(8, '52454455', 'La voie du succès', 'Ce livre classique explore les principes du succès et de l\'accomplissement personnel. Hill présente les attitudes et les habitudes qui permettent de réussir dans n\'importe quel domaine.', 2, 5, 6, 1937, 5, '', ''),
(12, '9782368860489', 'Le Prince', 'Dédié à Laurent de Médicis, Le Prince est une oeuvre nourrie par l\'expérience d\'ambassadeur de son auteur. Machiavel y définit les fins du gouvernement : sur le plan extérieur, maintenir à tout prix son emprise sur les territoires conquis ; sur le plan intérieur, se donner les moyens de rester au pouvoir. Parce que les hommes sont égoïstes, le prince n\'est pas tenu d\'être moral. Il doit être craint en évitant de se faire haïr par le peuple.', 3, 6, 17, 1532, 5, '', '../img/9782368860489_1_75.jpg'),
(13, '9782728805792', 'Discours sur notre langue', 'Le Discours sur notre langue est le premier traité linguistique du XVIe siècle italien et l\'une des oeuvres les plus personnelles de Machiavel. S\'appuyant sur le traité De vulgari eloquentia de Dante, le Vicentin G. G. Trissino (1478-1550) fait imprimer à Rome en 1524 une Épître sur les lettres nouvellement ajoutées à la langue italienne, dédiée au pape Clément VII. Quand les Toscans entendent qualifier d\'italienne la langue littéraire en usage dans la péninsule, leur sang ne fait qu\'un tour. En réponse immédiate, le Discours sur notre langue est un plaidoyer patriotique en faveur des droits du parler florentin, selon la méthode de l\'époque par raisons (arguments) et autorités (citations des grands auteurs). Déformant sans scrupule l\'histoire de la littérature italienne, Machiavel prétend qu\'elle naît avec Dante, Pétrarque et Boccace, déclarés Florentins, et que tous les autres écrivains d\'Italie ont dû apprendre la langue de ces « trois couronnes », tant leur propre parler était inapte à la littérature. Le Discours constitue ainsi l\'acte de naissance de la « Question de la langue », débat passionné qui mobilise ensuite pendant des années de nombreux lettrés italiens (Firenzuola, Martelli, Tolomei, Lenzoni...). Il vaut notamment par le dialogue central entre Machiavel et Dante ressuscité, coup de théâtre où l\'on reconnaît la patte du dramaturge, qui convoque l\'auteur de la Divine comédie en personne pour le soumettre à un interrogatoire serré et impitoyable sur ses choix linguistiques et stylistiques - et le désavouer.', 4, 6, 15, 1549, 5, '', '../img/9782728805792_1_75.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `n_emprunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id_membre`, `nom`, `email`, `telephone`, `adresse`, `n_emprunt`) VALUES
(1, 'Ahmed Ben Ali', 'ahmed.benali@example.com', '0612345678', 'Rue A, Casablanca', 3),
(2, 'Fatima Zahra', 'fatima.zahra@example.com', '0609876543', 'Rue B, Rabat', 0),
(3, 'Omar El Fassi', 'omar.elfassi@example.com', '0701122334', 'Rue C, Marrakech', 2),
(4, 'Sara Amrani', 'sara.amrani@example.com', '0622233445', 'Rue D, Fès', 0),
(5, 'Youssef Bouzid', 'youssef.bouzid@example.com', '0633344556', 'Rue E, Agadir', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_notification` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` bigint(20) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `retards`
--

CREATE TABLE `retards` (
  `id_retard` int(11) NOT NULL,
  `id_emprunt` int(11) NOT NULL,
  `jours_retard` int(11) NOT NULL,
  `status` text NOT NULL,
  `alerte_envoyee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `editeurs`
--
ALTER TABLE `editeurs`
  ADD PRIMARY KEY (`id_editeur`);

--
-- Indexes for table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `livres_ibfk_1` (`id_auteur`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_editeur` (`id_editeur`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notification`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Indexes for table `retards`
--
ALTER TABLE `retards`
  ADD PRIMARY KEY (`id_retard`),
  ADD KEY `id_emprunt` (`id_emprunt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `editeurs`
--
ALTER TABLE `editeurs`
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emprunts`
--
ALTER TABLE `emprunts`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retards`
--
ALTER TABLE `retards`
  MODIFY `id_retard` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id_livre`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id_genre`);

--
-- Constraints for table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id_livre`),
  ADD CONSTRAINT `emprunts_ibfk_2` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`);

--
-- Constraints for table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteurs` (`id_auteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livres_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livres_ibfk_3` FOREIGN KEY (`id_editeur`) REFERENCES `editeurs` (`id_editeur`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `membres` (`id_membre`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id_livre`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`);

--
-- Constraints for table `retards`
--
ALTER TABLE `retards`
  ADD CONSTRAINT `retards_ibfk_1` FOREIGN KEY (`id_emprunt`) REFERENCES `emprunts` (`id_emprunt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
