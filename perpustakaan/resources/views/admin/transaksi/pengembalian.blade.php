<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Pengembalian</title>

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
                            <h1 class="m-0">Pengembalian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard-admin">Home</a></li>
                                <li class="breadcrumb-item active">Transaksi</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.content-header -->
                            <div class="card">
                                <div class="card-header" style="background-color: steelblue; color: white;">
                                    <h3 class="card-title">Pengembalian</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background-color: steelblue; color: white; text-align: center;">
                                                <th>No</th>
                                                <th>Kode Peminjaman</th>
                                                <th>Nama Buku</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Petugas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        @foreach($pengembalian as $p => $item)
                                        <tbody>
                                            <tr>
                                                <td>{{ $p+1 }}</td>
                                                <td>{{ $item->kode_peminjaman }}</td>
                                                <td>{{ $item->nama_buku }}</td>
                                                <td>{{ $item->nama_peminjam }}</td>
                                                <td>{{ $item->tgl_pinjam }}</td>
                                                <td>{{ $item->tgl_kembali }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td class="project-actions text-center">
                                                    <a class="btn btn-info btn-sm"
                                                        href="admin-kembali-edit/{{ $item->peminjaman_id }}"
                                                        aria-hidden="true">
                                                        <i class="fas fa-hand-point-right">
                                                        </i>
                                                        Kembali
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.card-body -->
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