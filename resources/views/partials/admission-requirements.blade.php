<section id="admission-requirements"class="py-5" style="position: relative; min-height: 100vh;" >
    
    <div style="
    position: absolute;
    inset: 0;
    background: url('{{ asset('inspinia/img/landing/r.jpg') }}') no-repeat center center;
    background-size: cover;

    background-blend-mode: overlay;
    z-index: 0;
  "></div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="container-fluid px-lg-5" style="position: relative; z-index: 2; padding-top: 2rem; padding-bottom: 5rem;">
      <div class="row mb-5">
        <div class="col-12 text-center">
          <h2 class="font-weight-bold text-uppercase text-white" style="font-size: 2.0rem;">Admission Requirements Panel</h2>
          <p class="text-white fs-5" style="font-size: 1.25rem;">To complete the admission process, applicants must submit the following documents:</p>
        </div>
      </div>
  
      <div class="row justify-content-center">
        <div class="col-12 col-md-10">
          <div class="ibox rounded-4 border-0" style="background-color: transparent;">
            <div class="ibox-content p-4 p-md-5" style="background-color: rgba(0, 0, 0, 0.2); backdrop-filter: blur(10px); border-radius: 24px;">
              <ol class="ps-3 fs-5 text-white" style="font-size: 1.125rem;">
                <li class="mb-4">
                  Original school credentials, whichever is applicable:
                  <ul class="mt-2 ps-4 list-unstyled">
                    <li><i class="fa fa-check-circle text-success me-2"></i>High School Report Card</li>
                    <li><i class="fa fa-check-circle text-success me-2"></i>Form 137-A</li>
                    <li><i class="fa fa-check-circle text-success me-2"></i>PEPT Certificate</li>
                    <li><i class="fa fa-check-circle text-success me-2"></i>Transcript of Records</li>
                  </ul>
                </li>
  
                <li class="mb-3">Certificate of employment with job description from present and past employers</li>
                <li class="mb-3">NBI/Barangay Clearance</li>
                <li class="mb-3">Recommendation letter from immediate supervisor</li>
                <li class="mb-3">Interview results</li>
                <li class="mb-3">Personality and work aptitude test results</li>
                <li class="mb-3">Certificate of Evaluation Results given by the panel of assessors</li>
  
                <li class="mb-4">
                  Proficiency certificate from any of the following:
                  <ul class="mt-2 ps-4 list-unstyled">
                    <li><i class="fa fa-check-circle text-success me-2"></i>Government Regulatory Board</li>
                    <li><i class="fa fa-check-circle text-success me-2"></i>Licensed Practitioner in the field</li>
                    <li><i class="fa fa-check-circle text-success me-2"></i>Business Registration</li>
                  </ul>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <style>
    #admission-requirements * {
      color: white !important;
    }
  
    #admission-requirements i.fa-check-circle {
      color: #28a745 !important;
    }
  
    .navy-line {
      width: 100px;
      height: 4px;
      background-color: #1ab394;
      margin: 0 auto 1rem auto;
      border-radius: 3px;
    }
  

    @media (min-width: 992px) {
      #admission-requirements h2 {
        font-size: 2.5rem; 
      }
  
      #admission-requirements p.fs-5 {
        font-size: 1.25rem; 
      }
  
      #admission-requirements ol.fs-5 {
        font-size: 1.125rem; 
      }
  
      #admission-requirements .ibox-content {
        padding: 2rem 3rem; 
      }
    }
  

    @media (max-width: 992px) {
      #admission-requirements h2 {
        font-size: 2rem;
      }
  
      #admission-requirements p.fs-5,
      #admission-requirements ol.fs-5 {
        font-size: 1rem;
      }
  
      #admission-requirements .ibox-content {
        padding: 2rem;
      }
    }
  
    @media (max-width: 576px) {
      #admission-requirements h2 {
        font-size: 1.5rem;
      }
  
      #admission-requirements p.fs-5,
      #admission-requirements ol.fs-5 {
        font-size: 0.95rem;
      }
  
      #admission-requirements .ibox-content {
        padding: 1.5rem;
      }
    }
  </style>
  
  @include('partials.footer')
  