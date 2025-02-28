<?php
// น าเขา้ไฟลเ์ชอื่ มตอ่ ฐานขอ้มลู
require 'db.php';
// ตั้งค่า Header ให ้เป็น JSON
header("Content-Type: application/json; charset=UTF-8");
// ตรวจสอบวา่ มกี ารสง่ ขอ้มลู แบบ POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข ้อมูล JSON ทสี่ ง่ มาจาก React Native
$data = json_decode(file_get_contents("php://input"), true);
// ตรวจสอบว่าข ้อมูลที่จ าเป็นครบหรือไม่
if (!empty($data["task_name"]) && !empty($data["description"]) &&
!empty($data["due_date"]) && !empty($data["status"])) {
try {
// ค าสงั่ SQL สา หรบั เพมิ่ ขอ้มลู ลงในฐานขอ้มลู
$sql = "INSERT INTO tasks (task_name, description, due_date, status) VALUES
(:task_name, :description, :due_date, :status)";
$stmt = $pdo->prepare($sql);
// ผูกค่าพารามิเตอร์
$stmt->bindParam(":task_name", $data["task_name"]);
$stmt->bindParam(":description", $data["description"]);
$stmt->bindParam(":due_date", $data["due_date"]);
$stmt->bindParam(":status", $data["status"]);
// ท าการ execute ค าสงั่ SQL
if ($stmt->execute()) {
echo json_encode([
"status" => "success",
"message" => "เพิ่มงานสำเร็จ"
], JSON_UNESCAPED_UNICODE);
} else {
echo json_encode([
"status" => "error",
"message" => "ไม่สามารถเพิ่มงานได ้"
], JSON_UNESCAPED_UNICODE);
}
} catch (PDOException $e) {
echo json_encode([
"status" => "error",
"message" => "เกิดข้อผิดพลาด: " . $e->getMessage()
], JSON_UNESCAPED_UNICODE);
}
} else {
echo json_encode([
"status" => "error",
"message" => "กรุณากรอกข้อมูลให ้ครบถ้วน"
], JSON_UNESCAPED_UNICODE);
}
} else {
echo json_encode([
"status" => "error",
"message" => "ไม่รองรับ HTTP Method นี้"
], JSON_UNESCAPED_UNICODE);
}
// ปิดการเชอื่ มตอ่ ฐานขอ้มลู
$pdo = null;