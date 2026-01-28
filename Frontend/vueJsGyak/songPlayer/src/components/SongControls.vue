<script>
export default {
  name: "SongControls",
  emits: ["update:query", "update:selectedGenre", "update:sortKey", "update:showFavoriteOnly", "toggleSortDir"],
  props: {
    query: {type: String, required: true, default: ""},
    selectedGenre: {type: String, required: true, default: ""},
    genres: {type: Array, required: true, default: () => []},
    sortKey: {type: String, required: true, default: ""},
    sortDir: {type: String, required: true ,default: ""},
    showFavoriteOnly: {type: Boolean, default: false},
  }
}
</script>

<template>
  <section class="card mb-3">
    <div class="card-body">
      <div class="row gap-2 align-items-center">
        <div class="col-12 col-lg-4">
          <input type="text" class="form-control" placeholder="Keresés (cím/ előadó/ album...)"
                 @input="$emit('update:query', $event.target.value)">
        </div>

        <div class="col-12 col-md-4 col-lg-3">
          <select class="form-select" :value="selectedGenre" @change="$emit('update:selectedGenre', $event.target.value)">
            <option value="">Mindien műfaj</option>
            <option v-for="genre in genres" :key="genre" :value="genre">{{ genre }}</option>
          </select>
        </div>

        <div class="col-12 col-md-5 col-lg-3">
          <select class="form-select" :value="sortKey" @change="$emit('update:sortKey', $event.target.value)">
            <option value="title">Rendezés: cím</option>
            <option value="artist">Rendezés: előadó</option>
            <option value="year">Rendezés: év</option>
            <option value="durationSec">Rendezés: hossz</option>
          </select>
        </div>

        <div class="col-6 col-md-3 col-lg-1">
          <button type="button" class="btn btn-outline-secondary w-100" @click="$emit('toggleSortDir')">
            <i v-if="sortDir === 'asc'" class="bi bi-arrow-up-square"></i>
            <i v-if="sortDir === 'dsc'" class="bi bi-arrow-down-square"></i>
          </button>
        </div>

        <div class="col-12 col-lg-1 p-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" :checked="showFavoriteOnly"
                   @change="$emit('update:showFavoriteOnly', $event.target.checked)" id="favOnly">
            <label class="form-check-label" for="favOnly">
              <i class="bi bi-heart-fill heart_color"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.heart_color {
  color: red;
}
</style>