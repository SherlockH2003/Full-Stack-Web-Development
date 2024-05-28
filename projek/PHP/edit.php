<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-mhs"])) {
    if (!empty($_POST['mhs-edit']) && !empty($_POST['mhs-nama']) && !empty($_POST['mhs-prodi']) && !empty($_POST['mhs-alamat'])) {
        $npm = mysqli_real_escape_string($conn,$_POST['mhs-edit']);
        $nama_baru = mysqli_real_escape_string($conn, $_POST['mhs-nama']);
        $alamat_baru = mysqli_real_escape_string($conn, $_POST['mhs-alamat']);
        $prodi_baru = mysqli_real_escape_string($conn, $_POST['mhs-prodi']);
        $mhs_edit = mysqli_query($conn,"UPDATE mahasiswa SET Nama='$nama_baru', Jurusan='$prodi_baru', Alamat='$alamat_baru' WHERE NPM='$npm' ");
        if($mhs_edit){
            $alert_message = "<div class='alert alert-success' role='alert'>Data Mahasiswa Berhasil Diperbarui</div>";
        }else{
            $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Diubah</div>";
        }
    }else{
        $alert_message = "<div class='alert alert-warning' role='alert'>Uh Oh! Lengkapi dulu data kamu</div>";
    }

}else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-krs"])) {
    if (!empty($_POST['krs-edit']) && !empty($_POST['krs-npm']) && !empty($_POST['krs-kodemk'])) {
        $id = mysqli_real_escape_string($conn,$_POST['krs-edit']);
        $mhs_baru = mysqli_real_escape_string($conn, $_POST['krs-npm']);
        $matkul_baru = mysqli_real_escape_string($conn, $_POST['krs-kodemk']);
        $krs_edit = mysqli_query($conn,"UPDATE krs SET mahasiswa_npm ='$mhs_baru', matakuliah_kodemk ='$matkul_baru' WHERE id='$id' ");
        if($krs_edit){
            $alert_message = "<div class='alert alert-success' role='alert'>Data KRS Berhasil Diperbarui</div>";
        }else{
            $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Diubah</div>";
        }
    }else{
        $alert_message = "<div class='alert alert-warning' role='alert'>Uh Oh! Lengkapi dulu data kamu</div>";
    }

}else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-mk"])) {
    if (!empty($_POST['mk-edit']) && !empty($_POST['mk-nama']) && $_POST['mk-sks'] > 0) {
        $kodemk = mysqli_real_escape_string($conn,$_POST['mk-edit']);
        $matkul_nama = mysqli_real_escape_string($conn, $_POST['mk-nama']);
        $sks_baru = mysqli_real_escape_string($conn, $_POST['mk-sks']);
        $matkul_edit = mysqli_query($conn,"UPDATE matakuliah SET nama ='$matkul_nama', jumlah_sks ='$sks_baru' WHERE kodemk='$kodemk' ");
        if($matkul_edit){
            $alert_message = "<div class='alert alert-success' role='alert'>Data Mata Kuliah Berhasil Diperbarui</div>";
        }else{
            $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Diubah</div>";
        }
    }else{
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
        body{
            background-image: url("../bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        h1{
            font-size: 35px;
            font-weight: bold;
            text-align: center;
            text-shadow: 3px 3px 4px black;
            position:relative;
            top : 60px;
            color: white;
        }

        .card{
            position:absolute;
            margin-top: 100px;
            width: 50%;
        }

        .card-body{
            height: 50%
        }

        .logo{
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
                <h4 style="font-weight:bold; color:dodgerblue">UBAH DATA</h4>
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

            <div id="edit-mhs" class="mhs">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-mhs" action="" method="post" style="max-width:60%;">
                        <div class="row mb-3">
                            <label for="mhs-edit" class="form-mhs2">Pilih mahasiswa yang akan diubah</label>
                            <select class="mx-auto" name="mhs-edit" id="mhs-edit">
                                <option value="" selected>- Pilih Data Mahasiswa -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT NPM, Nama FROM mahasiswa");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["NPM"] . "'>" . $row["NPM"] . " - " . $row["Nama"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="row mb-3" >
                            <label for="nama-mhs" class="form-label">Masukkan nama yang diubah</label>
                            <input type="text" class="form-control" id="mhs-nama" name="mhs-nama" placeholder="(mis : Farhan Abyan Putra Karim)">
                        </div>

                        <div class="row mb-3" >
                            <label for="prodi-mhs" class="form-label">Masukkan program studi yang diubah</label>
                            <select name="mhs-prodi" id="mhs-prodi">
                                <option value="">- Pilih Program Studi -</option>
                                <option value="Teknik Informatika">- Teknik Informatika / Informatika -</option>
                                <option value="Sistem Informasi">- Sistem Informasi -</option>
                            </select>
                        </div>

                        <div class="row mb-3" >
                            <label for="alamat-mhs" class="form-label">Masukkan kota domisili yang diubah</label>
                            <input type="text" class="form-control" id="mhs-alamat" name="mhs-alamat" placeholder="(mis : DK Jakarta)">
                        </div>
                        
                        <button type="submit" name="submit-mhs" class="btn btn-primary mt-4" onclick="return confirm('Apakah Anda yakin ingin mengubah data?')">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
            
            <div id="edit-krs" class="krs d-none">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-krs" action="" method="post" style="max-width:60%;">
                        <div class="row mb-3">
                            <label for="krs-edit" class="form-krs2" >Pilih Kartu Rencana Studi yang akan diubah</label>
                            <select class="mx-auto" name="krs-edit" id="krs-edit">
                                <option value="" selected>- Pilih Data KRS -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM krs JOIN mahasiswa ON mahasiswa.NPM = mahasiswa_npm JOIN matakuliah ON matakuliah.kodemk = matakuliah_kodemk ORDER BY id");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["id"] . " - " . $row["mahasiswa_npm"] . " - " . $row["Nama"] . " = mengambil "  . $row["nama"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="row mb-3" >
                            <label for="npm-krs" class="form-label">Masukkan data mahasiswa yang diubah</label>
                            <select class="mx-auto" name="krs-npm" id="krs-npm">
                                <option value="" selected>- Pilih Data Mahasiswa -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT NPM, Nama FROM mahasiswa");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["NPM"] . "'>" . $row["NPM"] . " - " . $row["Nama"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="row mb-3" >
                            <label for="kodemk-krs" class="form-label">Masukkan data mata kuliah yang diubah</label>
                            <select class="mx-auto" name="krs-kodemk" id="krs-kodemk">
                                <option value="" selected>- Pilih Data Mata Kuliah -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT kodemk, nama FROM matakuliah");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["kodemk"] . "'>" . $row["kodemk"] . " - " . $row["nama"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <button type="submit" name="submit-krs" class="btn btn-primary mt-4" onclick="return confirm('Apakah Anda yakin ingin mengubah data?')">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

            <div id="edit-mk" class="mk d-none">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-mk" action="" method="post" style="max-width:60%;">
                        <div class="row mb-3">
                            <label for="mk-edit" class="form-mhs2">Pilih mata kuliah yang akan diubah</label>
                            <select class="mx-auto" name="mk-edit" id="mk-edit">
                                <option value="" selected>- Pilih Data Mata Kuliah -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM matakuliah");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["kodemk"] . "'>" . $row["kodemk"] . " - " . $row["nama"] . " (" . $row["jumlah_sks"] . " SKS)</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="row mb-3" >
                            <label for="nama-mk" class="form-label">Masukkan Nama Mata Kuliah yang Diubah</label>
                            <input type="text" class="form-control" id="mk-nama" name="mk-nama" placeholder="(mis : Pemrograman Berbasis Web)">
                        </div>

                        <div class="row mb-3" >
                            <label for="sks-mk" class="form-label">Masukkan Jumlah SKS yang diubah</label>
                            <input type="number" class="form-control" id="mk-sks" name="mk-sks" placeholder="(mis : 3)">
                        </div>
                        
                        <button type="submit" name="submit-mk" class="btn btn-primary mt-4" onclick="return confirm('Apakah Anda yakin ingin mengubah data?')">Simpan Perubahan</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.getElementById('mhs-btn').addEventListener('click', function() {
        document.getElementById('edit-mhs').classList.remove('d-none');
        document.getElementById('edit-mk').classList.add('d-none');
        document.getElementById('edit-krs').classList.add('d-none');
    });

    document.getElementById('mk-btn').addEventListener('click', function() {
        document.getElementById('edit-mk').classList.remove('d-none');
        document.getElementById('edit-mhs').classList.add('d-none');
        document.getElementById('edit-krs').classList.add('d-none');
    });

    document.getElementById('krs-btn').addEventListener('click', function() {
        document.getElementById('edit-krs').classList.remove('d-none');
        document.getElementById('edit-mk').classList.add('d-none');
        document.getElementById('edit-mhs').classList.add('d-none');
    });
</script>

</body>
</html>