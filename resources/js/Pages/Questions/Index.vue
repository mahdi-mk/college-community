<template>
  <div class="row">
    <div class="col-md-3">
      <QuestionFiltersSidebar />
    </div>
    <div class="col-md-9">
      <QuestionCard v-for="question in questions.data" :key="question.id" :question="question" />
    </div>
  </div>
</template>

<script>
import QuestionCard from './QuestionCard.vue';
import QuestionFiltersSidebar from './QuestionFiltersSidebar.vue';

export default {
  components: { QuestionCard, QuestionFiltersSidebar },
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