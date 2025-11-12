<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Package - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/vendor/ckeditor/ckeditor5.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>
@include('admin.components.header')
@include('admin.components.sidebar')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Package</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Packages</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div>

  <section class="section"
    x-data="{
      includes: {{ json_encode($package->includes->pluck('feature')->toArray()) ?: '[]' }},
      excludes: {{ json_encode($package->excludes->pluck('feature')->toArray()) ?: '[]' }}
    }">

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Package</h5>

            <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              {{-- Service --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Service</label>
                <div class="col-sm-10">
                  <select name="service_id" class="form-select" required>
                    <option value="">-- Select Service --</option>
                    @foreach($services as $service)
                      <option value="{{ $service->id }}" {{ $package->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              {{-- Name --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="{{ old('name', $package->name) }}" class="form-control" required>
                </div>
              </div>

              {{-- Description --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" id="editor" class="form-control">{{ old('description', $package->description) }}</textarea>
                </div>
              </div>

              {{-- Price --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-4">
                  <input type="number" name="price" value="{{ old('price', $package->price) }}" class="form-control" required>
                </div>
                <label class="col-sm-2 col-form-label text-end">Original Price</label>
                <div class="col-sm-4">
                  <input type="number" name="original_price" value="{{ old('original_price', $package->original_price) }}" class="form-control">
                </div>
              </div>

              {{-- Discount & Popular --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Discount (%)</label>
                <div class="col-sm-4">
                  <input type="number" name="discount" value="{{ old('discount', $package->discount) }}" class="form-control" min="0" max="100">
                </div>
                <label class="col-sm-2 col-form-label text-end">Popular</label>
                <div class="col-sm-4">
                  <select name="is_popular" class="form-select">
                    <option value="0" {{ $package->is_popular == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $package->is_popular == 1 ? 'selected' : '' }}>Yes</option>
                  </select>
                </div>
              </div>

              {{-- Status --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                  <select name="status" class="form-select">
                    <option value="active" {{ $package->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $package->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>
              </div>

              {{-- Fitur Include & Exclude --}}
              <h5 class="card-title mt-4">Package Features</h5>
              <ul class="nav nav-tabs" id="featureTabs" role="tablist">
                <li class="nav-item">
                  <button class="nav-link active" id="includes-tab" data-bs-toggle="tab" data-bs-target="#includes" type="button">Include</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" id="excludes-tab" data-bs-toggle="tab" data-bs-target="#excludes" type="button">Exclude</button>
                </li>
              </ul>

              <div class="tab-content mt-3">
                {{-- INCLUDE --}}
                <div class="tab-pane fade show active" id="includes">
                  <template x-for="(item, index) in includes" :key="index">
                    <div class="d-flex gap-2 mb-2">
                      <input type="text" :name="'includes[' + index + ']'" x-model="includes[index]" class="form-control" placeholder="Masukkan fitur include">
                      <button type="button" class="btn btn-outline-danger btn-sm" @click="includes.splice(index, 1)">
                        <i class="bi bi-trash"></i>
                      </button>
                    </div>
                  </template>
                  <button type="button" class="btn btn-outline-primary btn-sm" @click="includes.push('')">
                    <i class="bi bi-plus-lg"></i> Tambah Include
                  </button>
                </div>

                {{-- EXCLUDE --}}
                <div class="tab-pane fade" id="excludes">
                  <template x-for="(item, index) in excludes" :key="index">
                    <div class="d-flex gap-2 mb-2">
                      <input type="text" :name="'excludes[' + index + ']'" x-model="excludes[index]" class="form-control" placeholder="Masukkan fitur exclude">
                      <button type="button" class="btn btn-outline-danger btn-sm" @click="excludes.splice(index, 1)">
                        <i class="bi bi-trash"></i>
                      </button>
                    </div>
                  </template>
                  <button type="button" class="btn btn-outline-primary btn-sm" @click="excludes.push('')">
                    <i class="bi bi-plus-lg"></i> Tambah Exclude
                  </button>
                </div>
              </div>

              {{-- SEO --}}
              <h5 class="card-title mt-4">SEO Meta</h5>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Title</label>
                <div class="col-sm-10">
                  <input type="text" name="meta_title" value="{{ old('meta_title', $package->meta_title) }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Description</label>
                <div class="col-sm-10">
                  <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $package->meta_description) }}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Keywords</label>
                <div class="col-sm-10">
                  <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $package->meta_keywords) }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Image</label>
                <div class="col-sm-10">
                  <input type="file" name="meta_image" class="form-control mb-2">
                  @if($package->meta_image)
                    <img src="{{ asset('storage/' . $package->meta_image) }}" class="img-fluid rounded shadow-sm" style="max-height:150px;">
                  @endif
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('packages.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@include('admin.components.footer')

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
import { ClassicEditor, Essentials, Paragraph, Bold, Italic, Font } from 'ckeditor5';
ClassicEditor.create(document.querySelector('#editor'), {
  licenseKey: 'GPL',
  plugins: [Essentials, Paragraph, Bold, Italic, Font],
  toolbar: ['undo', 'redo', '|', 'bold', 'italic', '|', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor']
})
.catch(error => console.error(error));
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
Swal.fire({ icon: 'success', title: 'Success!', text: "{{ session('success') }}", timer: 2000, showConfirmButton: false })
</script>
@endif
@if(session('error'))
<script>
Swal.fire({ icon: 'error', title: 'Oops...', text: "{{ session('error') }}", timer: 3000, showConfirmButton: true })
</script>
@endif

</body>
</html>
