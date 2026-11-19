<?php 
require_once "importance.php"; 

if(!User::loggedIn()){
	Config::redir("login.php"); 
}

$patientNumber = isset($_GET['patient']) ? $_GET['patient'] : '';
?> 

<html>
<head>
	<title>Reply to <?php echo  "Patient Number: ".$patientNumber; ?> <?php echo CONFIG::SYSTEM_NAME; ?></title>
	<?php require_once "inc/head.inc.php";  ?> 
</head>
<body>
	<?php require_once "inc/header.inc.php"; ?> 
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-2'><?php require_once "inc/sidebar.inc.php"; ?></div> <!-- this should be a sidebar --> 
			<div class='col-md-7'>
				<div class='content-area'> 
				<div class='content-header'> 
					Reply to patient Number <?php echo htmlspecialchars($patientNumber); ?> <small>reply appointment</small>
				</div>
				<div class='content-body'> 
					<div class='form-holder'>
					<br /><br /> 
						
						<?php 
						
							if(isset($_POST['doc-message'])){
								$message = $_POST['doc-message']; 
								Appointment::reply($message, $patientNumber);
							}
						
							$form = new Form(2, "post"); 
							$form->init(); 
							$form->textarea("Message", 'doc-message', "");
							$form->close("Reply Appointment");
						
						?> 
						
					</div> 
				</div><!-- end of the content area --> 
				</div> 
				
			</div><!-- col-md-7 --> 

			<div class='col-md-3'>
				<img src='images/doc-background-one.png' class='img-responsive' /> 
			</div> <!-- this should be a sidebar -->
				
		</div> 
	</div> 
</body>
</html>
