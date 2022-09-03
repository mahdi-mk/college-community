<template>
  <div class="row">
    <div class="col-md-8">
      <div class="mb-2">
        <div class="border-bottom pb-2 mb-3">
          <h1>{{ question.title }}</h1>
        </div>

        <!-- Content -->
        <div v-html="question.content"></div>

        <!-- Actions -->
        <div class="d-flex justify-content-between border-y py-1 mt-3">
          <div>
            <button class="action-button" @click="showPostAnswerDialog = true">
              <span>Answer</span>
            </button>
          </div>
          <div class="d-flex gap-1">
            <QuestionVotingButtons :question="question" :authUserVote="authUserVote" />
          </div>
        </div>
      </div>

      <PostAnswerDialog :show="showPostAnswerDialog" />

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