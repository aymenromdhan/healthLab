<?php
session_start();

// initializing variables
$nom = "";
$prenom = "";
$email    = "";
$date    = "";
$telephone    = "";
$sexe    = "";
$ville    = "";
$role    = "";


$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'danger');

 

   $user_check_query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }}
// REGISTER USER
if (isset($_POST['reg_user'])) {
  echo("hello");
  // receive all input values from the form
  $nom = mysqli_real_escape_string($db, $_POST['nom']);
  $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $telephone = mysqli_real_escape_string($db, $_POST['telephone']);
  $sexe = mysqli_real_escape_string($db, $_POST['sexe']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  $ville = mysqli_real_escape_string($db, $_POST['ville']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($nom)) { array_push($errors, "nom is required"); }
  if (empty($prenom)) { array_push($errors, "prenom is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($date)) { array_push($errors, "date is required"); }
  if (empty($telephone)) { array_push($errors, "telephone is required"); }
  if (empty($sexe)) { array_push($errors, "sexe is required"); }
  if (empty($role)) { array_push($errors, "role is required"); }
  if (empty($ville)) { array_push($errors, "ville is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
   
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (nom,prenom, email, password, date, telephone, sexe, ville, role) 
  			  VALUES('$nom','$prenom', '$email', '$password', '$date', '$telephone', '$sexe', '$ville', '$role')";
  	mysqli_query($db, $query);

  	$_SESSION['username'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong email/password combination");
        }
    }
  }
  
  ?>