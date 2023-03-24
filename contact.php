<?php
    
        use PHPMailer\PHPMailer\PHPMailer;
	    use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Except;
if(isset($_POST['docSubmit'])){
     $secret = "6Lf3rbAhAAAAAMdYaPiaL6tR22fApqpcLkJAT8ql";
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
 $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptchaResponse}&remoteip={$userIp}";
$content = file_get_contents($request);
  $row = json_decode($content, true);
  
	$s_name=$_POST['s_name'];
	$s_email=$_POST['s_email'];
	$term_conditions=$_POST['term_conditions'];
	$update_news=$_POST['update_news'];
	$con_message=$_POST['con_message'];
	     $file=$_FILES['file']['name'];
		  $tmp=$_FILES['file']['tmp_name'];
		   move_uploaded_file($tmp,'contact_img/'.$file);
   if (!$row) {
        if($file){
		// php mailer custome code
		    require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';
			$mail = new PHPMailer(true);
    //Server settings                
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';                    
			$mail->SMTPAuth   = true;                                 
			$mail->Username   = 'htmlbasket@gmail.com';  //Write Your Email                  
			$mail->Password   = 'cnoagzdjqaipyqri';   // Write Your Password               
			$mail->SMTPSecure = 'tls';         
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		
			//Recipients
			$mail->setFrom($s_email, $s_name);
			
			$mail->addAddress("info@htmlbasket.com");     //Add a recipient
			
			$mail->AddReplyTo($s_email,$s_name);
			   
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = " FROM HTMLBASKET CUSTOMER CONTACT FORM";
			$mail->Body    = "Name: ".$s_name."<br/>"."Email: ".$s_email."<br/>".$term_conditions."<br/>".$update_news."<br/>"."Message"."<br/>".$con_message;
			$mail->addAttachment('contact_img/'.$file); 
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
                       session_start();
						$_SESSION['name']=$s_name;
				}else{
                    echo "<script>
                    alert('Sorry! Your message has been failed');
                    window.location.href='contact.php';

                </script>";
				}
	}
	else{
		// php mailer custome code
		    require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';
			$mail = new PHPMailer(true);
    //Server settings                
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';                    
			$mail->SMTPAuth   = true;                                 
			$mail->Username   = 'htmlbasket@gmail.com';  //Write Your Email                  
			$mail->Password   = 'cnoagzdjqaipyqri';   // Write Your Password               
			$mail->SMTPSecure = 'tls';         
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		
			//Recipients
			$mail->setFrom($s_email, $s_name);
			
			$mail->addAddress("info@htmlbasket.com");     //Add a recipient
			
			$mail->AddReplyTo($s_email,$s_name);
			   
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = " From HTMLBASKET CUSTOMER Contact Form";
			$mail->Body    = "Name: ".$s_name."<br/>"."Email: ".$s_email."<br/>".$term_conditions."<br/>".$update_news."<br/>"."Message"."<br/>".$con_message;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
                        session_start();
						$_SESSION['name']=$s_name;
				}else{
                    echo "<script>
                    alert('Sorry! Your message has been failed');
                    window.location.href='contact.php';

                </script>";
				}
	}
   }else{
       echo "<script>
                    alert('You have failed to pass recaptcha. What does this means? ROBOT!');
                    window.location.href='contact.php';

                </script>";
       
   }
    
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="psd to html, psd to xhtml, psd to html5, psd to wordpress, psd to magento, psd to drupal, html production, convert design to html, convert psd to html, convert psd to wordpress, convert psd to magento, convert psd to drupal, convert image to html, convert design to email.">
    <meta name="description" content="HTMLBASKET is a website conversion service provider offers Responsive HTML, HTML5, WordPress, Email services and more. Give us your design and we will convert into pixel perfect HTML code using highest quality responsive markup resulting website with all device and browser compatibility.">
    <meta name="robots" content="index, follow" />
    <title>Convert Design to HTML |Wordpress | Shopify | Magento | Email | HTMLBASKET</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/themewar-font.css">
    <link rel="stylesheet" href="assets/css/dgita-icon.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/settings.css">
    <link rel="stylesheet" href="assets/css/lightslider.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/preset.css">
    <link rel="stylesheet" href="assets/css/ignore_for_wp.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <style>
        @media (max-width:514px) and (min-width:270px) {
            .col_remove {
                width: 0px;
                display: none;
            }

            .banner-title {
                font-size: 32px;
                line-height: 36px;
            }

            .pageBanner {
                height: 270px !important;
            }

            .banner-desc {
                font-size: 12px;
                line-height: 19px;
            }
        }

        @media (max-width:514px) and (min-width:270px) {

            .contact_form input[type=email],
            .contact_form input[type=text],
            .contact_form input[type=url],
            .contact_form input[type=tel],
            .contact_form input[type=number],
            .contact_form textarea {
                height: 34px;
                font-size: 12px;
            }

            .custom-select {
                height: 40px;
                line-height: normal;
                font-size: 11px;
                padding: 0;
                padding-left: 5px;
            }

            .contact_form textarea {
                height: 126px;
                line-height: normal;
                padding-top: 13px;
            }

            .fallback {
                height: 40px;
                font-size: 12px;
                line-height: 30px;
            }

            .conFormWrapper p {
                line-height: 20px !important;
                font-size: 11px;
                text-align: start;
                margin-bottom: 0px;
            }

            .contact_form input[type=checkbox]~label {
                font-size: 12px !important;
                line-height: 20px;
            }

            .contact_form input[type=checkbox]~label:before {
                height: 13px;
                width: 13px;
            }

            .contact_form .dgBtn {
                font-size: 12px;
                margin-top: 16px;
            }

            .conFormFreeWrapper {
                padding: 0;
            }

            .conFormWrapper h3 {
                font-size: 17px !important;
                line-height: normal !important;
            }

            .conFormWrapper .contactInfo p {
                line-height: 18px;
                font-size: 13px;
            }
        }

        @media (max-width:992px) and (min-width:514px) {
            .col_remove {
                width: 0px;
                display: none;
            }

            .col_add {
                flex: 100%;
                width: 85vw;
                max-width: 100%;
            }

            .conFormWrapper p {
                line-height: 27px;
                font-size: 13px;
            }

            .conFormWrapper h3 {
                font-size: 28px;
            }

        }

        .pageBanner {
            position: relative;
            height: 350px;
            background-color: #f9f9ff;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

        .vmiddle {
            position: relative;
            top: 65%;
            transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
        }

        .conFormWrapper p {
            line-height: 34px;
            margin-bottom: 0px;
        }

        .conFormWrapper h3 {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .conFormWrapper h3 {
            font-size: 28px;
        }

        @media (max-width: 1480px) {
            .testimonial-tooltip {
                width: 230px;
                left: 0;
                padding: 60px 20px 30px 30px;
            }
        }

        .testimonial-tooltip {
            position: -webkit-sticky;
            position: sticky;
            top: 125px;
            width: 300px;
            left: 0;
            padding: 60px 50px 30px;
            border: 2px solid #e7e8e8;
            border-radius: 6px;
            margin-top: 40px;
            background: #fff;
            z-index: 3;
        }

        .testimonial-tooltip .testimonial__image {
            position: absolute;
            width: 80px;
            top: -40px;
            left: 50%;
            margin-left: -40px;
            z-index: 20;
        }

        .testimonial-tooltip .testimonial__image img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .testimonial-tooltip blockquote {
            position: relative;
            display: block;
            font-size: 13px;
            line-height: 1.7;
        }

        .testimonial-tooltip blockquote:before {
            content: "";
            display: inline-block;
            width: 13px;
            height: 14px;
            background: url(assets/images/ico-single-quote.png) no-repeat 0 0;
            background-size: contain;
            position: absolute;
            top: -7px;
            left: -17px;
        }

        .testimonial-tooltip blockquote:after {
            content: "";
            display: inline-block;
            width: 13px;
            height: 14px;
            background: url(assets/images/ico-single-quote-bottom.png) no-repeat 0 0;
            background-size: cover;
            position: relative;
            bottom: -12px;
        }

        .testimonial-tooltip .testimonial__content h6 {
            font-size: 14px;
        }

        .testimonial-tooltip .testimonial__content h6 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .testimonial-tooltip .testimonial__content p {
            font-size: 12px;
        }

        .testimonial-tooltip .testimonial__content p span {
            color: #888;
        }

        .form__controls>i:first-child {
            position: absolute;
            top: 50%;
            left: 15px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .upload .upload__url {
            cursor: pointer;
            padding-right: 130px;
        }

        .ico-link {
            width: 15px;
            height: 15px;
            background-image: url(assets/images/ico-link.svg);
        }

        .field,
        .select {
            display: block;
            width: 100%;
            height: 45px;
            padding-right: 16px;
            padding-left: 16px;
            border: 2px solid #353535;
            border-radius: 5px;
            font-size: 14px;
            background: none;
            -webkit-transition: color .3s, background .3s, border-color .3s;
            -o-transition: color .3s, background .3s, border-color .3s;
            transition: color .3s, background .3s, border-color .3s;
        }

        .form__hint {
            margin: 10px 0;
            opacity: .6;
            font-size: 12px;
        }

        .contact_form input[type=checkbox]~label {
            position: relative;
            padding-left: 30px;
            font-size: 14px;
            color: #100c0b;
            opacity: .6;
            cursor: pointer;
            display: block;
        }

        .form__order {
            position: sticky;
            top: -1px;
        }
    </style>
</head>

<body>
    <?php error_reporting(E_ERROR | E_PARSE); ?>
    <?php require('constant.php'); ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <header class="header01 centerMenu isSticky">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navBar01">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo.png" alt="Dgita"></a>
                        </div>
                        <a href="javascript:void(0)" class="menu_btn"><i class="twi-bars2"></i></a>
                        <nav class="mainMenu">
                            <ul>
                                <li><a href="portfolio.html">Portfolio</a></li>

                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">All Services</a>
                                    <ul class="sub-menu">
                                        <li><a href="responsive-html.html">Responsive HTML</a></li>
                                        <li><a href="responsive-wordpress.html">Responsive Wordpress</a></li>
                                        <li><a href="responsive-email.html"> Responsive Email </a></li>
                                        <li><a href="shopify-development.html">Shopify Development</a></li>
                                        <li><a href="magento-development.html">Magento Development</a></li>
                                        <li><a href="responsive-joomla.html">Responsive Joomla</a></li>
                                        <li><a href="html-to-wordpress.html">HTML to Wordpress</a></li>
                                        <li><a href="html-to-responsive.html">Static to Responsive HTML</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">About Us</a>
                                    <ul class="sub-menu">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="testimonial.html">Testimonials</a></li>
                                        <li><a href="our-process.html">Our Process</a></li>
                                    </ul>
                                </li>
                                <li><a href="our-promise.html">Why Us</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a class="clien_area"  href="https://dashboard.htmlbasket.com"
                                    target="_blank"><span>Client area</span></a></li>
                            </ul>
                        </nav>
                        <div class="accessNav">

                            <a class="phoneBtn" href="tel:+01682648101"><i class="fa fa-phone"></i> +01682648101
                            </a>
                            <a class="phoneBtn" href="mailto:info@htmlbasket.com"><i class="fa fa-envelope-o"></i></a>
                            <a class="phoneBtn" href="https://join.skype.com/invite/wZsrPtciTNpm"><i class="fa fa-skype"></i></a>

                            <!-- <a class="" href="contact.php">Get Quote</span></a> -->
                            <a class="dgBtn_two" href="contact.php"><span>Get Quote</a>
                            <a class="dgBtn_three transparentBtn" href="https://dashboard.htmlbasket.com" target="_blank"><span>Login</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="pageBanner" style="background-image: url(assets/images/bg/banner.png);">
        <div class="vmiddle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <h2 class="banner-title">Contact Us</h2>
                        <p class="banner-desc">Our versatile team is built of designers, developers and digital
                            marketers who all bring unique experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contactPage">
        <div class="SecLayerimg move_anim">
            <img src="assets/images/bg/s34.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="conFormWrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>WANT TO CONTACT HTMLBASKET?</h2>
                                <p>Do you have any questions for us? Do you have any concerns or problems? Are you
                                    wanting an update on the status of your order? Want to chat to us about a potential
                                    or ongoing project? Or perhaps you want more information about us or our services?
                                    Then please enter your contact information in the form below, and we will endeavour
                                    to get in touch with you to assist you within 12 - 24 hours during normal office
                                    working hours.</p>
                            </div>
                            <div class="col-md-4 col_remove">
                                <div class="form__order">
                                    <div class="testimonial-tooltip" style="">
                                        <div class="testimonial__image">
                                            <img src="assets/images/team/Owen.jpg" alt="" width="300" height="300">
                                        </div>
                                        <blockquote>
                                            I would most definitely keep going back to HTMLBASKET, the work quality is second to none and they are extremely professional in every way.
                                            Regardless of obstacles, HTMLBASKET remained loyal and saw me through to completion. I also liked that they are available to speak in person via Skype.
                                            I look forward to working with them on a regular basis going forward, thanks to the hard work they have put in on this project. </blockquote>
                                        <div class="testimonial__content">
                                            <h6>Owen Hernandez</h6>
                                            <p>
                                                <span>Happy HTMLBASKET Customer</span><br>
                                                
                                            </p>
                                        </div><!-- /.testimonial__content -->
                                    </div><!-- /.testimonial-single -->
                                </div>
                            </div>
                            <div class="col-md-8 col_add">
                                <div class="contact_form">
							 <p style="font-size:20px;color:green;"><?php session_start();if(isset($_SESSION['name'])){echo "Thank you ".$_SESSION['name']." ! "."We have receive your message.We will contact you within the next 1-2 hours. 
							             You will shortly receive a confirmation email. If you do not receive an email, please check your Junk Mail / Spam folder.";}?></p>
                                    <form  method="POST" enctype="multipart/form-data" class="contact-form">
                                        <div class="row row-5">
                                            <div class="col-md-6 mb-20">
                                                <div class="form-label-group">
                                                    <input type="text" class="form-control" name="s_name" title="Enter alphabets only." placeholder="Name here *" required />
                                                    <span id="full_name_error_upload" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-20">
                                                <div class="form-label-group">
                                                    <input type="email" class="form-control" name="s_email" id="email_upload" placeholder="Email *" required />
                                                    <span id="email_error_upload" class="text-danger"></span>
                                                </div>
                                            </div>
                                         
                                           
                                            <div class="col-md-12 mb-20">
                                                <textarea class="required" name="con_message" id="con_message" placeholder="Your Message here"></textarea>
                                            </div>
                                            <div class="col-md-12 mb-20">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple   />
                                                </div>
												<div class="g-recaptcha" data-sitekey="6Lf3rbAhAAAAAMOZP5HFhqPFgTyPq_N_7nR6WNfJ"></div>
                                                <p class="form__hint">
                                                    We accept designs in Adobe XD, AI, PSD, PNG, PDF, Sketch, Indd, Figma, Invision, Zeplin.
                                                    Please include project specs if necessary.<br>
                                                    Multiple files are supported. Maximum size per file is
                                                    <strong>512 MB</strong>.
                                                </p>
                                            </div>
                                            <div class="col-md-12 mb-20">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="term_conditions" type="checkbox" value="Yes, I consent to the processing of my personal data and agree to the Term & Conditions" id="flexCheckChecked2">
                                                    <label class="form-check-label" for="flexCheckChecked2">
                                                        I consent to the processing of my personal data and agree to the
                                                        <a href="">Terms & Conditions.</a>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="update_news" class="form-check-input" type="checkbox" value="Yes,I want to receive news and service updates from HTMLBASKET." id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        I want to receive news and service updates from HTMLBASKET.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-20">
                                                 
                                                <div class="form-label-group text-center contact">
                                                    <button type="submit" class="dgBtn" type="submit" value="send" name="docSubmit">Submit Message</button>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-12 ">
                                                <div id="mail-status_upload"></div>
                                            </div>
                                            <div id="loader-icon_upload" style="display:none;">
                                                <img src="assets/images/loader.gif" />
                                            </div>
                                        </div>
                                    </form>
                                  
                                </div>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="conFormFreeWrapper">
                                <h3>Please feel free to ask questions or share your comments with us.</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="contactInfo">
                                            <img src="assets/images/c1.png" alt="">
                                            <h4>Phone</h4>
                                            <p>
                                                Call : +01682648101<br>
                                                Fax : 02 9292162
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contactInfo">
                                            <img src="assets/images/c2.png" alt="">
                                            <h4>Address</h4>
                                            <p>
                                                417 Main St, Little Rock
                                                AR 72201, United States
                                            </p>
                                        </div>
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
    <footer class="footer_01 white">
        <div class="SecLayerimg move_anim">
            <img src="assets/images/bg/s17.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 col-xl-3">
                    <div class="widget">
                        <h3 class="widget_title">Our Services</h3>
                        <ul>
                            <li><a href="responsive-html.html">Responsive HTML</a></li>
                            <li><a href="responsive-wordpress.html">Responsive Wordpress</a></li>
                            <li><a href="responsive-email.html"> Responsive Email </a></li>
                            <li><a href="shopify-development.html">Shopify Development</a></li>
                            <li><a href="magento-development.html">Magento Development</a></li>
                            <li><a href="responsive-joomla.html">Responsive Joomla</a></li>
                            <li><a href="html-to-wordpress.html">HTML to Wordpress</a></li>
                            <li><a href="html-to-responsive.html">Static to Responsive HTML</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3  col-lg-3 ">
                    <div class="widget widget-2">
                        <h3 class="widget_title">About Company</h3>
                        <ul>
                            <li><a href="portfolio.html">Portfolio</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="testimonial.html">Testimonials</a></li>
                            <li><a href="our-process.html">Our Process</a></li>
                            <li><a href="our-promise.html">Why Us</a></li>
                            <li><a href="feature.html">Feature</a></li>
                            <li><a href="service.html">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3">
                    <div class="widget widget-2">
                        <h3 class="widget_title">Quick Links</h3>
                        <ul>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="non-disclosure.html">Non-disclosure</a></li>
                            <li><a href="terms-of-use.html">Terms of use</a></li>
                            <li><a href="money-back-guarantee.html">Money-back</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3">
                    <div class="widget contact_widget">
                        <h3 class="widget_title">Contact Us</h3>
                        <div class="contact_info">
                            <ul>
                                <li><a><i class="fa fa-envelope-o"></i>info@htmlbasket.com</a></li>
                                <li><a><i class="twi-skype"></i>Skype - htmlbasket</a></li>
                                <li><a><i class="fa fa-map-pin"></i>417 Main St, Little Rock, AR 72201, United
                                        States</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright 2022, All Right Reserved</p>

                        <script src="//code.tidio.co/ndqow5q1hslsvfmo72gunblivas1xzbs.js" async></script>

                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="javascript:void(0);" id="backtotop"><i class="twi-arrow-to-top1"></i></a>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/lightslider.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightcase.js"></script>
    <script src="assets/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/js/extensions/revolution.extension.video.min.js"></script>
    <!-- plugin js -->
    <script src="assets/js/dropzone.min.js"></script>
    <!-- init js -->
    <script src="assets/js/component.fileupload.js"></script>

    <script src="assets/js/form.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>