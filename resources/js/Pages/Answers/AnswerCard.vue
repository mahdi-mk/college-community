<template>
<div class="card">
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
      </div>
      <div class="col">
        <div class="card-title">
          <Link href="#">{{ answer.author.name }}</Link>
        </div>
        <div class="card-subtitle">50k XP</div>
      </div>
    </div>
    <div class="card-actions d-flex align-items-center">
      <div class="bg-primary rounded-pill me-2 py-2 px-3" v-if="answer.is_accepted">Best Answer</div>
      <div class="dropdown">
        <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="19" r="1"></circle><circle cx="12" cy="5" r="1"></circle></svg>
        </a>
        <div class="dropdown-menu dropdown-menu-end" style="">
          <a href="#" class="dropdown-item">Import</a>
          <a href="#" class="dropdown-item">Export</a>
          <a href="#" class="dropdown-item">Download</a>
          <a href="#" class="dropdown-item text-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="card-body" v-html="answer.content"></div>

  <!-- Upvote & Downvote -->
  <div class="p-3">
    <div class="row justify-content-between">
      <div class="col-sm-3">
        <div class="btn-group w-100">
          <button class="btn btn-action" aria-label="Button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-top" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#407BFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M9 20v-8h-3.586a1 1 0 0 1 -.707 -1.707l6.586 -6.586a1 1 0 0 1 1.414 0l6.586 6.586a1 1 0 0 1 -.707 1.707h-3.586v8a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
            </svg> 
            <span class="ms-2">22</span>
          </button>
          <button class="btn btn-action" aria-label="Button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-down" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M15 4v8h3.586a1 1 0 0 1 .707 1.707l-6.586 6.586a1 1 0 0 1 -1.414 0l-6.586 -6.586a1 1 0 0 1 .707 -1.707h3.586v-8a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: {
    answer: {
      type: Object,
      required: true,
    },
  }
}
</script>