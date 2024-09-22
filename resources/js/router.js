import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "root",
        component: () => import("./pages/Login.vue"),
        meta: { requiresAuth: false }  // Public route
    },
    {
        path: "/login",
        name: "login",
        component: () => import("./pages/Login.vue"),
        meta: { requiresAuth: false }  
    },
    {
        path: "/register",
        name: "register",
        component: () => import("./pages/Register.vue"),
        meta: { requiresAuth: false }
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: { requiresAuth: true }  // Private route
    }
];

const router = createRouter({
    history : createWebHistory(),
    routes,
});

//route guard
router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('authToken');
    

    // If the user is authenticated and is navigating to a public page (login, register, etc.), redirect to dashboard
    if (isAuthenticated && !to.meta.requiresAuth) {
        next({ name: 'dashboard' });
    } else if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: 'login' });
    } else {
        next();
    }

});

export default router;