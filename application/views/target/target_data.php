<!-- App Capsule -->
<div id="appCapsule">


<div class="section full mt-2">
    
    
    <div class="row">
		<div class="col-12">
			<div class="col-12">	
            <h3>DATA TARGET</h3>
            <div class="card">
            <a href="<?=site_url('target/addtarget')?>" class="btn btn-success">Tambah Target Kinerja<i class="fa fa-add"></i></a>
					<div class="card-body">
                    
				
				<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                
					<input type="hidden" name="id" value="<?= $this->session->id ?>">
                    
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>

						<select name="tahun" class="btn btn-outline-primary " required>
							<option value="">Pilih Tahun</option>
							<?php $thn_skr = date('Y');
							for ($x = $thn_skr; $x >= 2018; $x--) { ?>
								<option value="<?php echo $x ?>"><?php echo $x ?></option>
							<?php } ?>
						</select>
                        

                        
						<button type="submit" class="btn btn-primary">Filter <i class="fa fa-eye"></i></button>
                        
					</div>
                    
					<div class="input-group-append">
					</div>
				</form>
                            </div>
                            </div>
                            <br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                        <div style="overflow-x:auto;">
							<table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="40%">Tahun</th>
                                        <th width="40%">Target</th>
                                        <th width="30%">#</th>

									</tr>
								</thead>
								<tbody>
                                    <tr>
                                        <td scope="row">
                                            <p>1</p>
                                        </td>
                                        <td scope="row">
                                            <p>2023</p>                                        
                                        </td>
                                        <td scope="row">
                                            <p> </p>
                                        </td>                                        
                                        <td>
                                            <a href="<?=site_url('target/edittarget')?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                            <a href="" class="btn btn-danger"><i class="fa fa-download"></i></a>
                                            <a href="" class="btn btn-warning"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>									
								</tbody>
							</table>
                            </div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

</div>



</div>
<!-- * App Capsule -->