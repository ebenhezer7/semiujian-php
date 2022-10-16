<?php
    require_once __DIR__ . './vendor/autoload.php' ;

    $mpdf = new \Mpdf\Mpdf();
    include ('./Input-config.php');
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
        ";
        $no++;
    }
    $waktu_cetak = date('d M Y - H:i:s');
    $table =  "
            <h1>Laporan Data Diri</h1>
            <h6>waktu cetak : $waktu_cetak</h6>
          <table cellpadding=5 border=1 cellspacing=0>
                <tr>
                   <th>NIS</th> 
                   <th>Nama</th> 
                   <th>jenis kelamin</th> 
                   <th>kelas</th>  
                   <th>nilai_kehadiran</th>  
                   <th>nilai_tugas</th>  
                   <th>nilai_pts</th>  
                   <th>nilai_pas</th>  
                </tr>
                $tabledata
          </table>
    ";

    $mpdf->WriteHTML("$table");
    $mpdf->Output();

?>