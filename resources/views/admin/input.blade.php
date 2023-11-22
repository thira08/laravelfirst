<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Homepage</title>
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
    <h3 class= "mt-5">Form Input Berita</h3>
    <p class= "mt-4">Judul Berita</p>
    <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" aria-label="Text input with checkbox">
    </div>
    <p class= "mt-4">Isi Berita</p>
    <div class="input-group">
        <input type="text" class="form-control" aria-label="Text input with radio button">
    </div>
    <p class= "mt-4">Masukkan Foto</p>
    <div class="input-group mb-3 mt-4">
    <input type="file" class="form-control" id="inputGroupFile02">
    <label class="input-group-text" for="inputGroupFile02">Upload</label>
    </div>
    <button type="button" class="btn btn-primary btn-md mt-3">Simpan</button>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>