<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create Article - Admin</title>
  <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendor/ckeditor/ckeditor5.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
</head>

<body>

@include('admin.components.header')
@include('admin.components.sidebar')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Article</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Articles</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Article</h5>

            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              {{-- Title --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                  @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              {{-- Category --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select name="category" class="form-select" required>
                    <option value="">-- Select Category --</option>
                    <option value="tutorial" {{ old('category') == 'tutorial' ? 'selected' : '' }}>Tutorial</option>
                    <option value="insight" {{ old('category') == 'insight' ? 'selected' : '' }}>Insight</option>
                  </select>
                  @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              {{-- Excerpt --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Excerpt</label>
                <div class="col-sm-10">
                  <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt') }}</textarea>
                  @error('excerpt') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              {{-- Content --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea name="content" id="description" class="form-control" rows="6">{{ old('content') }}</textarea>
                  @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              {{-- Featured Image --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Featured Image</label>
                <div class="col-sm-10">
                  <input type="file" name="featured_image" class="form-control" accept="image/*">
                  <small class="form-text text-muted">Max size: 4MB</small>
                  @error('featured_image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              {{-- Meta Image --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Meta Image</label>
                <div class="col-sm-10">
                  <input type="file" name="meta_image" class="form-control" accept="image/*">
                  <small class="form-text text-muted">Optional: used for social media preview</small>
                  @error('meta_image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              {{-- SEO META --}}
            <h5 class="card-title">SEO Meta</h5>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Meta Title</label>
            <div class="col-sm-10">
                <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control">
            </div>
            </div>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Meta Description</label>
            <div class="col-sm-10">
                <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
            </div>
            </div>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Meta Keyword</label>
            <div class="col-sm-10">
                <input type="text" name="meta_keyword" value="{{ old('meta_keyword') }}" class="form-control">
            </div>
            </div>

            {{-- OG (Open Graph) DATA --}}
            <h5 class="card-title mt-4">Open Graph (Social Media)</h5>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">OG Title</label>
            <div class="col-sm-10">
                <input type="text" name="og_title" value="{{ old('og_title') }}" class="form-control" placeholder="If empty, will use Meta Title">
            </div>
            </div>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">OG Description</label>
            <div class="col-sm-10">
                <textarea name="og_description" class="form-control" rows="2" placeholder="If empty, will use Meta Description">{{ old('og_description') }}</textarea>
            </div>
            </div>

            {{-- ADVANCED SEO --}}
            <h5 class="card-title mt-4">Advanced SEO Settings</h5>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Canonical URL</label>
            <div class="col-sm-10">
                <input type="text" name="canonical_url" value="{{ old('canonical_url') }}" class="form-control" placeholder="https://example.com/article-slug">
            </div>
            </div>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Robots</label>
            <div class="col-sm-10">
                <select name="robots" class="form-select">
                <option value="index, follow" {{ old('robots') == 'index, follow' ? 'selected' : '' }}>index, follow</option>
                <option value="noindex, follow" {{ old('robots') == 'noindex, follow' ? 'selected' : '' }}>noindex, follow</option>
                <option value="index, nofollow" {{ old('robots') == 'index, nofollow' ? 'selected' : '' }}>index, nofollow</option>
                <option value="noindex, nofollow" {{ old('robots') == 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
                </select>
            </div>
            </div>

            {{-- Status --}}
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select name="status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            </div>



              <div class="text-end">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@include('admin.components.footer')

<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<!-- CKEditor 5 Self-hosted -->
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
    Font,
    List,
    Indent,
    IndentBlock,
    Code,
    CodeBlock
} from 'ckeditor5';

ClassicEditor
    .create(document.querySelector('#description'), {
        licenseKey: 'GPL', // versi GPL bebas
        plugins: [ Essentials, Paragraph, Bold, Italic, Font, List, Indent, IndentBlock, Code, CodeBlock ],
        toolbar: [
            'undo', 'redo', '|',
            'bold', 'italic', '|',
            'bulletedList', 'numberedList', '|',
            'outdent', 'indent', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
            'code', 'codeBlock',
        ],
        fontSize: {
            options: [ 'tiny', 'small', 'default', 'big', 'huge' ]
        },
        codeBlock: {
            languages: [
                { language: 'plaintext', label: 'Plain text' },
                { language: 'php', label: 'PHP' },
                { language: 'javascript', label: 'JavaScript' },
                { language: 'html', label: 'HTML' },
                { language: 'css', label: 'CSS' },
                { language: 'sql', label: 'SQL' },
            ]
        }
    })
    .then(editor => {
        window.editor = editor;
    })
    .catch(error => {
        console.error(error);
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
