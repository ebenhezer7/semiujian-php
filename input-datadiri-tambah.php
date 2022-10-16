<div class="container">
    <h1>Tambah Data</h1>
    <form action="input-datadiri-tambah.php" method="POST">
        <label for="nis">Nomor Induk Siswa :</label><br>
        <input class="form-control" type="number" name="nis" placeholder="Ex.12001142"><br>

        <label for="nama">Nama lengkap :</label><br>
        <input class="form-control" type="text" name="nama_lengkap" placeholder="Ex.Firdaus"><br>

        <label for="jenis_kelamin">jenis kelamin :</label><br>
        <input class="form-control" type="text" name="jenis_kelamin"><br>

        <label for="kelas">kelas :</label><br>
        <input class="form-control" type="text" name="kelas" placeholder="Ex. 80.56"><br>
        
        <label for="nilai_kehadiran">nilai kehadiran :</label><br>
        <input class="form-control" type="number" name="nilai_kehadiran" placeholder="Ex. 80.56"><br>
        
        <label for="nilai_tugas">nilai tugas:</label><br>
        <input class="form-control" type="number" name="nilai_tugas" placeholder="Ex. 80.56"><br>
        
        <label for="nilai_pts">nilai pts :</label><br>
        <input class="form-control" type="number" name="nilai_pts" placeholder="Ex. 80.56"><br>
        
        <label for="nilai_pas">nilai pas :</label><br>
        <input class="form-control" type="number" name="nilai_pas" placeholder="Ex. 80.56"><br>
        
        <input class="btn btn-sm btn-primary" type="submit" name="simpan" value="simpan data" />
        <a class="btn btn-sm btn-danger" href="input-datadiri.php">Kembali</a>
    </form>
</div>    

    <?php
    include('./input-config.php');
    if ($_SESSION["login"] != TRUE) {
        header('location:login.php');
    }

    if ($_SESSION["role"] != "admin") {
        echo "
        <script>
            alert('akses tidak diberikan, kamu bukan admin');
            window.location = 'input-datadiri.php';
        </script>
        ";
    }



    if (isset($_POST["simpan"])) {
        $nis = $_POST["nis"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_pts = $_POST["nilai_pts"];
        $nilai_pas = $_POST["nilai_pas"];

        // CREATE - Menambahkan Data Ke Database
        $query = "
            INSERT INTO nilai VALUES
            ('$nis', '$nama_lengkap', '$jenis_kelamin', '$kelas', '$nilai_kehadiran', '$nilai_tugas', '$nilai_pts', '$nilai_pas');
        ";

        $insert = mysqli_query($mysqli, $query);

        if ($insert) {
            echo "
                <script>
                    alert('berhasil ditambahkan');
                    window.location='input-datadiri.php';
                </script>
            ";
        }
    }
    ?>