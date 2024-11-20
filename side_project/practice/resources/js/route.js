import {createWebHistory, createRouter } from 'vue-router'
import LoginComponent from '../views/components/auth/LoginComponent.vue'

const routes = [
    {
        path: '/',
        redirect: '/login'
    },
    {
        path: '/login',
        component: LoginComponent,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes, 
})

export default router;