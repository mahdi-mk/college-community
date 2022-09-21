<template>
  <div class="d-flex justify-content-center align-items-center mt-4">
    <ul class="pagination">
      <template v-for="(link, index) in links" :key="index">
        <li class="page-item mx-1" :class="{'active': link.active, 'disabled': link.url === null}">
          <Link v-if="index === 0 || index === links.length - 1" class="page-link" :href="link.url">
            <svg v-show="index === 0" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
            <svg v-show="index === links.length - 1" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
          </Link>
          <Link :href="link.url" class="page-link" v-else>{{ link.label }}</Link>
        </li>
      </template>
    </ul>
  </div>
</template>
<script>
  export default {
    props: {
      links: {
        type: Array,
        required: true,
      },
      only: {
        type: Array,
        required: true
      },
    },
  }
</script>