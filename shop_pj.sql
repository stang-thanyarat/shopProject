-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 08:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_pj`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_tb`
--

CREATE TABLE `bank_tb` (
  `bank_id` int(3) NOT NULL COMMENT 'รหัสรายการบัญชีธนาคาร',
  `sell_id` int(4) NOT NULL COMMENT 'รหัสผู้ขาย',
  `bank_name` varchar(30) NOT NULL COMMENT 'ชื่อธนาคาร',
  `bank_number` varchar(25) NOT NULL COMMENT 'เลขที่บัญชีธนาคาร',
  `bank_account` varchar(50) NOT NULL COMMENT 'ชื่อบัญชีธนาคาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `category_id` int(3) NOT NULL COMMENT 'รหัสประเภทของสินค้า',
  `category_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`category_id`, `category_name`) VALUES
(2, 'ใบตัดหญ้า'),
(3, 'ใบตัดหญ้า'),
(4, 'ใบตัดหญ้า'),
(5, 'ใบตัดหญ้า'),
(6, 'ใบตัดหญ้า'),
(7, 'ใบตัดหญ้า');

-- --------------------------------------------------------

--
-- Table structure for table `contract_tb`
--

CREATE TABLE `contract_tb` (
  `contract_code` int(6) NOT NULL COMMENT 'รหัสสัญญาการซื้อขาย',
  `date_contract` date NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ทำสัญญา',
  `sis_id` int(6) NOT NULL COMMENT 'รหัสข้อมูลผู้ขายในร้าน',
  `sales_list_id` int(6) NOT NULL COMMENT 'รหัสรายการขาย',
  `selldate` date NOT NULL COMMENT 'วันที่ส่งมอบของให้',
  `contract_details` varchar(255) NOT NULL COMMENT 'ข้อตกลงของสัญญา',
  `witness1` varchar(50) NOT NULL COMMENT 'พยานคนที่ 1',
  `witness2` varchar(50) NOT NULL COMMENT 'พยานคนที่ 2',
  `witness3` varchar(50) NOT NULL COMMENT 'พยานคนที่ 3',
  `owner_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'สถานะการใช้งานของเจ้าของร้าน',
  `contract_attachment` varchar(255) NOT NULL COMMENT 'ไฟล์แนบสัญญา',
  `due_date` date NOT NULL COMMENT 'วันที่ครบกำหนด',
  `interest_rate` varchar(20) NOT NULL COMMENT 'อัตราดอกเบี้ย',
  `outstanding` varchar(20) NOT NULL COMMENT 'คงค้าง',
  `interest_payable` varchar(20) NOT NULL COMMENT 'ดอกเบี้ยที่ต้องจ่าย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `customer_id` int(8) NOT NULL COMMENT 'รหัสข้อมูลลูกค้า',
  `customer_prefix` varchar(6) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `customer_name` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `customer_lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `customer_address` varchar(200) NOT NULL COMMENT 'ที่อยู่',
  `customer_img` varchar(25) NOT NULL COMMENT 'เลขบัตรประชาชน',
  `customer_telephone` varchar(20) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `customer_card_id` varchar(255) NOT NULL COMMENT 'สำเนาบัตรประชาชน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `debt_payment_details_tb`
--

CREATE TABLE `debt_payment_details_tb` (
  `unique_id` int(5) NOT NULL COMMENT 'ค่าเอกลักษณ์',
  `contract_code` int(6) NOT NULL COMMENT 'รหัสสัญญาการซื้อขาย',
  `repayment_date` date NOT NULL COMMENT 'วันที่ชำระ',
  `payment` varchar(20) NOT NULL COMMENT 'วิธีการชำระ',
  `payment_amount` varchar(20) NOT NULL COMMENT 'ยอดที่ชำระ',
  `deduct_principal` varchar(20) NOT NULL COMMENT 'หักเงินต้น',
  `less_interest` varchar(20) NOT NULL COMMENT 'หักดอกเบี้ย',
  `outstanding` varchar(20) NOT NULL COMMENT 'คงค้าง',
  `slip_img` varchar(255) NOT NULL COMMENT 'ไฟล์หลักฐานการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_tb`
--

CREATE TABLE `employee_tb` (
  `employee_id` int(5) NOT NULL COMMENT 'รหัสพนักงานขาย',
  `employee_model` varchar(20) NOT NULL,
  `employee_startwork_dt` date NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่เข้าทำงาน',
  `employee_prefix` varchar(6) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `employee_firstname` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `employee_lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `employee_address` varchar(200) NOT NULL COMMENT 'ที่อยู่',
  `employee_birthday` date NOT NULL COMMENT 'วันเกิด',
  `employee_card_id` varchar(25) NOT NULL COMMENT 'บัตรประชาชน',
  `employee_telephone` varchar(20) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `employee_email` varchar(70) NOT NULL COMMENT 'อีเมล',
  `employee_card_id_copy` varchar(255) NOT NULL COMMENT 'สำเนาบัตรประชาชน',
  `employee_address_copy` varchar(255) NOT NULL COMMENT 'สำเนาทะเบียนบ้าน',
  `bank_name` varchar(30) NOT NULL COMMENT 'ชื่อธนาคาร',
  `bank_number` varchar(25) NOT NULL COMMENT 'เลขที่บัญชี',
  `bank_account` varchar(50) NOT NULL COMMENT 'ชื่อบัญชี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tb`
--

CREATE TABLE `order_details_tb` (
  `unique_id` int(5) NOT NULL COMMENT 'ค่าเอกลักษณ์',
  `order_id` int(6) NOT NULL COMMENT 'รหัสรายการใบสั่งซื้อ',
  `product_id` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `unitprice` int(6) NOT NULL COMMENT 'ราคาต่อหน่วย',
  `amount` int(6) NOT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` int(6) NOT NULL COMMENT 'รหัสรายการใบสั่งซื้อ',
  `datebill` date NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่วางบิล',
  `datereceive` date NOT NULL COMMENT 'วันที่รับของ',
  `sell_id` int(4) NOT NULL COMMENT 'รหัสผู้ขาย',
  `payment_sl` varchar(30) NOT NULL COMMENT 'วิธีการชำระเงิน',
  `payment_dt` date NOT NULL COMMENT 'วันที่ชำระเงิน',
  `note` varchar(255) NOT NULL COMMENT 'หมายเหตุ',
  `bank_slip` varchar(255) NOT NULL COMMENT 'สลิปธนาคาร',
  `receipt` varchar(255) NOT NULL COMMENT 'ใบเสร็จ',
  `delivery_notice` varchar(255) NOT NULL COMMENT 'ใบส่งของ',
  `net_price` varchar(30) NOT NULL COMMENT 'ยอดสุทธิ',
  `order_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'สถานะใบสั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `other_expenses_tb`
--

CREATE TABLE `other_expenses_tb` (
  `unique_id` int(5) NOT NULL COMMENT 'ค่าเอกลักษณ์',
  `order_id` int(6) NOT NULL COMMENT 'รหัสรายการใบสั่งซื้อ',
  `listother` int(6) NOT NULL COMMENT 'ค่าใช้จ่าย',
  `priceother` int(6) NOT NULL COMMENT 'ราคา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_exchange_tb`
--

CREATE TABLE `product_exchange_tb` (
  `product_exchange_id` int(5) NOT NULL COMMENT 'รหัสการเปลี่ยนสินค้า',
  `product_id` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `customer_id` int(8) NOT NULL COMMENT 'รหัสข้อมูลลูกค้า',
  `exchange_date` date NOT NULL COMMENT 'วันที่การเปลี่ยนสินค้า',
  `damage_proof` varchar(255) NOT NULL COMMENT 'หลักฐานความเสียหาย',
  `note` varchar(255) NOT NULL COMMENT 'หมายเหตุ',
  `exchange_time` varchar(50) NOT NULL COMMENT 'เวลาการเปลี่ยนสินค้า',
  `exchange_amount` int(5) NOT NULL COMMENT 'จำนวนการเปลี่ยนสินค้า',
  `exchange_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'สถานะการเปลี่ยนสินค้า',
  `exchange_period` date NOT NULL COMMENT 'ระยะรับการเปลี่ยนสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_exchange_tb`
--

INSERT INTO `product_exchange_tb` (`product_exchange_id`, `product_id`, `customer_id`, `exchange_date`, `damage_proof`, `note`, `exchange_time`, `exchange_amount`, `exchange_status`, `exchange_period`) VALUES
(1, 0, 0, '0000-00-00', '../file/productexchange/XoGlMcMTKnimages1.png', '', '', 1, 0, '0000-00-00'),
(2, 0, 0, '0000-00-00', '../file/productexchange/dS7qfulSrOimages1.png', '', '', 1, 0, '0000-00-00'),
(3, 0, 0, '0000-00-00', '../file/productexchange/w2De646aMnimages1.png', '', '', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product_search_tb`
--

CREATE TABLE `product_search_tb` (
  `unique_id` int(5) NOT NULL COMMENT 'ค่าเอกลักษณ์',
  `product_id` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `order_id` int(6) NOT NULL COMMENT 'รหัสรายการใบสั่งซื้อ',
  `product_exchange_id` int(5) NOT NULL COMMENT 'รหัสการเปลี่ยนสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_sell_tb`
--

CREATE TABLE `product_sell_tb` (
  `product_sell_id` int(5) NOT NULL COMMENT 'รหัสสินค้าผู้ขาย',
  `product_id` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `sell_id` int(4) NOT NULL COMMENT 'รหัสผู้ขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `product_id` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `product_name` varchar(30) NOT NULL COMMENT 'ชื่อสินค้า',
  `category_id` int(3) NOT NULL COMMENT 'รหัสประเภทของสินค้า',
  `brand` varchar(100) NOT NULL COMMENT 'ยี่ห้อสินค้า',
  `model` varchar(30) NOT NULL COMMENT 'รุ่นสินค้า',
  `sell_id` int(4) NOT NULL COMMENT 'รหัสผู้ขาย',
  `product_detail` varchar(255) NOT NULL COMMENT 'ข้อความรายละเอียดสินค้า',
  `product_img` varchar(255) NOT NULL COMMENT 'รูปภาพสินค้า',
  `product_detail_img` varchar(255) NOT NULL COMMENT 'รูปรายละเอียดสินค้า',
  `product_dlt_unit` int(6) NOT NULL COMMENT 'จำนวนหักจากคลัง',
  `product_unit` varchar(10) NOT NULL COMMENT 'หน่วยนับ',
  `price` varchar(20) NOT NULL COMMENT 'ราคาขาย',
  `cost_price` varchar(20) NOT NULL COMMENT 'ราคาทุน',
  `notification_amt` int(2) NOT NULL COMMENT 'จำนวนแจ้งเตือนขั้นต่ำ',
  `product_rm_unit` int(6) NOT NULL COMMENT 'จำนวนในคลัง',
  `product_exchange_id` int(5) NOT NULL COMMENT 'รหัสการเปลี่ยนสินค้า',
  `sales_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'สถานะการขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`product_id`, `product_name`, `category_id`, `brand`, `model`, `sell_id`, `product_detail`, `product_img`, `product_detail_img`, `product_dlt_unit`, `product_unit`, `price`, `cost_price`, `notification_amt`, `product_rm_unit`, `product_exchange_id`, `sales_status`) VALUES
(1, 'ใบตัดหญ้า', 0, '1', 'ที่ 2', 1, '                                    ', '../file/product/image1/rlkG2N3nS1images1.png', '', 11, 'envelope', '55', '15', 0, 13, 0, 0),
(2, 'ใบตัดหญ้า', 0, '1', 'ที่ 2', 1, '                                    ', '../file/product/image1/EW33N4rxGRimages1.png', '', 11, 'envelope', '55', '15', 0, 13, 0, 0),
(3, 'ใบตัดหญ้า', 0, '1', 'ที่ 2', 1, '                                    ', '../file/product/image1/xOFuRyxZCGimages1.png', '', 11, 'envelope', '55', '15', 0, 13, 0, 0),
(4, 'ใบตัดหญ้า', 0, '1', 'ที่ 2', 1, '                                    ', '../file/product/image1/J7BnOeD66Mimages1.png', '', 11, 'envelope', '55', '15', 0, 13, 0, 1),
(5, 'ใบตัดหญ้า', 0, '1', 'ที่ 2', 1, '                                    ', '../file/product/image1/UtyHTyUIryimages1.png', '', 11, 'envelope', '55', '15', 0, 13, 0, 1),
(6, 'ใบตัดหญ้า', 0, '1', 'ที่ 2', 1, '                                    ', '../file/product/image1/xVspjIweNbimages1.png', '', 11, 'bottle', '55', '15', 0, 13, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details_tb`
--

CREATE TABLE `purchase_details_tb` (
  `unique_id` int(5) NOT NULL,
  `sales_list_id` int(6) NOT NULL COMMENT 'รหัสรายการขาย',
  `product_id` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `unitprice` varchar(20) NOT NULL COMMENT 'ราคาต่อหน่วย',
  `sold_amount` int(6) NOT NULL COMMENT 'จำนวนที่ขาย',
  `stock_id` int(6) NOT NULL COMMENT 'รหัสเข้าคลัง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_tb`
--

CREATE TABLE `sales_tb` (
  `sales_list_id` int(6) NOT NULL COMMENT 'รหัสรายการขาย',
  `payment_sl` varchar(30) NOT NULL COMMENT 'วิธีการชำระเงิน',
  `customer_id` int(8) NOT NULL COMMENT 'รหัสข้อมูลลูกค้า',
  `employee_id` int(5) NOT NULL COMMENT 'รหัสพนักงานขาย',
  `price` varchar(20) NOT NULL COMMENT 'ราคาขาย',
  `discount` varchar(20) NOT NULL COMMENT 'ส่วนลด',
  `price_paid` varchar(20) NOT NULL COMMENT 'ยอดที่ต้องชำระ',
  `import_files` varchar(255) NOT NULL COMMENT 'ไฟล์แนบ',
  `note` varchar(255) NOT NULL COMMENT 'หมายเหตุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sell_tb`
--

CREATE TABLE `sell_tb` (
  `sell_id` int(4) NOT NULL COMMENT 'รหัสผู้ขาย',
  `sell_type` varchar(50) NOT NULL COMMENT 'ประเภทผู้ขาย',
  `sell_name` varchar(50) NOT NULL COMMENT 'ชื่อผู้ขาย',
  `sell_address` text NOT NULL COMMENT 'ที่อยู่',
  `sell_tax_id` varchar(25) NOT NULL COMMENT 'หมายเลขประจำตัวผู้เสียภาษี',
  `sell_telephone` varchar(20) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `sell_website` varchar(255) NOT NULL COMMENT 'เว็บไซต์',
  `sell_supplier_name` varchar(50) NOT NULL COMMENT 'ชื่อฝ่ายขาย',
  `seller_firstname` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `seller_lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `seller_nickname` varchar(50) NOT NULL COMMENT 'ชื่อเล่น',
  `seller_email` varchar(70) NOT NULL COMMENT 'อีเมล',
  `seller_telephone` varchar(20) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `seller_lind_id` varchar(30) NOT NULL COMMENT 'ไอดีไลน์',
  `seller_card_id` varchar(255) NOT NULL COMMENT 'สำเนาบัตรประชาชน',
  `seller_cardname` varchar(255) NOT NULL COMMENT 'นามบัตร',
  `sell_documents` varchar(255) NOT NULL COMMENT 'เอกสารอื่นๆ',
  `sell_note` varchar(255) NOT NULL COMMENT 'หมายเหตุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sis_tb`
--

CREATE TABLE `sis_tb` (
  `sis_id` int(6) NOT NULL COMMENT 'รหัสข้อมูลผู้ขายในร้าน',
  `sis_prefix` varchar(6) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `sis_name` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `sis_lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `sis_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'สถานะผู้ขายในร้าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_tb`
--

CREATE TABLE `stock_tb` (
  `stock_id` int(6) NOT NULL COMMENT 'รหัสเข้าคลัง',
  `order_id` int(6) NOT NULL COMMENT 'รหัสรายการใบสั่งซื้อ',
  `product_id` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `exp_date` varchar(30) NOT NULL COMMENT 'วันหมดอายุ',
  `amount` int(6) NOT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_account_tb`
--

CREATE TABLE `user_account_tb` (
  `unique_id` int(5) NOT NULL COMMENT 'ค่าเอกลักษณ์',
  `account_username` varchar(70) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `account_password` varchar(50) NOT NULL COMMENT 'รหัสผ่าน',
  `account_user_type` char(1) NOT NULL COMMENT 'ประเภทผู้ใช้งาน',
  `account_prefix` varchar(6) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `account_firstname` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `account_lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `account_user_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'สถานะการใช้งานระบบ',
  `employee_id` int(5) NOT NULL COMMENT 'รหัสพนักงานขาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_tb`
--
ALTER TABLE `bank_tb`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contract_tb`
--
ALTER TABLE `contract_tb`
  ADD PRIMARY KEY (`contract_code`),
  ADD KEY `sis_id` (`sis_id`),
  ADD KEY `sales_list_id` (`sales_list_id`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `debt_payment_details_tb`
--
ALTER TABLE `debt_payment_details_tb`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `contract_code` (`contract_code`);

--
-- Indexes for table `employee_tb`
--
ALTER TABLE `employee_tb`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_email` (`employee_email`);

--
-- Indexes for table `order_details_tb`
--
ALTER TABLE `order_details_tb`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indexes for table `other_expenses_tb`
--
ALTER TABLE `other_expenses_tb`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product_exchange_tb`
--
ALTER TABLE `product_exchange_tb`
  ADD PRIMARY KEY (`product_exchange_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product_search_tb`
--
ALTER TABLE `product_search_tb`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_exchange_id` (`product_exchange_id`);

--
-- Indexes for table `product_sell_tb`
--
ALTER TABLE `product_sell_tb`
  ADD PRIMARY KEY (`product_sell_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `sell_id` (`sell_id`),
  ADD KEY `product_exchange_id` (`product_exchange_id`),
  ADD KEY `product_exchange_id_2` (`product_exchange_id`);

--
-- Indexes for table `purchase_details_tb`
--
ALTER TABLE `purchase_details_tb`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `sales_list_id` (`sales_list_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `sales_tb`
--
ALTER TABLE `sales_tb`
  ADD PRIMARY KEY (`sales_list_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `sell_tb`
--
ALTER TABLE `sell_tb`
  ADD PRIMARY KEY (`sell_id`),
  ADD UNIQUE KEY `seller_email` (`seller_email`);

--
-- Indexes for table `sis_tb`
--
ALTER TABLE `sis_tb`
  ADD PRIMARY KEY (`sis_id`);

--
-- Indexes for table `stock_tb`
--
ALTER TABLE `stock_tb`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user_account_tb`
--
ALTER TABLE `user_account_tb`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_tb`
--
ALTER TABLE `bank_tb`
  MODIFY `bank_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการบัญชีธนาคาร';

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทของสินค้า', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contract_tb`
--
ALTER TABLE `contract_tb`
  MODIFY `contract_code` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสัญญาการซื้อขาย';

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `customer_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลลูกค้า';

--
-- AUTO_INCREMENT for table `debt_payment_details_tb`
--
ALTER TABLE `debt_payment_details_tb`
  MODIFY `unique_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ค่าเอกลักษณ์';

--
-- AUTO_INCREMENT for table `employee_tb`
--
ALTER TABLE `employee_tb`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงานขาย';

--
-- AUTO_INCREMENT for table `order_details_tb`
--
ALTER TABLE `order_details_tb`
  MODIFY `unique_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ค่าเอกลักษณ์';

--
-- AUTO_INCREMENT for table `other_expenses_tb`
--
ALTER TABLE `other_expenses_tb`
  MODIFY `unique_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ค่าเอกลักษณ์';

--
-- AUTO_INCREMENT for table `product_exchange_tb`
--
ALTER TABLE `product_exchange_tb`
  MODIFY `product_exchange_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการเปลี่ยนสินค้า', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_search_tb`
--
ALTER TABLE `product_search_tb`
  MODIFY `unique_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ค่าเอกลักษณ์';

--
-- AUTO_INCREMENT for table `product_sell_tb`
--
ALTER TABLE `product_sell_tb`
  MODIFY `product_sell_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้าผู้ขาย';

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการสินค้า', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_details_tb`
--
ALTER TABLE `purchase_details_tb`
  MODIFY `unique_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_tb`
--
ALTER TABLE `sales_tb`
  MODIFY `sales_list_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการขาย';

--
-- AUTO_INCREMENT for table `sell_tb`
--
ALTER TABLE `sell_tb`
  MODIFY `sell_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ขาย';

--
-- AUTO_INCREMENT for table `sis_tb`
--
ALTER TABLE `sis_tb`
  MODIFY `sis_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลผู้ขายในร้าน';

--
-- AUTO_INCREMENT for table `stock_tb`
--
ALTER TABLE `stock_tb`
  MODIFY `stock_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเข้าคลัง';

--
-- AUTO_INCREMENT for table `user_account_tb`
--
ALTER TABLE `user_account_tb`
  MODIFY `unique_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ค่าเอกลักษณ์';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD CONSTRAINT `category_tb_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_tb` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract_tb`
--
ALTER TABLE `contract_tb`
  ADD CONSTRAINT `contract_tb_ibfk_1` FOREIGN KEY (`contract_code`) REFERENCES `debt_payment_details_tb` (`contract_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD CONSTRAINT `customer_tb_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `sales_tb` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_tb_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `product_exchange_tb` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_tb`
--
ALTER TABLE `employee_tb`
  ADD CONSTRAINT `employee_tb_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `user_account_tb` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_tb_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `sales_tb` (`employee_id`);

--
-- Constraints for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD CONSTRAINT `order_tb_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details_tb` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_tb_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `product_search_tb` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_tb_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `other_expenses_tb` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_exchange_tb`
--
ALTER TABLE `product_exchange_tb`
  ADD CONSTRAINT `product_exchange_tb_ibfk_1` FOREIGN KEY (`product_exchange_id`) REFERENCES `product_search_tb` (`product_exchange_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD CONSTRAINT `product_tb_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_search_tb` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tb_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `order_details_tb` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tb_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product_sell_tb` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tb_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `order_details_tb` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tb_ibfk_5` FOREIGN KEY (`product_id`) REFERENCES `stock_tb` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tb_ibfk_6` FOREIGN KEY (`product_id`) REFERENCES `product_exchange_tb` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_tb`
--
ALTER TABLE `sales_tb`
  ADD CONSTRAINT `sales_tb_ibfk_1` FOREIGN KEY (`sales_list_id`) REFERENCES `contract_tb` (`sales_list_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_tb_ibfk_2` FOREIGN KEY (`sales_list_id`) REFERENCES `purchase_details_tb` (`sales_list_id`);

--
-- Constraints for table `sell_tb`
--
ALTER TABLE `sell_tb`
  ADD CONSTRAINT `sell_tb_ibfk_1` FOREIGN KEY (`sell_id`) REFERENCES `product_sell_tb` (`sell_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sell_tb_ibfk_2` FOREIGN KEY (`sell_id`) REFERENCES `bank_tb` (`sell_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sis_tb`
--
ALTER TABLE `sis_tb`
  ADD CONSTRAINT `sis_tb_ibfk_1` FOREIGN KEY (`sis_id`) REFERENCES `contract_tb` (`sis_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_tb`
--
ALTER TABLE `stock_tb`
  ADD CONSTRAINT `stock_tb_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `purchase_details_tb` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
