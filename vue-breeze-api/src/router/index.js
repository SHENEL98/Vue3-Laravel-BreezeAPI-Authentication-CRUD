import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home.vue";

const routes = [
  { path: "/", name: "Home", component: Home },
  {
    path: "/post",
    name: "Post",
    component: () => import("../components/pages/Post.vue"),
  },
  {
    path: "/skills",
    name: "SkillsIndex",
    component: () => import("../components/pages/skill/Index.vue"),
  },
  {
    path: "/skills/create",
    name: "SkillCreate",
    component: () => import("../components/pages/skill/Create.vue"),
  },
  {
    path: "/skills/:id/edit",
    name: "SkillEdit",
    component: () => import("../components/pages/skill/Edit.vue"),
  },
  {
    path: "/login",
    name: "Login",
    component: () => import("../components/Login.vue"),
  },
  {
    path: "/register",
    name: "Register",
    component: () => import("../components/Register.vue"),
  },
  {
    path: "/forgot-password",
    name: "ForgotPassword",
    component: () => import("../components/ForgotPassword.vue"),
  },
  {
    path: "/password-reset/:token",
    name: "ResetPassword",
    component: () => import("../components/ResetPassword.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
