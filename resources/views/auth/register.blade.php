<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <a href="/">
            <i class="bi-arrow-left h1"></i>
        </a>
    </div>

    <div class="container mt-3">
        @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Registrasi Gagal!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 60px">
        <div class="card" style="width: 35%">
            <div class="card-body p-4">
                <h3 class="card-title text-center">Register</h3>
                <form action="{{ route('postRegister') }}" method="POST">
                    @csrf
                    <div class="form-group mt-4">
                        <label class="text-secondary">Nama Anda</label>
                        <input type="text" class="form-control border border-secondary form-control-lg" name="name" required value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div><br>
                    <div class="form-group mt-1">
                        <label class="text-secondary">Email Anda</label>
                        <input type="email" class="form-control border border-secondary form-control-lg" name="email" required value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div><br>
                    <div class="form-group mt-1">
                        <label class="text-secondary">Pilih Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1" value="Laki-laki">
                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="Perempuan">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div><br>
                    <div class="form-group mt-1">
                        <label class="text-secondary">Password Anda</label>
                        <input type="password" class="form-control border border-secondary form-control-lg" name="password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div><br>
                    <div class="form-group mt-1">
                        <label class="text-secondary">Konfirmasi Password Anda</label>
                        <input type="password" class="form-control border border-secondary form-control-lg" name="password_confirmation">
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="form-control btn btn-primary mt-4">Register</button>
                </form>
                <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('auth.login') }}" style="text-decoration: none">Masuk</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>