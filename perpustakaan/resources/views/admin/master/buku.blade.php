<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Master-Buku</title>

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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.content-header -->
                            <div class="card">
                                <div class="card-header" style="background-color: steelblue; color: white;">
                                    <h3 class="card-title">Data Buku</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr style="background-color: steelblue; color: white; text-align: center;">
                                                <th>No</th>
                                                <th>Kode Buku</th>
                                                <th>Nama Buku</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        @foreach($buku as $b => $item)
                                        <tbody>
                                            <tr>
                                                <td>{{ $b+1 }}</td>
                                                <td>{{ $item->kode_buku }}</td>
                                                <td>{{ $item->nama_buku }}</td>
                                                <td>{{ $item->penulis }}</td>
                                                <td>{{ $item->penerbit }}</td>
                                                <td>{{ $item->nama_kategori }}</td>
                                                <td class="project-actions text-center">
                                                    <a class="btn btn-info btn-sm"
                                                        href="/admin-buku-edit/{{ $item->buku_id }}" aria-hidden="true">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="/admin-buku-delete/{{ $item->buku_id }}"
                                                        aria-hidden="true">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <div class="card-footer" style="text-align: right;">
                                        <a class="btn btn-primary" href="{{ route('addbuku') }}" aria-hidden="true">
                                            <i class="fas fa-folder">
                                            </i>
                                            Add
                                        </a>
                                    </div>
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