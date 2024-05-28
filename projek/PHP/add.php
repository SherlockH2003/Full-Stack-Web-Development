<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-mhs"])) {
    if (!empty($_POST['npm']) && !empty($_POST['nama-mhs']) && !empty($_POST['prodi']) && !empty($_POST['alamat'])) {
        $npm = mysqli_real_escape_string($conn, $_POST['npm']);
        $nama_mhs = mysqli_real_escape_string($conn, $_POST['nama-mhs']);
        $prodi = mysqli_real_escape_string($conn, $_POST['prodi']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

        $tambah = mysqli_query($conn, "INSERT INTO mahasiswa (NPM, Nama, Jurusan, Alamat) VALUES ('$npm', '$nama_mhs', '$prodi', '$alamat')");

        if ($tambah) {
            $alert_message = "<div class='alert alert-success' role='alert'>Data Mahasiswa Berhasil Ditambahkan</div>";
        } else {
            $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Ditambahkan</div>";
        }
    } else {
        $alert_message = "<div class='alert alert-warning' role='alert'>Uh Oh! Lengkapi dulu data kamu</div>";
    }
}else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-mk"])){
    if (!empty($_POST['kodemk']) && !empty($_POST['nama-mk']) && $_POST["sks"] > 0) {
        $kodemk = mysqli_real_escape_string($conn, $_POST['kodemk']);
        $nama_mk = mysqli_real_escape_string($conn, $_POST['nama-mk']);
        $sks = mysqli_real_escape_string($conn, $_POST['sks']);

        $tambah_mk = mysqli_query($conn, "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama_mk', '$sks')");

        if ($tambah_mk) {
            $alert_message = "<div class='alert alert-success' role='alert'>Data Mata Kuliah Berhasil Ditambahkan</div>";
        } else {
            $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Ditambahkan</div>";
        }
    } else {
        $alert_message = "<div class='alert alert-warning' role='alert'>Uh Oh! Periksa kembali data kamu</div>";
    }
}else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-krs"])){
    if (!empty($_POST['id-krs']) && !empty($_POST['mhs_dipilih']) && !empty($_POST['mk_dipilih'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id-krs']);
        $mhs_dipilih = mysqli_real_escape_string($conn, $_POST['mhs_dipilih']);
        $mk_dipilih = mysqli_real_escape_string($conn, $_POST['mk_dipilih']);

        $tambah_krs = mysqli_query($conn, "INSERT INTO krs (id, mahasiswa_npm, matakuliah_kodemk) VALUES ('$id', '$mhs_dipilih', '$mk_dipilih')");

        if ($tambah_krs) {
            $alert_message = "<div class='alert alert-success' role='alert'>Data Mata Kuliah Berhasil Ditambahkan</div>";
        } else {
            $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Ditambahkan</div>";
        }
    } else {
        $alert_message = "<div class='alert alert-warning' role='alert'>Uh Oh! Lengkapi dulu data kamu</div>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAMAN INPUT DATA - SIAFA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url("../bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        h1 {
            font-size: 35px;
            font-weight: bold;
            text-align: center;
            text-shadow: 3px 3px 4px black;
            position:relative;
            top : 60px;
            color: white;
        }
        .card {
            position:absolute;
            margin-top: 100px;
            width: 50%;
        }
        .card-body {
            height: 50%
        }
        .logo {
            max-width: 50px;
            max-height: 50px;
        }
    </style>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid mt-2 mb-2">
        <div class="collapse navbar-collapse" id="navbarNav">
            <a href="index.php" style="text-decoration:none; color:inherit;">
                <img src="../logo.webp" alt="logo tut wuri handayani" class="logo me-2" href="index.php"> <strong>Sistem Informasi Akademik</strong>
            </a>
        </div>
    </div>
    </nav>

    <!-- WELCOME TEXT -->
    <div class="container-fluid">
        <h1> Selamat Datang di Sistem Informasi Akademik Farhan AL <br> (SIAFA)</h1>
    </div>

    <div class="d-flex justify-content-center" style="height: 400px;">
        <div class="card text-center">
            <div class="card-header">
                <h4 style="font-weight:bold;">CRUD DATABASE</h4>
                <h4 style="font-weight:bold; color:green;">INPUT DATA</h4>
                <div class="btn-group" >
                    <label class="btn btn-dark" id="mhs-btn">
                        <input type="radio" name="options" autocomplete="off" checked> Mahasiswa
                    </label>

                    <label class="btn btn-dark" id="krs-btn">
                        <input type="radio" name="options" autocomplete="off"> KRS
                    </label>

                    <label class="btn btn-dark" id="mk-btn">
                        <input type="radio" name="options" autocomplete="off"> Mata Kuliah
                    </label>
                </div>
                
                <div class="mt-2 mb-2">
                    <a href="add.php" type="button" class="ms-3 me-3 btn btn-success"><strong>Tambah Data</strong></a>
                    <a href="edit.php" type="button" class="me-3 btn btn-primary"><strong>Ubah Data</strong></a>
                    <a href="delete.php" type="button" class="me-3 btn btn-danger"><strong>Hapus Data</strong></a>
                </div>
            </div> 

            <?php if(isset($alert_message)) echo $alert_message; ?>

            <div id="add-mhs" class="mhs">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-mhs" action="" method="post" style="max-width:50%;">
                        <div class="row mb-3">
                            <label for="npm" class="form-label">Masukkan Nomor Pokok Mahasiswa</label>
                            <input type="text" class="form-control" id="mhs-npm" name="npm" placeholder="(mis : 2010631250XXX)">
                        </div>

                        <div class="row mb-3">
                            <label for="nama-mhs" class="form-label">Masukkan Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="mhs-nama" name="nama-mhs" placeholder="(mis : Farhan Abyan Putra Karim)">
                        </div>

                        <div class="row mb-3">
                            <label for="prodi" class="form-label">Masukkan Program Studi</label>
                            <select name="prodi" id="prodi">
                                <option value="" selected>- Pilih Jurusan -</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Teknik Informatika">Teknik Informatika / Informatika</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="form-label">Masukkan Alamat Domisili</label>
                            <input type="text" class="form-control" id="mhs-alamat" name="alamat" placeholder="(mis : Bekasi)">
                        </div>

                        <button type="submit" name="submit-mhs" class="btn btn-primary mt-4">Tambahkan Perubahan</button>
                    </form>              
                </div>
            </div>

            <div id="add-mk" class="mk d-none">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-mk" action="" method="post" style="max-width:50%;">
                        <div class="row mb-3">
                            <label for="kodemk" class="form-label">Masukkan Kode Mata Kuliah</label>
                            <input type="text" class="form-control" id="mhs-npm" name="kodemk" placeholder="(mis : SIS00XX)">
                        </div>

                        <div class="row mb-3">
                            <label for="nama-mk" class="form-label">Masukkan Nama Mata Kelas</label>
                            <input type="text" class="form-control" id="mhs-nama" name="nama-mk" placeholder="(mis : Pemrograman Berbasis Web)">
                        </div>

                        <div class="row mb-3">
                            <label for="sks" class="form-label">Jumlah SKS</label>
                            <input type="number" class="form-control" id="mhs-nama" name="sks" placeholder="(mis : 1)">
                            <div class="invalid-feedback" id="kodeError" style="display: none;">Jumlah yang dimasukkan salah!</div>
                        </div>

                        <button type="submit" name="submit-mk" class="btn btn-primary mt-4">Tambahkan Perubahan</button>
                    </form>              
                </div>
            </div>

            <div id="add-krs" class="krs d-none">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-krs" action="" method="post" style="max-width:50%;">
                        <div class="row mb-3">
                            <label for="id-krs" class="form-label">Masukkan ID KRS</label>
                            <input type="text" class="form-control" id="id-krs" name="id-krs" placeholder="(mis : 12)">
                        </div>

                        <div class="row mb-3">
                            <label for="mhs_dipilih" class="form-mhs2">Masukkan Nama Mahasiswa</label>
                            <select name="mhs_dipilih" id="mhs_dipilih">
                                <option value="" selected>- Pilih Mahasiswa -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT NPM, Nama FROM mahasiswa");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["NPM"] . "'>" . $row["NPM"] . " - " . $row["Nama"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="mk_dipilih" class="form-mk2">Masukkan Mata Kuliah Pilihan</label>
                            <select name="mk_dipilih" id="mk_dipilih">
                                <option value="" selected>- Pilih Mata Kuliah -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT kodemk, nama, jumlah_sks FROM matakuliah");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["kodemk"] . "'>" . $row["kodemk"] . " - " . $row["nama"] . " - " . $row["jumlah_sks"] . " SKS </option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <button type="submit" name="submit-krs" class="btn btn-primary mt-4">Tambahkan Perubahan</button>
                    </form>              
                </div>
            </div>

            
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.getElementById('mhs-btn').addEventListener('click', function() {
        document.getElementById('add-mhs').classList.remove('d-none');
        document.getElementById('add-mk').classList.add('d-none');
        document.getElementById('add-krs').classList.add('d-none');
    });

    document.getElementById('mk-btn').addEventListener('click', function() {
        document.getElementById('add-mk').classList.remove('d-none');
        document.getElementById('add-mhs').classList.add('d-none');
        document.getElementById('add-krs').classList.add('d-none');
    });

    document.getElementById('krs-btn').addEventListener('click', function() {
        document.getElementById('add-krs').classList.remove('d-none');
        document.getElementById('add-mk').classList.add('d-none');
        document.getElementById('add-mhs').classList.add('d-none');
    });
</script>

</body>
</html>
