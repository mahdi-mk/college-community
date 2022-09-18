<template>
  <div class="border-bottom py-3">
    <div class="row">
      <div class="col-md-10">
        <div class="mb-3">
          <Link class="question-card-title" :href="`/questions/${question.id}`">
            {{ question.title }}
          </Link>
        </div>
        <div class="d-flex gap-1 mb-3">
          <Link :href="`/tags/${tag.id}`" class="tag" v-for="tag in question.tags" :key="tag.id">
            {{ tag.name }}
          </Link>
        </div>
        <div class="small">
          <span class="text-muted">Asked {{ question.created_at }} by </span>
          <Link>{{ question.author.first_name + ' ' + question.author.last_name }}</Link>
        </div>
      </div>
      <div class="col-md-2">
        <div class="d-flex gap-4">
          <div class="d-flex flex-column gap-2 text-center">
            <strong>{{ question.answers_count }}</strong>
            <span class="text-muted small">Answers</span>
          </div>
          <div class="d-flex flex-column gap-2 text-center">
            <strong>{{ question.votes }}</strong>
            <span class="text-muted small">Votes</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    question: Object
  }
}
</script>