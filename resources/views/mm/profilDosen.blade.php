<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile Dosen</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Profile Dosen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mm.profilKelulusanKSI')}}">Profil Lulusan KSI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mm.profilDosen')}}">Profil Dosen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <p class="container mt-3"> Profile Dosen </p>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 25rem;">
                    <div class="mt-3">
                        <img src="https://img.freepik.com/free-photo/handsome-businessman-white-shirt-holding-folders-looking-camera-with-confident-expression-standing-olive-background_141793-53963.jpg?w=900&t=st=1696413633~exp=1696414233~hmac=bcdc2005e02998d9211552df50e3f96b9bc8668f856e4db925e7b015248a500e" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">DANI</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Bergabung pada tahun 1996</li>
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
                        <img src="https://img.freepik.com/free-photo/pleased-young-businessman-wearing-glasses-holding-book-isolated-white-background_141793-63613.jpg?w=900&t=st=1696413663~exp=1696414263~hmac=d24d24cd63516e94c3393d5489ac21f54d29e42f452a53d43214a6e77948fb8e" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">AUL</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Bergabung pada tahun 2000</li>
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