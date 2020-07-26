<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="page-header">
    <h1>Halaman Hitung Rangking </h1>
</div>
<div class="col-lg-12">

<div class="row">
        <div class="col-md-4">
                <h2>Table 1 - Nilai Awal</h2>
                <table class="table table-striped">

                <?php foreach($penilaian->result_array() as $row){

echo" 

<tr>
 <td> ".$row['nama']." </td> ";


echo"<td> ".$row['kriteria']." </td> ";
echo"<td> ".$row['nilai']." </td>  ";



};
?>
                </table>
                </div>
        
                
    
                                
                
        <div class="col-md-4">
                <h2>Table 2 - Nilai Benefit</h2>
                <table class="table table-striped">
                <?php foreach ($max as $pen) : ?>
        <td><?= $pen['kriteria']; ?></td>
        
           
        <?php endforeach; ?>
        </table>
        <table class="table table-hover">
                <?php foreach ($max as $pen) : ?>
        <td><?= $nilai1=$pen['nilai']; ?></td>
        
        
        <?php endforeach; ?>
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
       
        </div>

      
        <div class="col-lg-12">
        <div class="row"> 
        <div class="col-md-4">
                <h2>Table 4- Nilai Max Perkriteria</h2>
                <table class="table table-striped">

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
                <?php foreach($max3->result_array() as $row){

                        echo" <tr>
                      
                       
                         <td> ".$row['nama']." </td>";
                        echo" <td> ".$row['kriteria']." </td> ";
                        echo" <td> ".$row['nilai']." </td> ";
                        echo " <td> ".$total=$row['N3']." </td> </tr>";
                        
                };
                ?>
                        
        </table>   
        </div> 
        

</div>          

     
