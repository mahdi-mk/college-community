<template>
  <div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-dark" style="background-color: #0e2a47;">
        <div class="container-xl">
          <ul class="navbar-nav">
            <slot />
          </ul>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
              <Link class="btn btn-primary btn-pill" href="/questions/create" v-if="auth">Ask Question</Link>
              <Link href="/login" class="btn btn-primary btn-pill" v-else>Login</Link>
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
        </div>
      </div>
    </div>
  </div>
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