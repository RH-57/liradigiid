<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit FAQ - Admin</title>
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

  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
</head>

<body>

  @include('admin.components.header')
  @include('admin.components.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit FAQ</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQs</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="card">
        <div class="card-body pt-3">
          <h5 class="card-title">Edit FAQ</h5>

          <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
              <label for="question" class="col-sm-2 col-form-label">Question</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  name="question"
                  id="question"
                  value="{{ old('question', $faq->question) }}"
                  class="form-control @error('question') is-invalid @enderror"
                  required
                >
                @error('question')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="answer" class="col-sm-2 col-form-label">Answer</label>
              <div class="col-sm-10">
                <textarea
                  name="answer"
                  id="answer"
                  class="form-control @error('answer') is-invalid @enderror"
                  rows="6"
                >{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-4">
                <select name="is_active" class="form-select" required>
                  <option value="1" {{ old('is_active', $faq->is_active) == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ old('is_active', $faq->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="order" class="col-sm-2 col-form-label">Order</label>
              <div class="col-sm-2">
                <input
                  type="number"
                  name="order"
                  id="order"
                  value="{{ old('order', $faq->order) }}"
                  class="form-control @error('order') is-invalid @enderror"
                  min="1"
                >
                @error('order')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('faqs.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancel
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update
              </button>
            </div>

          </form>
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

  <!-- CKEditor init -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      ClassicEditor
        .create(document.querySelector('#answer'))
        .catch(error => console.error(error));
    });
  </script>

  <!-- SweetAlert for success/error -->
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
