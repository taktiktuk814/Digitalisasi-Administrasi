<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }

$host = '127.0.0.1';
$db = 'simad';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Koneksi database gagal: '.$e->getMessage()]);
    exit;
}
function body(): array { return json_decode(file_get_contents('php://input'), true) ?: []; }
function ok($data=[]): never { echo json_encode(['success'=>true,'data'=>$data], JSON_UNESCAPED_UNICODE); exit; }
function fail($message, $code=400): never { http_response_code($code); echo json_encode(['success'=>false,'message'=>$message], JSON_UNESCAPED_UNICODE); exit; }
