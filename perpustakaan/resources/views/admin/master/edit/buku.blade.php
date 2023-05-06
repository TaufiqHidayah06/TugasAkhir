<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('img/icon.png')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('img/screen.png')}}" alt="AdminLTELogo">
        </div>

        <!-- Navbar -->
        @include('admin.partial.topnavbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.partial.sidenavbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Buku</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard-admin">Home</a></li>
                                <li class="breadcrumb-item active">Master</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Modal -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Buku</h3>
                                </div>
                                <!-- form start -->
                                @foreach($buku as $b)
                                <form action="{{ route('updatebuku') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input name="buku_id" type="hidden" class="form-control"
                                                id="exampleInputEmail1" value="{{ $b->buku_id }}" readonly required>
                                            <label for="exampleInputEmail1">Kode Buku</label>
                                            <input name="kode_buku" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ $b->kode_buku }}" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Judul Buku</label>
                                            <input name="nama_buku" type="text" class="form-control"
                                                id="exampleInputPassword1" placeholder="Masukkan Judul"
                                                value="{{ $b->nama_buku }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Penerbit Buku</label>
                                            <input name="penerbit" type="text" class="form-control"
                                                id="exampleInputPassword1" placeholder="Masukkan Penerbit Buku"
                                                value="{{ $b->penerbit }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Penulis Buku</label>
                                            <input name="penulis" type="text" class="form-control"
                                                id="exampleInputPassword1" placeholder="Masukkan Penulis Buku"
                                                value="{{ $b->penulis }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Buku</label>
                                            <select class="form-control select2bs4" name="kategori_kode"
                                                style="width: 100%;">
                                                @foreach ($select as $s)
                                                <option value="{{ $s->kode_kategori }}">
                                                    {{ $s->kode_kategori }} - {{ $s->nama_kategori }}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <a class="btn btn-primary" href="{{ route('buku') }}">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- /.content-wrapper -->
        @include('admin.partial.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>
@include('admin.partial.js_master')

</html>