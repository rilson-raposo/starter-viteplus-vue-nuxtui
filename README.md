# Starter Vue + Vite+ + Nuxt UI (sem Nuxt)

Template isolado para criar novos projetos em `empauta/admin/*` com:

- Vue 3 + TypeScript
- Vite+ (`vp`)
- Nuxt UI + Tailwind v4
- Vue Router com `createWebHistory`
- Bridge PHP (`index.php`) + API minima com FlightPHP (`api/`)
- Apache rewrite para Beautiful URLs (`.htaccess`)

## Isolamento no monorepo

Este diretorio deve funcionar de forma autonoma:

- Dependencias instaladas localmente (`node_modules` local)
- Scripts e build proprios
- Sem importacao de codigo de outros projetos do monorepo

## Setup rapido

```sh
vp install
composer install
vp dev
```

## Build

```sh
vp build
vp run type-check
```

O build gera `assets/` e `.vite/manifest.json` na raiz para o `index.php` servir os arquivos compilados.

## Beautiful URLs

- Router: `createWebHistory(import.meta.env.BASE_URL)` em `src/router/index.ts`
- Apache fallback: `.htaccess` com `RewriteBase /admin/starter-viteplus-vue-nuxtui/`
- Excecoes de rewrite: `api` e `assets`

## Contexto para agentes

- [AGENTS.md](AGENTS.md)
- [docs/ai-context.md](docs/ai-context.md)
- [.vscode/mcp.json](.vscode/mcp.json)
- [.github/copilot-instructions.md](.github/copilot-instructions.md)

## Checklist de reutilizacao

1. Renomear o diretorio para o novo projeto.
2. Atualizar o base path em `vite.config.ts`, `.htaccess` e `index.php`.
3. Ajustar `name` no `package.json`.
4. Substituir as rotas/views de exemplo.
5. Adaptar API (`api/index.php`) e regras de autenticacao.
