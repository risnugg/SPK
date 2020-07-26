<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>


            <?= $this->session->flashdata("message"); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Bobot"> Add New Bobot </a>

            <!-- /.container-fluid -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Aksi</th>


                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($penilaian as $pn) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $pn['nama']; ?></td>
                            <td><?= $pn['kriteria']; ?></td>
                            <td><?= $pn['nilai']; ?></td>

                            <td>

                                <a href="<?= base_url('penilaian/editpen/' . $pn['id_nilai']); ?>" class="badge badge-success">Edit</a>
                                <a href=" <?= base_url('penilaian/deletepen/' . $pn['id_nilai']); ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus </a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>


                </tbody>
            </table>
        </div>
        <!-- End of Main Content -->

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="Bobot" tabindex="-1" role="dialog" aria-labelledby="Bobot" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Bobot">Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="<?= base_url('penilaian'); ?>" method="post">
                    <div class="form-group">

<label>Nama Siswa</label>
<select class="form-control" name="id_siswa" id="id_siswa">
    <option value="">No Selected</option>
    <?php foreach ($siswa1 as $siswa1) : ?>

<option value="<?= $siswa1['id_siswa']; ?>"><?= $siswa1['nama']; ?> </option>
<?php endforeach; ?>
</select>
</div>
				<div class="form-group">

				    <label>Kriteria</label>
				    <select class="form-control" name="id_kriteria" id="id_kriteria">
				    	<option value="">No Selected</option>
				    	<?php foreach($kriteria as $row):?>
				    	<option value="<?php echo $row->id_kriteria;?>"><?php echo $row->kriteria;?></option>
				    	<?php endforeach;?>
				    </select>
				</div>
                <div class="clear"> </div>

				<div class="form-group">
				    <label>Sub Category</label>
				    <select class="form-control" id="detail_sub" name="detail_sub" >
				    	<option value="">No Selected</option>

				    </select>
				</div>
                
                <div class="form-group">
				    <label>Bobot</label>
				    <select class="form-control" name="bobot" id="bobot" readonly>
                    <option value="">No Data</option>
				   </select>

				    
				</div>
              
                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
</div>
	             </div>
	     </div>

	</div>

    </div>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	
    <script type="text/javascript">
		$(document).ready(function(){

			$('#id_kriteria').on('change',function(){ 
                var id=$(this).val();
                if(id != '')
               { 
                   $.ajax({
                    url : "<?php echo site_url('index.php/penilaian/get_sub_category');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_subkriteria+'>'+data[i].range_nilai+'</option>';
                            
                        }
                        $('#detail_sub').html(html);    
                    }
                  
               
            });
            };
           
                });
                $('#detail_sub').change(function(){ 
                var id_detail=$(this).val();
                if(id_detail != '')
               { 
                   $.ajax({
                    url : "<?php echo site_url('index.php/penilaian/get_bobot');?>",
                    method : "POST",
                    data : {id_detail: id_detail},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].bobotsk+'>'+data[i].bobotsk+'</option>';
                            
                        }
                        $('#bobot').html(html);    
                    }
                  
       

            });
        };
                });
        return false;
    });

	
	</script>
</body>
</html>