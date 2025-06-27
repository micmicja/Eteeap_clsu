<section id="procedures" class="py-5" style="position: relative; min-height: 100vh;">

 
   <div style="
      position: absolute;
      inset: 0;
      background: url('{{ asset('inspinia/img/landing/r.jpg') }}') no-repeat center center fixed;
      background-size: cover;
      background-attachment: fixed;
      background-blend-mode: overlay;
      z-index: 0;
    "></div>
   
      z-index: 0;
    "></div>
  
   
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="container position-relative px-4 px-lg-5" style="z-index: 2; padding-top: 8rem; padding-bottom: 5rem;">
      
     
      <div class="row mb-5">
        <div class="col-12 text-center">
          
          <h2 class="font-weight-bold text-uppercase text-white" style="font-size: 2.0rem;">Procedures in Applying for ETEEAP</h2>
        </div>
      </div>
  
    
      <div class="row gy-5 gx-4 justify-content-center">
        @foreach([
          ['Application Form', 'Secure ETEEAP application forms from the CLSU ETEEAP office or download from <a href="https://ched.gov.ph" target="_blank" class="text-primary text-decoration-none">ched.gov.ph</a>.'],
          ['Submit Requirements', 'Submit completed forms and documents for preliminary evaluation by the ETEEAP Director.'],
          ['Portfolio Submission', 'Submit a portfolio of prior learning and work experience to the deputized HEI.'],
          ['Interview & Exams', 'Attend an interview and take aptitude and psychological exams at CLSU Testing Center.'],
          ['Orientation Seminar', 'Attend the seminar and submit documents for evaluation by the assessment panel.'],
          ['Skills Demonstration', 'Demonstrate required skills at the worksite based on program requirements.']
        ] as $index => [$title, $description])
        <div class="col-12 col-md-6 col-lg-4 @if($index < 3) mb-5 mb-lg-4 @endif">
          <div class="procedure-card p-4 h-100">
            <h5 class="fw-bold mb-3">{{ $index + 1 }}. {{ $title }}</h5>
            <p class="mb-0">{!! $description !!}</p>
          </div>
        </div>
        @endforeach
      </div>
  
    </div>
  </section>
  
  <!-- Styles -->
  <style>
  #procedures .navy-line {
    width: 100px;
    height: 8px;
    background-color:#009639;
    margin: 0 auto 1rem;
    border-radius: 3px;
  }
  
  #procedures .procedure-card {
    background: rgba(0, 0, 0, 0.15);
    border-left: 10px solid #45b31a;
    border-radius: 24px;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: all 0.3s ease-in-out;
    color: rgb(234, 234, 234);
    padding: 2rem; 
  }
  
  #procedures .procedure-card:hover {
    border-left-color: #13fb07;
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
  }
  
  #procedures h2, 
  #procedures h5 {
    color: white;
  }
  
  #procedures p {
    color: rgba(255, 255, 255, 0.75);
    font-size: 1.2rem; 
    text-align: justify;
  }
  
  #procedures a.text-primary {
    color: #1ab394;
    transition: color 0.3s;
  }
  
  #procedures a.text-primary:hover {
    color: #13fb07;
    text-decoration: underline;
  }
  
  #procedures h2 {
    color: white;
    font-size: 2.5rem;
    font-weight: 800;
    letter-spacing: 1px;
    margin-bottom: 1.5rem;
  }
  @media (max-width: 992px) {
    #procedures h2 {
      font-size: 2rem;
    }
  }
  @media (max-width: 576px) {
    #procedures h2 {
      font-size: 1.5rem;
    }
  }
  @media (max-width: 768px) {
    #procedures h2 {
      font-size: 2rem;
    }
    
    #procedures h5 {
      font-size: 1.3rem;
    }
  
    #procedures p {
      font-size: 1rem;
    }
  
 
    #procedures .procedure-card {
      padding: 1.5rem;
    }
  }
  

  @media (max-width: 576px) {
    #procedures h2 {
      font-size: 1.75rem;
    }
    
    #procedures p {
      font-size: 0.95rem;
    }
  
    
    #procedures .procedure-card {
      padding: 1.25rem;
    }
  }
  </style>
  
  @include('partials.footer')
