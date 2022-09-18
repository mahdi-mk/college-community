<template>
  <div class="page-title">
    {{ question.title }}
  </div>
  
  <span class="text-muted small mt-3">Asked {{ question.created_at }} by you</span>

  <div class="container-xxl">
    <QuestionForm :question="question" />
  </div>
</template>

<script>
import QuestionForm from '../../Components/Question/QuestionForm.vue';

export default {
  components: { QuestionForm },
  props: {
    question: Object
  },
}
</script>