<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Nom</label>
  	  <input type="text" name="nom" value="<?php echo $nom; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Prenom</label>
  	  <input type="text" name="prenom" value="<?php echo $prenom; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	  <div class="input-group">
  	  <label>date de naissance</label>
  	  <input type="text" name="date" value="<?php echo $date; ?>">
  	</div>
	  <div class="input-group">
  	  <label>telephone</label>
  	  <input type="text" name="telephone" value="<?php echo $telephone; ?>">
  	</div>
	  
	 
	  <legend class="input-group">sexe</legend>
								<div class="col-md-6">
                                    <div class="form-check">
                                        <label> </label>
										<input id="gridRadios1" value="homme" name="sexe" type="radio" class="form-control input-md" checked>
										<label class="form-check-label" for="gridRadios1">
										homme
										</label>
									</div>
									
									<div class="form-check">

                                        
										<input id="gridRadios2" value="femme" name="sexe" type="radio" class="form-control input-md" checked>
										<label class="form-check-label" for="gridRadios2">
										femme
										</label>
                                    </div>

                                    <div class="form-check">

                                        <legend class="input-group">rôle</legend>
										<input id="gridRadios2" value="client" name="role" type="radio" class="form-control input-md" checked>
										<label class="form-check-label" for="gridRadios2">
										client
										</label>
                                    </div>


                                    <div class="form-check">

                                        
										<input id="gridRadios2" value="médecin" name="role" type="radio" class="form-control input-md" checked>
										<label class="form-check-label" for="gridRadios2">
										médecin
										</label>
                                    </div>



								</div>
	<div class="form-check">
		<label for="ville">ville</label>
		<select name="ville" class="dropdown_item_select" require="required">
    	<option value="<?php echo $ville; ?>"></option>
                <option value="ariana">ariana</option
				<option value="Ben arous">ben arous</option>
				<option value="gafsa">gafsa</option>
				<option value="gabes">gabes</option>
				<option value="djerba">djerba</option>
				<option value="tunis">tunis</option>
				<option value="sfax">sfax</option>
				<option value="kairouan">kairouan</option>
				<option value="sousse">sousse</option>
				<option value="hammamet">hammamet</option>
				<option value="mahdia">mahdia</option>
				<option value="bizert">bizert</option>
				<option value="monastir">monastir</option>
				<option value="tozeur">tozeur</option>
				<option value="nabeul">nabeul</option>
				<option value="tataouine">tataouine</option>
				<option value="douz">douz</option>
				<option value="beja">beja</option>
				<option value="zarzis">zarzis</option>
				<option value="jandouba">jandoua</option>
				<option value="kasserine">kasserine</option>
				<option value="medenine">medenine</option>
				<option value="kef">kef</option>
				<option value="siliana">siliana</option>
				<option value="kebili">kebili</option>
				<option value="sidi bouzid">sidi bouzid</option>
									
		</select>
	</div>



	  

  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>