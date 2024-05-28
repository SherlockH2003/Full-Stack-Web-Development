<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-mhs"])) {
    if (!empty($_POST['mhs-hapus'])) {
        $npm = mysqli_real_escape_string($conn, $_POST['mhs-hapus']);
        $deleteForeignKey = mysqli_query($conn, "DELETE FROM krs WHERE mahasiswa_npm='$npm'");
        if ($deleteForeignKey){
            $hapus = mysqli_query($conn, "DELETE FROM mahasiswa WHERE NPM='$npm'");
            if($hapus){
                $alert_message = "<div class='alert alert-success' role='alert'>Data Mahasiswa Berhasil Dihapus</div>";
            }else{
                $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Dihapus</div>";
            }
        } else{
            $hapus = mysqli_query($conn, "DELETE FROM mahasiswa WHERE NPM='$npm'");
            if($hapus){
                $alert_message = "<div class='alert alert-success' role='alert'>Data Mahasiswa Berhasil Dihapus</div>";
            }else{
                $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Dihapus. Coba lagi atau hubungi pengembang kami.</div>";
            }
        }
    } else {
        $alert_message = "<div class='alert alert-warning' role='alert'>Uh Oh! Lengkapi dulu data kamu</div>";
    }

}else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-mk"])) {
    if (!empty($_POST['mk-hapus'])) {
        $kodemk = mysqli_real_escape_string($conn, $_POST['mk-hapus']);
        $deleteForeignKey = mysqli_query($conn, "DELETE FROM krs WHERE matakuliah_kodemk ='$kodemk'");
        if ($deleteForeignKey){
            $hapus = mysqli_query($conn, "DELETE FROM matakuliah WHERE kodemk ='$kodemk'");
            if($hapus){
                $alert_message = "<div class='alert alert-success' role='alert'>Data Mata Kuliah Berhasil Dihapus</div>";
            }else{
                $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Dihapus</div>";
            }
        } else{
            $hapus = mysqli_query($conn, "DELETE FROM matakuliah WHERE matakuliah_kodemk ='$kodemk'");
            if($hapus){
                $alert_message = "<div class='alert alert-success' role='alert'>Data Mahasiswa Berhasil Dihapus</div>";
            }else{
                $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Dihapus. Coba lagi atau hubungi pengembang kami.</div>";
            }
        }
    } else {
        $alert_message = "<div class='alert alert-warning' role='alert'>Uh Oh! Lengkapi dulu data kamu</div>";
    }

}else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-krs"])) {
    if (!empty($_POST['krs-hapus'])) {
        $id = mysqli_real_escape_string($conn, $_POST['krs-hapus']);
        $hapus = mysqli_query($conn, "DELETE FROM krs WHERE id ='$id'");
        if($hapus){
            $alert_message = "<div class='alert alert-success' role='alert'>Data KRS Berhasil Dihapus</div>";
        }else{
            $alert_message = "<div class='alert alert-danger' role='alert'>Yahh, Data Gagal Dihapus</div>";
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
                <h4 style="font-weight:bold; color:red;">HAPUS DATA</h4>
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

            <div id="del-mhs" class="mhs">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-mhs" action="" method="post" style="max-width:50%;">
                        <div class="row mb-3">
                        <label for="mhs-hapus" class="form-mhs2" name=>Masukkan Data Mahasiswa</label>
                            <select name="mhs-hapus" id="mhs-hapus">
                                <option value="" selected>- Pilih Data -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT NPM, Nama FROM mahasiswa");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["NPM"] . "'>" . $row["NPM"] . " - " . $row["Nama"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <button type="submit" name="submit-mhs" class="btn btn-danger mt-4" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Permanen</button>
                    </form>              
                </div>
            </div>

            <div id="del-krs" class="krs d-none">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-krs" action="" method="post" style="max-width:50%;">
                        <div class="row mb-3">
                        <label for="krs-hapus" class="form-kr2" name=>Masukkan Nomor KRS</label>
                            <select name="krs-hapus" id="krs-hapus">
                                <option value="" selected>- Pilih Data -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM krs JOIN mahasiswa ON mahasiswa.NPM = mahasiswa_npm");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["id"] . " - " . $row["mahasiswa_npm"] . " - " . $row["Nama"] . "</option>";
                                    }   
                                ?>
                            </select>
                        </div>
                        
                        <button type="submit" name="submit-krs" class="btn btn-danger mt-4" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Permanen</button>
                    </form>              
                </div>
            </div>

            <div id="del-mk" class="mk d-none">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="col" id="form-krs" action="" method="post" style="max-width:50%;">
                        <div class="row mb-3">
                            <label for="mk-hapus" class="form-kr2" name=>Masukkan Nomor Mata Kuliah</label>
                            <select name="mk-hapus" id="mk-hapus">
                                <option value="" selected>- Pilih Data -</option>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM matakuliah");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row["kodemk"] . "'>" . $row["kodemk"] . " - " . $row["nama"] . " - (" . $row["jumlah_sks"] . " SKS)</option>";
                                    }   
                                ?>
                            </select>
                        </div>

                        <button type="submit" name="submit-mk" class="btn btn-danger mt-4" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Permanen</button>
                    </form>              
                </div>
            </div>


            
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.getElementById('mhs-btn').addEventListener('click', function() {
        document.getElementById('del-mhs').classList.remove('d-none');
        document.getElementById('del-mk').classList.add('d-none');
        document.getElementById('del-krs').classList.add('d-none');
    });

    document.getElementById('mk-btn').addEventListener('click', function() {
        document.getElementById('del-mk').classList.remove('d-none');
        document.getElementById('del-mhs').classList.add('d-none');
        document.getElementById('del-krs').classList.add('d-none');
    });

    document.getElementById('krs-btn').addEventListener('click', function() {
        document.getElementById('del-krs').classList.remove('d-none');
        document.getElementById('del-mk').classList.add('d-none');
        document.getElementById('del-mhs').classList.add('d-none');
    });
</script>

</body>
</html>
