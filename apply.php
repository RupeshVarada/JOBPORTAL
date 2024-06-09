
<?php 
session_start();
$vis = 0;
$emp = 0;

if(isset($_SESSION['status']))
{
 if($_SESSION['status'] == 'Employer')
 {
  $emp = 1;
 }
}

 if(!isset($_SESSION['usname']))
 {
  
  $vis = 1;
 }



if(!isset($_SESSION['status']))
{
  echo '<script>alert("Please Login!")</script>';
  header("Location: login.php");
}
if($_SESSION['status'] == 'Employer')
{
  header("Location: login.php");
}

$username = $_SESSION['usname'];
$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}
else{
  $sql = "SELECT CompanyName from postjob";
  $res1= mysqli_query($conn, $sql); 
  
  $sql1 = "SELECT * FROM register WHERE Email = '$username'";
  $res2 = mysqli_query($conn, $sql1);
  $res2 = mysqli_fetch_assoc($res2);
  // echo '<script>alert("'.$res2['Fullname'].'")</script>'; 
}
    

?>
<!doctype html>
<html lang="en">
  <head>
    <title>JOBPORTAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php">JOBPORTAL</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li class="has-children">
                <a >Job Listings</a>
                <ul class="dropdown">
                  <li><a href="job-single.php">Job Seeker</a></li>
                  <li><a href="post-job.php">Post a Job</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a>Pages</a>
                <ul class="dropdown">
                  <li><a href="services.php">Services</a></li>
                  <!--<li><a href="service-single.html">Service Single</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                  <li><a href="portfolio.html">Portfolio</a></li>
                  <li><a href="portfolio-single.html">Portfolio Single</a></li>
                  <li><a href="testimonials.html">Testimonials</a></li>-->
                  <li><a href="faq.php">Frequently Ask Questions</a></li>
                  <li><a href="gallery.php">Gallery</a></li>
                </ul>
              </li>
              <li><a href="blog.php">Blog</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.php">Log In</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
            <?php 
              if($emp && !$vis)
                {
                  echo '<a href="post-job.php" style="font-size: 12px;" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post</a>';
                }
              ?>
              <?php
              if($vis)
              { 
               echo '<a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>';
              }
              else{
                echo '<a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log out</a>';
                echo '<a href="profile.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block" style="margin-left: 10px;">Profile</a>';

              
              }
              ?>           
               </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Application</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="sign.php"><span class="text-white"><strong>Application</strong></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <h2 class="mb-4">Job Application</h2>
            <form action="applied.php" method="post" class="p-4 border rounded" enctype="multipart/form-data">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Full Name</label>
                  <input type="text" id="fname" class="form-control" placeholder="Full Name" name="fullname" value = <?php echo '"'.$res2['Fullname'].'"'; ?> >
                 
                  
                </div>
              </div>
              
         

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Email address" name="email" value = <?php echo '"'.$res2['Email'].'"'; ?> >
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Mobile Number</label>
                  <input type="tel" id="fname" class="form-control" placeholder="Mobile Number" name="mobile"  value = <?php echo '"'.$res2['Mobile'].'"'; ?> >
                </div>
              </div>

              
              

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Work Status</label>
                  <input type="radio" id="stat" name="stat" value="Experienced" > Experienced
                    <input type="radio" id="stat" name="stat" value="Fresher"> Fresher
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Company: </label>
                  <select name="comp">
                    <option value = "sel">SELECT</option>
                    <?php
                      while($r = mysqli_fetch_assoc($res1))
                      {
                        $comp = $r['CompanyName'];
                        echo '<option value="'.$comp.'">'.$comp.'</option>';
                      }
                     
                    ?>
                    
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="company-website-tw d-block">Upload Resume:_________</label>
                <label class="btn btn-primary btn-md-12 btn-file">Browse File<input type="file" name="my_image" id="my_image">
                </label>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" id="send" name ="send" value="Apply Now" class="btn px-4 btn-primary text-white">
                </div>
              </div>
              
            </form>
          </div>
          <!--<div class="col-lg-6">
            <h2 class="mb-4">Log In To JobPortal</h2>
            <form action="#" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Email address">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Log In" class="btn px-4 btn-primary text-white">
                </div>
              </div>

            </form>
          </div>-->

        </div>
      </div>
    </section>
    
    <footer class="site-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5">
          <!--<div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Search Trending</h3>
            <ul class="list-unstyled">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Web Developers</a></li>
              <li><a href="#">Python</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
            </ul>
          </div>-->
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
              <li><a href="about.php">About Us</a></li>
              <li><a href="about.php">Career</a></li>
              <li><a href="blog.php">Blog</a></li>
              
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li><a href="services.php">Support</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright"><small>2022</small></p>
          </div>
        </div>
      </div>
    </footer>
  
  </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>
    
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>
   
   
     
  </body>
</html>