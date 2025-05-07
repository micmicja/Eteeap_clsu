@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-center">ETEEAP Application Form</h2>
      
            <h2 class="text-center">INSTRUCTION</h2>
            <h4>Please type or clearly print your answers to all questions.  Provide complete and detailed information required by the questions.  All the declarations that you make are under oath.  Discovery of any false claim in this application form will disqualify you from participating in the program.</h4>
            <!-- Personal Information -->
            <h3>V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</h3>
           <h4> In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are inventions, published and unpublished literary fiction and nonfiction writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain field of interest. Include also participation in competitions and prizes obtained.</h4>
           <div class="form-group">
            <label for="accomplishment_description">1. Description:</label>
            <textarea name="accomplishment_description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="date_accomplished:">2. Date Accomplished:</label>
            <textarea name="date_accomplished" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="address_of_publishing">3. Name and Address of Publishing Agency (if written, published work), or an Association/institution which can attest to the quality of the work.</label>
            <textarea name="address_of_publishing" class="form-control" required></textarea>
        </div>
    <h4>Note: Use additional sheet if necessary, following the same format.</h4>
        <h3>VI. LIFELONG LEARNING EXPERIENCE</h3>
        <h4>In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</h4>
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
    <label for="signature_image">Upload Signature</label>
    <input type="file" name="signature_image" class="form-control-file" accept="image/*" required>
</div>


<h4 class="mt-4">Community Tax Certificate</h4>
<div class="form-group">
    <label for="community_tax_certificate">Certificate Number</label>
    <input type="text" name="community_tax_certificate" class="form-control" placeholder="Enter Community Tax Certificate" required>
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
</div>


<div class="d-flex justify-content-between mt-4">
    <x-primary-button class="ms-3">
        <a href="{{ url('/') }}">
            {{ __('Cancel') }}
        </a>
    </x-primary-button>
    
    <button type="submit" class="btn btn-primary">Save</button>
</div>
        </form>
    </div>
</div>
@endsection
