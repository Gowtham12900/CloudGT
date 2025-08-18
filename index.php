<?php

   $conn = new mysqli("localhost", "root", "", "greens");
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   
   $sql = "SELECT workshop_days, from_date, to_date FROM settings WHERE id = 1";
   $result = $conn->query($sql);
   
   $workshop_days = "3";
   $formatted_dates = "July 27, 28 and 29 2025";
   $workshop_date = "2025-07-27";
   
   if ($result && $row = $result->fetch_assoc()) {
       $workshop_days = $row['workshop_days'];
       $workshop_date = $row['from_date'];
   
       $from = new DateTime($row['from_date']);
       $to = new DateTime($row['to_date']);
       $to->modify('+1 day'); 
       $year = $from->format('Y');
   
       $dates = [];
       $isFirst = true;
   
       while ($from < $to) {
           if ($isFirst) {
               $dates[] = $from->format('F d'); 
               $isFirst = false;
           } else {
               $dates[] = $from->format('d');
           }
           $from->modify('+1 day');
       }
   
       if (count($dates) > 1) {
           $last = array_pop($dates);
           $formatted_dates = implode(', ', $dates) . ' and ' . $last . ' ' . $year;
       } else {
           $formatted_dates = $dates[0] . ' ' . $year;
       }
       
   session_start();
$name = $_SESSION['popup_name'] ?? null;
$whatsapp_link = $_SESSION['popup_whatsapp'] ?? null;
// Clear after using
unset($_SESSION['popup_name']);
unset($_SESSION['popup_whatsapp']);
      }
   ?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Pavan - Greens Technologies</title>
      <meta name="author" content="Themeholy">
      <meta name="description" content="Greens Technologies">
      <meta name="keywords" content="Greens Technologies">
      <meta name="robots" content="INDEX,FOLLOW">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <link rel="apple-touch-icon" sizes="57x57" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="60x60" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="72x72" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="76x76" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="114x114" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="120x120" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="144x144" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="152x152" href="assets/img/Pavan/greens-logo.png">
      <link rel="apple-touch-icon" sizes="180x180" href="assets/img/Pavan/greens-logo.png">
      <link rel="icon" type="image/png" sizes="192x192" href="assets/img/Pavan/greens-logo.png">
      <link rel="icon" type="image/png" sizes="32x32" href="assets/img/Pavan/greens-logo.png">
      <link rel="icon" type="image/png" sizes="96x96" href="assets/img/Pavan/greens-logo.png">
      <link rel="icon" type="image/png" sizes="16x16" href="assets/img/Pavan/greens-logo.png">
      <link rel="manifest" href="assets/img/favicons/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="assets/img/Pavan/greens-logo.png">
      <meta name="theme-color" content="#ffffff">
      <link rel="preconnect" href="https://fonts.googleapis.com/">
      <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&amp;family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
      <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
      <link rel="stylesheet" href="assets/css/imageRevealHover.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/gallery.css">
      <link rel="stylesheet" href="assets/css/wave-cards.css">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
   </head>
   <body>
      <div id="preloader" class="preloader">
         <div id="loader" class="th-preloader">
            <div class="animation-preloader">
               <div class="txt-loading"><span preloader-text="G" class="characters">G</span> <span preloader-text="R" class="characters">R</span> <span preloader-text="E" class="characters">E</span> <span preloader-text="E" class="characters">E</span> <span preloader-text="N" class="characters">N</span> <span preloader-text="S" class="characters">S</span></div>
            </div>
         </div>
      </div>
      <div class="th-menu-wrapper">
         <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo"><a href="index.php"><img src="assets/img/Pavan/logo.png" style="width: 220px;" alt="Greens"></a></div>
            <div class="th-mobile-menu">
               <ul>
                  <div style="display: flex; justify-content: center; align-items: center;">
                     <button type="button" class="greenss" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <strong>Book for Live Demo</strong>
                        <div id="container-stars">
                           <div id="stars"></div>
                        </div>
                        <div id="glow">
                           <div class="circle"></div>
                           <div class="circle"></div>
                        </div>
                     </button>
                  </div>
               </ul>
            </div>
         </div>
      </div>
      <header class="th-header header-layout2">
         <div class="sticky-wrapper">
            <div class="menu-area">
               <div class="container">
                  <div class="row align-items-center justify-content-between">
                     <div class="col-auto">
                        <div class="header-logo">
                           <a class="icon-masking" href="index.php">
                           <img src="assets/img/Pavan/logo.png" alt="Greens">
                           </a>
                        </div>
                        <style>
                           .header-logo img {
                           height: 60px;
                           width: 220px;
                           }
                           @media (max-width: 768px) {
                           .header-logo img {
                           height: 40px;
                           max-width: 140px;
                           width: auto;
                           }
                           }
                        </style>
                     </div>
                     <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                        </nav>
                        <div class="header-button"> <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button></div>
                     </div>
                     <div class="col-auto d-none d-lg-block">
                        <div style="display: flex; justify-content: center; align-items: center;">
                           <button type="button" class="greenss" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <strong>Book for Live Demo</strong>
                              <div id="container-stars">
                                 <div id="stars"></div>
                              </div>
                              <div id="glow">
                                 <div class="circle"></div>
                                 <div class="circle"></div>
                              </div>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <style>
         .pulse-border {
         position: relative;
         display: inline-block;
         padding: 12px;
         border-radius: 8px;
         overflow: hidden;
         max-width: 500px;
         }
         .pulse-border::before {
         content: "";
         position: absolute;
         top: -30%;
         left: -30%;
         width: 160%;
         height: 160%;
         background: radial-gradient(circle, #008080, #7eed07);
         animation: pulse 2s ease-in-out infinite;
         z-index: 1;
         filter: blur(45px);
         opacity: 5;
         border-radius: 50%;
         }
         .pulse-border img {
         position: relative;
         z-index: 2;
         border-radius: 10px;
         display: block;
         width: 100%;
         }
         @keyframes pulse {
         0%, 100% {
         transform: scale(1);
         opacity: 0.5;
         }
         50% {
         transform: scale(1.3);
         opacity: 1;
         }
         }
      </style>
      <div class="overflow-hidden space" id="about-sec">
         <div class="container">
            <div class="row equal-height-row align-items-stretch">
               <div class="col-xl-6 mb-30 mb-xl-0">
                  <div class="th-team team-card">
                     <div class="team-img">
                        <div class="text-center">
                           <div class="pulse-border">
                              <img src="assets/img/Pavan/pavan.jpg" alt="pavan" class="img-fluid glow-img" style="max-width: 500px; border-radius: 7px; height: auto;">
                           </div>
                        </div>
                     </div>
                     <div class="team-content">
                        <div class="box-particle" id="team-p2"></div>
                        <div class="team-social">
                           <a href="https://wa.me/+919150087762" target="_blank"><i class="fab fa-whatsapp"></i></a>
                           <a href="tel:+91 9150087762"><i class="fa fa-phone"></i></a>
                           <a href="https://www.linkedin.com/in/pavan-gt-a15630357/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                           <a href="https://www.instagram.com/pavan_gt_tech_official/" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                        <h3 class="box-title">Mr Pavan</h3>
                        <span class="team-desig"><b>IT Expert, Head Trainer<br>Greens Technologies</b></span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6">
                  <div class="ps-xxl-4 ms-xl-3 d-flex flex-column justify-content-center w-100">
                     <div  class="title-area mb-35">
                        <span class="sub-title">
                           <div  class="icon-masking me-2">
                              <span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_1.svg"></span>
                              <img  src="assets/img/theme-img/title_shape_1.svg" alt="shape">
                           </div>
                           <span data-aos="flip-up" data-aos-duration="500">About Us</span>
                        </span>
                        <h2 data-aos="fade-up" data-aos-duration="1000" class="sec-title">We Are Increasing Career Success With <span class="text-theme">IT Solution</span></h2>
                     </div>
                     <p data-aos="zoom-in" data-aos-duration="1000" class="mt-n2 mb-25 text-dark" style="text-align: justify;"><b>I’m Pavan</b>, a seasoned Multi-Cloud and DevOps Architect with over <b>12 years of IT expertise</b> and <b>5+ years as a professional trainer</b>. As the Head Trainer at <b><a href="https://www.greenstechnologys.com/" target="_blank">Greens Technologies</a></b>, I’ve mentored 5000+ students through real-time, hands-on sessions in AWS, DevOps, and Cloud Strategy. My passion lies in simplifying complex technologies and transforming learners into industry-ready professionals with practical, job-focused training. I’m committed to building future-ready tech talents who can thrive in today’s dynamic cloud ecosystem. With a deep focus on real-time scenarios and industry best practices, I ensure every learner is equipped to face real-world challenges with confidence.</p>
                     <div class="about-feature-wrap">
                        <div data-aos="fade-right" data-aos-duration="1000" class="about-feature">
                           <div class="about-feature_icon"><img src="assets/img/Pavan/icon-1.png" alt="Icon"></div>
                           <div  class="media-body">
                              <h3 class="about-feature_title">Certified Trainer</h3>
                              <p class="about-feature_text">Best Provide Skills Services</p>
                           </div>
                        </div>
                        <div data-aos="fade-left" data-aos-duration="1000" class="about-feature">
                           <div class="about-feature_icon"><img src="assets/img/Pavan/icon-2.png" alt="Icon"></div>
                           <div class="media-body">
                              <h3 class="about-feature_title">Expert Team</h3>
                              <p class="about-feature_text">100% Expert Team</p>
                           </div>
                        </div>
                     </div>
                     <div class="btn-group">
                        <div data-aos="fade-up" data-aos-duration="1000" class="call-btn">
                           <div class="play-btn"><i class="fas fa-phone"></i></div>
                           <div class="media-body">
                              <span class="btn-text">Call Us On:</span>
                              <a href="tel:+91 8939915572" class="btn-title">+91 89399 15572</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="space" data-bg-src="assets/img/bg/why_bg_1.png">
         <div class="container">
            <div class="row align-items-center flex-row-reverse">
               <div class="col-xxl-7 col-xl-6 mb-30 mb-xl-0">
                  <div class="img-box2">
                     <div class="img1"><img src="assets/img/Pavan/About Greens.jpg" alt="Greens"></div>
                  </div>
               </div>
               <div class="col-xxl-5 col-xl-6">
                  <div class="title-area mb-35">
                     <span data-aos="fade-up" data-aos-duration="1000" class="sub-title">
                        <div  class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_1.svg"></span> <img src="assets/img/theme-img/title_shape_1.svg" alt="shape"></div>
                        <b>Greens Technologies</b>
                     </span>
                     <h5 data-aos="fade-down" data-aos-duration="1000" style="text-align: justify;" class="sec-title">
                     Here’s a polished and engaging About Us paragraph for <span class="text-theme">Greens Technologies</span>, capturing your 20-year legacy, top ranking, and breadth of training offerings.</h2>
                  </div>
                  <p data-aos="zoom-in" data-aos-duration="1000" style="text-align: justify; color: #000;" class="mt-n2 mb-30"><span style="color: #008080;"><b>Greens Technologies</b></span> has been a cornerstone of Chennai’s IT training landscape for over <span style="color: #008080;"><b>20 years</b></span>, earning its reputation as the <b>No. 1 software training institute with placement support <a href="https://greenstechnologys.com/" target="_blank">www.greenstechnologies.com</b></a>. Our expert-led, hands-on approach equips students—from freshers to working professionals—with practical skills in <b>AWS Solution Architect, Azure Adminstrator, GCP Associate, Aws DevOps, Azure DevOps, Data Science, Data Analytics, Machince Learning, Python, CCNA, RedHat Linux Administration, Full Stack Development</b> and other Trending Technologies. We pride ourselves on delivering Real-time projects, Lab-based learning, and Transparent Day-by-Day plans taught by trainers with MNC experience—ensuring our learners are industry-ready from day one With a stellar record of <span style="color: #008080;"><b>65,000+ Students Placed</b></span>, individualized lab support, flexible schedules, and <span style="color: #008080;"><b>100% Placement assistance</b></span>, we empower you to launch or elevate your career in some of today’s most in-demand tech fields.</p>
               </div>
            </div>
         </div>
      </div>
      <style>
         .equal-height-row {
         display: flex;
         flex-wrap: wrap;
         }
         .equal-height-row > [class*="col-"] {
         display: flex;
         flex-direction: column;
         }
         .team-img img {
         width: 100%;
         height: 100%;
         object-fit: cover;
         }
         @media (max-width: 1199.98px) {
         .equal-height-row {
         display: block;
         }
         .equal-height-row > [class*="col-"] {
         display: block;
         }
         }
         .service-card {
         transition: transform 0.3s ease, box-shadow 0.3s ease;
         box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
         border-radius: 16px;
         position: relative;
         overflow: hidden;
         }
         .service-card:hover {
         transform: translateY(-10px);
         box-shadow: 0 30px 70px 10px rgba(0, 128, 128, 0.75);
         }
      </style>
      <section class="space" id="service-sec">
         <div class="container">
            <div data-aos="fade-down" data-aos-duration="1000" class="title-area text-center">
               <h2 class="sec-title">Trending <span class="text-theme">Technologies</span></h2>
            </div>
            <div class="row gy-4">
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">01</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/devops.png" alt="Devops"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">Multi Cloud with DevOps</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>Multi-Cloud with DevOps combines multiple cloud platforms with streamlined development and deployment. It boosts flexibility, avoids vendor lock-in, and ensures high availability. DevOps automates workflows, making operations faster, more reliable, and scalable.
                        </b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">02</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/1.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;">
                        <a href="javascript:void(0)">AWS Arch Solutions Associate</a>
                     </h3>
                     <p class="service-card_text" style="text-align: justify;"><b>The AWS Certified Solutions Architect – Associate certification validates expertise in designing scalable, cost-effective, and secure applications on AWS. It covers key services like EC2, S3, RDS, and VPC. This certification is ideal for professionals aiming to architect reliable cloud solutions.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">03</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/2.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">Azure Administrator 104</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>The Microsoft Azure Administrator (AZ-104) certification validates expertise in managing Azure subscriptions, resources, and identities.
                        It covers key services like virtual machines, storage, networking, and security configurations. Ideal for professionals managing daily operations.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000"  class="service-card">
                     <div class="service-card_number">04</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/3.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">GCP Solution Arch</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>The GCP Associate Cloud Engineer certification validates foundational skills in deploying, managing, and securing applications on Google Cloud Platform.
                        It covers essential services like Compute Engine, Cloud Storage, IAM, and VPC networking for efficient cloud operations.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div  data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">05</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/4.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">AWS DevOps Engineering</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>The AWS Certified DevOps Engineer – Professional certification validates expertise in automating infrastructure, CI/CD, and monitoring on AWS.
                        It focuses on implementing DevOps practices for scalable, secure, and highly available cloud solutions.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">06</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/5.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">Azure DevOps</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>The Azure DevOps Engineer Expert certification validates advanced skills in combining development and operations using Azure DevOps services and tools.
                        It covers CI/CD pipelines, infrastructure as code, monitoring, security, and team collaboration for efficient delivery.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">07</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/6.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">Data Analytics</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>Data Analytics involves collecting, processing, and analyzing data to extract actionable insights and support decision-making.
                        It uses tools like SQL, Python, Excel, and visualization platforms such as Power BI or Tableau for effective data storytelling.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">08</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/7.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">Python</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>Python is a versatile, high-level programming language known for its readability and wide range of applications.
                        It's widely used in web development, data science, automation, machine learning, and more due to its rich libraries and community support.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">09</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/8.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">AI with Python</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>AI with Python combines Python’s simplicity with powerful libraries like TensorFlow, Keras, and Scikit-learn to build intelligent systems.
                        It's used for machine learning, natural language processing, computer vision, and automating decision-making tasks.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">10</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/9.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">Machine Learning</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>Machine Learning (ML) enables systems to learn from data and make predictions or decisions without explicit programming.
                        It uses algorithms like regression, classification, and clustering, and is applied in areas like recommendation systems, fraud detection, and automation.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">11</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/10.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">Data Science</a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>Data Science is the field of extracting meaningful insights from data using statistics, programming, and machine learning.
                        It involves data collection, cleaning, analysis, and visualization to support data-driven decision-making across industries.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
               <div class="col-md-6 col-xl-4">
                  <div data-aos="fade-up" data-aos-duration="1000" class="service-card">
                     <div class="service-card_number">12</div>
                     <div class="shape-icon"><img src="assets/Tech Icons/11.png" alt="Icon"> </div>
                     <h3 class="box-title" style="font-size: 22px;"><a href="javascript:void(0)">RedHat Linux </a></h3>
                     <p class="service-card_text" style="text-align: justify;"><b>Red Hat Linux is a powerful, enterprise-grade Linux distribution known for its stability, security, and performance.
                        Widely used in servers and data centers, it supports system administration, automation, and open-source development at scale.</b>
                     </p>
                     <div class="bg-shape"><img src="assets/img/bg/service_card_bg.png" alt="bg"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="space-top space-extra-bottom">
         <div class="container">
            <div data-aos="fade-down" data-aos-duration="1000" class="title-area text-center">
               <h2 class="sec-title">Some Demo Videos From <span class="text-theme">Experts</span></h2>
            </div>
            <div class="row justify-content-center">
               <div class="col-xl-12">
                  <div class="page-single">
                     <div class="page-content">
                        <div class="row justify-content-center text-center">
                           <div class="col-lg-4 col-md-6 mb-4">
                              <div class="th-video video-hover-glow" style="position: relative; height: 300px; overflow: hidden; border-radius: 8px;">
                                 <img src="assets/Videos/Demo-1.png" class="w-100 h-100" style="object-fit: cover; border-radius: 8px;" alt="greens">
                                 <a href="assets/Videos/Demo-1.mp4" class="play-btn popup-video"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                                    background: white; padding: 14px; border-radius: 50%; font-size: 22px;
                                    box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                                 <i class="fas fa-play"></i>
                                 </a>
                              </div>
                           </div>
                           <style>
                              .video-hover-glow {
                              transition: box-shadow 0.3s ease;
                              }
                              .video-hover-glow:hover {
                              box-shadow: 0 0 40px #008080;
                              }
                           </style>
                           <script>
                              document.querySelectorAll('.video-shadow').forEach(function (el) {
                                el.addEventListener('click', function () {
                                  el.classList.add('active');
                                  setTimeout(function () {
                                    el.classList.remove('active');
                                  }, 300);
                                });
                              });
                           </script>
                           <div   class="col-lg-4 col-md-6 mb-4">
                              <div class="th-video video-hover-glow" style="position: relative; height: 300px; overflow: hidden; border-radius: 8px;">
                                 <img src="assets/Videos/Demo-2.png" class="w-100 h-100" style="object-fit: cover; border-radius: 8px;" alt="greens">
                                 <a href="assets/Videos/Demo-2.mp4" class="play-btn popup-video"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                                    background: white; padding: 14px; border-radius: 50%; font-size: 22px;
                                    box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                                 <i class="fas fa-play"></i>
                                 </a>
                              </div>
                           </div>
                           <div   class="col-lg-4 col-md-6 mb-4">
                              <div class="th-video video-hover-glow" style="position: relative; height: 300px; overflow: hidden; border-radius: 8px;">
                                 <img src="assets/Videos/Demo-03.jpg" class="w-100 h-100" style="object-fit: cover; border-radius: 8px;" alt="greens">
                                 <a href="assets/Videos/Demo-3.1.mp4" class="play-btn popup-video"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                                    background: white; padding: 14px; border-radius: 50%; font-size: 22px;
                                    box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                                 <i class="fas fa-play"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <style>
         .countdown-timer {
         display: flex;
         justify-content: center;
         gap: 20px;
         margin-top: 20px;
         }
         .time-box {
         text-align: center;
         min-width: 60px;
         }
         .value {
         display: inline-block;
         font-size: 2.5rem;
         font-weight: bold;
         color: #fff;
         min-width: 50px;
         line-height: 1.2;
         transition: none;
         will-change: contents;
         color:#f1e60b;
         }
      </style>
      <div data-aos="fade-down" data-aos-duration="1000" class="title-area text-center">
         <h2 class="sec-title">Syllabus of <span class="text-theme">Course</span></h2>
      </div>
      <section class="countdown-offer">
         <div class="container text-center">
            <h4 data-aos="zoom-in" data-aos-duration="1000" style="color: #fff;">
               Secure Your Spot in the 
               <span class="highlight"><?php echo $workshop_days; ?>-Days</span> 
               Trending Cloud Technology Workshop – Starts from 
               <span class="highlight"><?php echo $formatted_dates; ?>!</span>
            </h4>
            <h5 style="color: #fff;">Challenge Starts In:</h5>
            <div id="countdown" class="countdown-timer">
               <div class="time-box">
                  <div class="value" id="days">00</div>
                  <div class="label">Days</div>
               </div>
               <div class="time-box">
                  <div class="value" id="hours">00</div>
                  <div class="label">Hours</div>
               </div>
               <div class="time-box">
                  <div class="value" id="minutes">00</div>
                  <div class="label">Minutes</div>
               </div>
               <div class="time-box">
                  <div class="value" id="seconds">00</div>
                  <div class="label">Seconds</div>
               </div>
            </div>
            <script>
               const countDownDate = new Date("<?php echo $workshop_date; ?> 00:00:00").getTime();
               
               const timer = setInterval(function () {
                 const now = new Date().getTime();
                 const distance = countDownDate - now;
               
                 if (distance < 0) {
                   clearInterval(timer);
                   document.getElementById("countdown").innerHTML = "<h3 style='color:#ebe40e;'>Challenge Started!</h3>";
                   return;
                 }
               
                 const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                 const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                 const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                 const seconds = Math.floor((distance % (1000 * 60)) / 1000);
               
                 document.getElementById("days").innerText = String(days).padStart(2, '0');
                 document.getElementById("hours").innerText = String(hours).padStart(2, '0');
                 document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
                 document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
               }, 1000);
            </script>
            <div  style="display: flex; justify-content: center; align-items: center;">
               <button  type="button" class="greenss" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <strong>Book for Live Demo</strong>
                  <div id="container-stars">
                     <div id="stars"></div>
                  </div>
                  <div id="glow">
                     <div class="circle"></div>
                     <div class="circle"></div>
                  </div>
               </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header justify-content-center border-0">
                        <h1 class="modal-title fs-5 text-success text-center w-100" id="exampleModalLabel"><b>Book For Live Demo</b></h1>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form action="submit_booking.php" method="POST">
                           <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="name" required placeholder="Name">
                              <label>Name</label>
                           </div>
                           <div class="form-floating mb-3">
                              <input type="number" class="form-control" name="number" required placeholder="Number">
                              <label>Number</label>
                           </div>
                           <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="location" required placeholder="Location">
                              <label>Location</label>
                           </div>
                           <div class="form-floating mb-3">
                              <select class="form-select" name="course" id="course" required>
                                 <option value="" selected disabled>Select Course</option>
                                 <option>AWS DevOps</option>
                                 <option>AWS With Terraform</option>
                                 <option>Azure DevOps</option>
                                 <option>GCP DevOps</option>
                                 <option>Multi Cloud DevOps</option>
                                 <option>Data Analytics</option>
                                 <option>Data Science</option>
                                 <option>Machine Learning</option>
                                 <option>Python with AI</option>
                                 <option>Redhat Linux</option>
                              </select>
                              <label for="course">Course</label>
                           </div>
                           <button type="submit" class="btn btn-success">Submit</button>
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><b>Close</b></button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <style>
               .modal {
               position: fixed;
               top: 0; left: 0;
               z-index: 1050;
               display: none;
               width: 100%;
               height: 100%;
               overflow: hidden;
               background-color: rgba(0,0,0,0.5);
               }
               .modal.show {
               display: block;
               }
               .modal-dialog {
               position: relative;
               width: auto;
               margin: 1.75rem auto;
               max-width: 500px;
               }
               .modal-content {
               position: relative;
               background-color: #fff;
               border: 1px solid rgba(0,0,0,.2);
               border-radius: 0.3rem;
               box-shadow: 0 3px 9px rgba(0,0,0,.5);
               outline: 0;
               }
               .modal-header,
               .modal-footer {
               display: flex;
               align-items: center;
               justify-content: space-between;
               padding: 1rem;
               border-bottom: 1px solid #dee2e6;
               }
               .modal-header {
               border-bottom: 1px solid #dee2e6;
               }
               .modal-footer {
               border-top: 1px solid #dee2e6;
               }
               .modal-title {
               margin-bottom: 0;
               line-height: 1.5;
               font-size: 1.25rem;
               }
               .btn-close {
               background: transparent;
               border: none;
               font-size: 1.5rem;
               line-height: 1;
               }
               .btn {
               padding: 0.5rem 1rem;
               border-radius: 0.25rem;
               border: 1px solid transparent;
               cursor: pointer;
               }
               .btn-primary {
               background-color: #0d6efd;
               color: #fff;
               }
               .btn-secondary {
               background-color: #6c757d;
               color: #fff;
               }
            </style>
         </div>
      </section>
      <style>
         .greenss {
         display: flex;
         justify-content: center;
         align-items: center;
         width: 15rem;
         overflow: hidden;
         height: 3rem;
         background-size: 300% 300%;
         backdrop-filter: blur(1rem);
         border-radius: 5rem;
         transition: 0.5s;
         animation: gradient_301 5s ease infinite;
         border: double 4px transparent;
         background-image: linear-gradient(#212121, #212121),
         linear-gradient(137.48deg, #ffdb3b 10%, #ff9b17d7 45%, #f9ff41 67%, #feb200d7 87%);
         background-origin: border-box;
         background-clip: content-box, border-box;
         }
         #container-stars {
         position: absolute;
         z-index: -1;
         width: 100%;
         height: 100%;
         overflow: hidden;
         transition: 0.5s;
         backdrop-filter: blur(1rem);
         border-radius: 5rem;
         }
         strong {
         z-index: 2;
         font-size: 16px;
         letter-spacing: 3px;
         color: #FFFFFF;
         text-shadow: 0 0 4px rgb(0, 0, 0);
         }
         #glow {
         position: absolute;
         display: flex;
         width: 12rem;
         }
         .circle {
         width: 100%;
         height: 30px;
         filter: blur(2rem);
         animation: pulse_3011 4s infinite;
         z-index: -1;
         }
         .circle:nth-of-type(1),
         .circle:nth-of-type(2) {
         background: rgba(0, 0, 186, 0.936); 
         }
         .greenss:hover #container-stars {
         z-index: 1;
         background-color: #212121;
         }
         .greenss:hover {
         transform: scale(1.1);
         }
         .greenss:active {
         border: double 4px #FE53BB;
         background-origin: border-box;
         background-clip: content-box, border-box;
         animation: none;
         }
         .greenss:active .circle {
         background: #FE53BB;
         }
         #stars {
         position: relative;
         background: transparent;
         width: 200rem;
         height: 200rem;
         }
         #stars::after {
         content: "";
         position: absolute;
         top: -10rem;
         left: -100rem;
         width: 100%;
         height: 100%;
         animation: animStarRotate 90s linear infinite;
         background-image: radial-gradient(#ffffff 1px, transparent 1%);
         background-size: 50px 50px;
         }
         #stars::before {
         content: "";
         position: absolute;
         top: 0;
         left: -50%;
         width: 170%;
         height: 500%;
         animation: animStar 60s linear infinite;
         background-image: radial-gradient(#ffffff 1px, transparent 1%);
         background-size: 50px 50px;
         opacity: 0.5;
         }
         @keyframes animStar {
         from {
         transform: translateY(0);
         }
         to {
         transform: translateY(-135rem);
         }
         }
         @keyframes animStarRotate {
         from {
         transform: rotate(360deg);
         }
         to {
         transform: rotate(0);
         }
         }
         @keyframes gradient_301 {
         0% {
         background-position: 0% 50%;
         }
         50% {
         background-position: 100% 50%;
         }
         100% {
         background-position: 0% 50%;
         }
         }
         @keyframes pulse_3011 {
         0% {
         transform: scale(0.75);
         box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
         }
         70% {
         transform: scale(1);
         box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
         }
         100% {
         transform: scale(0.75);
         box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
         }
         }
      </style>
      <style>
         .countdown-offer {
         background: #108888;
         border-radius: 20px;
         padding: 40px 20px;
         max-width: 850px;
         margin: 40px auto;
         box-shadow: 0 8px 30px rgba(0,0,0,0.1);
         animation: fadeInUp 1s ease;
         }
         .countdown-offer .highlight {
         color: #f1e60b;
         font-weight: bold;
         text-decoration: none;
         }
         .payment-text {
         font-size: 26px;
         font-weight: bold;
         margin: 25px 0;
         }
         .highlight-bold {
         color: #f1e60b;
         font-weight: 900;
         }
         .countdown-timer {
         display: flex;
         justify-content: center;
         gap: 25px;
         flex-wrap: wrap;
         margin: 20px 0;
         }
         .countdown-timer div {
         text-align: center;
         min-width: 60px;
         }
         .countdown-timer span {
         display: block;
         font-size: 36px;
         font-weight: 700;
         color: #f1e60b;
         }
         .countdown-timer .label {
         font-size: 14px;
         color: #fff;
         margin-top: 4px;
         font-weight: bold;
         }
         .btn-reserve {
         background: #e90000;
         color: #fff;
         padding: 15px 30px;
         border-radius: 12px;
         font-size: 18px;
         font-weight: bold;
         text-decoration: none;
         display: inline-block;
         transition: transform 0.3s ease, box-shadow 0.3s ease;
         }
         .btn-reserve:hover {
         transform: scale(1.05);
         box-shadow: 0 8px 25px rgba(0,0,0,0.2);
         }
         @keyframes fadeInUp {
         from {
         opacity: 0;
         transform: translateY(40px);
         }
         to {
         opacity: 1;
         transform: translateY(0);
         }
         }
         @media (max-width: 576px) {
         .countdown-timer {
         gap: 15px;
         }
         .countdown-timer span {
         font-size: 28px;
         }
         .countdown-timer .label {
         font-size: 12px;
         }
         }
      </style>
      <section class="team-sec space">
         <div class="container z-index-common">
            <div data-aos="fade-down" data-aos-duration="1000" class="title-area text-center">
               <h2 class="sec-title">How We Do <span class="text-theme">Placement Guidence</span></h2>
            </div>
            <div class="container text-center">
               <div class="row justify-content-center gx-4 gy-5">
                  <div class="col-12 col-md-6 col-xl-4">
                     <div data-aos="zoom-in-down" data-aos-duration="1000" class="e-card playing">
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="infotop text-center">
                           <p style="margin-bottom: 4px;">
                              <b class="card-font" style="color:rgb(0, 0, 0);font-family: 'Cinzel', serif;">Training Module With <br> Task</b>
                           </p>
                           <a class="btn btn-warning mt-1 mb-2" onclick="openPopup()"
                              style="padding: 6px 16px; font-weight: bold; border-radius: 6px;">
                           <b>Syllabus PDFs</b>
                           </a>
                           <div class="img-frame" style="width: 200px; margin: 0 auto; border-radius: 8px; overflow: hidden;">
                              <img src="assets/Videos/training Module-Thumbnail.jpg" alt="Syllabus Thumbnail"
                                 style="width: 100%; border-radius: 8px; object-fit: cover;">
                           </div>
                        </div>
                     </div>
                  </div>
                  <style>
                     .card-font
                     {
                     font-family: 'Cinzel', serif;
                     color:rgb(0, 0, 0);
                     }
                  </style>
                  <div id="pdfPopup" class="pdf-popup">
                     <div class="popup-box">
                        <button class="close-btn" onclick="closePopup()">✖</button>
                        <h4 style="text-align: center;">📁 Syllabus PDFs</h4>
                        <hr>
                        <div class="table-responsive">
                           <table class="table table-bordered" style="width: 100%; font-size: 15px;">
                              <thead style="background: #f9f9f9;">
                                 <tr>
                                    <th>Syllabus</th>
                                    <th>Download PDF</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><b>AWS_Updated_Syllabus</b></td>
                                    <td style="text-align: center;">
                                       <a href="assets/PDF/AWS_Updated_Syllabus.pdf" target="_blank" class="btn btn-sm btn-success" download>Download</a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><b>Azure 104- Adminitrator-2024</b></td>
                                    <td style="text-align: center;">
                                       <a href="assets/PDF/Azure 104- Adminitrator-2024.pdf" target="_blank" class="btn btn-sm btn-success" download>Download</a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><b>AzureDevOps-2024</b></td>
                                    <td style="text-align: center;">
                                       <a href="assets/PDF/AzureDevOps-2024.pdf" target="_blank" class="btn btn-sm btn-success" download>Download</a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><b>DEVOPS_Updated_Syllabus</b></td>
                                    <td style="text-align: center;">
                                       <a href="assets/PDF/DEVOPS_Updated_Syllabus.pdf" target="_blank" class="btn btn-sm btn-success" download>Download</a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><b>GCP_2024</b></td>
                                    <td style="text-align: center;">
                                       <a href="assets/PDF/GCP_2024.pdf" target="_blank" class="btn btn-sm btn-success" download>Download</a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><b>Multi-Cloud-DevOps-Updated-Syllabus</b></td>
                                    <td style="text-align: center;">
                                       <a href="assets/PDF/Multi-Cloud-DevOps-Updated-Syllabus.pdf" target="_blank" class="btn btn-sm btn-success" download>Download</a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><b>RHCSA RHEL9 SYLLABUS</b></td>
                                    <td style="text-align: center;">
                                       <a href="assets/PDF/RHCSA RHEL9 SYLLABUS.pdf" target="_blank" class="btn btn-sm btn-success" download>Download</a>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <script>
                     function openPopup() {
                       document.getElementById('pdfPopup').classList.add('active');
                     }
                     
                     function closePopup() {
                       document.getElementById('pdfPopup').classList.remove('active');
                     }
                  </script>
                  <style>
                     table {
                     border-collapse: collapse;
                     }
                     th, td {
                     padding: 8px 12px;
                     text-align: left;
                     border: 1px solid #ddd;
                     }
                     th {
                     background-color: #f0f0f0;
                     }
                     .pdf-popup {
                     display: none;
                     position: fixed;
                     top: 0; left: 0;
                     width: 100%; height: 100%;
                     background: rgba(0, 0, 0, 0.6);
                     z-index: 9999;
                     justify-content: center;
                     align-items: center;
                     }
                     .pdf-popup.active {
                     display: flex;
                     }
                     .popup-box {
                     background: white;
                     padding: 20px;
                     border-radius: 10px;
                     width: 100%;
                     max-width: 450px;
                     max-height: 90vh;
                     overflow-y: auto;
                     box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                     position: relative;
                     }
                     .close-btn {
                     position: absolute;
                     top: 10px;
                     right: 15px;
                     font-size: 20px;
                     background: none;
                     border: none;
                     cursor: pointer;
                     }
                  </style>
                  <style>
                     @keyframes pulsee {
                     0% {
                     transform: translate(-50%, -50%) scale(1);
                     box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.3);
                     }
                     70% {
                     transform: translate(-50%, -50%) scale(1.1);
                     box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
                     }
                     100% {
                     transform: translate(-50%, -50%) scale(1);
                     box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                     }
                     }
                     .play-btn-pulsee {
                     position: absolute;
                     top: 50%;
                     left: 50%;
                     background: white;
                     padding: 14px;
                     border-radius: 50%;
                     font-size: 22px;
                     color: black;
                     animation: pulsee 2s infinite;
                     }
                  </style>
                  <div class="col-12 col-md-6 col-xl-4">
                     <div data-aos="zoom-in-down" data-aos-duration="1000" class="e-card playing">
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="infotop text-center">
                           <p style="margin-bottom: 4px;">
                              <b class="card-font">Real Time Projects and PDFs</b>
                           </p>
                           <a href="assets/PDF/Greens Tech Projects.pdf" target="_blank"
                              class="btn btn-warning mt-1 mb-2"
                              style="padding: 6px 16px; font-weight: bold; border-radius: 6px;">
                           <b>Click to View PDFs</b>
                           </a>
                           <div class="img-frame" style="width: 200px; margin: 0 auto; border-radius: 8px; overflow: hidden;">
                              <img src="assets/Videos/Realtime-Thumbnail.jpg" alt="Project Thumbnail"
                                 style="width: 100%; border-radius: 8px; object-fit: cover;">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-6 col-xl-4">
                     <div data-aos="zoom-in-down" data-aos-duration="1000" class="e-card playing position-relative">
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="infotop">
                           <p><b class="card-font">Every Weekend Mock Interview</b></p>
                        </div>
                        <div class="video-box d-flex justify-content-center align-items-center" style="min-height: 200px; padding: 20px; position: relative; z-index: 1;">
                           <div class="video-thumb" style="position: relative; width: 200px; border-radius: 8px; overflow: hidden;">
                              <img src="assets/Videos/Mock Interview-Thumbnail.jpg" alt="Training Video" style="width: 100%; border-radius: 8px; object-fit: cover;">
                              <a href="assets/Videos/Mock.mp4" class="popup-video play-btn-pulsee">
                              <i class="fas fa-play"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-6 col-xl-4">
                     <div data-aos="zoom-in-down" data-aos-duration="1000" class="e-card playing position-relative">
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="infotop">
                           <p><b class="card-font">Technical Group <br>Discussion</b></p>
                        </div>
                        <div class="video-box d-flex justify-content-center align-items-center" style="min-height: 200px; padding: 20px; position: relative; z-index: 1;">
                           <div class="video-thumb" style="position: relative; width: 200px; border-radius: 8px; overflow: hidden;">
                              <img src="assets/Videos/Grp-Discussion.jpg" alt="Training Video" style="width: 100%; border-radius: 8px; object-fit: cover;">
                              <a href="assets/Videos/technical.mp4" class="popup-video play-btn-pulsee">
                              <i class="fas fa-play"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-6 col-xl-4">
                     <div data-aos="zoom-in-down" data-aos-duration="1000" class="e-card playing position-relative">
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="infotop">
                           <p><b class="card-font">Technical Workshop <br>Videos</b></p>
                        </div>
                        <div class="video-box d-flex justify-content-center align-items-center" style="min-height: 200px; padding: 20px; position: relative; z-index: 1;">
                           <div class="video-thumb" style="position: relative; width: 200px; border-radius: 8px; overflow: hidden;">
                              <img src="assets/Videos/workshop.jpg" alt="Training Video" style="width: 100%; border-radius: 8px; object-fit: cover;">
                              <a href="assets/videos/Mock Interview.mp4" class="popup-video play-btn-pulsee">
                              <i class="fas fa-play"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="team-sec space">
   <div class="container z-index-common">
      <div class="title-area text-center">
         <span data-aos="fade-up" data-aos-duration="1000" class="sub-title">
            <div class="icon-masking me-2">
               <span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_1.svg"></span>
               <img src="assets/img/theme-img/title_shape_1.svg" alt="shape">
            </div>
            TEAM MEMBERS
         </span>
         <h2 data-aos="zoom-in" data-aos-duration="1000" class="sec-title">
            Technologies Handled By Trainer <span class="text-theme">Pavan & Team</span>
         </h2>
      </div>

      <!-- ✅ Team Members Row -->
      <div class="row gy-4">
         <!-- 👤 Member 1 -->
         <div class="col-md-4">
            <div class="th-team team-card" style="height: 450px;">
               <div class="team-img">
                  <img src="assets/img/team/team-1.svg" alt="Team" style="width: 100%; height: auto;">
               </div>
               <div class="team-content" style="padding: 20px;">
                  <div class="box-particle" id="team-p1"></div>
                  <h3 class="box-title">Nagaprabhu</h3>
                  <div class="team-meta">
                     <span class="team-desig"><b>Team Lead : Multi Cloud</b></span>
                     <span class="team-desig" style="display: block; margin-top: 6px; font-weight: 500;">Experience: 10+ Years</span>
                  </div>
               </div>
            </div>
         </div>

         <!-- 👤 Member 2 -->
         <div class="col-md-4">
            <div class="th-team team-card" style="height: 450px;">
               <div class="team-img">
                  <img src="assets/img/team/team-2.svg" alt="Team" style="width: 100%; height: auto;">
               </div>
               <div class="team-content" style="padding: 20px;">
                  <div class="box-particle" id="team-p1"></div>
                  <h3 class="box-title">Ajith Shanmugavel</h3>
                  <div class="team-meta">
                     <span class="team-desig"><b>Azure DevOps</b></span>
                     <span class="team-desig" style="display: block; margin-top: 6px; font-weight: 500;">Experience: 5+ Years</span>
                  </div>
               </div>
            </div>
         </div>

         <!-- 👤 Member 3 -->
         <div class="col-md-4">
            <div class="th-team team-card" style="height: 450px;">
               <div class="team-img">
                  <img src="assets/img/team/team-3.svg" alt="Team" style="width: 100%; height: auto;">
               </div>
               <div class="team-content" style="padding: 20px;">
                  <div class="box-particle" id="team-p1"></div>
                  <h3 class="box-title">Manojkumar T</h3>
                  <div class="team-meta">
                     <span class="team-desig"><b>Aws DevOps</b></span>
                     <span class="team-desig" style="display: block; margin-top: 6px; font-weight: 500;">Experience: 5+ Years</span>
                  </div>
               </div>
            </div>
         </div>
<style>
@media (min-width: 768px) {
  .custom-top-gap {
    margin-top: 80px !important;
  }
}
</style>

         <!-- 👤 Member 4 -->
         <div class="col-md-4 custom-top-gap">

            <div class="th-team team-card" style="height: 450px;">
               <div class="team-img">
                  <img src="assets/img/team/team-4.svg" alt="Team" style="width: 100%; height: auto;">
               </div>
               <div class="team-content" style="padding: 20px;">
                  <div class="box-particle" id="team-p1"></div>
                  <h3 class="box-title">Gopinath A</h3>
                  <div class="team-meta">
                     <span class="team-desig"><b>Lead Trainer Multi cloud with DevOps</b></span>
                     <span class="team-desig" style="display: block; margin-top: 6px; font-weight: 500;">Experience: 8+ Years</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


      <section class="bg-top-center space" data-bg-src="assets/img/bg/testi_bg_3.jpg">
         <div class="container">
            <div data-aos="zoom-in" data-aos-duration="1000" class="title-area text-center">
               <div class="shadow-title color2">TESTIMONIALS</div>
               <br>
               <h2 class="sec-title text-white">What Happy Students Says<br><span class="text-theme">Reviews & Ratings</span></h2>
            </div>
            <div class="slider-area">
               <div class="swiper th-slider has-shadow" id="testiSlider3" data-slider-options='{"loop":true,"autoplay":{"delay":1200,"disableOnInteraction":false},"speed":600,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":1},"768":{"slidesPerView":2},"992":{"slidesPerView":2},"1200":{"slidesPerView":3}}}'>
                  <div class="swiper-wrapper">
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/1.jpg" alt="Review Image" style="width: 100%; max-width: 300px;  object-fit: cover; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/2.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/4.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/5.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/6.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/7.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/8.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/10.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/11.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/12.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/13.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/14.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/15.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="testi-grid" style="text-align: center;">
                           <img src="assets/Reviews/16.jpg" alt="Review Image" style="width: 100%; max-width: 300px; border-radius: 12px;">
                        </div>
                     </div>
                  </div>
               </div>
               <button data-slider-prev="#testiSlider3" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#testiSlider3" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
            </div>
         </div>
      </section>
      <div class="title-area text-center">
         <h2 data-aos="zoom-in" data-aos-duration="1000" class="sec-title">Contact <span class="text-theme">Us</span></h2>
      </div>
      <div class="space" id="contact-sec">
         <div class="container">
            <div class="row gy-4">
               <div data-aos="zoom-in" data-aos-duration="1000" class="col-xl-4 col-md-6">
                  <div class="contact-info" style="box-shadow: 0 4px 20px #008080; border-radius: 12px; background-color: #008080; color: #fff;">
                     <a href="https://maps.app.goo.gl/Zph5tM1RhBC89sUM7" target="_blank">
                        <div class="contact-info_icon" style="
                           color: #fff;
                           animation: pulse 1.8s infinite;
                           display: flex;
                           justify-content: center;
                           align-items: center;
                           height: 40px;
                           width: 30px;
                           ">
                           <i class="fas fa-location-dot"></i>
                        </div>
                     </a>
                     <div class="media-body">
                        <h4 class="box-title" style="color: #f1e60b;">Our Office Address</h4>
                        <span class="contact-info_text">
                        <a href="https://maps.app.goo.gl/Zph5tM1RhBC89sUM7" target="_blank" style="color: #fff;">
                        <b>149, 1C/1D, 1st Floor Opposite to DLF IT Park Ramapuram,<br>
                        Above Axis Bank, Porur, Chennai, Tamil Nadu 600089.</b> 
                        </a>
                        </span>
                     </div>
                  </div>
               </div>
               <div data-aos="zoom-in" data-aos-duration="1000" class="col-xl-4 col-md-6">
                  <div class="contact-info" style="box-shadow: 0 4px 20px #008080; border-radius: 12px; background-color: #008080; color: #fff;">
                     <div class="contact-info_icon" style="
                        color: #fff;
                        animation: pulse 1.8s infinite;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 40px;
                        width: 30px;
                        ">
                        <i class="fas fa-phone"></i>
                     </div>
                     <div class="media-body">
                        <h4 class="box-title" style="color: #f1e60b;">Call Us Anytime</h4>
                        <span class="contact-info_text">
                        <br>
                        <a href="tel:+918939915572" style="color: #fff;"><b>+91 89399 15572</b></a><br>
                        <a href="tel:+917708055559" style="color: #fff;"><b>+91 77080 55559</b></a>
                        </span>
                     </div>
                  </div>
               </div>
               <div data-aos="zoom-in" data-aos-duration="1000" class="col-xl-4 col-md-6">
                  <div class="contact-info" style="box-shadow: 0 4px 20px #008080; border-radius: 12px;background-color: #008080; color: #fff;">
                     <div class="contact-info_icon" style="
                        color: #fff;
                        animation: pulse 1.8s infinite;
                        display: flex;
                        justify-content: center;
                        align-items: center;Ajith
                        height: 40px;
                        width: 30px;
                        ">
                        <i class="fas fa-envelope" style="color: #fff;"></i>
                     </div>
                     <div class="media-body">
                        <h4 class="box-title" style="color: #f1e60b;">Send an Email</h4>
                        <span class="contact-info_text"><br><a style="color: #fff;" href="mailto:contact@greenstechnologys.com"><b>contact@greenstechnologys.com</b></a><br><a style="color: #fff;" href="mailto:greenscloudofficial@gmail.com"><b>greenscloudofficial@gmail.com</b></a></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <style>
         @keyframes pulse {
         50% { transform: scale(1); opacity: 1; }
         50% { transform: scale(1.15); opacity: 0.85; }
         100% { transform: scale(1); opacity: 1; }
         }
      </style>




               <div class="branch-buttons text-center">
               <button class="btn btn-primary btn-sm" onclick="changeMap('porur')"><b>Porur</b></button>
               <button class="btn btn-warning btn-sm" onclick="changeMap('Ambattur')"><b>Ambattur</b></button>
               <button class="btn btn-danger btn-sm" onclick="changeMap('Avadi')"><b>Avadi</b></button>
               <button class="btn btn-success btn-sm" onclick="changeMap('MountRoad')"><b>Mount Road</b></button>
               </div>

               <div class="map-wrapper mt-4">
               <div class="map-container">
                  <iframe id="gmap" loading="lazy" allowfullscreen></iframe>
               </div>
               </div>
               <style>
               .map-wrapper {
                  padding-left: 15px;
                  padding-right: 15px;
               }

               .map-container {
                  display: flex;
                  justify-content: center;
               }

               #gmap {
                  width: 100%;
                  max-width: 900px;
                  height: 500px;
                  border: 0;
                  border-radius: 15px;
                  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
               }
               </style>
               <script>
               const locations = {
                  porur:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3694.8295973330596!2d80.17399137484236!3d13.025277687295114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5261d57bdce53b%3A0x809b300b38398912!2sGreens%20Technology!5e1!3m2!1sen!2sin!4v1754399607117!5m2!1sen!2sin",
                  Ambattur:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3693.4165706527183!2d80.14654027795656!3d13.119661554229983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52633486dd0445%3A0xfb9b22b08e8f2bc1!2sGreens%20Technology%20Ambattur!5e1!3m2!1sen!2sin!4v1754399904810!5m2!1sen!2sin",
                  Avadi:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3693.4194923356517!2d80.09088227484408!3d13.119467087209644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52893c0003dcdd%3A0x3259190735021a8d!2sGreens%20Technologies%20Avadi!5e1!3m2!1sen!2sin!4v1754400026843!5m2!1sen!2sin",
                  MountRoad:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3694.30155645194!2d80.25891127484299!3d13.060626887262954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52678759e15b3b%3A0x79fa7a64fa3c7d39!2sGreens%20Technologys%20Mount%20Road!5e1!3m2!1sen!2sin!4v1754400122666!5m2!1sen!2sin"
                  // Add more branches
               };

               function changeMap(branch) {
                  document.getElementById("gmap").src = locations[branch];
               }

               // Set default location
               changeMap('porur');
               </script>




               <br>






      <footer class="footer-wrapper footer-layout1">
         <div class="copyright-wrap bg-title">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-6 text-center">
                     <p class="copyright-text">
                        Copyright <i class="fal fa-copyright"></i> 2025 
                        <a href="https://www.greenstechnologys.com/" target=_blank><b>Greens Technologies</b></a>. All Rights Reserved.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="shape-left"><img src="assets/img/shape/footer_shape_2.svg" alt="shape"></div>
         <div class="shape-right">
            <div class="particle-1" id="particle-5"></div>
         </div>
      </footer>
      <div class="scroll-top">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
         </svg>
      </div>
      <script src="assets/js/vendor/jquery-3.7.1.min.js"></script><script src="assets/js/swiper-bundle.min.js"></script><script src="assets/js/bootstrap.min.js"></script><script src="assets/js/jquery.magnific-popup.min.js"></script><script src="assets/js/jquery.counterup.min.js"></script><script src="assets/js/circle-progress.js"></script><script src="assets/js/jquery-ui.min.js"></script><script src="assets/js/imagesloaded.pkgd.min.js"></script><script src="assets/js/isotope.pkgd.min.js"></script><script src="assets/js/tilt.jquery.min.js"></script><script src="assets/js/gsap.min.js"></script><script src="assets/js/ScrollTrigger.min.js"></script><script src="assets/js/smooth-scroll.js"></script><script src="assets/js/particles.min.js"></script><script src="assets/js/particles-config.js"></script><script src="assets/js/imageRevealHover.js"></script><script src="assets/js/main.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
         AOS.init();
      </script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <script>
         $(document).ready(function () {
           $('.popup-video').magnificPopup({
             type: 'iframe',
             iframe: {
               markup: '<div class="mfp-iframe-scaler">' +
                         '<div class="mfp-close"></div>' +
                         '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                       '</div>'
             },
             callbacks: {
               elementParse: function (item) {
                
                 item.src = '<video controls autoplay style="width:100%; height:auto;"><source src="' + item.el.attr('href') + '" type="video/mp4"></video>';
                 item.type = 'inline';
               }
             }
           });
         });
      </script>
      <?php if (!empty($name)): ?>
<style>
#confetti-canvas {
    position: fixed !important;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
    z-index: 99999 !important;
    pointer-events: none;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.createElement('canvas');
    canvas.id = "confetti-canvas";
    document.body.appendChild(canvas);

    const myConfetti = confetti.create(canvas, {
        resize: true,
        useWorker: true
    });

    myConfetti({
        particleCount: 200,
        spread: 120,
        origin: { y: 0.6 }
    });

    Swal.fire({
        icon: 'success',
        title: '<?= $name ?>',
        text: 'Thank You For Contacting Us!',
        confirmButtonColor: '#00b894',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?= !empty($whatsapp_link) ? $whatsapp_link : 'index.php' ?>";
        }
    });
});
</script>
<?php endif; ?>
   </body>
</html>