<?php
session_start();
require '../vendor/autoload.php';
// c là controller
// a là action
// method index là mặc đinh
$c = $_GET['c'] ?? 'home';
$a = $_GET['a'] ?? 'index';

// Mục tiêu là call action $a của controller $c
// vd: StudentController
// ucfirst là viết hoa chữ cái đầu
$strController = ucfirst($c) . 'Controller';

// import file cau hinh
require '../config.php';
require '../connectDB.php';

// import model
require '../import_models.php';

//import controller
require "controller/$strController.php";

// khởi tạo đổi tượng controller
$controller = new $strController();

// gọi hàm chạy
$controller->$a();
