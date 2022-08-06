<template>
  <div class="page">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-7 text-center">
              <img src="../../images/students.svg" alt="students" height="500">
              <div class="mt-4">
                <h1>Welcome to Nahrain Community</h1>
                <p class="text-muted">for Information Technology & Engineering</p>
              </div>
            </div>
            <div class="col-5">
              <div class="h-100 flex-column d-flex justify-content-center">
                <slot />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
