<html>
<?php session_start();
$sysotp= $_SESSION["otp"];
$dbmail=$_SESSION["username"];
$password= $_SESSION["pw"];
$type= $_SESSION["type"];?>
<?php require ("header.php");?>
<?php
if (isset($_POST['submit1'])) {
    require_once 'sql.php';
    $conn = mysqli_connect($host, $user, $ps, $project);        if (!$conn) {
            echo "<script>alert(\"Database error retry after some time !\")</script>";
        }else{
        if (isset($_POST['submit1'])) {
                            $usercode1 = $_POST['otp1'];
                            if ($usercode1 == $sysotp) {
                                $sql1 = "update " . $type . " set pw='{$password}' where mail='{$dbmail}'";
                                if (mysqli_query($conn, $sql1)) {
                                    session_unset();
                                    session_destroy();
                                    header("location:index.php");
                                    
                                } elseif (!mysqli_query($conn, $sql1)) {
                                    echo "<script>alert('Security code error')</script>";
                                }
                            }else{
                                echo "<script>alert('security code does't match')</script>";
                            }
                        } else {
                            echo "<script>alert('Please enter the Code')</script>";

                        }
                    }
}
?>

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
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-address-card"></i> Contact</span
                >
              </a>
            </li>
		  
		  <li class="nav-item">
              <a href="login.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-sign-in-alt"></i> Login</span
                >
              </a>
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


<div class="row row-content align-text-center text-white ">
	<div class="col-12 offset-sm-2 col-sm-8 offset-sm-2 ">

                <div class="card card-body  bg-dark">

<div class="col-12  " id="subcode">


 <form
              class="col s12 l5 white-text"
              
              method="POST"
              autocomplete="new-password"
            >
			
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="otp"
                  >Enter the Code</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder=" code"
                    name="otp1"
                    type="number"
                    class="validate"
					required
                  />
                </div>
              </div>

              <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                  <button class="btn btn-success form-control" name="submit1" class="sub" type="submit" value="Reset">
                    Reset
                  </button>
                </div>
              </div>
			  
			   <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                 <a href="login.php">Login</a> &nbsp; New user! <a href="signup.php">SIGN UP</a>
                </div>
              </div>
			                  

            </form>
		   
                </div>
            </div>
			</div>
</div>
</section>

<?php require("footer.php");?>

</body>

</html>