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

          <div class="d-flex gap-2 align-items-center">
            <!-- Post Answer -->
            <button class="action-button action-button-primary" data-bs-toggle="modal" data-bs-target="#post-answer-modal" v-auth>
              Answer
            </button>

            <!-- Owner Actions -->
            <div class="dropdown" v-if="$page.props.can.update || $page.props.can.delete">
              <button class="action-button action-button-primary" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="19" r="1"></circle><circle cx="12" cy="5" r="1"></circle></svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <Link :href="`/questions/${question.id}/edit`" class="dropdown-item" v-if="$page.props.can.update">
                  Edit
                </Link>
                <Link :href="`/questions/${question.id}`" as="button" method="DELETE" class="dropdown-item text-danger" v-if="$page.props.can.delete">
                  Delete
                </Link>
              </div>
            </div>
          </div>
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

  <PostAnswerModal :question="question" v-if="$page.props.auth !== null" />
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