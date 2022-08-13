<template>
<div>
  <label class="typo__label" for="tags">Async multiselect</label>
    <multiselect
      v-model="selectedTags"
      :options="tags"
      :multiple="true"
      :searchable="true"
      @search-change="findTags"
      placeholder="Type to search"
      label="name"
      track-by="code">
    </multiselect>
</div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  components: {
    Multiselect
  },
  data () {
    return {
      selectedTags: [],
      tags: [],
      isLoading: false
    }
  },
  methods: {
    findTags (query) {
      this.isLoading = true
      this.$inertia.get('/tags/find', query, {
        onSuccess: (page) => {
          console.log(page)
        }
      })
    },
    clearAll () {
      this.selectedTags = []
    }
  }
}
</script>