<template>
<div class="modal modal-blur fade" id="search-modal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div>
          <div class="input-icon mb-3 px-3 pt-3">
            <span class="input-icon-addon mx-3 mt-3">
              <svg style="height: 1.4rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" v-model="keyword" class="form-control form-control-lg search-input" placeholder="What is your question">
            <span class="input-icon-addon mx-4 mt-3" v-show="loading">
              <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true"></span>
            </span>
          </div>

          <!-- Results -->
          <div class="list-group list-group-flush list-group-hoverable">
            <div class="list-group-item" v-for="question in results.questions?.data" :key="question.id">
              <div class="row align-items-center">
                <div class="col text-truncate">
                  <Link :href="`/questions/${question.id}`" data-bs-dismiss="modal">{{ question.title }}</Link>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center my-3" v-show="results.hasMore">
            <Link class="btn btn-primary">
              View all results
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import QuestionCard from './Question/QuestionCard.vue';
export default {
  data() {
    return {
      results: Object,
      keyword: null,
      loading: false
    };
  },
  watch: {
    keyword(after, before) {
      if (after.length > 1) {
        this.getData(after);
      }
    }
  },
  methods: {
    getData(keyword) {
      this.loading = true;
      this.$http.get(`/search/${keyword}`).then((response) => {
        this.results = response.data;
        this.loading = false;
      });
    },
  },
  components: { QuestionCard }
}
</script>