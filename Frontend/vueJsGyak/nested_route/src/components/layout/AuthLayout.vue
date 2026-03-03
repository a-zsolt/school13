<script>
export default {
  name: "AuthLayout"
}
</script>

<template>
<section class="min-vh-100 d-flex align-items-center bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-log-5">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <RouterLink class="text-decoration-none" to="/"><- Public</RouterLink>
              <span class="badge text-bg-secondary">Auth</span>
            </div>
            <RouterView/>
          </div>
        </div>
        <p class="text-center text-muted small mt-3 mb-0">
          Tipp: login után a role alapján elérhető az admin szekció.
        </p>
      </div>
    </div>
  </div>
</section>
</template>

<style scoped>

</style>