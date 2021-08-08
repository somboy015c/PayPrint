<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Campus Sport Update | Home</title>
<meta name="Description" content="Champus Sport Update">
<meta name="author" content="Mahmud Shamsudeen">
<meta property="og:url" content="http://www.communitiesmarket.com">
<meta property="og:type" content="website" />
<meta property="og:title" content="Campus Sport Update - Home">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
<!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-icons/css/font-icons.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css"/>
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-1.5.min.css"/>
    <!-- Owl Carousel -->
    <link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.css" rel="stylesheet"/>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins-1.5.css"/>
<?php if (!empty($general_settings->site_color)): ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colors/<?php echo $general_settings->site_color; ?>.min.css"/>
<?php else: ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colors/default.min.css"/>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slider.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<link href="<?php echo base_url(); ?>assets/css-welcome/css.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/css-welcome/navigation.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/js-welcome/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js-welcome/jquery.easing.1.3.js"></script>

<!-- Bootstrap JS-->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<style>
body {
  overflow: hidden;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}
/* Slider wrapper*/
.css-slider-wrapper {
  display: block;
  background: #FFF;
  overflow: hidden;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}
/* Slider */
.slider {
  width: 100%;
  height: 100%;
  background: red;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 1;
  z-index: 0;
  display: flex;
  display: -webkit-flex;
  display: -ms-flexbox;
  flex-direction: row;
  flex-wrap: wrap;
  -webkit-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
  justify-content: center;
  align-content: center;
  -webkit-transition: -webkit-transform 1600ms;
  transition: -webkit-transform 1600ms, transform 1600ms;
  -webkit-transform: scale(1);
  transform: scale(1);
}
/* each slide backgound color */  
.slide1 {
  background-size: cover;
  background-image: url('<?php echo base_url(); ?>assets/img-welcome/slider_image1.jpg');
  left: 0;
}
.slide2 {
  background-size: cover;
  background-image: url('<?php echo base_url(); ?>assets/img-welcome/slider_image2.jpg');
  left: 100%
}
.slide3 {
  background-size: cover;
  background-image: url('<?php echo base_url(); ?>assets/img-welcome/slider_image3.jpg');
  left: 200%
}
.slide4 {
  background-size: cover;
  background-image: url('<?php echo base_url(); ?>assets/img-welcome/slider_image4.jpg');
  left: 300%;
}
.slider > div {
  text-align: center;
}
/* Slider inner slide effect */
.slider h2 {
  color: #FFF;
  font-weight: 900;
  text-transform: uppercase;
  font-size: 45px;
  line-height: 120%;
  opacity: 0;
  -webkit-transform: translateX(500px);
  transform: translateX(500px);
}
.slider .button {
  color: #FFF;
  padding: 5px 30px;
  background: rgba(255,255,255,0.3);
  text-decoration: none;
  opacity: 0;
  font-size: 15px;
  line-height: 30px;
  display: inline-block;
  -webkit-transform: translateX(-500px);
  transform: translateX(-500px);
}
.slider h2, .slider .button {
  -webkit-transition: opacity 800ms, -webkit-transform 800ms;
  transition: transform 800ms, opacity 800ms;
  -webkit-transition-delay: 1s; /* Safari */
  transition-delay: 1s;
}
/* Next and Preive arrow */ 
.control {
  position: absolute;
  top: 50%;
  width: 50px;
  height: 50px;
  margin-top: -25px;
  z-index: 55;
}
.control label {
  z-index: 0;
  display: none;
  text-align: center;
  line-height: 50px;
  font-size: 50px;
  color: #FFF;
  cursor: pointer;
  opacity: 0.2;
}
.control label:hover {
  opacity: 0.5;
}
.maintenance {
    position: absolute;
    width: 100%;
    height: 100%;
    text-align: center;
    z-index: 1;
}
.maintenance:after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: -20;
    opacity: .72;
    background: #1F1C2C; /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #928DAB, #1F1C2C); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #928DAB, #1F1C2C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.next {
  right: 1%;
}
.previous {
  left: 1%;
}
/* Slider Pagger */ 
.slider-pagination {
  position: absolute;
  bottom: 20px;
  width: 100%;
  left: 0;
  text-align: center;
  z-index: 1000;
}
.slider-pagination label {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  display: inline-block;
  background: rgba(255,255,255,0.2);
  margin: 0 2px;
  border: solid 1px rgba(255,255,255,0.4);
  cursor: pointer;
}
/* Slider Pagger arrow event */
.slide-radio1:checked ~ .next .numb2, 
.slide-radio2:checked ~ .next .numb3, 
.slide-radio3:checked ~ .next .numb4, 
.slide-radio2:checked ~ .previous .numb1, 
.slide-radio3:checked ~ .previous .numb2, 
.slide-radio4:checked ~ .previous .numb3 {
  display: block;
  z-index: 1
}
/* Slider Pagger event */
.slide-radio1:checked ~ .slider-pagination .page1, 
.slide-radio2:checked ~ .slider-pagination .page2, 
.slide-radio3:checked ~ .slider-pagination .page3, 
.slide-radio4:checked ~ .slider-pagination .page4 {
  background: rgba(255,255,255,1)
}
/* Slider slide effect */
.slide-radio1:checked ~ .slider {
  -webkit-transform: translateX(0%);
  transform: translateX(0%);
}
.slide-radio2:checked ~ .slider {
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
}
.slide-radio3:checked ~ .slider {
  -webkit-transform: translateX(-200%);
  transform: translateX(-200%);
}
.slide-radio4:checked ~ .slider {
  -webkit-transform: translateX(-300%);
  transform: translateX(-300%);
}
.slide-radio1:checked ~ .slide1 h2,  
.slide-radio2:checked ~ .slide2 h2,  
.slide-radio3:checked ~ .slide3 h2,  
.slide-radio4:checked ~ .slide4 h2,  
.slide-radio1:checked ~ .slide1 .button,  
.slide-radio2:checked ~ .slide2 .button,  
.slide-radio3:checked ~ .slide3 .button,  
.slide-radio4:checked ~ .slide4 .button {
  -webkit-transform: translateX(0);
  transform: translateX(0);
  opacity: 1
}

@media only screen and (max-width: 767px) {
.slider h2 {
  font-size: 20px;
}
.slider > div {
  padding: 0 2%
}
.control label {
  font-size: 35px;
}
.slider .button {
  padding: 0 15px;
}
}
</style>
</head>

<body>
<div class="css-slider-wrapper">
  <input type="radio" name="slider" class="slide-radio1" checked id="slider_1">
  <input type="radio" name="slider" class="slide-radio2" id="slider_2">
  <input type="radio" name="slider" class="slide-radio3" id="slider_3">
  <input type="radio" name="slider" class="slide-radio4" id="slider_4">
  <div class="slider-pagination">
    <label for="slider_1" class="page1"></label>
    <label for="slider_2" class="page2"></label>
    <label for="slider_3" class="page3"></label>
    <label for="slider_4" class="page4"></label>
  </div>
  <div class="next control">
    <label for="slider_1" class="numb1"><i class="fa fa-arrow-circle-right"></i></label>
    <label for="slider_2" class="numb2"><i class="fa fa-arrow-circle-right"></i></label>
    <label for="slider_3" class="numb3"><i class="fa fa-arrow-circle-right"></i></label>
    <label for="slider_4" class="numb4"><i class="fa fa-arrow-circle-right"></i></label>
  </div>
  <div class="previous control">
    <label for="slider_1" class="numb1"><i class="fa fa-arrow-circle-left"></i></label>
    <label for="slider_2" class="numb2"><i class="fa fa-arrow-circle-left"></i></label>
    <label for="slider_3" class="numb3"><i class="fa fa-arrow-circle-left"></i></label>
    <label for="slider_4" class="numb4"><i class="fa fa-arrow-circle-left"></i></label>
  </div>
  <div class="maintenance slider slide1">
    <div>
      <h2>Campus Sports Events Management</h2>
      <a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="button">Login</a>  <a href="javascript:void(0)" data-toggle="modal" data-target="#RegisterModal" class="button">Register</a> </div>
  </div>
  <div class="maintenance slider slide2">
    <div>
      <h2>Book Tickets for Todays Maches</h2>
      <a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="button">Login</a> <a href="javascript:void(0)" data-toggle="modal" data-target="#RegisterModal" class="button">Register</a> </div>
  </div>
  <div class="maintenance slider slide3">
    <div>
      <h2>Schedule Your Events Today.</h2>
      <a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="button">Login</a> <a href="javascript:void(0)" data-toggle="modal" data-target="#RegisterModal" class="button">Register</a> </div>
  </div>
  <div class="maintenance slider slide4">
    <div>
      <h2>See All Upcoming And Ongoing Events.</h2>
      <a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" class="button">Login</a> <a href="javascript:void(0)" data-toggle="modal" data-target="#RegisterModal" class="button">Register</a> </div>
  </div>
</div>

    <!-- hidden -->
  <input type="radio" class="slide-radio" checked id="s_1">
  <input type="radio" class="slide-radio" id="s_2">
  <input type="radio" class="slide-radio" id="s_3">
  <input type="radio" class="slide-radio" id="s_4">
  <!-- hidden -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" role="dialog" style="z-index: 999999">
        <div class="modal-dialog modal-dialog-centered login-modal" role="document" style="line-height: 10px; min-height: 0px;">
            <div class="modal-content">
                <div class="auth-box">
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                        <h4 class="title main-menu"><?php echo trans("login"); ?></h4>
                        <h4 class="title mobile-menu" style="border-top: 0px; font-size: 18px; position: absolute; top: 0; left: 0px; max-width: 90%;"><?php echo trans("login"); ?></h4><hr>
                    <!-- form start -->
                    <form id="form_login" novalidate="novalidate">
                        <!-- include message block -->
                        <div id="result-login" class="font-size-13"></div>
                        <div class="spinner display-none spinner-activation-login">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control auth-form-input" placeholder="<?php echo trans("email_address"); ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control auth-form-input" placeholder="<?php echo trans("password"); ?>" minlength="4" required>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo lang_base_url() . "products?search=&drls=product"; ?>" class="btn btn-md btn-custom btn-block" ><?php echo trans("login"); ?></a>
                        </div>
                        <p class="p-social-media m-0 m-t-5" style="padding-top: 10px;"><?php echo trans("dont_have_account"); ?>&nbsp;<a href="<?php echo lang_base_url(); ?>register" class="link"><?php echo trans("register"); ?></a></p>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>




    <!-- Login Modal -->
    <div class="modal fade" id="RegisterModal" role="dialog" style="z-index: 999999">
        <div class="modal-dialog modal-dialog-centered login-modal" role="document" style="line-height: 10px; min-height: 0px;">
            <div class="modal-content">
                <div class="auth-box">
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                        <h4 class="title main-menu"><?php echo trans("register"); ?></h4>
                        <h4 class="title mobile-menu" style="border-top: 0px; font-size: 18px; position: absolute; top: 0; left: 0px; max-width: 90%;"><?php echo trans("register"); ?></h4><hr>
                    <!-- form start -->
                    <form id="form_login" novalidate="novalidate">
                        <!-- include message block -->
                        <div id="result-login" class="font-size-13"></div>
                        <div class="spinner display-none spinner-activation-login">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control auth-form-input" placeholder="<?php echo trans("username"); ?>" value="<?php echo old("username"); ?>" maxlength="<?php echo $this->username_maxlength; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control auth-form-input" placeholder="<?php echo trans("email_address"); ?>" value="<?php echo old("email"); ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control auth-form-input" placeholder="<?php echo trans("password"); ?>" value="<?php echo old("password"); ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control auth-form-input" placeholder="<?php echo trans("password_confirm"); ?>" required>
                        </div>
                        <div class="form-group m-t-5 m-b-20">
                            <div class="custom-control custom-checkbox custom-control-validate-input">
                                <input type="checkbox" class="custom-control-input" name="terms" id="checkbox_terms" required>
                                <label for="checkbox_terms" class="custom-control-label"><?php echo trans("terms_conditions_exp"); ?>&nbsp;<a href="<?php echo lang_base_url(); ?>terms-conditions" class="link-terms" target="_blank"><strong><?php echo trans("terms_conditions"); ?></strong></a></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo lang_base_url() . "products?search=trending_products&drls=product"; ?>" class="btn btn-md btn-custom btn-block" style="border-radius: 6px;"><?php echo trans("register"); ?></a>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>



</body>
</html>
<script>
    defT = 2000; //1 second
    b1 = document.getElementById('slider_1');
    b2 = document.getElementById('slider_2');
    b3 = document.getElementById('slider_3');
    b4 = document.getElementById('slider_4');
    var mybtn = document.querySelectorAll('.slide-radio');
    // var i = 0;

    // var timer = setInterval(function() {
    //      if( i < mybtn.length) {
    //          mybtn[i].click();
    //          b = 'slide-radio' + (i+1); alert(i);
    //          document.getElementById(b).click();
    //          console.log("Click handler for button " + i + " fired");
    //      } else {
    //          clearInterval(timer);
    //      }
    //      i = i + 1;
    // }, defT);

    var buttons = document.querySelectorAll('.slide-radio');

    function clickButton(index) {

        mybtn[index].click();

        if (index == 0) {
            b1.click();
        } else if (index == 1) {
            b2.click();
        } else if (index == 2) {
            b3.click();
        } else if (index == 3) {
            b4.click();
        }

        if(index < buttons.length) {
            setTimeout("clickButton(" + (index+1) + ");", 5000);
        } else {
            return clickButton(0);
        }
    }

    setTimeout("clickButton(0);", 5000);


</script>