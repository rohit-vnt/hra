<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
  
    @include('include.header')
  </head>

  <body >
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('include.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                
                <!--2nd row-->
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-3 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <span class="d-block mb-1 avatar-initial rounded text-primary"><i class="menu-icon tf-icons bx bx-user"></i>Total Employees</span>
                          <h3 class="card-title text-nowrap mb-2">108</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-3 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <span class="d-block mb-1 avatar-initial rounded text-primary"><i class="menu-icon tf-icons bx bx-user"></i>dummy</span>
                          <h3 class="card-title mb-2">101</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-3 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <span class="d-block mb-1 avatar-initial rounded text-primary"><i class="menu-icon tf-icons bx bx-world"></i>dummy</span>
                          <h3 class="card-title text-nowrap mb-2">2</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-3 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <span class="d-block mb-1 avatar-initial rounded text-primary"><i class="menu-icon tf-icons bx bx-world"></i>dummy</span>
                          <h3 class="card-title mb-2">1</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <!--/ 2nd row -->
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
  </body>
</html>
