<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create FAQ - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

  <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/ckeditor/ckeditor5.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

@include('admin.components.header')
@include('admin.components.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create FAQ</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQs</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New FAQ</h5>

            <!-- Form Start -->
            <form action="{{ route('faqs.store') }}" method="POST" id="faqForm">
              @csrf

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Question</label>
                <div class="col-sm-10">
                  <input type="text" name="question" value="{{ old('question') }}" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Answer</label>
                <div class="col-sm-10">
                  <textarea name="answer" id="editor" class="form-control" rows="6">{{ old('answer') }}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Order</label>
                <div class="col-sm-4">
                  <input type="number" name="order" value="{{ old('order', 0) }}" class="form-control" placeholder="e.g. 1">
                  <small class="text-muted">Urutan tampil FAQ di halaman (semakin kecil, tampil lebih atas).</small>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                  <select name="is_active" class="form-select" required>
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Cancel</a>
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

<!-- CKEditor 5 -->
<script type="importmap">
{
  "imports": {
    "ckeditor5": "/assets/admin/vendor/ckeditor/ckeditor5.js",
    "ckeditor5/": "/assets/admin/vendor/ckeditor/"
  }
}
</script>

<script type="module">
import {
  ClassicEditor,
  Essentials,
  Paragraph,
  Bold,
  Italic,
  Font
} from 'ckeditor5';

ClassicEditor
  .create(document.querySelector('#editor'), {
    licenseKey: 'GPL',
    plugins: [Essentials, Paragraph, Bold, Italic, Font],
    toolbar: [
      'undo', 'redo', '|', 'bold', 'italic', '|',
      'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
    ]
  })
  .then(editor => {
    window.editor = editor;

    const form = document.getElementById('faqForm');
    form.addEventListener('submit', (e) => {
      const data = editor.getData().trim();
      document.querySelector('#editor').value = data;

      // manual validation
      if (data === "") {
        e.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Answer cannot be empty!',
          text: 'Please fill in the answer field before saving.',
        });
      }
    });
  })
  .catch(error => console.error(error));
</script>

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
