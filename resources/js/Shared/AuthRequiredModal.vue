<template>
  <div class="modal modal-blur fade" id="auth-required-modal" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-body text-center py-4">
            <h3 class="mb-3">Let's Get You Signed Up</h3>
            <img src="../../images/auth.svg" alt="auth" height="200">
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row gap-3">
                <a href="/login" class="btn btn-primary">Login</a>
                <a href="/register" class="btn">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
  
  }
  </script>