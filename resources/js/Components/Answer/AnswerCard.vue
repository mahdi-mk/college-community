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
    </div>

    <!-- Content -->
    <div class="mt-3 mb-3" v-html="answer.content"></div>

    <!-- Actions -->
    <div class="border-top pt-2">
      <AnswerVotingButtons :answer="answer" />
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
}
</script>