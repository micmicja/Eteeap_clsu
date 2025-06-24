@extends('layouts.app')

@section('content')
<div class="form-background">

<div class="wrapper wrapper-content animated fadeInRight"style="z-index: 2; padding-top: 8rem; padding-bottom: 5rem;">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<body data-page="create" data-user-id="{{ auth()->id() }}">

    <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
            <div class="container" style="background-color: #4eab18; padding: 8px; border-radius: 10px;">

                <div class="bg-white p-4 shadow rounded">
         
            <form>
                <div style="display: flex; align-items: center; justify-content: center;">
                    
                    <div style="flex: 0 0 auto; margin-right: 50px;">
                        <img src="{{ asset('images/cl.png') }}" alt="Logo" width="100">
                    </div>
                
                    
                    <div style="text-align: center; line-height: 1.2;">
                        <h5 style="margin: 0;">Republic of the Philippines</h5>
                        <h4 style="margin: 0;">CENTRAL LUZON STATE UNIVERSITY</h4>
                        <h5 style="margin: 0;">Science City of Muñoz, Nueva Ecija</h5>
                    </div>
                
                    
                    <div style="flex: 0 0 auto; margin-left: 50px;">
                        <img src="{{ asset('images/eteeap.png') }}" alt="Logo" width="150">
                    </div>
                </div>
               
               
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-3 text-center print-photo-box">
                        
                        <div id="preview-box" style="width: 200px; height: 200px; border: 1px solid #000; display: flex; align-items: center; justify-content: center; overflow: hidden; margin: auto;">
                            <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; max-height: 100%;" />
                        
                        </div>
                        <input type="file" name="profile_image" class="form-control-file mt-2" accept="image/*" required onchange="previewImage(event)">
                        <div id="filename_profile_image" style="margin-top: 5px; display: none;"></div> 
                        <button type="button" class="btn btn-danger btn-sm clearBtn mt-2" data-field="profile_image" style="display:none;">Clear</button>
                    </div>
                </div>
                  @php
                $fields = [
                    'original_school_credentials' => 'Original School Credentials',
                    'certificate_of_employment' => 'Certificate of Employment',
                    'nbi_barangay_clearance' => 'NBI/Barangay Clearance',
                    'recommendation_letter' => 'Recommendation Letter',
                    'proficiency_certificate' => 'Proficiency Certificate'
                ];
            @endphp
            
            <form id="uploadForm" method="POST" action="{{ route('requirement.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @foreach($fields as $name => $label)
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm border rounded-3">
                                <div class="card-body">
                                    <label for="{{ $name }}" class="form-label"><strong>{{ $label }}</strong></label>
                                    <input 
                                        type="file" 
                                        name="{{ $name }}" 
                                        id="{{ $name }}" 
                                        data-field="{{ $name }}"
                                        class="form-control fileInput"
                                        accept=".jpg,.jpeg,.png"
                                    >
            
                                    <div class="mt-3 text-center">
                                        <img 
                                            id="preview_{{ $name }}" 
                                            class="previewImage img-fluid rounded clickable-image" 
                                            src="" 
                                            style="display:none; max-height: 160px; cursor: pointer;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#imageModal"
                                        >
                                        <div id="filename_{{ $name }}" class="text-muted mt-2" style="display:none;"></div>
                                        <button type="button" class="btn btn-outline-danger btn-sm mt-2 clearBtn" data-field="{{ $name }}" style="display:none;">Clear</button>
                                    </div>
            
                                    @error($name)
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
            
            <!-- Modal for image preview -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid rounded" style="max-height: 90vh;">
                  </div>    
                </div>
              </div>
            </div>
            
                
                
            <h4>Please type or clearly print your answers to all questions.  Provide complete and detailed information required by the questions.  All the declarations that you make are under oath.  Discovery of any false claim in this application form will disqualify you from participating in the program.</h4>
        
           
           
            <h4>I. Personal Information</h4>
              <div class="container">
                <div class="bg-white p-4 shadow rounded">
                    <button type="button" id="clear-btn" class="btn btn-danger">Reset Form</button>
            <div class="form-row d-flex">
                
                <div class="form-group col-md-4">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="contact_number">1. Contact Number</label>
                <textarea name="contact_number" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="address">2. Address</label>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <input type="text" name="house_no" class="form-control" placeholder="House No." required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="street" class="form-control" placeholder="Street/Subdivision" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="barangay" class="form-control" placeholder="Barangay" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <input type="text" name="city" class="form-control" placeholder="City/Municipality" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="province" class="form-control" placeholder="Province" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <input type="text" name="zipcode" class="form-control" placeholder="Zipcode" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="country" class="form-control" placeholder="Country" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="birthdate">3. Birthdate</label>
                <input type="date" name="birthdate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="birthplace">4. Birthplace</label>
                <input type="text" name="birthplace" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="civil_status">5. Civil Status</label>
                <select name="civil_status" class="form-control" required>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>
   
        <div class="form-group">
            <label for="sex">6. Sex</label>
            <select name="sex" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
            <div class="form-group">
                <label for="language">7. Language and Dialect Spoken:</label>
                <input type="text" name="language" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="degree_program_field">Degree Program Field</label>
                <input type="text" name="degree_program_field" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="first_priority">First Priority:</label>
                <input type="text" name="first_priority" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="second_priority">Second Priority:</label>
                <input type="text" name="second_priority" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="third_priority">Third Priority:</label>
                <input type="text" name="third_priority" class="form-control" required>
            </div>

          
            
            <div class="form-group">
                <label for="goals_objectives">10. Statement of your goals, objectives, or purposes in applying for the degree.</label>
                <textarea name="goals_objectives" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="learning_activities">11. Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.</label>
                <textarea name="learning_activities" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="overseas_applicants">12. For overseas applicants, describe how much you plan to obtain accreditation/equivalency. (e.g. when you plan to come to the Philippines.</label>
                <textarea name="overseas_applicants" class="form-control" required></textarea>
            </div>
            <h4></h4>
            <div class="form-row d-flex">
            <div class="col-sm-10">
                <label for="equivalency_accreditation">13. How soon do you need to complete equivalency accreditation</label>
                <select name="equivalency_accreditation" class="form-control" required>
                    <option value="" disabled selected>Select an option</option>
                    <option value="Less than 1 year">Less than 1 year</option>
                    <option value="1 year">1 year</option>
                    <option value="2 years">2 years</option>
                    <option value="3 years">3 years</option>
                </select>
              
            </div>
        </div>
    </div>
</div>
<h3>II Education</h3>
            
<h5>This section will require you to provide information on your past formal, non-formal and informal learning experiences.</h5>
<div class="container">
    <div class="bg-white p-4 shadow rounded">
           
            <h3>1. Formal Education</h3>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Degree Program</th>
                        <th>School Address</th>
                        <th>Inclusive Dates</th>
                        <th><button type="button" class="btn btn-success" id="addFormalRow">+</button></th>
                    </tr>
                </thead>
                <tbody id="formalEducationTable">
                    <tr>
                        <td><input type="text" name="degree_program[]" class="form-control"></td>
                        <td><input type="text" name="school_address[]" class="form-control"></td>
                        <td><input type="text" name="inclusive_dates[]" class="form-control"></td>
                        <td><button type="button" class="btn btn-danger removeRow">-</button></td>
                    </tr>
                </tbody>
            </table>
            
         
            

            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>

            <table class="table table-bordered">
                <h3>2. Non-Formal Education</h3>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Title of Training Program</th>
                            <th>Title of Certificate Obtained</th>
                            <th>Inclusive Dates of Attendance</th>
                            <th><button type="button" class="btn btn-success" id="addNonFormalRow">+</button></th>
                        </tr>
                    </thead>
                    
                    <tbody id="nonFormalEducationTable">
                        <tr>
                            <td><input type="text" name="training_program[]" class="form-control"></td>
                            <td><input type="text" name="certificate_obtained[]" class="form-control"></td>
                            <td><input type="text" name="dates_attendance[]" class="form-control"></td>
                            <td><button type="button" class="btn btn-danger removeRow">-</button></td>
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
                        <th><button type="button" class="btn btn-success" id="addCertificationRow">+</button></th>
                    </tr>
                </thead>
                <tbody id="certificationTable">
                    <tr>
                        <td><input type="text" name="certification_examination[]" class="form-control" required></td>
                        <td><input type="text" name="certifying_agency[]" class="form-control" required></td>
                        <td><input type="text" name="date_certified[]" class="form-control"></td>
                        <td><input type="text" name="rating[]" class="form-control" required></td>
                        <td><button type="button" class="btn btn-danger removeRow">-</button></td>
                    </tr>
                </tbody>
            </table>

         
                </div>
            </div>
            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>
            <h3>III. PAID WORK AND OTHER EXPERIENCES</h3>
            <div class="container">
                <div class="bg-white p-4 shadow rounded">
            <div class="form-group">
                <label for="position_designation">1. Position/Designation</label>
                <textarea name="position_designation" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="dates_of_employment">2. Inclusive Dates of Employment (Attach service record if any) From:</label>
                <textarea name="dates_of_employment" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="address_of_company">3. Name and Address of Company</label>
                <textarea name="address_of_company" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="status_of_employment">4. Terms/Status of Employment</label>
                <textarea name="status_of_employment" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="designation_of_immediate">5. Name and Designation of Immediate Supervisor</label>
                <textarea name="designation_of_immediate" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="reasons_for_moving">6. Reason(s) for moving on to the next job</label>
                <textarea name="reasons_for_moving" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="responsibilities_in_position">7. Describe actual functions and responsibilities in position occupied.</label>
                <textarea name="responsibilities_in_position" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="case_of_self_employment">8. In case of self-employment, name three (3) reference persons:</label>
                <textarea name="case_of_self_employment" class="form-control" required></textarea>
            </div>
                </div>
            </div>
            <h4>Note: Use another sheet if necessary, following the above format.</h4>
            <h3>IV. HONORS, AWARDS, AND CITATIONS RECEIVED</h3>
            <h4>In this section, please describe all the awards you have received from schools, community and civic organizations, as well as citations for work excellence, outstanding accomplishments, community service, etc.            </h4>
           
            <div class="container">
                <div class="bg-white p-4 shadow rounded">

                    <h3>1. Academic Award</h3>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Awards Conferred</th>
                                <th>Name and Address of Conferring Organizations</th>
                                <th>Date Awarded</th>
                                <th><button type="button" class="btn btn-success" id="AcademicRow">+</button></th>
                            </tr>
                        </thead>
                      
                        <tbody id="AcademicTable">
                            <tr>
                                <td><input type="text" name="awards_conferred[]" class="form-control"></td>
                                <td><input type="text" name="conferring_organizations[]" class="form-control"></td>
                                <td><input type="text" name="date_awarded[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger removeRow">-</button></td>
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
                                <th><button type="button" class="btn btn-success" id="AwardRow">+</button></th>
                            </tr>
                        </thead>
                      
                        <tbody id="AwardTable">
                            <tr>
                                <td><input type="text" name="community_awards_conferred[]" class="form-control"></td>
                                <td><input type="text" name="community_conferring_organizations[]" class="form-control"></td>
                                <td><input type="text" name="community_date_awarded[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger removeRow">-</button></td>
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
                        <th><button type="button" class="btn btn-success" id="CitationRow">+</button></th>
                       
                    </tr>
                </thead>
                <tbody id="CitationTable">
                    <tr>
                        <td><input type="text" name="work_awards_conferred[]" class="form-control"></td>
                        <td><input type="text" name="work_community_conferring_organizations[]" class="form-control"></td>
                        <td><input type="text" name="work_community_date_awarded[]" class="form-control"></td>
                        <td><button type="button" class="btn btn-danger removeRow">-</button></td>
                       
                    </tr>
           
                </tbody>
            </table>
                </div>
            </div>
           
            <h3>V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</h3>
           <h4> In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are inventions, published and unpublished literary fiction and nonfiction writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain field of interest. Include also participation in competitions and prizes obtained.</h4>
           <div class="container">
            <div class="bg-white p-4 shadow rounded">
           <div class="form-group">
           
                <label for="accomplishment_description">1. Description:</label>
                <textarea name="accomplishment_description" class="form-control" required></textarea>
       
        </div>
        <div class="form-group">
            <label for="date_accomplished">Date Accomplished</label>
            <input type="date" name="date_accomplished" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address_of_publishing">3. Name and Address of Publishing Agency (if written, published work), or an Association/institution which can attest to the quality of the work.</label>
            <textarea name="address_of_publishing" class="form-control" required></textarea>
        </div>
            </div>
            <h4>Note: Use additional sheet if necessary, following the same format.</h4>



                <h3>VI. LIFELONG LEARNING EXPERIENCE</h3>
                <h4>In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</h4>
            
                <div class="container">
                    <div class="bg-white p-4 shadow rounded">

                        
                <h3>1. Hobbies/Leisure Activities</h3>
                <div class="form-group">
                    <label for="leisure_activities">Leisure activities which involve rating skills for competition and other purposes (e.g. “belt concept in Taekwondo) may also indicate your level for ease in evaluation. On the other hand, watching Negosiyete on a regular basis can be considered a learning opportunity.             </label>
                    <textarea name="leisure_activities" class="form-control" required></textarea>
                </div>
                <h3>2. Special Skills  </h3>
                <div class="form-group">
                    <label for="special_skills">Note down those special skills which you think must be related to the field of study you want to pursue.</label>
                    <textarea name="special_skills" class="form-control" required></textarea>
                </div>
                <h3>3. Work-Related Activities</h3>
                <div class="form-group">
                    <label for="work_related_activities">Some work-related activities are occasions for you to learn something new. For example, being assigned to projects beyond your usual job description where you learned new skills and knowledge. Please do not include formal training programs you already cited. However, you may include here experiences which can be classified as on-the-job training or apprenticeship.</label>
                    <textarea name="work_related_activities" class="form-control" required></textarea>
                </div>
                <h3>4. Volunteer Activities</h3>
                <div class="form-group">
                    <label for="volunteer_activities">List only volunteer activities that demonstrate learning opportunities, and are related to the course you are applying for credit. (e.g. counseling programs, sports coaching, project organizing or coordination, organizational leadership, and the like).            </label>
                    <textarea name="volunteer_activities" class="form-control" required></textarea>
                </div>
                <h3>5. Travels: Cite places visited and purpose of travel</h3>
                <div class="form-group">
                    <label for="travels_cite_places">Include write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experiences was obtained from these travels and how it helped you become a better person.</label>
                    <textarea name="travels_cite_places" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="essay_of_degree">VI. To sum up, please write an essay on how the degree you are seeking can contribute to your personal development, your community, your workplace, society, and country.
                    </label>
                    <textarea name="essay_of_degree" class="form-control" required></textarea>
                </div>

                
            <p>
                I declare under oath that the foregoing claims and information I have disclosed are true and correct.
                Done in <input type="text" name="declaration_place" class="form-control d-inline w-auto" placeholder="Place" required>
                on this <input type="text" name="declaration_day" class="form-control d-inline w-auto" placeholder="Day (e.g., 10th)" required>
                day of <input type="text" name="declaration_month_year" class="form-control d-inline w-auto" placeholder="Month & Year (e.g., March 2024)" required>.
            </p>

            <h4 class="mt-4">Signed:</h4>

            <div class="form-group">
                <label for="printed_name">Printed Name and Signature of Applicant</label>
                <input type="text" name="printed_name" class="form-control" placeholder="Enter Full Name" required>
            </div>
          

            <div class="form-group">
                <label for="community_tax_certificate">Community Tax Certificate</label>
                <input type="text" name="community_tax_certificate" class="form-control" required>
            </div>
            <div class="form-row d-flex">
                <div class="form-group col-md-6">
                    <label for="issued_on">Issued on</label>
                    <input type="date" name="issued_on" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="issued_at">Issued at</label>
                    <input type="text" name="issued_at" class="form-control" placeholder="Enter Location" required>
                </div>


          
              
            
                
                
                    
                
                

<!-- ✅ JavaScript Section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Zoom Preview Modal -->
<div id="imageModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.8); justify-content: center; align-items: center; z-index: 9999;">
    <img id="modalImage" src="" style="max-width: 90%; max-height: 90%; border: 5px solid white; box-shadow: 0 0 15px black;">
</div>

                
              
                    
                   
                    

 
        
    </div>
</div>
</div>
                  
<div class="d-flex justify-content-between mt-4">
    <x-primary-button class="ms-3">
        <a href="{{ url('/') }}">
            {{ __('Cancel') }}
        </a>
    </x-primary-button>
    
   
    <button type="submit" class="btn btn-primary">Submit Application</button>
</form>
</div>
</body>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  //alert for maximum submit
    @if (session('submission_limit_reached'))
        Swal.fire({
            title: 'Submission Limit Reached',
            text: 'You have reached the maximum number of submissions (2).',
            icon: 'error',
            confirmButtonText: 'Okay'
        });
    @elseif (session('submission_success'))
        Swal.fire({
            title: 'Success!',
            text: 'Your submission was successful!',
            icon: 'success',
            confirmButtonText: 'Okay'
        });
    @endif
</script>


<script>
    $(document).ready(function () {
        var userId = @auth {{ auth()->user()->id }} @else null @endauth;
        if (userId === null) return;
    
      
        $('input.form-control:not([type="file"]), textarea.form-control, select.form-control').each(function () {
            let name = $(this).attr('name');
            if (name && localStorage.getItem(userId + "_" + name)) {
                $(this).val(localStorage.getItem(userId + "_" + name));
            }
        });
    
        $(document).on('input change', 'input.form-control:not([type="file"]), textarea.form-control, select.form-control', function () {
            let name = $(this).attr('name');
            if (name) {
                localStorage.setItem(userId + "_" + name, $(this).val());
            }
        });
    
   
        const multiRowTables = [
            'formalEducationTable',
            'nonFormalEducationTable',
            'certificationTable',
            'AcademicTable',
            'AwardTable',
            'CitationTable'
        ];
    
        multiRowTables.forEach(function (tableId) {
            loadTableData(tableId);
        });
    
        function saveTableData(tableId) {
            let tableData = [];
            $("#" + tableId + " tr").each(function () {
                let rowData = {};
                $(this).find("input").each(function () {
                    let name = $(this).attr("name");
                    if (name) {
                        let cleanName = name.replace(/\[\]$/, '');
                        rowData[cleanName] = $(this).val();
                    }
                });
                if (Object.values(rowData).some(v => v !== '')) {
                    tableData.push(rowData);
                }
            });
            localStorage.setItem(userId + "_" + tableId + "_data", JSON.stringify(tableData));
        }
    
        function loadTableData(tableId) {
            let storedData = localStorage.getItem(userId + "_" + tableId + "_data");
            if (storedData) {
                $("#" + tableId).empty();
                const tableData = JSON.parse(storedData);
                tableData.forEach(rowData => {
                    let newRow = "<tr>";
                    for (let key in rowData) {
                        newRow += `<td><input type="text" name="${key}[]" class="form-control" value="${rowData[key] || ''}"></td>`;
                    }
                    newRow += '<td><button type="button" class="btn btn-danger removeRow">-</button></td></tr>';
                    $("#" + tableId).append(newRow);
                });
            }
        }
    
        $(document).on("input", "table input", function () {
            const tableId = $(this).closest("tbody").attr("id");
            saveTableData(tableId);
        });
    
       
        function addRow(tableId, inputNames) {
            let row = `<tr>`;
            inputNames.forEach(name => {
                row += `<td><input type="text" name="${name}[]" class="form-control"></td>`;
            });
            row += `<td><button type="button" class="btn btn-danger removeRow">-</button></td></tr>`;
            document.getElementById(tableId).insertAdjacentHTML('beforeend', row);
        }
    
        $('#addFormalRow').on('click', function () {
            addRow('formalEducationTable', ['degree_program', 'school_address', 'inclusive_dates']);
            saveTableData('formalEducationTable');
        });
    
        $('#addNonFormalRow').on('click', function () {
            addRow('nonFormalEducationTable', ['training_program', 'certificate_obtained', 'dates_attendance']);
        });
    
        $('#AcademicRow').on('click', function () {
            addRow('AcademicTable', ['awards_conferred', 'conferring_organizations', 'date_awarded']);
        });
    
        $('#AwardRow').on('click', function () {
            addRow('AwardTable', ['community_awards_conferred', 'community_conferring_organizations', 'community_date_awarded']);
        });
    
        $('#CitationRow').on('click', function () {
            addRow('CitationTable', ['work_awards_conferred', 'work_community_conferring_organizations', 'work_community_date_awarded']);
        });
    
        $('#addCertificationRow').on('click', function () {
            let row = `<tr>
                <td><input type="text" name="certification_examination[]" class="form-control" required></td>
                <td><input type="text" name="certifying_agency[]" class="form-control" required></td>
                <td><input type="text" name="date_certified[]" class="form-control" required></td>
                <td><input type="text" name="rating[]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger removeRow">-</button></td>
            </tr>`;
            $('#certificationTable').append(row);
        });
    
        $(document).on("click", ".removeRow", function () {
            const tableId = $(this).closest("tbody").attr("id");
            $(this).closest("tr").remove();
            saveTableData(tableId);
        });
    });
   
    


    $(document).ready(function () {
    const userId = $('body').data('userId');
    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

    function userKey(key) {
        return `user_${userId}_${key}`;
    }

    $('.fileInput').on('change', function (e) {
        const file = e.target.files[0];
        const field = $(this).data('field');
        const input = $(this);

        if (!file) {
            Swal.fire('No file selected', '', 'warning');
            return;
        }

        if (!allowedTypes.includes(file.type)) {
            Swal.fire('Invalid file type', 'Only JPG and PNG are allowed.', 'error');
            input.val('');
            return;
        }

        const formData = new FormData();
        formData.append('file', file);
        formData.append('field', field);
        formData.append('user_id', userId); 

        $.ajax({
            url: '{{ route("requirement.upload") }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
               
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_' + field).attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);

                $('#filename_' + field).text(file.name).show();
                $('.clearBtn[data-field="' + field + '"]').show();
                input.hide();

             
                localStorage.setItem(userKey('upload_' + field), file.name);
                const reader2 = new FileReader();
                reader2.onloadend = function () {
                    localStorage.setItem(userKey('upload_src_' + field), reader2.result);
                };
                reader2.readAsDataURL(file);

                Swal.fire('Upload Success', `"${file.name}" uploaded successfully.`, 'success');
            },
            error: function (xhr) {
                input.val('');
                Swal.fire('Upload Failed', xhr.responseJSON?.message || 'Something went wrong.', 'error');
            }
        });
    });

                $('.clearBtn').on('click', function () {
                    const field = $(this).data('field');
                    const input = $('input[data-field="' + field + '"]');

                    input.val('').show();
                    $('#preview_' + field).attr('src', '').hide();
                    $('#filename_' + field).text('').hide();
                    $(this).hide();

                    localStorage.removeItem(userKey('upload_' + field));
                    localStorage.removeItem(userKey('upload_src_' + field));

                    Swal.fire('Cleared', `File for "${field.replace(/_/g, ' ')}" has been removed.`, 'info');
                });

              
                $('.fileInput').each(function () {
                    const field = $(this).data('field');
                    const savedName = localStorage.getItem(userKey('upload_' + field));
                    const savedSrc = localStorage.getItem(userKey('upload_src_' + field));

                    if (savedName && savedSrc) {
                        $('#preview_' + field).attr('src', savedSrc).show();
                        $('#filename_' + field).text(savedName).show();
                        $('.clearBtn[data-field="' + field + '"]').show();
                        $(this).hide();
                    }
                });
            });
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".clickable-image").forEach(img => {
                    img.addEventListener("click", function () {
                        const modalImage = document.getElementById("modalImage");
                        modalImage.src = this.src;
                    });
                });
            });

    </script>
    
     
      
        
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userId = document.body.dataset.userId;
            const field = 'profile_image_user_' + userId; 
    
            const input = document.querySelector(`input[name="profile_image"]`);  
            const preview = document.getElementById('image-preview');  
            const filenameLabel = document.getElementById('filename_profile_image'); 
            const clearBtn = document.querySelector('.clearBtn[data-field="profile_image"]'); 
    
   
            const savedImage = localStorage.getItem(field);
            const savedFilename = localStorage.getItem(`${field}_filename`);
    
            if (savedImage) {
                preview.src = savedImage;
                preview.style.display = 'block';
                filenameLabel.textContent = savedFilename || 'Selected file';
                clearBtn.style.display = 'inline-block';
                input.style.display = 'none'; 
            }
    
           
            input.addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onloadend = function () {
                        preview.src = reader.result;
                        preview.style.display = 'block';
                        filenameLabel.textContent = file.name;
                        clearBtn.style.display = 'inline-block';
                        input.style.display = 'none';
    
                     
                        localStorage.setItem(field, reader.result);
                        localStorage.setItem(`${field}_filename`, file.name); 
    
                        Swal.fire({
                            icon: 'success',
                            title: 'Upload Successful',
                            text: 'Your profile image has been uploaded successfully.'
                        });
                    };
                    reader.readAsDataURL(file); 
                }
            });
    
           
            clearBtn.addEventListener('click', function () {
                localStorage.removeItem(field); 
                localStorage.removeItem(`${field}_filename`); 
                preview.src = '';
                preview.style.display = 'none';
                filenameLabel.textContent = '';
                clearBtn.style.display = 'none';
                input.style.display = 'inline-block'; 
                input.value = '';
    
                
                Swal.fire({
                    icon: 'success',
                    title: 'Image Cleared',
                    text: 'Your profile image has been cleared.'
                });
            });
        });
    </script>
    
    
    
        


    
@endsection
