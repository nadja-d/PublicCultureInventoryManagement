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
                  src="https://img.freepik.com/free-psd/3d-icon-social-media-app_23-2150049569.jpg?size=338&ext=jpg&ga=GA1.1.1412446893.1704412800&semt=ais">
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
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('search-product') }}">
                <i class="material-icons">edit</i>
                <span>Edit Product</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('delete-product') }}">
                <i class="material-icons">delete</i>
                <span>Delete Product</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar bg-white">
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
              <h3 class="page-title">Edit Product</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card card-small mb-4">
                <div class="card-body">
                  <form id="editProductForm" method="POST" action="{{ route('update-product') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->productID }}">

                    <div class="form-row">
                      <div class="form-group col-md-2">
                        <label for="PRODUCTid">Product ID</label>
                        <input type="number" class="form-control" id="id" name="id" placeholder="ID"
                          value="{{ $product->productID }}" readonly required>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName"
                          placeholder="Product Name" value="{{ $product->name }}" required>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock"
                          value="{{ $product->stock }}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                          placeholder="Product Description" rows="3" required>{{ $product->description }}</textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                          value="{{ $product->price }}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="productCategory">Product Category</label>
                        <input type="text" class="form-control" id="productCategory" name="productCategory"
                          placeholder="Product Category" value="{{ $product->productCategory }}" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="productImage">Product Image URL</label>
                        <input type="url" class="form-control" id="productImage" name="productImage"
                          placeholder="Product Image URL" value="{{ $product->productImage }}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                          <i class="material-icons">update</i> Update Product
                        </button>
                      </div>
                    </div>
                  </form>
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