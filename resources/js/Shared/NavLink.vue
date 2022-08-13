<template>
  <li class="nav-item" :class="{'active': active}">
    <Link class="nav-link" :href="href">
      <span class="nav-link-title">
        {{ title }}
      </span>
    </Link>
  </li>
</template>

<script>
export default {
  props: {
    href: String,
    title: String,
    active: Boolean
  }
}
</script>