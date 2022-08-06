<template>
  <Nav>
    <NavLink href="/" :active="$page.component === 'Home'">
      Home
    </NavLink>
  </Nav>

  <div class="page-wrapper">
    <div class="page-body">
      <div class="container-xl">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import Nav from '../Shared/Nav.vue';
import NavLink from '../Shared/NavLink.vue';

export default {
  components: { NavLink, Nav }
}
</script>