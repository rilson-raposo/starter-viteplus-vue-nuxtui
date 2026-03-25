import { fileURLToPath, URL } from "node:url";

import { defineConfig } from "vite-plus";
import vue from "@vitejs/plugin-vue";
import ui from "@nuxt/ui/vite";
import vueDevTools from "vite-plugin-vue-devtools";

const basePath =
  process.env.VITE_PUBLIC_BASE_PATH || "/admin/starter-viteplus-vue-nuxtui/";

export default defineConfig({
  base: basePath,
  build: {
    manifest: true,
    outDir: ".",
    emptyOutDir: false,
    assetsDir: "assets",
  },
  server: {
    cors: {
      origin: "*",
      methods: ["GET", "POST", "PUT", "DELETE"],
      credentials: true,
    },
  },
  fmt: {
    semi: false,
    singleQuote: true,
  },
  lint: {
    plugins: ["eslint", "typescript", "unicorn", "oxc", "vue"],
    env: {
      browser: true,
    },
    categories: {
      correctness: "error",
    },
    options: {
      typeAware: true,
      typeCheck: true,
    },
  },
  plugins: [
    vue(),
    ui({
      autoImport: {
        imports: ["vue", "vue-router"],
        eslintrc: {
          enabled: true,
          filepath: "./.eslintrc-auto-import.json",
          globalsPropValue: true,
        },
      },
    }),
    vueDevTools(),
  ],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
});
