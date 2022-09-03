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
            <button class="action-button">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 20v-8h-3.586a1 1 0 0 1 -.707 -1.707l6.586 -6.586a1 1 0 0 1 1.414 0l6.586 6.586a1 1 0 0 1 -.707 1.707h-3.586v8a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
              </svg>
              <span>23</span>
            </button>
            <button class="action-button">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-down" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M15 4v8h3.586a1 1 0 0 1 .707 1.707l-6.586 6.586a1 1 0 0 1 -1.414 0l-6.586 -6.586a1 1 0 0 1 .707 -1.707h3.586v-8a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1z" />
              </svg>
              <span>2</span>
            </button>
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

export default {
  props: {
    question: Object
  },
  components: { QuestionAnswers, PostAnswerDialog },
  data() {
    return {
      showPostAnswerDialog: false,
    }
  }
}
</script>