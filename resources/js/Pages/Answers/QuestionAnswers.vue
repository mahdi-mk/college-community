<template>
  <div v-if="answers.length > 0">
    <h2 class="mt-3 mb-3">Answers</h2>

    <template v-for="answer in answers" :key="answer.id">
      <AnswerCard :answer="answer" />
    </template>

    <div class="card mt-3">
      <div class="card-header">
        <div>
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
            </div>
            <div class="col">
              <div class="card-title">{{ fullName }}</div>
              <div class="card-subtitle">300 XP</div>
            </div>
          </div>
        </div>
        <div class="card-actions">
          <PostAnswerBtn :question="question" />
        </div>
      </div>
    </div>
  </div>

  <div class="card card-body text-center mt-3" v-else>
    <img src="../../../images/need-answers.svg" alt="" height="300">
    <h2>Be the first to answer this question</h2>
    <p class="mb-4 text-muted">Mahdi Mohammed still looking for a good answer to this question, can you help?</p>

    <PostAnswerBtn :question="question" />
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
  computed: {
    fullName() {
      return this.$page.props.auth.user.firstName + ' ' + this.$page.props.auth.user.lastName
    },
  },
  mounted() {
    this.$http.get(`/questions/${this.question.id}/answers`).then((response) => {
      this.answers = response.data.answers.data;
    });
  },
}
</script>