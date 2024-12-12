import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "root",
        component: () => import("./pages/Login.vue"),
        meta: { requiresAuth: false }, // Public route
    },
    {
        path: "/login",
        name: "login",
        component: () => import("./pages/Login.vue"),
        meta: { requiresAuth: false },
    },
    {
        path: "/register",
        name: "register",
        component: () => import("./pages/Register.vue"),
        meta: { requiresAuth: false },
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: () => import("./pages/Dashboard.vue"),
        redirect: { name: "vehicles" }, //default route
        meta: { requiresAuth: true }, // Private route
        children: [
            {
                path: "vehicles",
                name: "vehicles",
                component: () => import("./pages/Vehicle.vue"),
            },
            {
                path: "vehicles/add",
                name: "vehicles.add",
                component: () => import("./pages/Vehicleform.vue"),
            },
            {
                path: "vehicles/:id/edit",
                name: "vehicles.edit",
                component: () => import("./pages/Editform.vue"),
            },
            {
                path: "user",
                name: "user",
                component: () => import("./pages/User.vue"),
            },
        ],
    },
    {
        path: "/:pathMatch(.*)*",
        name: "notFound",
        component: () => import("./pages/Notfound.vue"),
        meta: { requiresAuth: false }, // Private route
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

//route guard
router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem("authToken");

    // If the user is authenticated and is navigating to a public page (login, register, etc.), redirect to dashboard
    if (isAuthenticated && !to.meta.requiresAuth) {
        next({ name: "dashboard" });
    } else if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: "login" });
    } else {
        next();
    }
});

export default router;
