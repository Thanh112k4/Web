<?php
session_start();

// Kiểm tra xem đã có mảng flowers trong session chưa
if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [];
}

// Kiểm tra xem có index hoa cần xóa không
if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index = $_GET['index'];

    // Xóa hoa khỏi mảng
    unset($_SESSION['flowers'][$index]);

    // Điều hướng lại về trang quản lý
    header("Location: admin.php");
    exit();
} else {
    // Nếu không có index, chuyển về trang danh sách
    header("Location: admin.php");
    exit();
}
