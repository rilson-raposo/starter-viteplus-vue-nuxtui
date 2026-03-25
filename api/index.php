<?php

session_start();
require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/controllers/HealthController.php';

header('Content-Type: application/json; charset=UTF-8');

if (!empty($_SERVER['HTTP_ORIGIN'])) {
  header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
  header('Access-Control-Allow-Credentials: true');
  header('Vary: Origin');
}

header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Accept, Origin');
header('Access-Control-Max-Age: 86400');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'OPTIONS') {
  http_response_code(204);
  exit;
}

Flight::route('GET /health', [new HealthController(), 'getHealth']);

Flight::route('GET /me', function () {
  $codUsuario = (int) ($_SESSION['info_usuario']['cod_usuario'] ?? 0);
  Flight::json([
    'data' => [
      'cod_usuario' => $codUsuario,
      'is_authenticated' => $codUsuario > 0,
    ],
  ]);
});

Flight::start();
