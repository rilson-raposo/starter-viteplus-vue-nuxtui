import { existsSync, readFileSync } from "node:fs";
import { globalIgnores } from "eslint/config";
import {
  defineConfigWithVueTs,
  vueTsConfigs,
} from "@vue/eslint-config-typescript";
import pluginVue from "eslint-plugin-vue";
import pluginOxlint from "eslint-plugin-oxlint";
import skipFormatting from "eslint-config-prettier/flat";

type AutoImportEslintConfig = {
  globals?: Record<string, boolean>;
};

const autoImportGlobalsPath = new URL(
  "./.eslintrc-auto-import.json",
  import.meta.url,
);
let autoImportConfig: AutoImportEslintConfig = {};

if (existsSync(autoImportGlobalsPath)) {
  autoImportConfig = JSON.parse(
    readFileSync(autoImportGlobalsPath, "utf8"),
  ) as AutoImportEslintConfig;
}

export default defineConfigWithVueTs(
  {
    name: "app/files-to-lint",
    files: ["**/*.{vue,ts,mts,tsx}"],
    languageOptions: {
      globals: autoImportConfig.globals,
    },
  },

  globalIgnores(["**/dist/**", "**/dist-ssr/**", "**/coverage/**"]),

  ...pluginVue.configs["flat/essential"],
  vueTsConfigs.recommended,

  ...pluginOxlint.buildFromOxlintConfigFile(".oxlintrc.json"),

  skipFormatting,
);
