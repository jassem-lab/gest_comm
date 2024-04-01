-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2022 at 03:55 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deltacom`
--
CREATE DATABASE IF NOT EXISTS `deltacom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `deltacom`;

-- --------------------------------------------------------

--
-- Table structure for table `delta_action`
--

CREATE TABLE IF NOT EXISTS `delta_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_action`
--

INSERT INTO `delta_action` (`id`, `action`) VALUES
(1, 'Creation'),
(2, 'Modification\r\n'),
(3, 'Suppression\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `delta_autorisation_profils`
--

CREATE TABLE IF NOT EXISTS `delta_autorisation_profils` (
  `codsoc` int(11) NOT NULL,
  `idprofil` int(11) NOT NULL,
  `utilisateurs.php` int(11) NOT NULL,
  `socs.php` int(11) NOT NULL,
  `tabs.php` int(11) NOT NULL,
  `produits.php` int(11) NOT NULL,
  `addedit_produit.php` int(11) NOT NULL,
  `clients.php` int(11) NOT NULL,
  `addedit_client.php` int(11) NOT NULL,
  `fournisseurs.php` int(11) NOT NULL,
  `addedit_fournisseur.php` int(11) NOT NULL,
  `gest_be.php` int(11) NOT NULL,
  `gest_bs.php` int(11) NOT NULL,
  `gest_devis.php` int(11) NOT NULL,
  `gest_bc.php` int(11) NOT NULL,
  `gest_bl.php` int(11) NOT NULL,
  `gest_fact.php` int(11) NOT NULL,
  `gest_avoir.php` int(11) NOT NULL,
  `gest_paie_cli.php` int(11) NOT NULL,
  `gest_paie_frn.php` int(11) NOT NULL,
  `etat_paie_cli.php` int(11) NOT NULL,
  `etat_paie_frn.php` int(11) NOT NULL,
  `journal.php` int(11) NOT NULL,
  `ca.php` int(11) NOT NULL,
  `cli_frn.php` int(11) NOT NULL,
  `stock_prd.php` int(11) NOT NULL,
  `mvt_stock.php` int(11) NOT NULL,
  `val_stock.php` int(11) NOT NULL,
  `inventaire_stock.php` int(11) NOT NULL,
  `autorisation_profils.php` int(11) NOT NULL,
  `autorisation_users.php` int(11) NOT NULL,
  `autorisation_addprofils.php` int(11) NOT NULL,
  `addedit_be.php` int(11) NOT NULL,
  `addedit_bl.php` int(11) NOT NULL,
  `addedit_devis.php` int(11) NOT NULL,
  `profils.php` int(11) NOT NULL,
  `gest_det_devis.php` int(11) NOT NULL,
  `paremtrage.php` int(11) NOT NULL,
  `taxs.php` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delta_autorisation_profils`
--

INSERT INTO `delta_autorisation_profils` (`codsoc`, `idprofil`, `utilisateurs.php`, `socs.php`, `tabs.php`, `produits.php`, `addedit_produit.php`, `clients.php`, `addedit_client.php`, `fournisseurs.php`, `addedit_fournisseur.php`, `gest_be.php`, `gest_bs.php`, `gest_devis.php`, `gest_bc.php`, `gest_bl.php`, `gest_fact.php`, `gest_avoir.php`, `gest_paie_cli.php`, `gest_paie_frn.php`, `etat_paie_cli.php`, `etat_paie_frn.php`, `journal.php`, `ca.php`, `cli_frn.php`, `stock_prd.php`, `mvt_stock.php`, `val_stock.php`, `inventaire_stock.php`, `autorisation_profils.php`, `autorisation_users.php`, `autorisation_addprofils.php`, `addedit_be.php`, `addedit_bl.php`, `addedit_devis.php`, `profils.php`, `gest_det_devis.php`, `paremtrage.php`, `taxs.php`) VALUES
(1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_autorisation_utilisateur`
--

CREATE TABLE IF NOT EXISTS `delta_autorisation_utilisateur` (
  `codsoc` int(11) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `utilisateurs.php` int(11) NOT NULL,
  `socs.php` int(11) NOT NULL,
  `tabs.php` int(11) NOT NULL,
  `produits.php` int(11) NOT NULL,
  `addedit_produit.php` int(11) NOT NULL,
  `clients.php` int(11) NOT NULL,
  `addedit_client.php` int(11) NOT NULL,
  `fournisseurs.php` int(11) NOT NULL,
  `addedit_fournisseur.php` int(11) NOT NULL,
  `gest_be.php` int(11) NOT NULL,
  `gest_bs.php` int(11) NOT NULL,
  `gest_devis.php` int(11) NOT NULL,
  `gest_bc.php` int(11) NOT NULL,
  `gest_bl.php` int(11) NOT NULL,
  `gest_fact.php` int(11) NOT NULL,
  `gest_avoir.php` int(11) NOT NULL,
  `gest_paie_cli.php` int(11) NOT NULL,
  `gest_paie_frn.php` int(11) NOT NULL,
  `etat_paie_cli.php` int(11) NOT NULL,
  `etat_paie_frn.php` int(11) NOT NULL,
  `journal.php` int(11) NOT NULL,
  `ca.php` int(11) NOT NULL,
  `cli_frn.php` int(11) NOT NULL,
  `stock_prd.php` int(11) NOT NULL,
  `mvt_stock.php` int(11) NOT NULL,
  `val_stock.php` int(11) NOT NULL,
  `inventaire_stock.php` int(11) NOT NULL,
  `autorisation_profils.php` int(11) NOT NULL,
  `autorisation_users.php` int(11) NOT NULL,
  `autorisation_addprofils.php` int(11) NOT NULL,
  `addedit_be.php` int(11) NOT NULL,
  `addedit_bl.php` int(11) NOT NULL,
  `addedit_devis.php` int(11) NOT NULL,
  `profils.php` int(11) NOT NULL,
  `gest_det_devis.php` int(11) NOT NULL,
  `paremtrage.php` int(11) NOT NULL,
  `taxs.php` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delta_autorisation_utilisateur`
--

INSERT INTO `delta_autorisation_utilisateur` (`codsoc`, `idutilisateur`, `utilisateurs.php`, `socs.php`, `tabs.php`, `produits.php`, `addedit_produit.php`, `clients.php`, `addedit_client.php`, `fournisseurs.php`, `addedit_fournisseur.php`, `gest_be.php`, `gest_bs.php`, `gest_devis.php`, `gest_bc.php`, `gest_bl.php`, `gest_fact.php`, `gest_avoir.php`, `gest_paie_cli.php`, `gest_paie_frn.php`, `etat_paie_cli.php`, `etat_paie_frn.php`, `journal.php`, `ca.php`, `cli_frn.php`, `stock_prd.php`, `mvt_stock.php`, `val_stock.php`, `inventaire_stock.php`, `autorisation_profils.php`, `autorisation_users.php`, `autorisation_addprofils.php`, `addedit_be.php`, `addedit_bl.php`, `addedit_devis.php`, `profils.php`, `gest_det_devis.php`, `paremtrage.php`, `taxs.php`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_banques`
--

CREATE TABLE IF NOT EXISTS `delta_banques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `delta_banques`
--

INSERT INTO `delta_banques` (`id`, `code`, `designation`, `codsoc`) VALUES
(3, 'UIB', 'UIB', 1),
(5, 'STB', 'STB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_banque_client`
--

CREATE TABLE IF NOT EXISTS `delta_banque_client` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `banque` varchar(255) NOT NULL,
  `rib` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `swift` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delta_banque_client`
--

INSERT INTO `delta_banque_client` (`id`, `client`, `banque`, `rib`, `iban`, `swift`) VALUES
(0, 2, 'Attijari', '32131231251321', '32131231251321', '32131231251321'),
(0, 7, 'Attijari', '32131231251321', '32131231251321', '32131231251321'),
(0, 8, 'Attijari', '32131231251321', '32131231251321', '32131231251321');

-- --------------------------------------------------------

--
-- Table structure for table `delta_banque_fournisseur`
--

CREATE TABLE IF NOT EXISTS `delta_banque_fournisseur` (
  `id` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `rib` varchar(255) NOT NULL,
  `banque` varchar(255) NOT NULL,
  `swift` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delta_be`
--

CREATE TABLE IF NOT EXISTS `delta_be` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `observation` text NOT NULL,
  `montant` varchar(255) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `dateheure` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL,
  `exercice` int(255) NOT NULL,
  `magasin` int(11) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_be`
--

INSERT INTO `delta_be` (`id`, `numero`, `date`, `fournisseur`, `observation`, `montant`, `idutilisateur`, `dateheure`, `etat`, `exercice`, `magasin`, `codsoc`) VALUES
(1, '20220001', '2022-06-17', 2, '', '7855.87', 1, '2022-06-17 08:00:35', 0, 2022, 2, 1),
(2, '20220002', '2022-06-18', 2, '', '3095.19', 1, '2022-06-18 08:50:21', 0, 2022, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_bl`
--

CREATE TABLE IF NOT EXISTS `delta_bl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `client` int(11) NOT NULL,
  `observation` text NOT NULL,
  `montant` varchar(255) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `dateheure` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL,
  `exercice` int(255) NOT NULL,
  `magasin` int(11) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `num_exoneration` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `nature_client` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_bl`
--

INSERT INTO `delta_bl` (`id`, `numero`, `date`, `client`, `observation`, `montant`, `idutilisateur`, `dateheure`, `etat`, `exercice`, `magasin`, `codsoc`, `num_exoneration`, `date_debut`, `date_fin`, `nature_client`) VALUES
(1, '20220001', '2022-06-18', 2, '', '324.489', 1, '2022-06-18 07:35:36', 0, 2022, 2, 1, '2514142525', '2022-06-12', '2023-06-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_clients`
--

CREATE TABLE IF NOT EXISTS `delta_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `raison_social` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `matricule_fiscale` varchar(255) NOT NULL,
  `registre_commerce` varchar(255) NOT NULL,
  `pays` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `banque` varchar(255) NOT NULL,
  `rib` varchar(255) NOT NULL,
  `gsm2` varchar(255) NOT NULL,
  `mail2` varchar(255) NOT NULL,
  `nature` int(11) NOT NULL,
  `activite` varchar(255) NOT NULL,
  `swift` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `num_exoneration` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `delta_clients`
--

INSERT INTO `delta_clients` (`id`, `code`, `raison_social`, `mail`, `tel`, `adresse`, `matricule_fiscale`, `registre_commerce`, `pays`, `region`, `zone`, `banque`, `rib`, `gsm2`, `mail2`, `nature`, `activite`, `swift`, `iban`, `archive`, `codsoc`, `num_exoneration`, `date_debut`, `date_fin`) VALUES
(2, 'C0001', 'Gaaloul Jassem', 'jassemgaaloul123@gmail.com', '21367778', 'msaken', '123123125', '4324324121', 1, 0, 4, '3', '01234567890123456789', '11111', 'jassemgaaloul12345@gmail.com', 1, 'test', '', '251425214', 0, 1, '2514142525', '2022-06-12', '2023-06-21'),
(7, 'C0002', 'Client ', 'client@client.com', '73000111', 'Rio de janeiro riadh sousse\r\nsousse', 'MF 000 123 AAA', '15241425', 1, 2, 2, '3', '01234567890123456789', '', '', 2, 'Activité', '251414', '251425214', 0, 0, '', '', ''),
(8, 'C0003', 'SOCIETE ABC', 'trabelsi.majdi18@gmail.com', '21186227', 'Rio de janeiro riadh sousse\r\nsousse', 'TEST', 'TEST', 0, 0, 0, '4', '', '', '', 4, 'Informatique', '', '251425214', 0, 0, '521441253652', '2022-06-17', '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `delta_colisage`
--

CREATE TABLE IF NOT EXISTS `delta_colisage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `nbr_pieces` int(255) NOT NULL,
  `poids_vide` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_colisage`
--

INSERT INTO `delta_colisage` (`id`, `code`, `designation`, `nbr_pieces`, `poids_vide`, `codsoc`) VALUES
(1, 'COL1', 'Colisage 11', 20, '100', 1),
(2, 'COL2', 'Colisage 12', 12, '50', 1),
(3, 'COL3', 'Colisage 13', 6, '25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_commerciaux`
--

CREATE TABLE IF NOT EXISTS `delta_commerciaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CIN` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `RIB` varchar(255) NOT NULL,
  `permis` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `delta_commerciaux`
--

INSERT INTO `delta_commerciaux` (`id`, `CIN`, `nom`, `prenom`, `RIB`, `permis`, `tel`, `adresse`, `email`, `code`, `codsoc`) VALUES
(5, '3123125', 'gaaloul', 'jassem', '32131251', '32131251', '23132151', 'msaken', 'jassem@gmail.com', '1', 1),
(6, '09342314', 'TRABELSI', 'MAJDI', '0221425', '0221425', '21186227', 'Rio de janeiro riadh sousse', 'trabelsi.majdi18@gmail.com', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_contacts_client`
--

CREATE TABLE IF NOT EXISTS `delta_contacts_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `nomcontact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `delta_contacts_client`
--

INSERT INTO `delta_contacts_client` (`id`, `client`, `email`, `telephone`, `nomcontact`) VALUES
(1, 0, 'mail2@mail.com', '70111222', ''),
(2, 0, '', '', ''),
(3, 0, '', '', ''),
(35, 2, 'trabelsi.majdi18@gmail.com', '21186227', ''),
(36, 7, '', '90802011', ''),
(37, 8, 'trabelsi.majdi@yahoo.fr', '21186227', ''),
(41, 2, 'trabelsi@gmail.com', '', ''),
(42, 7, 'trabelsi.m@gmail.com', '21186001', ''),
(44, 7, 'trabelsi.majdi18@gmail.com', '21186227', ''),
(45, 2, 'trabelsi.ma@gmail.com', '21186002', ''),
(46, 8, 'majdi19@gmail.com', '21186880', ''),
(47, 7, 'trabelsi.majdi20@gmail.com', '21186227', ''),
(48, 8, 'trabelsi@gmail.com', '', ''),
(49, 7, 'trabelsi.majdi18@gmail.com', '21186227', '');

-- --------------------------------------------------------

--
-- Table structure for table `delta_contacts_fournisseur`
--

CREATE TABLE IF NOT EXISTS `delta_contacts_fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fournisseur` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `nomcontact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_contacts_fournisseur`
--

INSERT INTO `delta_contacts_fournisseur` (`id`, `fournisseur`, `email`, `telephone`, `nomcontact`) VALUES
(1, '1', 'jas.frn@gmail.com', '75221552', ''),
(3, '2', '', '75110224', ''),
(4, '2', 'trabelsi..m@majdi.com', '22277', '');

-- --------------------------------------------------------

--
-- Table structure for table `delta_det_be`
--

CREATE TABLE IF NOT EXISTS `delta_det_be` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idbe` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `px_ht` varchar(255) NOT NULL,
  `tva` varchar(255) NOT NULL,
  `val_tva` varchar(255) NOT NULL,
  `px_ttc` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantite_colis` int(11) NOT NULL,
  `quantite_par_colis` int(11) NOT NULL,
  `taux_remise` varchar(255) NOT NULL,
  `valeur_remise` varchar(255) NOT NULL,
  `px_ht_total` varchar(255) NOT NULL,
  `px_ht_total_remise` varchar(255) NOT NULL,
  `px_total` varchar(255) NOT NULL,
  `date_achat` varchar(255) NOT NULL,
  `colisage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `delta_det_be`
--

INSERT INTO `delta_det_be` (`id`, `idbe`, `produit`, `px_ht`, `tva`, `val_tva`, `px_ttc`, `quantite`, `quantite_colis`, `quantite_par_colis`, `taux_remise`, `valeur_remise`, `px_ht_total`, `px_ht_total_remise`, `px_total`, `date_achat`, `colisage`) VALUES
(10, 1, 3, '20', '19', '3.8', '23.800', 55, 0, 0, '', '', '', '', '1309.000', '2022-06-17', 0),
(11, 1, 4, '22', '7', '1.54', '23.540', 180, 15, 12, '15', '635.580', '', '', '3601.620', '2022-06-17', 1),
(12, 1, 6, '16.5', '19', '3.135', '19.635', 150, 0, 0, '', '', '', '', '2945.250', '2022-06-17', 0),
(13, 2, 3, '20', '19', '3.8', '23.800', 15, 0, 0, '25', '75.000', '300.000', '225.000', '267.750', '2022-06-18', 0),
(14, 2, 6, '16.5', '19', '3.135', '19.635', 180, 15, 12, '20', '594.000', '2970.000', '2376.000', '2827.440', '2022-06-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_det_bl`
--

CREATE TABLE IF NOT EXISTS `delta_det_bl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idbl` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `fodec` int(11) NOT NULL,
  `taux_fodec` int(11) NOT NULL,
  `total_fodec` int(11) NOT NULL,
  `px_ht` varchar(255) NOT NULL,
  `tva` varchar(255) NOT NULL,
  `val_tva` varchar(255) NOT NULL,
  `px_ttc` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantite_colis` int(11) NOT NULL,
  `quantite_par_colis` int(11) NOT NULL,
  `px_ht_total` varchar(255) NOT NULL,
  `taux_remise` varchar(255) NOT NULL,
  `valeur_remise` varchar(255) NOT NULL,
  `px_total` varchar(255) NOT NULL,
  `px_ht_total_remise` varchar(255) NOT NULL,
  `date_livraison` varchar(255) NOT NULL,
  `colisage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_det_bl`
--

INSERT INTO `delta_det_bl` (`id`, `idbl`, `produit`, `fodec`, `taux_fodec`, `total_fodec`, `px_ht`, `tva`, `val_tva`, `px_ttc`, `quantite`, `quantite_colis`, `quantite_par_colis`, `px_ht_total`, `taux_remise`, `valeur_remise`, `px_total`, `px_ht_total_remise`, `date_livraison`, `colisage`) VALUES
(1, 1, 3, 0, 1, 0, '20', '19', '3.8', '23.800', 12, 0, 0, '200.000', '15', '36.000', '242.760', '204.000', '2022-06-18', 0),
(2, 1, 6, 1, 1, 0, '20.200', '19', '3.838', '24.038', 4, 0, 0, '33.330', '15', '12.120', '81.729', '68.680', '2022-06-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_det_devis`
--

CREATE TABLE IF NOT EXISTS `delta_det_devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idbl` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `fodec` int(11) NOT NULL,
  `taux_fodec` int(11) NOT NULL,
  `total_fodec` int(11) NOT NULL,
  `px_ht` varchar(255) NOT NULL,
  `tva` varchar(255) NOT NULL,
  `val_tva` varchar(255) NOT NULL,
  `px_ttc` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantite_colis` int(11) NOT NULL,
  `quantite_par_colis` int(11) NOT NULL,
  `px_ht_total` varchar(255) NOT NULL,
  `taux_remise` varchar(255) NOT NULL,
  `valeur_remise` varchar(255) NOT NULL,
  `px_total` varchar(255) NOT NULL,
  `px_ht_total_remise` varchar(255) NOT NULL,
  `date_livraison` varchar(255) NOT NULL,
  `colisage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `delta_det_devis`
--

INSERT INTO `delta_det_devis` (`id`, `idbl`, `produit`, `fodec`, `taux_fodec`, `total_fodec`, `px_ht`, `tva`, `val_tva`, `px_ttc`, `quantite`, `quantite_colis`, `quantite_par_colis`, `px_ht_total`, `taux_remise`, `valeur_remise`, `px_total`, `px_ht_total_remise`, `date_livraison`, `colisage`) VALUES
(4, 1, 3, 0, 1, 0, '20', '19', '3.8', '23.800', 153, 0, 0, '3060.000', '', '', '3641.400', '3060.000', '2022-06-30', 0),
(5, 1, 4, 0, 1, 0, '22', '7', '1.54', '23.540', 240, 20, 12, '5280.000', '', '', '5649.600', '5280.000', '2022-06-30', 1),
(6, 1, 6, 0, 1, 0, '16.665', '19', '3.135', '19.635', 240, 20, 12, '3999.600', '15', '599.940', '4045.595', '3399.660', '2022-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_devisclient`
--

CREATE TABLE IF NOT EXISTS `delta_devisclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `client` int(11) NOT NULL,
  `observation` text NOT NULL,
  `montant` varchar(255) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `dateheure` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL,
  `exercice` int(255) NOT NULL,
  `validite` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `num_exoneration` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `nature_client` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_devisclient`
--

INSERT INTO `delta_devisclient` (`id`, `numero`, `date`, `client`, `observation`, `montant`, `idutilisateur`, `dateheure`, `etat`, `exercice`, `validite`, `codsoc`, `num_exoneration`, `date_debut`, `date_fin`, `nature_client`) VALUES
(1, '20220001', '2022-06-30', 8, '', '13336.595', 1, '2022-06-18 09:25:30', 0, 2022, '1986', 1, '521441253652', '2022-06-17', '2023-06-17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `delta_devise`
--

CREATE TABLE IF NOT EXISTS `delta_devise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `nombre_chiffre` int(11) NOT NULL,
  `symbole` varchar(255) NOT NULL,
  `taux` varchar(255) NOT NULL,
  `defaut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_devise`
--

INSERT INTO `delta_devise` (`id`, `code`, `designation`, `codsoc`, `nombre_chiffre`, `symbole`, `taux`, `defaut`) VALUES
(1, 'USD', 'Dollar', 1, 2, '$', '', 0),
(2, 'Euro', 'Euro', 1, 2, '€', '', 0),
(3, 'TND', 'Dinar', 1, 3, 'TND', '', 1),
(4, 'CAD', 'Dollar', 1, 2, '$', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_documents`
--

CREATE TABLE IF NOT EXISTS `delta_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `delta_documents`
--

INSERT INTO `delta_documents` (`id`, `document`) VALUES
(1, 'Utilisateur'),
(2, 'Societe'),
(3, 'Famille produit'),
(4, 'Unite'),
(5, 'Marque'),
(6, 'Emplacement'),
(7, 'Banque\r\n'),
(8, 'Devis'),
(9, 'TVA'),
(10, 'Pays'),
(11, 'Région'),
(12, 'Gouvernorat'),
(13, 'Mode paiement'),
(14, 'Magasin\r\n'),
(15, 'Colisage'),
(16, 'Commerciaux\r\n'),
(17, 'Véhicule\r\n'),
(18, 'Retenue à la source'),
(19, 'Client'),
(20, 'Fournisseur\r\n'),
(21, 'Entrée marchandises'),
(22, 'Livraisons client'),
(23, 'Devis client'),
(24, 'Paramètrage d''exercice'),
(25, 'Paramètrage des taxs');

-- --------------------------------------------------------

--
-- Table structure for table `delta_emplacements`
--

CREATE TABLE IF NOT EXISTS `delta_emplacements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_emplacements`
--

INSERT INTO `delta_emplacements` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'EMP1', 'Emplacement 1', 1),
(2, 'EMP2', 'Emplacement 2', 1),
(3, 'EMP3', 'Emplacement 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_famille_produit`
--

CREATE TABLE IF NOT EXISTS `delta_famille_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `delta_famille_produit`
--

INSERT INTO `delta_famille_produit` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'FAM1', 'Famille 1', 1),
(2, 'FAM2', 'Famille2', 1),
(3, 'FAM3', 'Famille 3a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_fournisseurs`
--

CREATE TABLE IF NOT EXISTS `delta_fournisseurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `raison_social` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `matricule_fiscale` varchar(255) NOT NULL,
  `registre_commerce` varchar(255) NOT NULL,
  `pays` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `banque` int(11) NOT NULL,
  `rib` varchar(255) NOT NULL,
  `gsm2` varchar(255) NOT NULL,
  `mail2` varchar(255) NOT NULL,
  `activite` varchar(255) NOT NULL,
  `swift` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_fournisseurs`
--

INSERT INTO `delta_fournisseurs` (`id`, `code`, `raison_social`, `mail`, `adresse`, `tel`, `matricule_fiscale`, `registre_commerce`, `pays`, `zone`, `region`, `banque`, `rib`, `gsm2`, `mail2`, `activite`, `swift`, `iban`, `archive`, `codsoc`) VALUES
(1, 'F001', 'Gaaloul Jassem', 'jassemgaaloul123@gmail.com', 'test', '312412512', '3123125', '123123123215', 1, 4, 4, 3, '01234567890123456789', '', '', 'test', '', '', 0, 0),
(2, 'F0002', 'Fournisseur 1', 'fournisseur@fournisseur.com', 'Rio de janeiro riadh sousse\r\nsousse', '73000111', 'MF 000 123 AAA', '15241425', 1, 2, 2, 3, '01234567890123456789', '', '', 'Informatique', '251414', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_log`
--

CREATE TABLE IF NOT EXISTS `delta_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateheure` varchar(255) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `document` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `iddocument` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=407 ;

--
-- Dumping data for table `delta_log`
--

INSERT INTO `delta_log` (`id`, `dateheure`, `idutilisateur`, `document`, `action`, `iddocument`, `code`) VALUES
(1, '2022-06-08 07:45:24', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(2, '2022-06-08 08:02:36', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(3, '2022-06-08 08:04:00', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(4, '2022-06-08 08:05:55', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(5, '2022-06-08 08:06:02', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(6, '2022-06-08 08:06:02', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(7, '2022-06-08 08:06:03', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(8, '2022-06-08 08:08:03', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(9, '2022-06-08 08:08:06', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(10, '2022-06-08 08:08:07', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(11, '2022-06-08 08:08:17', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(12, '2022-06-08 08:08:17', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(13, '2022-06-08 08:08:18', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(14, '2022-06-08 08:08:18', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(15, '2022-06-08 08:09:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(16, '2022-06-08 08:09:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(17, '2022-06-08 08:09:19', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(18, '2022-06-08 08:09:19', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(19, '2022-06-08 08:09:37', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(20, '2022-06-08 08:09:37', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(21, '2022-06-08 08:09:37', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(22, '2022-06-08 08:09:38', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(23, '2022-06-08 08:09:38', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(24, '2022-06-08 08:14:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(25, '2022-06-08 08:14:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(26, '2022-06-08 08:18:05', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(27, '2022-06-08 08:18:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(28, '2022-06-08 08:18:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(29, '2022-06-08 08:18:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(30, '2022-06-08 08:19:03', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(31, '2022-06-08 08:19:04', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(32, '2022-06-08 08:22:39', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(33, '2022-06-08 08:22:40', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(34, '2022-06-08 08:22:58', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(35, '2022-06-08 08:22:59', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(36, '2022-06-08 08:24:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(37, '2022-06-08 08:24:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(38, '2022-06-08 08:24:13', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(39, '2022-06-08 08:24:36', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(40, '2022-06-08 08:24:50', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(41, '2022-06-08 08:34:45', 1, 3, '1', 1, ''),
(42, '2022-06-08 08:39:33', 1, 3, '1', 2, ''),
(43, '2022-06-08 09:13:57', 0, 3, '2', 1, ''),
(44, '2022-06-08 09:14:11', 0, 3, '2', 2, ''),
(45, '2022-06-08 09:14:16', 0, 3, '2', 2, ''),
(46, '2022-06-08 09:19:11', 1, 3, '1', 3, ''),
(47, '2022-06-08 09:19:11', 1, 3, '1', 1, ''),
(48, '2022-06-08 09:20:29', 1, 3, '1', 2, ''),
(49, '2022-06-08 09:24:52', 1, 3, '1', 3, ''),
(50, '2022-06-08 09:26:48', 1, 3, '1', 4, ''),
(51, '2022-06-08 09:27:46', 1, 3, '1', 5, ''),
(52, '2022-06-08 09:28:06', 1, 3, '1', 6, ''),
(53, '2022-06-08 09:30:32', 1, 3, '1', 7, ''),
(54, '2022-06-08 09:30:37', 1, 3, '1', 3, ''),
(55, '2022-06-08 09:39:26', 0, 3, '2', 5, ''),
(56, '2022-06-08 09:45:48', 1, 3, '1', 1, ''),
(57, '2022-06-08 09:47:41', 1, 3, '1', 1, ''),
(58, '2022-06-08 09:49:30', 1, 3, '1', 1, ''),
(59, '2022-06-08 09:50:15', 1, 3, '1', 1, ''),
(60, '2022-06-08 09:53:28', 0, 3, '2', 1, ''),
(61, '2022-06-08 09:53:28', 0, 3, '2', 1, ''),
(62, '2022-06-08 09:54:46', 1, 3, '2', 1, ''),
(63, '2022-06-08 09:54:46', 1, 3, '2', 1, ''),
(64, '2022-06-08 09:57:03', 1, 3, '2', 1, ''),
(65, '2022-06-08 09:57:03', 1, 3, '1', 1, ''),
(66, '2022-06-08 09:58:05', 1, 3, '2', 1, ''),
(67, '2022-06-08 09:58:05', 1, 3, '1', 2, ''),
(68, '2022-06-08 09:58:11', 1, 3, '1', 1, ''),
(69, '2022-06-08 09:58:11', 1, 3, '1', 3, ''),
(70, '2022-06-08 09:59:45', 1, 3, '1', 2, ''),
(71, '2022-06-08 09:59:45', 1, 3, '1', 1, ''),
(72, '2022-06-08 10:10:37', 1, 3, '1', 1, ''),
(73, '2022-06-08 10:10:55', 1, 3, '1', 2, ''),
(74, '2022-06-08 10:11:10', 1, 3, '1', 3, ''),
(75, '2022-06-08 10:11:58', 1, 3, '2', 2, ''),
(76, '2022-06-08 10:16:37', 1, 3, '1', 1, ''),
(77, '2022-06-08 10:23:17', 1, 3, '2', 1, ''),
(78, '2022-06-08 10:23:17', 1, 3, '1', 1, ''),
(79, '2022-06-08 10:23:24', 1, 3, '1', 2, ''),
(80, '2022-06-08 10:23:24', 1, 3, '1', 2, ''),
(81, '2022-06-08 10:23:35', 1, 3, '1', 3, ''),
(82, '2022-06-08 10:23:35', 1, 3, '1', 3, ''),
(83, '2022-06-08 10:25:09', 1, 3, '1', 1, ''),
(84, '2022-06-08 10:25:18', 1, 3, '1', 2, ''),
(85, '2022-06-08 10:25:27', 1, 3, '1', 3, ''),
(86, '2022-06-08 10:28:04', 1, 3, '1', 1, ''),
(87, '2022-06-08 10:28:12', 1, 3, '1', 2, ''),
(88, '2022-06-08 10:28:17', 1, 3, '1', 3, ''),
(89, '2022-06-08 10:28:22', 1, 3, '1', 4, ''),
(90, '2022-06-08 10:31:56', 1, 3, '1', 1, ''),
(91, '2022-06-08 10:32:19', 1, 3, '1', 1, ''),
(92, '2022-06-08 10:32:50', 1, 3, '1', 1, ''),
(93, '2022-06-08 10:33:02', 1, 3, '2', 1, ''),
(94, '2022-06-08 10:35:15', 1, 3, '2', 1, ''),
(95, '2022-06-08 10:35:15', 1, 3, '1', 1, ''),
(96, '2022-06-08 10:36:58', 1, 3, '1', 1, ''),
(97, '2022-06-08 10:37:09', 1, 3, '1', 2, ''),
(98, '2022-06-08 10:37:19', 1, 3, '2', 2, ''),
(99, '2022-06-08 10:37:26', 1, 3, '1', 3, ''),
(100, '2022-06-08 10:37:31', 1, 3, '1', 4, ''),
(101, '2022-06-08 10:37:36', 1, 3, '1', 5, ''),
(102, '2022-06-08 10:37:42', 1, 3, '1', 6, ''),
(103, '2022-06-08 10:37:49', 1, 3, '1', 7, ''),
(104, '2022-06-08 10:40:19', 1, 3, '1', 1, ''),
(105, '2022-06-08 10:40:26', 1, 3, '1', 2, ''),
(106, '2022-06-08 10:40:31', 1, 3, '1', 3, ''),
(107, '2022-06-08 10:44:17', 1, 3, '1', 1, ''),
(108, '2022-06-08 10:44:23', 1, 3, '1', 2, ''),
(109, '2022-06-08 10:44:30', 1, 3, '1', 3, ''),
(110, '2022-06-08 10:44:34', 1, 3, '1', 4, ''),
(111, '2022-06-08 10:44:38', 1, 3, '1', 5, ''),
(112, '2022-06-08 10:44:46', 1, 3, '1', 6, ''),
(113, '2022-06-08 10:58:30', 1, 3, '1', 1, ''),
(114, '2022-06-08 10:58:38', 1, 3, '1', 2, ''),
(115, '2022-06-08 10:58:41', 1, 3, '2', 1, ''),
(116, '2022-06-08 11:00:06', 1, 3, '1', 2, ''),
(117, '2022-06-08 11:10:13', 1, 3, '1', 1, ''),
(118, '2022-06-08 11:12:32', 1, 3, '1', 1, ''),
(119, '2022-06-08 11:15:19', 1, 3, '1', 4, ''),
(120, '2022-06-08 11:17:26', 1, 3, '1', 3, ''),
(121, '2022-06-08 11:18:25', 1, 3, '1', 4, ''),
(122, '2022-06-08 11:19:37', 1, 3, '1', 1, ''),
(123, '2022-06-08 11:19:40', 1, 3, '1', 2, ''),
(124, '2022-06-08 11:22:02', 1, 3, '1', 8, ''),
(125, '2022-06-08 11:23:20', 1, 3, '1', 4, ''),
(126, '2022-06-08 11:24:47', 1, 3, '1', 7, ''),
(127, '2022-06-08 13:27:54', 1, 7, '3', 4, ''),
(128, '2022-06-08 13:28:00', 1, 7, '1', 4, ''),
(129, '2022-06-08 13:29:22', 1, 7, '3', 1, ''),
(130, '2022-06-08 13:33:14', 1, 7, '3', 2, 'STB'),
(131, '2022-06-08 14:44:04', 1, 8, '1', 2, ''),
(132, '2022-06-08 14:44:09', 1, 8, '3', 1, 'test'),
(133, '2022-06-08 14:45:26', 1, 8, '3', 2, 'dollar'),
(134, '2022-06-08 14:45:45', 1, 8, '1', 1, ''),
(135, '2022-06-08 14:46:11', 1, 8, '2', 1, ''),
(136, '2022-06-08 14:46:48', 1, 8, '1', 2, ''),
(137, '2022-06-08 14:47:03', 1, 8, '1', 3, ''),
(138, '2022-06-08 14:47:14', 1, 8, '1', 4, ''),
(139, '2022-06-08 14:47:17', 1, 8, '2', 4, ''),
(140, '2022-06-08 15:06:22', 1, 13, '2', 0, ''),
(141, '2022-06-08 15:06:57', 1, 13, '2', 0, ''),
(142, '2022-06-08 15:06:58', 1, 13, '2', 0, ''),
(143, '2022-06-08 15:06:59', 1, 13, '2', 0, ''),
(144, '2022-06-08 15:07:04', 1, 13, '2', 0, ''),
(145, '2022-06-08 15:08:18', 1, 13, '2', 0, ''),
(146, '2022-06-08 15:08:24', 1, 13, '2', 0, ''),
(147, '2022-06-08 15:08:40', 1, 13, '2', 0, ''),
(148, '2022-06-08 15:08:43', 1, 13, '2', 0, ''),
(149, '2022-06-08 15:08:50', 1, 13, '2', 0, ''),
(150, '2022-06-08 15:08:51', 1, 13, '2', 0, ''),
(151, '2022-06-08 15:09:12', 1, 13, '2', 0, ''),
(152, '2022-06-08 15:09:12', 1, 13, '2', 0, ''),
(153, '2022-06-08 15:09:13', 1, 13, '2', 0, ''),
(154, '2022-06-08 15:18:14', 1, 13, '2', 0, ''),
(155, '2022-06-08 15:18:44', 1, 13, '2', 0, ''),
(156, '2022-06-08 15:19:27', 1, 13, '2', 0, ''),
(157, '2022-06-08 15:19:50', 1, 13, '2', 0, ''),
(158, '2022-06-08 15:19:50', 1, 13, '2', 0, ''),
(159, '2022-06-08 15:19:57', 1, 13, '2', 0, ''),
(160, '2022-06-08 15:20:03', 1, 13, '2', 0, ''),
(161, '2022-06-08 15:20:03', 1, 13, '2', 0, ''),
(162, '2022-06-08 15:20:03', 1, 13, '2', 0, ''),
(163, '2022-06-08 15:20:04', 1, 13, '2', 0, ''),
(164, '2022-06-08 15:20:04', 1, 13, '2', 0, ''),
(165, '2022-06-08 15:20:10', 1, 13, '2', 0, ''),
(166, '2022-06-08 15:20:10', 1, 13, '2', 0, ''),
(167, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(168, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(169, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(170, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(171, '2022-06-08 15:21:40', 1, 13, '2', 0, ''),
(172, '2022-06-09 22:56:33', 1, 10, '3', 7, 'Finland'),
(173, '2022-06-10 07:54:31', 1, 5, '1', 1, ''),
(174, '2022-06-10 08:10:25', 1, 5, '1', 2, ''),
(175, '2022-06-10 08:27:28', 1, 5, '1', 3, ''),
(176, '2022-06-10 08:43:38', 1, 5, '1', 1, ''),
(177, '2022-06-10 08:47:03', 1, 5, '1', 2, ''),
(178, '2022-06-10 08:47:04', 1, 5, '1', 3, ''),
(179, '2022-06-10 08:47:05', 1, 5, '1', 4, ''),
(180, '2022-06-10 08:48:09', 1, 5, '1', 5, ''),
(181, '2022-06-10 08:48:25', 1, 5, '1', 6, ''),
(182, '2022-06-10 08:48:28', 1, 5, '1', 7, ''),
(183, '2022-06-10 08:48:28', 1, 5, '1', 8, ''),
(184, '2022-06-10 08:48:29', 1, 5, '1', 9, ''),
(185, '2022-06-10 08:48:29', 1, 5, '1', 10, ''),
(186, '2022-06-10 08:48:30', 1, 5, '1', 11, ''),
(187, '2022-06-10 08:49:01', 1, 5, '1', 12, ''),
(188, '2022-06-10 08:51:33', 1, 5, '1', 13, ''),
(189, '2022-06-11 11:11:51', 1, 11, '1', 1, ''),
(190, '2022-06-11 11:11:51', 1, 16, '1', 1, ''),
(191, '2022-06-11 11:12:28', 1, 11, '1', 1, ''),
(192, '2022-06-11 11:12:28', 1, 16, '1', 1, ''),
(193, '2022-06-11 11:13:06', 1, 11, '1', 1, ''),
(194, '2022-06-11 11:13:06', 1, 16, '1', 1, ''),
(195, '2022-06-11 11:13:12', 1, 11, '1', 1, ''),
(196, '2022-06-11 11:13:12', 1, 16, '1', 1, ''),
(197, '2022-06-11 11:14:53', 1, 17, '1', 1, ''),
(198, '2022-06-11 11:14:53', 1, 16, '1', 1, ''),
(199, '2022-06-11 11:15:03', 1, 17, '1', 1, ''),
(200, '2022-06-11 11:15:03', 1, 16, '1', 1, ''),
(201, '2022-06-11 11:15:33', 1, 17, '1', 1, ''),
(202, '2022-06-11 11:16:19', 1, 17, '1', 1, ''),
(203, '2022-06-11 11:18:02', 1, 16, '1', 1, ''),
(204, '2022-06-11 11:20:42', 1, 16, '1', 1, ''),
(205, '2022-06-11 11:21:27', 1, 16, '1', 1, ''),
(206, '2022-06-11 11:22:15', 1, 16, '1', 1, ''),
(207, '2022-06-11 11:23:00', 1, 16, '1', 2, ''),
(208, '2022-06-11 11:23:00', 1, 16, '1', 3, ''),
(209, '2022-06-11 11:23:05', 1, 16, '1', 4, ''),
(210, '2022-06-11 11:23:05', 1, 16, '1', 5, ''),
(211, '2022-06-11 11:26:37', 1, 16, '3', 1, '321312'),
(212, '2022-06-11 11:26:40', 1, 16, '3', 2, '321312'),
(213, '2022-06-11 11:26:42', 1, 16, '3', 3, '321312'),
(214, '2022-06-11 11:26:44', 1, 16, '3', 4, '321312'),
(215, '2022-06-11 11:37:49', 1, 18, '1', 1, ''),
(216, '2022-06-13 07:35:13', 1, 15, '1', 1, ''),
(217, '2022-06-13 07:38:03', 1, 15, '1', 1, ''),
(218, '2022-06-13 07:41:12', 1, 5, '1', 1, ''),
(219, '2022-06-13 07:44:34', 1, 5, '1', 2, ''),
(220, '2022-06-13 07:45:21', 1, 5, '1', 3, ''),
(221, '2022-06-13 07:55:55', 1, 5, '1', 4, ''),
(222, '2022-06-13 07:57:08', 1, 5, '1', 1, ''),
(223, '2022-06-13 08:04:09', 1, 5, '1', 2, ''),
(224, '2022-06-13 08:04:09', 1, 5, '2', 2, ''),
(225, '2022-06-13 08:18:19', 1, 5, '1', 2, ''),
(226, '2022-06-13 08:18:19', 1, 5, '2', 2, ''),
(227, '2022-06-13 08:18:49', 1, 5, '1', 2, ''),
(228, '2022-06-13 08:18:49', 1, 5, '2', 2, ''),
(229, '2022-06-13 08:19:47', 1, 5, '1', 2, ''),
(230, '2022-06-13 08:20:57', 1, 5, '1', 2, ''),
(231, '2022-06-13 08:21:20', 1, 5, '1', 2, ''),
(232, '2022-06-13 08:24:00', 1, 5, '1', 3, ''),
(233, '2022-06-13 08:43:32', 1, 5, '1', 1, ''),
(234, '2022-06-13 09:10:52', 1, 5, '1', 2, ''),
(235, '2022-06-13 09:10:52', 1, 5, '2', 2, ''),
(236, '2022-06-13 09:14:24', 1, 5, '1', 1, ''),
(237, '2022-06-13 09:14:24', 1, 5, '2', 1, ''),
(238, '2022-06-13 09:21:58', 1, 5, '1', 2, ''),
(239, '2022-06-13 09:21:58', 1, 5, '2', 2, ''),
(240, '2022-06-13 09:29:53', 1, 5, '1', 1, ''),
(241, '2022-06-13 09:29:53', 1, 5, '2', 1, ''),
(242, '2022-06-13 10:55:00', 1, 19, '1', 2, ''),
(243, '2022-06-13 10:55:56', 1, 19, '1', 2, ''),
(244, '2022-06-13 10:59:23', 1, 19, '1', 2, ''),
(245, '2022-06-13 13:52:00', 1, 19, '2', 2, ''),
(246, '2022-06-13 15:19:54', 1, 20, '1', 1, ''),
(247, '2022-06-13 15:20:45', 1, 20, '1', 1, ''),
(248, '2022-06-13 15:21:10', 1, 20, '1', 1, ''),
(249, '2022-06-14 14:37:46', 1, 9, '1', 1, ''),
(250, '2022-06-14 14:37:50', 1, 9, '1', 2, ''),
(251, '2022-06-14 14:37:55', 1, 9, '1', 3, ''),
(252, '2022-06-14 14:38:02', 1, 9, '1', 4, ''),
(253, '2022-06-14 14:47:47', 1, 4, '1', 3, ''),
(254, '2022-06-14 14:47:56', 1, 4, '1', 4, ''),
(255, '2022-06-14 14:48:10', 1, 3, '2', 2, ''),
(256, '2022-06-14 14:48:16', 1, 3, '2', 1, ''),
(257, '2022-06-14 14:48:23', 1, 3, '1', 3, ''),
(258, '2022-06-14 14:48:36', 1, 5, '1', 2, ''),
(259, '2022-06-14 14:49:10', 1, 5, '2', 2, ''),
(260, '2022-06-14 14:49:21', 1, 5, '2', 1, ''),
(261, '2022-06-14 14:49:28', 1, 5, '1', 3, ''),
(262, '2022-06-14 14:49:41', 1, 14, '2', 2, ''),
(263, '2022-06-14 14:49:45', 1, 14, '2', 2, ''),
(264, '2022-06-14 14:49:53', 1, 14, '2', 4, ''),
(265, '2022-06-14 14:50:01', 1, 6, '2', 1, ''),
(266, '2022-06-14 14:50:07', 1, 6, '1', 2, ''),
(267, '2022-06-14 14:50:16', 1, 6, '1', 3, ''),
(268, '2022-06-14 14:50:35', 1, 15, '2', 1, ''),
(269, '2022-06-14 14:50:35', 1, 15, '2', 1, ''),
(270, '2022-06-14 14:50:46', 1, 15, '2', 1, ''),
(271, '2022-06-14 14:50:49', 1, 15, '2', 1, ''),
(272, '2022-06-14 14:52:38', 1, 18, '1', 1, ''),
(273, '2022-06-14 14:52:44', 1, 18, '1', 2, ''),
(274, '2022-06-14 14:52:49', 1, 18, '1', 3, ''),
(275, '2022-06-14 14:52:55', 1, 18, '1', 4, ''),
(276, '2022-06-14 14:53:03', 1, 18, '1', 5, ''),
(277, '2022-06-14 14:53:07', 1, 18, '1', 6, ''),
(278, '2022-06-14 14:54:34', 1, 17, '1', 2, ''),
(279, '2022-06-14 15:27:00', 1, 17, '3', 1, '132TUN3113'),
(280, '2022-06-14 15:27:08', 1, 17, '1', 3, ''),
(281, '2022-06-14 15:31:08', 1, 16, '2', 5, ''),
(282, '2022-06-14 15:31:25', 1, 16, '1', 6, ''),
(283, '2022-06-14 15:32:05', 1, 15, '1', 2, ''),
(284, '2022-06-14 15:32:33', 1, 15, '1', 3, ''),
(285, '2022-06-14 15:32:45', 1, 15, '3', 3, 'COL2'),
(286, '2022-06-14 15:32:58', 1, 15, '1', 3, ''),
(287, '2022-06-15 08:15:59', 1, 5, '1', 2, ''),
(288, '2022-06-15 08:18:29', 1, 5, '1', 3, ''),
(289, '2022-06-15 08:20:07', 1, 5, '1', 4, ''),
(290, '2022-06-15 08:20:53', 1, 5, '1', 4, ''),
(291, '2022-06-15 08:21:17', 1, 5, '1', 5, ''),
(292, '2022-06-15 08:21:50', 1, 5, '1', 6, ''),
(293, '2022-06-15 08:34:40', 1, 5, '1', 7, ''),
(294, '2022-06-15 08:34:41', 1, 5, '2', 6, ''),
(295, '2022-06-15 08:36:55', 1, 5, '2', 6, ''),
(296, '2022-06-15 08:37:47', 1, 5, '2', 6, ''),
(297, '2022-06-15 08:39:04', 1, 5, '2', 6, ''),
(298, '2022-06-15 08:39:20', 1, 10, '3', 1, ''),
(299, '2022-06-15 09:37:21', 1, 19, '1', 7, ''),
(300, '2022-06-15 10:49:18', 1, 19, '1', 7, ''),
(301, '2022-06-15 10:50:03', 1, 19, '1', 7, ''),
(302, '2022-06-15 10:50:44', 1, 19, '1', 8, ''),
(303, '2022-06-15 10:50:56', 1, 19, '2', 8, ''),
(304, '2022-06-15 11:17:25', 1, 20, '1', 2, ''),
(305, '2022-06-15 16:03:31', 1, 19, '2', 2, ''),
(306, '2022-06-16 07:55:32', 1, 5, '1', 7, ''),
(307, '2022-06-16 07:57:22', 1, 5, '1', 8, ''),
(308, '2022-06-16 07:57:44', 1, 5, '1', 9, ''),
(309, '2022-06-16 07:58:08', 1, 5, '1', 10, ''),
(310, '2022-06-16 07:58:34', 1, 5, '1', 11, ''),
(311, '2022-06-16 08:45:03', 1, 5, '1', 12, ''),
(312, '2022-06-16 08:45:38', 1, 5, '1', 13, ''),
(313, '2022-06-16 08:45:38', 1, 5, '1', 14, ''),
(314, '2022-06-16 08:51:13', 1, 5, '1', 15, ''),
(315, '2022-06-16 08:52:49', 1, 5, '1', 16, ''),
(316, '2022-06-16 08:54:27', 1, 5, '1', 17, ''),
(317, '2022-06-16 09:10:52', 1, 5, '1', 18, ''),
(318, '2022-06-16 09:17:41', 1, 5, '1', 19, ''),
(319, '2022-06-16 09:17:41', 1, 5, '1', 20, ''),
(320, '2022-06-16 09:19:46', 1, 5, '1', 21, ''),
(321, '2022-06-16 09:20:04', 1, 5, '1', 22, ''),
(322, '2022-06-16 09:20:24', 1, 5, '1', 23, ''),
(323, '2022-06-16 09:20:37', 1, 5, '1', 24, ''),
(324, '2022-06-16 09:21:27', 1, 5, '1', 25, ''),
(325, '2022-06-16 09:22:17', 1, 5, '1', 26, ''),
(326, '2022-06-16 09:22:31', 1, 5, '1', 27, ''),
(327, '2022-06-16 09:22:34', 1, 5, '1', 28, ''),
(328, '2022-06-16 09:23:06', 1, 5, '1', 29, ''),
(329, '2022-06-16 09:23:09', 1, 5, '1', 30, ''),
(330, '2022-06-16 09:24:15', 1, 5, '2', 2, ''),
(331, '2022-06-16 09:24:25', 1, 5, '2', 3, ''),
(332, '2022-06-16 09:24:58', 1, 5, '2', 4, ''),
(333, '2022-06-16 09:25:01', 1, 5, '2', 4, ''),
(334, '2022-06-16 09:25:04', 1, 5, '2', 4, ''),
(335, '2022-06-16 09:25:18', 1, 5, '2', 4, ''),
(336, '2022-06-16 10:34:34', 1, 10, '3', 30, ''),
(337, '2022-06-16 10:34:38', 1, 10, '3', 29, ''),
(338, '2022-06-16 10:34:44', 1, 10, '3', 28, ''),
(339, '2022-06-16 14:26:26', 1, 21, '1', 1, ''),
(340, '2022-06-16 14:27:50', 1, 21, '1', 1, ''),
(341, '2022-06-16 14:28:24', 1, 21, '1', 1, ''),
(342, '2022-06-16 14:37:35', 1, 21, '1', 1, ''),
(343, '2022-06-16 14:42:08', 1, 21, '1', 1, ''),
(344, '2022-06-17 08:00:35', 1, 21, '1', 1, ''),
(345, '2022-06-17 09:14:27', 1, 5, '2', 6, ''),
(346, '2022-06-17 09:36:54', 1, 19, '2', 8, ''),
(347, '2022-06-17 09:59:48', 1, 21, '2', 1, ''),
(348, '2022-06-17 10:00:01', 1, 21, '2', 1, ''),
(349, '2022-06-18 07:35:36', 1, 22, '1', 1, ''),
(350, '2022-06-18 08:33:46', 1, 22, '2', 1, ''),
(351, '2022-06-18 08:33:56', 1, 22, '2', 1, ''),
(352, '2022-06-18 08:34:24', 1, 22, '2', 1, ''),
(353, '2022-06-18 08:34:54', 1, 22, '2', 1, ''),
(354, '2022-06-18 08:36:25', 1, 22, '2', 1, ''),
(355, '2022-06-18 08:50:21', 1, 21, '1', 2, ''),
(356, '2022-06-18 09:07:39', 1, 23, '1', 1, ''),
(357, '2022-06-18 09:09:37', 1, 23, '1', 1, ''),
(358, '2022-06-18 09:10:20', 1, 23, '1', 1, ''),
(359, '2022-06-18 09:11:08', 1, 23, '1', 1, ''),
(360, '2022-06-18 09:11:38', 1, 23, '1', 1, ''),
(361, '2022-06-18 09:12:49', 1, 23, '1', 1, ''),
(362, '2022-06-18 09:13:45', 1, 23, '1', 2, ''),
(363, '2022-06-18 09:24:12', 1, 23, '3', 0, ''),
(364, '2022-06-18 09:24:31', 1, 23, '3', 0, ''),
(365, '2022-06-18 09:25:30', 1, 23, '1', 1, ''),
(366, '2022-06-19 12:37:19', 1, 24, '2', 1, ''),
(367, '2022-06-19 13:41:17', 1, 3, '1', 4, ''),
(368, '2022-06-19 13:43:31', 1, 3, '2', 2, ''),
(369, '2022-06-19 13:48:46', 1, 3, '1', 4, ''),
(370, '2022-06-19 13:55:04', 1, 4, '1', 5, ''),
(371, '2022-06-19 13:55:10', 1, 4, '3', 5, 'AA'),
(372, '2022-06-19 13:59:36', 1, 5, '2', 3, ''),
(373, '2022-06-19 13:59:42', 1, 5, '2', 3, ''),
(374, '2022-06-19 13:59:46', 1, 5, '2', 3, ''),
(375, '2022-06-19 14:37:36', 1, 14, '1', 5, ''),
(376, '2022-06-19 17:34:18', 1, 13, '1', 4, ''),
(377, '2022-06-19 17:34:31', 1, 13, '3', 4, 'Espèce'),
(378, '2022-06-19 17:36:13', 1, 13, '1', 4, ''),
(379, '2022-06-19 17:36:24', 1, 13, '3', 4, 'Chèque	'),
(380, '2022-06-19 17:49:40', 1, 7, '3', 3, 'ATB'),
(381, '2022-06-19 17:49:50', 1, 18, '1', 7, ''),
(382, '2022-06-19 17:53:24', 1, 18, '1', 8, ''),
(383, '2022-06-19 17:53:28', 1, 7, '3', 8, ''),
(384, '2022-06-19 17:54:17', 1, 18, '3', 8, ' T'),
(385, '2022-06-19 17:54:27', 1, 18, '3', 7, ' Montants égaux ou supérieurs à 1 000 DT payés au titre des acquisitions de marchandises, matériel, équipements et de services effectuées auprès des sociétés soumises à l’IS au taux de 15%.'),
(386, '2022-06-22 09:27:38', 1, 7, '1', 5, ''),
(387, '2022-06-22 09:57:25', 1, 3, '1', 4, ''),
(388, '2022-06-22 09:57:46', 1, 3, '1', 5, ''),
(389, '2022-06-22 09:58:58', 1, 3, '1', 6, ''),
(390, '2022-06-22 10:07:45', 1, 3, '2', 2, ''),
(391, '2022-06-22 10:09:29', 1, 3, '2', 5, ''),
(392, '2022-06-22 10:13:24', 1, 3, '2', 3, ''),
(393, '2022-06-22 10:35:27', 1, 13, '2', 1, ''),
(394, '2022-06-22 12:33:46', 1, 9, '2', 2, ''),
(395, '2022-06-22 12:34:05', 1, 9, '2', 3, ''),
(396, '2022-06-22 12:34:55', 1, 9, '2', 4, ''),
(397, '2022-06-22 12:35:02', 1, 9, '2', 1, ''),
(398, '2022-06-22 14:48:01', 1, 5, '2', 1, ''),
(399, '2022-06-22 14:48:06', 1, 5, '2', 2, ''),
(400, '2022-06-22 14:48:24', 1, 5, '1', 4, ''),
(401, '2022-06-22 14:52:25', 1, 14, '2', 2, ''),
(402, '2022-06-22 14:52:38', 1, 14, '2', 2, ''),
(403, '2022-06-22 14:52:46', 1, 14, '2', 2, ''),
(404, '2022-06-22 15:14:50', 1, 14, '2', 2, ''),
(405, '2022-06-22 15:53:19', 1, 17, '2', 2, ''),
(406, '2022-06-22 15:53:44', 1, 17, '2', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `delta_lots`
--

CREATE TABLE IF NOT EXISTS `delta_lots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_lots`
--

INSERT INTO `delta_lots` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'lot1', 'Lot 1', 1),
(2, 'lot2', 'Lot 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_magasins`
--

CREATE TABLE IF NOT EXISTS `delta_magasins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `defaut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_magasins`
--

INSERT INTO `delta_magasins` (`id`, `code`, `designation`, `codsoc`, `defaut`) VALUES
(2, 'MAG01', 'Magasin 1', 1, 1),
(4, 'MAG2', 'Magasin 2', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_marques`
--

CREATE TABLE IF NOT EXISTS `delta_marques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_marques`
--

INSERT INTO `delta_marques` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'MRQ2', 'Marque 1', 1),
(2, 'MRQ1', 'Marque 2', 1),
(3, 'MRQ3', 'Marque 3', 1),
(4, 'MRQ4', 'Marque 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_mode_paiement`
--

CREATE TABLE IF NOT EXISTS `delta_mode_paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_mode_paiement`
--

INSERT INTO `delta_mode_paiement` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'CH', 'Chèque', 1),
(2, 'Espèce', 'Espèce', 1),
(3, 'Virement', 'Virement', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_natures`
--

CREATE TABLE IF NOT EXISTS `delta_natures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nature` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_natures`
--

INSERT INTO `delta_natures` (`id`, `nature`) VALUES
(1, 'Produit'),
(2, 'Service\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `delta_natures_client`
--

CREATE TABLE IF NOT EXISTS `delta_natures_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nature` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `delta_natures_client`
--

INSERT INTO `delta_natures_client` (`id`, `nature`) VALUES
(1, 'Client normal'),
(2, 'Client exonéré de la TVA'),
(3, 'Client Assujiti de la TVA'),
(4, 'Client exnoéré de Fodec'),
(5, 'Client exonéré de la TVA et Fodec');

-- --------------------------------------------------------

--
-- Table structure for table `delta_nature_prd`
--

CREATE TABLE IF NOT EXISTS `delta_nature_prd` (
  `id` int(11) NOT NULL,
  `nature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delta_nature_prd`
--

INSERT INTO `delta_nature_prd` (`id`, `nature`) VALUES
(1, 'Matière première'),
(2, 'Semis-fini'),
(3, 'Produit Finis'),
(4, 'Emballage'),
(5, 'Consigne');

-- --------------------------------------------------------

--
-- Table structure for table `delta_parametres`
--

CREATE TABLE IF NOT EXISTS `delta_parametres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timbre` varchar(255) NOT NULL,
  `fodec` varchar(255) NOT NULL,
  `exercice` varchar(255) NOT NULL,
  `assujetti` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_parametres`
--

INSERT INTO `delta_parametres` (`id`, `timbre`, `fodec`, `exercice`, `assujetti`) VALUES
(1, '600', '1', '2022', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delta_pays`
--

CREATE TABLE IF NOT EXISTS `delta_pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `delta_pays`
--

INSERT INTO `delta_pays` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'Tunisie', 'Tunisie', 1),
(2, 'USA', 'USA', 1),
(4, 'Egypt', 'Egypt', 1),
(5, 'Qatar', 'Qatar', 1),
(6, 'Algerie', 'Algerie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_produits`
--

CREATE TABLE IF NOT EXISTS `delta_produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `code_ngp` varchar(255) NOT NULL,
  `famille` int(11) NOT NULL,
  `unite` int(11) NOT NULL,
  `marque` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `date_achat` varchar(255) NOT NULL,
  `date_fabrication` varchar(255) NOT NULL,
  `date_expiration` varchar(255) NOT NULL,
  `prix_achat_ht` varchar(255) NOT NULL,
  `prix_achat_ttc` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `seuil` varchar(255) NOT NULL,
  `tva` int(11) NOT NULL,
  `emplacement` int(11) NOT NULL,
  `magasin` int(11) NOT NULL,
  `nature` int(11) NOT NULL,
  `lot` int(11) NOT NULL,
  `prix_vente_ht` varchar(255) NOT NULL,
  `prix_vente_ttc` varchar(255) NOT NULL,
  `numero_serie` int(11) NOT NULL,
  `fodec` int(11) NOT NULL,
  `produit_compose` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `colisage` int(11) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `delta_produits`
--

INSERT INTO `delta_produits` (`id`, `reference`, `designation`, `code_ngp`, `famille`, `unite`, `marque`, `fournisseur`, `date_achat`, `date_fabrication`, `date_expiration`, `prix_achat_ht`, `prix_achat_ttc`, `stock`, `seuil`, `tva`, `emplacement`, `magasin`, `nature`, `lot`, `prix_vente_ht`, `prix_vente_ttc`, `numero_serie`, `fodec`, `produit_compose`, `type`, `codsoc`, `colisage`, `archive`) VALUES
(3, 'PRD002', 'Produit 002', '', 1, 3, 0, 0, '', '', '', '20', '23.800', '54', '25', 19, 0, 0, 0, 0, '25', '29.750', 0, 0, 0, 0, 1, 0, 0),
(4, 'PRD003', 'Produit 003', '', 1, 3, 0, 0, '', '', '', '22', '23.540', '180', '30', 7, 0, 0, 0, 0, '23', '24.610', 0, 0, 0, 0, 1, 2, 0),
(5, 'SER001', 'Service 001', '', 3, 4, 0, 0, '', '', '', '125', '133.750', '0', '0', 7, 0, 0, 1, 0, '136', '145.520', 0, 0, 0, 0, 1, 3, 0),
(6, 'PRD004', 'Produit 001', '5214255884', 2, 2, 1, 0, '', '', '', '16.5', '19.635', '326', '15', 19, 1, 0, 0, 0, '19.8', '23.562', 0, 1, 0, 0, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_profil`
--

CREATE TABLE IF NOT EXISTS `delta_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codsoc` int(11) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_profil`
--

INSERT INTO `delta_profil` (`id`, `codsoc`, `profil`, `archive`) VALUES
(1, 1, 'Super Administrateur', 0),
(2, 1, 'Utilisateur', 0),
(3, 1, 'Commercial', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_regions`
--

CREATE TABLE IF NOT EXISTS `delta_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `delta_regions`
--

INSERT INTO `delta_regions` (`id`, `code`, `designation`, `codsoc`) VALUES
(2, 'Tunis', 'Tunis', 1),
(3, 'Nabeul', 'Nabeul', 1),
(4, 'Monastir', 'Monastir', 1),
(5, 'Ariana', 'Ariana', 1),
(6, 'Ben arous', 'Ben Arous', 1),
(7, 'Mahdia', 'Mahdia', 1),
(8, 'Sousse', 'Sousse', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_retenues`
--

CREATE TABLE IF NOT EXISTS `delta_retenues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codsoc` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `taux` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `delta_retenues`
--

INSERT INTO `delta_retenues` (`id`, `codsoc`, `label`, `taux`) VALUES
(1, 1, 'Honoraires, commissions, courtages, loyers et rémunérations des activités non commerciales et de performance.', '10'),
(2, 1, 'Honoraires servis aux personnes soumises au régime réel.	', '3'),
(3, 1, 'Montants égaux ou supérieurs à 1 000 DT payés au titre des acquisitions de marchandises, matériel, équipements et de services effectuées auprès des sociétés soumises à l’IS au taux de 15%.	', '1'),
(4, 1, 'Plus-value réalisée par les sociétés non résidentes et non établies en Tunisie, suite à la cession des titres et droits y relatifs, avec un maximum de 5% du prix de cession.	', '15'),
(5, 1, 'Plus-value réalisée par les sociétés non résidentes et non établies en Tunisie, suite à la cession des biens immobiliers. (base = prix de cession)	', '10'),
(6, 1, 'Commissions payées pour les sociétés de commerce international.	', '10');

-- --------------------------------------------------------

--
-- Table structure for table `delta_societe`
--

CREATE TABLE IF NOT EXISTS `delta_societe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raisonsocial` varchar(255) NOT NULL,
  `mf` varchar(255) NOT NULL,
  `rc` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `pied` varchar(255) NOT NULL,
  `entete` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_societe`
--

INSERT INTO `delta_societe` (`id`, `raisonsocial`, `mf`, `rc`, `telephone`, `mail`, `adresse`, `logo`, `pied`, `entete`) VALUES
(1, 'Delta Web IT', '123456 AAA 000', '02332235', '21186227', 'deltawebit20@gmail.com', 'test', 'assets/4342acb6122606f985d0a86ef09a133d.PNG', 'assets/4a9ec6c50745a024047745af218c2a73.png', 'assets/d436f4ae95641555d90f09529c4dad7b.png'),
(2, 'Macsi Centre', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `delta_stock_magasin`
--

CREATE TABLE IF NOT EXISTS `delta_stock_magasin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` int(11) NOT NULL,
  `magasin` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_stock_magasin`
--

INSERT INTO `delta_stock_magasin` (`id`, `produit`, `magasin`, `stock`) VALUES
(2, 3, 2, 54),
(3, 4, 2, 180),
(4, 6, 2, 326);

-- --------------------------------------------------------

--
-- Table structure for table `delta_tvas`
--

CREATE TABLE IF NOT EXISTS `delta_tvas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `taux` int(11) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_tvas`
--

INSERT INTO `delta_tvas` (`id`, `code`, `taux`, `codsoc`) VALUES
(1, 'T13', 13, 1),
(2, 'T0', 0, 1),
(3, 'T7', 7, 1),
(4, 'T19', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_types`
--

CREATE TABLE IF NOT EXISTS `delta_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_types`
--

INSERT INTO `delta_types` (`id`, `type`) VALUES
(1, 'Normal'),
(2, 'Fifo'),
(3, 'Filo');

-- --------------------------------------------------------

--
-- Table structure for table `delta_unite_produit`
--

CREATE TABLE IF NOT EXISTS `delta_unite_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_unite_produit`
--

INSERT INTO `delta_unite_produit` (`id`, `code`, `designation`, `codsoc`) VALUES
(2, 'KG', 'Kilogramme', 1),
(3, 'G', 'Gramme', 1),
(4, 'P', 'Pièce', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `delta_utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codsoc` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `idprofil` int(11) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_utilisateurs`
--

INSERT INTO `delta_utilisateurs` (`id`, `codsoc`, `nom`, `prenom`, `mail`, `motdepasse`, `idprofil`, `archive`) VALUES
(1, 1, 'admin', 'admin', 'admin@admin.com', '123', 1, 0),
(2, 1, 'trabelsi ', 'majdi', 'trabelsi.majdi18@gmail.com', '123456', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_vehicules`
--

CREATE TABLE IF NOT EXISTS `delta_vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `tare` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_vehicules`
--

INSERT INTO `delta_vehicules` (`id`, `matricule`, `model`, `codsoc`, `marque`, `tare`, `charge`) VALUES
(2, '123456 TUN 0251', 'Model', 1, 'Renault', '', ''),
(3, '123456 TUN 251455', 'Model 2', 1, 'GMC', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `delta_zones`
--

CREATE TABLE IF NOT EXISTS `delta_zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_zones`
--

INSERT INTO `delta_zones` (`id`, `code`, `designation`, `codsoc`) VALUES
(2, 'Grand Tunis', 'Grand Tunis', 1),
(3, 'Cap Bon', 'Cap Bon', 1),
(4, 'Sahel', 'Sahel', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
