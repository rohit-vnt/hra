<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Import salary data</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    @include('include.header')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('include.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                
                <div class="col-md-6">
                    <h4 class="fw-bold py-3 mb-4"> Import Excel</h4>
                  <div class="card mb-4">
                    <h5 class="card-header">Import Excel</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="import" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="mb-3 col-md-12">
                              <label for="firstName" class="form-label">Choose excel file</label>
                              <input
                                class="form-control"
                                type="file" name="file"
                               
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Add Data</button>
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <h4 class="fw-bold py-3 mb-4">Mail salary slip</h4>
                  <div class="card mb-4">
                    <h5 class="card-header">Send salary slip</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="salary" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="mb-3 col-md-12">
                              <label class="form-label">Choose salary date</label>
                              <input
                                class="form-control"
                                type="date" name="date"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Send Mail</button>
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('include.footer');
    <script>
      $('#import').on('submit',function(e){
          e.preventDefault();
          axios.post(`${url}/import`,new FormData(this)).then(function (response) {
                  // handle success
                  show_Toaster(response.data.message,response.data.type)
                  if (response.data.type === 'success') {
                      setTimeout(() => {
                          window.location.href = `${url}/salary`;
                      }, 500);
                  }
              }).catch(function (err) {
                  show_Toaster(err.response.data.message,'error')
          })
      });
      
      $('#salary').on('submit',function(e){
          e.preventDefault();
          axios.post(`${url}/salaryMail`,new FormData(this)).then(function (response) {
                  // handle success
                  show_Toaster(response.data.message,response.data.type)
                  if (response.data.type === 'success') {
                      setTimeout(() => {
                          window.location.href = `${url}/salary`;
                      }, 500);
                  }
              }).catch(function (err) {
                  show_Toaster(err.response.data.message,'error')
          })
      });
    </script>
  </body>
</html>
