@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-center">ETEEAP Application Form</h2>
      
            <h2 class="text-center">INSTRUCTION</h2>
            <h4>Please type or clearly print your answers to all questions.  Provide complete and detailed information required by the questions.  All the declarations that you make are under oath.  Discovery of any false claim in this application form will disqualify you from participating in the program.</h4>
  
         
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
                        <td><input type="text" name="education[0][awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][date_awarded]" class="form-control" required></td>
                       
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][date_awarded]" class="form-control" required></td>
                     
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][date_awarded]" class="form-control" required></td>
                   
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
                        <td><input type="text" name="education[0][community_awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][community_conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][community_date_awarded]" class="form-control" required></td>
                       
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][community_awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][community_conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][community_date_awarded]" class="form-control" required></td>
                     
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][community_awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][community_conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][community_date_awarded]" class="form-control" required></td>
                   
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
                        <td><input type="text" name="education[0][work_awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][work_community_conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][work_community_date_awarded]" class="form-control" required></td>
                       
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][work_awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][work_community_conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][work_community_date_awarded]" class="form-control" required></td>
                     
                    </tr>
                    <tr>
                        <td><input type="text" name="education[0][work_awards_conferred]" class="form-control" required></td>
                        <td><input type="text" name="education[0][work_community_conferring_organizations]" class="form-control" required></td>
                        <td><input type="text" name="education[0][work_community_date_awarded]" class="form-control" required></td>
                   
                    </tr>
                    
                </tbody>
            </table>
           



            <div class="d-flex justify-content-between mt-4">
              
                <a href="{{ url('/') }}" class="btn btn-danger">
                    {{ __('Cancel') }}
                </a>
            
                <div>
                   
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
            
                 
                    <a href="{{ route('work') }}" class="btn btn-success ms-2">
                        {{ __('Next →') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
