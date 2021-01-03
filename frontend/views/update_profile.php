<?php
    include "../controller/UtilisateurC.php";
    include_once '../Model/Utilisateur.php';

     include('server.php') ;

  $errors = array();  
  $username=$_SESSION['username'];
  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'danger');
  $query = "SELECT * FROM users WHERE email='$username'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  $email=$user['email'];
  $telephone=$user['telephone'];
  $sexe=$user['sexe'];
  $ville=$user['ville'];
  $date=$user['date'];
  $role=$user['role'];
   $nom=$user['nom'];
  $prenom=$user['prenom'];
  $id=$user['id'];
 
    $utilisateurC = new UtilisateurC();
    $error = "";
   

    if (
        isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["date"]) && 
        isset($_POST["ville"]) && 
        isset($_POST["phone"])
    ){
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) && 
            !empty($_POST["date"]) && 
            !empty($_POST["ville"]) && 
            !empty($_POST["phone"])
        ) {
            $user = new Utilisateur(
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['date'],
                $_POST['ville'],
                $_POST['phone']
            );
           $utilisateurC->modifierUtilisateur($user, $_GET['id']);
            header('refresh:10;url=profile.php');  
           
        }
        else
            $error = "Missing information";
    }

?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>

<div class="container emp-profile">
    <?php
            
                $userH = $utilisateurC->recupererUtilisateur($id);
                
        ?>
            <form method="POST" action="">

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $prenom; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $role; ?>
                                        
                                    </h6>
                                    <p class="proile-rating"><span></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <input type="submit" value="Valider" name = "valider" > 
                       
                    </div>
                </div>
                 <?php
      
        if(isset($_POST['valider'])) { 
            //echo($userH);
            $userH['nom']=$nom;
            $userH['prenom']=$prenom;
            $userH['sexe']=$sexe;
            $userH['ville']=$ville;
            $userH['telephone']=$telephone;
            $userH['date']=$date;
            $userH['role']=$role;
            $utilisateurC->modifierUtilisateur($userH, $_GET['id']);
            header('url=profile.php');  
        } ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="nom" value=" <?php echo $nom; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prenom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="prenom" value=" <?php echo $prenom; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="date" value="<?php echo $date; ?>">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="role" value="<?php echo $role; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sexe</label>
                                            </div>
                                            <div class="col-md-6">

                                                <input id="gridRadios1" value="homme"  name="sexe" type="radio" checked>
                                        
                             
                                    
                                    <h>homme</h>

                                        
                                        <input id="gridRadios2" name="sexe" type="radio" checked>
                                        <h>femme</h>
                                       
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telephone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="phone" value="<?php echo $telephone; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ville</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="city" value="<?php echo $ville; ?>">
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>  
                   
        </div>
        </body>
        </html>