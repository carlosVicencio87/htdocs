-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 12, 2021 at 09:14 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

--
-- Database: `valuaciones`
--

-- --------------------------------------------------------

--
-- Table structure for table `ALCALDIAS`
--

CREATE TABLE `ALCALDIAS` (
  `id` int(11) NOT NULL,
  `alcaldia` int(11) NOT NULL,
  `nombre_alcaldia`varchar(400) NOT NULL,
  `colonia_catastral` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_colonia` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `region` int(11) NOT NULL,
  `manzana` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ALCALDIAS`
--

INSERT INTO `ALCALDIAS` (`id`, `alcaldia`,`nombre_alcaldia`, `colonia_catastral`, `nombre_colonia`, `region`, `manzana`, `valor`) VALUES
(1, 2,' ', 'A020223', 'LOTERIA NACIONAL', 44, 117, 2368.68),
(4, 2,' ', 'A020343', 'SAN SALVADORE XOCHIMANCA', 44, 277, 2681.63),
(5, 1,' ', 'A010073', 'ACUEDUCTO', 37, 496, 1615.37),
(6, 9,'Iztapalapa', 'A090013', 'Lomas el manto', 47, 563, 1509.31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ALCALDIAS`
--
ALTER TABLE `ALCALDIAS`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ALCALDIAS`
--
ALTER TABLE `ALCALDIAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
