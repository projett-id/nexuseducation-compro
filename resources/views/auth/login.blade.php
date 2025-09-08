<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Backoffice | Compro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <meta name="title" content="NexusEducation | Backoffice Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('admin-theme/css/adminlte.css')}}" as="style" />
    <link rel="stylesheet" href="{{ asset('admin-theme/css/adminlte.css')}}" />
  </head>
  <body class="login-page bg-body-secondary">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{route('home') }}"><b>Nexus Education</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in</p>
            <form method="POST" action="{{ route('login') }}">
                    @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" />
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>
            <!--begin::Row-->
            <div class="row">
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
