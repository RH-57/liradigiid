<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FAQ Details - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

  @include('admin.components.header')
  @include('admin.components.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>FAQ Detail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQs</a></li>
          <li class="breadcrumb-item active">{{ $faq->question }}</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="card">
        <div class="card-body pt-3">

          <!-- Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#faq-info">Info</button>
            </li>
          </ul>
          <div class="tab-content pt-2">

            <!-- Info Tab -->
            <div class="tab-pane fade show active" id="faq-info">
              <h5 class="card-title">FAQ Information</h5>

              <div class="row mb-3">
                <div class="col-md-8">
                  <strong>Question</strong>
                  <p>{{ $faq->question }}</p>
                </div>
                <div class="col-md-4">
                  <strong>Status</strong>
                  <p>
                    @if ($faq->is_active)
                      <span class="badge bg-success">Active</span>
                    @else
                      <span class="badge bg-secondary">Inactive</span>
                    @endif
                  </p>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <strong>Answer</strong>
                  <div class="border rounded p-2 bg-light">
                    {!! $faq->answer !!}
                  </div>
                </div>
              </div>
            </div>
            <!-- End Info Tab -->

          </div>

          <!-- Action Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('faqs.index') }}" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Back
            </a>
            <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-primary">
              <i class="bi bi-pencil-square"></i> Edit
            </a>
          </div>

        </div>
      </div>
    </section>

  </main>

  @include('admin.components.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/main.js') }}"></script>

</body>
</html>
