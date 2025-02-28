<?php
// ตัง้คา่ การเชอื่ มตอ่ กบั ฐานขอ้มลู
$host = "localhost"; // ชอื่ โฮสตข์ อง MySQL
$dbname = "task_manager"; // ชอื่ ฐานขอ้มลู
$username = "root"; // ชอื่ ผใู้ชข้ อง MySQL
$password = ""; // รหสั ผา่ น (เวน้ วา่ งส าหรับ XAMPP)
try {
// สรา้งการเชอื่ มตอ่ ดว้ย PDO
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username,
$password);
// ตั้งค่า PDO ให ้แสดงข ้อผิดพลาดหากเกิดปัญหา
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// เชอื่ มตอ่ ส าเร็จ
//echo " เชื่อมต่อฐานข้อมูลสำเร็จ"; // ใชท้ ดสอบการเชอื่ มตอ่ (สามารถปิดทงิ้)
} catch (PDOException $e) {
// แสดงขอ้ผดิ พลาดหากเชอื่ มตอ่ ไมส่ าเร็จ
die(" การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}
// ปิดการเชอื่ มตอ่ เมอื่ ไมใ่ ชง้าน (กรณีทใี่ ชแ้บบแยกไฟล)์