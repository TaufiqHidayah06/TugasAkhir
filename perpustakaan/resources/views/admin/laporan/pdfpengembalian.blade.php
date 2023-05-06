<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengembalian</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Laporan Pengembalian</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" border="1">
                <thead>
                    <tr style="background-color: steelblue; color: white; text-align: center;">
                        <th>No</th>
                        <th>Kode Peminjaman</th>
                        <th>Nama Buku</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Petugas</th>
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
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</body>

</html><!-- /.content-header -->