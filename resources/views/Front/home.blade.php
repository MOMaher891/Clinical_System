<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Clinical System</title>

    <!-- All Style files -->
    <link rel="stylesheet" href="{{ asset('Front/Style/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/Style/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/Style/Normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/Style/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/Style/main.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Link Swiper's CSS -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('Front/Style/slider.css') }}">
</head>

<body>
    @if (Session::has('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ Session::get('success') }}",
                showConfirmButton: false,
                dangerMode: true,
                timer: 1500
            })
        </script>
    @endif

    <div class="setting-box">
        <div class="content-icon">
            <i class="fa fa-gear"></i>
        </div>
        <div class="setting-container">
            <div class="options">
                <h5>Web Colors</h5>
                <ul class="color-list">
                    <li data-color="#03A9F4"></li>
                    <li data-color="#003D4C"></li>
                    <li data-color="#009688"></li>
                    <li data-color="#FF9800"></li>
                </ul>
            </div>
            <div class="options">
                <h5>Background Options</h5>
                <div class="randomBG">
                    <button class="btn btn-success active" data-background="true">Yes</button>
                    <button class="btn btn-danger" data-background="false">No</button>
                </div>
            </div>
            <div class="options">
                <h5>Bullets Options</h5>
                <div class="bulletsOption">
                    <button class="btn btn-success active" data-bullet="true">Yes</button>
                    <button class="btn btn-danger" data-bullet="false">No</button>
                </div>
            </div>
            <div class="options">
                <h5>Language Options</h5>
                <div class="language">
                    <a href="Pages/Arabic/arabic.html" class="btn btn-success" data-bullet="true">Arabic</a>
                    <a href="home.html" class="btn btn-danger active" data-bullet="false">English</a>
                </div>
            </div>
        </div>
        <button class="btn btn-danger reset">Reset Options</button>

    </div>
    <!-- Setting-Box -->
    <!-- NavBullets -->
    <div class="nav-bullet">
        <div class="bullets" data-section=".landing">
            <div class="tool-bullet">Home</div>
        </div>
        <div class="bullets" data-section=".services">
            <div class="tool-bullet">Outpatient Clinics</div>
        </div>
        <div class="bullets" data-section=".who-we-are">
            <div class="tool-bullet">Who we are</div>

        </div>
        <div class="bullets" data-section=".informations">
            <div class="tool-bullet">Information</div>

        </div>
        <div class="bullets" data-section=".feed-back">
            <div class="tool-bullet">Feed Back</div>
        </div>
        <div class="bullets" data-section=".content">
            <div class="tool-bullet">Contact US</div>
        </div>

    </div>
    <!-- NavBullets -->

    <!-- About Us -->
    <div class="aboutUs">
        <div class="container">
            <div class="infos">
                <a href="#" class="info">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <p>call us now! +1 305 708 2563</p>
                </a>
                <a href="https://mail.google.com/" target="_blank" class="info"><i class="fa-solid fa-envelope"></i>
                    <p>medical@example.com</p>
                </a>

                <a href="https://www.google.com/maps/@29.0607152,31.1137432,14z" target="_blank" class="info"><i
                        class="fa-solid fa-location-dot"></i>
                    <p> Find our Location</p>
                </a>

            </div>
            <div class="socialMedia">
                <a href="http://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></a></i>

                <a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <!-- <a href="https://vimeo.com/" target="_blank"><i class="fa-brands fa-vimeo-v"></i></a> -->
            </div>
        </div>

    </div>
    <!-- About Us -->

    <!-- Nav Bar -->
    <div class="landing">
        <div class="overlay"></div>

        <div class="intro-text">
            <h1>Welcome in <span>Vezeeta</span> Organization</h1>
            <p>You can book a survey through us </p>
        </div>
        <div class="navbar navbar-expand-lg ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container collapse navbar-collapse" id="navbarSupportedContent">
                <div class="main">
                    <i class="fa-solid fa-house-chimney-medical"></i>
                    <a class="navbar-brand" href="{{ route('home') }}">Vezeeta</a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Outpatient Clinics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#who-we-are">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#feedback">FeedBack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- </div> -->
        </div>


    </div>
    <!-- Nav Bar -->
    <!-- Services -->

    <div class="services" id="services">

        <div class="main-heading">
            <h1>Outpatient clinics</h1>
        </div>
        <section>
            <div class="swiper mySwiper container">
                <div class="swiper-wrapper content">
                    @foreach ($departments as $dep)
                        <div class="swiper-slide serv-content"
                            style="background-image: url({{ asset('Admin/Images/Departments/' . $dep->dep_image) }}); background-repeat: no-repeat; background-size: cover;">

                            <div class="overlay"></div>
                            <div class="card-content" style="opacity: 100%;z-index: 1;">
                                <h1>{{ $dep->dep_name }}</h1>
                                <div class="rating">

                                    @php
                                        $unrate = 5 - $dep->dep_rate;
                                        $rate = 5 - $unrate;
                                    @endphp

                                    @for ($i = 0; $i < $rate; $i++)
                                        <i class="fas fa-star" style="color:#FFC107"></i>
                                    @endfor

                                    @for ($i = 0; $i < $unrate; $i++)
                                        <i class="far fa-star" style="color:#FFC107"></i>
                                    @endfor


                                </div>
                                <p>{{ $dep->dep_price }}.LE</p>
                                <a class="btn btn-success book"
                                    href="{{ route('book.specific.department', $dep->id) }}">Book</a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </section>
    </div>

    <!-- Services -->

    <!--Who We Are -->

    <!-- Who We Ares -->
    <div class="testimonials who-we-are" id="who-we-are">
        <div class="overlay"></div>

        <div class="container">
            <div class="main-heading">
                <h1>Our Doctors</h1>
            </div>
            <div class="testimonials-content">

                @foreach ($doctors as $doc)
                    <div class="ts-box">

                        <div class="person-info">
                            <img src="{{ asset('Admin/Images/Doctors/' . $doc->doc_image) }}" alt="">
                            <h4>Dr.{{ $doc->doc_name }}</h4>
                            <p>{{ $doc->department->dep_name }}</p>
                        </div>
                        <div class="media-icons">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-github"></i>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Testimonials -->

    <!-- ------------------------------------------------------------------------ -->
    <!--Who We Are -->

    <!-- Information -->
    <div class="informations">
        <div class="container">
            <div class="information active">
                <i class="fa-solid fa-user-doctor"></i>
                <h1>Doctors</h1>
                <h4>{{ $doc_count }}</h4>
                <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
            </div>
            <div class="information">
                <i class="fa-solid fa-hospital-user"></i>
                <h1>Patients</h1>
                <h4>{{ $pat_count }}</h4>
                <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
            </div>
            <div class="information">
                <i class="fa-solid fa-bed-pulse"></i>
                <h1>Applications</h1>
                <h4>{{ $app_count }}</h4>
                <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
            </div>
            <div class="information">
                <i class="fa-solid fa-square-poll-vertical"></i>
                <h1>Departments</h1>
                <h4>{{ $dep_count }}</h4>
                <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
            </div>
        </div>
    </div>
    <!-- Information -->

    <!-- Public FeedBack -->

    <div class="public-feed" id="feedback">
        <div class="main-heading">
            <h1>FeedBack</h1>
        </div>
        <section>

            <div class="swiper mySwiper container">
                <div class="swiper-wrapper content">

                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="Image/fed-1.jpg" alt="">
                            </div>

                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </div>

                            <div class="name-profession">
                                <span class="name">Mohamed Maher</span>
                                <span class="profession">1900199</span>
                            </div>

                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>

                            </div>

                            <div class="button">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="Image/fed-2.jpg" alt="">
                            </div>

                            <div class=" media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </div>

                            <div class="name-profession">
                                <span class="name">Mohamed Magdy</span>
                                <span class="profession">Web Developer</span>
                            </div>

                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>

                            <div class="button">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="Image/fed-3.jpg" alt="">
                            </div>

                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </div>

                            <div class="name-profession">
                                <span class="name">Mohamed Yasser</span>
                                <span class="profession">Mobile Developer</span>
                            </div>

                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="button">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="Image/fed-4.jpg" alt="">
                            </div>

                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </div>

                            <div class="name-profession">
                                <span class="name">Marwa Mostafa Arafat</span>
                                <span class="profession">1900214</span>
                            </div>

                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>

                            </div>

                            <div class="button">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="Image/fed-8.jpg" alt="">
                            </div>

                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </div>

                            <div class="name-profession">
                                <span class="name">Maram Essam</span>
                                <span class="profession">1900212</span>
                            </div>

                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="button">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="Image/fed-6.jpg" alt="">
                            </div>

                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </div>

                            <div class="name-profession">
                                <span class="name">Nada Gamal Sophy</span>
                                <span class="profession">1900252</span>
                            </div>

                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="button">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide card">
                        <div class="card-content">
                            <div class="image">
                                <img src="Image/fed-7.jpg" alt="">
                            </div>

                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </div>

                            <div class="name-profession">
                                <span class="name">Nour Mostaffa</span>
                                <span class="profession">1900268</span>
                            </div>

                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="button">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>


        </section>
    </div>

    <!-- Public FeedBack -->

    <!-- Feed Back -->
    <div class="feed-back">
        <div class="container">
            <button class="feed-back-btn">Your FeedBack</button>

            <div class="fedback">
                <div class="top">

                    <h3>Vezzeta</h3>
                    <h5>Your Feed Back</h5>
                    <i class="fa-solid fa-xmark close"></i>

                </div>
                <hr>
                <div class="median">
                    <p>We would like your fedd back to improve our webite</p>
                    <p>what is your opinion</p>
                    <div class="faces">
                        <i class="fa-solid fa-poo "></i>
                        <i class="fa-regular fa-face-frown"></i>
                        <i class="fa-regular fa-face-smile"></i>
                        <i class="fa-regular fa-face-smile-beam active"></i>
                        <i class="fa-regular fa-face-kiss-wink-heart"></i>
                    </div>
                </div>
                <hr>
                <div class="last">
                    <p>please select your feedBack category bleow</p>
                    <div class="btn btn-outline-dark">Suggestion</div>
                    <div class="btn btn-outline-dark ">Somethings is not quite right</div>
                    <div class="btn btn-outline-dark">Compliment</div>
                </div>
                <hr>
                <div class="message">
                    <p class="error">Please leave your feedBack bleow</p>
                    <input type="text" name="" id="" class="form-control w-75 feedbackInput">
                    <button class="btn btn-success send">Send</button>

                </div>

            </div>
        </div>
    </div>
    <!-- Feed Back -->


    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">top products</h3>
                            <ul>
                                <li class="mb-2"><a href="#">managed website</a></li>
                                <li class="mb-2"><a href="#">managed reputation</a></li>
                                <li class="mb-2"><a href="#">power tools</a></li>
                                <li><a href="#">marketing service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">newsletter</h3>
                            <p class="mb-4">You can trust us. we only send promo offers, not a
                                single.</p>
                            <form action="#">
                                <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your email here'" required="">
                                <button type="submit" class="template-btn">subscribe now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3">
                        <div class="single-widge-home">
                            <h3 class="mb-4">Our Location</h3>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13948.35544600213!2d31.1137432!3d29.073519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145a266c7d1ab631%3A0x298bc2cb6c1ca83c!2sBenisuef%20University%20Hospital!5e0!3m2!1sen!2seg!4v1651017408870!5m2!1sen!2seg"
                                width="400" height="200px" style="border:0; cursor: pointer;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <p>

                            Copyright ©2022 All rights reserved | This
                            template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                            <span>Five
                                M</span>

                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social-icons">
                            <div class="socialMedia1">
                                <a href="http://www.facebook.com" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></a></i>

                                <a href="https://www.linkedin.com/" target="_blank"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                                <a href="https://twitter.com/" target="_blank"><i
                                        class="fa-brands fa-twitter"></i></a>
                                <a href="https://www.instagram.com/" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a>
                                <a href="https://vimeo.com/" target="_blank"><i class="fa-brands fa-vimeo-v"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->


    <!-- JAVA SCRIPT -->

    <script src="{{ asset('Front/Script/main.js') }}"></script>

    <!-- Swiper JS -->
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
    <script src="{{ asset('Front/Script/slider.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/js/jquery.min.jss"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>

</html>
