import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "../views/HomeView.vue";
import LoginView from "../views/auth/LoginView.vue";
import RegisterView from "../views/auth/RegisterView.vue";
import DashboardView from "../views/user/DashboardView";
import CourseIndexView from "../views/courses/CourseIndexView";
import store from "@/store";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/login",
    name: "login",
    component: LoginView
  },
  {
    path: "/register",
    name: "register",
    component: RegisterView
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: DashboardView,
    meta: { requiresAuth: true },
  },
  {
    path:"/courses",
    name:"courses",
    component:CourseIndexView,
    neta: {requiresAuth: true}
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.GITPOD_WORKSPACE_ID,
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.getters.userLoggedIn) {
    next({ name: "login" })
  }

  next()
});

export default router;
