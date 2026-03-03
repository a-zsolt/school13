<script>
import {RouterLink, RouterView} from "vue-router";

export default {
  name: "PublicLayout",
  components: {
    RouterLink,
    RouterView
  }
}
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <RouterLink class="navbar-brand" to="/">RouterApp</RouterLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navPublic">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navPublic" class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <RouterLink class="nav-link" to="/products">Products</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink class="nav-link" to="/blog">Blog</RouterLink>
            </li>
          </ul>
          <div class="d-flex gap-2">
            <RouterLink class="btn btn-outline-light btn-sm" to="/auth/login">Login</RouterLink>
            <RouterLink class="btn btn-warning btn-sm" to="/app">App</RouterLink>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="container py-4">
    <RouterView/>
  </main>
  <footer class="border-top py-4">
    <div class="container small text-muted">
      &copy; {{new Date().getFullYear()}} RouterApp - Public
    </div>
  </footer>
</template>

<style scoped>

</style>