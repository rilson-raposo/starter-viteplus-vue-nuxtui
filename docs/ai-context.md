# AI Context - starter-viteplus-vue-nuxtui

Este arquivo centraliza referencias para agentes trabalharem com eficiencia neste starter.

## Nuxt UI LLM Context

- Compact: `https://ui.nuxt.com/llms.txt`
- Full: `https://ui.nuxt.com/llms-full.txt`

Use `llms.txt` por padrao e recorra ao `llms-full.txt` apenas para casos de implementacao profunda.

## MCP Server

- URL: `https://ui.nuxt.com/mcp`
- Config local do workspace: `.vscode/mcp.json`

## Nuxt UI Skills

```sh
npx skills add nuxt/ui
```

Opcional para Codex:

```sh
npx skills add nuxt/ui --agent codex
```

Referencia oficial:

- `https://github.com/nuxt/ui/tree/v4/skills/nuxt-ui/SKILL.md`

## Guardrails do starter

- Stack fixa: Vue + Vite+ + Nuxt UI (sem Nuxt framework).
- Comandos de rotina via `vp`.
- Base path padrao: `/admin/starter-viteplus-vue-nuxtui/`.
- Router em history mode e rewrite Apache obrigatorio para rotas internas.
