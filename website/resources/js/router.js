import VueRouter from 'vue-router'
// Pages
import Home from './pages/Home'
import Signup from './pages/Signup'
import Login from './pages/Login'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/signup',
    name: 'Signup',
    component: Signup,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    meta: {
      auth: false
    }
  },
]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router
