<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>

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
    @include('sweetalert::alert')
    <div class="wrapper">

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
                            <h1 class="m-0">Edit Data Mahasiswa</h1>
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
                                    <h3 class="card-title">Edit Data Mahasiswa</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                @foreach($register as $np)
                                <form action="{{ route('updateregister') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nim</label>
                                            <input name="id_np" type="hidden" class="form-control"
                                                id="exampleInputEmail1" value="{{ $np->id_np }}" readonly required>
                                            <input name="nim" type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $np->nim }}" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Nama</label>
                                            <input name="nama_peminjam" type="text" class="form-control"
                                                id="exampleInputPassword1" placeholder="Masukkan Nama Mahasiswa"
                                                value="{{ $np->nama_peminjam }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">alamat</label>
                                            <input name="alamat" type="text" class="form-control"
                                                id="exampleInputPassword1" value="{{ $np->alamat }}"
                                                placeholder="Masukkan Alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No Hp</label>
                                            <input name="no_hp" type="text" class="form-control"
                                                id="exampleInputPassword1" value="{{ $np->no_hp }}"
                                                placeholder="Masukkan Nomor HandPhone" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Fakultas</label>
                                            <select class="form-control select2bs4" name="fakultas"
                                                style="width: 100%;">
                                                <option value="Fasilkom">Fasilkom</option>
                                                <option value="Fekon">Fekon</option>
                                                <option value="Fakum">Fakum</option>
                                                <option value="Fanik">Fanik</option>
                                                <option value="Fadaya">Fadaya</option>
                                            </select>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <a class="btn btn-primary" href="{{ route('register') }}">Back</a>
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