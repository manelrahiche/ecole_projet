<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$system_name	=	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title><?php echo ('Login');?> | <?php echo $system_title;?></title>
	

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="assets/images/favicon.png">
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content" style="width:100%;">
			
			<A href="<?php echo base_url();?>" class="logo">
				<img src="uploads/logo.png" height="60" alt="" />
			</A>
			
			<p class="description">
            	<h2 style="color:#cacaca; font-weight:100;">
					<?php echo $system_name;?>
              </h2>
           </p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>Logging you in....</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Please enter correct email and password!</p>
			</div>
			
			<form method="post" role="form" id="form_login">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" data-mask="email" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-block btn-login">
						<i class="entypo-login"></i>
						Login
					</button>
				</div>
				
						
			</form>
			
			
			<div class="login-bottom-links">
				<A href="<?php echo base_url();?>index.php?login/forgot_password" class="link">
					<?php echo get_phrase('forgot_your_password');?> ?
				</A>
				<br>
				<a href="<?php echo base_url();?>index.php?login/" data-toggle="modal" data-target="#addParentModal">
                <i class="entypo-plus"></i>
               <?php echo ('Inscription de parent');?>
			</div>

			<div class="modal fade" id="addParentModal" tabindex="-1" role="dialog" aria-labelledby="addParentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document"> <!-- Classe modal-sm pour réduire la taille -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addParentModalLabel">Inscription Parent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="parentForm" action="<?php echo base_url();?>index.php?add_parent_enligne.php" method="post">
                    <!-- Champs nom et prénom côte à côte -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="parentName">Nom</label>
                            <input type="text" class="form-control" id="parentName" name="parentName" placeholder="Nom" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="parentPrenom">Prénom</label>
                            <input type="text" class="form-control" id="parentPrenom" name="parentPrenom" placeholder="Prénom" required>
                        </div>
                    </div>
                    
                    <!-- Champs mot de passe et confirmation côte à côte -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="parentPassword">Mot de passe</label>
                            <input type="password" class="form-control" id="parentPassword" name="parentPassword" placeholder="Mot de passe" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirmPassword">Confirmer</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmer" required>
                            <div id="passwordError" style="color: red; display: none;">Mots de passe non identiques.</div>
                        </div>
                    </div>

                    <!-- Date de naissance -->
                    <div class="form-group">
                        <label for="parentDOB">Date de naissance</label>
                        <input type="date" class="form-control" id="parentDOB" name="parentDOB" required>
                    </div>

                    <!-- Mobile et profession côte à côte -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="parentMobile">Mobile</label>
                            <input type="text" class="form-control" id="parentMobile" name="parentMobile" placeholder="Mobile" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="parentProfession">Profession</label>
                            <input type="text" class="form-control" id="parentProfession" name="parentProfession" placeholder="Profession" required>
                        </div>
                    </div>

                    <!-- Adresse -->
                    <div class="form-group">
                        <label for="parentAddress">Adresse</label>
                        <textarea class="form-control" id="parentAddress" name="parentAddress" rows="2" placeholder="Adresse" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('parentForm').addEventListener('submit', function(e) {
        var password = document.getElementById('parentPassword').value;
        var confirmPassword = document.getElementById('confirmPassword').value;

        if (password !== confirmPassword) {
            e.preventDefault(); // Empêche l'envoi du formulaire
            document.getElementById('passwordError').style.display = 'block'; // Affiche le message d'erreur
        } else {
            document.getElementById('passwordError').style.display = 'none'; // Cache le message d'erreur
        }
    });
</script>

			
			

<style>
    td {
        border: 1px solid rgba(204, 204, 204, 0.1) !important;
    }
    th {
        border: 1px solid rgba(204, 204, 204, 0.1) !important;
        background-color:rgba(235, 235, 235, 0) !important;
    }
    .icon-hover { cursor:pointer;}
</style>

<script>
    function copy( email , password)
    {
        document.getElementById("email").value  =   email;
        document.getElementById("password").value  =   password;
    }
</script>

<!-- <div class="panel panel-primary" style="background-color:rgba(255, 255, 255, 0);border-color: rgba(235, 235, 235, 0.14);">
    <div class="panel-heading" style="background-color:rgba(255, 255, 255, 0.16);border-color: rgba(204, 204, 204, 0.08);">
        <div class="panel-title">Demo account login credentials</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
        
    <div class="panel-body with-table">
        <table class="table table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>Account</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Copy</th>
                </tr>
            </thead>
        
            <tbody>
                <tr>
                    <td>Admin</td>
                    <td>admin@example.com</td>
                    <td>1234</td>
                    <td>
                        <i class="entypo-target icon-hover tooltip-default" onclick="copy('admin@example.com' , '1234')"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="copy"></i>
                    </td>
                </tr>
                <tr>
                    <td>Teacher</td>
                    <td>teacher@example.com</td>
                    <td>1234</td>
                    <td>
                        <i class="entypo-target icon-hover tooltip-default" onclick="copy('teacher@example.com' , '1234')"
                             data-toggle="tooltip" data-placement="top" title="" data-original-title="copy"></i>
                    </td>
                </tr>
                <tr>
                    <td>Student</td>
                    <td>student@example.com</td>
                    <td>1234</td>
                    <td>
                        <i class="entypo-target icon-hover tooltip-default" onclick="copy('student@example.com' , '1234')"
                             data-toggle="tooltip" data-placement="top" title="" data-original-title="copy"></i>
                    </td>
                </tr>
                <tr>
                    <td>Parent</td>
                    <td>parent@example.com</td>
                    <td>1234</td>
                    <td>
                        <i class="entypo-target icon-hover tooltip-default" onclick="copy('parent@example.com' , '1234')"
                             data-toggle="tooltip" data-placement="top" title="" data-original-title="copy"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div> -->
			
			
			
			
		</div>
		
	</div>
	
</div>

	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-login.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>