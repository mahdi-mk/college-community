<template>
  <div class="row">
    <div class="col-md-8">
      <div class="question-card">
        <div class="border-bottom pb-2">
          <div class="d-flex justify-content-between align-items-center">
            <h1>{{ question.title }}</h1>
            <span class="status fs-3" :class="question.votes >= 0 ? 'status-primary' : 'status-danger'">{{ votes }}</span>
          </div>
          <div class="small">
            <span class="text-muted">Asked {{ question.created_at }} by </span>
            <Link>{{ question.author.first_name + ' ' + question.author.last_name }}</Link>
          </div>
        </div>

        <!-- Content -->
        <div class="mt-3 mb-3" v-html="question.content"></div>

        <!-- Actions -->
        <div class="d-flex justify-content-between border-top pt-2">
          <!-- Voting -->
          <div class="d-flex gap-1">
            <QuestionVotingButtons :question="question" :authUserVote="authUserVote" />
          </div>

          <!-- Post Answer -->
          <button class="action-button action-button-primary" data-bs-toggle="modal" data-bs-target="#post-answer-modal">
            Answer
          </button>
        </div>
      </div>

      <!-- Answers -->
      <div>
        <QuestionAnswers :question="question" />
      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>

  <PostAnswerModal :question="question" />
</template>

<script>
import QuestionAnswers from "../Answers/QuestionAnswers.vue";
import PostAnswerDialog from "../Answers/PostAnswerDialog.vue";
import QuestionVotingButtons from "../../Components/Question/QuestionVotingButtons.vue";
import PostAnswerModal from "../../Components/Answer/PostAnswerModal.vue";

export default {
  props: {
    question: Object,
    authUserVote: Object,
  },
  components: { QuestionAnswers, PostAnswerDialog, QuestionVotingButtons, PostAnswerModal },
  data() {
    return {
      votes: this.question.votes
    }
  },
  methods: {
    incrementVotes() {
      this.votes++;
    },
    decrementVotes() {
      this.votes--;
    }
  }
}
</script>