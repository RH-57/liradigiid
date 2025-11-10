<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Testimonials - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
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
      <h1>Testimonials</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Testimonials</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-8 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">
                      Manage <span>| Testimonials</span>
                    </h5>
                    <a class="btn btn-sm btn-primary" href="{{ route('testimonials.create') }}">Add</a>
                  </div>

                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Message</th>
                        <th scope="col" class="text-end">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($testimonials as $index => $testimonial)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>
                            @if($testimonial->photo)
                              <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="rounded-circle" width="45" height="45" style="object-fit: cover;">
                            @else
                              <span class="text-muted">No Image</span>
                            @endif
                          </td>
                          <td>{{ $testimonial->name }}</td>
                          <td>{{ $testimonial->company ?? '-' }}</td>
                          <td>{{ Str::limit($testimonial->message, 60) }}</td>
                          <td class="text-end">
                            <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-info">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                <i class="bi bi-trash"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6" class="text-center text-muted py-4">No testimonials found</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

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
  <script src="{{ asset('assets/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/admin/js/main.js') }}"></script>

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
