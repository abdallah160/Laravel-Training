-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 02:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DeptID` int(5) NOT NULL,
  `DepartmentName` varchar(30) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptID`, `DepartmentName`, `Location`) VALUES
(4, 'Web Development', 'Palestine, Nablus'),
(5, 'Web Development', 'Palestine, Nablus');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` int(5) NOT NULL,
  `EmpName` varchar(20) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `DateOfJoining` date DEFAULT NULL,
  `DepartmentID` int(5) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `PhoneNumber` decimal(10,0) DEFAULT NULL,
  `EmailID` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpID`, `EmpName`, `Gender`, `DateOfJoining`, `DepartmentID`, `Address`, `PhoneNumber`, `EmailID`) VALUES
(56, 'Abdallah Ehab Saleh', 'm', '2025-05-13', 4, 'Nablus, Water st.', 592210169, 'bodesaleh2@gmail.com'),
(57, 'Abdallah Ehab Saleh', 'm', '2025-05-13', 4, 'Nablus, Water st.', 592210169, 'bodesaleh2@gmail.com'),
(58, 'Abdallah Ehab Saleh', 'm', '2025-05-14', 4, 'Nablus, Water st.', 592210169, 'bodesaleh2@gmail.com'),
(59, 'Abdallah Ehab Saleh', '', '2025-05-13', 4, 'Nablus, Water st.', 592210169, 'bodesaleh2@gmail.com'),
(60, 'momen saleh', 'm', '2025-05-13', 4, 'Nablus, Water st.', 592210169, 'bodesaleh2@gmail.com'),
(61, 'Abdallah Ehab Saleh', 'm', '2025-05-16', 5, 'Nablus, Water st.', 592210169, 'bodesaleh2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `leaving`
--

CREATE TABLE `leaving` (
  `LeaveID` int(5) NOT NULL,
  `EmpID` int(5) DEFAULT NULL,
  `LeaveDate` date DEFAULT NULL,
  `NumberOfDays` int(11) DEFAULT NULL,
  `Reason` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaving`
--

INSERT INTO `leaving` (`LeaveID`, `EmpID`, `LeaveDate`, `NumberOfDays`, `Reason`) VALUES
(1, 56, '2025-05-14', 2, 'sick'),
(2, 56, '2025-05-14', 2, 'sick'),
(3, 56, '2025-05-14', 2, 'sick'),
(4, 60, '2025-05-08', 5, 'dfsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(5) NOT NULL,
  `ProjectName` varchar(20) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `StartingDate` date DEFAULT NULL,
  `EndingDate` date DEFAULT NULL,
  `ProjectHead` varchar(25) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `ProjectName`, `Duration`, `StartingDate`, `EndingDate`, `ProjectHead`, `DeliveryDate`) VALUES
(2, 'develop web app', 8, '2025-05-05', '2025-05-23', 'ads', '2025-05-23'),
(4, 'develop web app', 8, '2025-05-05', '2025-05-23', 'ads', '2025-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `project_department`
--

CREATE TABLE `project_department` (
  `UnitID` int(5) NOT NULL,
  `DepartmentID` int(5) DEFAULT NULL,
  `ProjectID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_department`
--

INSERT INTO `project_department` (`UnitID`, `DepartmentID`, `ProjectID`) VALUES
(1, 4, 2),
(2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `SalaryID` int(5) NOT NULL,
  `EmpID` int(5) DEFAULT NULL,
  `BasicPay` decimal(10,2) DEFAULT NULL,
  `DA` decimal(10,2) DEFAULT NULL,
  `HRA` decimal(10,2) DEFAULT NULL,
  `MedicalAllowance` decimal(10,2) DEFAULT NULL,
  `ChildEducation` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`SalaryID`, `EmpID`, `BasicPay`, `DA`, `HRA`, `MedicalAllowance`, `ChildEducation`) VALUES
(3, 58, 2500.00, 50.00, 50.00, 20.00, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DeptID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`),
  ADD KEY `fk_department` (`DepartmentID`);

--
-- Indexes for table `leaving`
--
ALTER TABLE `leaving`
  ADD PRIMARY KEY (`LeaveID`),
  ADD KEY `emp_id` (`EmpID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`);

--
-- Indexes for table `project_department`
--
ALTER TABLE `project_department`
  ADD PRIMARY KEY (`UnitID`),
  ADD KEY `DepartmentID` (`DepartmentID`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`SalaryID`),
  ADD KEY `Emp_ID` (`EmpID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DeptID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `leaving`
--
ALTER TABLE `leaving`
  MODIFY `LeaveID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_department`
--
ALTER TABLE `project_department`
  MODIFY `UnitID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `SalaryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DeptID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `leaving`
--
ALTER TABLE `leaving`
  ADD CONSTRAINT `leaving_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`);

--
-- Constraints for table `project_department`
--
ALTER TABLE `project_department`
  ADD CONSTRAINT `project_department_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DeptID`),
  ADD CONSTRAINT `project_department_ibfk_2` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
