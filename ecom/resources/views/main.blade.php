<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Ecom</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('category.index') }}">Category</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('product.index') }}">Product</a>
            </li> --}}
        </ul>
      </div>
    </div>
  </nav>
    <div class="container-fluid p-0 d-flex">

        <!-- Sidebar -->
        <nav class="border-end p-3" style="width: 250px;">
            <h4 class="text-center">Categories</h4>
            <hr>
            <ul class="nav flex-column">
                @foreach($cats as $category)
                    <li class="nav-item">
                        <a href="{{ route('category.show', $category->id) }}" class="nav-link text-dark">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-fill p-4">
            <!-- Your main content goes here -->
            @yield('main')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
