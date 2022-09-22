<template>
  <form class="card card-md" method="POST" @submit.prevent="submit">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Login to your account</h2>
      <div class="mb-3">
        <label class="form-label" for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" v-model="form.username" autocomplete="off">
        <span class="invalid-feedback" v-if="errors.username" v-text="errors.username"></span>
      </div>
      <div class="mb-3">
        <label class="form-label" for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" autocomplete="off" v-model="form.password">
        <span class="invalid-feedback" v-if="errors.password" v-text="errors.password"></span>
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </div>
    </div>
  </form>
  <div class="text-center text-muted mt-3">
    Don't have an account? <Link href="register">Register</Link>
  </div>
</template>

<script>
import Auth from '../../Layouts/Auth.vue'

export default {
  layout: Auth,
  props: {
    errors: Object
  },
  data() {
    return {
      form: {
        username: '',
        password: ''
      }
    }
  },
  methods: {
    submit() {
      this.$inertia.post('login', this.form);
    }
  }
}
</script>