import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Admin from '../components/AdminPage.vue/Admin.vue'
import AddNews from '../components/AdminPage.vue/AddNews.vue'
import RichTextEditor from '../components/RichTextEditor.vue'
import Staff from '../components/StaffPage.vue/Staff.vue'

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
  },
  {
    path: '/rich',
    component:RichTextEditor
  },
  {
    path: '/staff',
    component:Staff
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
