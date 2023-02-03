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

    <title>Employees</title>

    <meta name="description" content="" />

    <!-- Icons. Uncomment required icon fonts -->
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Employees /</span> Add Employees</h4>

              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    <h5 class="card-header">Employees Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="http://localhost/hra/public/assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 500K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="addEmployee">
                        {{-- contact details --}}
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="firstName"
                              value="John"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="john.doe@example.com"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">IN (+91)</span>
                              <input
                                type="text"
                                id="mobile"
                                name="mobile"
                                class="form-control"
                                placeholder="8105550111"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Employee code</label>
                            <input type="text" class="form-control" id="empCode" name="empCode" placeholder="Employee code" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input
                              type="text"
                              class="form-control"
                              id="department"
                              name="department"
                              placeholder="Accounts"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                          </div>
                         
                          <div class="mb-3 col-md-6">
                            <label for="joining" class="form-label">Joining Date</label>
                            <input
                              type="date"
                              class="form-control"
                              id="joiningDate"
                              name="joiningDate"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="ctc" class="form-label">CTC</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ctc"
                              name="ctc"
                              placeholder="e.g 600000"
                            />
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                   
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
    @include('include.footer')
    <script>
      $('#addEmployee').on('submit',function(e){
          e.preventDefault();
          axios.post(`${url}/addEmployee`,new FormData(this)).then(function (response) {
                  // handle success
                  show_Toaster(response.data.message,response.data.type)
                  if (response.data.type === 'success') {
                      setTimeout(() => {
                          window.location.href = `${url}/add-employee`;
                      }, 500);
                  }
              }).catch(function (err) {
                  show_Toaster(err.response.data.message,'error')
          })
       });
      </script>
  </body>
</html>
