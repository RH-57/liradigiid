<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Articles - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/admin/img/favicon.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.components.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.components.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Articles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboards.index')}}">Home</a></li>
          <li class="breadcrumb-item active">Articles</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-12 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">
                                Manage <span>| Articles</span>
                            </h5>

                            <div class="d-flex gap-2">
                                <form action="{{ route('articles.index') }}" method="GET" class="d-flex">
                                    <input type="search" name="q" value="{{ request('q') }}" class="form-control form-control-sm" placeholder="Search title or excerpt">
                                </form>

                                <a class="btn btn-sm btn-primary" href="{{route('articles.create')}}">Add</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:50px">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col" style="width:130px">Category</th>
                                    <th scope="col" style="width:120px">Status</th>
                                    <th scope="col" style="width:160px">Published At</th>
                                    <th scope="col" style="width:90px">Views</th>
                                    <th scope="col" style="width:160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($articles as $index => $article)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($article->featured_image)
                                                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="me-2" style="width:64px;height:48px;object-fit:cover;border-radius:6px;">
                                            @else
                                                <div class="me-2" style="width:64px;height:48px;background:#f1f5f9;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#94a3b8;font-size:12px;">No Image</div>
                                            @endif
                                            <div>
                                                <div class="fw-semibold">{{ \Illuminate\Support\Str::limit($article->title, 60) }}</div>
                                                <div class="text-muted" style="font-size:13px;">{{ \Illuminate\Support\Str::limit($article->excerpt ?? strip_tags($article->content), 80) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-capitalize">{{ $article->category }}</td>
                                    <td>
                                        @if($article->status === 'published')
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $article->published_at ? $article->published_at->format('d M Y H:i') : '-' }}
                                    </td>
                                    <td>{{ number_format($article->views) }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No articles found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>

                        {{-- Jika menggunakan pagination, aktifkan ini --}}
                        @if(method_exists($articles, 'links'))
                        <div class="mt-3">
                            {{ $articles->links() }}
                        </div>
                        @endif

                    </div>
                </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.components.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/admin/js/main.js')}}"></script>

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
