import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import SetupGuideView from "@/views/SetupGuideView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/setup-guide",
      name: "setup-guide",
      component: SetupGuideView,
    },
  ],
});

export default router;
