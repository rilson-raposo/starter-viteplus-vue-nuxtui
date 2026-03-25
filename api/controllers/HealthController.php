<?php

require_once __DIR__ . '/BaseController.php';

class HealthController extends BaseController
{
  public function getHealth()
  {
    return $this->respondJson([
      'ok' => true,
      'service' => 'starter-viteplus-vue-nuxtui',
      'timestamp' => gmdate('c'),
    ]);
  }
}
