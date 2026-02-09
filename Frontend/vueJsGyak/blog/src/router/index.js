import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "@/views/HomeView.vue";
import AboutView from "@/views/AboutView.vue";
import PostsView from "@/views/PostsView.vue";
import NotFoundView from "@/views/NotFoundView.vue";
import PostDetailView from "@/views/PostDetailView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [{
    path: '/',
    name: 'home',
    component: HomeView,
    meta: {
      title: 'Kezdőlap',
    }
  },
    {
    path: '/about',
      name: 'about',
      component: AboutView,
      meta: {
        title: 'Rólunk'
      }
  },
    {
      path: '/blog',
      name: 'blog',
      component: PostsView,
      meta: {
        title: 'Blog'
      }
    },
    {
      path: '/posts/:id',
      name: 'post-detail',
      component: PostDetailView,
      meta: {
        title: 'Post Részletek'
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'not-found',
      component: NotFoundView,
      meta: {
        title: 'Nem talált'
      }
    }
  ],
})
router.beforeEach((to, from, next) => {
    document.title = to.meta.title + " - Blog App" || "Blog app";
    next()
})

export default router
