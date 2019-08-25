
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teste Uplexis</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/template/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="../assets/template/css/style.css" rel="stylesheet">
  </head>

  <body class="bg-body">

    <nav class="navbar navbar-expand-md navbar-dark background-orange fixed-top">
      <a class="navbar-brand font-weight" href="">TESTE UPLEXIS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown color-white float-right">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user fa-fw text-light-600"></i>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu text-center" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-fw mr-2 text-white-600"></i>
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!-- Content Start -->
      @yield('content')
    <!-- nd of content --> 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/template/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/template/js/demo/datatables-demo.js"></script>


  </body>
</html>
