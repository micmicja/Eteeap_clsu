<x-guest-layout>
    <div class="mb-6 text-sm text-gray-700 dark:text-gray-300 leading-relaxed space-y-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">DATA PRIVACY NOTICE</h2>

        <p>
            Central Luzon State University (CLSU) values your privacy and upholds its commitment to protecting personal data in compliance with Republic Act No. 10173, also known as the Data Privacy Act of 2012. This form collects personal data such as Full name (Last, First, Middle), ID photo, Sex, Civil status, Birthdate, Birthplace, Address Zip code, Telephone number(s), Community Tax Certificate number, Government-issued IDs, NSO-authenticated birth certificate, Formal education history (schools attended, course/degree, dates), Non-formal education/training (titles, certificates, dates), Certification exams (name, agency, date certified, rating), Most recent academic record or diploma, Work Experience, Employer name and address, Inclusive dates of employment, Status/terms of employment, Functions and responsibilities, Academic, civic/community, and work-related awards (with conferring organizations and dates), Creative works and accomplishments (with validating institutions), Work-related learning activities, Volunteer activities (description, purpose), Travel history (places visited, purposes, learning outcomes), etc.
        </p>

        <p>
            The data you provide will be used solely for the purpose of:
            <ol class="list-decimal list-inside ml-4">
                <li>Evaluating your application to a program under ETEEAP;</li>
                <li>Communicating with you regarding your eligibility, application status, and program requirements;</li>
                <li>Verifying submitted information and coordinating with relevant academic units; and</li>
                <li>Preparing institutional reports for submission to CHED or other authorized bodies, in compliance with regulatory requirements.</li>
            </ol>
        </p>

        <p>
            Your personal data will be processed fairly and lawfully, accessed only by authorized CLSU personnel, and stored securely with appropriate safeguards to ensure confidentiality, integrity, and availability. Data will be retained only as long as necessary to fulfill the stated purpose. CLSU will not share your personal data with any third party without your knowledge and explicit consent, unless required by law.
        </p>

        <p>
            <em>Note:</em> This form is hosted on CLSU’s institutional Google account. As with all cloud-based platforms, data may be stored on servers outside the Philippines. While CLSU does not control the physical location of these servers, we implement access controls and other safeguards to ensure your data is handled in accordance with the Data Privacy Act of 2012.
        </p>

        <p>
            You have the right to be informed, to access and correct your personal data, to object to or restrict its processing, to withdraw consent at any time, and to seek redress in case of any violation of your rights under the Data Privacy Act.
        </p>

        <p>
            For questions or to exercise your rights, you may contact the CLSU Data Protection Officer at
            <a href="mailto:dpo@clsu.edu.ph" class="text-blue-600 hover:underline">dpo@clsu.edu.ph</a>.
        </p>
    </div>

    <!-- Display any error messages -->
    @if (session('error'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('error') }}
        </div>
    @endif

    <form method="GET" action="{{ route('register') }}">
        <div class="block mt-4">
            <label for="agree" class="inline-flex items-start">
                <input id="agree" type="checkbox" name="agree" required class="mt-1">
                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                    <strong>
                        I have read and understood the Data Privacy Notice above. I voluntarily give my informed and specific consent to the collection and processing of my personal data for the purpose stated in this form.
                    </strong>
                </span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button>
                Proceed to Registration
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
