<!doctype html>
<html class="no-js h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="https://media2.giphy.com/media/hvY3bABRuv3uliYCRI/giphy.gif" type="image/gif" sizes="12x14">
  <title>PC Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('css/internal.css') }}">
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
        <div class="main-navbar">
          <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
              <div class="d-table m-auto">
                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 50px;"
                  src="https://media2.giphy.com/media/hvY3bABRuv3uliYCRI/giphy.gif">
                <span class="d-none d-md-inline ml-1">Admin</span>
              </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
              <i class="material-icons">&#xE5C4;</i>
            </a>
          </nav>
        </div>
        <div class="nav-wrapper">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('product') }}">
                <i class="material-icons">store</i>
                <span>View Product</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('order') }}">
                <i class="material-icons">vertical_split</i>
                <span>View Order</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('add-new-product') }}">
                <i class="material-icons">note_add</i>
                <span>Add New Product</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('search-product') }}">
                <i class="material-icons">edit</i>
                <span>Edit Product</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('delete-product') }}">
                <i class="material-icons">delete</i>
                <span>Delete Product</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar bg-white">
          <!-- Main Navbar -->
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img class="user-avatar rounded-circle mr-2"
                    src="https://img.freepik.com/free-psd/3d-icon-social-media-app_23-2150049569.jpg?size=338&ext=jpg&ga=GA1.1.1412446893.1704412800&semt=ais">
                  <span class="d-none d-md-inline-block">Admin User</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{ route('login') }}">Logout</a>
                </div>
              </li>
            </ul>
            <nav class="nav">
              <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
              </a>
            </nav>
          </nav>
        </div>
        <div class="main-content-container container-fluid px-4">
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
              <h3 class="page-title">Delete Product</h3>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-body p-0 pb-3 text-center">
                  <table class="table mb-0">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">Name</th>
                        <th scope="col" class="border-0">Stock</th>
                        <th scope="col" class="border-0">Image</th>
                        <th scope="col" class="border-0">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td>{{ $product->productID }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                          @if($product->productImage)
                          <img src="{{ $product->productImage }}" alt="Product Image"
                            style="max-width: 50px; max-height: 50px;">
                          @else
                          No Image
                          @endif
                        </td>
                        <td>
                          <form action="{{ route('delete-product') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $product->productID }}">
                            <button type="submit" class="btn btn-sm btn-danger">
                              <i class="material-icons">delete</i>
                            </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


        </div>
        <footer class="main-footer d-flex p-2 px-3 bg-white border-top justify-content-center">
          <span class="copyright my-auto">Copyright © 2024. PUBLIC CULTURE. All Rights Reserved.</span>
        </footer>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
  <script src="scripts/extras.1.1.0.min.js"></script>
  <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
</body>

</html>