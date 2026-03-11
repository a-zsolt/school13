import { createRouter, createWebHistory } from 'vue-router'

const PublicLayout = () => import('@/layout/PublicLayout.vue')
const AuthLayout = () => import('@/layout/AuthLayout.vue')
const AppLayout = () => import('@/layout/AppLayout.vue')

const routes = [
  {
    path: '/',
    component: PublicLayout,
    children: [
      {
        path: '',
        name: 'home',
        component: () => import('@/views/public/HomeView.vue'),
        meta: {
          title: 'Home',
        },
        children: [
          {
            path: 'models',
            children: [
              {
                path: ':model',
                name: 'model',
                component: () => import('@/views/public/ModelView.vue'),
                meta: {
                  title: 'Model',
                },
                children: [
                  {
                    path: 'configure',
                    name: 'configure',
                    component: () => import('@/views/public/ConfigView.vue'),
                    meta: {
                      title: 'Configure',
                    },
                  }
                ]
              }
            ]
          },
        ]
      }
    ],
  },
  {
    path: '/auth',
    name: 'auth',
    component: AuthLayout,
    children: [
      {
        path: 'login',
        name: 'login',
        component: () => import('@/views/auth/LoginView.vue'),
        meta: {
          title: 'Login',
        }
      },
      {
        path: 'register',
        name: 'register',
        component: () => import('@/views/auth/RegisterView.vue'),
        meta: {
          title: 'Register',
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
        redirect: { name: 'profile' },
      },
      {
        path: 'profile',
        name: 'profile',
        component: () => import('@/views/app/ProfileView.vue'),
        meta: {
          title: 'Profile',
          requiresAuth: true,
        },
        children: [
          {
            path: 'details',
            name: 'profile-details',
            component: () => import('@/views/app/ProfileDetailsView.vue'),
            meta: {
              title: 'Profile Details',
              requiresAuth: true,
            },
          },
          {
            path: 'orders',
            name: 'orders-list',
            component: () => import('@/views/app/OrderListView.vue'),
            meta: {
              title: 'Orders',
              requiresAuth: true,
            },
            children: [
              {
                path: ':order',
                name: 'order-details',
                component: () => import('@/views/app/OrderDetailsView.vue'),
                meta: {
                  title: 'Order Details',
                }
              }
            ]
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
                redirect: { name: 'dashboard' },
              },
              {
                path: '/dashboard',
                name: 'dashboard',
                component: () => import('@/views/app/admin/DashboardView.vue'),
                meta: {
                  title: 'Dashboard',
                  requiresAuth: true,
                  roles: ['admin'],
                },
                children: [
                  {
                    path: 'users',
                    name: 'users-list',
                    component: () => import('@/views/app/admin/AdminUserView.vue'),
                    meta: {
                      title: 'Users',
                      requiresAuth: true,
                      roles: ['admin'],
                    },
                  },
                  {
                    path: 'users/:user',
                    name: 'user-details',
                    component: () => import('@/views/app/admin/AdminUserDetailsView.vue'),
                    meta: {
                      title: 'User Details',
                      requiresAuth: true,
                      roles: ['admin'],
                    },
                  },
                  {
                    path: 'orders',
                    name: 'orders',
                    component: () => import('@/views/app/admin/AdminOrderListView.vue'),
                    meta: {
                      title: 'Orders',
                      requiresAuth: true,
                      roles: ['admin'],
                    },
                  }
                ]
              }
            ]
          }
        ],
      },
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
    path: '/:pathMatch(.)',
    name: 'not-found',
    component: () => import('@/views/errors/NotFoundView.vue'),
    meta: {
      title: 'Not Found',
    }
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,

})

export default router
