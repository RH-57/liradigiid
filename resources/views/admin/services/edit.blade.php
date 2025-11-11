<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Service - Admin</title>
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
      <h1>Edit Service</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="title" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control"
                         value="{{ old('name', $service->name) }}" required>
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" id="editor" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="active" {{ old('status', $service->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $service->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>


                <h5 class="mt-4">SEO Meta</h5>
                <div class="mb-3">
                  <label for="meta_title" class="form-label">Meta Title</label>
                  <input type="text" name="meta_title" class="form-control"
                         value="{{ old('meta_title', $service->meta_title) }}">
                </div>

                <div class="mb-3">
                  <label for="meta_description" class="form-label">Meta Description</label>
                  <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $service->meta_description) }}</textarea>
                </div>

                <div class="mb-3">
                  <label for="meta_keyword" class="form-label">Meta Keywords</label>
                  <input type="text" name="meta_keywords" class="form-control"
                         value="{{ old('meta_keywords', $service->meta_keywords) }}">
                </div>

                <div class="mb-3">
                  <label for="meta_image" class="form-label">Meta Image</label><br>
                  @if($service->meta_image)
                    <img src="{{ asset('storage/'.$service->meta_image) }}" alt="Meta Image" class="img-thumbnail mb-2" width="200">
                  @endif
                  <input type="file" name="meta_image" class="form-control">
                  <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
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
  <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/main.js')}}"></script>
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
            .create( document.querySelector( '#editor' ), {
                licenseKey: 'GPL', // bebas, karena kamu pakai versi GPL
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );
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
