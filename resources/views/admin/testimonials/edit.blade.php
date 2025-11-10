<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Testimonial - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

@include('admin.components.header')
@include('admin.components.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Testimonial</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">Testimonials</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Testimonial</h5>

            <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="form-control" required>
                  @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                  <input type="text" name="company" value="{{ old('company', $testimonial->company) }}" class="form-control">
                  @error('company') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                  <textarea name="message" class="form-control" rows="4" required>{{ old('message', $testimonial->message) }}</textarea>
                  @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Rating (1-5)</label>
                <div class="col-sm-10">
                  <input type="number" name="rating" value="{{ old('rating', $testimonial->rating) }}" min="1" max="5" class="form-control">
                  @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Current Photo</label>
                <div class="col-sm-10">
                  @if($testimonial->photo)
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="rounded mb-3" width="120" height="120" style="object-fit: cover;">
                  @else
                    <p class="text-muted">No image available</p>
                  @endif
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Change Photo</label>
                <div class="col-sm-10">
                  <input type="file" name="photo" class="form-control" accept="image/*">
                  @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
                  <small class="text-muted d-block mt-2">Leave empty if not changing.</small>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select name="status" class="form-control">
                    <option value="active" {{ $testimonial->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                  @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main>

@include('admin.components.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

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

</body>
</html>
