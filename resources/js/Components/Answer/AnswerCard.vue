<template>
  <div class="answer-card">
    <div class="d-flex justify-content-between align-items-center">
      <div class="row align-items-center">
        <div class="col-auto">
          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
        </div>
        <div class="col small">
          <Link>{{ answer.author.first_name + ' ' + answer.author.last_name }}</Link>
          <div class="text-muted">{{ answer.created_at }}</div>
        </div>
      </div>
      <div class="status status-primary" v-if="answer.accepted">
        Best Answer
      </div>
      <span class="status fs-3" :class="votes >= 0 ? 'status-primary' : 'status-danger'" v-else>{{ votes }}</span>
    </div>

    <!-- Content -->
    <div class="mt-3 mb-3" v-html="answer.content"></div>

    <!-- Actions -->
    <div class="border-top pt-2">
      <div class="d-flex justify-content-between align-items-center">
        <AnswerVotingButtons :answer="answer" />

        <!-- Owner Actions -->
        <div class="dropdown">
          <button class="action-button action-button-primary" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="19" r="1"></circle><circle cx="12" cy="5" r="1"></circle></svg>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <Link href="" class="dropdown-item">
              Edit
            </Link>
            <Link :href="`/answers`" as="button" method="DELETE" class="dropdown-item text-danger">
              Delete
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AnswerVotingButtons from './AnswerVotingButtons.vue';

export default {
  components: { AnswerVotingButtons },
  props: {
    answer: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      votes: this.answer.votes
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