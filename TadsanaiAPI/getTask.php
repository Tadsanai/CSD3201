<?php
// น าเขา้ไฟลเ์ชอื่ มตอ่ ฐานขอ้มลู
require 'db.php';
// ตั้งค่า Header ให ้เป็น JSON
header("Content-Type: application/json; charset=UTF-8");
try {
//ค าสงั่ SQL ส าหรับดงึขอ้มลู จากตาราง tasks
$sql = "SELECT * FROM tasks";
$stmt = $pdo->query($sql);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
//สง่ ขอ้มลู ออกเป็น JSON
echo json_encode([
    "status" => "success",
    "message" => "ดึงข้อมูลสำเร็จ",
    "tasks" => $tasks
    ], JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {
    //สง่ ขอ้ความขอ้ผดิ พลาดออกไป
    echo json_encode([
    "status" => "error",
    "message" => "เกิดข้อผิดพลาด: " . $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
    }
    //ปิดการเชอื่ มตอ่ ฐานขอ้มลู
    $pdo = null;