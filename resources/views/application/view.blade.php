@extends('layouts.app')

@section('content')


    
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="container">

                <div class="bg-white p-4 shadow rounded d-flex justify-content-between align-items-center">
                    <div>
                        <h2>My Applications Form Details</h2>
                        <h5>Note: You can print your application form   </h5>
                        <a href="{{ route('user.index') }}" class="btn btn-primary mb-3">Back </a>
                    </div>
                    
              
    
                </div>
       
                <body data-page="view">
           
                
                        <div id="applicationDetails">
                <div class="ibox-content">
                    @if($application)
     
                        <form>
                            <div style="display: flex; align-items: center; justify-content: center;">
                          
                                <div style="flex: 0 0 auto; margin-right: 20px;">
                                    <img src="{{ asset('images/cl.png') }}" alt="Logo" width="100">
                                </div>
                            
                            
                                <div style="text-align: center; line-height: 1.2;">
                                    <h5 style="margin: 0;">Republic of the Philippines</h5>
                                    <h4 style="margin: 0;">CENTRAL LUZON STATE UNIVERSITY</h4>
                                    <h5 style="margin: 0;">Science City of Muñoz, Nueva Ecija</h5>
                                </div>

                                <div style="flex: 0 0 auto; margin-right: 50px;">
                                    <img src="{{ asset('images/eteeap.png') }}" alt="Logo" width="150">
                                </div>
                            </div>
                            
                            <h4 class="text-center"> EXPANDED TERTIARY EDUCATION EQUIVALENCY AND ACCREDITATION PROGRAM (ETEEAP)</h4>
                           

                            <h1 class="text-center">APPLICATION FORM</h1>
                          
                            <div class="row mt-3">
                                <div class="col-md-3 ml-auto text-right pr-3 print-photo-box">
                                    <div style="width: 200px; height: 200px; border: 1px solid #000; display: flex; align-items: center; justify-content: center;">
                                        @if ($application->profile_image)
                                            <img src="{{ asset($application->profile_image) }}" alt="Profile Image" style="max-width: 100%; max-height: 100%;">
                                        @else
                                            <span style="font-size: 13px; color: gray;">2x2 Photo</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            <h2 class="text-center">INSTRUCTION</h2>
        
                    <h4>Please type or clearly print your answers to all questions.  Provide complete and detailed information required by the questions.  All the declarations that you make are under oath.  Discovery of any false claim in this application form will disqualify you from participating in the program.</h4>
          
                    <form method="POST" action="{{ route('application.update', $application->id) }}">
                        @csrf
                        @method('PUT')

                            <h4>Personal Information</h4>
                            <div class="row mt-3">
                                <div class="col-md-2">
                                    <label>Application ID</label>
                                    <input type="text" name="id" class="form-control" value="{{ $application->id }}" readonly>
                                </div>
                            </div>
                            <div class="row">                   
                                <div class="col-md-4">
                                    <label> First Name</label>
                                   <input type="text" name="first_name" class="form-control" value="{{ $application->first_name ?? '' }}"readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" value="{{ $application->middle_name ?? '' }}"readonly>
                                  
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $application->last_name ?? '' }}"readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact_number">1. Contact Number</label>
                                <input type="text" name="contact_number" class="form-control" value="{{  $application->contact_number }}"readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>2. Address</label>
                                <input type="text"  name="address" class="form-control"  value="{{  $application->address }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>3. Birthdate</label>
                                <input type="text"  name="birthdate"  class="form-control"  value="{{  $application->birthdate }}"readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>4. Birthplace</label>
                                <input type="text" name="birthplace"  class="form-control"  value="{{ $application->birthplace}}"readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>5. Civil Status</label>
                                <input type="text"  name="civil_status" class="form-control" value="{{ $application->civil_status }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>6. Sex</label>
                                <input type="text"  name="sex" class="form-control" value="{{ $application->sex }}" readonly>
                            </div>
                            
                            
                            <div class="form-group">
                                <label>7. Language and Dialect Spoken:</label>
                                <input type="text" name="language" class="form-control"  value="{{  $application->language}}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Degree Program Field:</label>
                                <input type="text" name="degree_program_field" class="form-control"  value="{{ $application->degree_program_field }}"readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>First Priority:</label>
                                <input type="text" name="first_priority" class="form-control"  value="{{ $application->first_priority }}"readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Second Priority:</label>
                                <input type="text" name="second_priority" class="form-control" value="{{ $application->second_priority }}"readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Third Priority:</label>
                                <input type="text" name="third_priority" class="form-control" value="{{$application->third_priority }}"readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>10. Statement of your goals, objectives, or purposes in applying for the degree.</label>
                                <textarea name="goals_objectives" class="form-control auto-resize" rows="1" readonly>{{  $application->goals_objectives }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>11. Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.</label>
                                <textarea name="learning_activities" class="form-control auto-resize" rows="1" readonly>{{ $application->learning_activities }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>12. For overseas applicants, describe how much you plan to obtain accreditation/equivalency. (e.g. when you plan to come to the Philippines)</label>
                                <textarea name="overseas_applicants" class="form-control auto-resize" rows="1" readonly>{{  $application->overseas_applicants}}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>13. How soon do you need to complete equivalency accreditation</label>
                                <input type="text" name="equivalency_accreditation" class="form-control" value="{{ $application->equivalency_accreditation }}" readonly>
                            </div>
                            
                            
                            <h3>II Education</h3>
            
                            <h5>This section will require you to provide information on your past formal, non-formal and informal learning experiences.</h5>
                       
                            <h3>1. Formal Education</h3>
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Degree Program</th>
                                        <th>School Address</th>
                                        <th>Inclusive Dates</th>
                                    
                                    </tr>
                                    <tbody>
                                    
                                        @foreach ($degree_programs as $index => $program)
                                        <tr>
                                            <td>
                                                <textarea name="program" class="form-control auto-resize" readonly>{{ $program }}</textarea>
                                            </td>
                                            <td>
                                                <textarea name="school_addresses" class="form-control auto-resize" readonly>{{ $school_addresses[$index] ?? '' }}</textarea>
                                            </td>
                                            <td>
                                                <textarea name="inclusive_dates" class="form-control auto-resize" readonly>{{ $inclusive_dates[$index] ?? '' }}</textarea>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>

                            <table class="table table-bordered">
                                <h3>2. Non-Formal Education</h3>
                                <h5>Non-formal education refers to structured and short-term training programs conducted for a particular purpose such as skills development, values orientation, and the like.</h5>
                                
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Title of Training Program</th>
                                            <th>Title of Certificate Obtained</th>
                                            <th>Inclusive Dates of Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($training_programs as $index => $program)
                                            <tr>
                                                <td>
                                                    <textarea name="program" class="form-control auto-resize" readonly>{{ $program }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea name="certificate_obtained" class="form-control auto-resize" readonly>{{ $certificate_obtained[$index] ?? '' }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea name="dates_attendance" class="form-control auto-resize" readonly>{{ $dates_attendance[$index] ?? '' }}</textarea>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                               
                                
                                
                            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>
                            <table class="table table-bordered">
                                <h3>3. Other Certification Examination</h3>
                                <h5>Please give detailed information on certification examinations taken for vocational and other skills.</h5>
                                <thead class="thead-light">
                                    <tr>
                                        <th>Title of Certification Examination</th>
                                        <th>Name/Address of Certifying Agency</th>
                                        <th>Date Certified</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                            @foreach ($date_certified as $index => $program)
                            <tr>
                                <td>
                                    <textarea name="program" class="form-control auto-resize" readonly>{{ $program }}</textarea>
                                </td>
                                <td>
                                    <textarea name="certification_examination" class="form-control auto-resize" readonly>{{ $certification_examination[$index] ?? '' }}</textarea>
                                </td>
                                <td>
                                    <textarea name="certifying_agency" class="form-control auto-resize" readonly>{{ $certifying_agency[$index] ?? '' }}</textarea>
                                    <td>
                                        <textarea name="rating" class="form-control auto-resize" readonly>{{ $rating[$index] ?? '' }}</textarea>
                                    </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
               
                            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>
                            <h3>III. PAID WORK AND OTHER EXPERIENCES</h3>

                            <div class="form-group">
                                <label>1. Position/Designation</label>
                                <textarea name="position_designation" class="form-control auto-resize" rows="1" readonly>{{ $application->position_designation }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>2. Inclusive Dates of Employment (Attach service record if any) From:</label>
                                <textarea name="dates_of_employment" class="form-control auto-resize" rows="1" readonly>{{ $application->dates_of_employment }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>3. Name and Address of Company</label>
                                <textarea name="address_of_company" class="form-control auto-resize" rows="1" readonly>{{ $application->address_of_company }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>4. Terms/Status of Employment</label>
                                <textarea name="status_of_employment" class="form-control auto-resize" rows="1" readonly>{{ $application->status_of_employment }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>5. Name and Designation of Immediate Supervisor</label>
                                <textarea name="designation_of_immediate" class="form-control auto-resize" rows="1" readonly>{{ $application->designation_of_immediate }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>6. Reason(s) for moving on to the next job</label>
                                <textarea name="reasons_for_moving" class="form-control auto-resize" rows="1" readonly>{{ $application->reasons_for_moving }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>7. Describe actual functions and responsibilities in position occupied.</label>
                                <textarea name="responsibilities_in_position" class="form-control auto-resize" rows="1" readonly>{{ $application->responsibilities_in_position }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>8. In case of self-employment, name three (3) reference persons:</label>
                                <textarea name="case_of_self_employment" class="form-control auto-resize" rows="1" readonly>{{ $application->case_of_self_employment }}</textarea>
                            </div>

                            <h4>Note: Use another sheet if necessary, following the above format.</h4>
                            <h3>IV. HONORS, AWARDS, AND CITATIONS RECEIVED</h3>
                            <h4>In this section, please describe all the awards you have received from schools, community and civic organizations, as well as citations for work excellence, outstanding accomplishments, community service, etc.            </h4>
                           
                            <h3>1. Academic Award</h3>
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Awards Conferred</th>
                                        <th>Name and Address of Conferring Organizations</th>
                                        <th>Date Awarded</th>
                                    </tr>
                                </thead>
                                <tbody id="academicTable">
                                                   
                            @foreach ($awards_conferred as $index => $program)
                            <tr>
                                <td>
                                    <textarea name="program" class="form-control auto-resize" readonly>{{ $program }}</textarea>
                                </td>
                                <td>
                                    <textarea name="conferring_organizations" class="form-control auto-resize" readonly>{{ $conferring_organizations[$index] ?? '' }}</textarea>
                                </td>
                                <td>
                                    <textarea name="date_awarded" class="form-control auto-resize" readonly>{{ $date_awarded[$index] ?? '' }}</textarea>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                            <h3>2. Community and Civic Organization Award/Citation</h3>
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Awards Conferred</th>
                                        <th>Name and Address of Conferring Organizations</th>
                                        <th>Date Awarded</th>
                                    </tr>
                                </thead>
                                <tbody id="communityTable"> 
              
                            @foreach ($community_awards_conferred as $index => $program)
                            <tr>
                                <td>
                                    <textarea name="program" class="form-control auto-resize" readonly>{{ $program }}</textarea>
                                </td>
                                <td>
                                    <textarea name="community_conferring_organizations" class="form-control auto-resize" readonly>{{ $community_conferring_organizations[$index] ?? '' }}</textarea>
                                </td>
                                <td>
                                    <textarea name="community_date_awarded" class="form-control auto-resize" readonly>{{ $community_date_awarded[$index] ?? '' }}</textarea>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                            <h3>3. Work Related Award/Citation</h3>
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Awards Conferred</th>
                                        <th>Name and Address of Conferring Organizations</th>
                                        <th>Date Awarded</th>
                                    </tr>
                                </thead>
                                <tbody id="workTable">      
                            
                            @foreach ($work_awards_conferred as $index => $program)
                            <tr>
                                <td>
                                    <textarea name="program" class="form-control auto-resize" readonly>{{ $program }}</textarea>
                                </td>
                                <td>
                                    <textarea name="work_community_conferring_organizations" class="form-control auto-resize" readonly>{{ $work_community_conferring_organizations[$index] ?? '' }}</textarea>
                                </td>
                                <td>
                                    <textarea name="work_community_date_awarded" class="form-control auto-resize" readonly>{{ $work_community_date_awarded[$index] ?? '' }}</textarea>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                         
                            <h3>V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</h3>
                            <h4> In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are inventions, published and unpublished literary fiction and nonfiction writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain field of interest. Include also participation in competitions and prizes obtained.</h4>


                            
                            <div class="form-group">
                                <label>1. Description:</label>
                                <textarea name="accomplishment_description" class="form-control auto-resize" rows="1" readonly>{{ $application->accomplishment_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>2. Date Accomplished:</label>
                                <textarea name="date_accomplished" class="form-control auto-resize" rows="1" readonly>{{ $application->date_accomplished }}</textarea>
                            </div>
                        
                            <div class="form-group">
                                <label>3. Name and Address of Publishing Agency (if written, published work), or an Association/institution which can attest to the quality of the work:</label>
                                <textarea name="address_of_publishing" class="form-control auto-resize" rows="1" readonly>{{ $application->address_of_publishing }}</textarea>
                            </div>

                           

                        <h4>Note: Use additional sheet if necessary, following the same format.</h4>
                        
                                <h3>VI. LIFELONG LEARNING EXPERIENCE</h3>
                                <h4>In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</h4>


                                <div class="form-group">
                                    <label>1. Hobbies/Leisure Activities</label>
                                    <textarea name="leisure_activities" class="form-control auto-resize" rows="1" readonly>{{ $application->leisure_activities }}</textarea>
                                </div>
                             
                                <div class="form-group">
                                    <label>2. Special Skills</label>
                                    <textarea name="special_skills" class="form-control auto-resize" rows="1" readonly>{{ $application->special_skills }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>3. Work-Related Activities</label>
                                    <textarea name="work_related_activities" class="form-control auto-resize" rows="1" readonly>{{ $application->work_related_activities }}</textarea>
                                </div>
                             
                                <div class="form-group">
                                    <label>4. Volunteer Activities</label>
                                    <textarea name="volunteer_activities" class="form-control auto-resize" rows="1" readonly>{{ $application->volunteer_activities }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>5. Travels: Cite places visited and purpose of travel</label>
                                    <label>Include write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experiences was obtained from these travels and how it helped you become a better person.</label>
                                    <textarea name="travels_cite_places" class="form-control auto-resize" rows="1" readonly>{{ $application->travels_cite_places }}</textarea>
                                </div>
                                


                                <p>
                                    I declare under oath that the foregoing claims and information I have disclosed are true and correct.
                                    Done in <input type="text" name="declaration_place" class="form-control d-inline w-auto" value="{{ $application->declaration_place }}" readonly>
                                    on this <input type="text" name="declaration_day" class="form-control d-inline w-auto" value="{{ $application->declaration_day }}" readonly>
                                    day of <input type="text" name="declaration_month_year" class="form-control d-inline w-auto" value="{{ $application->declaration_month_year }}" readonly>.
                                </p>


                             

                                <div class="form-group text-center">
                                    <label>Printed Name and Signature of Applicant</label>
                                    <div class="signature-line mx-auto">
                                        {{ $application->printed_name }}
                                    </div>
                                </div>
                                
                                <style>
                                    .signature-line {
                                        border-bottom: 1px solid #666464;
                                        width: 50%; 
                                        margin: 5px auto 0 auto; 
                                        padding-bottom: 4px;
                                        text-align: center;
                                        font-size: 16px;
                                    }
                                
                                    @media print {
                                        .signature-line {
                                            font-style: italic;
                                        }
                                    }
                                </style>
                                
                              
                                <div class="form-group">
                                   
                                    <label>Community Tax Certificate</label>
                                    <input type="text" name="community_tax_certificate" class="form-control" value="{{ $application->community_tax_certificate }}" readonly>
                                </div>
                                <div class="form-row d-flex">
                                    <div class="form-group col-md-6">
                                        <label for="issued_on">Issued on</label>
                                        <input type="date" name="issued_on" class="form-control" value="{{ $application->issued_on }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="issued_at">Issued at</label>
                                        <input type="text" name="issued_at" class="form-control" value="{{ $application->issued_at }}" readonly>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="d-print-none">
                                <h2 class="text-center">Your Uploaded Requirements</h2>
                                <h4 class="text-center">"Click the image to enlarge it in a pop-up window."</h4>
                            </div>
                            
                            @if ($application->original_school_credentials)
                                <img src="{{ asset('storage/' . $application->original_school_credentials) }}" alt="School Credentials">
                            @endif

                            @if ($application->certificate_of_employment)
                                <img src="{{ asset('storage/' . $application->certificate_of_employment) }}" alt="Certificate of Employment">
                            @endif


                            @if ($requirement)
                            
                                <div class="row">
                                    @foreach ([
                                        'original_school_credentials' => 'Original School Credentials',
                                        'certificate_of_employment' => 'Certificate of Employment',
                                        'nbi_barangay_clearance' => 'NBI / Barangay Clearance',
                                        'recommendation_letter' => 'Recommendation Letter',
                                        'proficiency_certificate' => 'Proficiency Certificate'
                                    ] as $key => $label)
                                        <div class="col-md-4 text-center mb-3">
                                            <p><strong>{{ $label }}</strong></p>
                                            @if($requirement->$key)
                                                <a href="{{ asset('storage/requirements/' . $requirement->$key) }}" target="_blank">
                                                    <img src="{{ asset('storage/requirements/' . $requirement->$key) }}" class="img-fluid img-thumbnail" style="cursor: pointer; max-width: 100%; height: auto;">
                                                </a>
                                            @else
                                                <p class="text-danger">No file uploaded.</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-danger"><strong>No uploaded requirements yet.</strong></p>
                            @endif
                            
                            
                        </form>
                    @else
                        <p class="text-danger">No application found.</p>
                    @endif
                    
                </div>
               
            </div>
            
        </div>
    
    </div>
</div>

<div class="text-right">
    <button class="btn btn-primary" onclick="printApplication()">Print Application</button>
</div>
</body>
<style>
   
    .table td {
        white-space: normal !important; 
        word-wrap: break-word;
        vertical-align: top;
    }

    
    .auto-resize {
        width: 100%;
        min-height: 38px; 
        height: auto;
        border: none;
        background: transparent;
        resize: none; 
        overflow: hidden;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    function autoResize(element) {
        element.style.height = "auto"; 
        element.style.height = (element.scrollHeight) + "px"; 
    }


    document.querySelectorAll(".auto-resize").forEach(function (element) {
        autoResize(element); 
        element.addEventListener("input", function () {
            autoResize(element);
        });
    });
});
</script>

<script>
    function printApplication() {
        var printContent = document.getElementById("applicationDetails").innerHTML;
        var originalContent = document.body.innerHTML;

       
       var printStyles = `
            <style>
                @media print {
                    body {
                        margin: 0;
                        padding: 0;
                    }
                    
                    /* Ensure image stays aligned to the right */
                    .print-photo-box {
                        display: flex;
                        justify-content: flex-end;
                        margin-right: 30px;
                    }
                    
                    .print-photo-box img {
                        max-width: 100%;
                        max-height: 200px; /* You can adjust this size */
                    }

                    /* Ensure that other elements are not affected */
                    .application-details {
                        display: block;
                        padding: 10px;
                    }
                }
            </style>
        `

  
        document.body.innerHTML = printStyles + printContent;

       
        window.print();

        document.body.innerHTML = originalContent;
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".auto-resize").forEach(textarea => {
            textarea.style.height = "auto";
            textarea.style.height = (textarea.scrollHeight) + "px";
        });
    });
</script>



@endsection
