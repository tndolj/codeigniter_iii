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
		<link rel="stylesheet" href="<?=base_url();?>/assets/style.css" rel="stylesheet">
		<link rel="stylesheet" href="<?=base_url();?>/assets/fontawesome/all.css" rel="stylesheet">
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
								<h4 class="text-uppercase">Update User</h4>
							</div>
						</div>
            <div class="card-body p-0">
              <?php echo form_open('user/store'); ?>
              <div class="modal-body">
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" type="text" name="username" value="<?=$get_user['username'];?>" readonly>
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" type="text" name="name" value="<?=$get_user['name'];?>" required>
                </div>
                <div class="form-group">
                  <label>Surname</label>
                  <input class="form-control" type="text" name="surname" value="<?=$get_user['surname'];?>" required>
                </div>
                <div class="form-group">
                  <label>Age</label>
                  <input class="form-control" type="number" name="age" value="<?=$get_user['age'];?>" required>
                </div>
              </div>
              <div class="modal-footer">
                <?=  anchor('', '<i class="fas fa-arrow-left"></i> Back', array('title' => 'Edit', 'class' => 'btn btn-outline-primary')) ?>
                <input type="hidden" name="id" value="<?=$get_user['id'];?>">
                <?php echo form_submit('','Update', array('class' => 'btn btn-primary')); ?>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
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
</body>
	
</html>