<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('init/overhead.php');
$logged = 2;
if($_SESSION){
	header('location: /index.php');
}
$title = 'Login' ;  // page title

?>
<!---------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('init_html/header.php'); ?>
<!---------------------------------------- Add Page Edits Below ----------------------------------------------- -->    

	<section id="login">
		<div class="container">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-md-6 col-md-offset-3">
					<div class="form-wrap">
						<h1>Log in</h1>
						<form role="form" action="index.php" method="post" id="login-form" autocomplete="off">
							<div class="form-group">
								<label for="email" class="sr-only">Username</label>
								<input type="text" name="eid" id="email" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="key" class="sr-only">Password</label>
								<input type="password" name="passwd" id="key" class="form-control" placeholder="Password">
							</div>
							
							<input type="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Log in">
						</form>
						<hr>
					</div>
					</div> <!-- /.col-xs-12 -->
					</div> <!-- /.row -->
					</div> <!-- /.container -->
				</section>


<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('init_html/footer.php'); 