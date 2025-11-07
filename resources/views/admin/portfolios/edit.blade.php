<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Portfolio - Admin</title>
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
    <h1>Edit Portfolio</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('portfolios.index') }}">Portfolios</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Portfolio</h5>

            <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="{{ old('name', $portfolio->name) }}" class="form-control" required>
                  @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-10">
                  <input type="text" name="url" value="{{ old('url', $portfolio->url) }}" class="form-control" required>
                  @error('url') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $portfolio->description) }}</textarea>
                  @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  @if($portfolio->image)
                    <div class="mb-3">
                      <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->name }}" width="150" class="img-thumbnail">
                    </div>
                  @endif
                  <input type="file" name="image" class="form-control" accept="image/*">
                  <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
                  @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <h5 class="card-title">SEO Meta</h5>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Title</label>
                <div class="col-sm-10">
                  <input type="text" name="meta_title" value="{{ old('meta_title', $portfolio->meta_title) }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Description</label>
                <div class="col-sm-10">
                  <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $portfolio->meta_description) }}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Keyword</label>
                <div class="col-sm-10">
                  <input type="text" name="meta_keyword" value="{{ old('meta_keyword', $portfolio->meta_keyword) }}" class="form-control">
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Cancel</a>
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

ClassicEditor.create(document.querySelector('#description'), {
  licenseKey: 'GPL',
  plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
  toolbar: ['undo', 'redo', '|', 'bold', 'italic', '|', 'fontSize', 'fontColor', 'fontBackgroundColor']
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
