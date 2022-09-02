<template>
  <div class="row">
    <div class="col-md-8">
      <!-- Question Card -->
      <div class="card">
        <div class="card-body">
          <!-- Title & Question Info -->
          <div class="border-bottom mb-3">
            <h2 class="mb-2">{{ question.title }}</h2>
            <!-- <div class="d-flex small">
              <p class="me-5">
                <span class="text-muted">Asked</span> {{ question.created_at }}
              </p>
              <p class="me-5">
                <span class="text-muted">Updated</span> {{ question.updated_at }}
              </p>
              <p class="me-5">
                <span class="text-muted">Viewd</span> 200 times
              </p>
            </div> -->
          </div>

          <!-- Content -->
          <div v-html="question.content"></div>

          <!-- Tags -->
          <Link class="status status-primary me-1" v-for="tag in question.tags" :key="tag.id">
            {{ tag.name }}
          </Link>
        </div>
      </div>

      <!-- Answers -->
      <QuestionAnswers :question="question" />
    </div>
    <div class="col-md-4">

    </div>
  </div>
</template>

<script>
import QuestionAnswers from "../Answers/QuestionAnswers.vue";

export default {
  props: {
    question: Object
  },
  components: { QuestionAnswers }
}
</script>