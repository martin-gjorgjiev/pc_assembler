-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 03:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcparts`
--
CREATE DATABASE IF NOT EXISTS `pcparts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;
USE `pcparts`;

-- --------------------------------------------------------

--
-- Table structure for table `chipset`
--

CREATE TABLE `chipset` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idseries` int(11) DEFAULT NULL,
  `idsocket` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `tdp` int(11) NOT NULL,
  `integrated_gpu` tinyint(1) NOT NULL,
  `supportedmemspeed` int(11) NOT NULL,
  `supportedmemsize` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cpuview`
-- (See below for the actual view)
--
CREATE TABLE `cpuview` (
`id` int(11)
,`maker name` varchar(30)
,`series name` varchar(30)
,`socket name` varchar(30)
,`name` varchar(50)
,`price` int(11)
,`tdp` int(11)
,`integrated_gpu` tinyint(1)
,`supportedmemspeed` int(11)
,`supportedmemsize` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idseries` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `rec_wattage` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `gpuview`
-- (See below for the actual view)
--
CREATE TABLE `gpuview` (
`id` int(11)
,`maker name` varchar(30)
,`series name` varchar(30)
,`name` varchar(50)
,`rec_wattage` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobo`
--

CREATE TABLE `mobo` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idsocket` int(11) DEFAULT NULL,
  `idchipset` int(11) DEFAULT NULL,
  `idramtype` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `maxmemspeed` int(11) NOT NULL,
  `maxmemsize` int(11) NOT NULL,
  `maxmemslots` int(11) NOT NULL,
  `maxm2slots` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `moboview`
-- (See below for the actual view)
--
CREATE TABLE `moboview` (
`id` int(11)
,`maker name` varchar(30)
,`socket name` varchar(30)
,`chipset name` varchar(30)
,`ram type` varchar(10)
,`name` varchar(30)
,`maxmemspeed` int(11)
,`maxmemsize` int(11)
,`maxmemslots` int(11)
,`maxm2slots` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `pccase`
--

CREATE TABLE `pccase` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pccaseview`
-- (See below for the actual view)
--
CREATE TABLE `pccaseview` (
`id` int(11)
,`maker name` varchar(30)
,`name` varchar(30)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `psu`
--

CREATE TABLE `psu` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `wattage` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `psuview`
-- (See below for the actual view)
--
CREATE TABLE `psuview` (
`id` int(11)
,`maker name` varchar(30)
,`name` varchar(30)
,`wattage` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `rammemory`
--

CREATE TABLE `rammemory` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idramtype` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `speed` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `slots` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ramtype`
--

CREATE TABLE `ramtype` (
  `id` int(11) NOT NULL,
  `ram_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `ramview`
-- (See below for the actual view)
--
CREATE TABLE `ramview` (
`id` int(11)
,`maker name` varchar(30)
,`ram type` varchar(10)
,`name` varchar(50)
,`speed` int(11)
,`size` int(11)
,`slots` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `is_cpu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socket`
--

CREATE TABLE `socket` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idtypeslot` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `storagesize` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storagetype`
--

CREATE TABLE `storagetype` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `storageview`
-- (See below for the actual view)
--
CREATE TABLE `storageview` (
`id` int(11)
,`maker name` varchar(30)
,`storage type` varchar(30)
,`name` varchar(30)
,`storagesize` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `supportedcpu`
--

CREATE TABLE `supportedcpu` (
  `id` int(11) NOT NULL,
  `idcpu` int(11) DEFAULT NULL,
  `idchipset` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `accesslvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `accesslvl`) VALUES
(1, 'admin@test.com', '$2y$10$97fbYy0HHOBfpEXYX675QO9LlpFxw/injeApHRdYPqRvZfj621Tma', 2),
(2, 'worker@test.com', '$2y$10$WPCVoT6.66BhEkLod3ksaODddhD2R88ZbXmrqrudb336r65WSOF2i', 1);
-- --------------------------------------------------------

--
-- Structure for view `cpuview`
--
DROP TABLE IF EXISTS `cpuview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cpuview`  AS SELECT `cpu`.`id` AS `id`, `maker`.`name` AS `maker name`, `series`.`name` AS `series name`, `socket`.`name` AS `socket name`, `cpu`.`name` AS `name`, `cpu`.`price` AS `price`, `cpu`.`tdp` AS `tdp`, `cpu`.`integrated_gpu` AS `integrated_gpu`, `cpu`.`supportedmemspeed` AS `supportedmemspeed`, `cpu`.`supportedmemsize` AS `supportedmemsize`, `cpu`.`imgloc` AS `imgloc` FROM (((`cpu` join `maker` on(`cpu`.`idmaker` = `maker`.`id`)) join `series` on(`cpu`.`idseries` = `series`.`id`)) join `socket` on(`cpu`.`idsocket` = `socket`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `gpuview`
--
DROP TABLE IF EXISTS `gpuview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gpuview`  AS SELECT `gpu`.`id` AS `id`, `maker`.`name` AS `maker name`, `series`.`name` AS `series name`, `gpu`.`name` AS `name`, `gpu`.`rec_wattage` AS `rec_wattage`, `gpu`.`price` AS `price`, `gpu`.`imgloc` AS `imgloc` FROM ((`gpu` join `maker` on(`gpu`.`idmaker` = `maker`.`id`)) join `series` on(`gpu`.`idseries` = `series`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `moboview`
--
DROP TABLE IF EXISTS `moboview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `moboview`  AS SELECT `mobo`.`id` AS `id`, `maker`.`name` AS `maker name`, `socket`.`name` AS `socket name`, `chipset`.`name` AS `chipset name`, `ramtype`.`ram_type` AS `ram type`, `mobo`.`name` AS `name`, `mobo`.`maxmemspeed` AS `maxmemspeed`, `mobo`.`maxmemsize` AS `maxmemsize`, `mobo`.`maxmemslots` AS `maxmemslots`, `mobo`.`maxm2slots` AS `maxm2slots`, `mobo`.`price` AS `price`, `mobo`.`imgloc` AS `imgloc` FROM ((((`mobo` join `maker` on(`mobo`.`idmaker` = `maker`.`id`)) join `socket` on(`mobo`.`idsocket` = `socket`.`id`)) join `chipset` on(`mobo`.`idchipset` = `chipset`.`id`)) join `ramtype` on(`mobo`.`idramtype` = `ramtype`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `pccaseview`
--
DROP TABLE IF EXISTS `pccaseview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pccaseview`  AS SELECT `pccase`.`id` AS `id`, `maker`.`name` AS `maker name`, `pccase`.`name` AS `name`, `pccase`.`price` AS `price`, `pccase`.`imgloc` AS `imgloc` FROM (`pccase` join `maker` on(`pccase`.`idmaker` = `maker`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `psuview`
--
DROP TABLE IF EXISTS `psuview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `psuview`  AS SELECT `psu`.`id` AS `id`, `maker`.`name` AS `maker name`, `psu`.`name` AS `name`, `psu`.`wattage` AS `wattage`, `psu`.`price` AS `price`, `psu`.`imgloc` AS `imgloc` FROM (`psu` join `maker` on(`psu`.`idmaker` = `maker`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `ramview`
--
DROP TABLE IF EXISTS `ramview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ramview`  AS SELECT `rammemory`.`id` AS `id`, `maker`.`name` AS `maker name`, `ramtype`.`ram_type` AS `ram type`, `rammemory`.`name` AS `name`, `rammemory`.`speed` AS `speed`, `rammemory`.`size` AS `size`, `rammemory`.`slots` AS `slots`, `rammemory`.`price` AS `price`, `rammemory`.`imgloc` AS `imgloc` FROM ((`rammemory` join `maker` on(`rammemory`.`idmaker` = `maker`.`id`)) join `ramtype` on(`rammemory`.`idramtype` = `ramtype`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `storageview`
--
DROP TABLE IF EXISTS `storageview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `storageview`  AS SELECT `storage`.`id` AS `id`, `maker`.`name` AS `maker name`, `storagetype`.`name` AS `storage type`, `storage`.`name` AS `name`, `storage`.`storagesize` AS `storagesize`, `storage`.`price` AS `price`, `storage`.`imgloc` AS `imgloc` FROM ((`storage` join `maker` on(`storage`.`idmaker` = `maker`.`id`)) join `storagetype` on(`storage`.`idtypeslot` = `storagetype`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chipset`
--
ALTER TABLE `chipset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idseries` (`idseries`),
  ADD KEY `idsocket` (`idsocket`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idseries` (`idseries`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobo`
--
ALTER TABLE `mobo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idsocket` (`idsocket`),
  ADD KEY `idramtype` (`idramtype`),
  ADD KEY `idchipset` (`idchipset`);

--
-- Indexes for table `pccase`
--
ALTER TABLE `pccase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`);

--
-- Indexes for table `psu`
--
ALTER TABLE `psu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`);

--
-- Indexes for table `rammemory`
--
ALTER TABLE `rammemory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idramtype` (`idramtype`);

--
-- Indexes for table `ramtype`
--
ALTER TABLE `ramtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socket`
--
ALTER TABLE `socket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idtypeslot` (`idtypeslot`);

--
-- Indexes for table `storagetype`
--
ALTER TABLE `storagetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supportedcpu`
--
ALTER TABLE `supportedcpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcpu` (`idcpu`),
  ADD KEY `idchipset` (`idchipset`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chipset`
--
ALTER TABLE `chipset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobo`
--
ALTER TABLE `mobo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pccase`
--
ALTER TABLE `pccase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `psu`
--
ALTER TABLE `psu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rammemory`
--
ALTER TABLE `rammemory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ramtype`
--
ALTER TABLE `ramtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socket`
--
ALTER TABLE `socket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storagetype`
--
ALTER TABLE `storagetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supportedcpu`
--
ALTER TABLE `supportedcpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `cpu_ibfk_1` FOREIGN KEY (`idseries`) REFERENCES `series` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cpu_ibfk_2` FOREIGN KEY (`idsocket`) REFERENCES `socket` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cpu_ibfk_3` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `gpu`
--
ALTER TABLE `gpu`
  ADD CONSTRAINT `gpu_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `gpu_ibfk_2` FOREIGN KEY (`idseries`) REFERENCES `series` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mobo`
--
ALTER TABLE `mobo`
  ADD CONSTRAINT `mobo_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_ibfk_2` FOREIGN KEY (`idchipset`) REFERENCES `chipset` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_ibfk_3` FOREIGN KEY (`idsocket`) REFERENCES `socket` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_ibfk_4` FOREIGN KEY (`idramtype`) REFERENCES `ramtype` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pccase`
--
ALTER TABLE `pccase`
  ADD CONSTRAINT `pccase_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `psu`
--
ALTER TABLE `psu`
  ADD CONSTRAINT `psu_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `rammemory`
--
ALTER TABLE `rammemory`
  ADD CONSTRAINT `rammemory_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `rammemory_ibfk_2` FOREIGN KEY (`idramtype`) REFERENCES `ramtype` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`idtypeslot`) REFERENCES `storagetype` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `supportedcpu`
--
ALTER TABLE `supportedcpu`
  ADD CONSTRAINT `supportedcpu_ibfk_1` FOREIGN KEY (`idcpu`) REFERENCES `cpu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `supportedcpu_ibfk_2` FOREIGN KEY (`idchipset`) REFERENCES `chipset` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
--
-- Database: `pcparts_test`
--
CREATE DATABASE IF NOT EXISTS `pcparts_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;
USE `pcparts_test`;

-- --------------------------------------------------------

--
-- Table structure for table `chipset`
--

CREATE TABLE `chipset` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `chipset`
--

INSERT INTO `chipset` (`id`, `name`) VALUES
(1, 'testchipset');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idseries` int(11) DEFAULT NULL,
  `idsocket` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `tdp` int(11) NOT NULL,
  `integrated_gpu` tinyint(1) NOT NULL,
  `supportedmemspeed` int(11) NOT NULL,
  `supportedmemsize` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `idmaker`, `idseries`, `idsocket`, `name`, `price`, `tdp`, `integrated_gpu`, `supportedmemspeed`, `supportedmemsize`, `imgloc`) VALUES
(1, 1, 1, 1, 'testcpu', 7000, 65, 0, 3600, 126, '1.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cpuview`
-- (See below for the actual view)
--
CREATE TABLE `cpuview` (
`id` int(11)
,`maker name` varchar(30)
,`series name` varchar(30)
,`socket name` varchar(30)
,`name` varchar(50)
,`price` int(11)
,`tdp` int(11)
,`integrated_gpu` tinyint(1)
,`supportedmemspeed` int(11)
,`supportedmemsize` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idseries` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `rec_wattage` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`id`, `idmaker`, `idseries`, `name`, `rec_wattage`, `price`, `imgloc`) VALUES
(1, 1, 2, 'testgpu', 650, 21500, '1.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `gpuview`
-- (See below for the actual view)
--
CREATE TABLE `gpuview` (
`id` int(11)
,`maker name` varchar(30)
,`series name` varchar(30)
,`name` varchar(50)
,`rec_wattage` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `maker`
--

INSERT INTO `maker` (`id`, `name`) VALUES
(1, 'testmaker');

-- --------------------------------------------------------

--
-- Table structure for table `mobo`
--

CREATE TABLE `mobo` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idsocket` int(11) DEFAULT NULL,
  `idchipset` int(11) DEFAULT NULL,
  `idramtype` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `maxmemspeed` int(11) NOT NULL,
  `maxmemsize` int(11) NOT NULL,
  `maxmemslots` int(11) NOT NULL,
  `maxm2slots` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `mobo`
--

INSERT INTO `mobo` (`id`, `idmaker`, `idsocket`, `idchipset`, `idramtype`, `name`, `price`, `maxmemspeed`, `maxmemsize`, `maxmemslots`, `maxm2slots`, `imgloc`) VALUES
(1, 1, 1, 1, 1, 'testmobo', 3900, 4866, 64, 2, 1, '1.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `moboview`
-- (See below for the actual view)
--
CREATE TABLE `moboview` (
`id` int(11)
,`maker name` varchar(30)
,`socket name` varchar(30)
,`chipset name` varchar(30)
,`ram type` varchar(10)
,`name` varchar(30)
,`maxmemspeed` int(11)
,`maxmemsize` int(11)
,`maxmemslots` int(11)
,`maxm2slots` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `pccase`
--

CREATE TABLE `pccase` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `pccase`
--

INSERT INTO `pccase` (`id`, `idmaker`, `name`, `price`, `imgloc`) VALUES
(1, 1, 'testcase', 900, '1.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pccaseview`
-- (See below for the actual view)
--
CREATE TABLE `pccaseview` (
`id` int(11)
,`maker name` varchar(30)
,`name` varchar(30)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `psu`
--

CREATE TABLE `psu` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `wattage` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `psu`
--

INSERT INTO `psu` (`id`, `idmaker`, `name`, `wattage`, `price`, `imgloc`) VALUES
(1, 1, 'testpsu', 700, 4600, '1.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `psuview`
-- (See below for the actual view)
--
CREATE TABLE `psuview` (
`id` int(11)
,`maker name` varchar(30)
,`name` varchar(30)
,`wattage` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `rammemory`
--

CREATE TABLE `rammemory` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idramtype` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `speed` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `slots` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `rammemory`
--

INSERT INTO `rammemory` (`id`, `idmaker`, `idramtype`, `name`, `speed`, `size`, `slots`, `price`, `imgloc`) VALUES
(1, 1, 1, 'testram', 3200, 32, 2, 5300, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ramtype`
--

CREATE TABLE `ramtype` (
  `id` int(11) NOT NULL,
  `ram_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `ramtype`
--

INSERT INTO `ramtype` (`id`, `ram_type`) VALUES
(1, 'testramtyp');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ramview`
-- (See below for the actual view)
--
CREATE TABLE `ramview` (
`id` int(11)
,`maker name` varchar(30)
,`ram type` varchar(10)
,`name` varchar(30)
,`speed` int(11)
,`size` int(11)
,`slots` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `is_cpu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`, `is_cpu`) VALUES
(1, 'testseriesc', 1),
(2, 'testseriesg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `socket`
--

CREATE TABLE `socket` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `socket`
--

INSERT INTO `socket` (`id`, `name`) VALUES
(1, 'testsocket');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `idmaker` int(11) DEFAULT NULL,
  `idtypeslot` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `storagesize` int(11) NOT NULL,
  `imgloc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `idmaker`, `idtypeslot`, `name`, `price`, `storagesize`, `imgloc`) VALUES
(1, 1, 1, 'teststorage', 1000, 120, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `storagetype`
--

CREATE TABLE `storagetype` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `storagetype`
--

INSERT INTO `storagetype` (`id`, `name`) VALUES
(1, 'teststoragetype');

-- --------------------------------------------------------

--
-- Stand-in structure for view `storageview`
-- (See below for the actual view)
--
CREATE TABLE `storageview` (
`id` int(11)
,`maker name` varchar(30)
,`storage type` varchar(30)
,`name` varchar(30)
,`storagesize` int(11)
,`price` int(11)
,`imgloc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `supportedcpu`
--

CREATE TABLE `supportedcpu` (
  `id` int(11) NOT NULL,
  `idcpu` int(11) DEFAULT NULL,
  `idchipset` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `supportedcpu`
--

INSERT INTO `supportedcpu` (`id`, `idcpu`, `idchipset`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `accesslvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `accesslvl`) VALUES
(1, 'admin@test.com', '$2y$10$97fbYy0HHOBfpEXYX675QO9LlpFxw/injeApHRdYPqRvZfj621Tma', 2),
(2, 'worker@test.com', '$2y$10$WPCVoT6.66BhEkLod3ksaODddhD2R88ZbXmrqrudb336r65WSOF2i', 1);

-- --------------------------------------------------------

--
-- Structure for view `cpuview`
--
DROP TABLE IF EXISTS `cpuview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cpuview`  AS SELECT `cpu`.`id` AS `id`, `maker`.`name` AS `maker name`, `series`.`name` AS `series name`, `socket`.`name` AS `socket name`, `cpu`.`name` AS `name`, `cpu`.`price` AS `price`, `cpu`.`tdp` AS `tdp`, `cpu`.`integrated_gpu` AS `integrated_gpu`, `cpu`.`supportedmemspeed` AS `supportedmemspeed`, `cpu`.`supportedmemsize` AS `supportedmemsize`, `cpu`.`imgloc` AS `imgloc` FROM (((`cpu` join `maker` on(`cpu`.`idmaker` = `maker`.`id`)) join `series` on(`cpu`.`idseries` = `series`.`id`)) join `socket` on(`cpu`.`idsocket` = `socket`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `gpuview`
--
DROP TABLE IF EXISTS `gpuview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gpuview`  AS SELECT `gpu`.`id` AS `id`, `maker`.`name` AS `maker name`, `series`.`name` AS `series name`, `gpu`.`name` AS `name`, `gpu`.`rec_wattage` AS `rec_wattage`, `gpu`.`price` AS `price`, `gpu`.`imgloc` AS `imgloc` FROM ((`gpu` join `maker` on(`gpu`.`idmaker` = `maker`.`id`)) join `series` on(`gpu`.`idseries` = `series`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `moboview`
--
DROP TABLE IF EXISTS `moboview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `moboview`  AS SELECT `mobo`.`id` AS `id`, `maker`.`name` AS `maker name`, `socket`.`name` AS `socket name`, `chipset`.`name` AS `chipset name`, `ramtype`.`ram_type` AS `ram type`, `mobo`.`name` AS `name`, `mobo`.`maxmemspeed` AS `maxmemspeed`, `mobo`.`maxmemsize` AS `maxmemsize`, `mobo`.`maxmemslots` AS `maxmemslots`, `mobo`.`maxm2slots` AS `maxm2slots`, `mobo`.`price` AS `price`, `mobo`.`imgloc` AS `imgloc` FROM ((((`mobo` join `maker` on(`mobo`.`idmaker` = `maker`.`id`)) join `socket` on(`mobo`.`idsocket` = `socket`.`id`)) join `chipset` on(`mobo`.`idchipset` = `chipset`.`id`)) join `ramtype` on(`mobo`.`idramtype` = `ramtype`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `pccaseview`
--
DROP TABLE IF EXISTS `pccaseview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pccaseview`  AS SELECT `pccase`.`id` AS `id`, `maker`.`name` AS `maker name`, `pccase`.`name` AS `name`, `pccase`.`price` AS `price`, `pccase`.`imgloc` AS `imgloc` FROM (`pccase` join `maker` on(`pccase`.`idmaker` = `maker`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `psuview`
--
DROP TABLE IF EXISTS `psuview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `psuview`  AS SELECT `psu`.`id` AS `id`, `maker`.`name` AS `maker name`, `psu`.`name` AS `name`, `psu`.`wattage` AS `wattage`, `psu`.`price` AS `price`, `psu`.`imgloc` AS `imgloc` FROM (`psu` join `maker` on(`psu`.`idmaker` = `maker`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `ramview`
--
DROP TABLE IF EXISTS `ramview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ramview`  AS SELECT `rammemory`.`id` AS `id`, `maker`.`name` AS `maker name`, `ramtype`.`ram_type` AS `ram type`, `rammemory`.`name` AS `name`, `rammemory`.`speed` AS `speed`, `rammemory`.`size` AS `size`, `rammemory`.`slots` AS `slots`, `rammemory`.`price` AS `price`, `rammemory`.`imgloc` AS `imgloc` FROM ((`rammemory` join `maker` on(`rammemory`.`idmaker` = `maker`.`id`)) join `ramtype` on(`rammemory`.`idramtype` = `ramtype`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `storageview`
--
DROP TABLE IF EXISTS `storageview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `storageview`  AS SELECT `storage`.`id` AS `id`, `maker`.`name` AS `maker name`, `storagetype`.`name` AS `storage type`, `storage`.`name` AS `name`, `storage`.`storagesize` AS `storagesize`, `storage`.`price` AS `price`, `storage`.`imgloc` AS `imgloc` FROM ((`storage` join `maker` on(`storage`.`idmaker` = `maker`.`id`)) join `storagetype` on(`storage`.`idtypeslot` = `storagetype`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chipset`
--
ALTER TABLE `chipset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idseries` (`idseries`),
  ADD KEY `idsocket` (`idsocket`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idseries` (`idseries`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobo`
--
ALTER TABLE `mobo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idsocket` (`idsocket`),
  ADD KEY `idramtype` (`idramtype`),
  ADD KEY `idchipset` (`idchipset`);

--
-- Indexes for table `pccase`
--
ALTER TABLE `pccase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`);

--
-- Indexes for table `psu`
--
ALTER TABLE `psu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`);

--
-- Indexes for table `rammemory`
--
ALTER TABLE `rammemory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idramtype` (`idramtype`);

--
-- Indexes for table `ramtype`
--
ALTER TABLE `ramtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socket`
--
ALTER TABLE `socket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmaker` (`idmaker`),
  ADD KEY `idtypeslot` (`idtypeslot`);

--
-- Indexes for table `storagetype`
--
ALTER TABLE `storagetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supportedcpu`
--
ALTER TABLE `supportedcpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcpu` (`idcpu`),
  ADD KEY `idchipset` (`idchipset`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chipset`
--
ALTER TABLE `chipset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mobo`
--
ALTER TABLE `mobo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pccase`
--
ALTER TABLE `pccase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `psu`
--
ALTER TABLE `psu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rammemory`
--
ALTER TABLE `rammemory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ramtype`
--
ALTER TABLE `ramtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `socket`
--
ALTER TABLE `socket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storagetype`
--
ALTER TABLE `storagetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supportedcpu`
--
ALTER TABLE `supportedcpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `cpu_ibfk_1` FOREIGN KEY (`idseries`) REFERENCES `series` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cpu_ibfk_2` FOREIGN KEY (`idsocket`) REFERENCES `socket` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cpu_ibfk_3` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `gpu`
--
ALTER TABLE `gpu`
  ADD CONSTRAINT `gpu_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `gpu_ibfk_2` FOREIGN KEY (`idseries`) REFERENCES `series` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mobo`
--
ALTER TABLE `mobo`
  ADD CONSTRAINT `mobo_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_ibfk_2` FOREIGN KEY (`idchipset`) REFERENCES `chipset` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_ibfk_3` FOREIGN KEY (`idsocket`) REFERENCES `socket` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_ibfk_4` FOREIGN KEY (`idramtype`) REFERENCES `ramtype` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pccase`
--
ALTER TABLE `pccase`
  ADD CONSTRAINT `pccase_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `psu`
--
ALTER TABLE `psu`
  ADD CONSTRAINT `psu_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `rammemory`
--
ALTER TABLE `rammemory`
  ADD CONSTRAINT `rammemory_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `rammemory_ibfk_2` FOREIGN KEY (`idramtype`) REFERENCES `ramtype` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`idmaker`) REFERENCES `maker` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`idtypeslot`) REFERENCES `storagetype` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `supportedcpu`
--
ALTER TABLE `supportedcpu`
  ADD CONSTRAINT `supportedcpu_ibfk_1` FOREIGN KEY (`idcpu`) REFERENCES `cpu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `supportedcpu_ibfk_2` FOREIGN KEY (`idchipset`) REFERENCES `chipset` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
