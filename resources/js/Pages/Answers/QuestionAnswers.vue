<template>
  <h2 class="mt-3 mb-3" v-show="answers.length > 0">Answers</h2>

  <div v-if="answers.length > 0">
    <template v-for="answer in answers" :key="answer.id">
      <AnswerCard :answer="answer" />
    </template>
  </div>
  <div class="card card-body text-center mt-3" v-else>
    <img src="../../../images/need-answers.svg" alt="" height="300">
    <h2>Be the first to answer this question</h2>
    <p class="mb-4 text-muted">Mahdi Mohammed still looking for a good answer to this question, can you help?</p>
    <button class="btn btn-primary btn-pill">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
      </svg>
      Answer
    </button>
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
  data() {
    return {
      answers: []
    }
  },
  mounted() {
    this.$http.get(`/questions/${this.question.id}/answers`).then(response => {
      this.answers = response.data.answers;
    });
  }
}
</script>