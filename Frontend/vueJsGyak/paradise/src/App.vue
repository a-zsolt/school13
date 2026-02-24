<script>
import { RouterView} from "vue-router";
import {restaurants as seedRestaurants} from "@/data/restaurants.js";
import NavBar from "@/components/layouts/NavBar.vue";
import FooterBar from "@/components/layouts/FooterBar.vue";
const LS_KEY = 'booking_v1'
export default {
  name: 'App',
  components: {
    NavBar,
    FooterBar,
    RouterView,
  },
  data(){
    return {
      restaurants: seedRestaurants,
      bookings: []
    }
  },
  created() {
    try{
      const raw = localStorage.getItem(LS_KEY);
      this.bookings = raw ? JSON.parse(raw) : [];
    }catch (_){
      this.bookings = [];
    }
  },
  methods: {
    persist(){
      localStorage.setItem(LS_KEY, JSON.stringify(this.bookings));
    }
  }
}
</script>

<template>
  <NavBar/>
  <main class="container my-4">
    <RouterView :restaurants="restaurants"/>
  </main>
  <FooterBar/>
</template>

<style scoped></style>
