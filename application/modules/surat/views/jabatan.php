  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">All Jabatan</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= site_url('surat/dashboard') ?>">Dashboard</a></li>
  						<li class="breadcrumb-item active">Jabatan</li>
  					</ol>
  				</div><!-- /.col -->
  			</div><!-- /.row -->
  		</div><!-- /.container-fluid -->
  	</div>
  	<!-- /.content-header -->

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<div class="card shadow">
  				<div class="card-header">
  					<div class="d-flex justify-content-between align-items-center">
  						<div class="font-weight-bold text-primary">
  							List data
  						</div>
  						<button type="button" class="btn btn-sm btn-primary" onclick="add()">
  							Tambah data
  						</button>
  					</div>
  				</div>
  				<div class="card-body">
  					<div class="table-responsive">
  						<table class="table table-borderless table-hover" cellspacing="0" width="100%" id="wwww">
  							<thead>
  								<tr>
  									<th>No</th>
  									<th>Jabatan</th>
  									<th>Parent</th>
  									<th>Aksi</th>
  								</tr>
  							</thead>
  						</table>
  					</div>
  				</div>
  			</div>
  		</div><!-- /.container-fluid -->

  		<div class="modal fade" id="modalData">
  			<div class="modal-dialog">
  				<div class="modal-content">
  					<div class="modal-header">
  						<h4 class="modal-title">Tambah Jabatan</h4>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="add()">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body form">
  						<form action="#" id="formData">
  							<div class="form-group">
  								<label for="jabatan">Jabatan</label>
  								<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan">
  								<p class="text-danger jabatan"></p>
  							</div>

  							<div class="form-group">
  								<label for="parent">Parent</label>
  								<input type="number" class="form-control" id="parent" name="parent">
  								<p class="text-danger parent"></p>
  							</div>
  						</form>
  					</div>
  					<div class="modal-footer justify-content-between">
  						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  						<button type="button" class="btn btn-primary" id="btnSave" onclick="save() ">Simpal</button>
  					</div>
  				</div>

  			</div>

  		</div>



  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
