<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{ 
    public function tambah()
    {
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|max:20|confirmed'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 'admin';
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->password = Hash::make($request->password);

        $user->save();

        if ($user) {
            return back()->with('success', 'Admin baru berhasil ditambah!');
        } else {
            return back()->with('failed', 'Gagal menambah admin baru!');
        }
    }

    public function editAdmin($id)
    {
        $data = User::find($id);

        return view('admin.edit', compact('data'));
    }

    public function postEditAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin;

        $user->save();

        if ($user) {
            return back()->with('success', 'Data admin berhasil di update!');
        } else {
            return back()->with('failed', 'Gagal mengupdate data admin!');
        }
    }

    public function deleteAdmin($id)
    {
        $data = User::find($id);

        $data->delete();

        if ($data) {
            return back()->with('success', 'Data berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data!');
        }
    }

    public function adminBuku(Request $request)
    {
        $search = $request->input('search');
        $data = Buku::where(function ($query) use ($search) {
            $query->where('judul_buku', 'LIKE', '%' . $search . '%');
        })->paginate(5);
        return view('admin.buku', compact('data'));
    }
    public function tambahBuku()
    {
        return view('admin.tambahBuku');
    }

    public function postTambahBuku(Request $request)
    {
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'required|image|max:5120',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);
        $bukus = new Buku;
        $bukus->kode_buku = $request->kodeBuku;
        $bukus->judul_buku = $request->judulBuku;
        $bukus->penulis = $request->penulis;
        $bukus->penerbit = $request->penerbit;
        $bukus->tahun_terbit = $request->tahunTerbit;
        $bukus->deskripsi = $request->deskripsi;
        $bukus->kategori = $request->kategori;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $bukus->gambar = $filename;
        }
        $bukus->save();
        if ($bukus) {
            return back()->with('success', 'Buku baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }
    public function editBuku($id)
    {
        $data = Buku::find($id);
        $kategori = ["Programmer", "Sains", "Komik"];
        return view('admin.editBuku', ['data' => $data, 'kategori' => $kategori]);
    }
    public function postEditBuku(Request $request, $id)
    {
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required',
            'gambar' => 'image|max:5120',
            'deskripsi' => 'required',
            'kategori' => 'required'
        ]);
        $bukus = Buku::find($id);
        $bukus->kode_buku = $request->kodeBuku;
        $bukus->judul_buku = $request->judulBuku;
        $bukus->penulis = $request->penulis;
        $bukus->penerbit = $request->penerbit;
        $bukus->tahun_terbit = $request->tahunTerbit;
        $bukus->deskripsi = $request->deskripsi;
        $bukus->kategori = $request->kategori;
        if ($request->hasFile('gambar')) {
            $filepath = 'images/' . $bukus->gambar;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/', $filename);
            $bukus->gambar = $filename;
        }
        $bukus->save();
        if ($bukus) {
            return back()->with('success', 'Buku berhasil diupdate!');
        } else {
            return back()->with('failed', 'Buku gagal diupdate!');
        }
    }
    public function deleteBuku($id)
    {
        $bukus = Buku::find($id);
        $filepath = 'images/' . $bukus->gambar;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }
        $bukus->delete();
        if ($bukus) {
            return back()->with('success', 'Data buku berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data buku!');
        }
    }

    public function adminPeminjaman(Request $request) {

        $search = $request->input('search'); 
        
        $data = Peminjaman::where(function($query) use ($search) { 
            $query->where('id_user', 'LIKE', '%' .$search. '%');
        })->paginate(5); 
        
        return view('admin.peminjaman', compact('data')); 
    } 


    public function tambahPeminjaman() { 
        return view('admin.tambahPeminjaman'); 
    } 
    
    public function postTambahPeminjaman(Request $request) { 
        $request->validate([ 
            'idUser' => 'required', 
            'kodeBuku' => 'required|int', 
            'tanggalPeminjaman' => 'required|date', 
            'tanggalPengembalian' => 'required|date'
        ]); 
        
        $peminjaman = new Peminjaman; 
        
        $peminjaman->id_user = $request->idUser; 
        $peminjaman->id_buku = $request->kodeBuku; 
        $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman; 
        $peminjaman->tanggal_kembali = $request->tanggalPengembalian; 
        $peminjaman->status = 'Belum Dikembalikan'; 
        
        $peminjaman->save(); 
        
        if($peminjaman) { 
            return back()->with('success', 'Data peminjaman berhasil ditambahkan!'); 
        } else { 
            return back()->with('failed', 'Gagal menambahkan data peminjaman!'); 
        } 
    } 
    
    public function editPeminjaman($id) { 
        $data = Peminjaman::find($id); 
        
        return view('admin/editPeminjaman', compact('data')); 
    } 
    
    public function postEditPeminjaman(Request $request, $id) { 
        $request->validate([ 
            'idUser' => 'required', 
            'kodeBuku' => 'required|int', 
            'tanggalPeminjaman' => 'required', 
            'tanggalPengembalian' => 'required',
            'status' => 'required' 
        ]); 
        $peminjaman = Peminjaman::find($id); 
        
        $peminjaman->id_user = $request->idUser; 
        $peminjaman->id_buku = $request->kodeBuku; 
        $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman; 
        $peminjaman->tanggal_kembali = $request->tanggalPengembalian; 
        $peminjaman->status = $request->status;

        $peminjaman->save(); 
        
        if($peminjaman){ 
            return back()->with('success', 'Data peminjaman berhasil di update!');
        } else { 
            return back()->with('failed', 'Gagal mengupdate data peminjaman!'); 
        } 
    } 
    
    public function deletePeminjaman($id) { 
        $data = Peminjaman::find($id); 
        
        $data->delete(); 
        
        if($data) { 
            return back()->with('success', 'Data peminjaman berhasil di hapus!'); 
        } else { 
            return back()->with('failed', 'Gagal menghapus data peminjaman!'); 
        } 
    }
    public function detailPeminjaman($id_peminjaman, $id_user, $id_buku) { 
        $detailPeminjaman = Peminjaman::select('peminjaman.*', 'buku.*', 'users.*')
        ->join('buku', 'peminjaman.id_buku', '=', 'buku.id') 
        ->join('users', 'peminjaman.id_user', '=', 'users.id') 
        ->where('peminjaman.id', $id_peminjaman) 
        ->where('buku.id', $id_buku) 
        ->where('users.id', $id_user) 
        ->first(); 
        
        if(!$detailPeminjaman) { 
            abort(404, 'Data tidak ditemukan');
        } 
        
        return view('admin.detailPeminjaman', 
        compact('detailPeminjaman'));
    }

}
