<template>
  <div class="modal modal-blur fade" id="post-answer-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" :class="{'modal-lg': !posted}" role="document">
      <div class="modal-content" v-if="posted">
        <div class="modal-body p-0">
          <div class="modal-body text-center py-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><path d="M9 12l2 2l4 -4"></path></svg>
            <h3>Answer Posted</h3>
            <div class="text-muted">Thank you for helping our community</div>
          </div>
        </div>
      </div>
      <div class="modal-content" v-else>
        <div class="modal-body p-0">
          <div class="p-3 text-start">
            <h2 class="mb-0">{{ question.title }}</h2>
          </div>
          <client-only>
            <quill-editor v-model:value="content" id="editor" :options="editorOptions"></quill-editor>
          </client-only>
        </div>
        <div class="modal-footer mt-4">
          <button type="button" class="btn btn-danger me-auto" data-bs-dismiss="modal">Discard</button>
          <button type="button" class="btn btn-primary" :class="{'disabled': content.length == 0}" @click="post()">
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true" v-show="isSaving"></span>
            Post
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { quillEditor } from "vue3-quill";

export default {
  components: { quillEditor },
  props: {
    question: {
      type: Object,
      required: true
    },
  },
  data: () => ({
    content: '',
    isSaving: false,
    posted: false,
    editorOptions: {
      placeholder: 'Enter your answer',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],
          [{ header: 1 }, { header: 2 }],
          ['link'],
          ['code-block'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          [{ script: 'sub' }, { script: 'super' }],
          [{ direction: 'rtl' }],
          [{ color: [] }],
        ],
      }
    },
  }),
  methods: {
    post() {
      this.isSaving = true;
      this.$http.post('/answers/post', {
        question_id: this.question.id,
        content: this.content
      }).then(() => {
        this.isSaving = false;
        this.posted = true;
      });
    }
  }
}
</script>

<style lang="css" scoped>
#editor {
  height: 300px !important;
}
</style>