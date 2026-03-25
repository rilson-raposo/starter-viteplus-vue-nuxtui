<?php

session_start();
header('Content-Type: text/html; charset=UTF-8');

$basePath = '/admin/starter-viteplus-vue-nuxtui/';
$devServer = 'http://localhost:5173';

if (!empty($_GET['VUE_DEV_ON'])) {
  $_SESSION['VUE_DEV'] = true;
}

if (!empty($_GET['VUE_DEV_OFF'])) {
  $_SESSION['VUE_DEV'] = false;
}

$isDev = !empty($_SESSION['VUE_DEV']);

function renderProdAssets(string $basePath): string
{
  $manifestPath = __DIR__ . '/.vite/manifest.json';

  if (!file_exists($manifestPath)) {
    return '<!-- Build not found. Run `vp build` to generate assets. -->';
  }

  $manifestRaw = file_get_contents($manifestPath);
  $manifest = json_decode((string) $manifestRaw, true);

  if (!is_array($manifest) || empty($manifest['src/main.ts']['file'])) {
    return '<!-- Invalid manifest file. -->';
  }

  $entry = $manifest['src/main.ts'];
  $tags = [];

  if (!empty($entry['css']) && is_array($entry['css'])) {
    foreach ($entry['css'] as $css) {
      $tags[] = '<link rel="stylesheet" href="' . $basePath . $css . '">';
    }
  }

  $tags[] = '<script type="module" src="' . $basePath . $entry['file'] . '"></script>';

  return implode("\n    ", $tags);
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Starter Vue + Vite+ + Nuxt UI</title>
  <?php if ($isDev) { ?>
    <script type="module" src="<?= $devServer . $basePath ?>@vite/client"></script>
    <script type="module" src="<?= $devServer . $basePath ?>src/main.ts"></script>
  <?php } else { ?>
    <?= renderProdAssets($basePath) ?>
  <?php } ?>
</head>

<body>
  <div id="app" class="isolate"></div>
</body>

</html>