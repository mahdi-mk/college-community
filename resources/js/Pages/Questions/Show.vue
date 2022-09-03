<template>
  <div class="row">
    <div class="col-md-8">
      <div class="question-card">
        <div class="border-bottom pb-2">
          <h1>{{ question.title }}</h1>
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
          <button class="action-button action-button-primary" @click="showPostAnswerDialog = true">
            <span>Answer</span>
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
</template>

<script>
import QuestionAnswers from "../Answers/QuestionAnswers.vue";
import PostAnswerDialog from "../Answers/PostAnswerDialog.vue";
import QuestionVotingButtons from "../../Components/Question/QuestionVotingButtons.vue";

export default {
  props: {
    question: Object,
    authUserVote: Object,
  },
  components: { QuestionAnswers, PostAnswerDialog, QuestionVotingButtons },
  data() {
    return {
      showPostAnswerDialog: false,
    }
  }
}
</script>