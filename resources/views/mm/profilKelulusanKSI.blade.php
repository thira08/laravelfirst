<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile Kelulusan KSI</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Profile Kelulusan Prodi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mm.profilKelulusanKSI')}}">Profile Lulusan KSI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mm.profilDosen')}}">Profil Dosen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <p class="container mt-3"> Profile Lulusan KSI </p>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 25rem;">
                    <div class="mt-3">
                        <img src="https://img.freepik.com/free-photo/happy-male-student-with-diploma-making-ok-sign-white_114579-53821.jpg?w=900&t=st=1696413776~exp=1696414376~hmac=fa994eb6b3e9f026106ad12718e448bf24e72e244f0fc658e302c6920a79f1b6" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">KHOMAR</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lulus pada tahun 2021</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link"><button type="button" class="btn btn-secondary">Selengkapnya</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 25rem;">
                    <div class="mt-3">
                        <img src="https://img.freepik.com/free-photo/young-employee-holding-blue-folder-white-wall_144627-63373.jpg?w=900&t=st=1696413729~exp=1696414329~hmac=aaa1f76e5c8b9fef42b6d611acf2ff7d29b804d63b8cc9d07a4d031e1d0bb9cc" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">NUR AINA</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lulus pada tahun 2021</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link"><button type="button" class="btn btn-secondary">Selengkapnya</button></a>
                        </div>
                    </div>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>