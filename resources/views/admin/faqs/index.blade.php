<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FAQs - Admin</title>
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
  <!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>FAQs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboards.index')}}">Home</a></li>
          <li class="breadcrumb-item active">FAQs</li>
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
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Manage <span>| FAQs</span></h5>
                    <a class="btn btn-sm btn-primary" href="{{ route('faqs.create') }}">Add</a>
                  </div>

                  <table class="table table-striped align-middle mt-3">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 5%">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Status</th>
                        <th scope="col" style="width: 15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($faqs as $index => $faq)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ Str::limit($faq->question, 60) }}</td>
                          <td>
                            <span class="badge {{ $faq->is_active ? 'bg-primary' : 'bg-danger' }}">
                              {{ $faq->is_active ? 'Active' : 'Inactive' }}
                            </span>
                          </td>
                          <td>
                            <a href="{{ route('faqs.show', $faq->id) }}" class="btn btn-sm btn-info">
                              <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this FAQ?')">
                                <i class="bi bi-trash"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="4" class="text-center text-muted">No FAQs found.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body pb-0">
              <!-- Optional: Stats or info here -->
            </div>
          </div>
        </div><!-- End Right side columns -->

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
