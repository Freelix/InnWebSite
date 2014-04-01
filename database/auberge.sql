
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `auberge`
--
CREATE DATABASE IF NOT EXISTS `auberge` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auberge`;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE IF NOT EXISTS `activite` (
  `no_activite` int(10) NOT NULL AUTO_INCREMENT,
  `titre_activite` varchar(75) NOT NULL,
  `desc_activite` varchar(2000) NOT NULL,
  `lien_activite` varchar(200) NOT NULL,
  `nom_lien_activite` varchar(75) NOT NULL,
  `image_activite` varchar(200) NOT NULL,
  PRIMARY KEY (`no_activite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `activite`
--

INSERT INTO `activite` (`no_activite`, `titre_activite`, `desc_activite`, `lien_activite`, `nom_lien_activite`, `image_activite`) VALUES
(1, 'Marche nordique', 'Une marche nordique dans les bois a cote de la ville de Trois-Rivieres...', '', '', 'multimedia/activite/marche_nordique_800.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `activite_proche`
--

CREATE TABLE IF NOT EXISTS `activite_proche` (
  `no_activite` int(10) NOT NULL AUTO_INCREMENT,
  `titre_activite` varchar(75) NOT NULL,
  `desc_activite` varchar(2000) NOT NULL,
  `lien_activite` varchar(200) NOT NULL,
  `nom_lien_activite` varchar(75) NOT NULL,
  `image_activite` varchar(200) NOT NULL,
  PRIMARY KEY (`no_activite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `activite_proche`
--

INSERT INTO `activite_proche` (`no_activite`, `titre_activite`, `desc_activite`, `lien_activite`, `nom_lien_activite`, `image_activite`) VALUES
(1, 'Hockey - Shawinigan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et posuere libero. In sed porttitor arcu. Sed vitae condimentum neque, ac placerat eros. Sed condimentum velit in tristique fermentum. Ut condimentum bibendum gravida. Fusce ornare adipiscing lobortis. Praesent aliquam, arcu ut porta dictum, eros sapien pellentesque tortor, vitae vehicula nulla nisi sed eros. Praesent in venenatis nulla.\r\n\r\nCurabitur id commodo ante. Nunc vel arcu sit amet tellus aliquam malesuada in vel tortor.', '', '', 'multimedia/activite/'),
(2, 'Peche', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et posuere libero. In sed porttitor arcu. Sed vitae condimentum neque, ac placerat eros. Sed condimentum velit in tristique fermentum. Ut condimentum bibendum gravida. Fusce ornare adipiscing lobortis. Praesent aliquam, arcu ut porta dictum, eros sapien pellentesque tortor, vitae vehicula nulla nisi sed eros. Praesent in venenatis nulla.\r\n', 'http://blogue.tourismemauricie.com/plein-air-et-nature/10-endroits-ou-pecher-en-mauricie-pour-une-journee-de-peche-reussie.html', 'Peche Mauricie', 'multimedia/activite/48653_turkish_plane_nergiz.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `activite_rabais`
--

CREATE TABLE IF NOT EXISTS `activite_rabais` (
  `no_activite` int(10) NOT NULL AUTO_INCREMENT,
  `titre_activite` varchar(75) NOT NULL,
  `desc_activite` varchar(2000) NOT NULL,
  `lien_activite` varchar(200) NOT NULL,
  `nom_lien_activite` varchar(75) NOT NULL,
  `image_activite` varchar(200) NOT NULL,
  PRIMARY KEY (`no_activite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `activite_rabais`
--

INSERT INTO `activite_rabais` (`no_activite`, `titre_activite`, `desc_activite`, `lien_activite`, `nom_lien_activite`, `image_activite`) VALUES
(1, 'Une activites a rabais', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia at est et volutpat. Maecenas erat lorem, hendrerit cursus sem at, suscipit commodo neque. Cras vehicula augue at lacus hendrerit posuere. Fusce enim magna, ullamcorper sed consequat nec, consectetur sed urna. Maecenas porta bibendum ante, non tincidunt velit venenatis eu. Aliquam aliquet dignissim lacinia. Etiam at adipiscing metus. Aenean eu dui ut magna tincidunt tristique nec vel eros. ', '', '', 'multimedia/activite/marche_nordique_800.jpg'),
(2, 'Une autre activite a rabais', 'Sed feugiat bibendum tincidunt. Sed a erat nec ligula sagittis faucibus sit amet eu risus. Cras cursus in risus et mollis. Pellentesque laoreet gravida elit, quis convallis tortor blandit et. Nam aliquet placerat quam sed dictum. Integer porta mi at magna fermentum, id scelerisque velit ultricies. Pellentesque molestie magna ac pulvinar viverra. Fusce iaculis suscipit felis vel sagittis. Donec vestibulum facilisis volutpat. Suspendisse congue diam in diam pretium luctus. Curabitur pulvinar lacin', 'http://www.youtube.com/', 'Youtube', 'multimedia/activite/marche_nordique_800.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `autres`
--

CREATE TABLE IF NOT EXISTS `autres` (
  `no_autres` int(10) NOT NULL,
  `password` varchar(75) NOT NULL,
  `desc_service` varchar(1000) NOT NULL,
  `nbr_pictures_auberge` int(10) NOT NULL,
  `nbr_pictures_tr` int(10) NOT NULL,
  PRIMARY KEY (`no_autres`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `autres`
--

INSERT INTO `autres` (`no_autres`, `password`, `desc_service`, `nbr_pictures_auberge`, `nbr_pictures_tr`) VALUES
(1, 'password', 'ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus sit amet sem fermentum venenatis. Sed vel ultrices dolor. Donec tincidunt aliquam metus, quis blandit lectus lobortis non. Nunc justo lorem, aliquet eu lorem in, ullamcorper tristique nisl. Vestibulum ullamcorper vulputate semper. Pellentesque laoreet mi quis ultricies egestas. Phasellus a gravida odio. Duis velit nulla, feugiat vel ligula ac, fermentum varius mi. Proin sed nisl a urna sodales fringilla at volutpat velit. Nullam iaculis augue id nisl porta pulvinar. Vivamus dapibus bibendum gravida. Sed risus enim, convallis id tortor eget, eleifend venenatis orci. Etiam et nisi congue, cursus felis sit amet, volutpat elit. Mauris elementum dignissim sagittis. ', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `no_info_contact` int(10) NOT NULL AUTO_INCREMENT,
  `nom_info_contact` varchar(75) NOT NULL,
  `desc_info_contact` varchar(1000) NOT NULL,
  PRIMARY KEY (`no_info_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `contact_us`
--

INSERT INTO `contact_us` (`no_info_contact`, `nom_info_contact`, `desc_info_contact`) VALUES
(1, 'Telephone', '(819) 999-9999');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `no_employe` int(10) NOT NULL AUTO_INCREMENT,
  `nom_employe` varchar(75) NOT NULL,
  `desc_employe` varchar(5000) NOT NULL,
  `image_employe` varchar(200) NOT NULL,
  PRIMARY KEY (`no_employe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`no_employe`, `nom_employe`, `desc_employe`, `image_employe`) VALUES
(1, 'Jackie Chan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales magna pretium nisi condimentum, et volutpat mi hendrerit. Etiam volutpat commodo faucibus. Pellentesque consectetur urna nulla. Mauris fringilla erat at arcu tincidunt rutrum. Vivamus blandit sagittis sem et aliquet. Nullam eu sollicitudin massa, eget consequat felis. Donec porta porta vulputate. Ut erat sapien, auctor et odio sed, elementum sodales nisi. Ut sagittis mi elit, non convallis elit auctor ac. Proin porta, leo vitae suscipit lacinia, libero turpis egestas diam, ut interdum diam ante id velit. Nunc sagittis elit et odio dignissim eleifend.\r\n\r\nUt rutrum libero sit amet erat scelerisque, sed interdum tellus iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec at lectus tempus, egestas nulla nec, placerat nunc. Donec malesuada leo nec ullamcorper vestibulum. Duis at lacus dolor. Nulla facilisi. Pellentesque vitae fringilla felis.\r\n\r\nUt rutrum libero sit amet erat scelerisque, sed interdum tellus iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec at lectus tempus, egestas nulla nec, placerat nunc. Donec malesuada leo nec ullamcorper vestibulum. Duis at lacus dolor. Nulla facilisi. Pellentesque vitae fringilla felis.\r\n\r\nUt rutrum libero sit amet erat scelerisque, sed interdum tellus iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec at lectus tempus, egestas nulla nec, placerat nunc. Donec malesuada leo nec ullamcorper vestibulum. Duis at lacus dolor. Nulla facilisi. Pellentesque vitae fringilla felis.', 'multimedia/employe/Jackie-Chan.jpg'),
(2, 'Owen Wilson', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at rhoncus lorem, non venenatis ligula. Donec tempor, neque quis lobortis congue, tortor risus suscipit eros, non varius sapien lectus a metus. Vivamus vestibulum a velit eget dignissim. Pellentesque at ipsum in enim eleifend posuere ac sed leo. In venenatis tempus odio, quis scelerisque lacus sagittis nec. Aenean sagittis nibh quis turpis ullamcorper eleifend. Nunc vitae dolor et diam ornare dictum. Pellentesque mollis rutrum eleifend. Donec vitae massa blandit, condimentum sapien vel, congue augue. Ut blandit arcu et leo condimentum, in auctor justo convallis. Ut eget ligula sed orci pulvinar ornare sed eget odio. Sed quis congue odio. Pellentesque et scelerisque massa. \r\n\r\nDonec lacinia, leo sit amet lobortis pellentesque, arcu nisl vehicula diam, nec tincidunt felis lectus vitae odio. Suspendisse lacinia nibh vel dui porta, id commodo odio dapibus. Proin quis magna quis arcu fermentum viverra vel sed erat.\r\n\r\nDonec lacinia, leo sit amet lobortis pellentesque, arcu nisl vehicula diam, nec tincidunt felis lectus vitae odio. Suspendisse lacinia nibh vel dui porta, id commodo odio dapibus. Proin quis magna quis arcu fermentum viverra vel sed erat.', 'multimedia/employe/21725-25230.gif');

-- --------------------------------------------------------

--
-- Structure de la table `en_activite`
--

CREATE TABLE IF NOT EXISTS `en_activite` (
  `no_activite` int(10) NOT NULL AUTO_INCREMENT,
  `titre_activite` varchar(75) NOT NULL,
  `desc_activite` varchar(2000) NOT NULL,
  `lien_activite` varchar(200) NOT NULL,
  `nom_lien_activite` varchar(75) NOT NULL,
  `image_activite` varchar(200) NOT NULL,
  PRIMARY KEY (`no_activite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `en_activite`
--

INSERT INTO `en_activite` (`no_activite`, `titre_activite`, `desc_activite`, `lien_activite`, `nom_lien_activite`, `image_activite`) VALUES
(1, 'Fishing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et posuere libero. In sed porttitor arcu. Sed vitae condimentum neque, ac placerat eros. Sed condimentum velit in tristique fermentum. Ut condimentum bibendum gravida. Fusce ornare adipiscing lobortis. Praesent aliquam, arcu ut porta dictum, eros sapien pellentesque tortor, vitae vehicula nulla nisi sed eros. Praesent in venenatis nulla. ', 'http://blogue.tourismemauricie.com/plein-air-et-nature/10-endroits-ou-pecher-en-mauricie-pour-une-journee-de-peche-reussie.html', 'Fishing in Mauricie', 'multimedia/activite/48653_turkish_plane_nergiz.jpg'),
(2, 'An other activity', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et posuere libero. In sed porttitor arcu. Sed vitae condimentum neque, ac placerat eros. Sed condimentum velit in tristique fermentum. Ut condimentum bibendum gravida. Fusce ornare adipiscing lobortis. Praesent aliquam, arcu ut porta dictum, eros sapien pellentesque tortor, vitae vehicula nulla nisi sed eros. Praesent in venenatis nulla.\r\n\r\nPraesent aliquam, arcu ut porta dictum, eros sapien pellentesque tortor, vitae vehicula nulla nisi sed eros. Praesent in venenatis nulla...', '', '', 'multimedia/activite/marche_nordique_800.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `en_activite_proche`
--

CREATE TABLE IF NOT EXISTS `en_activite_proche` (
  `no_activite` int(10) NOT NULL AUTO_INCREMENT,
  `titre_activite` varchar(75) NOT NULL,
  `desc_activite` varchar(2000) NOT NULL,
  `lien_activite` varchar(200) NOT NULL,
  `nom_lien_activite` varchar(75) NOT NULL,
  `image_activite` varchar(200) NOT NULL,
  PRIMARY KEY (`no_activite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `en_activite_proche`
--

INSERT INTO `en_activite_proche` (`no_activite`, `titre_activite`, `desc_activite`, `lien_activite`, `nom_lien_activite`, `image_activite`) VALUES
(1, 'An activity', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et dui vel sem lacinia ullamcorper ut non ipsum. Nulla convallis magna volutpat, viverra mauris pellentesque, dapibus eros. Morbi ultrices quam vel eleifend faucibus. Sed porta nulla vel dolor aliquet, ac tincidunt arcu porttitor. Proin vel blandit velit. Etiam vel lorem at libero egestas interdum. Nullam dictum sodales tortor. Nam suscipit quis diam at aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam bibendum gravida vehicula. Cras facilisis mollis velit, id pharetra mi pulvinar nec. Nullam ut erat rutrum, varius ligula vitae, egestas lorem. Aenean interdum leo sit amet sapien pulvinar, et accumsan dolor feugiat. Nunc sem lectus, ultricies sed rutrum nec, ultrices non dolor.\r\n\r\nPraesent enim lacus, pellentesque at erat pharetra, aliquam fermentum arcu. Fusce vehicula, massa eu accumsan luctus, lectus sapien ultricies lectus, in interdum orci sapien lacinia dolor.', '', '', 'multimedia/activite/marche_nordique_800.jpg'),
(2, 'An other activity', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula nulla a tellus mattis cursus. Vestibulum erat eros, aliquet a ornare eu, gravida eu massa. Sed augue ligula, eleifend eget nunc a, blandit viverra tortor. Vivamus mollis tempus quam id pulvinar. Integer adipiscing eleifend lorem a varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eleifend lorem suscipit porta rutrum. Phasellus ac condimentum augue. Etiam quis tristique elit. Sed elementum elit in nunc venenatis, eu ultrices magna posuere. Donec cursus fermentum suscipit. Cras sit amet dapibus ligula. Cras vitae condimentum sapien. Duis sed porttitor purus. Aenean vitae odio sit amet elit rhoncus sagittis. Ut venenatis nulla ut tellus posuere tristique.\r\n\r\nPellentesque scelerisque purus sed interdum tincidunt. Sed vel semper nunc, quis malesuada nisl. Duis sed pharetra est, quis molestie ante. Proin tempor augue nulla, at dignissim lectus dapibus ut.', 'https://www.google.ca/', 'A link to something', 'multimedia/activite/48653_turkish_plane_nergiz.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `en_activite_rabais`
--

CREATE TABLE IF NOT EXISTS `en_activite_rabais` (
  `no_activite` int(10) NOT NULL AUTO_INCREMENT,
  `titre_activite` varchar(75) NOT NULL,
  `desc_activite` varchar(2000) NOT NULL,
  `lien_activite` varchar(200) NOT NULL,
  `nom_lien_activite` varchar(75) NOT NULL,
  `image_activite` varchar(200) NOT NULL,
  PRIMARY KEY (`no_activite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `en_activite_rabais`
--

INSERT INTO `en_activite_rabais` (`no_activite`, `titre_activite`, `desc_activite`, `lien_activite`, `nom_lien_activite`, `image_activite`) VALUES
(1, 'A discount activity', 'Lorem ipsum dolor sit amet, consecteturadipiscing elit. Quisque sed vulputate libero, sed tempor mi. Donec in dignissim risus. Morbi nec orci vitae eros pretium fringilla. Proin tempus tempus nulla, in fermentum eros tempus at. Donec rhoncus pulvinar erat eget lacinia. Nunc tempor lacus non nunc lobortis, sit amet accumsan metus tempor. Suspendisse potenti. Praesent congue turpis non odio faucibus, vitae ultrices risus placerat. Ut lectus lorem, facilisis nec velit at, tincidunt venenatis libero. Maecenas eget nibh condimentum, placerat urna vel, tincidunt est. Nullam faucibus lorem dictum nisi ullamcorper, vel condimentum urna varius. Cras at nisi condimentum, pretium mi quis, porttitor nisi. Aliquam mattis molestie tincidunt. Integer sed iaculis nunc. Nullam fringilla sollicitudin molestie. Donec porta mollis urna, vitae sodales nulla fermentum id. ', '', '', 'multimedia/activite/'),
(2, 'An other discount activity', 'Praesent vehicula tempus ullamcorper. Vivamus nec pharetra lectus, at viverra erat. Vestibulum non neque nibh. Praesent sollicitudin dignissim tristique. Vivamus orci lacus, posuere vitae faucibus eget, molestie at ligula. In velit nulla, pellentesque non vulputate vel, facilisis non ligula. Nunc consectetur quis metus ac varius. Duis placerat bibendum ullamcorper. Phasellus ultricies justo ante, vel lacinia urna bibendum sit amet.\r\n\r\nDuis placerat bibendum ullamcorper. Phasellus ultricies justo ante, vel lacinia urna bibendum sit amet. Duis placerat bibendum ullamcorper. Phasellus ultricies justo ante, vel lacinia urna bibendum sit amet. ', 'http://www.youtube.com/', 'Youtube', 'multimedia/activite/marche_nordique_800.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `en_autres`
--

CREATE TABLE IF NOT EXISTS `en_autres` (
  `no_autres` int(11) NOT NULL,
  `desc_service` varchar(1000) NOT NULL,
  PRIMARY KEY (`no_autres`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `en_autres`
--

INSERT INTO `en_autres` (`no_autres`, `desc_service`) VALUES
(1, 'ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus sit amet sem fermentum venenatis. Sed vel ultrices dolor. Donec tincidunt aliquam metus, quis blandit lectus lobortis non. Nunc justo lorem, aliquet eu lorem in, ullamcorper tristique nisl. Vestibulum ullamcorper vulputate semper. Pellentesque laoreet mi quis ultricies egestas. Phasellus a gravida odio. Duis velit nulla, feugiat vel ligula ac, fermentum varius mi. Proin sed nisl a urna sodales fringilla at volutpat velit. Nullam iaculis augue id nisl porta pulvinar. Vivamus dapibus bibendum gravida. Sed risus enim, convallis id tortor eget, eleifend venenatis orci. Etiam et nisi congue, cursus felis sit amet, volutpat elit. Mauris elementum dignissim sagittis.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `en_contact_us`
--

CREATE TABLE IF NOT EXISTS `en_contact_us` (
  `no_info_contact` int(10) NOT NULL AUTO_INCREMENT,
  `nom_info_contact` varchar(75) NOT NULL,
  `desc_info_contact` varchar(1000) NOT NULL,
  PRIMARY KEY (`no_info_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `en_contact_us`
--

INSERT INTO `en_contact_us` (`no_info_contact`, `nom_info_contact`, `desc_info_contact`) VALUES
(1, 'Phone', '(819) 999-9999');

-- --------------------------------------------------------

--
-- Structure de la table `en_employe`
--

CREATE TABLE IF NOT EXISTS `en_employe` (
  `no_employe` int(10) NOT NULL AUTO_INCREMENT,
  `nom_employe` varchar(75) NOT NULL,
  `desc_employe` varchar(5000) NOT NULL,
  `image_employe` varchar(200) NOT NULL,
  PRIMARY KEY (`no_employe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `en_employe`
--

INSERT INTO `en_employe` (`no_employe`, `nom_employe`, `desc_employe`, `image_employe`) VALUES
(1, 'Jackie Chan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales magna pretium nisi condimentum, et volutpat mi hendrerit. Etiam volutpat commodo faucibus. Pellentesque consectetur urna nulla. Mauris fringilla erat at arcu tincidunt rutrum. Vivamus blandit sagittis sem et aliquet. Nullam eu sollicitudin massa, eget consequat felis. Donec porta porta vulputate. Ut erat sapien, auctor et odio sed, elementum sodales nisi. Ut sagittis mi elit, non convallis elit auctor ac. Proin porta, leo vitae suscipit lacinia, libero turpis egestas diam, ut interdum diam ante id velit. Nunc sagittis elit et odio dignissim eleifend.\r\n\r\nUt rutrum libero sit amet erat scelerisque, sed interdum tellus iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec at lectus tempus, egestas nulla nec, placerat nunc. Donec malesuada leo nec ullamcorper vestibulum. Duis at lacus dolor. Nulla facilisi. Pellentesque vitae fringilla felis. Duis ac faucibus lect', 'multimedia/employe/Jackie-Chan.jpg'),
(2, 'Owen Wilson', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at rhoncus lorem, non venenatis ligula. Donec tempor, neque quis lobortis congue, tortor risus suscipit eros, non varius sapien lectus a metus. Vivamus vestibulum a velit eget dignissim. Pellentesque at ipsum in enim eleifend posuere ac sed leo. In venenatis tempus odio, quis scelerisque lacus sagittis nec. Aenean sagittis nibh quis turpis ullamcorper eleifend. Nunc vitae dolor et diam ornare dictum. Pellentesque mollis rutrum eleifend. Donec vitae massa blandit, condimentum sapien vel, congue augue. Ut blandit arcu et leo condimentum, in auctor justo convallis. Ut eget ligula sed orci pulvinar ornare sed eget odio. Sed quis congue odio. Pellentesque et scelerisque massa. Donec lacinia, leo sit amet lobortis pellentesque, arcu nisl vehicula diam, nec tincidunt felis lectus vitae odio. Suspendisse lacinia nibh vel dui porta, id commodo odio dapibus. Proin quis magna quis arcu fermentum viverra vel sed erat.', 'multimedia/employe/21725-25230.gif');

-- --------------------------------------------------------

--
-- Structure de la table `en_lien_utile`
--

CREATE TABLE IF NOT EXISTS `en_lien_utile` (
  `no_lien_utile` int(10) NOT NULL AUTO_INCREMENT,
  `nom_lien_utile` varchar(75) NOT NULL,
  `lien_utile` varchar(200) NOT NULL,
  PRIMARY KEY (`no_lien_utile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `en_lien_utile`
--

INSERT INTO `en_lien_utile` (`no_lien_utile`, `nom_lien_utile`, `lien_utile`) VALUES
(1, 'Youtube', 'http://www.youtube.com/'),
(2, 'Twitter', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Structure de la table `en_liste_partenaires`
--

CREATE TABLE IF NOT EXISTS `en_liste_partenaires` (
  `no_partenaire` int(10) NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(75) NOT NULL,
  `lien_partenaire` varchar(200) NOT NULL,
  `image_partenaire` varchar(200) NOT NULL,
  PRIMARY KEY (`no_partenaire`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `en_liste_partenaires`
--

INSERT INTO `en_liste_partenaires` (`no_partenaire`, `nom_partenaire`, `lien_partenaire`, `image_partenaire`) VALUES
(1, 'Node.js', 'http://nodejs.org/', 'multimedia/partenaire/nodejs-dark.jpg'),
(2, 'Youtube', 'http://www.youtube.com/', 'multimedia/partenaire/youtube-20-535x535.jpg'),
(3, 'Google', 'https://www.google.ca/?hl=fr', 'multimedia/partenaire/cnil-amende-google-vie-privee.jpg'),
(4, 'Amazon', 'http://www.amazon.ca/', 'multimedia/partenaire/amazon-logo.jpg'),
(7, 'MongoDB', 'https://www.mongodb.org/', 'multimedia/partenaire/mongodb.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `en_liste_service`
--

CREATE TABLE IF NOT EXISTS `en_liste_service` (
  `no_service` int(10) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(75) NOT NULL,
  PRIMARY KEY (`no_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `en_liste_service`
--

INSERT INTO `en_liste_service` (`no_service`, `nom_service`) VALUES
(3, 'Little Rooms'),
(4, 'Big Rooms'),
(5, 'Whirlpools'),
(6, 'Spa');

-- --------------------------------------------------------

--
-- Structure de la table `en_page_accueil`
--

CREATE TABLE IF NOT EXISTS `en_page_accueil` (
  `no_nouvelle` int(10) NOT NULL AUTO_INCREMENT,
  `titre_nouvelle` varchar(75) NOT NULL,
  `desc_nouvelle` varchar(5000) NOT NULL,
  PRIMARY KEY (`no_nouvelle`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `en_page_accueil`
--

INSERT INTO `en_page_accueil` (`no_nouvelle`, `titre_nouvelle`, `desc_nouvelle`) VALUES
(1, 'An Example', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n'),
(2, 'An Other Example', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n'),
(3, 'A Third Example', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `en_rabais_membre`
--

CREATE TABLE IF NOT EXISTS `en_rabais_membre` (
  `no_rabais` int(10) NOT NULL AUTO_INCREMENT,
  `no_activite` int(10) NOT NULL,
  `nom_rabais` varchar(75) NOT NULL,
  PRIMARY KEY (`no_rabais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `en_rabais_membre`
--

INSERT INTO `en_rabais_membre` (`no_rabais`, `no_activite`, `nom_rabais`) VALUES
(1, 2, '10$');

-- --------------------------------------------------------

--
-- Structure de la table `en_rabais_proche_membre`
--

CREATE TABLE IF NOT EXISTS `en_rabais_proche_membre` (
  `no_rabais` int(10) NOT NULL AUTO_INCREMENT,
  `no_activite` int(10) NOT NULL,
  `nom_rabais` varchar(75) NOT NULL,
  PRIMARY KEY (`no_rabais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `en_rabais_proche_membre`
--

INSERT INTO `en_rabais_proche_membre` (`no_rabais`, `no_activite`, `nom_rabais`) VALUES
(1, 2, '10$'),
(3, 2, '15$');

-- --------------------------------------------------------

--
-- Structure de la table `en_rabais_rabais_membre`
--

CREATE TABLE IF NOT EXISTS `en_rabais_rabais_membre` (
  `no_rabais` int(10) NOT NULL AUTO_INCREMENT,
  `no_activite` int(10) NOT NULL,
  `nom_rabais` varchar(75) NOT NULL,
  PRIMARY KEY (`no_rabais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `en_rabais_rabais_membre`
--

INSERT INTO `en_rabais_rabais_membre` (`no_rabais`, `no_activite`, `nom_rabais`) VALUES
(1, 2, '20$');

-- --------------------------------------------------------

--
-- Structure de la table `en_sidebar`
--

CREATE TABLE IF NOT EXISTS `en_sidebar` (
  `no_sidebar` int(10) NOT NULL AUTO_INCREMENT,
  `titre_sidebar` varchar(75) NOT NULL,
  `titre_new` varchar(75) NOT NULL,
  `info_new` varchar(500) NOT NULL,
  `info_sidebar_titre` varchar(75) NOT NULL,
  `info_sidebar_desc` varchar(500) NOT NULL,
  `date_new` date NOT NULL,
  PRIMARY KEY (`no_sidebar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `en_sidebar`
--

INSERT INTO `en_sidebar` (`no_sidebar`, `titre_sidebar`, `titre_new`, `info_new`, `info_sidebar_titre`, `info_sidebar_desc`, `date_new`) VALUES
(1, 'Informations', 'Some infos', 'This is a an info about something that is not an information at all...', 'This is a test', 'This is only a test to fill that section of the page.', '2014-03-19');

-- --------------------------------------------------------

--
-- Structure de la table `lien_utile`
--

CREATE TABLE IF NOT EXISTS `lien_utile` (
  `no_lien_utile` int(10) NOT NULL AUTO_INCREMENT,
  `nom_lien_utile` varchar(75) NOT NULL,
  `lien_utile` varchar(200) NOT NULL,
  PRIMARY KEY (`no_lien_utile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `lien_utile`
--

INSERT INTO `lien_utile` (`no_lien_utile`, `nom_lien_utile`, `lien_utile`) VALUES
(1, 'Youtube', 'http://www.youtube.com/'),
(2, 'Twitter', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Structure de la table `liste_partenaires`
--

CREATE TABLE IF NOT EXISTS `liste_partenaires` (
  `no_partenaire` int(10) NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(75) NOT NULL,
  `lien_partenaire` varchar(200) NOT NULL,
  `image_partenaire` varchar(200) NOT NULL,
  PRIMARY KEY (`no_partenaire`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `liste_partenaires`
--

INSERT INTO `liste_partenaires` (`no_partenaire`, `nom_partenaire`, `lien_partenaire`, `image_partenaire`) VALUES
(1, 'Amazon', 'http://www.amazon.ca/', 'multimedia/partenaire/amazon-logo.jpg'),
(2, 'Youtube', 'http://www.youtube.com/', 'multimedia/partenaire/youtube-20-535x535.jpg'),
(3, 'Google', 'https://www.google.ca/?hl=fr', 'multimedia/partenaire/cnil-amende-google-vie-privee.jpg'),
(6, 'MongoDB', 'https://www.mongodb.org/', 'multimedia/partenaire/mongodb.jpg'),
(5, 'Node.js', 'http://nodejs.org/', 'multimedia/partenaire/nodejs-dark.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `liste_service`
--

CREATE TABLE IF NOT EXISTS `liste_service` (
  `no_service` int(10) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(75) NOT NULL,
  PRIMARY KEY (`no_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `liste_service`
--

INSERT INTO `liste_service` (`no_service`, `nom_service`) VALUES
(7, 'Bains tourbillons'),
(9, 'Petites chambres'),
(11, 'Grandes chambres'),
(12, 'Spa');

-- --------------------------------------------------------

--
-- Structure de la table `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `no_multi` int(10) NOT NULL AUTO_INCREMENT,
  `lien_image_multi` varchar(200) NOT NULL,
  `nom_image_multi` varchar(75) NOT NULL,
  `section_multi` varchar(75) NOT NULL,
  `nom_en_image_multi` varchar(75) NOT NULL,
  PRIMARY KEY (`no_multi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `multimedia`
--

INSERT INTO `multimedia` (`no_multi`, `lien_image_multi`, `nom_image_multi`, `section_multi`, `nom_en_image_multi`) VALUES
(1, 'multimedia/TR/_docs_upload_builder_61_Vieux-Trois-Rivieres-et-fle.jpg', 'Photo 1', 'TR', 'Photo 1'),
(2, 'multimedia/TR/101206232454_97.jpg', 'Bleu', 'TR', 'Blue'),
(3, 'multimedia/TR/hebus_1920x1080_1335751621_8131.jpg', 'Oiseau', 'TR', 'Bird'),
(6, 'multimedia/TR/bldg_2428.jpg', 'Batiment', 'TR', 'Building'),
(22, 'multimedia/Auberge/angry-birds.jpg', 'Oiseau', 'Auberge', 'Angry Bird'),
(16, 'multimedia/Auberge/palmier-fond-ecran.jpg', 'Coucher de soleil', 'Auberge', 'Sunset'),
(10, 'multimedia/Auberge/ile-maurice-the-residence-plage.jpg', 'Plage', 'Auberge', 'Beach'),
(12, 'multimedia/TR/hebus_1920x1080_1335751596_4991.jpg', 'Oiseau 2', 'TR', 'Oiseau 2'),
(13, 'multimedia/TR/trois-riviere.jpg', 'Ville', 'TR', 'City'),
(14, 'multimedia/TR/trois-rivieres.jpg', 'Ville 2', 'TR', 'City 2'),
(15, 'multimedia/TR/Ile-St-Quentin_poi.jpg', 'Ile St-Quentin', 'TR', 'St-Quentin&#039;s Island'),
(17, 'multimedia/Auberge/20343825.jpg', 'Auberge 1', 'Auberge', 'Inn'),
(18, 'multimedia/Auberge/auberge_du_trappeur_inn_1.jpg', 'Auberge 2', 'Auberge', 'Inn 2'),
(19, 'multimedia/Auberge/auberge-exterieur.jpg', 'Auberge 3', 'Auberge', 'Inn 3'),
(20, 'multimedia/Auberge/flash.jpg', 'Auberge 4', 'Auberge', 'Inn 4'),
(21, 'multimedia/Auberge/sal02.jpg', 'Auberge 5', 'Auberge', 'Inn 5');

-- --------------------------------------------------------

--
-- Structure de la table `page_accueil`
--

CREATE TABLE IF NOT EXISTS `page_accueil` (
  `no_nouvelle` int(11) NOT NULL AUTO_INCREMENT,
  `titre_nouvelle` varchar(75) NOT NULL,
  `desc_nouvelle` varchar(5000) NOT NULL,
  PRIMARY KEY (`no_nouvelle`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `page_accueil`
--

INSERT INTO `page_accueil` (`no_nouvelle`, `titre_nouvelle`, `desc_nouvelle`) VALUES
(1, 'Un exemple', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n\r\nVivamus varius lectus eu tempus tempus. Praesent ac feugiat velit. Maecenas mollis ultricies massa. Maecenas sit amet turpis pellentesque, sagittis nunc et, fermentum tortor. Morbi elementum diam nunc, id fringilla nibh pellentesque id. Vestibulum mattis laoreet risus eget egestas. Quisque vehicula interdum nisi sed accumsan. Etiam accumsan cursus condimentum. Proin dignissim tortor lectus, in rutrum purus rutrum sit amet. Vestibulum sit amet sem posuere, blandit arcu et, faucibus augue. Phasellus porttitor magna tellus, sed porta ipsum consequat quis. Maecenas eu tortor vitae velit mattis tincidunt nec vitae odio.\r\n\r\nProin elit magna, tincidunt ut ultrices ac, imperdiet a ipsum. Donec tristique, erat vitae laoreet imperdiet, tellus eros rutrum nunc, at tempor lacus eros in libero. Sed a molestie lorem. Integer tristique augue et nisi porta vulputate. Phasellus luctus dapibus fringilla. Mauris at scelerisque nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. '),
(2, 'Un autre exemple', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n'),
(3, 'exemple 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer feugiat libero a eros tempus, eu vehicula justo accumsan. Donec elementum elit justo, eget placerat lacus euismod non. Aenean tellus elit, ornare in metus in, imperdiet accumsan ligula. Nunc a tincidunt nisi. In vehicula pellentesque erat vel tempus. Aenean ultricies libero sit amet dui feugiat, et blandit eros ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ornare ornare odio a porttitor. Mauris faucibus nibh volutpat auctor ullamcorper. Fusce pulvinar massa ac tortor consequat ullamcorper.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `rabais_membre`
--

CREATE TABLE IF NOT EXISTS `rabais_membre` (
  `no_rabais` int(10) NOT NULL AUTO_INCREMENT,
  `no_activite` int(10) NOT NULL,
  `nom_rabais` varchar(75) NOT NULL,
  PRIMARY KEY (`no_rabais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `rabais_membre`
--

INSERT INTO `rabais_membre` (`no_rabais`, `no_activite`, `nom_rabais`) VALUES
(2, 1, '20$'),
(3, 1, '10$');

-- --------------------------------------------------------

--
-- Structure de la table `rabais_proche_membre`
--

CREATE TABLE IF NOT EXISTS `rabais_proche_membre` (
  `no_rabais` int(10) NOT NULL AUTO_INCREMENT,
  `no_activite` int(10) NOT NULL,
  `nom_rabais` varchar(75) NOT NULL,
  PRIMARY KEY (`no_rabais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rabais_proche_membre`
--

INSERT INTO `rabais_proche_membre` (`no_rabais`, `no_activite`, `nom_rabais`) VALUES
(2, 2, '10$');

-- --------------------------------------------------------

--
-- Structure de la table `rabais_rabais_membre`
--

CREATE TABLE IF NOT EXISTS `rabais_rabais_membre` (
  `no_rabais` int(10) NOT NULL AUTO_INCREMENT,
  `no_activite` int(10) NOT NULL,
  `nom_rabais` varchar(75) NOT NULL,
  PRIMARY KEY (`no_rabais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rabais_rabais_membre`
--

INSERT INTO `rabais_rabais_membre` (`no_rabais`, `no_activite`, `nom_rabais`) VALUES
(1, 2, '15$');

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `no_rate` int(10) NOT NULL,
  `dortoir_m_ti` decimal(10,0) NOT NULL,
  `dortoir_nm_ti` decimal(10,0) NOT NULL,
  `champri_m_ti` decimal(10,0) NOT NULL,
  `champri_nm_ti` decimal(10,0) NOT NULL,
  `chamfam1_m_ti` decimal(10,0) NOT NULL,
  `chamfam1_nm_ti` decimal(10,0) NOT NULL,
  `chamfam2_m_ti` decimal(10,0) NOT NULL,
  `chamfam2_nm_ti` decimal(10,0) NOT NULL,
  `chamfam3_m_ti` decimal(10,0) NOT NULL,
  `chamfam3_nm_ti` decimal(10,0) NOT NULL,
  PRIMARY KEY (`no_rate`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rate`
--

INSERT INTO `rate` (`no_rate`, `dortoir_m_ti`, `dortoir_nm_ti`, `champri_m_ti`, `champri_nm_ti`, `chamfam1_m_ti`, `chamfam1_nm_ti`, `chamfam2_m_ti`, `chamfam2_nm_ti`, `chamfam3_m_ti`, `chamfam3_nm_ti`) VALUES
(1, '95', '15', '20', '30', '40', '50', '60', '70', '80', '100');

-- --------------------------------------------------------

--
-- Structure de la table `sidebar`
--

CREATE TABLE IF NOT EXISTS `sidebar` (
  `no_sidebar` int(10) NOT NULL AUTO_INCREMENT,
  `titre_sidebar` varchar(75) NOT NULL,
  `titre_new` varchar(75) NOT NULL,
  `info_new` varchar(500) NOT NULL,
  `info_sidebar_titre` varchar(75) NOT NULL,
  `info_sidebar_desc` varchar(500) NOT NULL,
  `date_new` date NOT NULL,
  PRIMARY KEY (`no_sidebar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sidebar`
--

INSERT INTO `sidebar` (`no_sidebar`, `titre_sidebar`, `titre_new`, `info_new`, `info_sidebar_titre`, `info_sidebar_desc`, `date_new`) VALUES
(1, 'Informations', 'Une information', 'Simplement un petit texte qui ne veut pas dire grand chose...', 'Un petit test', 'Simplement un autre texte qui ne veut pas dire grand chose, mais qui prend un peu de place...', '2014-03-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
