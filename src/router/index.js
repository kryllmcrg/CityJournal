import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Admin from '../components/AdminPage.vue/Admin.vue'
import User from '../components/UserPage.vue/User.vue'
import AboutSection from '../components/UserPage.vue/AboutSection.vue'
import ContactSection from '../components/UserPage.vue/ContactSection.vue'
import HomeSection from '../components/UserPage.vue/HomeSection.vue'
import AddNews from '../components/AdminPage.vue/AddNews.vue'

const routes = [
  {
    path: '/login',
    component: Login
  },
  {
    path: '/register',
    component: Register
  },
  {
    path: '/admin',
    component: Admin
  },
  {
    path: '/user',
    component: User
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
    component:AddNews
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
