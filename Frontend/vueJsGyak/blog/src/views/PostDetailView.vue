<script>
export default {
  name: "PostDetailView",
  props: {post: Object, required: true},
}
</script>

<template>
  <section class="card shadow-sm border-0">
    <div class="card-body p-4">
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <h2 class="h4 m-0">
          <i class="bi bi-file-earmark-text me-2"></i> Bejegyzés #{{ post.id }}
        </h2>
        <button class="btn btn-outline-secondary" @click="this.$router.push({name: 'posts'})">
          <i class="bi bi-arrow-left me-1"></i> Vissza
        </button>
      </div>
      <hr>
      <div v-if="post">
        <p class="lead mb-2">
          <span>{{ post.title }}</span>
        </p>
        <p class="text-secondary mb-0">{{ post.content }}</p>
      </div>
      <div v-else class="alert alert-warning mb-0">
        <i class="bi bi-exclamation-diamond"></i>
        Nincs ilyen bejegyzés
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>