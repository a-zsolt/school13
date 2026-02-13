import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "@/views/HomeView.vue";
import AboutView from "@/views/AboutView.vue";
import PostsView from "@/views/PostsView.vue";
import NotFoundView from "@/views/NotFoundView.vue";
import PostDetailView from "@/views/PostDetailView.vue";

const posts = [
    {
        id: 1,
        title: 'Vue alapok',
        content: 'A vue jó'
    },
    {
        id: 2,
        title: 'Vue router',
        content: 'A vue jó'
    },
    {
        id: 3,
        title: 'Dolgozat',
        content: 'sadasdaddadad saodp jsadasopd asposad sadpasjd sapod jasdopaa awpoie asadas asopd sa ss'
    },
];

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
      },
        props: {posts}
    },
    {
      path: '/posts/:id',
      name: 'post-detail',
      component: PostDetailView,
      meta: {
        title: 'Post Részletek'
      },
        props: (route) => {
            const id = Number(route.params.id);
            return {
                post: posts.find(p => p.id === id)
            }
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
