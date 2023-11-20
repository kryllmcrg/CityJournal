import { createRouter, createWebHistory } from 'vue-router'
import Landing from '../components/Landing.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Admin from '../components/AdminPage.vue/Admin.vue'
import User from '../components/UserPage.vue/User.vue'
import AddNews from '../components/AdminPage.vue/AddNews.vue'
import RichTextEditor from '../components/RichTextEditor.vue'
import Staff from '../components/StaffPage.vue/Staff.vue'

const routes = [
  {
    path: '/landing',
    component: Landing
  },
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
  },
  {
    path: '/user',
    component:User
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
