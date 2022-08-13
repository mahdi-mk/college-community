<template>
  <div class="card mb-2">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto">
          <div class="d-flex flex-column small text-end text-muted">
            <span class="mt-1">{{ question.votes }} votes</span>
            <span class="mt-1">{{ question.answers_count }} answers</span>
            <span class="mt-1">52 views</span>
          </div>
        </div>
        <div class="col">
          <h3 class="card-title mb-1">
            <Link :href="`/questions/${question.id}`" class="text-reset">{{ question.title }}</Link>
          </h3>
          <div class="mt-1">
            <span class="small">
              Asked 
              {{ question.created_at }} by <a href="">
                {{ question.author.first_name + ' ' + question.author.last_name }}
              </a>
            </span>
          </div>
          <div class="d-flex mt-3">
            <Link class="status status-primary me-1" v-for="tag in question.tags" :key="tag.id">
              {{ tag.name }}
            </Link>
          </div>
        </div>
        <div class="col-auto">
          <div class="dropdown">
            <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="19" r="1"></circle><circle cx="12" cy="5" r="1"></circle></svg>
            </a>
            <div class="dropdown-menu dropdown-menu-end" style="">
              <a href="#" class="dropdown-item">Save</a>
              <a href="#" class="dropdown-item">Edit</a>
              <a href="#" class="dropdown-item">Share</a>
              <a href="#" class="dropdown-item text-danger">Report</a>
            </div>
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