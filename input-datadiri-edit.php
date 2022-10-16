<?php
if (isset($_GET["nis"])) {
    $nis = $_GET["nis"];
    $check_nis = "SELECT * FROM nilai WHERE nis = '$nis'; ";
    include('./input-config.php');
    $query = mysqli_query($mysqli, $check_nis);
    $row = mysqli_fetch_array($query);
}
?>
<div class="container">
    <h1>Edit data</h1>
    <form action="input-datadiri-edit.php" method="POST">
        <label for="nis"> Nomor Induk siswa :</label><br>
        <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis" placeholder="Ex. 12001142" /><br>

        <label for="nama_lengkap"> Nama Lengkap :</label><br>
        <input class="form-control" value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="nama_lengkap" placeholder="Ex. Firdaus" /><br>

        <label for="jenis_kelamin"> jenis kelamin :</label><br>
        <input class="form-control" value="<?php echo $row["jenis_kelamin"]; ?>" type="text" name="jenis_kelamin" /><br>

        <label for="kelas"> kelas :</label><br>
        <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="Ex. 80.56" /><br>
        
        <label for="nilai_kehadiran"> nilai kehadiran :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_kehadiran"]; ?>" type="number" name="nilai_kehadiran" placeholder="Ex. 80.56" /><br>
        
        <label for="nilai_tugas"> nilai tugas :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_tugas"]; ?>" type="number" name="nilai_tugas" placeholder="Ex. 80.56" /><br>
        
        <label for="nilai_pts"> nilai pts :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_pts"]; ?>" type="number" name="nilai_pts" placeholder="Ex. 80.56" /><br>
        
        <label for="nilai_pas"> nilai pas :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_pas"]; ?>" type="number" name="nilai_pas" placeholder="Ex. 80.56" /><br>

        <input class="btn btn-sm btn-primary" type="submit" name="simpan" value="simpan data" />
        <a class="btn btn-sm btn-danger" href="input-datadiri.php">Kembali</a>
    </form>
</div>
<?php
if (isset($_POST["simpan"])) {
    $nis = $_POST["nis"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $kelas = $_POST["kelas"];
    $nilai_kehadiran = $_POST["nilai_kehadiran"];
    $nilai_tugas = $_POST["nilai_tugas"];
    $nilai_pts = $_POST["nilai_pts"];
    $nilai_pas = $_POST["nilai_pas"];

    // EDIT - Memperbarui Data
    $query = "
            UPDATE datadiri SET nama_lengkap = '$nama_lengkap',
            jenis kelamin = '$jenis_kelamin',
            kelas = '$kelas'
            nilai kehadira = '$nilai_kehadiran'
            nilai tugas = '$nilai_tugas'
            nilai pts = '$nilai_pts'
            nilai pas = '$nilai_pas'
            WHERE nis = '$nis';
        ";

    include('./input-config.php');
    $update = mysqli_query($mysqli, $query);

    if ($update) {
        echo "
                <script>
                alert('Data berhasil diperbaharui');
                window.location='input-datadiri.php';
                </script>
            ";
    } else {
        echo "
                <script>
                alert('Data gagal');
                window.location='input-datadiri-edit.php?nis=$nis';
                </script>
            ";
    }
}
?>