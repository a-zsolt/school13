<script >
import {RouterView} from "vue-router";
import NavBar from "@/components/layout/NavBar.vue";

export default {
  name: "App",
  components: { RouterView, NavBar },
}
</script>

<template>
  <nav-bar/>
  <main class="container my-4">
    <router-view/>
  </main>
</template>

<style scoped>
  body{
    background-color: black;
  }
</style>
