<script>
import {useAuth} from "@/stores/auth.js";
export default {
  name: "LoginView",
  data(){
    return{
      role: 'user',
      auth: useAuth(),
    }
  },
  methods:{
    submit(){
      this.auth.login({ role: this.role })
      const redirect = this.$route.query.redirect || '/app/overview'
      this.$router.replace(String(redirect))
    }
  }
}
</script>

<template>
<section>
  <h1 class="h4 mb-3">Login</h1>
  <div class="mb-3">
    <form @submit.prevent="submit">
      <label class="form-label" for="role">Role</label>
      <select id="role" class="form-select" v-model="role">
        <option value="user">user</option>
        <option value="admin">admin</option>
      </select>
      <div class="form-text">Admin role  esetén elérhető: <code>/app/admin</code></div>
      <input type="submit" value="Sign in" class="btn btn-primary w-100">
    </form>
    <div class="text-center mt-3">
      <RouterLink to="/auth/register">Create account</RouterLink>
    </div>
  </div>
</section>
</template>

<style scoped>

</style>