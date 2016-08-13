-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Ago-2016 às 14:12
-- Versão do servidor: 5.5.50-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `webpost`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `confsite`
--

CREATE TABLE IF NOT EXISTS `confsite` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_nome` text COLLATE utf8_unicode_ci NOT NULL,
  `co_link1` text COLLATE utf8_unicode_ci NOT NULL,
  `co_link2` text COLLATE utf8_unicode_ci NOT NULL,
  `co_link3` text COLLATE utf8_unicode_ci NOT NULL,
  `co_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `co_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `co_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `confsite`
--

INSERT INTO `confsite` (`co_id`, `co_nome`, `co_link1`, `co_link2`, `co_link3`, `co_img`, `co_desc`, `co_data`) VALUES
(1, 'FabrÃ­cio PaixÃ£o', 'PortfÃ³lio', 'About', 'Contact', 'posts/inscreva-se-no-canal-youtube-1000.png', 'Website teste', '2015-12-24 13:40:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_nome` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `us_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `us_pass` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `us_chave` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `us_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`us_id`, `us_nome`, `us_email`, `us_pass`, `us_chave`, `us_data`) VALUES
(3, 'admin', 'fa@fa.com', '21232f297a57a5a743894a0e4a801fc3', '4f571d0a019d941e2720017cdbb91b31', '2015-12-28 14:47:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `portfolio`
--

INSERT INTO `portfolio` (`id`, `titulo`, `link`, `img`) VALUES
(1, 'Mapa', 'Modal7', 'img/portfolio/trajeto-para-trancoso.png'),
(2, 'RadioDJ', 'Modal8', 'img/portfolio/radiodj.png'),
(3, 'tecnologia 3', 'Modal1', 'img/portfolio/online-estudar-vestibular-examtime.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobre`
--

CREATE TABLE IF NOT EXISTS `sobre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `texto1` longtext COLLATE utf8_unicode_ci NOT NULL,
  `texto2` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sobre`
--

INSERT INTO `sobre` (`id`, `titulo`, `texto1`, `texto2`) VALUES
(1, 'Sobre', 'Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization. ', 'Whether you''re a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;