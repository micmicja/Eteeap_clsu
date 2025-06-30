@extends('layouts.admin')

@section('content')


<a href="{{ route('admin.applications') }}" class="btn btn-secondary btn-sm">
    Back
</a>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="container">

                <div class="bg-white p-4 shadow rounded d-flex justify-content-between align-items-center">
                 
              
    
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
                                
                                </div>
                           
                            <h2 class="text-center">INSTRUCTION</h2>
        
                    <h4>Please type or clearly print your answers to all questions.  Provide complete and detailed information required by the questions.  All the declarations that you make are under oath.  Discovery of any false claim in this application form will disqualify you from participating in the program.</h4>
          
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
                                <label for="contact_number">2. Contact Number</label>
                                <input type="text" name="contact_number" class="form-control" value="{{  $application->contact_number }}"readonly>
                            </div>

                            <div class="form-group">
                                <label>2. Address</label>
                                <input type="text" class="form-control" readonly
                                    value="{{ trim(
                                        ($application->house_no ?? '') . ' ' .
                                        ($application->street ?? '') . ' ' .
                                        ($application->barangay ?? '') . ' ' .
                                        ($application->city ?? '') . ' ' .
                                        ($application->province ?? '') . ' ' .
                                        ($application->zipcode ?? '') . ' ' .
                                        ($application->country ?? '')
                                    ) }}">
                            </div>
                            <div class="form-group">
                                <label>3. Birthdate</label>
                                <input type="text" class="form-control" value="{{ $application->birthdate }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>4. Birthplace</label>
                                <input type="text" class="form-control" value="{{ $application->birthplace }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>5. Civil Status</label>
                                <input type="text" class="form-control" value="{{ $application->civil_status }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>6. Sex</label>
                                <input type="text" class="form-control" value="{{ $application->sex }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>7. Language and Dialect Spoken:</label>
                                <input type="text" class="form-control" value="{{ $application->language }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Degree Program Field:</label>
                                <input type="text" class="form-control" value="{{ $application->displayField('degree_program_field') }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>First Priority:</label>
                                <input type="text" class="form-control" value="{{ $application->displayField('first_priority') }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Second Priority:</label>
                                <input type="text" class="form-control" value="{{ $application->displayField('second_priority') }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Third Priority:</label>
                                <input type="text" class="form-control" value="{{ $application->displayField('third_priority') }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>10. Statement of your goals, objectives, or purposes in applying for the degree.</label>
                                <input type="text" class="form-control" value="{{ $application->goals_objectives }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>11. Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.</label>
                                <input type="text" class="form-control" value="{{ $application->learning_activities }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>12. For overseas applicants, describe how much you plan to obtain accreditation/equivalency. (e.g. when you plan to come to the Philippines)</label>
                                <input type="text" class="form-control" value="{{ $application->overseas_applicants }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>13. How soon do you need to complete equivalency accreditation</label>
                                <input type="text" class="form-control" value="{{ $application->equivalency_accreditation }}" readonly>
                            </div>


                            
                            
                            <h3>II Education</h3>
            
                            <h5>This section will require you to provide information on your past formal, non-formal and informal learning experiences.</h5>

                            <table class="table table-bordered">
                                <h3>1. Formal Education</h3>
                                <thead class="thead-light">
                                    <tr>
                                        <th>Course/Degree Program</th>
                                        <th>Name of School/Address</th>
                                        <th>Inclusive Dates of Attendance</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="educationTable">
                                    <tr>
                                        <td><input type="text" name="degree_program" class="form-control" value="{{ $application->displayField('degree_program') }}" readonly></td>
                                        <td><input type="text" name="school_address" class="form-control" value="{{ $application->displayField('school_address') }}" readonly></td>
                                        <td> <input type="text" name="inclusive_dates" class="form-control" value="{{ $application->displayField('inclusive_dates') }}" readonly></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="degree_program_field" class="form-control" value="{{ $application->degree_program_field }}" readonly></td>
                                        <td><input type="text" name="school_address" class="form-control" value="{{ $application->displayField('school_address') }}" readonly></td>
                                        <td> <input type="text" name="inclusive_dates" class="form-control" value="{{ $application->displayField('inclusive_dates') }}" readonly></td>
                                      
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="degree_program_field" class="form-control" value="{{ $application->degree_program_field }}" readonly></td>
                                        <td><input type="text" name="school_address" class="form-control" value="{{ $application->displayField('school_address') }}" readonly></td>
                                        <td> <input type="text" name="inclusive_dates" class="form-control" value="{{ $application->displayField('inclusive_dates') }}" readonly></td>
                                      
                                    </tr>
                                  
                                    
                                </tbody>
                            </table>

                            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>

                            <table class="table table-bordered">
                                <h3>2. Non-Formal Education</h3>
                                <h5>Non-formal education refers to structured and short-term training programs conducted for particular purpose such as skills development, values orientation and the like.</h5>
                                <thead class="thead-light">
                                    <tr>
                                        <th>Title of Training Program</th>
                                        <th>Title of Certificate Obtained</th>
                                        <th>Inclusive Dates of Attendance</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="educationTable">
                                    <tr>
                                        <td><input type="text" name="training_program" class="form-control" value="{{ $application->displayField('training_program') }}" readonly></td>
                                        <td><input type="text" name="certificate_obtained" class="form-control" value="{{ $application->displayField('certificate_obtained') }}" readonly></td>
                                        <td>  <input type="text" name="dates_attendance" class="form-control" value="{{ $application->displayField('dates_attendance') }}" readonly></td>
                                     
                                    </tr>
                                    
                                  
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
                                <tbody id="educationTable">
                                    <tr>
                                        <td><input type="text" name="certification_examination" class="form-control" value="{{ $application->displayField('certification_examination') }}" readonly></td>
                                        <td><input type="text" name="certifying_agency" class="form-control" value="{{ $application->displayField('certifying_agency') }}" readonly></td>
                                        <td><input type="date" name="date_certified" class="form-control" value="{{ $application->displayField('date_certified') }}" readonly></td>
                                        <td><input type="text" name="rating" class="form-control" value="{{ $application->displayField('rating') }}" readonly></td>
                                    </tr>
  
                                </tbody>
                            </table>
                            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>
                            <h3>III. PAID WORK AND OTHER EXPERIENCES</h3>

                            <div class="form-group">
                                <label>1. Position/Designation</label>
                                <input type="text" class="form-control" value="{{ $application->position_designation }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>2. Inclusive Dates of Employment (Attach service record if any) From:</label>
                                <input type="text" class="form-control" value="{{ $application->dates_of_employment }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>3. Name and Address of Company</label>
                                <input type="text" class="form-control" value="{{ $application->address_of_company }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>4. Terms/Status of Employment</label>
                                <input type="text" class="form-control" value="{{ $application->status_of_employment }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>5. Name and Designation of Immediate Supervisor</label>
                                <input type="text" class="form-control" value="{{ $application->designation_of_immediate }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>6. Reason(s) for moving on to the next job</label>
                                <input type="text" class="form-control" value="{{ $application->reasons_for_moving }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>7. Describe actual functions and responsibilities in position occupied.</label>
                                <input type="text" class="form-control" value="{{ $application->responsibilities_in_position }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>8. In case of self-employment, name three (3) reference persons:</label>
                                <input type="text" class="form-control" value="{{ $application->case_of_self_employment }}" readonly>
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
                                <tbody id="educationTable">
                                    <tr>
                                        <td><input type="text" name="awards_conferred" class="form-control" value="{{ $application->displayField('awards_conferred') }}" readonly></td>
                                        <td><input type="text" name="conferring_organizations" class="form-control" value="{{ $application->displayField('conferring_organizations') }}" readonly></td>
                                        <td><input type="date" name="date_awarded" class="form-control" value="{{ $application->displayField('date_awarded') }}" readonly></td>
                                       
                                    </tr>
                                    
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
                                <tbody id="educationTable">
                                    <tr>
                                        <td><input type="text" name="community_awards_conferred" class="form-control" value="{{ $application->displayField('community_awards_conferred') }}" readonly></td>
                                        <td><input type="text" name="community_conferring_organizations" class="form-control" value="{{ $application->displayField('community_conferring_organizations') }}" readonly></td>
                                        <td><input type="date" name="community_date_awarded" class="form-control" value="{{ $application->displayField('community_date_awarded') }}" readonly></td>
                                       
                                    </tr>
                                
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
                                <tbody id="educationTable">
                                    <tr>
                                        <td><input type="text" name="work_awards_conferred" class="form-control" value="{{ $application->displayField('work_awards_conferred') }}" readonly></td>
                                        <td><input type="text" name="work_community_conferring_organizations" class="form-control" value="{{ $application->displayField('work_community_conferring_organizations') }}" readonly></td>
                                        <td><input type="date" name="work_community_date_awarded" class="form-control" value="{{ $application->displayField('work_community_date_awarded') }}" readonly></td>
                                       
                                    </tr>
                           
                                </tbody>
                            </table>

                            <h3>V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</h3>
                            <h4> In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are inventions, published and unpublished literary fiction and nonfiction writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain field of interest. Include also participation in competitions and prizes obtained.</h4>


                            
                            <div class="form-group">
                                <label>1. Description:</label>
                                <input type="text" class="form-control" value="{{ $application->accomplishment_description }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>2. Date Accomplished:</label>
                                <input type="text" class="form-control" value="{{ $application->date_accomplished }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>3. Name and Address of Publishing Agency (if written, published work), or an Association/institution which can attest to the quality of the work:</label>
                                <input type="text" class="form-control" value="{{ $application->address_of_publishing }}" readonly>
                            </div>

                        <h4>Note: Use additional sheet if necessary, following the same format.</h4>
                        
                                <h3>VI. LIFELONG LEARNING EXPERIENCE</h3>
                                <h4>In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</h4>


                                <div class="form-group">
                                    <h3>1. Hobbies/Leisure Activities</h3>
                                    <label>Leisure activities which involve rating skills for competition and other purposes (e.g. “belt concept in Taekwondo) may also indicate your level for ease in evaluation. On the other hand, watching Negosiyete on a regular basis can be considered a learning opportunity.</label>
                                    <input type="text" class="form-control" value="{{ $application->leisure_activities }}" readonly>
                                </div>
                                <div class="form-group">
                                    <h3>2. Special Skills  </h3>
                                    <label>Note down those special skills which you think must be related to the field of study you want to pursue.</label>
                                    <input type="text" class="form-control" value="{{ $application->special_skills }}" readonly>
                                </div>
                                <div class="form-group">
                                    <h3>3. Work-Related Activities</h3>
                                    <label>Some work-related activities are occasions for you to learn something new. For example, being assigned to projects beyond your usual job description where you learned new skills and knowledge. Please do not include formal training programs you already cited. However, you may include here experiences which can be classified as on-the-job training or apprenticeship.</label>
                                    <input type="text" class="form-control" value="{{ $application->work_related_activities }}" readonly>
                                </div>
                                <div class="form-group">
                                    <h3>4. Volunteer Activities</h3>
                                    <label>List only volunteer activities that demonstrate learning opportunities, and are related to the course you are applying for credit. (e.g. counseling programs, sports coaching, project organizing or coordination, organizational leadership, and the like).</label>
                                    <input type="text" class="form-control" value="{{ $application->volunteer_activities }}" readonly>
                                </div>
                                <div class="form-group">
                                    <h3>5. Travels: Cite places visited and purpose of travel</h3>
                                    <label>Include write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experiences was obtained from these travels and how it helped you become a better person.</label>
                                    <input type="text" class="form-control" value="{{ $application->travels_cite_places }}" readonly>
                                </div>


                                <p>
                                    I declare under oath that the foregoing claims and information I have disclosed are true and correct.
                                    Done in <input type="text" name="declaration_place" class="form-control d-inline w-auto" value="{{ $application->declaration_place }}" readonly>
                                    on this <input type="text" name="declaration_day" class="form-control d-inline w-auto" value="{{ $application->declaration_day }}" readonly>
                                    day of <input type="text" name="declaration_month_year" class="form-control d-inline w-auto" value="{{ $application->declaration_month_year }}" readonly>.
                                </p>


                                <h4 class="mt-4">Signed:</h4>

                                <div class="form-group">
                                   
                                    <label>Printed Name and Signature of Applicant</label>
                                    <input type="text" class="form-control" value="{{ $application->printed_name }}" readonly>
                                </div>

                                <div class="col-md-6 text-center">
                                    <h5>Signature</h5>
                                    @if ($application->signature_image)
                                        <img src="{{ asset('storage/signature_images/' . $application->signature_image) }}" 
                                             alt="Signature Image" 
                                             class="img-fluid img-thumbnail" 
                                             style="max-width: 200px; cursor: pointer;" 
                                             onclick="openFullSize('{{ asset('storage/signature_images/' . $application->signature_image) }}')">
                                    @else
                                        <p>No Signature uploaded.</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                   
                                    <label>Community Tax Certificate</label>
                                    <input type="text" class="form-control" value="{{ $application->community_tax_certificate }}" readonly>
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
    <h2 class="text-center">Uploaded Requirements</h2>
    <h4 class="text-center">"Click the image to enlarge it in a pop-up window."</h4>
</div>

@if (isset($requirement) && $requirement)
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
                @if (!empty($requirement->$key))
                    @php
                        $filePath = 'storage/requirements/' . $requirement->$key;
                        $fileExists = file_exists(public_path($filePath));
                    @endphp
                    @if ($fileExists)
                        <a href="{{ asset($filePath) }}" target="_blank">
                            <img src="{{ asset($filePath) }}"
                                 class="img-fluid img-thumbnail"
                                 style="cursor: pointer; max-width: 100%; height: auto;">
                        </a>
                        <p class="text-muted mt-1">{{ $requirement->$key }}</p>
                    @else
                        <p class="text-danger">File not found: {{ $requirement->$key }}</p>
                    @endif
                @else
                    <p class="text-danger">No file uploaded.</p>
                @endif
            </div>
        @endforeach
    </div>
@else
    <p class="text-danger text-center"><strong>No uploaded requirements yet.</strong></p>
@endif

                          
                        
                            
                        </form>
                    @else
                        <p class="text-danger">No application found.</p>
                    @endif
                    
                </div>
               
            </div>
        </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary" onclick="printApplication()">Print Application</button>
        </div>
    </div>
</div>

<script>
    function printApplication() {
        
        var printContent = document.getElementById("applicationDetails").innerHTML;
        var originalContent = document.body.innerHTML;
  
        
        document.body.innerHTML = printContent;

        window.print();

        document.body.innerHTML = originalContent;
    }
</script>

@endsection
