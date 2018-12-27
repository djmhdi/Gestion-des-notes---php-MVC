<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FSSM - PROG web</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URLROOT; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet">

  </head>
  <body>

		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="login-section">
				
						<div class="login-logo text-center">
							<img src="<?php echo URLROOT; ?>/img/logo.png" width="150" height="180" alt="uca">
						</div>
						<?php if (!empty($data['error'])){ ;?>
							
							<div class="alert alert-danger">
								<p>Authentication failed.</p>
							</div>
						<?php } ?>
						<form method="POST" action="<?php echo URLROOT; ?>/users/login">
							<h6 class="text-center">Connectez-vous pour commencer votre session</h6>
							<div class="form-group">
								<label for="username">Nom d'utilisateur:</label>
								<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" id="username">
							</div>
							<div class="form-group">
								<label for="password">Mot de passe:</label>
								<input type="password" class="form-control" name="password" placeholder="Mot de passe" id="password">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-default text-center">Se connecter</button>
							</div>
							
						</form>			
					</div>				
				</div>
			</div>
		</div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo URLROOT; ?>/jquery.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
