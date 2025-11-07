<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Article Detail - Admin</title>
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
      <h1>Article Detail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Articles</a></li>
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
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#article-info">Info</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#article-seo">SEO</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#article-media">Media</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#article-advanced">Advanced</button>
            </li>

          </ul><!-- End Tabs -->

          <div class="tab-content pt-2">

            <!-- Info Tab -->
            <div class="tab-pane fade show active" id="article-info">
              <h5 class="card-title">Article Information</h5>

              <div class="row mb-3">
                <div class="col-md-4">
                  <strong>Title</strong>
                  <p>{{ $article->title }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Category</strong>
                  <p>{{ $article->category }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Status</strong><br>
                  <span class="badge
                    {{ $article->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                    {{ ucfirst($article->status) }}
                  </span>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-4">
                  <strong>Slug</strong>
                  <p>{{ $article->slug }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Author</strong>
                  <p>{{ $article->user->name ?? 'Unknown' }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Published At</strong>
                  <p>{{ $article->published_at ? $article->published_at->format('d M Y H:i') : '-' }}</p>
                </div>
              </div>

              <div class="mb-3">
                <strong>Excerpt</strong>
                <p>{{ $article->excerpt ?? '-' }}</p>
              </div>

              <div class="mb-3">
                <strong>Content</strong>
                <div class="border rounded p-3 bg-light">
                  {!! $article->content !!}
                </div>
              </div>
            </div><!-- End Info Tab -->

            <!-- SEO Tab -->
            <div class="tab-pane fade" id="article-seo">
              <h5 class="card-title">SEO Information</h5>

              <div class="row mb-3">
                <div class="col-md-4">
                  <strong>Meta Title</strong>
                  <p>{{ $article->meta_title ?? '-' }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Meta Keyword</strong>
                  <p>{{ $article->meta_keyword ?? '-' }}</p>
                </div>

                <div class="col-md-4">
                  <strong>Meta Description</strong>
                  <p>{{ $article->meta_description ?? '-' }}</p>
                </div>
              </div>

              <hr>

              <h6 class="mt-4">Open Graph Data (Social Media)</h6>

              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>OG Title</strong>
                  <p>{{ $article->og_title ?? '-' }}</p>
                </div>

                <div class="col-md-6">
                  <strong>OG Description</strong>
                  <p>{{ $article->og_description ?? '-' }}</p>
                </div>
              </div>
            </div><!-- End SEO Tab -->

            <!-- Media Tab -->
            <div class="tab-pane fade" id="article-media">
              <h5 class="card-title">Article Images</h5>
              <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                  <strong>Featured Image</strong>
                  @if ($article->featured_image)
                    <div class="card mt-2 shadow-sm">
                      <img src="{{ asset('storage/' . $article->featured_image) }}"
                        alt="{{ $article->title }}"
                        class="card-img-top rounded"
                        style="height:250px; object-fit:cover;">
                    </div>
                  @else
                    <p class="text-muted">No featured image available.</p>
                  @endif
                </div>

                <div class="col-md-4 col-sm-6 mb-3">
                  <strong>Meta Image</strong>
                  @if ($article->meta_image)
                    <div class="card mt-2 shadow-sm">
                      <img src="{{ asset('storage/' . $article->meta_image) }}"
                        alt="{{ $article->title }}"
                        class="card-img-top rounded"
                        style="height:250px; object-fit:cover;">
                    </div>
                  @else
                    <p class="text-muted">No meta image available.</p>
                  @endif
                </div>
              </div>
            </div><!-- End Media Tab -->

            <!-- Advanced SEO Tab -->
            <div class="tab-pane fade" id="article-advanced">
              <h5 class="card-title">Advanced SEO Settings</h5>

              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Canonical URL</strong>
                  <p>{{ $article->canonical_url ?? '-' }}</p>
                </div>

                <div class="col-md-6">
                  <strong>Robots</strong>
                  <p>{{ $article->robots ?? 'index, follow' }}</p>
                </div>
              </div>

              <div class="mb-3">
                <strong>Schema JSON</strong>
                <pre class="bg-light p-3 rounded" style="white-space: pre-wrap; word-break: break-word;">
{{ json_encode($article->schema_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}
                </pre>
              </div>
            </div><!-- End Advanced Tab -->

          </div><!-- End Tab Content -->

          <!-- Action Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Back
            </a>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">
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
