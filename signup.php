<html>



<?php require ("header.php");?>

<?php

if (isset($_POST['studsu'])) {
    session_start();
    if (isset($_POST['name1']) && isset($_POST['usn1']) && isset($_POST['mail1']) && isset($_POST['phno1']) && isset($_POST['dept1']) && isset($_POST['dob1']) && isset($_POST['gender1']) && isset($_POST['password1']) && isset($_POST['cpassword1'])) {
        require_once 'sql.php';
        $conn = mysqli_connect($host, $user, $ps, $project);       if (!$conn) {
            echo "<script>alert(\"Database error retry after some time !\")</script>";
        }
        $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
        $usn1 = mysqli_real_escape_string($conn, $_POST['usn1']);
        $mail1 = mysqli_real_escape_string($conn, $_POST['mail1']);
        $phno1 = mysqli_real_escape_string($conn, $_POST['phno1']);
        $dept1 = mysqli_real_escape_string($conn, $_POST['dept1']);
        $dob1 = mysqli_real_escape_string($conn, $_POST['dob1']);
        $gender1 = mysqli_real_escape_string($conn, $_POST['gender1']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $cpassword1 = mysqli_real_escape_string($conn, $_POST['cpassword1']);
        if ($password1 == $cpassword1) {
            $sql = "insert into student (usn,name,mail,phno,dept,gender,DOB,pw) values('$usn1','$name1','$mail1','$phno1','$dept1','$gender1','$dob1','$password1')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                alert('successful!');
                window.location.replace(\"index.php\");</script>";
                session_destroy();
            } else {
                echo "<script>
                alert('Data enter by you alreay exist in Database please Sign In');
                window.location.replace(\"index.php\");</script>";
                session_destroy();
            }
        } else {
            echo "<script>
                alert(' Password should be same');
                window.location.replace(\"singup.php\");</script>";
            session_destroy();
        }
    }
}

if (isset($_POST['staffsu'])) {
    session_start();
    if (isset($_POST['name2']) && isset($_POST['staffid']) && isset($_POST['mail2']) && isset($_POST['phno2']) && isset($_POST['dept2']) && isset($_POST['dob2']) && isset($_POST['gender2']) && isset($_POST['password2']) && isset($_POST['cpassword2'])) {
require 'sql.php';
        $conn = mysqli_connect($host, $user, $ps, $project);        if (!$conn) {
            echo "<script>alert(\"Database error retry after some time !\")</script>";
        }
        $name2 = mysqli_real_escape_string($conn, $_POST['name2']);
        $usn2 = mysqli_real_escape_string($conn, $_POST['staffid']);
        $mail2 = mysqli_real_escape_string($conn, $_POST['mail2']);
        $phno2 = mysqli_real_escape_string($conn, $_POST['phno2']);
        $dept2 = mysqli_real_escape_string($conn, $_POST['dept2']);
        $dob2 = mysqli_real_escape_string($conn, $_POST['dob2']);
        $gender2 = mysqli_real_escape_string($conn, $_POST['gender2']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
        $cpassword2 = mysqli_real_escape_string($conn, $_POST['cpassword2']);
        if ($password2 == $cpassword2) {
            $sql = "insert into staff (staffid,name,mail,phno,dept,gender,DOB,pw) values('$usn2','$name2','$mail2','$phno2','$dept2','$gender2','$dob2','$password2')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                alert('successful!');
                window.location.replace(\"index.php\");</script>";
                session_destroy();
            } else {
                echo "<script>
                alert('Data enter by you alreay exist in Database please Sign In');
                window.location.replace(\"index.php\");</script>";
                session_destroy();
            }
        } else {
            echo "<script>
                alert(' Password should be same');
                window.location.replace(\"signup.php\");</script>";
            session_destroy();
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
                <span class="text-success nav-link-inner--text"
                  ><i class="text-success fas fa-user-plus"></i> Sign Up</span
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

<div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-info badge-pill mb-3">Sign Up</span>
          </div>
        </div>
		
<div class="row row-content align-text-center text-white ">
	<div class="col-12 offset-sm-2 col-sm-8 offset-sm-2 ">

                <div class="card card-body  bg-dark">

<div class="col-12  ">
                   <a class="btn btn-danger btn-block" data-toggle="modal" data-target="#teachersignup"  ><p>I'm a Teacher</p> </a>
</div>
<br>				
<div class="col-12  ">  
<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#studentsignup" > <p> I'm a Student</p>  </a>
</div>
                </div>
            </div>
			</div>
	
 <!-- Registration Modal  Teacher -->

    <div id="teachersignup" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sign Up as Staff</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body bg-gradient-danger">
		  
		  
            <form
              class="col s12 l5 white-text"
              method="POST"
			  name="staffSIGNUP"
              autocomplete="new-password"
			 
            >
			
              <div class="form-group row">
                <label
                  for="name"
                  class="col-md-2 col-form-label text-white"
                  >Full Name </label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="form-control"
                    required
                    placeholder="Name"
                    id="first_name"
                    name="name2"
                    type="text"
                    class="validate"
                  />
                </div>
              </div>
			  
			   <div class="form-group row">
                <label
                  for="staffid"
                  class="col-md-2 col-form-label text-white"
                  >Staff ID</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="form-control"
                    required
                    placeholder="Staff ID"
                    id="first_name"
                    name="staffid"
                    type="text"
                    class="validate"
                  />
                </div>
              </div>
			  
			    <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="mail2"
                  >Email</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="Email Address"
                    id="email"
                    name="mail2"
                    type="email"
                    class="validate"
                  />
                </div>
              </div>
			  
			   <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="phno2">Phone</label>
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text form-control"
                    required
                    placeholder="Contact Number"
                    id="phone"
                    name="phno2"
                    type="text"
                    pattern="[6789][0-9]{9}"
                    class="validate"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="firstname"
                  class="col-md-2 col-form-label text-white"
                  for="dept2"
                  >Department</label
                >
                <div class="col-md-10">
                  <select
                    name="dept2"
                    id="blood"
                    class="validate form-control"
                    required
                  >
                  <option value="CSE">CSE</option>
                        <option value="ISE">ISE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="dob2"
                  >Date Of Joining</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="Date of Birth"
                    id="email"
                    name="dob2"
                    type="date"
                    class="validate"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="gender2"
                  class="col-md-2 col-form-label text-white"
                  for="rh"
                  >Gender</label
                >
                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="M"
                      name="gender2"
                      type="radio"
                      required
					  checked
                    />
                    <span class="text-white">Male</span>
                  </label>
                </div>

                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="F"
                      name="gender2"
                      type="radio"
                      required
                    />
                    <span class="text-white">Female</span>
                  </label>
                </div>
              </div>

            
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="password2"
                  >Password</label
                >
                <div class="col-md-10">
                  <input
                    type="password"
                    name="password2"
                    class=" form-control"
                    required
                    placeholder="**********"
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  />
				   <p>  <small class="text-white"> Use minimum 8 Characters with atleast 1 numericals, Capital letter and Special Character.  </small></p>
                </div>
              </div>
			  
			   <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="cpassword2"
                  >Confirm Password</label
                >
                <div class="col-md-10">
                  <input
                    type="password"
                    name="cpassword2"
                    class=" form-control"
                    required
                    placeholder="**********"
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  />
				   <p>  <small class="text-white"> Enter the same password as before, for verification. </small></p>
                </div>
              </div>

          

              <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                  <button class="btn btn-success form-control" type="submit" name="staffsu">
                    Sign Up
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

 <!-- Registration Modal  Student -->

    <div id="studentsignup" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sign Up as Student</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body bg-gradient-primary">
		  
		  
            <form
              class="col s12 l5 white-text"
              method="POST"
			  name="student"
              autocomplete="new-password"
            >
			
              <div class="form-group row">
                <label
                  for="name1"
                  class="col-md-2 col-form-label text-white"
                  >Full Name</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="form-control"
                    required
                    placeholder="Name"
                    id="first_name"
                    name="name1"
                    type="text"
                    class="validate"
                  />
                </div>
              </div>
			  
			   <div class="form-group row">
                <label
                  for="usn1"
                  class="col-md-2 col-form-label text-white"
                  >USN</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="form-control"
                    required
                    placeholder="USN"
                    id="first_name"
                    name="usn1"
                    type="text"
                    class="validate"
                  />
                </div>
              </div>
			  
			    <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="mail1"
                  >Email</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="Email Address"
                    id="email"
                    name="mail1"
                    type="email"
                    class="validate"
                  />
                </div>
              </div>
			  
			   <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="phno1">Phone</label>
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text form-control"
                    required
                    placeholder="Contact Number"
                    id="phone"
                    name="phno1"
                    type="text"
                    pattern="[6789][0-9]{9}"
                    class="validate"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="firstname"
                  class="col-md-2 col-form-label text-white"
                  for="dept1"
                  >Department</label
                >
                <div class="col-md-10">
                  <select
                    name="dept1"
                    id="blood"
                    class="validate form-control"
                    required
                  >
                  <option value="CSE">CSE</option>
                        <option value="ISE">ISE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="dob1"
                  >DOB</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="Date of Birth"
                    id="email"
                    name="dob1"
                    type="date"
                    class="validate"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="gender1"
                  class="col-md-2 col-form-label text-white"
                  for="rh"
                  >Gender</label
                >
                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="M"
                      name="gender1"
                      type="radio"
                      required
					  checked
                    />
                    <span class="text-white">Male</span>
                  </label>
                </div>

                <div class="col-3">
                  <label>
                    <input
                      class="form-control"
                      value="F"
                      name="gender1"
                      type="radio"
                      required
                    />
                    <span class="text-white">Female</span>
                  </label>
                </div>
              </div>

            
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="password1"
                  >Password</label
                >
                <div class="col-md-10">
                  <input
                    type="password"
                    name="password1"
                    class=" form-control"
                    required
                    placeholder="**********"
										pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"

                  />
				  				   <p>  <small class="text-white"> Use minimum 8 Characters with atleast 1 numericals, Capital letter and Special Character.  </small></p>

                </div>
              </div>
			  
			   <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="cpassword1"
                  >Confirm Password</label
                >
                <div class="col-md-10">
                  <input
                    type="password"
                    name="cpassword1"
                    class=" form-control"
                    required
                    placeholder="**********"
										pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"

                  />
				  				   <p>  <small class="text-white"> Enter the same password as before, for verification. </small></p>

                </div>
              </div>

          

              <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                  <button class="btn btn-success form-control" type="submit" name="studsu">
                    Sign Up
                  </button>
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
