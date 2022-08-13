<template>
  <div class="row">
    <div class="col-md-8">
      <div class="mb-4">
        <h1 class="page-title">Questions for you</h1>
      </div>

      <QuestionCard v-for="question in questions.data" :key="question.id" :question="question" />

      <!-- <div>
        <Link v-for="link in questions.links" :href="link.url" v-html="link.label" :key="link.label"></Link>
      </div> -->
      <div class="text-center mt-4">
        <Link class="btn btn-primary btn-pill me-2" :href="questions.prev_page_url" :class="{'disabled': questions.prev_page_url == null}">
          Previous
        </Link>
        <button class="btn btn-primary btn-pill" @click="nextPage()" :class="{'disabled': questions.next_page_url == null}">
          Next
        </button>
      </div>
    </div>
    <div class="col-md-4">
      
    </div>
  </div>
</template>

<script>
import QuestionCard from './QuestionCard.vue';
export default {
  components: { QuestionCard },
  props: {
    questions: Object
  },
  methods: {
    nextPage() {
      this.$inertia.visit(this.questions.next_page_url)
    }
  }
}
</script>