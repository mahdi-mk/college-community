<template>
  <div class="row">
    <div class="col-md-3">
      <QuestionFiltersSidebar />
    </div>
    <div class="col-md-9">
      <QuestionCard v-for="question in questions.data" :key="question.id" :question="question" />
      
      <Pagination :links="questions.links" />
    </div>

  </div>
</template>

<script>
import QuestionCard from './QuestionCard.vue';
import QuestionFiltersSidebar from './QuestionFiltersSidebar.vue';
import Pagination from '../../Components/Pagination.vue';

export default {
  components: { QuestionCard, QuestionFiltersSidebar, Pagination },
  props: {
    questions: Object
  }
}
</script>