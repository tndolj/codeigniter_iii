<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		$meta = array(
			array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8','type' => 'equiv'),
			array('name' => 'viewport', 'content' => "width=device-width, initial-scale=1,maximum-scale=1"),
			array('name' => 'description', 'content' => "Codeigniter III"),
		);
		echo meta($meta);
		?>
		<link rel="stylesheet" href="assets/style.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/fontawesome/all.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
	</head>

	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
				<a class="navbar-brand">Codeigniter III</a>
				<button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</nav>
			<div class="main-content">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<div class="d-flex justify-content-between">
									<h4 class="text-uppercase">User list</h4>
									<button class="btn btn-outline-primary" data-toggle="modal" data-target="#add-user-modal">
										<i class="fas fa-plus"></i>
									</button>
								</div>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table table-light table-hover">
										<thead class="thead-light">
											<tr>
												<th>Username</th>
												<th>Name</th>
												<th>Surname</th>
												<th>Age</th>
												<th class="thin-cell"></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$users = $this->db->query("SELECT * FROM `user`")->result_array();    
											foreach($users as $key => $user) {
											?>
											<tr>
												<td><?= $user['username']; ?></td>
												<td><?= $user['name']; ?></td>
												<td><?= $user['surname']; ?></td>
												<td><?= $user['age']; ?></td>
												<td>
													<div class="d-flex">
													<?=  anchor('user/update/'.$user["id"], '<i class=\'fas fa-pen\'></i>', array('title' => 'Edit', 'class' => 'btn btn-outline-primary')) ?>
														<button class="btn btn-outline-danger ml-2 delete-modal" data-username="<?= $user['username']; ?>" data-id="<?= $user['id']; ?>">
															<i class="fas fa-trash"></i>
														</button>
													</div>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div id="add-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-uppercase" id="my-modal-title">Add User</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php echo form_open('user/create'); ?>
						<div class="modal-body">
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="password" required>
							</div>
							<div class="form-group">
								<label>Name</label>
								<input class="form-control" type="text" name="name" required>
							</div>
							<div class="form-group">
								<label>Surname</label>
								<input class="form-control" type="text" name="surname" required>
							</div>
							<div class="form-group">
								<label>Age</label>
								<input class="form-control" type="number" name="age" required>
							</div>
						</div>
						<div class="modal-footer">
							<?php echo form_submit('', 'Create', array('class' => 'btn btn-primary')); ?>
						</div>
						<?php echo form_close(); ?>
				</div>
			</div>
		</div>

		<div id="delete-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-uppercase" id="my-modal-title">Delete User</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php echo form_open('user/delete'); ?>
						<div class="modal-body">
							<div class="form-group">
								<label>Username</label>
								<input id="delete_username" class="form-control" type="text" name="username" readonly>
							</div>
						</div>
						<div class="modal-footer">
							<input id="delete_id" type="hidden" name="id">
							<?php echo form_submit('', 'Delete', array('class' => 'btn btn-danger')); ?>
						</div>
						<?php echo form_close(); ?>
				</div>
			</div>
		</div>

		<!-- Alert -->
		<div>
			<?php $this->load->view('alert'); ?>
		</div>

		<!-- Script -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

		<script>
			$(document).ready(function () {
				$(document).on("click", ".delete-modal", function () {
					var username = $(this).data('username');
					var id = $(this).data('id');

					$(".modal-body #delete_username").val(username);
					$(".modal-footer #delete_id").val(id);
					$('#delete-user-modal').modal('show');
				});
			});
		</script>
	</body>
	
</html>