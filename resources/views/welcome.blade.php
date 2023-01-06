<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Online Tutor</title>



    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="user/css/bootstrap.css" />
    <!-- progress barstle -->
    <link rel="stylesheet" href="css/css-circular-prog-bar.css">
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font wesome stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template -->
    <link href="user/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="user/css/responsive.css" rel="stylesheet" />




    <link rel="stylesheet" href="css/css-circular-prog-bar.css">
    <style>
        i{
            font-size: 100px;
        color:slateblue;
        }
    </style>

</head>

<body>
    <div class="top_container">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <img src="user/images/logo.png" alt="">
                        <span>
                            Online Tutor
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link active" href="index.html"> Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href=""> BSC CSIt</a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href=""> BCA </a>
                                </li>



                                <li class="nav-item">
                                    <a class="nav-link" href="">BIM</a>
                                </li>

                                <li class="nav-item ">
                                    @if (Route::has('login'))

                                    @auth

                                <li class="nav-item">
                                    <a href="{{route('logout')}}" class="nav-link ">
                                       
                                        <li>
                                            Log Out
                                        </li>
                                    </a>
                                </li>





                                @else
                                <li> <a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                @endif
                                @endauth

                                @endif
                                </li>
                            </ul>

                        </div>
                </nav>
            </div>
        </header>
        <section class="hero_section ">
            <div class="hero-container container">
                <div class="hero_detail-box">
                    <h3>
                        Welcome to <br>
                        Best educations
                    </h3>
                    <h1>
                        Online Tutor
                    </h1>
                    <p>
                        Nice to see you! Happy learning folks
                    </p>
                    
                    
                </div>
                <div class="hero_img-container">
                    <div>
                        <img src="user/images/hero1.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end header section -->

    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container">
            <h2 class="main-heading ">
                About Us
            </h2>
            <p class="text-center">
                There are many variations of passages of Lorem Ipsum available, but the majority hThere are many variations of
                passages of Lorem Ipsum available.Lorem ipsum dolor sit amet consectetur adipisicing elit. D oloribus velit ducimus,
                 enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos 
                 totam nisi neque voluptates sit deleniti autem error eos totam nisi neque.
            </p>
            <div class="about_img-box ">
                <img src="user/images/hero2.jpg" alt="" class="img-fluid w-100">
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="" class="call_to-btn  ">

                    <span>
                        Read More
                    </span>
                    <img src="user/images/right-arrow.png" alt="">
                </a>
            </div>
        </div>
    </section>


    <!-- about section -->

    <!-- teacher section -->
    <section class="teacher_section layout_padding-bottom">
        <div class="container">
            <h2 class="main-heading ">
                We Provide
            </h2>
            
            <div class="row my-5">

                <div class="col-12 col-sm-6 col-md-4 m-auto" >
                    <div class="card border-0 shadow text-center my-3" >
                        <div class="card-body">
                            <i class="nav-icon fas fa-book"></i>
                            <h3>Courses</h3>
                            <p>We provide course materials for various IT courses.
                            Currently we have content on BSC. CSIT, BIT and BCA.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 m-auto">
                    <div class="card border-0 shadow text-center my-3" >
                        <div class="card-body">
                            <i class="nav-icon fas fa-copy"></i>
                            <h3>Course Content</h3>
                            <p>We provide notes, question papers and solutions of IT courses.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 m-auto">
                    <div class="card border-0 shadow text-center my-3" >
                        <div class="card-body">
                            <i class="nav-icon fas fa-file"></i>
                            <h3>Exam Special Content</h3>
                            <p>Solutions of question papers and chapter wise questions is available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 m-auto">
                    <div class="card border-0 shadow text-center my-3" >
                        <div class="card-body">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <h3>News And Notices</h3>
                            <p>Find News and Notices about exams and other events in our notice section or in blog.

</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 m-auto">
                    <div class="card border-0 shadow text-center my-3" >
                        <div class="card-body">
                            <i class="nav-icon fas fa-desktop"></i>
                            <h3>Web Optimized Content</h3>
                            <p>Our content can be accessed through many digital medium.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 m-auto">
                    <div class="card border-0 shadow text-center my-3" >
                        <div class="card-body">
                            <i class="nav-icon fas fa-cloud"></i>
                            <h3>Content availability</h3>
                            <p>Content in Collegenote is accessible 24/7. we have very minimal server down time.</p>
                        </div>
                    </div>
                </div>

            </div>
            


            
        </div>
    </section>

    <!-- teacher section -->

    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <h2 class="main-heading ">
                Our Students Feedback
            </h2>
            <p class="text-center">
                There are many variations of passages of Lorem Ipsum available, but the majority hThere are many variations of
                passages of Lorem Ipsum available, but the majority h
            </p>
            <div class="layout_padding2">
                <div class="client_container d-flex flex-column">
                    <div class="client_detail d-flex align-items-center">
                        <div class="client_img-box ">
                            <img src="user/images/student.png" alt="">
                        </div>
                        <div class="client_detail-box">
                            <h4>
                                Thani Magar
                            </h4>
                            <span>
                                (BscCsit,7th sem)
                            </span>
                        </div>
                    </div>
                    <div class="client_text mt-4">
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum."


                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- client section -->

    <!-- contact section -->

    <section class="contact_section layout_padding-bottom">
        <div class="container">

            <h2 class="main-heading">
                Contact Now

            </h2>
            <p class="text-center">
                

            </p>
            <div class="">
                <div class="contact_section-container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="contact-form">
                                <form action="">
                                    <div>
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Phone Number">
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Email">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Message" class="input_message">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn_on-hover">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- end contact section -->

    <!-- admission section -->
    






    <!-- admission section -->


    <!-- landing section -->
    

    <!-- end landing section -->




    <!-- footer section -->
    <section class="container-fluid footer_section">
        <p>
            Copyright &copy; 2022-OnlineTutor
        </p>
    </section>
    <!-- footer section -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>


</body>

</html>