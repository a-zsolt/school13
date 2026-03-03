import { createRouter, createWebHistory } from 'vue-router'
import {useAuth} from "@/stores/auth.js";
import {fetchProductById, fetchAdminUserById} from "@/mockApi.js";

const isNumeric = (n)=>/^\d+$/.test(n);
const isOrderId = (n) => /^ORD-\d{4}$/.test(n)
const PublicLayout = () => import('@/components/layout/PublicLayout.vue');
const AuthLayout = () => import('@/components/Layout/AuthLayout.vue');
const AppLayout = () => import('@/components/Layout/AppLayout.vue');

const routes = [
  {
    path: '/',
    component: PublicLayout,
    children: [
      {
        path: '',
        name: 'home',
        component: () => import('@/views/public/HomeView.vue'),
        meta:{
          title: 'Home'
        }
      },
      {
        path: "products",
        children: [
          {
            path: '',
            name: 'products',
            component: ()=> import('@/views/public/ProductListView.vue'),
            meta:{
              title: 'Products'
            }
          },
          {
            path: ':id',
            name: 'product-details',
            component: () => import('@/views/public/ProductDetailsView.vue'),
            meta: {
              title: 'Product Details'
            },
            beforeEnter: async (to) =>{
              if (!isNumeric(to.params.id)) return {name: 'not-found'}
              const product = await fetchProductById(to.params.id)
              if (!product) return {name: 'not-found'};
              to.meta.prefetched = {product};
              return true;
            }
          }
        ]
      },
      {
        path: 'blog',
        children: [
          {
            path: '',
            name: 'blog',
            component: ()=> import('@/views/public/BlogListView.vue'),
            meta:{
              title: 'Blog'
            }
          },
          {
            path: ':slug',
            name: 'blog-post',
            component: () => import('@/views/public/BlogPostView.vue'),
            meta: {
              title: 'Blog Post'
            }
          }
        ]
      }
    ]
  },
  {
    path: '/auth',
    component: AuthLayout,
    children: [
      {
        path: 'login',
        name: 'login',
        component: () => import('@/views/auth/LoginView.vue'),
        meta: {
          title: 'Login'
        }
      },
      {
        path: 'register',
        name: 'register',
        component: () => import('@/views/auth/RegisterView.vue'),
        meta: {
          title: 'Register'
        }
      }
    ]
  },
  {
    path: '/app',
    component: AppLayout,
    children: [
      {
        path: '',
        redirect: {name: 'overview'}
      },
      {
        path: 'overview',
        name: 'overview',
        component: () => import('@/views/app/OverviewView.vue'),
        meta: {
          title: 'Overview',
          requiresAuth: true
        }
      },
      {
        path: 'profile',
        name: 'profile',
        component: () => import('@/views/app/ProfileView.vue'),
        meta: {
          title: 'Profile',
          requiresAuth: true
        }
      },
      {
        path: 'settings',
        name: 'settings',
        component: () => import('@/views/app/SettingsView.vue'),
        meta: {
          title: 'Settings',
          requiresAuth: true
        }
      },
      {
        path: 'orders',
        name: 'orders',
        component: () => import('@/views/app/OrderListView.vue'),
        meta: {
          title: 'Orders',
          requiresAuth: true
        }
      },
      {
        path: 'orders/:orderId',
        name: 'order-details',
        component: () => import('@/views/app/OrderDetailsView.vue'),
        meta: {
          title: 'Order Details',
          requiresAuth: true
        },
        beforeEnter: (to) => {
          if(!isOrderId(to.params.id)) return {name: 'not-found'};
          return  true;
        }
      },
      {
        path: 'admin',
        meta: {
          requiresAuth: true,
          roles: ['admin'],
        },
        children: [
          {
            path: '',
            redirect: {name: 'admin-users'}
          },
          {
            path: 'users',
            name: 'admin-users',
            component: () => import('@/views/app/admin/AdminUserView.vue'),
            meta: {
              title: 'Admin - Users',
              requiresAuth: true,
              roles: ['admin'],
            }
          },
          {
            path: 'users/:userId',
            name: 'admin-user-details',
            component: () => import('@/views/app/admin/AdminUserDetailsView.vue'),
            meta: {
              title: 'Admin - User Details',
              requiresAuth: true,
              roles: ['admin'],
            },
            beforeEnter: async (to) => {
              if(!isNumeric(to.params.id)) return {name: 'not-found'};
              const user = await fetchAdminUserById(to.params.id);
              if (!user) return {name: 'not-found'};
              to.meta.prefetched = {user};
              return true;
            }
          },
          {
            path: 'audit-log',
            name: 'admin-audit',
            component: () => import('@/views/app/admin/AdminAuditLogView.vue'),
            meta: {
              title: 'Admin - Audit Log',
              requiresAuth: true,
              roles: ['admin'],
            }
          }
        ]
      }
    ]
  },
  {
    path: '/403',
    name: 'not-authorized',
    component: ()=> import('@/views/errors/NotAuthorizedView.vue'),
    meta: {
      title: 'Not Authorized',
    }
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'not-found',
    component: () => import('@/views/errors/NotFoundView.vue'),
    meta: {
      title: 'Not Found',
    }
  }
]
// /about#team -> hash = #team
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition)  return savedPosition;
    if (to.hash) return {el: to.hash, behavior: 'smooth'}
    return {top: 0}
  }
})

router.beforeEach(to =>{
  const {isAuthenticated, user} = useAuth()
  document.title = to.meta?.title ?  `${to.meta.title} - RouterApp` : 'RouterApp'
  if (to.name === 'login' && isAuthenticated.value){
    return {name: 'overview'};
  }
  if(to.meta?.requiresAuth && !isAuthenticated.value){
    return {name: 'login', query: {redirect: to.fullPath}}
  }
  const roles = to.meta?.roles
  if(roles?.length){
    const role = user.value?.role;
    if(!role || !role.includes(role)) return {name: 'not-authorized'};
  }
  return true;
})

export default router
