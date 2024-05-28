<?php
include("koneksi.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAFA - Sistem Informasi Akademik Farhan AL</title>
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
            width: 90%;
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
                <div class="btn-group" >
                    <label class="btn btn-dark" id="mhs-btn">
                        <input type="radio" name="options" autocomplete="off" checked> Mahasiswa
                    </label>

                    <label class="btn btn-dark" id="krs-btn">
                        <input type="radio" name="options" autocomplete="off" checked> KRS
                    </label>

                    <label class="btn btn-dark" id="mk-btn">
                        <input type="radio" name="options" autocomplete="off" checked> Mata Kuliah
                    </label>
                </div>

                <div class="btn-group">
                    <label class="ms-4 btn btn-dark" id="join-btn">
                        <input type="radio" name="options" autocomplete="off" checked> List Mahasiswa
                    </label>
                </div>

                <div class="mt-2 mb-2">
                    <a href="add.php" type="button" class="ms-3 me-3 btn btn-success"><strong>Tambah Data</strong></a>
                    <a href="edit.php" type="button" class="me-3 btn btn-primary"><strong>Ubah Data</strong></a>
                    <a href="delete.php" type="button" class="me-3 btn btn-danger"><strong>Hapus Data</strong></a>
                </div>
            </div> 

            
            <div class="card-body">
                <div id="mhs-tabel" class="mahasiswa d-none">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;    
                                $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
                
                                    while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>
                                                <td>" . $no++ . "</td>
                                                <td>" . $row["NPM"]. "</td>
                                                <td>" . $row["Nama"]. "</td>
                                                <td>" . $row["Jurusan"]. "</td>
                                                <td>" . $row["Alamat"]. "</td>
                                                </tr>";
                                    }
                            ?>
                        <tbody>
                    </table>
                </div>
            

                <div id="mk-tabel" class="matkul d-none">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Jumlah Satuan Kredit Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;    
                                $result = mysqli_query($conn, "SELECT * FROM matakuliah");
                
                                    while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>
                                                <td>" . $no++ . "</td>
                                                <td>" . $row["kodemk"]. "</td>
                                                <td>" . $row["nama"]. "</td>
                                                <td>" . $row["jumlah_sks"]. "</td>
                                                </tr>";
                                    }
                            ?>
                        <tbody>
                    </table>
                </div>

                <div id="krs-tabel" class="krs d-none">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Rencana Studi</th>
                                <th>NPM Mahasiswa</th>
                                <th>Kode Mata Kuliah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;    
                                $result = mysqli_query($conn, "SELECT * FROM krs");
                
                                    while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>
                                                <td>" . $no++ . "</td>
                                                <td>" . $row["id"] . "</td>
                                                <td>" . $row["mahasiswa_npm"] . "</td>
                                                <td>" . $row["matakuliah_kodemk"] . "</td>
                                                </tr>";
                                    }
                            ?>
                        <tbody>
                    </table>
                </div>

                <div id="join-tabel" class="join">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;    
                                $query = "SELECT mahasiswa.Nama as mahasiswa_nama, matakuliah.nama as matakuliah_nama, matakuliah.jumlah_sks 
                                FROM krs 
                                JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.NPM 
                                JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
                                ORDER BY krs.id";
                                $result = mysqli_query($conn, $query);
                                
                                if (!$result) {
                                    die("Query failed: " . mysqli_error($conn));
                                }
                                
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>
                                            <td>" . $no++ . "</td>
                                            <td>" . $row['mahasiswa_nama'] . "</td>
                                            <td>" . $row['matakuliah_nama'] . "</td>
                                            <td><span class='mahasiswa-nama' style='font-family:consolas;color:red;'>" . $row['mahasiswa_nama'] . "</span> Mengambil Mata Kuliah <span class='matakuliah-nama' style='font-family:consolas; color:red;'>" . $row['matakuliah_nama'] . "</span> (" . $row['jumlah_sks'] . " SKS)</t
                                            </tr>";
                                }                  
                            ?>
                        <tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
            document.getElementById('mhs-btn').addEventListener('click', function() {
            document.getElementById('mhs-tabel').classList.remove('d-none');
            document.getElementById('mk-tabel').classList.add('d-none');
            document.getElementById('krs-tabel').classList.add('d-none');
            document.getElementById('join-tabel').classList.add('d-none');
        });

        document.getElementById('mk-btn').addEventListener('click', function() {
            document.getElementById('mk-tabel').classList.remove('d-none');
            document.getElementById('mhs-tabel').classList.add('d-none');
            document.getElementById('krs-tabel').classList.add('d-none');
            document.getElementById('join-tabel').classList.add('d-none');
        });

        document.getElementById('krs-btn').addEventListener('click', function() {
            document.getElementById('krs-tabel').classList.remove('d-none');
            document.getElementById('mhs-tabel').classList.add('d-none');
            document.getElementById('mk-tabel').classList.add('d-none');
            document.getElementById('join-tabel').classList.add('d-none');
        });

        document.getElementById('join-btn').addEventListener('click', function() {
            document.getElementById('join-tabel').classList.remove('d-none');
            document.getElementById('mhs-tabel').classList.add('d-none');
            document.getElementById('krs-tabel').classList.add('d-none');
            document.getElementById('mk-tabel').classList.add('d-none');
        });
    </script>
</body>
</html>