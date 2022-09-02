<template>
  <header class="navbar navbar-expand-md navbar-dark d-print-none">
    <div class="container-xl">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href=".">
          <!-- <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image"> -->
        </a>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <div class="nav-item d-none d-md-flex me-3">
          <div class="btn-list">
            <Link class="btn btn-primary" href="/questions/create" v-if="auth">Ask Question</Link>
            <Link href="/login" class="btn btn-primary" v-else>Login</Link>
          </div>
        </div>
        <div class="nav-item dropdown" v-if="auth">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu" aria-expanded="false">
            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
            <div class="d-none d-xl-block ps-2">
              <div>{{ fullName }}</div>
              <div class="mt-1 small text-muted">Student</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="#" class="dropdown-item">Set status</a>
            <a href="#" class="dropdown-item">Profile &amp; account</a>
            <a href="#" class="dropdown-item">Feedback</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">Settings</a>
            <Link href="/logout" method="post" class="dropdown-item">Logout</Link>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
          <ul class="navbar-nav">
            <slot />
          </ul>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  computed: {
    auth() {
      return this.$page.props.auth !== null
    },
    fullName() {
      return this.$page.props.auth.user.firstName + ' ' + this.$page.props.auth.user.lastName
    },
    username() {
      return '@' + this.$page.props.auth.user.username
    }
  }
}
</script>