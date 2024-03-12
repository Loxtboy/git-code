<?php 

   session_start();

   require 'function.php';

   $buku = query("SELECT * FROM buku");

 ?>


<!DOCTYPE html>
<html>
<head>
 <title> Cetak laporan PDF </title>
</head>
<body>
 <style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: skyblue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style>
 <table>
               <tr>
               <th>ID Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Gambar</th>
                <th>Jenis Buku</th>
                <th>Baca</th>
                <th>Download</th>
 </tr>
 <?php foreach($buku as $row) : ?>
 <tr>
 <td style='text-align: center;'> <?php echo $row['idBuku'] ?> </td>
 <td><?php echo $row['judul']; ?></td>
 <td><?php echo $row['pengarang']; ?></td>
 <td><?php echo $row['tahunTerbit']; ?></td>
<td><?php echo $row['gambar']; ?></td>
<td><?php echo $row['jenisBuku']; ?></td>
<td><?php echo $row['baca']; ?></td>
<td><?php echo $row['download']; ?></td>
 </tr>
 <?php endforeach; ?>
    </table>
    <script>
      window.print();
   </script>
</body>
</html>