<template>
  <div class="mt-4">
    <h3 class="border-bottom py-2 mb-3">Answers</h3>

    <template v-if="isLoading">
      <AnswerPlaceholder />
      <AnswerPlaceholder />
    </template>

    <div v-else>
      <template v-for="answer in answers" :key="answer.id">
        <AnswerCard :answer="answer" />
      </template>
    </div>
  </div>
</template>

<script>
import AnswerCard from '../../Components/Answer/AnswerCard.vue';
import AnswerPlaceholder from '../../Components/Answer/AnswerPlaceholder.vue';

export default {
  components: { AnswerCard, AnswerPlaceholder },
  props: {
    question: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    answers: [],
    isLoading: true
  }),
  mounted() {
    this.$http.get(`/questions/${this.question.id}/answers`).then((response) => {
      this.answers = response.data.answers.data;
      this.isLoading = false;
    });
  },
}
</script>