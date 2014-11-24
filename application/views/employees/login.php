<?php
$this->load->view('header');
?>
    <div class="container">

		<?php $attributes = array('class' => 'form-signin', 'role' => 'form');

			
		echo form_open('login/submit', $attributes);
		?>

        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="nuumber" id="inputID" name="inputID" class="form-control" placeholder="SalesPerson ID" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" >Sign in</button>
	   <?php echo form_close(); ?>

    </div>

<?php
$this->load->view('footer');
?>
