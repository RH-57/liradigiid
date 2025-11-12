<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Packages - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/admin/img/favicon.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  @include('admin.components.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.components.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Packages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Packages</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-12">
          <div class="card info-card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Manage <span>| Packages</span></h5>
                <a class="btn btn-sm btn-primary" href="{{ route('packages.create') }}">
                  <i class="bi bi-plus-circle"></i> Add Package
                </a>
              </div>

              <div class="table-responsive">
                <table class="table table-hover align-middle">
                  <thead class="table-light">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Service</th>
                      <th scope="col">Price</th>
                      <th scope="col">Popular</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($packages as $index => $package)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $package->name }}</td>
                      <td>{{ $package->service->name ?? '-' }}</td>
                      <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                      <td>
                        @if($package->is_popular)
                          <span class="badge bg-warning text-dark">Yes</span>
                        @else
                          <span class="badge bg-secondary">No</span>
                        @endif
                      </td>
                      <td>
                        <span class="badge {{ $package->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                          {{ ucfirst($package->status) }}
                        </span>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('packages.show', $package->id) }}" class="btn btn-sm btn-info">
                          <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-sm btn-warning">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this package?')">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center text-muted">No packages found</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.components.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/admin/js/main.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: "{{ session('success') }}",
      timer: 2000,
      showConfirmButton: false
    })
  </script>
  @endif

  @if(session('error'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: "{{ session('error') }}",
      timer: 3000,
      showConfirmButton: true
    })
  </script>
  @endif
</body>
</html>
