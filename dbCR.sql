USE ibrn09;

CREATE TABLE IF NOT EXISTS `cadCR` (
  `idInscrito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datacad` date DEFAULT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `cpf` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `rg` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,  
  `orgrg` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cep` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `end` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `bairro` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cidade` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tel` varchar(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cel` varchar(14) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `civil` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `memb` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `igreja` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
   PRIMARY KEY (`idInscrito`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;