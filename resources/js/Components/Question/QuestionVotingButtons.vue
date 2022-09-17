<template>
  <button class="action-button action-button-primary" :class="{'active': hasUpvote}" @click="toggleUpvote" v-auth>
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" :class="{'icon-filled': hasUpvote}" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#407BFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M9 20v-8h-3.586a1 1 0 0 1 -.707 -1.707l6.586 -6.586a1 1 0 0 1 1.414 0l6.586 6.586a1 1 0 0 1 -.707 1.707h-3.586v8a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
    </svg>
    <span class="text-primary">Upvote</span>
  </button>

  <button class="action-button action-button-danger" :class="{'active': hasDownvote}" @click="toggleDownvote" v-auth>
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" :class="{'icon-filled': hasDownvote}" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M15 4v8h3.586a1 1 0 0 1 .707 1.707l-6.586 6.586a1 1 0 0 1 -1.414 0l-6.586 -6.586a1 1 0 0 1 .707 -1.707h3.586v-8a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1z" />
    </svg>
    <span class="text-danger">Downvote</span>
  </button>
</template>

<script>
export default {
  props: {
    question: {
      type: Object,
      required: true
    },
  },
  data() {
    return {
      hasUpvote: this.question.auth_user_vote?.type == 1,
      hasDownvote: this.question.auth_user_vote?.type == 0
    }
  },
  methods: {
    toggleUpvote() {
      if (this.$page.props.auth === null) {
        return;
      }

      this.$http.post(`/questions/${this.question.id}/upvote/toggle`).then((response) => {
        this.hasUpvote = !this.hasUpvote;
        this.hasDownvote = false;
        
        if (response.data.newUpvote) {
          this.$parent.incrementVotes();
        }
        else {
          this.$parent.decrementVotes();
        }
      });
    },

    toggleDownvote() {
      if (this.$page.props.auth === null) {
        return;
      }

      this.$http.post(`/questions/${this.question.id}/downvote/toggle`).then((response) => {
        this.hasDownvote = !this.hasDownvote;
        this.hasUpvote = false;

        if (response.data.newDownvote) {
          this.$parent.decrementVotes();
        }
        else {
          this.$parent.incrementVotes();
        }
      });
    }
  }
}
</script>