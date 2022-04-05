<?php
include 'scripts.php';


error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

?>
<!-- Browser Detection Code Start -->

<?php
class BrowserDetection {

  private $_user_agent;
  private $_name;
  private $_version;
  private $_platform;

  private $_basic_browser = array (
   'Trident\/7.0' => 'Internet Explorer 11',
   'Beamrise' => 'Beamrise',
   'Opera' => 'Opera',
   'OPR' => 'Opera',
   'Shiira' => 'Shiira',
   'Chimera' => 'Chimera',
   'Phoenix' => 'Phoenix',
   'Firebird' => 'Firebird',
   'Camino' => 'Camino',
   'Netscape' => 'Netscape',
   'OmniWeb' => 'OmniWeb',
   'Konqueror' => 'Konqueror',
   'icab' => 'iCab',
   'Lynx' => 'Lynx',
   'Links' => 'Links',
   'hotjava' => 'HotJava',
   'amaya' => 'Amaya',
   'IBrowse' => 'IBrowse',
   'iTunes' => 'iTunes',
   'Silk' => 'Silk',
   'Dillo' => 'Dillo', 
   'Maxthon' => 'Maxthon',
   'Arora' => 'Arora',
   'Galeon' => 'Galeon',
   'Iceape' => 'Iceape',
   'Iceweasel' => 'Iceweasel',
   'Midori' => 'Midori',
   'QupZilla' => 'QupZilla',
   'Namoroka' => 'Namoroka',
   'NetSurf' => 'NetSurf',
   'BOLT' => 'BOLT',
   'EudoraWeb' => 'EudoraWeb',
   'shadowfox' => 'ShadowFox',
   'Swiftfox' => 'Swiftfox',
   'Uzbl' => 'Uzbl',
   'UCBrowser' => 'UCBrowser',
   'Kindle' => 'Kindle',
   'wOSBrowser' => 'wOSBrowser',
   'Epiphany' => 'Epiphany', 
   'SeaMonkey' => 'SeaMonkey',
   'Avant Browser' => 'Avant Browser',
   'Firefox' => 'Firefox',
   'Chrome' => 'Google Chrome',
   'MSIE' => 'Internet Explorer',
   'Internet Explorer' => 'Internet Explorer',
   'Safari' => 'Safari',
   'Mozilla' => 'Mozilla'  
 );

  private $_basic_platform = array(
    'windows' => 'Windows', 
    'iPad' => 'iPad', 
    'iPod' => 'iPod', 
    'iPhone' => 'iPhone', 
    'mac' => 'Apple', 
    'android' => 'Android', 
    'linux' => 'Linux',
    'Nokia' => 'Nokia',
    'BlackBerry' => 'BlackBerry',
    'FreeBSD' => 'FreeBSD',
    'OpenBSD' => 'OpenBSD',
    'NetBSD' => 'NetBSD',
    'UNIX' => 'UNIX',
    'DragonFly' => 'DragonFlyBSD',
    'OpenSolaris' => 'OpenSolaris',
    'SunOS' => 'SunOS', 
    'OS\/2' => 'OS/2',
    'BeOS' => 'BeOS',
    'win' => 'Windows',
    'Dillo' => 'Linux',
    'PalmOS' => 'PalmOS',
    'RebelMouse' => 'RebelMouse'   
  ); 

  function __construct($ua = '') {
    if(empty($ua)) {
     $this->_user_agent = (!empty($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:getenv('HTTP_USER_AGENT'));
   }
   else {
     $this->_user_agent = $ua;
   }
 }

 function detect() {
  $this->detectBrowser();
  $this->detectPlatform();
  return $this;
}

function detectBrowser() {
 foreach($this->_basic_browser as $pattern => $name) {
  if( preg_match("/".$pattern."/i",$this->_user_agent, $match)) {
    $this->_name = $name;
             // finally get the correct version number
    $known = array('Version', $pattern, 'other');
    $pattern_version = '#(?<browser>' . join('|', $known).')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern_version, $this->_user_agent, $matches)) {
                // we have no matching number just continue
    }
            // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
                //we will have two since we are not using 'other' argument yet
                //see if version is before or after the name
      if (strripos($this->_user_agent,"Version") < strripos($this->_user_agent,$pattern)){
        @$this->_version = $matches['version'][0];
      }
      else {
        @$this->_version = $matches['version'][1];
      }
    }
    else {
      $this->_version = $matches['version'][0];
    }
    break;
  }
}
}

function detectPlatform() {
  foreach($this->_basic_platform as $key => $platform) {
    if (stripos($this->_user_agent, $key) !== false) {
      $this->_platform = $platform;
      break;
    } 
  }
}

function getBrowser() {
  if(!empty($this->_name)) {
   return $this->_name;
 }
}        

function getVersion() {
 return $this->_version;
}

function getPlatform() {
 if(!empty($this->_platform)) {
  return $this->_platform;
}
}

function getUserAgent() {
  return $this->_user_agent;
}

function getInfo() {

 return "<strong>Browser Name:</strong> {$this->getBrowser()}<br/>\n" .
 "<strong>Browser Version:</strong> {$this->getVersion()}<br/>\n" .
 "<strong>Browser User Agent String:</strong> {$this->getUserAgent()}<br/>\n" .
 "<strong>Platform:</strong> {$this->getPlatform()}<br/>";
 $new=$this->getBrowser();
 echo $new;
}
}  

$obj = new BrowserDetection();

$obj->detect()->getInfo();
$new= $obj->getBrowser();

?>




<!-- Browser Detection Code End -->
<!doctype html>
<html lang="en" style="overflow-x: hidden;">

<head>
  <?php include 'head.php'; ?>
</head>
<?php
if($new=='Safari'){
  ?>

  <body id="body" class="scroll-design">
    <?php

  }
  else
  {
    ?>

    <body id="body" class="scroller">
      <?php
    }
    ?>
    <!-- <div class="main-body"></div> -->

    <?php include 'header.php' ?>

    <!-- <article class="scroller"> -->
      <section id="1" class="fst-section">
        <div class="container">
          <div class="text-center top-heading fold-section" data-aos="zoom-in">
            <div class="frame">
              <div class="carousel">
                <div class="change_outer">
                  <div class="change_inner">
                    <div class="element">LIKE IT?</div>
                    <div class="element1">CHECK IT</div>
                    <div class="element">GET IT!</div>
                    <div class="element">LIKE IT?</div>
                  </div>
                </div>
              </div>
            </div>
            <h4>Get it checked and delivered, instantly.</h4>
            <h6>Reliable inspections. Any product, new or pre-loved.</h6>
            <?php
            if (isset($_SESSION['user'])) {

             ?>
             <script>

               var my_url=$.cookie("n_url");
               $(document).ready(function() {
                 $('#now_url').val(my_url);
               });

             </script>
             <div class="col-md-6 offset-md-3">
              <div class="input-group mb-3 top-form">
                <form action="" method="post">
                  <span><input type="url" required class="form-control top-input" name="url" id="now_url" 
                    placeholder="Paste URL of Product Listing..." aria-label="Recipient 's username"
                    aria-describedby="button-addon2"></span>
                    <span>
                      <button class="btn btn-success border-rad" id="button-addon2" <?php if (!isset($_SESSION['uid'])) {
                       echo 'type="button" data-bs-toggle="modal" data-bs-target="#exampleProfile" ';
                     } else {
                       echo 'type="submit"';
                     } ?>>Chek It &nbsp <i style="font-size:22px;"
                     class="fa fa-play"></i></button></span>
                   </form>
                 </div>
               </div>
             <?php } else { ?>
              <div class="col-md-7 mx-auto">
                <div class="input-group mb-3 check-field top-form">
                  <form method="post">
                    <span><input type="url" required class="form-control top-input" id="url_value"
                      placeholder="Paste URL of Product Listing..." aria-label="Recipient 's username"
                      name="initialurl1" aria-describedby="button-addon2"></span>
                      <span><button class="btn btn-success border-rad" type="button" name="Modalfirst1"
                        id="button-addon21" data-bs-toggle="modal" value="checkit"
                        data-bs-target="#exampleModalfirst">Chek
                        It &nbsp <i class="fa fa-play at-check-it"></i></button></span>
                      </form>
                      <script >
                        $("#button-addon21").click(function() {
                          var url = $("#url_value").val();
                                // alert(url);
                                document.cookie = url;

                                $(document).ready(function() {
                                  $.cookie("n_url", url, {
                                    expires: 100
                                  });

                                });
                                $('#now_url').val(document.cookie);
                              });
                            </script>
                          </div>
                        </div>
                        <?php 

                      } ?>
                    </div>



                    <!-- PROFILE MODEL--->


                    <!-- Login / Signup As Facebook Google Modal Form --->
                    <?php
                    if (isset($_POST['Modalfirst']) || !isset($_POST['Modalfirst'])) {
                      if (isset($_POST['initialurl']))
                        $_SESSION['initialurl'] = $_POST['initialurl'];
                      ?>
                      <div class="modal fade modalback  sing-wd-ggl-fb" id="exampleModalfirst" tabindex="-1"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <?php
                          if($new=='Safari'){
                            ?>
                            <div class="modal-body modal-dialog-centered report-main">

                              <?php
                            }
                            else{
                              ?>
                              <div class="modal-body modal-dialog-centered">
                               <?php
                             }
                             ?> 


                             <div class="col-md-8 mx-auto main-ggl-fb-bordr-clr">

                              <form action="" method="post">
                                <span class="h2"><button type="button" class="sign-up-back-button"
                                  id="button-addon2"
                                  style="background:transparent;color:white;border:0px;margin-bottom:10px; position: relative; left: 20px;"
                                  data-bs-toggle="modal" data-bs-target="#exampleModalfirst">
                                  < </button></span>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="popup-heading">
                                        <h3 style="color:white;text-align:center;"><b><i>Sign in for a
                                          better
                                        experience</i></b></h3>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>


                                    <div class="col-md-8 btm-ggl-fb">
                                      <center>
                                        <div class="mb-4">
                                          <a style="text-decoration: none;"
                                          href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;access_type=online&amp;client_id=1050495699213-qbumka744brdm2ou0gl31065raevnih0.apps.googleusercontent.com&amp;redirect_uri=https%3A%2F%2Fchekmate.herokuapp.com%2Findex.php%3Faccount-verified&amp;state&amp;scope=email%20profile&amp;approval_prompt=auto"
                                          type="button" style="width:80%;" name="name"
                                          class="form-control footer-input signininput"
                                          id="exampleFormControlInput1">
                                          <div style="margin-left:-5%;margin-top:0px;font-size:40px;
                                          background:white;color:black;border-radius:20px;width:40px;float:left;"
                                          class="fa fa-google"></div>
                                                            <!-- <div  id="customBtn" class="customGPlusSignIn signinbutton"
                                                                      style="z-index:1 !important;" >
                                                                    Continue with Google</div> -->

                                                                    Continue with Google
                                                                    <?php
                                                                //   echo $login_button;
                                                                  ?>

                                                        </a>
                                                        <!--<div id="name"></div>-->


                                                    </div>
                                                    <div class="mb-4">
                                                        <button type="button" style="width:100%;" name="name"
                                                            class="form-control footer-input signininput"
                                                            id="exampleFormControlInput1">
                                                            <div style="margin-left:-5%;margin-top:0%;float:left;font-size:40px;background:white;color:black;border-radius:50%;padding:5px;width:40px;height:42px;"
                                                                class="fa fa-facebook"></div>
                                                            <div id="customBtn" style="font-size:24px;margin-top:3px;"
                                                                class="fb-login-button signinbutton" data-width=""
                                                                data-size="small" data-button-type="continue_with"
                                                                data-layout="default" data-auto-logout-link="false"
                                                                data-use-continue-as="false">		<?php
    include("config.php");                                                            
		//If no $accessToken is set then user should log in first
		if(isset($accessToken)) {
			if(isset($_SESSION['facebook_access_token'])){
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				// Put short-lived access token in session
				$_SESSION['facebook_access_token'] = (string) $accessToken;
				
				// The OAuth 2.0 client handler helps us manage access tokens
				$oAuth2Client = $fb->getOAuth2Client();
				
				if(!$accessToken->isLongLived()) {
					//Exchanges a short-lived access token for a long-lived one
					try {
						$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
						$_SESSION['facebook_access_token'] = (string) $accessToken;
					} catch (Facebook\Exceptions\FacebookSDKException $e) {
						echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
						exit;
					}
				}			
			}
			
			// Redirect the user back to the same page if url has "code" parameter in query string
			if(isset($_GET['code'])){
				header('Location: ./');
			}
			
			
			// Getting user facebook profile info
			try {
				$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
				$fbUserData = $profileRequest->getGraphNode()->asArray();
				
				//Ceate an instance of the OauthUser class
				$oauth_user_obj = new OauthUser();
				$userData = $oauth_user_obj->verifyUser($fbUserData);
			} catch(FacebookResponseException $e) {
				echo 'Graph returned an error: ' . $e->getMessage();
				session_destroy();
				// Redirect user back to app login page
				header("Location: ./");
				exit;
			} catch(FacebookSDKException $e) {
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				session_destroy();
				// Redirect user back to app login page
				header("Location: ./");
				exit;
			}
		
		
			// Get logout url
			//$logoutURL = $helper->getLogoutUrl($accessToken, 'http://localhost/mit-demos/facebook-login/logout.php');
			
		
			
		} else {
			// Get login url
			$loginUrl = $helper->getLoginUrl($redirectUrl);
			echo '<a href="'.htmlspecialchars($loginUrl).'"><img class="login_image" src="fblogin-btn.png"></a>';
		}
	?>

                                                           </div>

                                                         </button>



                                                        <!--<div class="fb-login-button" data-width="" data-size="large"
                                                            data-button-type="continue_with" data-layout="default" data-auto-logout-link="false"
                                                            data-use-continue-as="false"></div>-->


                                                          </div>
                                                        </center>
                                                      </div>
                                                      <div class="col-md-2">

                                                      </div>
                                                    </div>
                                                    <div class="rw">
                                                      <div class="col-md-2">
                                                      </div>
                                                      <div class="col-md-8 ggl-fb-lg-sn-btn">
                                                        <button class="btn btn-sm btn-success border-rad-popup mt-1"
                                                        style="width:40%;float:left;" name="singup" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalSignup">Signup</button>
                                                        <button class="btn btn-sm btn-success border-rad-popup mt-1"
                                                        style="width:40%;float:right;margin-right:25px;" name="singup"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleLogin">Login</button>

                                                      </div>
                                                    </div>
                                                    <!-- <h5 class="cntnue-as-gst" style="color: transparent;">Continue as Guest</h5> -->

                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <?php
                                      }
                                      ?>
                                    </div>
                                    <!-- Sign Up MODAL--->

                                    <div class="modal fade modalback sign-uppp" id="exampleModalSignup" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <?php
                                        if($new=='Safari'){
                                          ?>                    
                                          <div class="modal-body modal-dialog-centered report-main">
                                            <?php
                                          }
                                          else{
                                            ?>
                                            <div class="modal-body modal-dialog-centered ">
                                             <?php
                                           }
                                           ?> 


                                           <div class="col-md-8 mx-auto sign-up-border">
                                            <div class="row">
                                              <div class="col-md-1">
                                                <span class="h2"><button type="button" class="sign-up-back-button"
                                                  id="button-addon2"
                                                  style="background:transparent;color:white;border:0px;margin-bottom:10px; position: relative; left: 20px;"
                                                  data-bs-toggle="modal" data-bs-target="#exampleModalfirst">
                                                  <</button></span>

                                                </div>

                                                <div class="col-md-10">
                                                  <div class="popup-heading">
                                                    <center><span class="h2 sign-up-heading" style="color:white;">Sign up</span>
                                                    </center>
                                                  </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-12">
                                                  <form action="" method="post">
                                                    <div class="my-3">
                                                      <input type="name" name="name" class="form-control footer-input"
                                                      id="exampleFormControlInput1" placeholder="Enter Name*" required>
                                                    </div>
                                                    <div class="mb-3">
                                                      <input type="tel" name="mobile" pattern="[0-9]{11}"
                                                      class="form-control footer-input" id="exampleFormControlInput1"
                                                      placeholder="Phone no*" required>
                                                    </div>
                                                    <div class="mb-3">
                                                      <input type="email" name="email" class="form-control footer-input"
                                                      id="exampleFormControlInput1" placeholder="Email*" required>
                                                    </div>
                                                    <div class="mb-3">
                                                      <input type="password" name="password" class="form-control footer-input"
                                                      id="exampleFormControlInput1" placeholder="Create Password*"
                                                      required>
                                                    </div>

                                                    <div class="mb-3">
                                                      <input type="password" name="confirm_password"
                                                      class="form-control footer-input" id="exampleFormControlInput1"
                                                      placeholder="Confirm Password*" required>
                                                    </div>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <center>
                                                      <button class="btn btn-success border-rad-popup mt-1 sign-uppp-register"
                                                      style="width:50%;" name="singup" type="submit">Register</button>
                                                    </center>
                                                    <p class="mt-2 sign-in-text"> have an account? Sign in</p>
                                                  </form>

                                                </div>
                                              </div>


                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                <div class="modal fade modalback forror-pswrd" id="exampleModalForget" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">

                                    <?php
                                    if($new=='Safari'){
                                      ?>

                                      <div class="modal-body modal-dialog-centered report-main">
                                       <?php
                                     }
                                     else{
                                       ?>
                                       <div class="modal-body modal-dialog-centered ">
                                        <?php
                                      }
                                      ?>


                                      <div class="row">
                                        <div class="col-md-1">
                                          <span class="h2"><button type="button" id="button-addon2"
                                            style="background:transparent;color:white;border:0px;margin-bottom:10px;"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalfirst">
                                            <</button></span>

                                          </div>

                                          <div class="col-md-10">
                                            <div class="popup-heading">
                                              <center><span class="h2" style="color:white;">Forget Password</span></center>
                                            </div>
                                          </div>

                                          <div class="col-md-2"></div>

                                          <div class="col-md-8">
                                            <form action="" method="post">

                                              <div class="mb-4">
                                                <input type="text" name="email" class="form-control footer-input"
                                                id="exampleFormControlInput1" placeholder="Email/Mobile">
                                              </div>

                                            </div>

                                            <div class="col-md-12">
                                              <center>
                                                <button class="btn btn-success border-rad-popup mt-1" name="forget"
                                                type="submit">Forget Password</button>
                                              </center>
                                            </form>

                                          </div>
                                        </div>


                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>


                            <?php
                            if (isset($_GET['order'])) {
                              ?>
                              <div class="modal modalback user-profile-table" style="display:block;" id="UserProfile" tabindex="-1"
                              aria-labelledby="exampleModal" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="background:#dfdfdf;">
<?php
if($new=='Safari'){
?>

                                  <div class="modal-body modal-dialog-centered report-main">
                                    <?php
                                  }
                                  else{
                                    ?>
                                    <div class="modal-body modal-dialog-centered">
                                      <?php
                                    }
                                    ?>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <a href="index.php" class="close" style="float:right;color:#e5391e;text-decoration:none;font-size: 32px;
                                        margin: -20px -37px 0 0;margin: -20px -36px 0 0px;" data-dismiss="abc">&times;</a>

                                        <div class="popup-heading">
                                          <h4 style="color:#4c4444;font-weight:600;"><i
                                            class="profileee">Profile</i><button type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleProfile"
                                            class="btn btn-lg pncl-icn" style="border:0px;">
                                            <i class="fa fa-edit" style="color:#4c4444;"></i></button></h4>
                                          </div>
                                          <p class="" style="font-weight:600;color:#4c4444;margin-bottom:1px;"> Username:
                                            <?php echo $_SESSION['type']; ?></p>
                                            <p class="" style="color:#4c4444;font-weight:600;margin-bottom:1px;"> Phone No:
                                              <span style="font-weight:400;"> <?php echo $_SESSION['mobile']; ?></span>
                                            </p>
                                            <p class="" style="color:#4c4444;font-weight:600;margin-bottom:1px;"> Email Address:
                                              <span style="font-weight:400;"> <?php echo $_SESSION['email']; ?></span>
                                            </p>
                                            <p class="" style="color:#4c4444;font-weight:600;margin-bottom:1px;"> Shipping
                                              Address:
                                              <span style="font-weight:400;"> <?php echo $_SESSION['address']; ?></span>
                                            </p>
                                            <br>
                                            <div class="popup-heading">
                                              <h4 class="my-orders" style="color:#4c4444;font-weight:600;font-size: 30px; ">
                                                <i>My
                                                Orders </i>
                                              </h4>
                                            </div>
                                            <div class="table table-responsive"
                                            style="border:1px solid #4c4444;border-radius:20px;">
                                            <table class="order-tbl" border="1"
                                            style="width:100%;border-color:#4c4444;text-align:center;margin-bottom:0px;">
                                            <tr class="order-th" style="background:#58606d;color:#e7e7e7;opacity:1;">
                                              <td style="border-left:0px;">Order No</td>
                                              <td style="border-color:#dfdfdf;">Date</td>
                                              <td style="border-color:#dfdfdf;">Product Type</td>
                                              <td style="border-color:#dfdfdf;">Status</td>
                                              <td style="border-color:#dfdfdf;">Checkmate Score</td>
                                            </tr>
                                            <!-- Orders -->
                                            <?php
                                            $showone = "false";
                                            $showtwo = "false";
                                            $showthree = "false";
                                            $showfour = "false";
                                            $ordx = '0';
                                            $sqx = "Select taskid from tasks where userid='" . $_SESSION['uid'] . "'";
                                            $pq_res = $conn->query($sqx);
                                            if ($pq_res->num_rows > 0) {
                                              while ($pq_res->fetch_assoc()) {
                                                $ordx++;
                                              }
                                            } else {

                                            }
                                            if ($ordx <= 1) {
                                              $showone = "true";
                                            } elseif ($ordx <= 2) {
                                              $showtwo = "true";
                                            } elseif ($ordx <= 3) {
                                              $showthree = "true";
                                            } else {
                                              $showfour = "true";
                                            }

                                            $orders = 0;
                                            $offset = 0;
                                            if (isset($_GET['offset']))
                                              $offset = $_GET['offset'];

                                            $backoffset = $offset - 3;
                                            $nextoffset = $offset + 3;
                                            if ($backoffset < 0) {
                                              $backoffset = 0;
                                            }

                                            date_default_timezone_set("Asia/Karachi");
                                            $sq = "Select * from tasks where userid='" . $_SESSION['uid'] . "'  limit 3 offset $offset";
                                            $sq_res = $conn->query($sq);
                                            if ($sq_res->num_rows > 0) {
                                              while ($sq_row = $sq_res->fetch_assoc()) {

                                                $dto = $sq_row['submission_date'];
                                                $current_date=Date('Y-m-d h:i:sa');
                                                // echo $current_date;

                                                // $minutes_to_add = 720;

                                                // $time = new DateTime($dto);
                                                // $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                                                // $stamp = $time->format('Y-m-d h:i:sa');
                                                // $dt = date('Y-m-d h:i:sa');
                                                // $dt = strtotime($dt);
                                                $orders++;
                                                ?>

                                                <tr class="tbl-order-tr">
                                                  <td><?php echo $sq_row['taskid']; ?></td>
                                                  <td><?php echo $sq_row['submission_date']; ?></td>
                                                  <td><?php echo $sq_row['product_type']; ?></td>
                                                  <td><?php //echo $sq_row['status'];  ?>

                                                  <?php
                                                  if ($current_date > $dto) {
                                                    echo $sq_row['status'];
                                                  } else {
                                                    echo "Invalid Order";
                                                  }
                                                  ?>

                                                  <td><?php echo $sq_row['rating']; ?>
                                                  <?php
                                                  if ($sq_row['status'] != "Processing") {
                                                    ?>
                                                    <a href="report/index.php?task=<?php echo $sq_row['taskid']; ?>"
                                                      style="font-size:12px;color:#e5391e;font-weight:bold;text-decoration:none;">
                                                    View Report </a>
                                                    <?php
                                                  } else {
                                                    ?>
                                                    <a href="#"
                                                    style="font-size:12px;color:#e5391e;font-weight:bold;text-decoration:none;">Inactive
                                                  </a>
                                                  <?php
                                                }
                                                ?>
                                              </td>
                                            </tr>
                                            <?php
                                          }
                                        } else {
                                          echo "<tr>
                                          <td align=center colspan=5><i>No Order Found</i></td>
                                          </tr>";
                                          $nextoffset = $offset - 3;
                                        }
                                        ?>
                                      </table>
                                    </div>
                                    <center>
                                      <div style="background:transparent;border:2px solid #4c4444a3;padding:0px 5px 0px 5px;font-size:22px;border-radius:30px;width:70px;display:flex;height:25px;    margin-bottom: 30px;
                                      ">
                                      <a href="?order&offset=<?php echo $backoffset; ?>" class="btn btn-sm"
                                        style="background:transparent;border-left:0px #4c4444a3;border-right:0px#4c4444a3;border-bottom:0px #4c4444a3;border-top #4c4444a3:0px;height:27px;padding:0px;width:30px;font-size:25px;margin-top: -9px; color:#4c4444a3;">
                                        < </a> <span style="    display: inline;
                                        margin-top: -7px;
                                        font-size: 24px;
                                        margin-left: 2px;color:#4c4444a3;">|</span>
                                        <a href="?order&offset=<?php echo $nextoffset; ?>"
                                          class="btn btn-sm"
                                          style="background:transparent;border-left:0px solid #4c4444a3;border-right:0px #4c4444a3;border-top:0px #4c4444a3;height: 25px;padding:0px 0px 0px 0px;width:36px;border-bottom:0px #4c4444a3;font-size:25px;margin-top:-9px;color:#4c4444a3;">
                                          > </a>
                                        </div>
                                      </center>
                                      <div class="popup-heading">
                                        <h4 class="h4 mycredit" style="float:left;color:#4c4444;font-weight:600;
                                        font-size: 30px;
                                        "><i>My Credit Score </i></h4>
                                        <p style="float:left;color:#4c4444;font-size:9px;text-align:center;width:250px;height: 100px;
                                        line-height: 12px;
                                        margin-top: 8px;
                                        margin-left: -15px;
                                        text-align: initial;"><i>Purchasing Allowance that Chekmate<br> extends on your behalf
                                        before COD</i></p>
                                      </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top:-70px;color:#e5391e;">

                                      <div class="inside-credit-score"
                                      style="width:10%;text-align:center;margin-left:-5px;float:left;">
                                      <i class="fa fa-check" style="
                                      <?php
                                      if ($showone == "true") {
                                        echo 'background:#e5391e;';
                                      } else {
                                        echo 'background:#9a9da4;color:#9a9da4;';
                                      }
                                      ?>
                                      font-size:24px;color:#dfdfdf;padding:10px;border-radius:30px;"></i>
                                      <br><i style="font-weight:600;<?php
                                      if ($showone == "true") {
                                        echo 'color:#e5391e;';
                                      } else {
                                        echo 'color:#9a9da4;';
                                      }
                                      ?>">Rs.25,000</i>

                                    </div>
                                    <div class="inside-credit-score"
                                    style="width:15%;text-align:center;margin-left:40px;float:left;">
                                    <i class="fa fa-check" style="
                                    <?php
                                    if ($showtwo == "true") {
                                      echo 'background:#e5391e;';
                                    } else {
                                      echo 'background:#9a9da4;color:#9a9da4;';
                                    }
                                    ?>
                                    font-size:24px;color:#dfdfdf;padding:10px;border-radius:30px;"></i>
                                    <br><i style="<?php
                                    if ($showtwo == "true") {
                                      echo 'color:#e5391e;';
                                    } else {
                                      echo 'color:#9a9da4;';
                                    }
                                    ?>font-weight:600;">Rs.35,000</i>
                                    <div class="inner"
                                    style="border-radius:15px;   position:absolute;z-index:1 !important;background:#808080b8;padding:2px 2px 2px 2px;margin-top:-50px;margin-left:-10px;width:100px;border:1px solid white;height:40px;">
                                    <p style="color:white;font-size:8px;" class="msg" align=center>Increase
                                      purchase
                                    allowance with more assessments</p>
                                  </div>
                                </div>
                                <div class="inside-credit-score"
                                style="width:15%;text-align:center;margin-left:40px;float:left;">

                                <i class="fa fa-check"
                                style="<?php
                                if ($showthree == "true") {
                                  echo 'background:#e5391e;';
                                } else {
                                  echo 'background:#9a9da4;color:#9a9da4;';
                                }
                                ?>font-size:24px;color:#dfdfdf;padding:10px;border-radius:30px;display:inline-block;z-index:1;"></i>
                                <br><i style="<?php
                                if ($showthree == "true") {
                                  echo 'color:#e5391e;';
                                } else {
                                  echo 'color:#9a9da4;';
                                }
                                ?>font-weight:600;">Rs.50,000</i>
                                <div class="inner"
                                style="border-radius:15px;   position:absolute;z-index:1 !important;background:#808080b8;padding:2px 2px 2px 2px;margin-top:-50px;margin-left:-10px;width:100px;border:1px solid white;height:40px;">
                                <p style="color:white;font-size:8px;" class="msg" align=center>Increase
                                  purchase
                                allowance with more assessments</p>
                              </div>
                            </div>
                            <div class="inside-credit-score"
                            style="width:15%;text-align:center;margin-left:40px;float:left;">
                            <i class="fa fa-check" style="<?php
                            if ($showfour == "true") {
                              echo 'background:#e5391e;';
                            } else {
                              echo 'background:#9a9da4;color:#9a9da4;';
                            }
                            ?>font-size:24px;color:#dfdfdf;padding:10px;border-radius:30px;"></i>
                            <br><i style="<?php
                            if ($showfour == "true") {
                              echo 'color:#e5391e;';
                            } else {
                              echo 'color:#9a9da4;';
                            }
                            ?>font-weight:600;">Rs.50,000+</i>
                            <div class="inner"
                            style="border-radius:15px;   position:absolute;z-index:1 !important;background:#808080b8;padding:2px 2px 2px 2px;margin-top:-50px;margin-left:-10px;width:100px;border:1px solid white;height:40px;">
                            <p style="color:white;font-size:8px;" class="msg" align=center>Increase
                              purchase
                            allowance with more assessments</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <?php
          }
          ?>




          <?php include 'login-modal.php' ?>
          <?php include 'order-now-modal.php' ?>
          <?php
          if (isset($_GET['accountnotexists'])) {
            ?>
            <div class="modal modalback" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="background:transparent;border:0px;">
                <div class="modal-body modal-dialog-centered">

                  <center>
                    <div class="alert alert" style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;
                    margin-right:25%;border:2px solid white;">
                    <i class="fa fa-times"
                    style="width:40px;color:black;background:white;border-radius:30px;font-size:40px;"></i>
                    <br>
                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                            <i style="color:white;font-size:38px;font-weight:bold;">Error</i>
                            <p align=center style="color:white;font-size:18px;"><br>
                              Your Account Doesnot Exists.
                              <a href="index.php" class="  btn btn-lg"
                              style="color:white;border:2px solid white;border-radius:25px;width:120px">OK</a>
                              <br><br>
                            </p>
                          </div>
                        </center>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>

              <?php
              if (isset($_GET['forget-otp'])) {
                ?>
                <div class="modal ostp" id="exampleModalForget" style="display:block;margin-top:80px;" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="background:transparent;border:0px;">
                    <?php
                    if($new=='Safari'){
                      ?>

                      <div class="modal-body modal-dialog-centered report-main">
                        <?php
                      }
                      else{
                        ?>
                        <div class="modal-body modal-dialog-centered">
                         <?php
                       }
                       ?>   



                       <center>
                        <div class="alert alert forgot-otp"
                        style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">
                        <!-- <a style="color:white !important;float:right;text-decoration:none;"  href="?">X</a> -->

                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
    <i style="color:white;font-size:32px;font-weight:bold;" class="reset-word">Reset
    Password OTP Verification</i>
    <p align=center style="color:white;font-size:18px;">
      <form action="" method="post">
        <input type="text" name="otp_code" placeholder="Enter OTP CODE" required
        class="form-control">
        <br><br>
        <button type="submit" name="otp_check_forget" class="btn btn-lg"
        style="color:white;border:2px solid white;border-radius:25px;width:auto;">Verify
      OTP</button>
    </form>
    <br>
  </p>
</div>
</center>

</div>
</div>
</div>
</div>
<?php
}
?>







<?php
if (isset($_GET['sucess'])) {
  ?>
  <div class="modal dedeeeee" id="exampleModalSignin" style="display:block;" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:transparent;border:0px;">
      <?php
if($new=='Safari'){
?>

      <div class="modal-body modal-dialog-centered report-main">
 <?php
 }
 else{
 ?>
 <div class="modal-body modal-dialog-centered">
  <?php
}
?>


        <center style="width: 100%;">
          <div class="alert alert lst-ok-plc-bg-img" style="    border-radius: 20px;
          background-image: url(./images/bg-old.jpg);
          border-radius:0;
          height: 101vh;
          width: 101vw;
          z-index: 9999;
          position:relative;
          background-size: 100% 100%;
          background-repeat: no-repeat;
          transform: translate(-361px, 1px);
          position: fixed;
          top: 0;
          height: 100vh;">
          <div class="dedee">
            <i class="" style="color:black;border-radius:30px;font-size:50px; ">
              <img src="images/ttick.png" alt="" class="img-fluid"
              style="max-width:17%;margin-bottom: -20px;">
            </i>
            <br>
                                        <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                                <i class="doneee"
                                style="color:white;font-size:38px;font-weight:bold;font-family: 'centraextrabolditalic';">Done!</i>
                                <p align=center style="color:white;font-size:18px;    margin: -20px 0 0 0;"><br>
                                  Your Order ID:<strong><?php echo $_GET['oid']; ?></strong>
                                  <br>We will get in touch with you shortly<br><br>
                                  <a href="index.php" class="btn btn-lg lstbg-fit-btn"
                                  style="color:white;border:2px solid white;border-radius:25px;width:120px;margin-top:-20px">OK</a>
                                  <br><br>
                                </p>
                              </div>
                            </div>
                          </center>

                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
                ?>

                <?php
                if (isset($_GET['sucess_email'])) {
                  ?>
                  <div class="modal modalback" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background:transparent;border:0px;">
                      <?php
if($new=='Safari'){
?>

                      <div class="modal-body modal-dialog-centered report-main">
                        <?php
                      }
                      else{
                        ?>
                        <div class="modal-body modal-dialog-centered">
                          <?php
                        }
                        ?>


                        <center style="width: 100%;">
                          <div class="alert alert"
                          style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">
                          <i class="fa fa-check"
                          style="color:black;background:white;border-radius:30px;font-size:50px;"></i>
                          <br>
                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                            <i style="color:white;font-size:38px;font-weight:bold;">Done!</i>
                            <p align=center style="color:white;font-size:18px;"><br>
                              Your Query Submitted Successfully to
                              <strong><?php echo "Chekmate Team"; ?></strong>
                              <br>We will get in touch with you shortly<br><br>
                              <a href="index.php" class="btn btn-lg"
                              style="color:white;border:2px solid white;border-radius:25px;width:120px">OK</a>
                              <br><br>
                            </p>
                          </div>
                        </center>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>




              <?php
              if (isset($_GET['paswordchanged'])) {
                ?>
                <div class="modal" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="background:transparent;border:0px;">

                    <?php
if($new=='Safari'){
?>

                    <div class="modal-body modal-dialog-centered report-main">
                      <?php
                    }
                    else{
                      ?>
                      <div class="modal-body modal-dialog-centered">
                        <?php
                      }
                      ?>


                      <center style="width: 100%;">
                        <div class="alert alert alert-design"
                        style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">
                        <i class="fa fa-chec" style="color:black;border-radius:30px;font-size:50px;">
                          <img src="images/ttick.png" alt="" class="img-fluid" style="max-width:67%">
                        </i>
                        <br>
                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                            <i style="color:white;font-size:38px;font-weight:bold;">Done!</i>
                            <p align=center style="color:white;font-size:18px;">
                              <span>
                                Your Password Has Been Changed Successfully!
                              </span><br><br>
                              <a href="index.php" class="btn btn-lg span-design"
                              style="color:white;border:2px solid white;border-radius:25px;width:120px">OK</a>
                              <br><br>
                            </p>
                          </div>
                        </center>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>






              <?php
              if (isset($_GET['forget_otp'])) {
                ?>
                <div class="modal ostp" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="background:transparent;border:0px;">
                    <?php
                    if($new=='Safari'){
                      ?>

                      <div class="modal-body modal-dialog-centered report-main">
                        <?php
                      }
                      else{
                        ?>
                        <div class="modal-body modal-dialog-centered ">
                          <?php
                        }
                        ?>  
                        <center>
                          <div class="alert alert"
                          style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">

                          <!-- <a style="color:white !important;float:right;text-decoration:none;"  href="?">X</a> -->
                          <br>
                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                            <i style="color:white;font-size:38px;font-weight:bold;">OTP Verification</i>
                            <p align=center style="color:white;font-size:18px;">
                              <form action="" method="post">
                                <input type="text" name="otp_code" placeholder="Enter OTP CODE" required
                                class="form-control">

                                <button type="submit" name="otp_check" class="btn btn-lg"
                                style="color:white;border:2px solid white;border-radius:25px;width:auto;">Verify
                              OTP</button>
                            </form>
                            <br><br>
                          </p>
                        </div>
                      </center>

                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
            <?php
            if (isset($_GET['otp'])) {
              ?>
              <div class="modal ostp" id="exampleModalSignin" style="display:block;margin-top:40px;" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background:transparent;border:0px;">
                  <?php
                  if($new=='Safari'){
                    ?>

                    <div class="modal-body modal-dialog-centered report-main">
                      <?php
                    }
                    else{
                      ?>
                      <div class="modal-body modal-dialog-centered">
                        <?php
                      }
                      ?>
                      <?php
                      if($new=='Safari'){
                        ?>

                        <center style="width: 100%;">
                          <?php
                        }
                        else{
                          ?>
                          <center>
                            <?php
                          }
                          ?>
                          <div class="alert alert"
                          style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">

                          <!-- <a style="color:white !important;float:right;text-decoration:none;"  href="?">X</a> -->

                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
    <i style="color:white;font-size:38px;font-weight:bold;">OTP Verification</i>
    <p align=center style="color:white;font-size:18px;">
      <form action="" method="post">
        <input type="text" name="otp_code" placeholder="Enter OTP CODE" required
        class="form-control">

        <button type="submit" name="otp_check" class="btn btn-lg"
        style="color:white;border:2px solid white;border-radius:25px;width:auto;">Verify
      OTP</button>
    </form>
    <br>
  </p>
</div>
</center>

</div>
</div>
</div>
</div>
<?php
}
?>

<?php
if (isset($_GET['wrong-otp'])) {
  ?>
  <div class="modal ostp" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:transparent;border:0px;">
      <div class="modal-body modal-dialog-centered">
        <center>
          <div class="alert alert"
          style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">

          <!-- <a style="color:white !important;float:right;text-decoration:none;"  href="?">X</a> -->

                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                                    <i style="color:white;font-size:30px;font-weight:bold;">Wrong OTP <br> Verification
                                    Failed!</i>
                                    <p align=center style="color:white;font-size:18px;">
                                      <form action="" method="get">
                                        <button type="submit" name="forget-otp" class="btn btn-lg"
                                        style="color:white;border:2px solid white;border-radius:25px;width:auto;"
                                        data-bs-toggle="modal" data-bs-target="#example">Try Again</button>
                                      </form>
                                    </p>
                                  </div>
                                </center>

                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                      ?>

                      <?php
                      if (isset($_GET['account-verified-2'])) {
                        ?>
                        <div class="modal ostp" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content" style="background:transparent;border:0px;">
                            <div class="modal-body modal-dialog-centered">
                              <center>
                                <div class="alert alert verified-div"
                                style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">

                                <a style="color:white !important;float:right;text-decoration:none;" href="?">X</a>

                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
    <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
    <i style="color:white;font-size:30px;font-weight:bold;"
    class="verified-div-text">Congrats Your<br> Password Has Been Changed!</i>
    <p align=center style="color:white;font-size:18px;">

      <a href="?" class="btn btn-lg"
      style="color:white;border:2px solid white;border-radius:25px;width:auto;">Place
    Your Order</a>

  </p>
</div>
</center>

</div>
</div>
</div>
</div>
<?php
}
?>

<?php
if (isset($_GET['account-verified'])) {
  ?>
  <div class="modal" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:transparent;border:0px;">
      <div class="modal-body modal-dialog-centered">
        <center>
          <div class="alert alert"
          style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:25%;margin-right:25%;border:2px solid white;">

          <a style="color:white !important;float:right;text-decoration:none;" href="?">X</a>
          <br>
                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                            <i style="color:white;font-size:30px;font-weight:bold;">Congrats Your<br> Account
                            Verified!</i>
                            <p align=center style="color:white;font-size:18px;">

                              <a href="?" class="btn btn-lg"
                              style="color:white;border:2px solid white;border-radius:25px;width:auto;">Place
                            Your First Order</a>

                          </p>
                        </div>
                      </center>

                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
            <?php
            if (isset($_GET['hold'])) {
              ?>
              <div class="modal modalback on-hlod-account" id="exampleModalSignin" style="
              margin-top: 40px;
              z-index: 0;
              " tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background:transparent;border:0px;">
                  <div class="modal-body modal-dialog-centered">
                    <center>
                      <div class="alert alert"
                      style="border-radius:20px;z-index:1;background:#ffffff45;margin-top:-10%;margin-left:15%;margin-right:15%;border:2px solid white;">

                      <a style="color:white !important;float:right;text-decoration:none;" href="?">X</a>
                      <br>
                                    <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                            <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                            <p style="
                            color:white;
                            font-weight: 100;
                            font-family: 'centrabook';
                            ">Dear customer,<br> Your Account is on hold. For more information contact.<br>Chekmate
                          helpline 0343 CHEK (2435) 000</p>
                          <p align=center style="color:white;font-size:18px;">
                            <br>
                            <a href="?" class="btn btn-lg"
                            style="color:white;border:2px solid white;border-radius:25px;width:150px;"><b>Ok</b></a>

                          </p>
                        </div>
                      </center>

                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>



            <?php
            include 'create-order.php';
            ?>


          </div>
        </section>


        <div class="modal fade modalback" id="exampleModalSignin1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <?php
            if($new=='Safari'){
              ?>                  
              <div class="modal-body modal-dialog-centered report-main">

                <?php
              }
              else{
                ?>
                <div class="modal-body modal-dialog-centered ">
                 <?php
               }
               ?>                                        

               <div class="row">

                <div class="col-md-1">
                  <span class="h2"><button type="button" id="button-addon2"
                    style="background:transparent;color:white;border:0px;margin-bottom:10px;"
                    data-bs-toggle="modal" data-bs-target="#exampleModalfirst">
                    <</button></span>

                  </div>

                  <div class="col-md-10">

                  </div>

                  <div class="col-md-1"></div>

                  <div class="col-md-12">
                    <form action="" method="post" autocomplete="off">

                      <div class="mb-4">
                        <input type="email" name="email" class="form-control footer-input"
                        id="exampleFormControlInput1" placeholder="Username*" autocomplete="off">
                      </div>
                      <div class="mb-4">
                        <input type="password" name="password" class="form-control footer-input"
                        id="exampleFormControlInput1" placeholder="Password*">
                      </div>

                    </div>

                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                      <span class="h2"><button type="button" id="button-addon2"
                        style="background:transparent;color:white;border:0px;margin-bottom:10px;"
                        data-bs-toggle="modal" data-bs-target="#exampleModalfirst">
                        <</button></span>
                        <center>
                          <button class="btn btn-success border-rad-popup mt-1" style="width:50%;"
                          name="singup" type="submit">Login</button>
                          <br><br>
                          <p style="color:white;">Don't have an account?<button type="button"
                            id="button-addon2"
                            style="background:transparent;color:white;border:0px;margin-bottom:10px;"
                            data-bs-toggle="modal" data-bs-target="#exampleModalfirst">Signup For
                          Free</button></p>
                        </center>
                      </form>

                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
          <!-- </div>/ -->








          <?php
          if (isset($_GET['showrecovery'])) {
            ?>

            <div class="modal modalback newpass" style="display:block;" id="exampleLogin" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="background:transparent;border:0px;">
                <div class="modal-body modal-dialog-centered new-pass"
                style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:15%;margin-right:15%;border:2px solid white;">
                <div class="row">
                  <div class="col-md-12">
                    <div class="popup-heading">
                      <h2 class="new-pass-text">New Password</h2>
                      <form action="" method="post">

                        <div class="mb-4">
                          <input type="password" name="password" required
                          class="form-control footer-input new-pass-txtbox"
                          id="exampleFormControlInput1" placeholder="password">
                        </div>

                        <button class="btn btn-success border-rad-popup mt-1 new-pass-btn"
                        name="changepass" type="submit">Change Password</button>
                      </form>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
      }
      ?>




        <!-- 
<<<<<<< HEAD
    <div class="modal modalback newpass enter-order" id="validateorder" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background:transparent;border:0px;">
                <div class="modal-body modal-dialog-centered new-pass"
                    style="border-radius:20px;z-index:1;margin-top:-10%;margin-left:15%;margin-right:15%;border:2px solid white;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="popup-heading">n
                                <h2 class="new-pass-text">Enter Report ID</h2>
                                <form action="" method="post">
                                  ======= -->

                                  <div class="modal modalback newpass enter-order" id="validateorder" tabindex="-1"
                                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="background:transparent;border:0px;">
                                      <?php
                                      if($new=='Safari'){
                                        ?>
                                        <div class="modal-body modal-dialog-centered new-pass report-main"style="border-radius:20px;z-index:1;margin-top:-10%;margin-left:15%;margin-right:15%;border:2px solid white;">
                                          <div class="row report-row">
                                            <?php 
                                          }
                                          else{
                                            ?>

                                            <div class="modal-body modal-dialog-centered new-pass" style="border-radius:20px;z-index:1;margin-top:-10%;margin-left:15%;margin-right:15%;border:2px solid white;">
                                              <div class="row">
                                               <?php
                                             }

                                             ?>


                                             <div class="col-md-12">
                                              <div class="popup-heading">
                                                <button type="button" class="sign-up-back-button"
                                                id="button-addon2"
                                                style="background:transparent;color:white;border:0px;margin-bottom:10px; font-size: 25px;"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalfirst">
                                                < </button>
                                                <h2 class="new-pass-text">Enter Report ID</h2>
                                                <form action="" method="post">

                                                  <div class="mb-4">
                                                    <input type="text" name="oid" required
                                                    class="form-control footer-input new-pass-txtbox"
                                                    id="exampleFormControlInput1" placeholder="Report ID">
                                                  </div>

                                                  <button class="btn btn-success border-rad-popup mt-1 new-pass-btn"
                                                  name="validateorder" type="submit">Validate</button>
                                                </form>

                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <?php
                                  if (isset($_POST['validateorder'])) {
                                    $oid = $_POST['oid'];
                                    $asd = "Select taskid from tasks where taskid='" . $oid . "' and status!='Processing'";
                                    $resc = $conn->query($asd);
                                    if ($resc->num_rows > 0) {
        // Validated Order
                                      ?>
                                      <div class="modal modalback" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="background:transparent;border:0px;">
                                          <div class="modal-body modal-dialog-centered">
                                            <center>
                                              <div class="alert alert"
                                              style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:15%;margin-right:15%;border:2px solid white;">

                                              <a style="color:white !important;float:right;text-decoration:none;" href="?">X</a>
                                              <br>
                                <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                                <i style="color:white;font-size:16px;font-weight:bold;">Dear customer,<br> Your Order No
                                  is
                                  Validated. For more information contact.<br>Chekmate helpline 0343 CHEK (2435)
                                000</i>
                                <p align=center style="color:white;font-size:18px;">
                                  <br>
                                  <a href="?" class="btn btn-lg"
                                  style="color:white;border:2px solid white;border-radius:25px;width:150px;"><b>Ok</b></a>

                                </p>
                              </div>
                            </center>

                          </div>
                        </div>
                      </div>
                    </div>


                    <?php
                  } else {
        // INValidated Order
                    ?>
                    <div class="modal modalback" id="exampleModalSignin" style="display:block;margin-top:80px;" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content" style="background:transparent;border:0px;">
                        <div class="modal-body modal-dialog-centered">
                          <center>
                            <div class="alert alert"
                            style="border-radius:20px;z-index:1;background:#808080d1;margin-top:-10%;margin-left:15%;margin-right:15%;border:2px solid white;">

                            <a style="color:white !important;float:right;text-decoration:none;" href="?">X</a>
                            <br>
                                <!--<i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                <i class="fa fa-circle" style="color:white;font-size:16px;"></i>
                                <i class="fa fa-circle" style="color:white;font-size:16px;"></i>-->
                                <i style="color:white;font-size:16px;font-weight:bold;">Dear customer,<br> Your Order No
                                  is
                                  Invalid. For more information contact.<br>Chekmate helpline 0343 CHEK (2435) 000</i>
                                  <p align=center style="color:white;font-size:18px;">
                                    <br>
                                    <a href="?" class="btn btn-lg"
                                    style="color:white;border:2px solid white;border-radius:25px;width:150px;"><b>Ok</b></a>

                                  </p>
                                </div>
                              </center>

                            </div>
                          </div>
                        </div>
                      </div>

                      <?php
                    }
                  }
                  ?>



                  <div class="modal fade" id="exampleLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <?php
                        if($new=='Safari'){
                          ?>                  
                          <div class="modal-body modal-dialog-centered report-main">
                           <?php
                         }
                         else{
                           ?>   
                           <div class="modal-body modal-dialog-centered">
                             <?php
                           }
                           ?>                                      
                           <div class="row">
                            <div class="col-md-7">
                              <div class="popup-heading">
                                <h2>Login</h2>
                                <form action="" method="post">

                                  <div class="mb-4">
                                    <input type="email" name="email" class="form-control footer-input"
                                    id="exampleFormControlInput1" placeholder="Email">
                                  </div>
                                  <div class="mb-4">
                                    <input type="password" name="password" class="form-control footer-input"
                                    id="exampleFormControlInput1" placeholder="password">
                                  </div>

                                  <button class="btn btn-success border-rad-popup mt-1" name="login"
                                  type="submit">Login</button>
                                </form>
                                <p class="mt-2"> New User
                                  <span> <button class="btn btn-orange btn-sm" type="button" id="button-addon1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Signup</button></span>
                                  </p>

                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="popup-heading">
                                  <div class="img-place"><img style="opcaity:1;" src="images/login.png" height="100%"
                                    width="100%"></div>
                                    <form action="" method="get">
                                      <button class="btn btn-success border-rad-popup mt-4" type="submit"
                                      name="guest-login">Guest Login!</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>








        <!-- </div>
        </section> -->






        <div class="modal fade profile-change-pswrd" id="exampleProfile" tabindex="-1" style="z-index:! !important;"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content profilo">
            <?php
if($new=='Safari'){
?>

            <div class="modal-body modal-dialog-centered report-main">
              <?php
            }
            else{
              ?>
              <div class="modal-body modal-dialog-centered">
                <?php
              }
              ?>

              <div class="row" style="width: 100%;">
                <div class="col-md-12">
                  <div class="popup-heading">
                    <span class="h2"><button type="button" class="sign-up-back-button"
                      id="button-addon2"
                      style="background:transparent;color:white;border:0px;margin-bottom:10px;"
                      data-bs-toggle="modal" data-bs-target="#exampleModalfirst">
                    </button></span>
                    <h2>Edit Profile <span style="font-size:18px;">(User ID: <?php if (isset($_SESSION['user'])) {
                      echo $_SESSION['user'];
                    } ?>)</span></h2>
                    <form action="" method="post" class="popup-design">
                      <div class="mb-4">
                        <input type="name" name="name" style="color:black"
                        class="form-control footer-input" id="exampleFormControlInput1"
                        placeholder="Full Name" value="<?php if (isset($_SESSION['type'])) {
                          echo $_SESSION['type'];
                        } ?>" required <?php if (isset($_SESSION['type'])) {
                          echo "readonly style='color:black !important;'";
                        } ?>>
                      </div>
                      <div class="mb-4">
                        <input type="tel" name="mobile" style="color:black" pattern="[0-9]{11}"
                        disabled class="form-control footer-input" id="exampleFormControlInput1"
                        value="<?php if (isset($_SESSION['mobile'])) {
                          echo $_SESSION['mobile'];
                        } ?>" placeholder="Mobile Number" required>
                      </div>
                      <div class="mb-4">
                        <input type="email" name="email" style="color:black" disabled
                        class="form-control footer-input" id="exampleFormControlInput1" value="<?php if (isset($_SESSION['email'])) {
                          echo $_SESSION['email'];
                        } ?>" placeholder="Email" required>
                      </div>
                      <?php
            
//if(!isset($_SESSION['password']))
//  {
                      ?>
                      <div class="mb-4">
                        <input type="text" name="password" class="form-control footer-input"
                                                id="exampleFormControlInput1" value="<?php if (isset($_SESSION['password'])) { //echo $_SESSION['password'];
                                              }
                                              ?>" placeholder="Password">
                                            </div>
                                            <center>
                                              <button class="btn btn-success border-rad-popup mt-1" name="edit"
                                              type="submit">Change</button>

                                            </center>
                                            <?php
//  }
                                            ?>
                                          </form>
                                          <?php
//if(isset($_SESSION['otp']))
//{
                                          ?>
                                    <!--<form action="" method="post">
                            <div class="mb-4">
<input type="text" name="otp_code" class="form-control footer-input" id="exampleFormControlInput1" placeholder="Enter OTP CODE">
</div>
                    <center>
<button class="btn btn-success border-rad-popup mt-1" name="otp_check" type="submit">Verify OTP</button>
                    </center>
                  </form>-->
                  <?php
//}
                  ?>
                                    <!--<p class="mt-2">Chek it
                    <span> <button class="btn btn-orange btn-sm" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target="#exampleurl">Paste Url & Inspect</button></span></p>
                  -->
                </div>
              </div>
                            <!--  <div class="col-md-5">
                          <div class="popup-heading">
                              <div class="img-place"><img style="opcaity:1;" src="images/login.png" height="100%" width="100%"></div>
                                                                      <form action="logout.php" method="post">
                              <button class="btn btn-success border-rad-popup mt-4" type="submit" name="abc">Logout</button>
                                                                      </form>
                                                              </div>
                                                            </div>-->
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>




                                                  <section class="fit-ship">
                                                    <div class="container p-0">
                                                      <!-- <div class="row align-items-center"> -->
                                                        <div class="text-center s2-heading">
                                                          <h1 class="spacer-left" data-aos="fade-up">Agar
                                                            <span>FIT</span> hoga,
                                                          </h1>
                                                          <h1 class="spacer" data-aos="fade-up">tabhi
                                                            <span>SHIP</span> hoga!
                                                          </h1>
                                                        </div>
                                                        <div class="bg-fit" data-aos="fade-up" style="position:relative;">
                                                          <img src="images/Untitled-22.png" alt="" class="img-fluid"
                                                          style="position:absolute; max-width: 40%; z-index: -2; left:0; right:0;margin: 0 auto;">
                                                          <img src="images/Untitled-11.png" alt="" class="img-fluid"
                                                          style="position:absolute; max-width: 40%; z-index: -2; left:0; right:0;margin: 0 auto;">
                                                          <div class="text-center">
                                                            <div class="detail-text" data-aos="fade-up">
                                                              <h4>Har Product Ki Inspection</h4>
                                                              <h3>In Just <span>Rs 850</span></h3>
                                                              <h4>AUR Delivery FREE</h4>
                                                              <br>
                                                              <p>Get any product inspected Quickly & Easily from the comfort of your home,<br>Before you
                                                                buy
                                                              or sell it online.</p>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <!-- </div> -->
                                                      </div>
                                                    </section>
                                                    <section class="class">
                                                      <div class="container">
                                                        <div class="row">
                                                          <div class="s3-heading" data-aos="fade-up">
                                                            <h1>And if it fits on a bike,</h1>
                                                            <h1>doorstep delivery is free</h1>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>

                                                    <section class="buying">
                                                      <div class="text-center s3-heading" data-aos="fade-up">

                                                        <span id="2"></span>
                                                        <div class="container-fluid sec3bg" data-aos="fade-up">
                                                          <div class="row" style="position: relative;">
                                                            <div class="col-md-12 col-lg-5">
                                                              <div class="l-text-area mt-3" data-aos="fade-up">
                                                                <h1>Buying</h1>
                                                                <h3>Something?</h3>
                                                              </div>

                                                            </div>
                                                            <div class="col-md-12 col-lg-7 dotted-bg custom">

                                                              <div class="tick-1">
                                                                <div class="num-area-1" data-aos="fade-up">
                                                                  <span class="num-area-1-text-in athvr-one hover-forth-sec-four"
                                                                  onmouseover="bigImg3(this)">1</span>
                                                                  <div class="hover-forth-sec">
                                                                    <div class="h-t-head h-t-head-one">
                                                                      <div class="num-area-1-dot"></div>
                                                                      <p>Negotiate & <br>settle price</p>
                                                                    </div>
                                                                    <div class="hide-textaaa">
                                                                      <div class="h-t-body">
                                                                        Finalize the price with the seller for your chosen product
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                </div>
                                                                <div class="num-area-2" data-aos="fade-up">
                                                                  <span class="num-area-1-text-in athvr-two hover-forth-sec-four"
                                                                  onmouseover="bigImg(this)">2</span>
                                                                  <div class="hover-forth-sec">
                                                                    <div class="h-t-head h-t-head-two">
                                                                      <div class="num-area-1-dot"></div>
                                                                      <p>Paste link<br> on Chekmate</p>
                                                                    </div>
                                                                    <div class="hide-textaaa">
                                                                      <div class="h-t-body">
                                                                        Share product URL and a few details on our website
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                </div>
                                                                <div class="num-area-3" data-aos="fade-up">
                                                                  <span class="num-area-1-text-in athvr-three hover-forth-sec-four"
                                                                  onmouseover="bigImg2(this)">3</span>
                                                                  <div class="hover-forth-sec">
                                                                    <div class="h-t-head h-t-head-three">
                                                                      <div class="num-area-1-dot"></div>
                                                                      <p>We inspect<br>the product </p>
                                                                    </div>
                                                                    <div class="hide-textaaa">
                                                                      <div class="h-t-body">
                                                                        Our inspection specialist visits the location and sends you an
                                                                        assessment
                                                                        report
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                </div>
                                                                <div class="num-area-4" data-aos="fade-up">
                                                                  <span class="num-area-1-text-in athvr-four hover-forth-sec-four"
                                                                  onmouseover="bigImg1(this)">4</span>
                                                                  <div class="hover-forth-sec">
                                                                    <div class="h-t-head h-t-head-four four-x">
                                                                      <div class="num-area-1-dot"></div>
                                                                      <p>We buy it &<br>deliver </p>
                                                                    </div>
                                                                    <div class="hide-textaaa">
                                                                      <div class="h-t-body">
                                                                        We purchase it on your behalf and bring it to your doorstep
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>

                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                    <section class="aftr-four-hvr-nmbr">
                                                      <div class="container" data-aos="fade-up">
                                                        <div class="row">
                                                          <div class="b-text-area">
                                                            <h4><em> Chekmate makes sure your<br> product reaches you in the<br> same condition as mentioned
                                                              in<br> our assessment report</em>
                                                            </h4>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                    <!-- <span class="anchor" id="3"></span> -->
                                                    <section id="3" class="sec4">
                                                      <div class="container p-0" data-aos="fade-up">
                                                        <div class="sec4-bg postion-relative" style="position:relative;">
                                                          <img src="images/Untitled-2.png" alt="" class="img-fluid"
                                                          style="position:absolute; max-width: 56%; z-index: -2; left:0; right:0;margin: 0 auto;">
                                                          <img src="images/Untitled-1.png" alt="" class="img-fluid"
                                                          style="position:absolute; max-width: 53%; z-index: -2; left:0; right:0;margin: 0 auto;">
                                                          <div class="text-center">
                                                            <div class="detail-text-sec4">
                                                              <h4>Chekmate is all about</h4>
                                                              <h3>building trust <span class="light">in</span></h3>
                                                              <h5>online shopping</h5>
                                                              <h6>We specialize in assessments & deliveries for all products being bought & sold on
                                                              peer-to-peer marketplaces, social media or web</h6>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>

                                                    <section class="sec5">
                                                      <div class="container">
                                                        <div class="text-center sec5-h">
                                                          <h1 data-aos="fade-up">The Chekmate Advantage</h1>
                                                          <div class="col-md-8 offset-md-2">
                                                            <div class="row">
                                                              <div class="col p-1" data-aos="fade-up">
                                                                <div class="ad-tab mt-4">
                                                                  Inspect before buying
                                                                </div>

                                                                <div class="ad-tab mt-4">
                                                                  Avoid scams & frauds
                                                                </div>
                                                              </div>
                                                              <div class="col p-1" data-aos="fade-up">
                                                                <div class="ad-tab  mt-4 ">
                                                                  Hassle free delivery
                                                                </div>

                                                                <div class="ad-tab mt-4">
                                                                  Reliable product inspections
                                                                </div>
                                                              </div>
                                                              <div class="p-1" data-aos="fade-up">
                                                                <div class="ad-tab at-bs-fl-br mt-4">
                                                                  Alternative to buying and then returning for replacement
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>

                                                    <section id="4" class="sec6">
                                                      <div class="container wkof">
                                                        <div style="background-image:url('images/s6-bg.png');">

                                                        </div>
                                                        <div class="col-md-8 offset-md-2 sec6-h pt-5" data-aos="fade-up">
                                                          <div class="row">
                                                            <div class="col-md-4 sec6-img">
                                                              <img src="images/s6a.png" alt="img" class="img-fluid" style="max-width:35%;">
                                                            </div>
                                                            <div class="col-md-8 sec6-text">
                                                              <h1>What kind of products can I <br> get inspected &amp; delivered?</h1>
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <div class="row img-grid-a" data-aos="fade-up">
                                                          <div class="col-md-3 bx1">
                                                            <img src="images/mob-i.png" class="img-fluid">
                                                            <div class="centered-text">MOBILE <br> DEVICES</div>
                                                          </div>
                                                          <div class="col-md-3 bx2">
                                                            <img src="images/Laptop-i.png" class="img-fluid">
                                                            <div class="centered-text">LAPTOPS &<br>COMPUTERS</div>
                                                          </div>
                                                          <div class="col-md-3 bx3">
                                                            <img src="images/iron-i.png" class="img-fluid">
                                                            <div class="centered-text">Electronics<br> & Home<br>Appliances</div>
                                                          </div>
                                                          <div class="col-md-3 bx4">
                                                            <img src="images/b-car.png" class="img-fluid" style="max-width:68%;">
                                                            <div class="centered-text">Vehicle <br> Parts & <br>Accessories </div>
                                                          </div>
                                                        </div>

                                                        <div class="row img-grid-a grid-2" data-aos="fade-up">
                                                          <div class="col-md-3 bx5">
                                                            <img src="images/beauty.png" class="img-fluid">
                                                            <div class="centered-text">Beauty</div>
                                                          </div>
                                                          <div class="col-md-3 bx6">
                                                            <img src="images/hat-i.png" class="img-fluid" style="max-width:80%;">
                                                            <div class="centered-text">Fashion & <br> Clothing
                                                            </div>
                                                          </div>
                                                          <div class="col-md-3 bx7">
                                                            <img src="images/Books,-Sports-&-Hobbies.png" class="img-fluid">
                                                            <div class="centered-text">Books, <br>Sports & <br>Hobbies
                                                            </div>
                                                          </div>
                                                          <div class="col-md-3 bx8">
                                                            <img src="images/cam.png" class="img-fluid">
                                                            <div class="centered-text">And Much <br>More!
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="container">
                                                        <div class="mob-center">
                                                          <div class="col-md-10 faqs-sec">
                                                            <div class="row align-items-center">
                                                              <div class="col-md-2 p-3 bulb-sec" data-aos="fade-up">
                                                                <img src="images/bulb.png">
                                                              </div>
                                                              <div class="col-md-8 p-3" data-aos="fade-up">
                                                                <div class="bulb-text">
                                                                  <h1>When should I use Chekmate?</h1>
                                                                  <p class="m-0">Whenever you want to remove the element of doubt from an online
                                                                    listing.
                                                                    <br>For example, if you want to buy products over the internet without having to
                                                                    deal with fraudulent listings, scams and the hassle of inspecting
                                                                    or picking up the product yourself.
                                                                  </p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="offset-md-2 col-md-10 faqs-sec">
                                                            <div class="row rev align-items-center">
                                                              <div class="col-md-7 offset-md-3 p-3" data-aos="fade-up">
                                                                <div class="search-text">
                                                                  <h1>What is checked during <br>the product inspection?</h1>
                                                                  <p class="m-0">Our qualified inspectors check the cosmetic and working condition of
                                                                    the
                                                                    product to validate the claims of the seller according to their description.
                                                                  </p>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-2 p-3 bulb-sec immmg" data-aos="fade-up">
                                                                <img src="images/search.png">
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="col-md-10 faqs-sec">
                                                            <div class="row align-items-center">
                                                              <div class="col-md-2 p-3 bulb-sec" data-aos="fade-up">
                                                                <img src="images/time.png">
                                                              </div>
                                                              <div class="col-md-8 p-3">
                                                                <div class="bulb-text" data-aos="fade-up">
                                                                  <h1>How long does it take to<br>get the inspection and report?</h1>
                                                                  <p class="m-0">Once we receive your request for assessment we will reach out to you
                                                                    immediately. An inspector is then dispatched to the product location where an
                                                                    on-site inspection is conducted and a report is instantly generated for you. All
                                                                  this takes no more than a day.</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="offset-md-2 col-md-10 faqs-sec">
                                                            <div class="row rev align-items-center">
                                                              <div class="col-md-8 offset-md-2 p-3" data-aos="fade-up">
                                                                <div class="search-text">
                                                                  <h1>Do I get a value assessment<br>of the product?</h1>
                                                                  <p class="m-0">We inspect for cosmetic and functional features and ensuring they
                                                                    correspond to the seller listing,
                                                                    and not particularly for the <br> actual value of the product.</p>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-2 p-3 bulb-sec immmg" data-aos="fade-up">
                                                                  <img src="images/plus.png">
                                                                </div>
                                                              </div>
                                                            </div>

                                                            <div class="col-md-10 faqs-sec">
                                                              <div class="row align-items-center">
                                                                <div class="col-md-2 p-3 bulb-sec" data-aos="fade-up">
                                                                  <img src="images/rs.png">
                                                                </div>
                                                                <div class="col-md-9 p-3">
                                                                  <div class="bulb-text" data-aos="fade-up">
                                                                    <h1>How & what do I pay for<br> product assessment with delivery?</h1>
                                                                    <p class="m-0">For new customers, the first assessment and delivery is FREE.<br>
                                                                      After
                                                                      that, we charge only Rs. 850
                                                                      for assessments, and if the <br> product is fit to ship we purchase it on your
                                                                      behalf and you pay <br> cash only
                                                                      on delivery. Plus, if it fits on a bike we deliver it to your <br> doorstep for
                                                                    free.</p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>



                                                            <div class="offset-md-2 col-md-10 faqs-sec">
                                                              <div class="row rev align-items-center">
                                                                <div class="col-md-8 offset-md-1 p-3" data-aos="fade-up">
                                                                  <div class="search-text">
                                                                    <h1>Is the delivery always free?</h1>
                                                                    <p class="m-0">Yes, if the product fits on a bike.<br>In case, Chekmate is unable to
                                                                      transport the product
                                                                      on a bike, a delivery quotation will be shared separately. Checkmate guarantees
                                                                      lowest possible rates for shipping
                                                                    larger products.</p>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-2 p-3 bulb-sec immmg" data-aos="fade-up">
                                                                  <img src="images/icons-05.png">
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-10 faqs-sec">
                                                              <div class="row align-items-center">
                                                                <div class="col-md-2 p-3 bulb-sec" data-aos="fade-up">
                                                                  <img src="images/tick.png">
                                                                </div>
                                                                <div class="col-md-9 p-3">
                                                                  <div class="bulb-text" data-aos="fade-up">
                                                                    <h1>What if I need multiple assessments<br> at the same time?</h1>
                                                                    <p class="m-0">We charge Rs. 850 for the first assessment, and Rs. 350<br> per
                                                                      successive assessment on the same order.<br>Delivery remains FREE.</p>

                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>





                                                            </div>
                                                          </div>
                                                        </section>

                                                        <section id="5" class="getintouch-sec">
                                                          <div class="container" data-aos="fade-up">
                                                            <!-- <div class="col-md-2 col-sm-12"></div> -->
                                                            <div class="">

                                                              <div class="form col-md-7 mx-auto">
                                                                <div class="px-1">
                                                                  <div class="get-text">
                                                                    <h2 style="color:white;"><b>Something to say?</b></h2>
                                                                  </div>
                                                                  <div class="get-contact get-contact-design">
                                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                                      <div>
                                                                        <h4><span class="text-center"><img src="images/call.png" class="w-100 img-fluid"
                                                                          style="max-width: 10%;"></span><b class="p-1">+92 343 CHEK 000 </b>
                                                                        </h4>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                                      <div class="email-div-sec">
                                                                        <h4><span class="text-center"><img src="images/mail.png" class="w-100 img-fluid"
                                                                          style="max-width: 10%;"></span><b class="p-1">help@chekmate.pk</b>
                                                                        </h4>
                                                                      </div>
                                                                    </div>
                                <!-- <div class=""><span><img src="images/mail.png" class="w-100 img-fluid"></span>
                            <h4><b>info@chekmate.pk</b></h4>
                          </div> -->
                        </div>
                        <div class="note-text px-2 py-1">
                          <p style="color:#d32e0e;">Say Something</p>
                        </div>
                      </div>
                      <form action="" method="post">
                        <div class="mb-3">
                          <input type="text" name="name" style="height:50px;" class="form-control footer-input"
                          id="exampleFormControlInput1" placeholder="Full Name" required>
                        </div>
                        <div class="mb-2">
                          <input type="email" name="email" style="height:50px;" class="form-control footer-input"
                          id="exampleFormControlInput1" placeholder="Email" required>
                        </div>
                        <div class="mb-4">
                          <textarea class="form-control footer-input-msg" name="message"
                          id="exampleFormControlTextarea1" rows="4" placeholder="Your Message"
                          required></textarea>
                        </div>
                        <div class="mb-4 bmb">
                          <button type="submit" class="btn btn-danger mb-3 submit-btn"
                          name="contactquery">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </section>

              <!-- </article> -->




              <div class="modal fade prvvcy-mdl " id="privacymodal" tabindex="-1" style="z-index:! !important;"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body modal-dialog-centered" style="background:#dfdfdf;border-radius:25px;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="popup-heading">
                          <p style="font-size:30px;font-weight:600;color:#1F1F1F;" align=center><i>Privacy</i>
                          </p>
                          <p style="font-size:12px;color:#1F1F1F;font-weight:bold;">Clause 16-A from Terms &
                          Conditions</p>
                          <p style="font-size:12px;color:#1F1F1F;font-weight:bold;">Data Protection</p>
                          <p style="font-size:12px;color:#1F1F1F;">Our team takes great care when processing
                            data
                            of Data Subjects, when processing Personal Data. “Personal Data” means any
                            information relating to any Data Subject connected with the performance of this
                            Contract. “DPR” means any data protection regulations applicable to the Parties
                            in
                          relation to the performance of this Contract, including those in Pakistan.</p>
                          <p style="font-size:12px;color:#1F1F1F;">We ensure compliance with the DPR in
                            respect of
                          Personal Data, with particular regard to:</p>
                          <ol type="i"
                          style="font-size:12px;color:#1F1F1F;line-height:1;margin-left:30px;margin-top:-10px;">
                          <li> Its collection and use;</li>
                          <li> its safeguarding;</li>
                          <li> any transfer to third parties;</li>
                          <li> its retention; and</li>
                          <li> the protection of Data Subjects’ rights.</li>
                        </ol>

                        <p style="font-size:12px;color:#1F1F1F;">b &nbsp &nbsp &nbsp You shall have proper
                        notification and response procedures for any Personal Data breach.</p>


                      </div>
                    </div>

                  </div>
                  <p class="mt-2 text-center">
                            <!--<span> <button class="btn btn-orange btn-sm p-2"
                                      onclick="closeprivacy()" style="width:150px;border-radius:25px;"
                                      type="button" id="button-addon1" >Ok</button></span>-->
                                      <a href="?" class="btn btn-orange btn-sm p-2" onclick="closeprivacy()"
                                      style="width:150px;border-radius:25px;">Ok</a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade trmss-cndtnss" id="termmodal" tabindex="-1" style="z-index:! !important;"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-body modal-dialog-centered" style="background:#dfdfdf;border-radius:25px;">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="popup-heading trms-cndtions" style="height:425px;overflow-y:scroll;">
                                        <p style="font-size:24px;font-weight:600;color:#1F1F1F;" align=center><i>Term &
                                        Conditions</i> </p>
                                        <p style="font-size:12px;color:#1F1F1F;">
                                          This document, as well as the documents mentioned therein, states our terms and
                                          conditions on which we supply any of the products (Products) whether contracted
                                          to
                                          us privately for inspection or those listed on our website, Android and iOS apps
                                          (“Our Site and Apps”) to you. Please read these terms and conditions carefully
                                          before ordering any Products from Us, Our Site and Apps. You should understand
                                          that
                                          by ordering any of our Products, you agree to be bound by these terms and
                                          conditions.
                                          Chekmate Logistics (PVT) Ltd is a company that inspects,
                                          purchases, delivers and accredits products that are bought
                                          and sold on peer-peer marketplaces, social media or web .We
                                          are registered in Pakistan under company number 0151427.
                                          <br><br>
                                          By ordering from Us, Our Site and Apps,
                                          you are deemed to have accepted these terms and conditions.
                                          <br><br>
                                          <b> 1. Your Status As A Buyer and Seller (Our Customer)</b>
                                          <br><br>
                                          a) By placing an order through Our Site and Apps, you warrant that:<br>
                                          &nbsp &nbsp 1) You are legally capable of entering into binding contracts;
                                          and<br>
                                          &nbsp &nbsp 2) You are at least 18 years old; we will not inspect for, sell or
                                          deliver to anyone who is, or appears to be, under the age of 18; we reserve the
                                          right not to deliver if we are unsure of this. A Valid CNIC or other ID will be
                                          required.
                                          &nbsp &nbsp 3) You do not intend to use Our Site and Apps or service for the
                                          sale or
                                          delivery of any form of alcohol and prohibited drugs/narcotics. We will refuse
                                          deliver any such products to anyone
                                          <br><br>
                                          <b> 2. Process for Customers who are Buyers:</b>
                                          <br>
                                          (a) When a customer wants to purchase a used/new product they share the product
                                          details with us. We inspect the product at the seller’s location and purchase it
                                          after approval of inspection from the buyer (our customer) on the basis of a
                                          generated report. We inspect as per the seller’s listing and validate their
                                          claims
                                          as advertised. We assure the customer that the product reaches them in the same
                                          condition as at the time of inspection.
                                          <br> (b) Chekmate reserves the right to set/cap and vary the maximum purchase
                                          amount
                                          paid on the buyer’s behalf to the seller at its own discretion.
                                          <br>
                                          <b> 3. Process for Customers who are Sellers:</b>
                                          <br>
                                          (a) When an individual seller, small brand, or an unbranded store wants to
                                          maintain
                                          a quality check to gain buyer trust, they engage us as a quality assurance and
                                          inspection service through which they secure a Chekmate accreditation.
                                          <br>

                                          a. After placing an order for inspection, you will receive a notification from
                                          us
                                          acknowledging that we have received your order. Please note that this does not
                                          mean
                                          that your order has been accepted. Your order constitutes an offer to us to buy
                                          /inspect a Product. All orders are subject to acceptance by us, and we will
                                          confirm
                                          such acceptance to you by sending you a notification that confirms that the
                                          Product
                                          has been scheduled for inspection and delivery following the inspection. (The
                                          Dispatch Confirmation). The contract between us (Contract) will only be formed
                                          when
                                          we send you the Dispatch Confirmation. We reserve the right to refuse any order
                                          or
                                          cancel a delivery at any time without giving a reason.
                                          <br>b. The Contract will relate only to those Products whose /inspection
                                          dispatch we
                                          have confirmed in the Dispatch Confirmation. We will not be obliged to supply or
                                          inspect any other Products, which may have been part of your order until the
                                          inspection/dispatch of such Products has been confirmed in a separate
                                          Inspection/Dispatch Confirmation.
                                          <br>c. Please note that once you have made your order and your payment has been
                                          authorized you will not be able to cancel your order for
                                          inspection/collection/delivery and that refunds may be given at the discretion
                                          of
                                          the management.
                                          <br><br>
                                          <b>5. Our Status</b>
                                          <br><br> a. We may provide links on Our Site and Apps to the websites of other
                                          companies (other websites), or listings of products supplied by other companies,
                                          whether affiliated with us or not. We cannot give any undertaking, that products
                                          you
                                          purchase from companies to whose website we have provided a link on Our Site and
                                          Apps, will be of satisfactory quality, and any such warranties are DISCLAIMED by
                                          us
                                          absolutely. This DISCLAIMER does not affect your statutory rights against the
                                          third
                                          party. The status/business of Chekmate is solely to provide delivery/inspection
                                          of
                                          the aforementioned products and not to provide any warranties/guarantees of the
                                          quality and/or packaging of the said products.
                                          <br> b. All questions regarding goods shown on Our Site and Apps should be
                                          directed
                                          to the affiliate company.
                                          <br><br>
                                          <b>6. Inspection, Availability of Product and Delivery</b>
                                          <br><br> a. Your order will be fulfilled by the inspection delivery date/time
                                          set
                                          out in the Dispatch Confirmation.
                                          <br> b. Delivery periods quoted by our Delivery Partners at the time of ordering
                                          are
                                          approximate only and may vary. Products will be delivered to the address
                                          designated
                                          by you at the time of ordering. You agree to take particular care when providing
                                          our
                                          Delivery Partners with your details and warrant that these details are accurate
                                          and
                                          complete at the time of ordering.
                                          <br> c. In case of a late delivery, the delivery charge will neither be voided
                                          nor
                                          refunded, and it is the responsibility of our Delivery Partners.
                                          <br> d. If you fail to accept delivery of a Product at the time they are ready
                                          for
                                          delivery after inspection, or we are unable to deliver at the nominated time due
                                          to
                                          your failure to provide appropriate instructions, or authorizations, then such
                                          Products shall be deemed to have been delivered to you and all risk and
                                          responsibility in relation to such Products shall pass to you. Any storage,
                                          insurance and other costs, which we incur as a result of the inability to
                                          deliver,
                                          shall be your responsibility and you shall indemnify us in full for such cost.
                                          <br><br>
                                          <b>7. Risk and Title</b>
                                          <br><br>
                                          a. The Products will be your responsibility from the time of delivery by our
                                          delivery partners.

                                          <br>b. Ownership of the Products will only pass to you when we receive full
                                          payment
                                          of all sums due in respect of the Products, including inspection and delivery
                                          charges. It is the responsibility of the customer (whether buyer or seller) to
                                          thoroughly check the Inspected Products before agreeing to pay for an order.
                                          <br> c. Cash on delivery, bank transfer credit or debit card, The Chekmate
                                          Payment
                                          Portal or any other payment method(s) that we make available on Our Site and
                                          Apps
                                          from time to time must make payment for all Products.
                                          <br>d. Refunds for payments will be made via Chekmate Portal, or, at our
                                          discretion,
                                          the original payment method for the order.
                                          <br>e. You consent to receive all disclosures, notices, change in terms, and
                                          other
                                          documents related to these Terms & Conditions and use of Chekmate Payment
                                          portals
                                          electronically. As the customer you also agree that Chekmate may provide notices
                                          concerning these Terms by posting the material on Our Site and Apps, through
                                          electronic notice given to any electronic mailbox it maintains for you or to any
                                          other email address or telephone number you provide to us.
                                          <br>f. Chekmate is not responsible for any errors, delays, or the inability to
                                          use
                                          Chekmate’s payment methods for any transaction.
                                          <br>g. The Customer is responsible for maintaining the confidentiality of
                                          his/her
                                          Chekmate Payment Portal information and any underlying financial information.
                                          You
                                          should keep all credentials secure and confidential. Do not share your
                                          credentials
                                          with any other person. Information you provide to any mobile wallet provider is
                                          subject to that provider’s agreements and is not governed by these Terms.
                                          <br>h. Chekmate reserves the right to terminate the User’s usage of his/her
                                          Chekmate
                                          Payment Portal at any time with or without notice. Chekmate may terminate or
                                          amend
                                          these Terms at any time without notice unless required by law. The User’s use of
                                          Chekmate Pay after Chekmate has made such changes will be deemed your consent to
                                          the
                                          changes.
                                          <br>i. The laws of Pakistan govern this Agreement. This Agreement is the sole
                                          understanding of the parties with respect to the stated subject matter. If any
                                          provision of this Agreement is held by a court of competent jurisdiction to be
                                          invalid or unenforceable, such provision will be enforced to the fullest extent
                                          that
                                          it is valid and enforceable under applicable law. All provision of this
                                          Agreement
                                          relating to ownership, indemnification, and limitations of liability shall
                                          remain in
                                          full force and effect after termination of this Agreement. Chekmate may assign
                                          these
                                          Terms. You may not assign these Terms.
                                          <br>j. CHEKMATE IS NOT AND SHALL NOT BE LIABLE FOR ANY LOSS, DAMAGE OR INJURY OR
                                          FOR
                                          ANY DIRECT, INDIRECT, SPECIAL, INCIDENTAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES,
                                          INCLUDING LOST PROFITS, ARISING FROM OR RELATED TO YOUR ACCESS OR USE OF
                                          CHEKMATE’S
                                          ONLINE PORTALS.
                                          <br>k. Chekmate shall incur no liability if it is unable to complete a
                                          transaction
                                          in a timely manner because: (i) your account does not contain sufficient funds
                                          to
                                          complete the transaction or the transaction exceeds the limit of your overdraft
                                          protection options; (ii) the Chekmate Pay is not working properly and you knew
                                          or
                                          were advised about the problem before completing the transaction; (iii)
                                          circumstances beyond Chekmate ’s control (such as, but not limited to,
                                          telecommunication failure, fire, flood, or interference from an outside force)
                                          that
                                          prevent or delay the transaction; (v) Chekmate has reason to believe the
                                          transaction
                                          is unauthorized by you; and/or (vi) there may be other exceptions stated in our
                                          agreement(s) with you.
                                          <br><br>
                                          <b>8. Our Liability</b><br>
                                          <br>
                                          Our Internal processes pertain to Riders and our Partners.
                                          <br><br>
                                          <b>9. Process for Riders/Inspectors:</b>
                                          <br><br>
                                          <br><b>10. Once the process of inspection is started, the riders/inspectors
                                            reach
                                            the
                                            seller’s site and conduct an inspection of the requested
                                            product through a mobile app on the location. The assessment score in the
                                            report
                                            depends
                                            on the input of the inspector and their observations to determine the final
                                            score of the assessment.
                                            We are not responsible to the Seller for the inspection report generated or
                                            the
                                            views of the inspector.
                                          </b><br><br>
                                          <b>11. The assessment report is then shared with the buyer and if the product is
                                            fit
                                            to ship as per the assessment being accepted by the buyer, the product is
                                            purchased by Chekmate on the buyer’s behalf and brought to our designated
                                            Chekmate HUB.
                                          </b><br><br>
                                          <b>Process for Delivery Partners:</b>
                                          <br><br>
                                          <b>12. Our Delivery partners collect the product from our HUB, deliver it to the
                                            buyer and collect cash on delivery (COD) that includes the price of the
                                            product
                                            as well as the inspection fee. The Delivery partners are responsible for any
                                            breakage, accidental damages etc. during the delivery process from our HUB
                                            to
                                            the buyer.
                                          </b><br>
                                          <b>13. We warrant to you that any Product purchased through Us is of
                                            satisfactory
                                            quality and reasonably fit for all the purposes for which products of the
                                            kind
                                            are commonly supplied.
                                          </b> <br><br>a. We are not responsible for indirect losses which happen as a
                                          side
                                          effect of the main loss or damage, including but not limited to:
                                          <br> i. Loss of income or revenue
                                          <br> ii. Loss of business
                                          <br> iii. Loss of profits or contracts
                                          <br> iv. Loss of anticipated savings
                                          <br> v. Loss of data, or
                                          <br> vi. Waste of management or office time however arising and whether caused
                                          by
                                          tort (including negligence), breach of contract or otherwise;
                                          <br> b. Great care has been taken to ensure that the information available on
                                          Our
                                          Site and Apps is correct and error free. We apologize for any errors or
                                          omissions
                                          that may have occurred. We cannot warrant that use of Our Site and Apps will be
                                          error free or fit for purpose, timely, that defects will be corrected, or that
                                          our
                                          Site and Apps or the server that makes it available are free of viruses or bugs
                                          or
                                          represents the full functionality, accuracy, reliability of Our Site and Apps
                                          and we
                                          do not make any warranty whatsoever, whether express or implied, relating to
                                          fitness
                                          for purpose, or accuracy.
                                          <br> c. By accepting these terms of use you agree to relieve us from any
                                          liability
                                          after the goods reach our HUB where the goods are collected by the Delivery
                                          Partners.
                                          <br> d. We do not accept any liability for any delays, failures, errors or
                                          omissions
                                          or loss of transmitted information, viruses or other contamination or
                                          destructive
                                          properties transmitted to you or your computer system via Our Site asmspps.
                                          <br><br>
                                          <b> 14. Written communications</b>
                                          <br>a. Applicable laws require that some of the information or communications we
                                          send to you should be in writing. When using Our Site and Apps, you accept that
                                          communication with us will be mainly electronic. We will contact you by e-mail
                                          or
                                          provide you with information by posting notices on our website or your Chekmate
                                          account with us. For contractual purposes, you agree to this electronic means of
                                          communication and you acknowledge that all contracts, notices, information and
                                          other
                                          communications that we provide to you electronically comply with any legal
                                          requirement that such communications be in writing. This condition does not
                                          affect
                                          your statutory rights.
                                          <br><br>
                                          <b>15. Notices</b>
                                          <br> a. All notices given by you to us must be given to us via email at ______.
                                          We
                                          may give notice to you at either the e-mail or postal address you provide to us
                                          when
                                          placing an order. Notice will be deemed to have been received and properly
                                          served
                                          immediately when posted on our website, 24 hours after an e-mail is sent, or
                                          three
                                          days after the date of posting of any letter.
                                          <br><br>
                                          <b>16. Transfer of rights and obligations</b>
                                          <br><br> a. The contract between you and us is binding on you and us and on our
                                          respective successors and assigns.
                                          <br> b. You may not transfer, assign, charge or otherwise dispose of a Contract,
                                          or
                                          any of your rights or obligations arising under it, without our prior written
                                          consent.
                                          <br> c. We may transfer, assign, charge, sub-contract or otherwise dispose of a
                                          Contract, or any of our rights or obligations arising under it, at any time
                                          during
                                          the term of the Contract.
                                          <br><br><b> 16-A Data Protection</b>
                                          <br><br> Our team takes great care when processing data of Data Subjects, when
                                          processing Personal Data. “Personal Data” means any information relating to any
                                          Data
                                          Subject connected with the performance of this Contract. “DPR” means any data
                                          protection regulations applicable to the Parties in relation to the performance
                                          of
                                          this Contract, including those in Pakistan.
                                          <br> We ensure compliance with the DPR in respect of Personal Data, with
                                          particular
                                          regard to:
                                          <br>(i) Its collection and use;
                                          <br>(ii) its safeguarding;
                                          <br>(iii) any transfer to third parties;
                                          <br>(iv) its retention; and
                                          <br>(v) the protection of Data Subjects’ rights.
                                          <br>(b) You shall have proper notification and response procedures for any
                                          Personal
                                          Data breach.
                                          <br><br>
                                          <b>17. Events outside our control</b>
                                          <br><br> a. We will not be liable or responsible for any failure to perform, or
                                          delay in performance of, any of our obligations under a Contract that is caused
                                          by
                                          events outside our reasonable control (Force Majeure Event).
                                          <br> b. A Force Majeure Event includes any act, event, non-happening, omission
                                          or
                                          accident beyond our reasonable control and
                                          includes in particular (without limitation) the following:
                                          <br>i. Strikes, lockouts or other industrial action.
                                          <br> ii. Civil commotion, riot, invasion, terrorist attack or threat of
                                          terrorist
                                          attack, war (whether declared or not) or threat or preparation for war.
                                          <br> iii. Fire, explosion, storm, flood, earthquake, subsidence, epidemic or
                                          other
                                          natural disaster.
                                          <br> iv. Impossibility of the use of railways, shipping, aircraft, motor
                                          transport
                                          or other means of public or private transport.
                                          <br> v. Impossibility of the use of public or private telecommunications
                                          networks.
                                          <br> vi. The acts, decrees, legislation, regulations or restrictions of any
                                          government.
                                          <br> vii. Our performance under any Contract is deemed to be suspended for the
                                          period that the Force Majeure Event continues, and we will have an extension of
                                          time
                                          for performance for the duration of that period. We will use our reasonable
                                          endeavors to bring the Force Majeure Event to a close or to find a solution by
                                          which
                                          our obligations under the Contract may be performed despite the Force Majeure
                                          Event.
                                          <br><br>
                                          <b>18. Waiver</b>
                                          <br><br> a. A waiver by us of any default shall not constitute a waiver of any
                                          subsequent default.
                                          <br> b. No waiver by us of any of these terms and conditions shall be effective
                                          unless it is expressly stated to be a waiver and is communicated to you in
                                          writing.

                                          <b>19. Severability</b>
                                          <br><br> a. If any of these terms and Conditions or any provisions of a Contract
                                          are
                                          determined by any competent authority to be invalid, unlawful or unenforceable
                                          to
                                          any extent, such term, condition or provision will to that extent be severed
                                          from
                                          the remaining terms, conditions and provisions which will continue to be valid
                                          to
                                          the fullest extent permitted by law.
                                          <br><br>
                                          <b>20. Entire agreement</b>
                                          <br><br> a. These terms and conditions and any document expressly referred to in
                                          them constitute the whole agreement between us and supersede any previous
                                          arrangement, understanding or agreement between us, relating to the subject
                                          matter
                                          of any Contract.
                                          <br> b. We each acknowledge that, in entering into a Contract, (and the
                                          documents
                                          referred to in it); neither of us relies on any statement, representation,
                                          assurance
                                          or warranty (Representation) of any person (whether a party to that Contract or
                                          not)
                                          other than as expressly set out in these terms and conditions.
                                          <br> c. Each of us agrees that the only rights and remedies available to us
                                          arising
                                          out of or in connection with a Representation shall be for breach of contract as
                                          provided in these terms and conditions.
                                          <br> d. Nothing in this clause shall limit or exclude any liability for fraud.
                                          <br><br>
                                          <b>21. Our right to vary these terms and conditions</b>
                                          <br><br> a. We have the right to revise and amend these terms and conditions
                                          from
                                          time to time.
                                          <br>b. You will be subject to the policies and terms and conditions in force at
                                          the
                                          time that you order products from us, unless any change to those policies or
                                          these
                                          terms and conditions is required to be made by law or governmental authority (in
                                          which case it will apply to orders previously placed by you), or if we notify
                                          you of
                                          the change to those policies or these terms and conditions before we send you
                                          the
                                          Inspection/Dispatch Confirmation (in which case we have the right to assume that
                                          you
                                          have accepted the change to the terms and conditions, unless you notify us to
                                          the
                                          contrary within seven working days of receipt by you of the Products).
                                          <br><br>
                                          <b>22. Law and jurisdiction</b>
                                          <br><br>
                                          a. Contracts for the purchase of Products through Our Site and Apps and any
                                          dispute or claim arising out of or in connection with them or their subject
                                          matter
                                          or formation
                                          (including non-contractual disputes or claims) will be governed by Pakistani
                                          law.
                                          Any dispute or claim arising out of or in connection with such Contracts or
                                          their
                                          formation (including non-contractual disputes or claims) shall be subject
                                          to the non-exclusive jurisdiction of the courts of Pakistan.
                                        </p>
                                        <p class="mt-2 text-center">
                                        <!--<span> <button class="btn btn-orange btn-sm p-2"
                                                    onclick="closeprivacy()" style="width:150px;border-radius:25px;"
                                                    type="button" id="button-addon1" >Ok</button></span>-->
                                        <a href="?" class="btn btn-orange btn-sm p-2" onclick="closeterm()"
                                            style="width:150px;border-radius:25px;">Ok</a>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
        function closeprivacy() {
            var y = document.getElementById("privacymodal");
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }
        </script>

                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <script>
                                      function closeprivacy() {
                                        var y = document.getElementById("privacymodal");
                                        if (y.style.display === "none") {
                                          y.style.display = "block";
                                        } else {
                                          y.style.display = "none";
                                        }
                                      }
                                      </>
                                      <script>
                                      function closeterm() {
                                        var y = document.getElementById("termmodal");
                                        if (y.style.display === "none") {
                                          y.style.display = "block";
                                        } else {
                                          y.style.display = "none";
                                        }
                                      }
                                    </script>






                                    <footer style="padding-bottom:11px !important;" id="6">
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-sm-12 col-md-3 col-lg-3">
                                            <img src="images/chekmate-logo-gl.png" class="img-fluid" style="max-width:45%;">
                                          </div>
                                          <div class="col-sm-12 col-md-2 col-lg-2" style="text-align: start;">
                                            <h5 class="footer-heading">About Us</h5>
                                            <ul class="footer-list">
                                              <li><a href="#2">How To Chekmate</a></li>
                                              <li><a href="#3">Company</a></li>
                                              <li><a href="#4">FAQs</a></li>
                                              <li><a href="#5">Contact</a></li>
                                              <li><a href="#" data-bs-toggle="modal" data-bs-target="#validateorder">Verify Report</a>
                                              </li>
                                            </ul>
                                          </div>
                                          <div class="col-sm-12 col-md-1 col-lg-1" style="text-align: start;">
                                          </div>
                                          <div class="col-sm-12 col-md-2 col-lg-2" style="text-align: start;">
                                            <h5 class="footer-heading">Support</h5>
                                            <ul class="footer-list">
                                              <li><a href="#" data-bs-toggle="modal" data-bs-target="#helpmodal">Help</a></li>
                                              <li><a href="#" data-bs-toggle="modal" data-bs-target="#termmodal">Terms & Conditions</a>
                                              </li>
                                              <li><a href="#" data-bs-toggle="modal" data-bs-target="#privacymodal">Privacy</a></li>
                                            </ul>

                                          </div>

                                          <div class="col-sm-12 col-md-1 col-lg-1" style="text-align: start;">
                                          </div>

                                          <div class="col-sm-12 col-md-2 col-lg-2" style="text-align: start;">
                                            <div class="">
                                              <h5 class="footer-heading">Connect</h5>

                                            </div>

                                            <div class="col-sm-12 col-md-1 col-lg-1" style="text-align: start;">
                                            </div>

                                            <div class="col-sm-12 col-md-2 col-lg-2" style="text-align: start;">
                                              <div class="">
                                                <h5 class="footer-heading">Connect</h5>
                                              </div>
                                              <ul class="footer-list" style="text-align: start;>
                                              <li> <a href=""><i class=" fa fa-facebook"></i></a> &nbsp <a href=""><i
                                                class="fa fa-twitter"></i></a></li>
                                                <li> <a href=""><i class="fa fa-instagram"></i></a> &nbsp <a href=""><i
                                                  class="fa fa-youtube"></i></a></li>

                                                </ul>
                                              </div>
                                              <div class="col-sm-12 col-md-1 col-lg-1">
                                              </div>
                                            </div>
                <!-- <div class="row">
                <div class="col-sm-12 col-lg-12" style="margin-top:0px;padding-top:0px;">
                        <hr style="background:white;">
                        <h6 class="footer-heading text-center"> All Rights Reserved by Chekmate</h6>
                </div>
              </div> -->
            </div>
            <hr style="background:white;">
            <div class="text-center">
              <small class="footer-heading text-center">&copy; All Rights Reserved by Chekmate</small>
            </div>
        </footer>
        <script>
        // try {
        //     startApp();
        // } catch (ex) {
        //     console.log(ex)
        // }
        </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>


          <script>
            if ($(window).width() < 1400) {
            // When the user scrolls down 50px from the top of the document, resize the header's font size
            window.onscroll = function() {
              scrollFunction()
            };

            function scrollFunction() {
              if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.getElementById("top-logo").style.height = "auto";
                document.getElementById("top-logo").style.width = "150px";
                document.getElementById("navbar").style.height = "55px";


              } else {
                document.getElementById("top-logo").style.height = "auto";
                document.getElementById("top-logo").style.width = "250px";
                document.getElementById("navbar").style.height = "80px";
              }
            }
          }

          if ($(window).width() > 1400) {
            // When the user scrolls down 50px from the top of the document, resize the header's font size
            window.onscroll = function() {
              scrollFunction()
            };

            function scrollFunction() {
              if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.getElementById("top-logo").style.height = "auto";
                document.getElementById("top-logo").style.width = "150px";
                document.getElementById("navbar").style.height = "95px";


              } else {
                document.getElementById("top-logo").style.height = "auto";
                document.getElementById("top-logo").style.width = "250px";
                document.getElementById("navbar").style.height = "120px";
              }
            }
          }
        </script>
        <?php

        if(isset($_GET['redirect'])){
          ?>
          <script type="text/javascript">
            $(document).ready(function() {

              $("#exampleLogin1").modal('show');

            });
          </script>
          <?php
        }
        ?>
        <script>
          AOS.init();
        </script>
        <div></div>
      </body>

      </html>