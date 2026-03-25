#!/usr/bin/env bash
# scaffold.sh - Cria um novo projeto a partir deste template
#
# Uso:
#   bash /internet/dev/empauta/admin/starter-viteplus-vue-nuxtui/scaffold.sh <nome-do-projeto>
#
# Exemplo:
#   bash scaffold.sh minha-nova-app
#
# O novo projeto será criado em:
#   /internet/dev/empauta/admin/<nome-do-projeto>

set -e

TEMPLATE_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_NAME="${1:?Informe o nome do projeto como argumento}"
TARGET_DIR="$(dirname "$TEMPLATE_DIR")/$PROJECT_NAME"

if [ -e "$TARGET_DIR" ]; then
  echo "Erro: diretório '$TARGET_DIR' já existe." >&2
  exit 1
fi

echo "→ Copiando template para $TARGET_DIR ..."
rsync -a \
  --exclude node_modules \
  --exclude assets \
  --exclude .vite \
  --exclude .tmp \
  --exclude pnpm-lock.yaml \
  "$TEMPLATE_DIR"/ "$TARGET_DIR"/

echo "→ Substituindo base path para /$PROJECT_NAME ..."
FILES=(
  "$TARGET_DIR/vite.config.ts"
  "$TARGET_DIR/.htaccess"
  "$TARGET_DIR/api/.htaccess"
  "$TARGET_DIR/index.php"
  "$TARGET_DIR/.env.example"
  "$TARGET_DIR/package.json"
  "$TARGET_DIR/.github/copilot-instructions.md"
  "$TARGET_DIR/AGENTS.md"
  "$TARGET_DIR/README.md"
)

for f in "${FILES[@]}"; do
  [ -f "$f" ] && sed -i "s|starter-viteplus-vue-nuxtui|$PROJECT_NAME|g" "$f"
done

echo ""
echo "✓ Projeto '$PROJECT_NAME' criado em $TARGET_DIR"
echo ""
echo "Próximos passos:"
echo "  cd $TARGET_DIR"
echo "  vp install"
echo "  composer install"
echo "  vp dev"
