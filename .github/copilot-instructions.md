# Copilot Instructions - starter-viteplus-vue-nuxtui

## Project intent

Reusable isolated starter for admin apps in this monorepo:

- Vue 3 + TypeScript
- Vite+ (`vp`)
- Nuxt UI (without Nuxt framework)
- PHP bridge (`index.php`) + FlightPHP API (`api/`)
- Apache history fallback (`.htaccess`)

## Non-negotiable rules

1. Keep the project isolated from other monorepo folders.
2. Keep router in `createWebHistory(import.meta.env.BASE_URL)`.
3. Keep these files aligned on path changes:
   - `vite.config.ts` (`base`)
   - `.htaccess` and `api/.htaccess` (`RewriteBase`)
   - `index.php` (`$basePath`)
4. Do not install Nuxt framework.
5. Prefer `vp` commands for lifecycle tasks.

## Agent workflow

1. Run `vp install` and `composer install` before coding.
2. Use `vp dev` for local frontend iteration.
3. Validate with:
   - `vp run type-check`
   - `vp lint . --fix`
   - `eslint . --fix --cache`
   - `vp build`

## AI references

- Nuxt UI compact LLM context: `https://ui.nuxt.com/llms.txt`
- Nuxt UI full LLM context: `https://ui.nuxt.com/llms-full.txt`
- Nuxt UI MCP server: `https://ui.nuxt.com/mcp`
