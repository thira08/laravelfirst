<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Peminjaman</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="http://eprints.polbeng.ac.id/132/1.hassmallThumbnailVersion/POLBENG.png" width="50" height="50" class="me-3">Politeknik Negeri Bengkalis | D-IV Keamanan Sistem Informasi</a>
            <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('input') }}">Input Berita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('inputdosen') }}">Input Data Dosen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.buku') }}">Buku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.peminjaman') }}">Peminjaman</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </nav>
    <div class="container">
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h4 class="text-secondary">Selamat Datang {{ Auth::user()->name }}</h4>
                </div>
                <div class="container mt-3">
                    @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ Session::get('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif @if (Session::get('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> {{ Session::get('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>

                <div class="row mt-4">
                    <div class="col"></div>
                    <div class="col-6">
                        <form action="{{ route('admin.peminjaman') }}" method="GET"> @csrf <div class="input-group">
                                <input type="search" name="search" class="form-control rounded" placeholder="Cari ID Anggota" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary">search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row mt-5">
                    <div class="col"></div>
                    <div class="col-2"> <a class="btn btn-success" href="{{ route('admin.tambahPeminjaman') }}" style="text-decoration: none; margin-left: 30px">Tambah Data +</a> </div>
                </div>
                <table class="table" style="margin-top: 10px">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Tanggal Pengembalian</th>
                            <th scope="col">Status Peminjaman</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($data as $index => $peminjam)
                        <tr>
                            <td scope="row">{{ $index + $data->firstItem() }}</td>
                            <td>{{ $peminjam->id_user }}</td>
                            <td>{{ $peminjam->id_buku }}</td>
                            <td>{{ $peminjam->tanggal_pinjam }}</td>
                            <td>{{ $peminjam->tanggal_kembali }}</td>
                            <td> <span class="{{ $peminjam->status === 'Sudah Dikembalikan' ? 'fw-semibold text-success' : 'fw-semibold text-danger' }}">
                                    {{ $peminjam->status }} </span> </td>
                            <td> <a class="btn btn-outline-primary" href="/admin/detailPeminjaman/{{ $peminjam->id }}/{{ $peminjam->id_user }}/{{ $peminjam->id_buku }}">Detail</a>
                                <a class="btn btn-outline-warning" href="/admin/editPeminjaman/{{ $peminjam->id }}">Edit</a> <a class="btn btn-outline-danger" href="/admin/deletePeminjaman/{{ $peminjam->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><br> {{ $data->links() }}
            </div><br><br><br>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>