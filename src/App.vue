<script setup lang="ts">
import { pt_br } from '@nuxt/ui/locale'

const route = useRoute()

const navigationItems = [
  {
    label: 'Starter Home',
    description: 'Overview da stack e health API',
    to: '/',
    icon: 'i-lucide-house',
    name: 'home',
  },
  {
    label: 'Setup Guide',
    description: 'Checklist para reutilizar o template',
    to: '/setup-guide',
    icon: 'i-lucide-list-checks',
    name: 'setup-guide',
  },
] as const

function isActiveRoute(name: string): boolean {
  return route.name === name
}
</script>

<template>
  <UApp :locale="pt_br">
    <main
      class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(6,182,212,0.2),_transparent_38%),linear-gradient(180deg,_#f4f4f5_0%,_#ffffff_45%,_#ecfeff_100%)] text-neutral-900">
      <div class="mx-auto flex min-h-screen max-w-7xl flex-col gap-6 px-4 py-6 sm:px-6 lg:flex-row lg:px-8 lg:py-8">
        <aside class="w-full shrink-0 lg:w-80">
          <div
            class="sticky top-6 rounded-3xl border border-cyan-200/70 bg-white/85 p-4 shadow-sm backdrop-blur sm:p-5">
            <div class="mb-5 border-b border-neutral-200 pb-4">
              <p class="text-xs uppercase tracking-[0.18em] text-cyan-700">Vue + Vite+ + Nuxt UI</p>
              <h1 class="mt-2 text-2xl font-semibold tracking-tight text-neutral-950">Starter Template</h1>
              <p class="mt-2 text-sm text-neutral-600">
                Base isolada para novos projetos em subpath Apache com Vue Router em history mode.
              </p>
            </div>

            <nav class="space-y-2">
              <UButton v-for="item in navigationItems" :key="item.name" :to="item.to" block size="lg" :icon="item.icon"
                :color="isActiveRoute(item.name) ? 'primary' : 'neutral'"
                :variant="isActiveRoute(item.name) ? 'solid' : 'ghost'" class="justify-start rounded-2xl"
                :ui="{ base: 'h-auto px-4 py-3' }">
                <div class="text-left">
                  <p class="text-sm font-semibold">{{ item.label }}</p>
                  <p class="text-xs opacity-75">{{ item.description }}</p>
                </div>
              </UButton>
            </nav>
          </div>
        </aside>

        <section class="min-w-0 flex-1">
          <RouterView />
        </section>
      </div>
    </main>
  </UApp>
</template>