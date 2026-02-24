import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "@/views/HomeView.vue";
import RestaurantsView from "@/views/RestaurantsView.vue";
import BookingView from "@/views/BookingView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: HomeView,
      meta: {
        title: 'Kezdőlap'
      }
    },
    {
      path: '/restaurants',
      name: 'Restaurants',
      component: RestaurantsView,
      meta: {
        title: 'Éttermek'
      }
    },
    {
      path: '/restaurants/:id',
      name: 'restaurant-detail',
      component: RestaurantsView,
      meta: {
        title: 'Részletek'
      }
    },
    {
      path: '/bookings',
      name: 'bookings',
      component: BookingView,
      meta: {
        title: 'Foglalások'
      }
    },
  ]
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title + ' - Foglaló';
  next()
})

export default router
