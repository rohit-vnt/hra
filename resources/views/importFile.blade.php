<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
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

    <title>Forgot Password</title>

    <meta name="description" content="" />

    @include('include.header')
    <link rel="stylesheet" href="{{asset("assets/vendor/css/pages/page-auth.css")}}" />
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">Logo</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Import Salary Slip Sheet</h4>
              <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="email" class="form-label">Import file</label>
                  @csrf
                  <input type="file" name="file"
                    class="form-control">
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Submit</button>
              </form>
              
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    @include('include.footer')
  </body>
</html>
