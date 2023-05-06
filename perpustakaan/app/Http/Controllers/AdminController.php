<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Buku;
use App\Models\NamaPeminjam;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard() {
        $buku = DB::table('tb_buku')->join('tb_kategori', 'tb_kategori.kode_kategori', '=', 'tb_buku.kategori_kode')->get();
        $register = DB::table('tb_nama_peminjam')->get();
        $peminjaman = DB::table('tb_peminjaman')->join('tb_user','tb_user.nip' , '=','tb_peminjaman.nip')->join('tb_buku', 'tb_buku.kode_buku', '=', 'tb_peminjaman.buku_kode')->join('tb_nama_peminjam', 'tb_nama_peminjam.nim', '=', 'tb_peminjaman.nim')->where('status','Belum Kembali')->get();
        $pengembalian = DB::table('tb_peminjaman')->join('tb_user','tb_user.nip' , '=','tb_peminjaman.nip')->join('tb_buku', 'tb_buku.kode_buku', '=', 'tb_peminjaman.buku_kode')->join('tb_nama_peminjam', 'tb_nama_peminjam.nim', '=', 'tb_peminjaman.nim')->where('status','Sudah Kembali')->get();
        return view('admin/dashboard',['buku' => $buku,'register'=> $register,'peminjaman'=> $peminjaman, 'pengembalian'=> $pengembalian]);
    }
    
    // Transaksi Peminjaman 
    public function peminjaman() {
        $peminjaman = DB::table('tb_buku')->join('tb_kategori', 'tb_kategori.kode_kategori', '=', 'tb_buku.kategori_kode')->get();
        return view('admin/transaksi/peminjaman',['peminjaman' => $peminjaman]);
        
    }
    public function form_peminjaman($id) {
        // Ambil Data Buku
        $buku = DB::table('tb_buku')->join('tb_kategori', 'tb_kategori.kode_kategori', '=', 'tb_buku.kategori_kode')->where('buku_id',$id)->get();
        // Ambil Data Admin
        $nip = User::all();
        // Ambil Data Nama Mahasiswa 
        $nim = NamaPeminjam::all();
        // Buat Kode Automatis
        $kp = DB::table('tb_peminjaman')->select(DB::raw('MAX(RIGHT(peminjaman_id,4)) as kode'));
        $kd = "";
        if($kp->count()>0){
            foreach($kp->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        }else{
            $kd = "0001";
        }
        return view('admin/transaksi/form/peminjaman',['kd' => $kd,'buku' => $buku, 'nip'=>$nip,'nim'=>$nim]);
    }
    public function proses_peminjaman(Request $request) {
        $this->validate($request, [
            'kode_peminjaman' => 'required',
            'nip'=> 'required', 
            'buku_kode'=> 'required',
            'nim'=> 'required',
            'tgl_pinjam'=> 'required',
            'tgl_kembali'=> 'required',
            'status'=> 'required',
        ]);
        Peminjaman::create($request->all());
       
        return redirect('admin-peminjaman')->with('success','Buku created successfully.');        
    }

    // Transaksi Pengembalian
    public function pengembalian() {
        $pengembalian = DB::table('tb_peminjaman')->join('tb_user','tb_user.nip' , '=','tb_peminjaman.nip')->join('tb_buku', 'tb_buku.kode_buku', '=', 'tb_peminjaman.buku_kode')->join('tb_nama_peminjam', 'tb_nama_peminjam.nim', '=', 'tb_peminjaman.nim')->where('status','Belum Kembali')->get();
        return view('admin/transaksi/pengembalian',['pengembalian' => $pengembalian]);
    }
    public function edit_pengembalian($id) {
	    $pengembalian = DB::table('tb_peminjaman')->join('tb_user','tb_user.nip' , '=','tb_peminjaman.nip')->join('tb_buku', 'tb_buku.kode_buku', '=', 'tb_peminjaman.buku_kode')->join('tb_nama_peminjam', 'tb_nama_peminjam.nim', '=', 'tb_peminjaman.nim')->where('status','Belum Kembali')->where('peminjaman_id',$id)->get();
	    return view('admin/transaksi/form/edit_pengembalian',['pengembalian' => $pengembalian]);
    }
    public function update_pengembalian(Request $request){

	    DB::table('tb_peminjaman')->where('peminjaman_id',$request->peminjaman_id)->update([
            'status' => 'Sudah Kembali',
        ]);
	    return redirect('admin-pengembalian');
    }
    
    // Laporan
    public function laporan_peminjaman() {
        $peminjaman = DB::table('tb_peminjaman')->join('tb_user','tb_user.nip' , '=','tb_peminjaman.nip')->join('tb_buku', 'tb_buku.kode_buku', '=', 'tb_peminjaman.buku_kode')->join('tb_nama_peminjam', 'tb_nama_peminjam.nim', '=', 'tb_peminjaman.nim')->where('status','Belum Kembali')->get();
        return view('admin/laporan/peminjaman',['peminjaman' => $peminjaman]);
    }
    public function laporan_pengembalian() {
        $pengembalian = DB::table('tb_peminjaman')->join('tb_user','tb_user.nip' , '=','tb_peminjaman.nip')->join('tb_buku', 'tb_buku.kode_buku', '=', 'tb_peminjaman.buku_kode')->join('tb_nama_peminjam', 'tb_nama_peminjam.nim', '=', 'tb_peminjaman.nim')->where('status','Sudah Kembali')->get();
        return view('admin/laporan/pengembalian',['pengembalian' => $pengembalian]);
    }

    // Buku
    public function buku() {
        
        $buku = DB::table('tb_buku')->join('tb_kategori', 'tb_kategori.kode_kategori', '=', 'tb_buku.kategori_kode')->get();
        return view('admin/master/buku',['buku' => $buku]);
    }
    public function buku_add() {
        $select = Kategori::all();
        $buku = DB::table('tb_buku')->select(DB::raw('MAX(RIGHT(kode_buku,4)) as kode'));
        $kd = "";
        if($buku->count()>0){
            foreach($buku->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        }else{
            $kd = "0001";
        }
        return view('admin/master/form/buku', compact('buku','kd','select'));
    }
    public function buku_save(Request $request){
        $this->validate($request, [
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori_kode' => 'required'
        ]);
        buku::create($request->all());
       
        return redirect('/admin-buku')->with('success','Buku created successfully.');
    }
    public function buku_edit($id){
        $select = Kategori::all();
	    $buku = DB::table('tb_buku')->join('tb_kategori', 'tb_kategori.kode_kategori', '=', 'tb_buku.kategori_kode')->where('buku_id',$id)->get();
        return view('admin/master/edit/buku',['buku' => $buku],['select'=>$select]);
    }
    public function buku_update(Request $request){

	    DB::table('tb_buku')->where('buku_id',$request->buku_id)->update([
            'nama_buku' => $request->nama_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'kategori_kode' => $request->kategori_kode
        ]);
	    return redirect('/admin-buku');
    }
    public function buku_delete($id){

	    DB::table('tb_buku')->where('buku_id',$id)->delete();
		
	    return redirect('/admin-buku')->with('success','Buku Deleted successfully.');
    }

    // Kategori
    public function kategori() {
        
        $kategori2 = DB::table('tb_kategori')->get();
        return view('admin/master/kategori')->with('kategori', $kategori2);
        
    }
    public function kategori_add() {
        $kategori = DB::table('tb_kategori')->select(DB::raw('MAX(RIGHT(kode_kategori,4)) as kode'));
        $kd = "";
        if($kategori->count()>0){
            foreach($kategori->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        }else{
            $kd = "0001";
        }
        return view('admin/master/form/kategori', compact('kategori','kd'));
    }
    public function kategori_save(Request $request){
        $this->validate($request, [
            'kode_kategori' => 'required',
            'nama_kategori' => 'required'
        ]);

        kategori::create($request->all());
       
        return redirect('/admin-kategori')->with('success','Kategori created successfully.');
    }
    public function kategori_edit($id){

	    $kategori = DB::table('tb_kategori')->where('kategori_id',$id)->get();

	    return view('admin/master/edit/kategori',['kategori' => $kategori]);
        
    }
    public function kategori_update(Request $request){

	    DB::table('tb_kategori')->where('kategori_id',$request->kategori_id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
	    return redirect('/admin-kategori');
    }
    public function kategori_delete($id){

	    DB::table('tb_kategori')->where('kategori_id',$id)->delete();
		
	    return redirect('/admin-kategori')->with('success','Kategori Deleted successfully.');
    }
    
    // Register
    public function register() {
        
        $register = DB::table('tb_nama_peminjam')->get();
        return view('admin/master/registrasi')->with('register', $register);
        
    }
    public function register_add() {
        $registrasi = DB::table('tb_nama_peminjam')->select(DB::raw('MAX(RIGHT(id_np,4)) as kode'));
        $kd = "";
        if($registrasi->count()>0){
            foreach($registrasi->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        }else{
            $kd = "0001";
        }
        return view('admin/master/form/registrasi', compact('registrasi','kd'));
    }
    public function register_save(Request $request){
        $this->validate($request, [
            'nim' => 'required',
            'nama_peminjam' => 'required', 
            'no_hp' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required'
        ]);

        NamaPeminjam::create($request->all());
       
        return redirect('admin-register')->with('success','Register created successfully.');
    }
    public function register_edit($id){

	    $register = DB::table('tb_nama_peminjam')->where('id_np',$id)->get();

	    return view('admin/master/edit/registrasi',['register' => $register]);
        
    }
    public function register_update(Request $request){

	    DB::table('tb_nama_peminjam')->where('id_np',$request->id_np)->update([
            'nama_peminjam' => $request->nama_peminjam, 
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'fakultas' => $request->fakultas
        ]);
	    return redirect('/admin-register');
    }
    public function register_delete($id){

	    DB::table('tb_nama_peminjam')->where('id_np',$id)->delete();
		
	    return redirect('admin-register')->with('success','Register Deleted successfully.');
    }
}