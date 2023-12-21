import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import ForgotPage from '../components/Forgot.vue'

import Admin from '../components/AdminPage/Admin.vue'
import NewsStatus from '../components/AdminPage/NewsStatus.vue'
import Collaboration from '../components/AdminPage/Collaboration.vue'

import News from '../components/UserPage/News.vue'
import Home from '../components/UserPage/Home.vue'
import Contact from '../components/UserPage/Contact.vue'
import About from '../components/UserPage/About.vue'

import Staff from '../components/StaffPage/Staff.vue'
import ViewTeam from '../components/StaffPage/ViewTeam.vue'
import AddNews from '../components/StaffPage/AddNews.vue'
import ManageNews from '../components/StaffPage/ManageNews.vue'
import Category from '../components/StaffPage/Category.vue'

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
    name: 'Admin',
    component: Admin
  },
  {
    path: '/addnews',
    component:AddNews
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
    path: '/',
    component:Home
  },
  {
    path: '/contact',
    component:Contact
  },
  {
    path: '/about',
    component:About
  },
  {
    path: '/viewRole',
    component:ViewTeam
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
