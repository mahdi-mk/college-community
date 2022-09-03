<template>
  <div class="offcanvas offcanvas-bottom " :class="{'show': show}" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
      <h2 class="offcanvas-title" id="offcanvasBottomLabel">Bottom offcanvas</h2>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
      </div>
      <div class="mt-3">
        <button class="btn" type="button" data-bs-dismiss="offcanvas">
          Close offcanvas
        </button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      show: Boolean
    }
  }
</script>