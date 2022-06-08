-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 08:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grnd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family`
--

CREATE TABLE `tbl_family` (
  `FamilyId` int(8) NOT NULL,
  `UserId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family_members`
--

CREATE TABLE `tbl_family_members` (
  `FamilyMembersIndex` int(11) NOT NULL,
  `FamilyId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest_comments`
--

CREATE TABLE `tbl_guest_comments` (
  `GuestCommentsId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `GusetRate` int(11) NOT NULL,
  `GusetComment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `LogId` int(11) NOT NULL,
  `LogDate` datetime NOT NULL,
  `LogOwner` int(11) NOT NULL,
  `LogAction` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `ManagerId` int(8) NOT NULL,
  `EmpId` int(8) NOT NULL,
  `ManagerPIN` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`ManagerId`, `EmpId`, `ManagerPIN`) VALUES
(1, 4, 55555);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `ReservationId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ReservationDays` int(11) NOT NULL,
  `ReservationBegining` date NOT NULL,
  `ReservationEnding` date NOT NULL,
  `ReservationEditedNumber` int(11) NOT NULL DEFAULT 0,
  `ReservationConfirmation` enum('Confirmed','Rejected','Waiting') NOT NULL,
  `ReservationTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`ReservationId`, `UserId`, `ReservationDays`, `ReservationBegining`, `ReservationEnding`, `ReservationEditedNumber`, `ReservationConfirmation`, `ReservationTime`) VALUES
(1, 1, 3, '2022-05-30', '2022-05-31', 0, 'Rejected', '2022-05-25 17:09:25'),
(3, 2, 3, '2022-05-30', '2022-05-31', 0, 'Confirmed', '2022-05-25 17:23:00'),
(4, 3, 3, '2022-05-30', '2022-06-01', 0, 'Confirmed', '2022-05-29 20:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation_comming`
--

CREATE TABLE `tbl_reservation_comming` (
  `ReservationDetailsCommingId` int(11) NOT NULL,
  `ReservationId` int(11) NOT NULL,
  `RoomTypeId` int(11) NOT NULL,
  `NumberOfRooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reservation_comming`
--

INSERT INTO `tbl_reservation_comming` (`ReservationDetailsCommingId`, `ReservationId`, `RoomTypeId`, `NumberOfRooms`) VALUES
(3, 4, 2, 1),
(4, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation_current`
--

CREATE TABLE `tbl_reservation_current` (
  `ReservationDetailsId` int(11) NOT NULL,
  `ReservationId` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reservation_current`
--

INSERT INTO `tbl_reservation_current` (`ReservationDetailsId`, `ReservationId`, `RoomId`) VALUES
(24, 3, 5),
(37, 4, 3),
(38, 4, 1),
(39, 1, 6),
(40, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `RoomId` int(11) NOT NULL,
  `RoomNo` int(11) NOT NULL,
  `Avalibilty` enum('available','not_available') NOT NULL,
  `RoomTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`RoomId`, `RoomNo`, `Avalibilty`, `RoomTypeId`) VALUES
(1, 101, 'not_available', 1),
(2, 102, 'available', 1),
(3, 103, 'not_available', 2),
(4, 104, 'not_available', 2),
(5, 105, 'not_available', 3),
(6, 106, 'not_available', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_details`
--

CREATE TABLE `tbl_room_details` (
  `RoomTypeId` int(11) NOT NULL,
  `RoomType` varchar(11) NOT NULL,
  `RoomFees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room_details`
--

INSERT INTO `tbl_room_details` (`RoomTypeId`, `RoomType`, `RoomFees`) VALUES
(1, 'single', 100),
(2, 'double', 200),
(3, 'triple', 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_rate`
--

CREATE TABLE `tbl_room_rate` (
  `RoomRateIndex` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `RoomRate` int(11) NOT NULL,
  `RoomRateComment` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `UserId` int(8) NOT NULL,
  `UserFirstName` varchar(12) NOT NULL,
  `UserLastName` varchar(12) NOT NULL,
  `UserGender` enum('Male','Female') NOT NULL,
  `UserPhoneNumber` int(11) NOT NULL,
  `UserNationalIdNumber` int(14) NOT NULL,
  `UserNationalIdImage` varchar(25) NOT NULL,
  `UserImage` varchar(25) NOT NULL,
  `UserMail` varchar(25) NOT NULL,
  `UserPassword` varchar(25) NOT NULL,
  `UserRole` enum('guest','receptionist','quality_control') NOT NULL,
  `UserAccountStatus` enum('activated','deactivated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`UserId`, `UserFirstName`, `UserLastName`, `UserGender`, `UserPhoneNumber`, `UserNationalIdNumber`, `UserNationalIdImage`, `UserImage`, `UserMail`, `UserPassword`, `UserRole`, `UserAccountStatus`) VALUES
(1, 'Kiro', 'Emad', 'Male', 123, 1123, '1', '1', 'kiro@gmail.com', '123', 'guest', 'activated'),
(2, 'Ahmed', 'Said', 'Male', 12, 12, '2', '2', 'Said@gmail.com', '123', 'guest', 'activated'),
(3, 'Kimo', 'Cono', 'Male', 123, 123, '3', '3', 'kimo@cono.com', '123', 'guest', 'activated'),
(4, 'kiro', 'kiro', 'Male', 123, 123, '3', '3', 'kiki@cono.com', '123', 'quality_control', 'activated'),
(5, 'recp1', 'risi', 'Male', 123, 123, '3', '3', 'recp1@mail.com', '123', 'quality_control', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD PRIMARY KEY (`FamilyId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbl_family_members`
--
ALTER TABLE `tbl_family_members`
  ADD PRIMARY KEY (`FamilyMembersIndex`),
  ADD KEY `FamilyId` (`FamilyId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbl_guest_comments`
--
ALTER TABLE `tbl_guest_comments`
  ADD PRIMARY KEY (`GuestCommentsId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`LogId`);

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`ManagerId`),
  ADD KEY `EmpId` (`EmpId`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`ReservationId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbl_reservation_comming`
--
ALTER TABLE `tbl_reservation_comming`
  ADD PRIMARY KEY (`ReservationDetailsCommingId`),
  ADD KEY `ReservationId` (`ReservationId`),
  ADD KEY `RoomTypeId` (`RoomTypeId`);

--
-- Indexes for table `tbl_reservation_current`
--
ALTER TABLE `tbl_reservation_current`
  ADD PRIMARY KEY (`ReservationDetailsId`),
  ADD KEY `RoomId` (`RoomId`),
  ADD KEY `ReservationId` (`ReservationId`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`RoomId`),
  ADD KEY `RoomTypeId` (`RoomTypeId`);

--
-- Indexes for table `tbl_room_details`
--
ALTER TABLE `tbl_room_details`
  ADD PRIMARY KEY (`RoomTypeId`);

--
-- Indexes for table `tbl_room_rate`
--
ALTER TABLE `tbl_room_rate`
  ADD PRIMARY KEY (`RoomRateIndex`),
  ADD KEY `RoomId` (`RoomId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_family`
--
ALTER TABLE `tbl_family`
  MODIFY `FamilyId` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_family_members`
--
ALTER TABLE `tbl_family_members`
  MODIFY `FamilyMembersIndex` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_guest_comments`
--
ALTER TABLE `tbl_guest_comments`
  MODIFY `GuestCommentsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `LogId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `ManagerId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_reservation_comming`
--
ALTER TABLE `tbl_reservation_comming`
  MODIFY `ReservationDetailsCommingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_reservation_current`
--
ALTER TABLE `tbl_reservation_current`
  MODIFY `ReservationDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `RoomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_room_details`
--
ALTER TABLE `tbl_room_details`
  MODIFY `RoomTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_room_rate`
--
ALTER TABLE `tbl_room_rate`
  MODIFY `RoomRateIndex` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `UserId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD CONSTRAINT `tbl_family_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `tbl_user` (`UserId`);

--
-- Constraints for table `tbl_family_members`
--
ALTER TABLE `tbl_family_members`
  ADD CONSTRAINT `tbl_family_members_ibfk_1` FOREIGN KEY (`FamilyId`) REFERENCES `tbl_family` (`FamilyId`),
  ADD CONSTRAINT `tbl_family_members_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `tbl_user` (`UserId`);

--
-- Constraints for table `tbl_guest_comments`
--
ALTER TABLE `tbl_guest_comments`
  ADD CONSTRAINT `tbl_guest_comments_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `tbl_user` (`UserId`);

--
-- Constraints for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD CONSTRAINT `tbl_manager_ibfk_2` FOREIGN KEY (`EmpId`) REFERENCES `tbl_user` (`UserId`);

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `tbl_user` (`UserId`);

--
-- Constraints for table `tbl_reservation_comming`
--
ALTER TABLE `tbl_reservation_comming`
  ADD CONSTRAINT `tbl_reservation_comming_ibfk_1` FOREIGN KEY (`ReservationId`) REFERENCES `tbl_reservation` (`ReservationId`),
  ADD CONSTRAINT `tbl_reservation_comming_ibfk_2` FOREIGN KEY (`RoomTypeId`) REFERENCES `tbl_room_details` (`RoomTypeId`);

--
-- Constraints for table `tbl_reservation_current`
--
ALTER TABLE `tbl_reservation_current`
  ADD CONSTRAINT `tbl_reservation_current_ibfk_1` FOREIGN KEY (`RoomId`) REFERENCES `tbl_room` (`RoomId`),
  ADD CONSTRAINT `tbl_reservation_current_ibfk_2` FOREIGN KEY (`RoomId`) REFERENCES `tbl_room` (`RoomId`),
  ADD CONSTRAINT `tbl_reservation_current_ibfk_3` FOREIGN KEY (`RoomId`) REFERENCES `tbl_room` (`RoomId`),
  ADD CONSTRAINT `tbl_reservation_current_ibfk_4` FOREIGN KEY (`ReservationId`) REFERENCES `tbl_reservation` (`ReservationId`);

--
-- Constraints for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD CONSTRAINT `tbl_room_ibfk_1` FOREIGN KEY (`RoomTypeId`) REFERENCES `tbl_room_details` (`RoomTypeId`);

--
-- Constraints for table `tbl_room_rate`
--
ALTER TABLE `tbl_room_rate`
  ADD CONSTRAINT `tbl_room_rate_ibfk_1` FOREIGN KEY (`RoomId`) REFERENCES `tbl_room` (`RoomId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
