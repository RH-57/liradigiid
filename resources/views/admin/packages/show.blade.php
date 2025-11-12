<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Package - Admin</title>

  <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

@include('admin.components.header')
@include('admin.components.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Package</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Packages</a></li>
        <li class="breadcrumb-item active">{{ $package->name }}</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body pt-3">

        <ul class="nav nav-tabs nav-tabs-bordered">
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#info">Info</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#features">Fitur</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#seo">SEO</button>
          </li>
        </ul>

        <div class="tab-content pt-3">

          <!-- Info Tab -->
          <div class="tab-pane fade show active" id="info">
            <h5 class="card-title">Informasi Paket</h5>
            <div class="row mb-3">
              <div class="col-md-4">
                <strong>Nama Paket</strong>
                <p>{{ $package->name }}</p>
              </div>
              <div class="col-md-4">
                <strong>Layanan</strong>
                <p>{{ $package->service->name ?? '-' }}</p>
              </div>
              <div class="col-md-4">
                <strong>Status</strong>
                <p><span class="badge {{ $package->status == 'active' ? 'bg-success' : 'bg-danger' }}">{{ ucfirst($package->status) }}</span></p>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-4">
                <strong>Harga</strong>
                <p>Rp {{ number_format($package->price, 0, ',', '.') }}</p>
              </div>
              <div class="col-md-4">
                <strong>Harga Asli</strong>
                <p>Rp {{ number_format($package->original_price, 0, ',', '.') }}</p>
              </div>
              <div class="col-md-4">
                <strong>Diskon</strong>
                <p>{{ $package->discount ?? 0 }}%</p>
              </div>
            </div>

            <div class="mb-3">
              <strong>Deskripsi</strong>
              <div class="border rounded p-2 bg-light">{!! $package->description !!}</div>
            </div>
          </div>
          <!-- End Info Tab -->

          <!-- Fitur Tab -->
          <div class="tab-pane fade" id="features">
            <h5 class="card-title">Fitur Paket</h5>

            <div class="row">
              <div class="col-md-6">
                <h6><i class="bi bi-check-circle text-success"></i> Include</h6>
                <ul class="list-group">
                  @forelse($package->includes as $inc)
                    <li class="list-group-item">{{ $inc->feature }}</li>
                  @empty
                    <li class="list-group-item text-muted">Tidak ada fitur include.</li>
                  @endforelse
                </ul>
              </div>

              <div class="col-md-6">
                <h6><i class="bi bi-x-circle text-danger"></i> Exclude</h6>
                <ul class="list-group">
                  @forelse($package->excludes as $exc)
                    <li class="list-group-item">{{ $exc->feature }}</li>
                  @empty
                    <li class="list-group-item text-muted">Tidak ada fitur exclude.</li>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
          <!-- End Fitur Tab -->

          <!-- SEO Tab -->
          <div class="tab-pane fade" id="seo">
            <h5 class="card-title">Informasi SEO</h5>
            <div class="row mb-3">
              <div class="col-md-4"><strong>Meta Title</strong><p>{{ $package->meta_title }}</p></div>
              <div class="col-md-4"><strong>Meta Keywords</strong><p>{{ $package->meta_keywords }}</p></div>
              <div class="col-md-4"><strong>Meta Description</strong><p>{{ $package->meta_description }}</p></div>
            </div>
            <div class="col-md-4">
              <strong>Meta Image</strong><br>
              @if($package->meta_image)
                <img src="{{ asset('storage/' . $package->meta_image) }}" class="img-fluid rounded shadow-sm" style="max-height:200px;">
              @endif
            </div>
          </div>
          <!-- End SEO Tab -->
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="{{ route('packages.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
          <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
        </div>

      </div>
    </div>
  </section>
</main>

@include('admin.components.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>
</html>
