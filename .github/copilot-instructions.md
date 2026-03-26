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

### Development guardrails for this project

- Do not install Nuxt framework.
- Keep stack as Vue + Vite+ + Nuxt UI.
- Use `vp` for dependency and script operations.

## Project-Specific Notes

- This app uses Vue 3 single-file components with TypeScript and Vue Router.
- Nuxt UI v4 is installed for a plain Vue + Vite app, not a Nuxt app.
- Use `vp` for dependency management and task execution. Do not call `pnpm`, `npm`, or `yarn` directly.
- Nuxt UI is configured through `@nuxt/ui/vite` in `vite.config.ts` and installed in Vue through `@nuxt/ui/vue-plugin` in `src/main.ts`.
- Tailwind CSS and Nuxt UI styles are loaded from `src/assets/css/main.css` using `@import "tailwindcss";` and `@import "@nuxt/ui";`.
- Keep the root app wrapped in `UApp`; it is required for Toast, Tooltip, Modal, Slideover, and other overlay-driven Nuxt UI features.
- Nuxt UI auto-registers components with the `U` prefix. Prefer `UButton`, `UCard`, `UInput`, `UModal`, etc. without manual component imports.
- Nuxt UI auto-imports Vue, Vue Router, and Nuxt UI composables. Prefer using APIs such as `ref`, `computed`, `watch`, `useRoute`, `useRouter`, `useToast`, and `useOverlay` without manual imports.
- Generated declaration files live at `auto-imports.d.ts` and `components.d.ts` in the project root. Do not hand-edit them; keep them included in `tsconfig.app.json`.
- Keep the Nuxt UI alias mappings in `tsconfig.app.json` and `tsconfig.node.json` for `#build/ui` so config-time types and theme hints resolve correctly.
- Prefer the Nuxt UI `ui` prop and semantic utility classes for styling component internals before creating wrapper components or ad hoc class APIs.
- Keep `index.html` root container as `#app.isolate` to avoid overlay and stacking-context issues.
- Prefer the `@/` alias for app imports.
- Validate changes with `vp check`, `vp test`, and `vp build` when the change affects runtime behavior or tooling.

## Additional Nuxt UI Notes

- Keep Nuxt UI `autoImport` and `components` enabled in `ui()` options unless there is a strong reason to disable them.
- If Tailwind class prefix is introduced in this project, align Nuxt UI config with `theme.prefix` in `ui()` options.
- If the app ever moves away from `vue-router`, explicitly configure Nuxt UI `router` integration in `vite.config.ts`.
- When using Nuxt UI MCP for docs lookup, prefer targeted section queries (for example, usage or api sections) to reduce context size and improve response focus.


