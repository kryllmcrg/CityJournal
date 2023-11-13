import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import register from '../components/register.vue'
import admin from '../components/adminpage.vue/admin.vue'
import user from '../components/userpage.vue/user.vue'
import AboutSection from '../components/userpage.vue/AboutSection.vue'
import ContactSection from '../components/userpage.vue/ContactSection.vue'
import HomeSection from '../components/userpage.vue/HomeSection.vue'
import AddNews from '../components/adminpage.vue/AddNews.vue'

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
  {
    path: '/user',
    component: user
  },
  {
    path: '/about',
    component: AboutSection
  },
  {
    path: '/contact',
    component: ContactSection
  },
  {
    path: '/home',
    component: HomeSection
  },
  {
    path: '/addnews',
    component: AddNews
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
