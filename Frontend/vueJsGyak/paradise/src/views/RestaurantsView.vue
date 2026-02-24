<script>
import RestaurantCard from "@/components/RestaurantsComponents/RestaurantCard.vue";
export default {
  name: "RestaurantsView",
  components:{
    RestaurantCard
  },
  props: {
    restaurants: {type: Array, required: true, default: () => []}
  },
  data() {
    return {
      q: "",
      cuisine: "",
      minRating: 0
    }
  },
  computed: {
    cuisines() {
      return [...new Set(this.restaurants.map(r => r.cuisine))].sort()
    },
    filtered() {
      const q = this.q.trim().toLowerCase()
      return this.restaurants
          .filter(r => (this.cuisine ? r.cuisine === this.cuisine : true))
          .filter(r => r.rating >= this.minRating)
          .filter(r => {
            if (!q) return true
            return r.name.toLowerCase().includes(q) || r.cuisine.toLowerCase().includes(q)
          })
    }
  },
  methods:{
    goToDetails(restaurantId){
      this.$router.push({name: 'restaurant-details', params: {id: restaurantId}});
    }
  }
}
</script>

<template>
  <section>
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="m-0">Éttermek</h2>
      <input v-model="q" class="form-control w-auto" id="inputQ" placeholder="Keresés név/konyha.">
    </div>
    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <select v-model="cuisine" class="form-select">
          <option value="">Összes konyha</option>
          <option v-for="c in cuisines" :key="c" :value="c">{{ c }}</option>
        </select>
      </div>
      <div class="col-md-4">
        <select v-model.number="minRating" class="form-select">
          <option :value="0">Bármelyik étterem</option>
          <option :value="4.0">4.0+</option>
          <option :value="4.3">4.3+</option>
          <option :value="4.6">4.6+</option>
          <option :value="4.8">4.8+</option>
        </select>
      </div>
      <div class="col-md-4 text-md-end">
        <span class="badge bg-dark">{{filtered.length}} találat</span>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-4" v-for="r in filtered" :key="r.id">
        <RestaurantCard :restaurant="r" @select="goToDetails"/>
      </div>
    </div>
  </section>
</template>

<style scoped>
#inputQ {
  min-width: 260px;
}
</style>