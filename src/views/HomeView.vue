<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { getApiHealth } from '@/api/healthApi'

const loading = ref(true)
const health = ref<{ ok: boolean; service: string; timestamp: string } | null>(null)
const errorMessage = ref('')

async function loadHealth(): Promise<void> {
  loading.value = true
  errorMessage.value = ''

  try {
    health.value = await getApiHealth()
  } catch (error) {
    errorMessage.value = error instanceof Error ? error.message : 'Failed to load /api/health'
  } finally {
    loading.value = false
  }
}

onMounted(loadHealth)
</script>

<template>
  <section class="space-y-6">
    <UCard class="rounded-3xl border border-cyan-100/90 shadow-sm">
      <template #header>
        <div class="flex items-center gap-2">
          <UIcon name="i-lucide-sparkles" class="text-cyan-600" />
          <h2 class="text-xl font-semibold">Starter status</h2>
        </div>
      </template>

      <p class="text-sm text-neutral-600">
        Este template combina Vue 3, Vite+, Nuxt UI e bridge PHP para deploy em subdiretorio Apache.
      </p>

      <div class="mt-5 flex flex-wrap gap-3">
        <UBadge color="primary" variant="soft">vue-router history mode</UBadge>
        <UBadge color="neutral" variant="soft">php bridge</UBadge>
        <UBadge color="neutral" variant="soft">flightphp api</UBadge>
        <UBadge color="primary" variant="soft">nuxt ui + tailwind</UBadge>
      </div>
    </UCard>

    <UCard class="rounded-3xl border border-neutral-200/90 shadow-sm">
      <template #header>
        <div class="flex items-center justify-between gap-3">
          <h3 class="text-base font-semibold">API check</h3>
          <UButton icon="i-lucide-refresh-cw" color="neutral" variant="soft" @click="loadHealth">
            Refresh
          </UButton>
        </div>
      </template>

      <p v-if="loading" class="text-sm text-neutral-500">Loading /api/health...</p>
      <UAlert
        v-else-if="errorMessage"
        color="error"
        variant="soft"
        icon="i-lucide-triangle-alert"
        :title="errorMessage"
      />

      <div v-else-if="health" class="grid gap-3 text-sm sm:grid-cols-3">
        <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-3">
          <p class="text-xs uppercase tracking-wide text-neutral-500">ok</p>
          <p class="mt-1 font-semibold text-emerald-700">{{ health.ok ? 'true' : 'false' }}</p>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-3">
          <p class="text-xs uppercase tracking-wide text-neutral-500">service</p>
          <p class="mt-1 font-semibold text-neutral-900">{{ health.service }}</p>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-3">
          <p class="text-xs uppercase tracking-wide text-neutral-500">timestamp</p>
          <p class="mt-1 font-semibold text-neutral-900">{{ health.timestamp }}</p>
        </div>
      </div>
    </UCard>
  </section>
</template>
