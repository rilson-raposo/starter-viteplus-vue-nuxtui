#!/usr/bin/env bash
set -euo pipefail

TEMPLATE_NAME="starter-viteplus-vue-nuxtui"
PROJECT_NAME="$(basename "$PWD")"

FILES=(
  "vite.config.ts"
  ".htaccess"
  "api/.htaccess"
  "index.php"
  ".env.example"
  "package.json"
)

if [[ "$PROJECT_NAME" == "$TEMPLATE_NAME" ]]; then
  echo "Diretorio atual ainda usa nome de template: $PROJECT_NAME"
  echo "Renomeie o diretorio antes de executar este script."
  exit 1
fi

MISSING=0
for file in "${FILES[@]}"; do
  if [[ ! -f "$file" ]]; then
    echo "Arquivo nao encontrado: $file"
    MISSING=1
  fi
done

if [[ "$MISSING" -ne 0 ]]; then
  echo "Abortado: faltam arquivos esperados."
  exit 1
fi

for file in "${FILES[@]}"; do
  sed -i "s|$TEMPLATE_NAME|$PROJECT_NAME|g" "$file"
  echo "Atualizado: $file"
done

echo ""
echo "Template configurado com sucesso para: $PROJECT_NAME"
