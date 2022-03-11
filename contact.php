<?php

// Include packages and files for PHPMailer and SMTP protocol

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Initialize PHP mailer, configure to use SMTP protocol and add credentials

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port       = 465;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "eclassroom1999@gmail.com";
$mail->Password   = "mloquiqighoyiytq";


$success = "";
$error = "";
$name = $message = $email = "";
$errors = array('name' => '', 'email' => '', 'message' => '');
$mymail = 'prathikwwf@gmail.com';
$myname = 'Quiz Master';


if (isset($_POST["submit"])) {
    if (empty(trim($_POST["name"]))) {
        $errors['name'] = "Your name is required";
    } else {
        $name = SanitizeString($_POST["name"]);
        if (!preg_match('/^[a-zA-Z\s]{6,50}$/', $name)) {
            $errors['name'] = "Only letters and spaces allowed";
        }
    }

    if (empty(trim($_POST["email"]))) {
        $errors["email"] = "Your email is required";
    } else {
        $email = SanitizeString($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Pls give a proper email address";
        }
    }

    if (empty(trim($_POST["message"]))) {
        $errors["message"] = "Please type your message";
    } else {
        $message = SanitizeString($_POST["message"]);
        if (!preg_match("/^[a-zA-Z\d\s]+$/", $message)) {
            $errors["message"] = "Only letters, spaces and maybe numbers allowed";
        }
    }

    if (array_filter($errors)) {
    } else {
        try {

            $mail->setFrom('eclassroom1999@gmail', 'Quiz Master');

            $mail->addAddress($mymail, $myname);

            $mail->Subject = 'Online Quiz Management System - Contact Form';

            $mail->Body = $message;

            // send mail

            $mail->send();

            // empty users input

            $name = $message = $email = "";

            $success = "Message sent successfully";
        } catch (Exception $e) {

            // echo $e->errorMessage(); use for testing & debugging purposes
            $error = "Sorry message could not send, try again";
        } catch (Exception $e) {

            // echo $e->getMessage(); use for testing & debugging purposes
            $error = "Sorry message could not send, try again";
        }
    }
}

function SanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    return stripslashes($var);
}

?>

<!DOCTYPE html>
<html>
<?php require ("header.php");?>


    <style>
        .error {
            color: white;
            background-color: crimson;
            border-radius: 7px;
            text-align: center;
        }

        .success {
            background-color: darkgreen;
            color: white;
            border-radius: 7px;
            text-align: center;
        }
    </style>



  <body class="bg-white" id="top">
    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="
        navbar navbar-main navbar-expand-lg
        bg-default
        navbar-light
        position-sticky
        top-0
        shadow
        py-0
      "
    >
      <div class="container">
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <li class="nav-item dropdown">
            <a href="index.php" class="navbar-brand mr-lg-5 text-white">
                               <img src="assets/img/navbar.png" />
            </a>
          </li>
        </ul>

        <button
          class="navbar-toggler bg-white"
          type="button"
          data-toggle="collapse"
          data-target="#navbar_global"
          aria-controls="navbar_global"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="navbar-collapse collapse bg-default" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-10 collapse-brand">
                <a href="index.html">
                  <img src="assets/img/navbar.png" />
                </a>
              </div>
              <div class="col-2 collapse-close bg-danger">
                <button
                  type="button"
                  class="navbar-toggler"
                  data-toggle="collapse"
                  data-target="#navbar_global"
                  aria-controls="navbar_global"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav align-items-lg-center ml-auto">
		  
		   <li class="nav-item">
              <a href="contact.php" class="nav-link">
                <span class="text-success nav-link-inner--text"
                  ><i class="text-success fas fa-address-card"></i> Contact</span
                >
              </a>
            </li>
		  
							  <li class="nav-item">
			   <div class="dropdown show ">
		  <a class="nav-link dropdown-toggle text-white " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-sign-in-alt"></i> Login</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="loginstud.php">Student</a>
			<a class="dropdown-item" href="login.php">Staff</a>
		  </div>
		</div>
			</li>


            <li class="nav-item">
              <a href="signup.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-user-plus"></i> Sign Up</span
                >
              </a>
            </li>

          
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

<!-- ======================================================================================================================================== -->
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-warning badge-pill mb-3">Contact</span>
          </div>
        </div>

        <div class="row row-content align-text-center">
          <div class="col-12">
            <div class="col-12">
              <div class="card card-body bg-dark">
			  
			  <div class="success"><?php echo $success ?></div>
                <div class="error"><?php echo $error ?></div>
				
                <form
                  action="contact.php"
                  method="post"
                >
                  <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label"
                      ><h6 class="text-white">Name</h6>
                    </label>
                    <div class="col-md-10">
                      <input
                        type="text"
                        class="form-control"
                        required
                        id="name"
                        name="name"
                        placeholder="Full Name"
						value="<?php echo htmlspecialchars($name) ?>"
                      />
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="emailid" class="col-md-2 col-form-label">
                      <h6 class="text-white">Email</h6></label
                    >
                    <div class="col-md-10">
                      <input
                        type="email"
                        class="form-control"
                        required
                        id="email"
                        name="email"
                        placeholder="abc@xyz.com"
						value="<?php echo htmlspecialchars($email) ?>"
                      />
					                          <div class="error"><?php echo $errors["email"] ?></div>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="feedback" class="col-md-2 col-form-label">
                      <h6 class="text-white">Message</h6></label
                    >
                    <div class="col-md-10">
                      <textarea
                        class="form-control"
                        id="message"
                        name="message"
                        placeholder="Your Message..."
                        rows="5"
						<?php echo htmlspecialchars($message) ?>
                      ></textarea>
					                          <div class="error"><?php echo $errors["message"] ?></div>

                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="offset-md-2 col-md-2">
                      <button
                        type="submit"
                        class="btn btn-danger"
						name="submit" id="submit" value="Send"
                      >
                        SEND
                      </button>
                    </div>

                    <div class="offset-md-3 text-justify-content-end">
                      <div class="btn-group" role="group">
                        <a
                          role="button"
                          class="btn btn-info"
                          href="tel:+918317308812"
                          ><i class="fa fa-phone"></i> Call</a
                        >
                        <a role="button" class="btn btn-success" target="_blank" href="http://wa.me/916366004459?text=Message%20From%20Quiz%20Master." 
                          ><i class="fa fa-whatsapp"></i> Whatsapp</a
                        >
                        <a
                          role="button"
                          class="btn btn-primary"
                          href="mailto:parikshithsshetty59@gmail"
                          ><i class="fa fa-envelope-o"></i> Email</a
                        >
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

</section>

	    <?php require("footer.php");?>

</body>

</html>