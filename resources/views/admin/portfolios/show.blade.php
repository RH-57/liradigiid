<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Detail - Admin</title>
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
      <h1>Portfolio Detail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('portfolios.index') }}">Portfolios</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body pt-3">
          <!-- Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#portfolio-info">Info</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#portfolio-seo">SEO</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#portfolio-media">Media</button>
            </li>

          </ul><!-- End Tabs -->

          <div class="tab-content pt-2">

            <!-- Info Tab -->
            <div class="tab-pane fade show active" id="portfolio-info">
              <h5 class="card-title">Portfolio Information</h5>

              <div class="row mb-3">
                <div class="col-md-4">
                  <strong>Name</strong>
                  <p>{{ $portfolio->name }}</p>
                </div>

                <div class="col-md-4">
                  <strong>URL</strong><br>
                  <p><a href="{{ $portfolio->url }}" target="_blank">{{ $portfolio->url }}</a></p>
                </div>

                <div class="col-md-4">
                  <strong>Slug</strong>
                  <p>{{ $portfolio->slug }}</p>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <strong>Description</strong>
                  <div class="border rounded p-3 bg-light">
                    {!! $portfolio->description !!}
                  </div>
                </div>
              </div>
            </div><!-- End Info Tab -->

            <!-- SEO Tab -->
            <div class="tab-pane fade" id="portfolio-seo">
              <h5 class="card-title">SEO Information</h5>

              <div class="row mb-3">
                <div class="col-md-4">
                  <strong>Meta Title</strong>
                  <p>{{ $portfolio->meta_title ?? '-' }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Meta Keyword</strong>
                  <p>{{ $portfolio->meta_keyword ?? '-' }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Meta Description</strong>
                  <p>{{ $portfolio->meta_description ?? '-' }}</p>
                </div>
              </div>
            </div><!-- End SEO Tab -->

            <!-- Media Tab -->
            <div class="tab-pane fade" id="portfolio-media">
              <h5 class="card-title">Portfolio Image</h5>
              <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                  @if ($portfolio->image)
                    <div class="card h-100 shadow-sm">
                      <img src="{{ asset('storage/' . $portfolio->image) }}"
                        alt="{{ $portfolio->name }}"
                        class="card-img-top rounded"
                        style="height:250px; object-fit:cover;">
                    </div>
                  @else
                    <p class="text-muted">No image available for this portfolio.</p>
                  @endif
                </div>
              </div>
            </div><!-- End Media Tab -->

          </div><!-- End Tab Content -->

          <!-- Action Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Back
            </a>
            <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-primary">
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

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/admin/js/main.js') }}"></script>

</body>

</html>
