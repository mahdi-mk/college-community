<template>
  <Nav>
    <!-- <NavLink href="/" :active="$page.url === '/'" title="Home" /> -->
    <NavLink href="/questions" :active="$page.url.startsWith('/questions')" title="Questions" />
  </Nav>

  <div class="page-wrapper">
    <div class="page-body">
      <div class="container-xl">
        <slot />
      </div>
    </div>
  </div>

  <SearchModal />
</template>

<script>
import Nav from '../Shared/Nav.vue';
import NavLink from '../Shared/NavLink.vue';
import SearchModal from '../Components/SearchModal.vue';

export default {
  components: { NavLink, Nav, SearchModal }
}
</script>