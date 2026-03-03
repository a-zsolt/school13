<script>
export default {
  name: "OrderDetailsView",
  methods:{
    back(){
      this.$router.push({name: 'orders', query:this.$route.query});
    }
  }
}
</script>

<template>
<section class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-start">
      <div>
        <h1 class="h4 mb-1">Order: {{$route.params.orderId}}</h1>
        <div class="text-muted">Részletek (demo)</div>
      </div>
      <span class="badge text-bg-success">ORD-xxx</span>
    </div>
    <hr>
    <p class="mb-0">Itt jönnének a tételek, státusz, szállítás stb.</p>
    <div class="mt-3">
      <button class="btn btn-outline-secondary" @click="back"> Back to list</button>
    </div>
  </div>
</section>
</template>

<style scoped>

</style>