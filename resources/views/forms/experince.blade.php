@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-center">ETEEAP Application Form</h2>
      
            <h2 class="text-center">INSTRUCTION</h2>
            <h4>Please type or clearly print your answers to all questions.  Provide complete and detailed information required by the questions.  All the declarations that you make are under oath.  Discovery of any false claim in this application form will disqualify you from participating in the program.</h4>
           
            <h3>III. PAID WORK AND OTHER EXPERIENCES</h3>
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
            <h4>Note: Use another sheet if necessary, following the above format.</h4>
           


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
                    <a href="{{ route('awards') }}" class="btn btn-success ms-2">
                        {{ __('Next →') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
