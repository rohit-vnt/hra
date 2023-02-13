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
            <!-- Content -->n

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Employees /</span> Add Employees</h4>

              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    <h5 class="card-header">Employees Details</h5>
                    <!-- Account -->
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
                              placeholder="first name"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Middle Name</label>
                            <input class="form-control" type="text" name="middleName" id="middleName" placeholder="middle name" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="lastName" id="lastName" placeholder="last name" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              placeholder="mail@example.com"
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
                            <label class="form-label" for="phoneNumber">Another Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">IN (+91)</span>
                              <input
                                type="text"
                                id="mobile2"
                                name="mobile2"
                                class="form-control"
                                placeholder="8105550111"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">DOB</label>
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Employee DOB" />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Marital Status</label>
                            <select class="form-control" id="marital_status" name="marital_status">
                              <option value="">choose</option>
                              <option value="0">unmarried</option>
                              <option value="1">married</option>  
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                              <option value="">choose</option>
                              <option value="0">male</option>
                              <option value="1">female</option>  
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input
                              type="text"
                              class="form-control"
                              id="department"
                              name="department"
                              placeholder="Employee department"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Designation</label>
                            <input
                              type="text"
                              class="form-control"
                              id="designation"
                              name="designation"
                              placeholder="Employee Designation"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Permanent Address</label>
                            <input type="text" class="form-control" id="p_address" name="p_address" placeholder="Permanent Address" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Current Address</label>
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
                            <label class="form-label">Reporting Manager</label>
                            <select class="form-control" id="reporting" name="reporting">
                              <option value="">choose</option>
                              <option value="1">Name</option>
                              <option value="2">Name</option>  
                            </select>
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
                          <hr/>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Aadhar</label>
                            <input
                              type="text"
                              class="form-control"
                              id="aadhar"
                              name="aadhar"
                              placeholder="Enter aadhar number"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label  class="form-label">Pancard No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="pancard"
                              name="pancard"
                              placeholder="Enter pancard number"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Passport</label>
                            <input
                              type="text"
                              class="form-control"
                              id="passport"
                              name="passport"
                              placeholder="Enter Passport number"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Photo</label>
                            <input
                              type="file"
                              class="form-control"
                              id="photo"
                              name="photo"
                            />
                          </div>
                          <hr/>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Bank Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="bank"
                              name="bank"
                              placeholder="Enter Bank Name"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Account No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="account_no"
                              name="account_no"
                              placeholder="Enter Account number"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Name in bank</label>
                            <input
                              type="text"
                              class="form-control"
                              id="name_bank"
                              name="name_bank"
                              placeholder="Enter Name In Bank"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Branch Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="branch_name"
                              name="branch_name"
                              placeholder="Enter Branch Name"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">IFSC</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ifsc"
                              name="ifsc"
                              placeholder="Enter IFSC Code"
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
