import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import register from '../components/Register.vue'
import admin from '../components/adminpage.vue/admin.vue'
const routes = [
  {
    path: '/login',
    component: Login
  },
  {
    path: '/register',
    component: register
  },
  {
    path: '/admin',
    component: admin
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
