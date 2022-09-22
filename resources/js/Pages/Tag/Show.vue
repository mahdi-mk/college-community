<template>
  <div class="row">
    <div class="col-md-8">
      <!-- Tag Information -->
      <div>
        <h1>{{ tag.name }}</h1>
        <p class="text-muted small mt-3">{{ tag.description }}</p>
      </div>

      <!-- Questions -->
      <div class="mt-4">
        <h3 class="border-bottom py-2">Questions ({{ questions.total }})</h3>

        <template v-for="question in questions.data" :key="question.id">
          <QuestionCard :question="question" />
        </template>
        
        <Pagination :links="questions.links" :only="['questions']" />
      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>  
</template>

<script>
import QuestionCard from '../../Components/Question/QuestionCard.vue';
import Pagination from '../../Components/Pagination.vue';

export default {
  components: { QuestionCard, Pagination },
  props: {
    tag: Object,
    questions: Object
  },
}
</script>