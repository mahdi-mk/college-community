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
      <button class="action-button action-button-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#407BFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M9 20v-8h-3.586a1 1 0 0 1 -.707 -1.707l6.586 -6.586a1 1 0 0 1 1.414 0l6.586 6.586a1 1 0 0 1 -.707 1.707h-3.586v8a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
        </svg>
        <span class="text-primary">Upvote</span>
      </button>
      <button class="action-button action-button-danger">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M15 4v8h3.586a1 1 0 0 1 .707 1.707l-6.586 6.586a1 1 0 0 1 -1.414 0l-6.586 -6.586a1 1 0 0 1 .707 -1.707h3.586v-8a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1z" />
        </svg>
        <span class="text-danger">Downvote</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    answer: {
      type: Object,
      required: true,
    },
  }
}
</script>