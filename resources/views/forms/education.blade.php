@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-center">ETEEAP Application Form</h2>
      
            <h2 class="text-center">INSTRUCTION</h2>
            <h4>Please type or clearly print your answers to all questions.  Provide complete and detailed information required by the questions.  All the declarations that you make are under oath.  Discovery of any false claim in this application form will disqualify you from participating in the program.</h4>
            <!-- Personal Information -->
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
                        <td><input type="text" name="education[0][degree_program]" class="form-control" required></td>
                        <td><input type="text" name="education[0][school_address]" class="form-control" required></td>
                        <td><input type="text" name="education[0][inclusive_dates]" class="form-control" required></td>
                        
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][degree_program]" class="form-control" required></td>
                        <td><input type="text" name="education[0][school_address]" class="form-control" required></td>
                        <td><input type="text" name="education[0][inclusive_dates]" class="form-control" required></td>
                      
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][degree_program]" class="form-control" required></td>
                        <td><input type="text" name="education[0][school_address]" class="form-control" required></td>
                        <td><input type="text" name="education[0][inclusive_dates]" class="form-control" required></td>
                      
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
                        <td><input type="text" name="education[0][training_program]" class="form-control" required></td>
                        <td><input type="text" name="education[0][certificate_obtained]" class="form-control" required></td>
                        <td><input type="text" name="education[0][dates_attendance]" class="form-control" required></td>
                     
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][training_program]" class="form-control" required></td>
                        <td><input type="text" name="education[0][certificate_obtained]" class="form-control" required></td>
                        <td><input type="text" name="education[0][dates_attendance]" class="form-control" required></td>
                     
                    </tr>
                    <tr>
                       
                        <td><input type="text" name="education[0][training_program]" class="form-control" required></td>
                        <td><input type="text" name="education[0][certificate_obtained]" class="form-control" required></td>
                        <td><input type="text" name="education[0][dates_attendance]" class="form-control" required></td>
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
                        <td><input type="text" name="education[0][certification_examination]" class="form-control" required></td>
                        <td><input type="text" name="education[0][certifying_agency]" class="form-control" required></td>
                        <td><input type="text" name="education[0][date_certified]" class="form-control" required></td>
                        <td><input type="text" name="education[0][rating]" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][certification_examination]" class="form-control" required></td>
                        <td><input type="text" name="education[0][certifying_agency]" class="form-control" required></td>
                        <td><input type="text" name="education[0][date_certified]" class="form-control" required></td>
                        <td><input type="text" name="education[0][rating]" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][certification_examination]" class="form-control" required></td>
                        <td><input type="text" name="education[0][certifying_agency]" class="form-control" required></td>
                        <td><input type="text" name="education[0][date_certified]" class="form-control" required></td>
                        <td><input type="text" name="education[0][rating]" class="form-control" required></td>
                    </tr>
                    
                </tbody>
            </table>
            <h4>Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program. </h4>



            <div class="d-flex justify-content-between mt-4">
                <!-- Cancel Button -->
                <a href="{{ url('/') }}" class="btn btn-danger">
                    {{ __('Cancel') }}
                </a>
            
                <div>
                    <!-- Save Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
            
                    <!-- Next Button -->
                    <a href="{{ route('experince') }}" class="btn btn-success ms-2">
                        {{ __('Next →') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
