import {createWebHistory, createRouter } from 'vue-router'
import LoginComponent from '../views/components/auth/LoginComponent.vue'
import BoardListComponent from '../views/components/board/BoardListComponent.vue';

const routes = [
    {
        path: '/',
        redirect: '/login'
    },
    {
        path: '/login',
        component: LoginComponent,
    },
    {
        path: '/board',
        component: BoardListComponent,
    },
]   

const router = createRouter({
    history: createWebHistory(),
    routes, 
})

export default router;