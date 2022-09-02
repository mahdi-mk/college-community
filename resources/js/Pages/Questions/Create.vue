<template>
  <div class="page-title">
    Ask Question
  </div>
  <div class="container-xxl">
    <div class="card mt-4">
      <form method="post" @submit.prevent="submit()">
        <div class="card-body">
          <!-- Title -->
          <div class="mb-4">
            <label for="title" class="form-label required">Question Title</label>
            <input type="text" class="form-control" :class="{'is-invalid': errors.title}" id="title" v-model="form.title" required maxlength="200">
            <span class="invalid-feedback" v-if="errors.title" v-text="errors.title"></span>
            <small class="form-hint">Please enter a descriptive and short title.</small>
          </div>

          <!-- Tags -->
          <div class="mb-4">
            <label for="tags" class="form-label required">Tags and Topics</label>
            <select id="tags" class="js-example-basic-single form-select w-full" v-model="form.tags" v-select2="tags">
              <!-- Remote -->
            </select>
            <span class="invalid-feedback" v-if="errors.tags" v-text="errors.tags"></span>
            <small class="form-hint mt-2">Choose at least 3 tags related to your question.</small>
          </div>

          <hr>

          <!-- Content -->
          <div class="mb-3">
            <label for="tags" class="form-label required">Content</label>
            <client-only>
              <quill-editor v-model:value="form.content" id="editor" :options="editorOptions"></quill-editor>
            </client-only>
            <small class="invalid-feedback" v-if="errors.content" v-text="errors.content"></small>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit">Publish</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { quillEditor } from "vue3-quill";

export default {
  components: { quillEditor },
  props: {
    errors: Object
  },
  data() {
    return {
      form: {
        title: '',
        tags: [],
        content: ''
      },
      editorOptions: {
        placeholder: 'Talk about your problem in detail, it\'s recommended to provide examples, links or anything that would help people understand your question. Enjoy :)',
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
    }
  },
  methods: {
    submit() {
      this.$inertia.post('/questions/', this.form);
    }
  },
  mounted() {
    $('#tags').select2({
      multiple: true,
      delay: 200,
      cache: true,
      ajax: {
        url: '/tags/find',
        dataType: 'json',
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          return query;
        },
        processResults: function (response) {
          return {
            results: response.items.data
          };
        }
      }
    });
  },
}
</script>

<style lang="css" scoped>
  #editor {
    height: 400px !important;
  }
</style>