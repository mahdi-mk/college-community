<template>
  <form class="card card-md" method="POST" @submit.prevent="submit">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Create new account</h2>
      <div class="mb-3">
        <label class="form-label" for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" v-model="form.username">
        <span class="invalid-feedback" v-if="errors.username" v-text="errors.username"></span>
      </div>
      <div class="row">
        <div class="mb-3 col">
          <label class="form-label" for="first-name">First Name</label>
          <input type="text" class="form-control" name="first_name" id="first-name" v-model="form.first_name">
          <span class="invalid-feedback" v-if="errors.first_name" v-text="errors.first_name"></span>
        </div>
        <div class="mb-3 col">
          <label class="form-label" for="last-name">Last Name</label>
          <input type="text" class="form-control" name="last_name" id="last-name" v-model="form.last_name">
          <span class="invalid-feedback" v-if="errors.last_name" v-text="errors.last_name"></span>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" v-model="form.email">
        <span class="invalid-feedback" v-if="errors.email" v-text="errors.email"></span>
      </div>
      <div class="mb-3">
        <label class="form-label" for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" v-model="form.password">
        <span class="invalid-feedback" v-if="errors.password" v-text="errors.password"></span>
      </div>
      <div class="mb-3">
        <label class="form-label" for="password-confirm">Confirm</label>
        <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Re-enter your password" autocomplete="off" v-model="form.password_confirmation">
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Create new account</button>
      </div>
    </div>
  </form>
  <div class="text-center text-muted mt-3">
    Already have account? <Link href="login">Login</Link>
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
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  methods: {
    submit() {
      this.$inertia.post('register', this.form);
    }
  }
}
</script>