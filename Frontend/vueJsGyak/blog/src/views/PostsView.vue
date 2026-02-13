<script>
import {RouterLink} from "vue-router";

export default {
  name: "PostsView",
  components: { RouterLink },
  props: {posts: Array, required: true},
}
</script>

<template>
  <section>
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="h4 m-0">
        <i class="bi bi-journal-text me-2"></i> Bejegyzések
      </h2>
      <span class="badge text-bg-secondary">{{ posts.length }} db</span>
    </div>
    <div class="list-group">
      <router-link class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                   v-for="post in posts" :key="post.id"
                   :to="{name: 'post-detail', params: {id: post.id}}">
        <span class="d-flex align-items-center gap-2">
          <i class="bi bi-file-earmark-text"></i> {{ post.title }}
        </span>
        <i class="bi bi-chevron-right"></i>
      </router-link>
    </div>
  </section>
</template>

<style scoped>
  .list-group-item {
    transition: transform 0.12s ease, box-shadow 0.12s ease;
  }
  .list-group-item:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
  }
</style>