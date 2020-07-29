<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="page-header">
    <h1>Halaman Hitung Rangking </h1>
</div>

<div class="col-lg-12">

        <div class="row">
                <div class="col-md-4">
                        <h2>Table 1 - Nilai Awal</h2>
                                <table class="table table-striped">
                                        <tr>
                                        <th>Nama</th>
                                        <th>Kriteria</th>
                                        <th>Nilai</th>
                                        </tr>
                                        <?php foreach($penilaian->result_array() as $row){
                                                echo"<tr>";
                                                echo"<td>".$row['nama']." </td> ";
                                                echo"<td>".$row['kriteria']." </td> ";
                                                echo"<td>".$row['nilai']." </td>  ";
                                                echo"</tr>";
                                        };
                                        ?>
                                </table>
                </div>
                        
                <div class="col-md-4">
                        <h2>Table 2 - Nilai Benefit</h2>
                        <table class="table table-striped">
                                <tr>
                                        <?php foreach ($max as $pen) : ?>
                                                <th><?= $pen['kriteria']; ?></th>
                                        <?php endforeach; ?>
                                </tr>
                                <tr>
                                        <?php foreach ($max as $pen) : ?>
                                                <td><?= $nilai1=$pen['nilai']; ?></td>
                                        <?php endforeach; ?>
                                </tr>
                        </table>    
                </div> 
                
                <div class="col-md-4">
                        <h2>Table 3 - Nilai Cost</h2>
                        <table class="table table-striped">
                        <?php foreach ($min as $pen) : ?>
                        <td><?= $pen['kriteria']; ?></td>
                        <?php endforeach; ?>
                        </table>
                        <table class="table table-hover">
                        <?php foreach ($min as $pen) : ?>
                        <td><?= $pen['nilai']; ?></td>
                        <?php endforeach; ?>
                        </table>    
                </div> 
        </div>  
       

      
        <div class="col-lg-12">
        <div class="row"> 
        <div class="col-md-4">
                <h2>Table 4- Nilai Max Perkriteria</h2>
                <table class="table table-striped">
                <tr>
                        <th>Kriteria</th>
                        <th>Nilai Max</th>
                </tr>
                <?php 
                 
                foreach($max1->result_array() as $row){
                       




echo" <tr>
<td> ".$row['kriteria']." </td> ";

echo"<td> ".$row['MX']." </td> </tr> ";



};
?>
                </table>
                </div>
        

<div class="col-md-4">
                <h2>Table 5 - Nilai Min Perkriteria</h2>
                <table class="table table-striped">
                <?php foreach ($min1 as $pen) : ?>
        <td><?= $pen['kriteria']; ?></td>
        
           
        <?php endforeach; ?>
        </table>
        <table class="table table-hover">
                <?php foreach ($min1 as $pen) : ?>    
        <td><?= $pen['n1']; ?></td>
        
           
        <?php endforeach; ?>
        </table>    
        </div> 




      
        <div class="col-md-4">
                <h2>Table 6- Nilai Normalisasi Atribut Biaya</h2>
                <table class="table table-striped">
                <tr>
                        <th>Nama</th>
                        <th>Kriteria</th>
                        <th>Nilai</th>
                        <th>Minimal</th>
                        <th>Hasil</th>
                </tr>
                <?php 
                 
                foreach($min2->result_array() as $row){
                       $hasils1=$row['MN']/$row['nilai'];




echo" <tr>
<td> ".$row['nama']." </td> ";
echo"<td> ".$row['kriteria']." </td> ";
echo"<td> ".$row['nilai']." </td> ";    
echo"<td> ".$row['MN']." </td> ";
echo"<td> ".$hasils1." </td> </tr>";
 


};
?>
                </table>
                </div>
        </div>
        <div class="col-lg-12">
        <div class="row">
       
        <div class="col-md-4">
                <h2>Table 7- Nilai Normalisasi Atribut Keuntungan</h2>
                <table class="table table-striped">
                <tr>
                        <th>Nama</th>
                        <th>Kriteria</th>
                        <th>Nilai</th>
                        <th>Maximal</th>
                        <th>Hasil</th>
                </tr>
                <?php 
                 
                foreach($max2->result_array() as $row){
                       $hasils=$row['nilai']/$row['MX'];




echo" <tr>
<td> ".$row['nama']." </td> ";
echo"<td> ".$row['kriteria']." </td> ";
echo"<td> ".$row['nilai']." </td> ";

echo"<td> ".$row['MX']." </td> ";

echo"<td> ".$hasils." </td> </tr>";
 


};
?>
                </table>
                </div>
          
<div class="col-md-12">
                <h2>Table 8 - Hasil</h2>
                <table class="table table-striped">
                <tr>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Kriteria</th>
                        <th>Nilai</th>
                        <th>MAX</th>
                        <th>MIN</th>
                        <th>Bobot</th>
                        <th>Hasil</th>
                        <th>Total</th>
                </tr>
                <?php
                        $current_nama = null;
                        $current_jurusan = null;
                        $total = 0;
                ?>
                <?php foreach($max3->result_array() as $key => $row){
                                
                        echo" <tr>";
                        echo" <td> ".$row['nama']." </td>";
                        echo" <td> ".$row['jurusan']." </td> ";
                        echo" <td> ".$row['kriteria']." </td> ";
                        echo" <td> ".$row['nilai']." </td> ";
                        echo " <td> ".$row['MX']." </td>";
                        echo " <td> ".$row['MN']." </td>";
                        echo" <td> ".$row['bobot']." </td> ";
                        echo" <td> ".round($row['N3'],3)." </td> ";
                        if ($row['jurusan']!==$current_jurusan){
                                $current_jurusan = $row['jurusan'];
                                $total = 0;
                                $total += round($row['N3'],3);
                                echo" <td> ".$total." </td> ";
                        }else if($row['jurusan']==$current_jurusan){
                                $total += round($row['N3'],3);
                                echo" <td> ".$total." </td> ";
                        }
                        echo"</tr>";
                };
                ?>                        
        </table>   
        </div> 
        
        <div class="col-md-12">
                <h2>Table 9 - Ranking</h2>
                <table class="table table-striped">
                <tr>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Total</th>
                </tr>
                
                <?php foreach($final1->result_array() as $row){
                        echo" <tr>";
                        echo" <td> ".$row['nama']." </td> ";
                        echo" <td> ".$row['jurusan']." </td> ";
                        
                        $jurusan = $row['jurusan'];
                        $nama = $row['nama'];
                        $totalhasil = 0;

                        $query = "SELECT kriteria.kriteria,detail_jk.bobot,nilai,kriteria.jenis,MN,MX,
                                CASE 
                                      WHEN jenis = 'Cost' THEN (MN/nilai)*bobot
                                      WHEN jenis = 'Benefit' THEN (nilai/MX)*bobot
                                      ELSE NULL
                                      END AS N3
                                FROM penilaian 
                                JOIN(
                                  SELECT kriteria.id_kriteria,
                                    CASE WHEN jenis = 'Benefit' THEN MAX(nilai) ELSE NULL END AS MX,
                                    CASE WHEN jenis = 'Cost' THEN MIN(nilai) ELSE NULL END AS MN
                                  FROM kriteria 
                                  JOIN penilaian 
                                    ON penilaian.id_kriteria = kriteria.id_kriteria
                                  GROUP BY kriteria.id_kriteria
                                  ) AS x
                                  ON penilaian.id_kriteria = x.id_kriteria
                                JOIN kriteria
                                  ON penilaian.id_kriteria = kriteria.id_kriteria
                                JOIN siswa
                                  ON penilaian.id_siswa = siswa.id_siswa
                                JOIN detail_jk
                                  ON detail_jk.id_kriteria = kriteria.id_kriteria
                                JOIN jurusan
                                  ON jurusan.id_jurusan = detail_jk.id_jurusan
                                WHERE jurusan.jurusan = '$jurusan' AND siswa.nama = '$nama'
                                GROUP BY siswa.nama, jurusan.jurusan, kriteria.kriteria";

                        $total = $this->db->query($query)->result_array();
                        foreach($total as $val){
                                $totalhasil += $val['N3'];
                        }

                        echo" <td> ".round($totalhasil,3)." </td>";
                        echo"</tr>";
                };
                ?>                        
        </table>   
        </div> 

        <div class="col-md-12">
                <h2>Hasil</h2>
                <table class="table table-striped">
                <tr>
                        <th>Ranking</th>
                        <th>Jurusan</th>
                        <th>Nama</th>
                        <th>Total</th>
                </tr>
                <?php
                        $current_nama = null;
                        $current_jurusan = null;
                        $rank = 0;
                        $jurusan = 0;
                        $orang = 0;
                        $valrank = array(array());
                ?>
                <?php foreach($final1->result_array() as $row){
                        echo" <tr>";
                        if($row['jurusan'] !== $current_jurusan){
                                $current_jurusan = $row['jurusan'];
                                $rank ++;
                        }
                        echo" <td> ".$rank." </td> ";
                        echo" <td> ".$row['nama']." </td> ";
                        echo" <td> ".$row['jurusan']." </td> ";
                        
                        $jurusan = $row['jurusan'];
                        $nama = $row['nama'];
                        $totalhasil = 0;

                        $query = "SELECT kriteria.kriteria,detail_jk.bobot,nilai,kriteria.jenis,MN,MX,
                                CASE 
                                      WHEN jenis = 'Cost' THEN (MN/nilai)*bobot
                                      WHEN jenis = 'Benefit' THEN (nilai/MX)*bobot
                                      ELSE NULL
                                      END AS N3
                                FROM penilaian 
                                JOIN(
                                  SELECT kriteria.id_kriteria,
                                    CASE WHEN jenis = 'Benefit' THEN MAX(nilai) ELSE NULL END AS MX,
                                    CASE WHEN jenis = 'Cost' THEN MIN(nilai) ELSE NULL END AS MN
                                  FROM kriteria 
                                  JOIN penilaian 
                                    ON penilaian.id_kriteria = kriteria.id_kriteria
                                  GROUP BY kriteria.id_kriteria
                                  ) AS x
                                  ON penilaian.id_kriteria = x.id_kriteria
                                JOIN kriteria
                                  ON penilaian.id_kriteria = kriteria.id_kriteria
                                JOIN siswa
                                  ON penilaian.id_siswa = siswa.id_siswa
                                JOIN detail_jk
                                  ON detail_jk.id_kriteria = kriteria.id_kriteria
                                JOIN jurusan
                                  ON jurusan.id_jurusan = detail_jk.id_jurusan
                                WHERE jurusan.jurusan = '$jurusan' AND siswa.nama = '$nama'
                                GROUP BY siswa.nama, jurusan.jurusan, kriteria.kriteria";

                        $total = $this->db->query($query)->result_array();
                        foreach($total as $val){
                                $totalhasil += $val['N3'];
                        }

                        if(['jurusan'] !== $current_jurusan){
                        $jurusan += 1;
                                if($row['nama'] !== $current_nama)
                        $valrank[$jurusan][] = $totalhasil;
                        }

                        echo" <td> ".round($totalhasil,3)." </td>";
                        echo"</tr>";
                };
                ?>                        
        </table>   
        </div> 
</div>          

     
