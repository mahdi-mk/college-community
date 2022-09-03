<template>
  <div>
    <!-- <h3 class="mt-3 mb-3 pb-2 border-bottom">Answers</h3> -->

    <template v-for="answer in answers" :key="answer.id">
      <AnswerCard :answer="answer" />
    </template>
  </div>
</template>

<script>
import AnswerCard from './AnswerCard.vue';
import PostAnswerBtn from './PostAnswerBtn.vue';

export default {
  components: { AnswerCard, PostAnswerBtn },
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