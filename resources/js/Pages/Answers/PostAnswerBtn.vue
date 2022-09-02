<template>
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post-answer-modal">
    <template v-if="showIcon">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
      </svg>
    </template>
    {{ text }}
  </button>

  <div class="modal modal-blur fade" id="post-answer-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="p-3 text-start">
            <h2 class="mb-0">{{ question.title }}</h2>
          </div>
          <client-only>
            <quill-editor v-model:value="content" id="editor" :options="editorOptions"></quill-editor>
            <!-- <small class="invalid-feedback" v>{{ errors[0] }}</small> -->
          </client-only>
        </div>
        <div class="modal-footer mt-4">
          <button type="button" class="btn btn-danger btn-pill me-auto" data-bs-dismiss="modal">Discard</button>
          <button type="button" class="btn btn-primary btn-pill" :class="{'disabled': content.length == 0}" @click="post()">Post</button>
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
    errors: [],
    question: {
      type: Object,
      required: true
    },
    text: {
      type: String,
      required: false,
      default: 'Answer'
    },
    showIcon: {
      type: Boolean,
      required: false,
      default: true
    }
  },
  data: () => ({
    content: '',
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
      this.$inertia.post('/answers/post', {
        question_id: this.question.id,
        content: this.content
      });
    }
  }
}
</script>

<style lang="css" scoped>
#editor {
  height: 400px !important;
}
</style>