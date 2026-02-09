<script>
import {RouterLink} from "vue-router";

export default {
  name: "NavBar",
  components: { RouterLink }
}
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <router-link class="navbar-brand d-flex align-items-center gap-2" :to="{name: 'home'}">
          <i class="bi bi-claude"></i>Blog
        </router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto gap-1">
            <li class="nav-item">
              <router-link class="nav-link" aria-current="page" :to="{name: 'home'}">
                <i class="bi bi-house-door"></i>Kezdőlap
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'blog'}">
                <i class="bi bi-journal"></i>Blog
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'about'}">
                <i class="bi bi-arrow-through-heart"></i>Rólunk
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<style scoped>
  .navbar-brand {
    letter-spacing: 0.4px;
  }

  .nav-link.router-link-active {
    opacity: 1;
    text-decoration: underline;
    text-underline-offset: 6px;
  }
</style>