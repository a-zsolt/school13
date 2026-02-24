<script>
import {RouterLink, useRouter} from "vue-router";
import router from "@/router/index.js";

export default {
  name: "NavBar",
  components: {
    RouterLink
  },
  data() {
    return {
      routes: []
    }
  },
  methods: {
    router() {
      return router
    },
    getRoutesData() {
      this.routes = useRouter().getRoutes()
    }
  },
  mounted() {
    this.getRoutesData()
  }
}
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container">
      <RouterLink class="navbar-brand" to="/">Foglaló</RouterLink>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ms-auto">
          <template v-for="route in routes" :key="route.name">
            <li class="nav-item" v-if="!route.path.includes(':')">
              <RouterLink class="nav-link" active-class="active" :to="{name: route.name}">{{ route.meta.title }}
              </RouterLink>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>

</style>