import {createRouter, createWebHistory} from 'vue-router'

import formIndex from '../components/Form/index.vue';

import notFound from '../components/notFound.vue';

const routes = [
    {
        path:'/',
        component:formIndex
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
]
const router = createRouter({
    history:createWebHistory(),
    routes
 })
 export default router
