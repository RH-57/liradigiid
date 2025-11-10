<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create Testimonial - Admin</title>
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
  <link href="{{asset('assets/admin/vendor/ckeditor/ckeditor5.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
</head>

<body>

@include('admin.components.header')
@include('admin.components.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Testimonial</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">Testimonials</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Testimonial</h5>

            <!-- Form Start -->
            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                    <input type="text" name="company" value="{{ old('company') }}" class="form-control">
                    @error('company') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
                    @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Rating (1-5)</label>
                <div class="col-sm-10">
                    <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5" class="form-control">
                    @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" class="form-control">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save</button>
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

<!-- Vendor JS Files -->
<script src="{{asset('assets/admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/admin/js/main.js')}}"></script>

<!-- CKEditor -->
<script type="importmap">
{
  "imports": {
    "ckeditor5": "/assets/admin/vendor/ckeditor/ckeditor5.js",
    "ckeditor5/": "/assets/admin/vendor/ckeditor/"
  }
}
</script>

<script type="module">
  import { ClassicEditor, Essentials, Paragraph, Bold, Italic, Font } from 'ckeditor5';

  ClassicEditor
    .create(document.querySelector('#message'), {
      licenseKey: 'GPL',
      plugins: [Essentials, Paragraph, Bold, Italic, Font],
      toolbar: ['undo', 'redo', '|', 'bold', 'italic', '|', 'fontSize', 'fontColor']
    })
    .then(editor => { window.editor = editor; })
    .catch(error => { console.error(error); });
</script>

<script>
  // Preview image before upload
  document.getElementById('image').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('rounded', 'shadow', 'mt-2');
        img.style.maxWidth = '150px';
        preview.appendChild(img);
      }
      reader.readAsDataURL(file);
    }
  });
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
