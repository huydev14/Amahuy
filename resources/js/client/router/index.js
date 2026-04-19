import { createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('@client/pages/Home.vue'),
    }
];

const router = createRouter({
    history: createWebHistory('/client'),
    routes,
})

export default router;
