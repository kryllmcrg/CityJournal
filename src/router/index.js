import { createRouter, createWebHistory } from 'vue-router'
import Landing from '../components/Landing.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import ForgotPage from '../components/Forgot.vue'
import RichTextEditor from '../components/RichTextEditor.vue'
import Admin from '../components/AdminPage.vue/Admin.vue'
import NewsStatus from '../components/AdminPage.vue/NewsStatus.vue'
import Collaboration from '../components/AdminPage.vue/Collaboration.vue'
import News from '../components/UserPage.vue/News.vue'
import Home from '../components/UserPage.vue/Home.vue'
import Contact from '../components/UserPage.vue/Contact.vue'
import About from '../components/UserPage.vue/About.vue'
import AddNews from '../components/StaffPage.vue/AddNews.vue'
import Staff from '../components/StaffPage.vue/Staff.vue'
import ManageNews from '../components/StaffPage.vue/ManageNews.vue'
import Category from '../components/StaffPage.vue/Category.vue'

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
    name: 'Admin',
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
    name: 'Staff',
    component:Staff
  },
  {
    path: '/forgot',
    component:ForgotPage
  },
  {
    path: '/status',
    component:NewsStatus
  },
  {
    path: '/managenews',
    component:ManageNews
  },
  {
    path: '/collab',
    component:Collaboration
  },
  {
    path: '/category',
    component:Category
  },
  {
    path: '/news',
    component:News
  },
  {
    path: '/home',
    component:Home
  },
  {
    path: '/contact',
    component:Contact
  },
  {
    path: '/about',
    component:About
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
