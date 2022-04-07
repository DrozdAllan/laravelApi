-- --------------------------------------------------------
-- Hôte:                         localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6462
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table movietitlelaravue3.movies : ~0 rows (environ)
INSERT INTO `movies` (`id`, `slug`, `synopsis`, `release_date`, `en_title`, `fr_title`, `de_title`, `es_title`, `it_title`, `ja_title`, `zh_title`, `ru_title`, `created_at`, `updated_at`) VALUES
	(1, 'let-the-right-one-in', 'Oskar, an overlooked and bullied boy, finds love and revenge through Eli, a beautiful but peculiar girl.', '2008', 'Let The Right One In', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'constantine', 'Supernatural exorcist and demonologist John Constantine helps a policewoman prove her sister\'s death was not a suicide, but something more.', '2005', 'Constantine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'hostiles', 'A legendary Army Captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.', '2017', 'Hostiles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'gone-baby-gone', 'Two Boston area detectives investigate a little girl\'s kidnapping, which ultimately turns into a crisis both professionally and personally.', '2007', 'Gone Baby Gone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'the-irishman', 'Hitman Frank Sheeran looks back at the secrets he kept as a loyal member of the Bufalino crime family.', '2019', 'The Irishman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 'inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', '2010', 'Inception', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'interstellar', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', '2014', 'Interstellar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'tenet', 'Armed with only one word, Tenet, and fighting for the survival of the entire world, a Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.', '2020', 'Tenet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'the-revenant', 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.', '2015', 'The Revenant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 'bone-tomahawk', 'In the dying days of the old west, an elderly sheriff and his posse set out to rescue their town\'s doctor from cannibalistic cave dwellers.', '2015', 'Bone Tomahawk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 'parasite', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', '2019', 'Parasite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 'titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', '1997', 'Titanic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, 'the-town', 'A proficient group of thieves rob a bank and hold Claire, the assistant manager, hostage. Things begin to get complicated when one of the crew members falls in love with Claire.', '2010', 'The Town', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, 'sicario', 'An idealistic FBI agent is enlisted by a government task force to aid in the escalating war against drugs at the border area between the U.S. and Mexico.', '2015', 'Sicario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 'ex-machina', 'A young programmer is selected to participate in a ground-breaking experiment in synthetic intelligence by evaluating the human qualities of a highly advanced humanoid A.I.', '2014', 'Ex Machina', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 'blade-runner-2049', 'Young Blade Runner K\'s discovery of a long-buried secret leads him to track down former Blade Runner Rick Deckard, who\'s been missing for thirty years.', '2017', 'Blade Runner 2049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 'mad-max-fury-road', 'In a post-apocalyptic wasteland, a woman rebels against a tyrannical ruler in search for her homeland with the aid of a group of female prisoners, a psychotic worshiper, and a drifter named Max.', '2015', 'Mad Max : Fury Road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 'shutter-island', 'In 1954, a U.S. Marshal investigates the disappearance of a murderer who escaped from a hospital for the criminally insane.', '2010', 'Shutter Island', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 'django-unchained', 'With the help of a German bounty-hunter, a freed slave sets out to rescue his wife from a brutal plantation-owner in Mississippi.', '2012', 'Django Unchained', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 'live-by-night', 'A group of Boston-bred gangsters set up shop in balmy Florida during the Prohibition era, facing off against the competition and the Ku Klux Klan.', '2016', 'Live By Night', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 'downfall', 'Traudl Junge, the final secretary for Adolf Hitler, tells of the Nazi dictator\'s final days in his Berlin bunker at the end of WWII.', '2004', 'Downfall', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
