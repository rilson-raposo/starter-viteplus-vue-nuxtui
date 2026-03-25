<template>
  <section class="space-y-6">
    <UCard class="rounded-3xl border border-neutral-200/90 shadow-sm">
      <template #header>
        <h2 class="text-xl font-semibold">Setup guide</h2>
      </template>

      <ol class="list-decimal space-y-2 pl-5 text-sm text-neutral-700">
        <li>Renomeie o diretorio para o nome do novo projeto.</li>
        <li>Atualize o base path em <code>vite.config.ts</code>, <code>.htaccess</code> e <code>index.php</code>.</li>
        <li>Altere o campo <code>name</code> do <code>package.json</code>.</li>
        <li>Execute <code>vp install</code> e <code>vp dev</code>.</li>
        <li>Valide o endpoint <code>/api/health</code>.</li>
        <li>Configure permissao/autenticacao no PHP antes de subir para producao.</li>
      </ol>
    </UCard>

    <UCard class="rounded-3xl border border-cyan-200/70 bg-cyan-50/55 shadow-sm">
      <template #header>
        <h3 class="text-base font-semibold">Agent-ready context</h3>
      </template>

      <ul class="list-disc space-y-2 pl-5 text-sm text-neutral-700">
        <li>AGENTS.md descreve stack, comandos e guardrails.</li>
        <li>docs/ai-context.md centraliza llms.txt, mcp e references de skills.</li>
        <li>.vscode/mcp.json registra Nuxt UI MCP para assistentes compatveis.</li>
      </ul>
    </UCard>
  </section>
</template>
