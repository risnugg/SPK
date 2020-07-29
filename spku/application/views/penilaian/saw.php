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
                <?php $total = 0; ?>
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
                <?php $total = 0; ?>
                <?php
                        $current_nama = null;
                        $current_jurusan = null;
                        $total = 0;
                ?>
                <?php foreach($final1->result_array() as $key => $row){
                                
                        echo" <tr>";
                        echo" <td> ".$row['nama']." </td> ";
                                echo" <td> ".$row['jurusan']." </td> ";
                                echo" <td> ".$row['TOTAL']." </td> ";
                        
                        echo"</tr>";
                };
                ?>                        
        </table>   
        </div> 

</div>          

     
