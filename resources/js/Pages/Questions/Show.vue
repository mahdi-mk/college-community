<template>
  <div class="row">
    <div class="col-md-8">
      <div class="question-card">
        <div class="border-bottom pb-2">
          <div class="d-flex justify-content-between align-items-center">
            <h1>{{ question.title }}</h1>
            <span class="status fs-3" :class="votes >= 0 ? 'status-primary' : 'status-danger'">{{ votes }}</span>
          </div>
          <div class="small">
            <span class="text-muted">Asked {{ question.created_at }} by </span>
            <Link>{{ question.author.first_name + ' ' + question.author.last_name }}</Link>
          </div>
        </div>

        <!-- Content -->
        <div class="mt-3 mb-3" v-html="question.content"></div>

        <!-- Tags -->
        <div class="my-3 d-flex gap-1">
          <template v-for="tag in question.tags" :key="tag.id">
            <Link :href="`/tags/${tag.id}`" class="tag">
              {{ tag.name }}
            </Link>
          </template>
        </div>

        <!-- Actions -->
        <div class="d-flex justify-content-between border-top pt-2">
          <!-- Voting -->
          <div class="d-flex gap-1">
            <QuestionVotingButtons :question="question" />
          </div>

          <!-- Post Answer -->
          <button class="action-button action-button-primary" data-bs-toggle="modal" data-bs-target="#post-answer-modal">
            Answer
          </button>
        </div>
      </div>

      <!-- Answers -->
      <div class="mt-4">
        <h3 class="border-bottom py-2 mb-3">Answers ({{ answers.total }})</h3>

        <template v-for="answer in answers.data" :key="answer.id">
          <AnswerCard :answer="answer" />
        </template>

        <Pagination :links="answers.links" />
      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>

  <PostAnswerModal :question="question" />
</template>

<script>
import PostAnswerDialog from "../Answers/PostAnswerDialog.vue";
import QuestionVotingButtons from "../../Components/Question/QuestionVotingButtons.vue";
import PostAnswerModal from "../../Components/Answer/PostAnswerModal.vue";
import Pagination from "../../Components/Pagination.vue";
import AnswerCard from "../../Components/Answer/AnswerCard.vue";

export default {
  props: {
    question: Object,
    answers: Object,
  },
  components: {
    PostAnswerDialog,
    QuestionVotingButtons,
    PostAnswerModal,
    Pagination,
    AnswerCard 
  },
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