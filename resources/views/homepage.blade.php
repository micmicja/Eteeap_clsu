@extends('layouts.app')

@section('title', 'ETEEAP - Home')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<style>
    .btn:hover {
     transform: scale(1.05); 
     transition: transform 0.2s ease-in-out; 
     box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
 }
 .navbar {
     position: absolute;
     background-color: rgba(0, 0, 0, 0.5); /* semi-transparent */
     width: 100%;
     z-index: 10;
 }

    
    .announcement-slide {
        animation: fadeIn 0.9s ease-in-out;
    }
    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    .post-content img {
    width: auto !important;
    max-width: 100% !important;
    height: auto !important;
    max-height: 500px !important;
    display: block;
    margin: 10px auto;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);


}

#announcementSlider {
        position: relative;
        min-height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .announcement-slide {
        flex: 1 1 auto;
        max-width: 700px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .announcement-title-row {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin-bottom: 1rem;
    }
    .announcement-title-row h3 {
        flex: 1 1 auto;
        text-align: center;
        margin: 0 1rem;
        font-weight: 600;
    }
    #prevBtn, #nextBtn {
        position: static !important;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        font-size: 1.3rem;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(0,0,0,0.13);
        background: linear-gradient(135deg, #F9B233 60%, #fff 100%);
        color: #087a29;
        border: none;
        outline: none;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 0.5rem;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.15s;
        box-shadow: 0 4px 16px rgba(249,178,51,0.13);
    }
    #prevBtn:hover, #nextBtn:hover {
        background: linear-gradient(135deg, #087a29 60%, #F9B233 100%);
        color: #fff;
        transform: scale(1.08);
        box-shadow: 0 6px 20px rgba(8,122,41,0.18);
    }
    #prevBtn:active, #nextBtn:active {
        background: #087a29;
        color: #fff;
        transform: scale(0.97);
    }
    #prevBtn i, #nextBtn i {
        margin: 0;
    }
    @media (max-width: 991.98px) {
        #prevBtn {
            left: -30px;
        }
        #nextBtn {
            right: -30px;
        }
        .announcement-slide {
            max-width: 95vw;
        }
    }
    @media (max-width: 767.98px) {
        .announcement-title-row h3 {
            font-size: 1rem;
        }
        #prevBtn, #nextBtn {
            width: 32px;
            height: 32px;
            font-size: 1rem;
        }
    }
     </style>

<div id="inSlider" class="carousel slide carousel-fade" data-ride="carousel" style="position: relative; z-index: 2; padding-top: 4rem; padding-bottom: 35rem;">
    @php
        $sliders = $sliders ?? collect();
    @endphp

    @if($sliders->count() > 0)
        <ol class="carousel-indicators">
            @foreach ($sliders as $index => $slider)
                <li data-target="#inSlider" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="header-back" style="
                        position: relative;
                        height: 550px;
                        background-image: url('{{ asset($slider->image_path) }}');

                        background-size: cover;
                        background-position: center;
                    ">
                        <div style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            height: 100%;
                            width: 100%;
                            backdrop-filter: blur(2px);
                            background-color: rgba(0, 0, 0, 0.4);
                            z-index: 1;
                        "></div>

                        <div style="
                            position: relative;
                            z-index: 2;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100%;
                            text-align: center;
                        ">
                            <h1 class="animate__animated animate__fadeInUp" style="
                                font-size: 100px !important;
                                color: #e9e9e9 !important;
                                text-align: center !important;
                                font-family: 'Poppins', sans-serif;
                                font-weight: 700;
                                letter-spacing: 1px;
                                text-shadow: 2px 2px 5px #22d112;
                            ">
                                {{ $slider->title ?? '' }}
                            </h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    @endif
</div>


<div class="position-relative" style="min-height: 100vh; overflow: hidden;">
  

<section class="container my-5 text-center position-relative overflow-hidden rounded shadow-lg" style="min-height: 300px;">
    <div class="p-5 rounded shadow-lg" style="background: linear-gradient(90deg,  #078f19 , #f0e628);">
        <h2 class="text-white mb-4" style="font-size: 28px; font-weight: 600;">
            Start Your ETEEAP Journey Today!
        </h2>

        @guest
        <a href="{{ route('login') }}"
           class="btn btn-warning btn-lg font-weight-bold shadow"
           style="padding: 14px 40px; font-size: 18px; border-radius: 50px; background-color: #FFD700; border-color: #FFD700;">
            <i class="fa fa-paper-plane mr-2"></i> Apply Now
        </a>
    @else
        <a href="{{ route('information') }}"
           class="btn btn-success btn-lg font-weight-bold shadow"
           style="padding: 14px 40px; font-size: 18px; border-radius: 50px; background-color: #28A745; border-color: #28A745;">
            <i class="fa fa-check-circle mr-2"></i> Continue Application
        </a>
    @endguest
    
    
    </div>
</section>


<section id="Announcenment" class="container my-5">
    <h2 class="text-center p-3 mb-4 rounded" style="background-color: #009639; color: white; font-size: 24px; font-weight: 600;">
        Announcements
    </h2>

    @if($posts->count())
        <div id="announcementSlider" class="position-relative">
            @foreach($posts as $index => $post)
                <div class="announcement-slide" style="{{ $index === 0 ? '' : 'display: none;' }}">
                    <div class="announcement-title-row">
                        <button id="prevBtn" class="btn" aria-label="Previous"><i class="fa fa-chevron-left"></i></button>
                        <h3 class="mb-2">{{ $post->title }}</h3>
                        <button id="nextBtn" class="btn" aria-label="Next"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <div class="post-content">
                        {!! $post->description !!}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No announcements available.</p>
    @endif

</section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        $('#inSlider').carousel({
            interval: 5000,
            ride: 'carousel'
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.announcement-slide');
        let currentSlide = 0;
        let slideInterval = null;
        let autoSlideStopped = false;

        const showSlide = (index) => {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none';
            });
        };

        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        };

        const prevSlide = () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        };

        const startAutoSlide = () => {
            slideInterval = setInterval(nextSlide, 7000);
        };

        const stopAutoSlide = () => {
            clearInterval(slideInterval);
            autoSlideStopped = true;
        };

        // Attach event listeners to all prev/next buttons in each slide
        document.querySelectorAll('#prevBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                prevSlide();
                stopAutoSlide();
            });
        });
        document.querySelectorAll('#nextBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                nextSlide();
                stopAutoSlide();
            });
        });

        showSlide(currentSlide);
        startAutoSlide();
    });
</script>











</div>




@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: {!! json_encode(session('success')) !!},
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        customClass: {
            popup: 'p-2 text-sm'
        }
    });
</script>
@endif





@endsection