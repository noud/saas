-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 13, 2020 at 09:43 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saas`
--

INSERT INTO `person` (`additional_name`, `birth_date`, `email`, `family_name`, `given_name`, `telephone`) VALUES
('van de', '2019-06-20', 'jasper.van.de.poll@yacht.nl', 'Poll', 'Jasper', NULL),
('te', '2019-06-20', 'lionel@bonque.nl', 'Riele', 'Lionel', NULL),
('den', '2019-06-20', 'yvonne.den.brinker@fasterforward.nl', 'Brinker', 'Yvonne', NULL),
('van', '2019-06-20', 'marco.van.est@fasterforward.nl', 'Est', 'Marco', NULL),
(NULL, '2019-06-20', 'solliciteren@fasterforward.nl', 'solliciteren', 'FastForward', NULL),
(NULL, '2019-06-20', 'support@fasterforward.nl', 'support', 'FastForward', NULL),
(NULL, '2019-06-20', 'i.meester@ormer.nl', 'Meester', 'Iris', NULL),
('van der', '2019-06-20', 'vanderlanden@ict.eur.nl', 'Landen', 'Peter', NULL),
(NULL, '2019-06-20', 'donny@bonque.nl', 'Feenstra', 'Donny', NULL),
(NULL, '2019-06-20', 'mike@bonque.nl', 'Gorter', 'Mike', NULL),
(NULL, '2019-06-20', 'tristan@yellowbeagle.nl', 'Schoof', 'Tristan', '0624905720'),
(NULL, '2019-06-20', 'sagar.patel@vividresourcing.com', 'Patel', 'Sagar', NULL),
('de', '2019-06-20', 'recruiterdo@itaq.nl', 'Oliveira', 'Dayanne Soares', NULL),
(NULL, '2019-06-20', 'andrew@onesource.be', 'Pauson', 'Andrew', NULL),
(NULL, '2019-06-20', 'info@gho.nl', 'Groenewold', 'Wouter', NULL),
('van der', '2019-06-20', 'm.vanderlinden@youwe.nl', 'Linden', 'Maaike', NULL),
(NULL, '2019-06-20', 'evan.townsend@oscar-tech.com', 'Townsend', 'Evan', NULL),
(NULL, '2019-06-20', 'dirk@adc-nederland.nl', 'Wolthuis', 'Dirk H.', NULL),
(NULL, '2019-06-20', 'remi.s@teqneeks.com', 'Singh', 'Remi', NULL),
(NULL, '2019-06-20', 'roxy.fallahi@henlowgroup.com', 'Fallahi', 'Roxy', NULL),
(NULL, '2019-06-20', 'kim@brabantmatch.nl', 'Lekatonpessy', 'Kim', NULL),
(NULL, '2019-06-20', 'lee@boldcompany.nl', NULL, 'Lee', NULL),
(NULL, '2019-06-20', 'M.Wubs@argeweb.nl', 'Wubs', 'Marjan', NULL),
(NULL, '2019-06-20', 'rhys.shekleton@eximius.com', 'Shekleton', 'Rhys', NULL),
(NULL, '2019-06-20', 'florencia@magno-it.nl', 'Senia', 'Florencia', NULL),
(NULL, '2019-06-20', 'i.rackyte@levy.eu.com', 'Rackyte', 'Iveta', NULL),
(NULL, '2019-06-20', 'fortunato.geelhoed@gmail.com', 'Geelhoed', 'Fortunato', NULL),
(NULL, '2019-06-20', 'recruitervp@itaq.nl', 'Plichta', 'Vincent', NULL),
(NULL, '2019-06-20', 'vincent.plichta@itaq.nl', 'Plichta', 'Vincent', NULL),
(NULL, '2019-06-20', 's.omogun@pearsonfrank.com', 'Omogun', 'Stephanie', NULL),
('van de', '2019-06-20', 'stanley.van.de.bleek@schulinck.nl', 'Bleek', 'Stanley', NULL),
(NULL, '2019-06-20', 'patrick.savelberg@schulinck.nl', 'Savelberg', 'Patrick', NULL),
(NULL, '2019-06-20', 'ron.gahler@schulinck.nl', 'Gahler', 'Ron', NULL),
(NULL, '2019-06-20', 'massood@wiba-it.nl', 'Haidari', 'Massood', '0618413730'),
('de', '2019-06-20', 'dick@tellow.nl', 'Leeuw', 'Dick', NULL),
('van der', '2019-06-20', 'floran@tellow.recruitee.com', 'Harst', 'Floran', NULL),
(NULL, '2019-06-28', 'dennis@tellow.nl', 'Anderson', 'Dennis', NULL),
(NULL, '2019-06-28', 'dirk@itprogrammeur.com', 'Karreman', 'Dirk', NULL),
(NULL, '2019-06-29', 'navin@gazellegc.com', 'De Costa-Dassenaieke', 'Navin', NULL),
('van \'t', '2019-07-01', 'sander@gemoro.nl', 'Veer', 'Sander', NULL),
(NULL, '2019-07-02', 'mitchell@webdesigntilburg.nl', 'Blondé', 'Mitchell', NULL),
(NULL, '2019-07-02', 'hieu.nguyen@webdesigntilburg.nl', 'Nguyen', 'Hieu', NULL),
('van den', '2019-07-02', 'dennis@webdesigntilburg.nl', 'Hout', 'Dennis', NULL),
(NULL, '2019-07-03', 'careers@savvii.com', 'Huijs', 'Leonie', NULL),
('van der', '2019-07-03', NULL, 'Werf', 'Ferdi', NULL),
(NULL, '2019-07-04', 'kim@eloo.nl', 'Höppener', 'Kim', NULL),
(NULL, '2019-07-04', 'wilfried@nostradamus.nu', 'Schets', 'Wilfried', NULL),
('van', '2019-07-04', 'jamy.vanleijenhorst@itaq.nl', 'Leijenhorst', 'Jamy', NULL),
(NULL, '2019-07-04', 'frank@lab51.nl', NULL, 'Frank', NULL),
(NULL, '2019-07-04', 'nicole.marijnissen@uvt.nl', 'Marijnissen', 'Nicole', NULL),
(NULL, '2019-07-04', 'b.cuelenaere@uvt.nl', 'Cuelenaere', 'Boukje', '0134662243'),
(NULL, '2019-07-05', 'opensollicitaties@isense.nl', 'sollicitaties', 'Open', NULL),
(NULL, '2019-07-05', 'Londran@gazellegc.com', 'Ferati', 'Londran', '+44(0)2035887816'),
(NULL, '2019-07-05', 'recruit@profitap.com', NULL, NULL, NULL),
(NULL, '2019-07-05', 'nick@gazellegc.com', 'Chinweerapunt', 'Nick', '+447794955402'),
(NULL, '2019-07-05', 'ing@myworkday.com', NULL, NULL, NULL),
(NULL, '2019-07-05', 'jmenheer@standbysolutions.nl', 'Menheer', 'Jordi', NULL),
(NULL, '2019-07-05', 'w.bosch@c4software.nl', 'Bosch', 'Wido', NULL),
(NULL, '2019-07-05', 'jr@levy.eu.com', 'Ruiter', 'Jos', NULL),
(NULL, '2019-07-05', 'bgurbalov@levy.eu.com', 'Gurbalov', 'Boris', NULL),
(NULL, '2019-07-08', 'vacature@prezent.nl', NULL, NULL, NULL),
(NULL, '2019-07-08', 'support@prezent.nl', NULL, NULL, NULL),
(NULL, '2019-07-08', 'sales@prezent.nl', NULL, NULL, NULL),
(NULL, '2019-07-08', 'administratie@prezent.nl', NULL, NULL, NULL),
('Van de', '2019-07-08', 'esmee@phind.nl', 'Kerkhof', 'Esmee', '0634087252'),
(NULL, '2019-07-08', 'werkenbij@gripp.com', 'Verhoeven', 'Claudia', NULL),
(NULL, '2019-07-08', 'support@gripp.com', NULL, NULL, NULL),
(NULL, '2019-07-08', 'stijn@phind.nl', 'Koehler', 'Stijn', NULL),
(NULL, '2019-07-08', 'heather.watson@oscar-tech.com', 'Watson', 'Heather', NULL),
(NULL, '2019-07-08', 'daan@duodeka.nl', 'Schoofs', 'Daan', '0653586900'),
(NULL, '2019-07-08', 'mathieu7699_qun@indeedemail.com', 'Bruning', 'Mathieu', NULL),
(NULL, '2019-07-08', 'matthijs@jouwictvacature.nl', 'Prins', 'Matthijs', NULL),
(NULL, '2019-07-08', 'leeronskennen@way2web.nl', NULL, NULL, NULL);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
