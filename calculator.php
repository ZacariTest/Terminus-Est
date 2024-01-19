<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $weight = $_GET['weight'] ?? null;
    $height = $_GET['height'] ?? null;
    $age = $_GET['age'] ?? null;

    $calories = calcularCalorias($weight, $height, $age);
    echo json_encode(['calories' => $calories]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $weight = $data['weight'] ?? null;
    $height = $data['height'] ?? null;
    $age = $data['age'] ?? null;

    $calories = calcularCalorias($weight, $height, $age);

    echo json_encode(['calories' => $calories]);
    exit;
}

function calcularCalorias($weight, $height, $age) {
    return $weight * 10 + $height * 5 - $age * 2;
}
?>

