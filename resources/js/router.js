import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/home",
        component: () => import("./pages/HomeRoute.vue")
    },
    {
        path: "/test",
        component: () => import("./pages/TestRoute.vue")
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});

