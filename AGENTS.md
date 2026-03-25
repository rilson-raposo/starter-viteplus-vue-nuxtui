# AGENTS - starter-viteplus-vue-nuxtui

## Objective

Starter isolado para novos projetos em subdiretorios Apache usando Vue + Vite+ + Nuxt UI (sem Nuxt framework), com API PHP minima em FlightPHP.

## Core Stack

- Vue 3 + TypeScript
- Vite+ (`vp`)
- Nuxt UI + Tailwind CSS v4
- Vue Router com `createWebHistory`
- PHP bridge (`index.php`) + FlightPHP (`api/index.php`)

## Required Commands

```sh
vp install
composer install
vp dev
vp build
vp run type-check
vp lint . --fix
eslint . --fix --cache
```

## Guardrails

- Nao instalar Nuxt framework.
- Nao importar codigo de outros subprojetos do monorepo.
- Manter alinhamento entre `vite.config.ts` (`base`), `.htaccess` (`RewriteBase`) e `index.php` (`$basePath`).
- Preservar `createWebHistory(import.meta.env.BASE_URL)` no router.
- Manter `UApp` no root do app para overlays do Nuxt UI.

## AI Context

- LLM compact: `https://ui.nuxt.com/llms.txt`
- LLM full: `https://ui.nuxt.com/llms-full.txt`
- MCP server: `https://ui.nuxt.com/mcp`
- Workspace MCP file: `.vscode/mcp.json`
- Extra context: `docs/ai-context.md`

## API Pattern

Use FlightPHP em `api/index.php` com controladores em `api/controllers/`.

Padrao de rota:

```php
Flight::route('GET /example/@id', [new ExampleController(), 'getById']);
```

Entrada JSON:

- `Flight::request()->data` para body
- `Flight::request()->query` para query string

## Reuse Checklist

1. Renomear diretorio e package name.
2. Atualizar `base` em `vite.config.ts`.
3. Atualizar `RewriteBase` em `.htaccess` e `api/.htaccess`.
4. Atualizar `$basePath` em `index.php`.
5. Adaptar rotas do frontend e endpoints da API.
