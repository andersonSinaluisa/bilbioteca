import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/LoginView.vue'
import HomeView from '../views/HomeView.vue'
import BooksView from '../views/BooksView.vue'
import BookCreate from '../views/BooksCreateView.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      beforeEnter: (to, from, next) => {
        if (localStorage.getItem('token')) {
          next()
        } else {
           
          next({ name: 'login' })
        }
      },
      children: [
        {
          path: '/books',
          name: 'books',
          component: BooksView,
        },
        {
          path:'/books/new',
          name:'create-book',
          component:BookCreate
        }
      ]
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      beforeEnter: (to, from, next) => {
        if (localStorage.getItem('token')) {
          next({ name: 'home' })
        } else {
          next()
        }
      }
    },
  ]
})

export default router
