<?php
require_once __DIR__ . '/vendor/autoload.php';

error_reporting(0);
ini_set('display_errors', 0);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];

$request_uri = rtrim($request_uri, '/');

if ($request_uri === '/data' && $request_method === 'GET') {
    require_once __DIR__ . '/src/services/ApiClient.php';
    require_once __DIR__ . '/src/services/PredictionService.php';
    
    try {
        $apiClient = new App\Services\ApiClient();
        $rows = $apiClient->fetchLoginRows();
        
        $predictionService = new App\Services\PredictionService();
        $results = array_map([$predictionService, 'predictForUser'], $rows);
        
        echo json_encode($results);
    } catch (Exception $e) {
        http_response_code(502);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
} 