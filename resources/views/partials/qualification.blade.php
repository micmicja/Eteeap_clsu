<section id="qualification" class="py-5" style="position: relative; min-height: 100vh;">

   
    <div style="
      position: absolute;
      inset: 0;
      background: url('{{ asset('inspinia/img/landing/r.jpg') }}') no-repeat center center;
      background-size: cover;
      
      background-blend-mode: overlay;
      z-index: 0;
    "></div>
  
    <div class="container position-relative" style="z-index: 2; padding-top: 8rem; padding-bottom: 5rem;">
      <div class="wrapper wrapper-content animated fadeInRight">

      <div class="row mb-5">
        <div class="col-12 text-center">
          <div class="navy-line mb-3"></div>
          <h2 class="font-bold text-uppercase text-white">Qualifications of an Applicant</h2>
          <p class="fs-5 text-white">An ETEEAP applicant must be a Filipino citizen and must meet the following qualifications:</p>
        </div>
      </div>
  
    
      <div class="row g-4 justify-content-center">
        @foreach([
          'Must be at least a high school graduate or must have passed the Philippine Education Placement Test (PEPT).',
          'Must have at least five (5) years of work experience related to the course being applied for.',
          'Must be at least 25 years old as supported by an NSO-authenticated birth certificate.'
        ] as $index => $qualification)
        
        <div class="col-12 col-md-6 col-lg-4">
          <div class="ibox-content p-5 h-100 text-white" style="background-color: rgba(0, 0, 0, 0.25); backdrop-filter: blur(12px); border-radius: 24px;">
            <h4 class="mb-4" style="font-size: 2rem;"><strong>{{ $index + 1 }}.</strong></h4>
            <p class="fs-5 mb-0 text-justify">{{ $qualification }}</p>
          </div>
        </div>
  
        @endforeach
      </div>
  
    </div>
  </section>
  

  <style>
  #qualification .navy-line {
    width: 80px;
    height: 4px;
    background-color: #fff;
    margin: 0 auto 1rem;
    border-radius: 3px;
  }
  
  #qualification .ibox-content {
    background-color: rgba(255,255,255,0.25);
    backdrop-filter: blur(12px);
    border-radius: 24px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
  }
  
  #qualification .ibox-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
  }
  
  #qualification h2, 
  #qualification p {
    color: white;
  }
  
  #qualification p {
    font-size: 1.1rem;
  }
  
  @media (max-width: 768px) {
    #qualification h2 {
      font-size: 2rem;
    }
  
    #qualification p.fs-5 {
      font-size: 1rem;
    }
  }
  
  @media (max-width: 576px) {
    #qualification h2 {
      font-size: 1.75rem;
    }
  
    #qualification p.fs-5 {
      font-size: 0.95rem;
    }
  }
  </style>
  
  @include('partials.footer')
  