<section id="mission-vision" class="gray-section d-flex align-items-center" 
    style="min-height: 100vh; position: relative; padding: 0;">



    <div class="container position-relative py-5" style="z-index: 2;">
        
      
        <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="font-bold text-uppercase text-white" style="font-size: 2.5rem;">Mission and Vision</h2>
                <p class="text-white fs-5" style="font-size: 1.25rem;">The ETEEAP Program's foundation is guided by the following mission and vision:</p>
            </div>
        </div>

      
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8">
                <div class="ibox-content p-4 p-md-5 text-white" style="background-color: rgba(0, 0, 0, 0.2); backdrop-filter: blur(10px); border-radius: 24px;">
                    
                    <h3 class="mb-3 font-bold" style="font-size: 1.75rem;">Mission</h3>
                    <p class="fs-5 mb-0 text-justify" style="font-size: 1.125rem;">
                        The Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) provides access and opportunities to the formal higher education system for deserving Filipinos with prior experiential learning.
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="ibox-content p-4 p-md-5 text-white" style="background-color: rgba(0, 0, 0, 0.2); backdrop-filter: blur(10px); border-radius: 24px;">
                    <h3 class="mb-3 font-bold" style="font-size: 1.75rem;">Vision</h3>
                    <p class="fs-5 mb-0 text-justify" style="font-size: 1.125rem;">
                        The ETEEAP envisions a society where individuals’ skills and experiences are recognized, promoting lifelong learning and inclusivity in higher education.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div style="
      position: absolute;
      inset: 0;
      background: url('{{ asset('inspinia/img/landing/r.jpg') }}') no-repeat center center fixed;
      background-size: cover;
      background-attachment: fixed;
      background-blend-mode: overlay;
      z-index: 0;
    "></div>
</section>


<style>
#mission-vision * {
    color: white !important;
}

#mission-vision .navy-line {
    background-color: #fff;
    height: 3px;
    width: 80px;
    margin: 0 auto 1rem auto;
    border-radius: 2px;
}


@media (min-width: 992px) {
    #mission-vision h2 {
        font-size: 2.5rem; 
    }

    #mission-vision p.fs-5 {
        font-size: 1.25rem; 
    }

    #mission-vision h3 {
        font-size: 1.75rem; 
    }

    #mission-vision .ibox-content {
        padding: 2.5rem 4rem;
    }
}


@media (max-width: 992px) {
    #mission-vision h2 {
        font-size: 2rem; 
    }

    #mission-vision p.fs-5 {
        font-size: 1rem;
    }

    #mission-vision h3 {
        font-size: 1.5rem; 
    }

    #mission-vision .ibox-content {
        padding: 2rem;
    }
}

@media (max-width: 576px) {
    #mission-vision h2 {
        font-size: 1.5rem;
    }

    #mission-vision p.fs-5 {
        font-size: 0.95rem;
    }

    #mission-vision h3 {
        font-size: 1.25rem;
    }

    #mission-vision .ibox-content {
        padding: 1.5rem;
    }
}
</style>

@include('partials.footer')
