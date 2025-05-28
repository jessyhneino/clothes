@extends('layouts.master')

@section('title')
HOME
@endsection

@section('content') 

        <!-- ------------------------------------------ section home-------------------------------------  -->


        <div class="home " id="Home" >
            <div class="HPbt">
                <div class="HP">
                    <h3 class="H">Lavender Ladies</h3>
                    <p class="P">
                        we offer you a variety of sports <br>
                        fashion specially designed to meet the needs <br>of women who are seeking sport with elegance and comfort.<br> 
                        We guarantee you high quality and distinctive <br> designs that suit all kinds of sports,
                        which helps you achieve your sports goals with confidence.<br>
                        Go towards a healthy and active lifestyle with our wonderful collection!
                    </p>
                </div>
                <div class="home-btn1">
                    <a class="level-home btn1" href="#browse"><button>Get Started</button>   </a>
                </div>
            </div>
            <div class="home-img">
                <img src="{{asset('images/logostar3.png')}}" class="yoga">
            </div>
        </div>

        <!-- ------------------------------------------ end section home-------------------------------------  -->


        <!-- ------------------------------------------ section cards id-------------------------------------  -->

        <div class="card-container">
            <div class="card-home">
                <img class="card-home-img" src="{{asset('images/photo2.jpg')}}">
                <div class="card-content">
                    <h3 class="card-home-h3">Graphic Design</h3>
                    <p class="card-home-p">
                        Graphic design for women combines elegance and creativity,
                         where focusing on attractive colors and innovative 
                         styles reflecting strength and femininity. 
                         Features personalized designs, and unique optical elements 
                         highlight beauty and excellence. The design embodies the vision
                          of modern women and enhances its presence in the world of art and technology.
                    </p>
                </div>
            </div>
            <div class="card-home">
                <img class="card-home-img" src="{{asset('images/photo1.jpg')}}">
                <div class="card-content ">
                    <h3 class="card-home-h3">Fashion Designer</h3>
                    <p class="card-home-p">
                        Fashion designer is a creative artist that embodies elegance
                        and innovation in every design.  It is characterized by a unique vision
                        that combines colors, fabrics, and fine details, which creates pieces that reflect the p
                        ersonality of the modern woman.
                        Through its designs, it transmits the messages of strength and trust, making each piece
                        of artistic masterpiece tells a unique story.
                    </p>
                </div>
            </div>
            <div class="card-home">
                <img class="card-home-img" src="{{asset('images/photo3.jpg')}}">
                <div class="card-content">
                    <h3 class="card-home-h3">Photographer</h3>
                    <p class="card-home-p">
                        The photographer is an artist who captures enchanting moments in a unique style,
                         reflecting the spirit of femininity and the details of life, coloring them with
                          magical hues. Her lens is used to tell inspiring stories, showcasing emotions
                           and colors, making each image a masterpiece that expresses the beauty of the
                            world from her own perspective.                   
                    </p>
                </div>
            </div>
            <div class="card-home">
                <img class="card-home-img" src="{{asset('images/photo4.jpg')}}">
                <div class="card-content">
                    <h3 class="card-home-h3">Casual Fashion</h3>
                    <p class="card-home-p">
                        Casual costumes for women combine comfort and elegance, 
                        as they feature simple designs and comfortable colors. 
                         It includes pieces such as jeans, loose shirts, and sports shoes,
                          giving women a modern and comfortable look that fits various occasions. 
                           These costumes reflect
                        the character of the modern woman who seeks to balance elegance and comfort.
                    </p> 
                </div>
            </div>
        </div>
<!-- ------------------------------------------end section cards id-------------------------------------  -->

<!-- ------------------------------------------section clock-------------------------------------  -->

        <div class="clh">
            <p class="clh-p">
                Set for yourself an hour a day,and enjoy the journey<br>
                of the transformation towards a healthy and attractive body.<br>
                with our comfortable and distinguished clothes of the club.
            </p>
            <div class="clock" id="time">
                <div class="circle" style="--clr:#FF389C">  
                    <div class="dots  hr_dot"></div>
                    <svg>
                        <circle  cx="70" cy="70" r="70"></circle>
                        <circle  cx="70" cy="70" r="70" id="hh" ></circle>
                    </svg>
                    <div id="hours">00</div>
                </div>
                <div class="circle"   style="--clr:#fee800">
                    <div class="dots  min_dot"></div>
                    <svg>
                        <circle  cx="70" cy="70" r="70"></circle>
                        <circle  cx="70" cy="70" r="70"  id="mm"></circle>
                    </svg>
                    <div id="minutes"> 00</div>
                </div>
                <div class="circle"   style="--clr:#04fc43">
                    <div class="dots  sec_dot"></div>
                    <svg>
                        <circle  cx="70" cy="70" r="70"></circle>
                        <circle  cx="70" cy="70" r="70"  id="ss"></circle>
                    </svg>
                    <div id="seconds">00</div>
                </div>
                <div class="ap">
                    <div id="ampm">
                         AM
                    </div>
                </div>
            </div>       
        </div>

<!-- ------------------------------------------end section clock-------------------------------------  -->


<!-- ------------------------------------------ section swiper-------------------------------------  -->


        <section class="cloth" id="browse">
          
                <div class="swiper  cloth-slider">
                        <div class="swiper-wrapper">
                                <div class="swiper-slide   slide">
                                        <img src="{{asset('images/shose.jpg')}}" alt="" class="user-image">
                                        <h2 class="user-name">Sneakers</h2>
                                        <a href="#shose">
                                            <!-- <button class="btn1 message-button" >Look at</button>  -->
                                        </a>
                                </div>
                                <div class="swiper-slide   slide">
                                        <img src="{{asset('images/Vison.jpg')}}" alt="" class="user-image">
                                        <h2 class="user-name">Leggings</h2>
                                        <a href="#browse">
                                            <!-- <button class="btn1 message-button">Look at</button>  -->
                                        </a>
                                </div>
                                <div class="swiper-slide   slide">
                                        <img src="{{asset('images/sweater2.jpg')}}" alt="" class="user-image">
                                        <h2 class="user-name">Sweaters</h2>
                                        <a href="#browse">
                                            <!-- <button class="btn1 message-button">Look at</button>  -->
                                        </a>
                                </div>
                                <div class="swiper-slide   slide">
                                        <img src="{{asset('images/jacket.jpg')}}" alt="" class="user-image">
                                        <h2 class="user-name">Jackets</h2>
                                        <a href="#browse">
                                            <!-- <button class="btn1 message-button">Look at</button>  -->
                                        </a>
                                </div>
                                <div class="swiper-slide   slide">
                                        <img src="{{asset('images/sock.jpg')}}" alt="" class="user-image">
                                        <h2 class="user-name">Socks</h2>
                                                
                                        <a href="#browse">
                                            <!-- <button class="btn1 message-button">Look at</button>  -->
                                        </a>
                                </div>
                                <div class="swiper-slide   slide">
                                        <img src="{{asset('images/towel.jpg')}}" alt="" class="user-image">
                                        <h2 class="user-name">Towels</h2>
                                        <a href="#browse">
                                            <!-- <button class="btn1 message-button">Look at</button>  -->
                                        </a>
                                </div>
                                <div class="swiper-slide   slide">
                                        <img src="{{asset('images/suit.jpg')}}" alt="" class="user-image">
                                        <h2 class="user-name">Tracksuits</h2>
                                        <a href="#browse">
                                            <!-- <button class="btn1 message-button">Look at</button>  -->
                                        </a>
                                </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    
                </div>
        </section>

<!-- ------------------------------------------end section swiper-------------------------------------  -->
<!-- ------------------------------------------section view-------------------------------------  -->
        <div class="look">
            <h3 class="look-h3">"Explore the world of our products with its charming details,
            just press the button and discover what awaits you!"
            </h3>
            <a class="look-a" href="/cards">
                <button class="btn2">View The Product</button> 
            </a>
        </div>
<!-- ------------------------------------------end section view-------------------------------------  -->
<!-- ------------------------------------------section map-------------------------------------  -->
        <div class="map">
            <div class="mapd">
                <iframe class="mapp" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d621714.
                    0783297188!2d14.084112070547121!3d52.50501170704109!2m3!1f0!2f0!3f0!3m2!1i1024!2i76
                    8!4f13.1!3m3!1m2!1s0x47a84e373f035901%3A0x42120465b5e3b70!2z2KjYsdmE2YrZhtiMINij2YT
                    Zhdin2YbZitin!5e0!3m2!1sar!2s!4v1728457964551!5m2!1sar!2s">
                </iframe>       
                <div class="details">
                    <h2 class="map-h2">Visit one of our agency locations or contact us today </h2>
                    <h3 class="map-h3">Head Office</h3>
                    <div class="inform">
                        <p class="map-p">  <i  class="fa-solid fa-flag"></i>    56 Glassford Street Glassgow GI IUL New York</p>
                        <p class="map-p">   <i  class="fa-solid fa-message"></i>    contact@lavender.com</p>
                        <p class="map-p">  <i  class="fa-solid fa-phone"></i>    contact@lavender.com</p>
                        <p class="map-p"> <i  class="fa-solid fa-clock"></i>    Monday to Saturday :9.00am to 16pm</p>
                    </div>
                </div>
            </div>
        </div>
<!-- ------------------------------------------end section map-------------------------------------  -->
        
        <!-- <h1 class="text-3xl font-bold underline bg-blue-300 w-32 h-32">
                 Hello world!
        </h1> -->
            

@endsection