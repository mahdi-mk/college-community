<template>
  <div class="mt-4">
    <h3 class="border-bottom py-2 mb-3">Answers</h3>

    <!-- <template v-for="answer in answers" :key="answer.id"> -->
      <AnswerCard :answer="answer" />
    <!-- </template> -->
  </div>
</template>

<script>
import AnswerCard from './AnswerCard.vue';

export default {
  components: { AnswerCard },
  props: {
    question: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    answers: []
  }),
  mounted() {
    this.$http.get(`/questions/${this.question.id}/answers`).then((response) => {
      this.answers = response.data.answers.data;
    });
  },
}
</script>