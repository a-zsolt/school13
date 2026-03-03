<script>
import {useAuth} from "@/stores/auth.js";

export default {
  name: "AppLayout",
  data() {
    return {
      auth: useAuth()
    }
  },
  computed: {
    user() {
      return this.auth.user.value;
    },
    isAdmin() {
      return this.user?.role === "admin";
    },
    crumbs(){
      return this.$route.matched.filter(r => r.meta?.title).map(r =>({title: r.meta.title, path: r.path}))
    }
  },
  methods: {
    doLogout() {
      this.auth.logout();
      this.$router.push("/");
    }
  }
}
</script>

<template>
  <div class="min-vh-100 bg-body-tertiary">
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <span class="navbar-brand">RouterApp  - App</span>
        <div class="d-flex align-items-center gap-2">
          <span class="text-white small">User: <strong>{{ user?.name }}</strong> ({{ user?.role }})</span>
          <button class="btn btn-outline-light btn-sm" @click="doLogout">Logout</button>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <aside class="col-12 col-md-3 col-lg-2 p-0 border-end bg-white">
          <div class="list-group list-group-flush rounded-0">
            <RouterLink class="list-group-item list-group-item-action"
                        :class="{active: $route.path.startsWith('/app/overview')}" to="/app/overview">Overview
            </RouterLink>
            <RouterLink class="list-group-item list-group-item-action"
                        :class="{active: $route.path.startsWith('/app/profile')}" to="/app/profile">Profile
            </RouterLink>
            <RouterLink class="list-group-item list-group-item-action"
                        :class="{active: $route.path.startsWith('/app/settings')}" to="/app/settings">Settings
            </RouterLink>
            <RouterLink class="list-group-item list-group-item-action"
                        :class="{active: $route.path.startsWith('/app/orders')}" to="/app/orders">Orders
            </RouterLink>
            <div class="px-3 py-2 small text-muted border-top">Admin</div>
            <RouterLink class="list-group-item list-group-item-action"
                        :class="{active: $route.path.startsWith('/app/admin')}" to="/app/admin">
              Admin Panel
              <span v-if="!isAdmin" class="badge text-bg-secondary ms-2">403</span>
            </RouterLink>
          </div>
        </aside>
        <main class="col-12 col-md-9 col-lg-10 p-4">
          <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <RouterLink to="/app/overview">App</RouterLink>
              </li>
              <li v-for="(c, idx) in crumbs.slice(1)" :key="idx"
              class="breadcrumb-item" :class="{active: idx === crumbs.slice(1).length -1}">
                <span v-if="idx === crumbs.slice(1).length - 1">{{c.title}}</span>
                <RouterLink v-else :to="$route.matched[idx+1].path">{{c.title}}</RouterLink>
              </li>
            </ol>
          </nav>
          <RouterView/>
        </main>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>