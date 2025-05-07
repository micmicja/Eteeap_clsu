
<body data-page="edit" data-user-id="{{ auth()->id() }}">

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

<h4>Personal Information</h4>
<div class="row mt-3">
    <div class="col-md-2">
        <label>Application ID</label>
        <input type="text" name="id" class="form-control" value="{{ $application->id }}" readonly>
    </div>
</div>

<div class="row">                   
    <div class="col-md-4">
        <label>1. First Name</label>
       <input type="text" name="first_name" class="form-control" value="{{ $application->first_name ?? '' }}">
    </div>
    <div class="col-md-4">
        <label>Middle Name</label>
        <input type="text" name="middle_name" class="form-control" value="{{ $application->middle_name ?? '' }}">
      
    </div>
    <div class="col-md-4">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ $application->last_name ?? '' }}">
    </div>
</div>
<div class="form-group">
    <label for="contact_number">Contact Number</label>
    <input type="text" name="contact_number" class="form-control" value="{{  $application->contact_number }}">
</div>

<div class="form-group">
    <label>2. Address</label>
    <input type="text"  name="address" class="form-control"  value="{{  $application->address }}" >
</div>

<div class="form-group">
    <label>3. Birthdate</label>
    <input type="text"  name="birthdate"  class="form-control"  value="{{  $application->birthdate }}">
</div>

<div class="form-group">
    <label>4. Birthplace</label>
    <input type="text" name="birthplace"  class="form-control"  value="{{ $application->birthplace}}">
</div>

<div class="form-group">
    <label for="civil_status">5. Civil Status</label>
    <select class="form-control" required>
        <option name="civil_status" value="Single" {{ $application->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
        <option name="civil_status" value="Married" {{ $application->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
        <option name="civil_status" value="Divorced" {{ $application->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
        <option name="civil_status" value="Widowed" {{ $application->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
    </select>
</div>


<div class="form-group">
    <label for="sex">6. Sex</label>
    <select name="sex" class="form-control" required>
        <option value="Male" {{ $application->sex == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $application->sex == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ $application->sex == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>


<div class="form-group">
    <label>7. Language and Dialect Spoken:</label>
    <input type="text" name="language" class="form-control"  value="{{  $application->language}}">
</div>

<div class="form-group">
    <label>Degree Program Field:</label>
    <input type="text" name="degree_program_field" class="form-control"  value="{{ $application->degree_program_field }}">
</div>

<div class="form-group">
    <label>First Priority:</label>
    <input type="text" name="first_priority" class="form-control"  value="{{ $application->first_priority }}">
</div>

<div class="form-group">
    <label>Second Priority:</label>
    <input type="text" name="second_priority" class="form-control" value="{{ $application->second_priority }}">
</div>

<div class="form-group">
    <label>Third Priority:</label>
    <input type="text" name="third_priority" class="form-control" value="{{$application->third_priority }}">
</div>

<div class="form-group">
    <label>10. Statement of your goals, objectives, or purposes in applying for the degree.</label>
    <textarea name="goals_objectives" class="form-control auto-resize" rows="1" name="goals_objectives">{{  $application->goals_objectives }}</textarea>
</div>

<div class="form-group">
    <label>11. Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.</label>
    <textarea name="learning_activities" class="form-control auto-resize" rows="1" name="learning_activities">{{ $application->learning_activities }}</textarea>
</div>

<div class="form-group">
    <label>12. For overseas applicants, describe how much you plan to obtain accreditation/equivalency. (e.g. when you plan to come to the Philippines)</label>
    <textarea name="overseas_applicants" class="form-control auto-resize" rows="1" name="overseas_applicants">{{  $application->overseas_applicants}}</textarea>
</div>

<div class="form-group">
    <label>13. How soon do you need to complete equivalency accreditation</label>
    <input type="text" name="equivalency_accreditation" class="form-control"  value="{{  $application->equivalency_accreditation}}">
</div>

<h3>II. Education</h3>

<h5>This section will require you to provide information on your past formal, non-formal and informal learning experiences.</h5>
<h3>1. Formal Education</h3>
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Degree Program</th>
            <th>School Address</th>
            <th>Inclusive Dates</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($degree_programs as $index => $program)
            <tr>
         <td>
         <textarea name="degree_program[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
        </td>
         <td>
         <textarea name="school_address[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $school_addresses[$index] ?? '') }}</textarea>
        </td>
        <td>
         <textarea name="inclusive_dates[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $inclusive_dates[$index] ?? '') }}</textarea>
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
            @foreach ($training_program as $index => $program)
                <tr>
                    <td>
                        <textarea name="program[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
                    </td>
                    <td>
                        <textarea name="certificate_obtained[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $certificate_obtained[$index] ?? '') }}</textarea>
                    </td>
                    <td>
                        <textarea name="dates_attendance[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $dates_attendance[$index] ?? '') }}</textarea>
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
            <textarea name="program[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
        </td>
        <td>
            <textarea name="certification_examination[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $certification_examination[$index] ?? '') }}</textarea>
        </td>
        <td>
            <textarea name="certifying_agency[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $certifying_agency[$index] ?? '') }}</textarea>
        </td>
        <td>
            <textarea name="rating[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $rating[$index] ?? '') }}</textarea>
        </td>
    </tr>
@endforeach
</tbody>
</table>

<h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>
<h3>III. PAID WORK AND OTHER EXPERIENCES</h3>

<div class="form-group">
<label>1. Position/Designation</label>
<textarea  name="position_designation" class="form-control auto-resize" rows="1" >{{ $application->position_designation }}</textarea>
</div>

<div class="form-group">
<label>2. Inclusive Dates of Employment (Attach service record if any) From:</label>
<textarea  name="dates_of_employment" class="form-control auto-resize" rows="1" >{{ $application->dates_of_employment }}</textarea>
</div>

<div class="form-group">
<label>3. Name and Address of Company</label>
<textarea  name="address_of_company" class="form-control auto-resize" rows="1" >{{ $application->address_of_company }}</textarea>
</div>

<div class="form-group">
<label>4. Terms/Status of Employment</label>
<textarea  name="status_of_employment" class="form-control auto-resize" rows="1" >{{ $application->status_of_employment }}</textarea>
</div>

<div class="form-group">
<label>5. Name and Designation of Immediate Supervisor</label>
<textarea  name="designation_of_immediate" class="form-control auto-resize" rows="1" >{{ $application->designation_of_immediate }}</textarea>
</div>

<div class="form-group">
<label>6. Reason(s) for moving on to the next job</label>
<textarea  name="reasons_for_moving" class="form-control auto-resize" rows="1" >{{ $application->reasons_for_moving }}</textarea>
</div>

<div class="form-group">
<label>7. Describe actual functions and responsibilities in position occupied.</label>
<textarea  name="responsibilities_in_position" class="form-control auto-resize" rows="1" >{{ $application->responsibilities_in_position }}</textarea>
</div>

<div class="form-group">
<label>8. In case of self-employment, name three (3) reference persons:</label>
<textarea  name="case_of_self_employment" class="form-control auto-resize" rows="1" >{{ $application->case_of_self_employment }}</textarea>
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
        <textarea name="program[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
    </td>
    <td>
        <textarea name="conferring_organizations[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $conferring_organizations[$index] ?? '') }}</textarea>
    </td>
    <td>
        <textarea name="date_awarded[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $date_awarded[$index] ?? '') }}</textarea>
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
        <textarea name="program[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
    </td>
    <td>
        <textarea name="conferring_organizations[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $conferring_organizations[$index] ?? '') }}</textarea>
    </td>
    <td>
        <textarea name="community_date_awarded[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $community_date_awarded[$index] ?? '') }}</textarea>
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
        <textarea name="program[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
    </td>
    <td>
        <textarea name="work_community_conferring_organizations[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $work_community_conferring_organizations[$index] ?? '') }}</textarea>
    </td>
    <td>
        <textarea name="work_community_date_awarded[]" class="form-control auto-resize">{{ str_replace(['[', ']', '"'], '', $work_community_date_awarded[$index] ?? '') }}</textarea>
    </td>
</tr>
    @endforeach
    </tbody>
</table>

<h3>V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</h3>
<h4> In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are inventions, published and unpublished literary fiction and nonfiction writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain field of interest. Include also participation in competitions and prizes obtained.</h4>



<div class="form-group">
<label>1. Description:</label>
<textarea name="accomplishment_description" class="form-control auto-resize" rows="1" >{{ $application->accomplishment_description }}</textarea>
</div>

<div class="form-group">
<label>2. Date Accomplished:</label>
<textarea name="date_accomplished" class="form-control auto-resize" rows="1" >{{ $application->date_accomplished }}</textarea>
</div>

<div class="form-group">
<label>3. Name and Address of Publishing Agency (if written, published work), or an Association/institution which can attest to the quality of the work:</label>
<textarea name="address_of_publishing" class="form-control auto-resize" rows="1" >{{ $application->address_of_publishing }}</textarea>
</div>



<h4>Note: Use additional sheet if necessary, following the same format.</h4>

<h3>VI. LIFELONG LEARNING EXPERIENCE</h3>
<h4>In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</h4>


<div class="form-group">
<label>1. Hobbies/Leisure Activities</label>
<textarea name="leisure_activities" class="form-control auto-resize" rows="1" >{{ $application->leisure_activities }}</textarea>
</div>

<div class="form-group">
<label>2. Special Skills</label>
<textarea name="special_skills" class="form-control auto-resize" rows="1" >{{ $application->special_skills }}</textarea>
</div>

<div class="form-group">
<label>3. Work-Related Activities</label>
<textarea name="work_related_activities" class="form-control auto-resize" rows="1" >{{ $application->work_related_activities }}</textarea>
</div>

<div class="form-group">
<label>4. Volunteer Activities</label>
<textarea name="volunteer_activities" class="form-control auto-resize" rows="1" >{{ $application->volunteer_activities }}</textarea>
</div>
<div class="form-group">
<label>5. Travels: Cite places visited and purpose of travel</label>
<label>Include write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experiences was obtained from these travels and how it helped you become a better person.</label>
<textarea name="travels_cite_places" class="form-control auto-resize" rows="1" >{{ $application->travels_cite_places }}</textarea>
</div>



<p>
I declare under oath that the foregoing claims and information I have disclosed are true and correct.
Done in <input type="text" name="declaration_place" class="form-control d-inline w-auto" value="{{ $application->declaration_place }}" >
on this <input type="text" name="declaration_day" class="form-control d-inline w-auto" value="{{ $application->declaration_day }}" >
day of <input type="text" name="declaration_month_year" class="form-control d-inline w-auto" value="{{ $application->declaration_month_year }}" >.
</p>


<h4 class="mt-4">Signed:</h4>

<div class="form-group">
<label>Printed Name and Signature of Applicant</label>
<input type="text" name="printed_name" class="form-control" 
       value="{{ old('printed_name', $application->printed_name) }}">
</div>

<div class="form-group">
<label>Community Tax Certificate</label>
<input type="text" name="community_tax_certificate" class="form-control" 
       value="{{ old('community_tax_certificate', $application->community_tax_certificate) }}">
</div>

<div class="form-row d-flex">
<div class="form-group col-md-6">
    <label for="issued_on">Issued on</label>
    <input type="date" name="issued_on" class="form-control" 
           value="{{ old('issued_on', $application->issued_on) }}">
</div>

<div class="form-group col-md-6">
    <label for="issued_at">Issued at</label>
    <input type="text" name="issued_at" class="form-control" 
           value="{{ old('issued_at', $application->issued_at) }}">
</div>
</div>


    



<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#addFormalEducationRow').click(function () {
            $('#formalEducationTable tbody').append(`
                <tr>
                    <td><textarea name="degree_programs[]" class="form-control auto-resize"></textarea></td>
                    <td><textarea name="school_addresses[]" class="form-control auto-resize"></textarea></td>
                    <td><textarea name="inclusive_dates[]" class="form-control auto-resize"></textarea></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                </tr>
            `);
        });
    
        $(document).on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
        });
    });
    </script>
    </body>
   