<template>
  <div class="page-title">
    Ask Question
  </div>
  <div class="container-xxl">
    <div class="card mt-4">
      <form method="post" @submit.prevent="submit()">
        <div class="card-body">
          <!-- Title -->
          <div class="mb-3">
            <label for="title" class="form-label required">Title</label>
            <input type="text" class="form-control" id="title" v-model="form.title">
            <small class="form-hint">Choose a descriptive and short title for your question.</small>
          </div>

          <!-- Tags -->
          <div class="mb-3">
            <label for="tags" class="form-label required">Tags</label>
            <select id="tags" class="js-example-basic-single form-select w-full" v-model="form.tags" v-select2="tags">
              <!-- Remote -->
            </select>
            <small class="form-hint">Choose at least 3 tags related to your question.</small>
          </div>

          <!-- Content -->
          <div class="mb-3">
            <label for="tags" class="form-label required">Content</label>
              <Editor
                v-model="form.content"
                :init="{
                  height: 500,
                  menubar: false,
                  plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                  ],
                  toolbar:
                    'undo redo | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | help'
                }"
              />
              <small class="form-hint">Talk about your question in detail.</small>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary btn-pill" type="submit">Publish</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'

export default {
  components: { Editor },
  props: {
    errors: Object
  },
  data() {
    return {
      form: {
        title: '',
        tags: [],
        content: ''
      }
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