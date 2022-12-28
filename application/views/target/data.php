<!-- App Capsule -->
<div id="appCapsule">

<div class="section full mt-2">    
    
    <div class="row">
		<div class="col-12">
			<div class="col-12">	
            	<h3>DATA TARGET</h3>            
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                        	<div style="overflow-x:auto;">
								<table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
									<thead>
										<tr>
											<th width="40%">Tahun</th>
											<th width="30%">Aksi</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											</td>
											<td scope="row">
												<p>2023</p>                                        
											</td>    
											<td>
												<a href="<?= base_url("target/open?tahun=".date("Y"))?>" class="btn btn-primary" target="_blank"><i class="fa fa-eye"></i></a>
												<a href="<?= base_url("target/download?tahun=".date("Y"))?>" class="btn btn-danger" target="_blank"><i class="fa fa-download"></i></a>
												<a href="<?= base_url("target/print?tahun=".date("Y"))?>" class="btn btn-warning"><i class="fa fa-print"></i></a>
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