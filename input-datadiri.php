<?php
    include('./input-config.php');
    if( $_SESSION["login"] != TRUE){
        header('location:login.php');
    }
    echo "<div class='container'>"; 
    echo "Selamat Datang " .$_SESSION["username"] . "<br>";
    echo "Anda Sebagai : -" .$_SESSION["role"] . "<br>";
    echo "<hr>";
    echo "<a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
    echo "<hr>";
    echo "<a class='btn btn-sm btn-primary' href='input-datadiri-tambah.php'>Tambah Data</a>&nbsp; -&nbsp;";
    echo "<a class='btn btn-sm btn-warning' href='input-datadiri-pdf.php'>Cetak PDF</a>";
    echo "<hr>";
    // Menampilkan data dari database
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM nilai ");
    while ($row = mysqli_fetch_array($data)){
        $tabledata .= "
            <tr>
             <td>".$row["nis"]."</td>
             <td>".$row["nama_lengkap"]."</td>
             <td>".$row["jenis_kelamin"]."</td>
             <td>".$row["kelas"]."</td>
             <td>".$row["nilai_kehadiran"]."</td>
             <td>".$row["nilai_tugas"]."</td>
             <td>".$row["nilai_pts"]."</td>
             <td>".$row["nilai_pas"]."</td>
             <td>
                <a class='btn btn-sm btn-success' href='input-datadiri-edit.php?nis=".$row["nis"]."'>Edit</a>
                &nbsp; -&nbsp;
                <a class='btn btn-sm btn-danger href= 'input-datadiri-hapus?nis=".$row["nis"]."'
                onclick='return confirm(\"yakin hapus ?\");'>Hapus</a>
             </td>
            </tr> 
        ";
        $no++;
    }

    echo "
          <table class='table table-dark table-bordered table-striped' 
                <tr>
                   <th>NIS</th> 
                   <th>Nama</th> 
                   <th>jenis kelamin</th> 
                   <th>kelas</th> 
                   <th>nilai_kehadiran</th>
                   <th>nilai_tugas</th>
                   <th>nilai_pts</th>
                   <th>nilai_pas</th>
                   <th>aksi</th>
                </tr>
                $tabledata
          </table>
    ";
    echo "</div>";
?>