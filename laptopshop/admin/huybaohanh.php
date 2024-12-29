<?php
include 'connect.php';

// Kiểm tra mã bảo hành từ URL
$id = $_GET['id'] ?? null;
if ($id) {
    // Cập nhật trạng thái yêu cầu bảo hành thành "Đã hủy"
    $sql_update = "UPDATE bao_hanh SET TrangThai = 2 WHERE MaBH = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Chuyển hướng đến trang yêu cầu bảo hành đã hủy
        header("Location: baohanhdahuy.php");
        exit();
    } else {
        echo "Hủy yêu cầu không thành công!";
    }
} else {
    echo "Mã bảo hành không hợp lệ!";
}
?>