-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2024 at 03:28 PM
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
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `About_us_Id` int(11) NOT NULL,
  `Clinic_Id` int(11) NOT NULL,
  `About_title` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `About_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `addressline1` varchar(100) DEFAULT NULL,
  `addressline2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `api_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`api_key`) VALUES
(1),
(2),
(3),
(2147483647),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_Id` int(11) NOT NULL,
  `Clinic_Id` int(11) NOT NULL,
  `Branch_Id` int(11) DEFAULT NULL,
  `Doctor_Id` int(11) NOT NULL,
  `PatientFirstName` varchar(50) DEFAULT NULL,
  `PatientLastName` varchar(50) DEFAULT NULL,
  `AppointmentDate` varchar(50) DEFAULT NULL,
  `AppointmentTime` varchar(50) DEFAULT NULL,
  `AppointmentType` varchar(30) DEFAULT NULL,
  `AppointmentChannel` varchar(30) DEFAULT NULL,
  `AppointmentStatus` varchar(30) DEFAULT NULL,
  `AppointmentReason` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_Id`, `Clinic_Id`, `Branch_Id`, `Doctor_Id`, `PatientFirstName`, `PatientLastName`, `AppointmentDate`, `AppointmentTime`, `AppointmentType`, `AppointmentChannel`, `AppointmentStatus`, `AppointmentReason`) VALUES
(4, 456, 789, 4, 'Bob', 'Johnson', '2024-02-23', '03:15 PM', 'Consultation', 'In-person', 'Confirmed', 'Specialist referral'),
(5, 789, 3002, 6, 'Amit', 'Davis', '2024-02-26', '09:30 AM', 'Select', 'Online', 'Scheduled', 'Post-surgery check'),
(23, 0, 3002, 54, 'Kirti', 'Simrit', '2024-02-27', '23:55', 'Check-up', NULL, NULL, 'Check up'),
(27, 0, 4001, 2, 'Aarohi', 'Jadhav', '2024-02-29', '04:05', 'Follow_up', NULL, 'Scheduled', 'Check-up'),
(28, 0, 4002, 3, 'Ketan', 'Bora', '2024-02-28', '06:30', 'Check_up', NULL, 'Scheduled', 'Follow-up'),
(29, 0, 3002, 6, 'Sumit', 'Pawar', '2024-02-29', '05:02', 'Follow_up', NULL, NULL, '-'),
(32, 0, 4001, 2, 'Aniket', 'shinde', '2024-02-29', '01:14', 'Check_up', NULL, NULL, 'dr sangram hello'),
(33, 0, 4001, 2, 'janvi', 'kumar', '2024-02-06', '04:27', 'Check_up', NULL, NULL, 'Fever'),
(34, 0, 4002, 3, 'Reshma', 'yadhav', '2024-02-17', '23:23', 'check-up', NULL, NULL, 'fever'),
(37, 0, 1602, 5, 'sanket', 'kadam', '2024-03-02', '10:30', 'Follow-up', NULL, NULL, 'genral cheak-up'),
(38, 0, 3002, 6, 'tejas', 'gidde', '', '05:06', 'Follow-up', NULL, NULL, 'hiii'),
(39, 0, 3002, 6, 'SACHIN', 'KUMBHAR', '2024-03-01', '02:01', 'Check Up', NULL, NULL, 'hiii'),
(40, 0, 3002, 6, 'tejas', 'gidde', '2024-03-01', '06:39', 'Follow-up', NULL, NULL, 'genral cheak-up'),
(41, 0, 3002, 6, 'Yogesh', 'potadar', '2024-04-22', '00:17', 'check-up', NULL, NULL, 'cheak-up'),
(42, 0, 3002, 6, 'SANGRAMSINGH', 'GIDDE', '2024-04-05', '00:41', 'check-up', NULL, NULL, 'jii');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `Branch_Id` int(11) NOT NULL,
  `Clinic_Id` int(11) NOT NULL,
  `Branch_Name` varchar(255) DEFAULT NULL,
  `Branch_Mob_no` varchar(10) DEFAULT NULL,
  `Address_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`Branch_Id`, `Clinic_Id`, `Branch_Name`, `Branch_Mob_no`, `Address_Id`) VALUES
(1601, 102, 'Shree Hospital Multispeciality (Unit I)', '+91 744748', 1122061),
(1602, 102, 'Shree Hospital Multispeciality (Unit II)', '9604956164', 1122062),
(1603, 102, 'Shree Hospital Multispeciality (Unit III)', '9552588191', 1122063),
(3002, 103, 'Sparsh Hospital, Rahatani, Pune', '+91.917567', 1122062),
(4001, 101, 'Ruby Hall Clinic Services PUNE', '+91 87930 ', 1122301),
(4002, 101, 'Ruby Hall Clinic Services THERGAON, PUNE', '91 87930 9', 1122302),
(4003, 101, 'Ruby Hall Clinic Services Pune JUHU', '+91 84529 ', 1122303),
(4004, 101, 'Ruby Hall Clinic Services Pune DHARAVI, MUMBA', '+91 84339 ', 1122304),
(4005, 101, 'Ruby Hall Clinic Services Pune DAMAN & DIU', '+91 97371 ', 1122305);

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `Clinic_Id` int(11) NOT NULL,
  `ClinicName` varchar(50) DEFAULT NULL,
  `ClinicPhone` int(11) NOT NULL,
  `address_Id` int(11) NOT NULL,
  `Clinic_gstno` varchar(50) DEFAULT NULL,
  `Clinic_registrationno` varchar(50) DEFAULT NULL,
  `Clinic_start_time` varchar(50) DEFAULT NULL,
  `Clinic_End_time` varchar(50) DEFAULT NULL,
  `clinic_img` varchar(50) DEFAULT NULL,
  `Isactive` tinyint(1) DEFAULT 1,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`Clinic_Id`, `ClinicName`, `ClinicPhone`, `address_Id`, `Clinic_gstno`, `Clinic_registrationno`, `Clinic_start_time`, `Clinic_End_time`, `clinic_img`, `Isactive`, `latitude`, `longitude`) VALUES
(101, 'Ruby Hall', 998823121, 1, 'RH7475S89G', 'RH78956SD', '07:30', '22:30', NULL, 1, NULL, NULL),
(102, 'Shree Clinic', 748596124, 2, 'SC8596E23R', 'SC895647MH', '07:30', '22:30', NULL, 1, NULL, NULL),
(103, 'Sparsh Hospital', 781245962, 3, 'SH1245R56S', 'S274589MH7', '07:30', '22:30', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `message` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`first_name`, `last_name`, `phone`, `message`) VALUES
('simth', 'jon', '2233445566', 'added'),
('simth', 'jon', '2233445566', 'added'),
('simth', 'jon', '2233445566', 'added'),
('simth', 'jon', '2233445566', 'added'),
('simth', 'jon', '2233445566', 'added'),
('simth', 'jon', '2233445566', 'kjhgfdfguio'),
('simth', 'jon', '2233445566', 'kjhgfdfguio'),
('simthi', 'jon', '2233445566', 'kjhgfdfguio'),
('simthi', 'jon', '2233445566', 'kjhgfdfguio'),
('sneha', 'yadav', '7845961235', 'hi'),
('harshwardhan', 'Shinde', '7028121922', 'please send me prescription '),
('sangram', 'gidde', '5544662211', 'hiiiiiiiiiiii'),
('sangram', 'gidde', '9373849339', 'hii'),
('SANGRAMSINGH', 'GIDDE', '+91937384933', 'hii'),
('SACHIN', 'KUMBHAR', '07820828564', 'hiii');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Clinic_id` int(11) NOT NULL,
  `Branch_id` int(11) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `DFirstName` varchar(255) DEFAULT NULL,
  `DLastName` varchar(255) DEFAULT NULL,
  `Education` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Mobile_No` varchar(12) DEFAULT NULL,
  `DOB` varchar(50) NOT NULL,
  `Experience` double DEFAULT NULL,
  `Doc_img` varchar(50) DEFAULT NULL,
  `Specialization` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `D_Clinic_Id` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Pincode` varchar(50) DEFAULT NULL,
  `Doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Clinic_id`, `Branch_id`, `Address`, `DFirstName`, `DLastName`, `Education`, `Email`, `Mobile_No`, `DOB`, `Experience`, `Doc_img`, `Specialization`, `Gender`, `D_Clinic_Id`, `Password`, `Country`, `City`, `State`, `Pincode`, `Doctor_id`) VALUES
(101, 4001, 'bhosari', 'sangramsingh', 'G', 'BHMS', 'admin15@mail.com', '2147483647', '07/02/2024', 0, 'india_get.png', 'ortho', 'Male', NULL, 'Sangram@123', 'India', 'pune', 'Maharastra', '413310', 2),
(101, 4002, 'solapur', 'Tejas', 'Gidde', 'BHMS', 'giddesangram117@gmail.com', '7756062750', '27/02/2024', 0, '', 'dental', 'Male', NULL, 'Sangram@123', 'India', 'pandharpur', 'Maharastra', '413303', 3),
(102, 1602, 'Pune', 'aishwarya', 'chougale', 'MDMS', 'niranjanee@gmail.com', '9988776655', '19/07/2000', 3, '', 'dentiest', 'Female', NULL, 'niru@123', 'India', 'Pune', 'Maharastra', '411017', 5),
(103, 3002, 'pune', 'Aishwarya', 'karle', 'MBBS', 'aishwarya24march@gmail.com', '9765413248', '21/11/2001', 5, 'doctor-thumb-02.jpg', 'heart', 'female', '0', 'Aish@12', 'india', 'pune', 'maharashtra', '411017', 6),
(0, 3002, 'pandharpur', 'harshwardhan', 'shinde', 'MBBS', 'admin78@mail.com', '9623418789', '14/06/2000', 2, 'doctor-thumb-06.jpg', 'cardiology', 'Male', NULL, 'harsh@123', 'India', 'pune', 'Maharastra', '413307', 53),
(101, 1603, 'Solapur', 'Vaibhav', 'Pawar', 'MBBS.MD', 'vaibhav@gmail.com', '7756889945', '04/11/1998', 6, 'doctor-thumb-01.jpg', 'Nuro surgeon', 'Female', NULL, 'vaibhav@12', 'India', 'Pune', 'Maharastra', '411018', 55),
(103, 4001, 'Pune', 'Pooja', 'Jadhav', 'MBBS.MD', 'pooja12@gmail.com', '7756064527', '12/01/2000', 6, 'doctor-03.jpg', 'pediatrician', 'Female', NULL, 'pooja@12', 'India', 'Pune', 'Maharastra', '411017', 56);

-- --------------------------------------------------------

--
-- Table structure for table `doctorsbranchassociation`
--

CREATE TABLE `doctorsbranchassociation` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `a_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `User_Name`, `password`, `firstName`, `LastName`, `Mobile`, `a_email`) VALUES
(1, 'Admin', 'admin', 'Hospital', 'Hospital', 778899456, 'admin123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patient_Id` int(11) NOT NULL,
  `Clinic_Id` int(11) DEFAULT NULL,
  `DFirstName` varchar(30) NOT NULL,
  `Branch_Id` int(11) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `MobileNo` varchar(10) DEFAULT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `Age` varchar(10) DEFAULT NULL,
  `Patient_Weight` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patient_Id`, `Clinic_Id`, `DFirstName`, `Branch_Id`, `FirstName`, `LastName`, `MobileNo`, `DOB`, `Age`, `Patient_Weight`) VALUES
(30, 0, 'Niranjane', 1602, 'Pooja', 'jadhav', '7878789898', '2024-03-01', '25', '40'),
(31, 0, 'Pooja', 4001, 'Vaishanavi', 'chothe', '9865321470', '2024-03-02', '25', '60'),
(32, 0, 'Pooja', 4001, 'Suraj', 'Jadhav', '7845120345', '2024-03-01', '35', '60'),
(33, 0, 'Tejas', 4002, 'Rahul', 'Jain', '9874561230', '2024-03-02', '30', '70');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_Id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `service_name` varchar(50) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `service_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_Id`, `clinic_id`, `branch_id`, `service_name`, `service_description`, `service_img`) VALUES
(5, 0, 0, 'Doctors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.', 'doctors-3.jpg'),
(7, 0, 0, 'Pharma Pipeline', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.', 'gallery-2.jpg'),
(8, 0, 0, 'Pharma Team', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.', 'gallery-1.jpg'),
(9, 0, 0, 'Quality treatments', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.', 'gallery-7.jpg'),
(18, 0, 1601, 'customer satisfaction', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.', 'news-image2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`Clinic_Id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_Id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`Branch_Id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`Clinic_Id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doctor_id`);

--
-- Indexes for table `doctorsbranchassociation`
--
ALTER TABLE `doctorsbranchassociation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Patient_Id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Patient_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Service_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
