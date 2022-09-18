<template>
  <div class="row">
    <div class="col-md-8">
      <!-- Tag Information -->
      <div>
        <h1>{{ tag.name }}</h1>
        <p class="text-muted small mt-3">{{ tag.description }}</p>
      </div>

      <!-- Questions -->
      <div class="mt-4">
        <h3 class="border-bottom py-2">Questions ({{ tag.questions_count }})</h3>

        <template v-for="question in questions.data" :key="question.id">
          <QuestionCard :question="question" />
        </template>
      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>  
</template>

<script>
import QuestionCard from '../../Components/Question/QuestionCard.vue';

export default {
  components: { QuestionCard },
  props: {
    tag: Object
  },
  data() {
    return {
      questions: Object,
      isLoadingQuestions: true
    };
  },
  mounted() {
      this.$http.get(`/tags/${this.tag.id}/questions`).then((response) => {
          this.questions = response.data.questions;
          this.isLoadingQuestions = false;
      });
  },
  components: { QuestionCard }
}
</script>