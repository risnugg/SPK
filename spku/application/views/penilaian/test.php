<!--<div class="col-md-4">
                <h2>Table 8 - Test</h2>
                <table class="table table-striped">
                <?php foreach ($max3->result_array() as $row) {
                        
                        if ($row['jenis'] =='Benefit'){

                                $query = "SELECT `penilaian`.*,.`kriteria`.`kriteria`,`siswa`.`username`,MIN(nilai) as n1
                                FROM `penilaian` join `siswa`
                                on `penilaian`.`id_siswa`=`siswa`.`id_siswa`
                                join `kriteria`
                                on `penilaian`.`id_kriteria`=`kriteria`.`id_kriteria`
                                where jenis ='Cost' 
                                GROUP BY kriteria ";
                          
                                $query1 = $this->db->query($query)->result_array();
                         foreach ($query1 as $min1) :
                               echo "<td>  ".($min1['n1'])." </td>";
                        endforeach;
                        } else {
                               
                              
                        }
                } ?>
        
        </table>    
        </div> -->
        <div class="col-md-4">
                <h2>Table 8 - Test</h2>
                <table class="table table-striped">
                <?php foreach ($max3 as $pen) :
                        if ($pen['jenis'] == 'Cost') : ?>

        <?php foreach ($min1 as $min) : ?>
        <td> <?= $min['n1']; ?> </td>
        <?php endforeach; ?>
        <?php else : ?>

<?php foreach ($max1 as $max) : ?>
        <td> <?= $max['N2']; ?> </td>
        <?php endforeach; ?>

               
       
               
       

        </table>
        <?php endif; 
        endforeach; ?>   
 
  
        </div> 
        
        
<div class="col-md-4">
                <h2>Table 8 - Test</h2>
                <table class="table table-striped">
<?php foreach ($max1 as $m1) : ?>
               <?php if ('Cost' == $m1['jenis']) : ?>
                   <td> <?= $m1['N2']; ?> </td>
                   <?php else : ?>

                        <?php foreach ($min1 as $pen) : ?>    
                   <td><?= $pen['n1']; ?></td>
        
                  <?php endforeach; ?>
                   <?php endif; ?>
                   <?php endforeach; ?>
                   </table>
                   </div>
</div>
     
<div class="col-md-4">
                <h2>Table 8 - Test</h2>
                <table class="table table-striped">
                <?php foreach ($max3 as $pen) :
                        if ($pen['jenis'] == 'Cost') : ?>

        <?php foreach ($min1 as $min) : ?>
        <td> <?= $min['n1']; ?> </td>
        <?php endforeach; ?>

        <?php else : ?>
<?php foreach ($max1 as $max) : ?>
        <td> <?= $max['N2']; ?> </td>
        <?php endforeach; ?>

               
       
               
       

        </table>
        <?php endif; 
        endforeach; ?>   
 
  
        </div> 


        <!--
        
<div class="col-md-4">
                <h2>Table 7 - Nilai Max Normalisasi</h2>
                <table class="table table-striped">
                <?php foreach ($max1 as $pen) : ?>
        <td><?= $pen['kriteria']; ?></td>
        
           
        <?php endforeach; ?>
        </table>
        <table class="table table-hover">
        
                <?php foreach ($max1 as $pen) : ?>
           <td><?= $total2=$pen['nilai']/$pen['N2']; ?></td>
         
   
       
           
        <?php endforeach; ?>
        </table>   
        </div> 
        -->
        
public function final1(){
$query = "SELECT  total_max,total_min
FROM PENILAIAN inner join
(
  SELECT c.id_kriteria, MAX(nilai) total_max 
  FROM kriteria as c
  INNER JOIN penilaian ON c.id_kriteria = penilaian.id_kriteria
  where jenis='Benefit' 
  GROUP BY c.id_kriteria
) a
JOIN (
  SELECT k.id_kriteria, MIN(nilai) total_min 
  FROM kriteria as k
  INNER JOIN penilaian ON k.id_kriteria = penilaian.id_kriteria
  where jenis ='Cost' 
  GROUP BY k.id_kriteria
) b
ON penilaian.id_kriteria = c.id_kriteria 
INNER JOIN
 ON c.id_kriteria=k.id_kriteria
ORDER BY c.id_kriteria";

return $this->db->query($query);

}
