<?php

class BaseController
{
  protected $conrw;

  public function __construct()
  {
    $this->conrw = $GLOBALS['conrw'] ?? null;
  }

  protected function respondJson($payload, int $statusCode = 200)
  {
    return Flight::json($payload, $statusCode);
  }

  protected function requestData(): array
  {
    $data = Flight::request()->data;

    if (is_array($data)) {
      return $data;
    }

    if (is_object($data) && method_exists($data, 'getData')) {
      return $data->getData();
    }

    return [];
  }

  protected function sanitizeString($value): string
  {
    return trim((string) ($value ?? ''));
  }

  protected function currentUserId(): int
  {
    return (int) ($_SESSION['info_usuario']['cod_usuario'] ?? 0);
  }
}
