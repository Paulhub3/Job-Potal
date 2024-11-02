<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NurseApplcationData;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class NurseApplicationController extends Controller
{
    //First Page functions
    public function showStep()
    {

        $countries = [
          "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"

        ];

        // Retrieve form data for step 1 from the session
        $formData = Session::get('form.step', []);
        // Pass the form data to the view
        return view('nursing-application.form-page-one', compact('formData'))->with('countries', $countries);
    }

    public function postStep(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'nationality' => 'required|string',
            // other validation rules
        ]);

        Session::put('form.step', $request->all());

        return redirect()->route('form.step1');
    }


    //Second  Page functions
    public function showStep1()
    {

        $countries = [
            "Austria", "Belgium", "Bulgaria", "Croatia", "Cyprus", "Czech Republic", "Denmark", "Estonia",
            "Finland", "France", "Germany", "Greece", "Hungary", "Ireland", "Italy", "Latvia", "Lithuania",
            "Luxembourg", "Malta", "Netherlands", "Poland", "Portugal", "Romania", "Slovakia", "Slovenia", "Spain", "Sweden",
            "Israel", "Canada", "United States of America",
            "England", "Scotland", "Wales", "Northern Ireland"
        ];

        $formData = Session::get('form.step1', []);
        return view('nursing-application.form-page-two', compact('formData'))->with('countries', $countries);
    }

    public function postStep1(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'country_residence' => 'required|string',
            // other validation rules
        ]);

        Session::put('form.step1', $request->all());

        return redirect()->route('form.step2');
    }


    //Third Page functions
    public function showStep2()
    {
        $formData = Session::get('form.step2', ['work_country' => []]);
        return view('nursing-application.form-page-three', compact('formData'));
    }

    public function postStep2(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'work_country' => 'required|array',
        ]);


        $workCountries = $request->input('work_country');
        $request->session()->put('form.step2.work_country', $workCountries);


        // Redirect to next step
        if (count($workCountries) > 2) {
            return redirect()->route('form.step4');
        }

        return redirect()->route('form.step3'); // Assuming there's a step 3 if not skipping
    }


    //Function to check if the is more than two countries
    public function skipPage(Request $request)
    {
        // Retrieve the work countries from the session
        $workCountries = $request->session()->get('form.step2.work_country', []);

        // Check if there are more than three countries
        if (count($workCountries) > 2) {
            // Redirect to another page if there are more than three countries
            return redirect()->route('form.step2');
        }

        // If there are 3 or fewer countries, proceed to the previous page
        return redirect()->route('form.step3');

    }



     //Fourth Page functions
    public function showStep3()
    {
        // Pass cities to the view
        $formData = Session::get('form.step3', ['work_country' => []]);
        return view('nursing-application.form-page-four', compact('formData') );
    }

     public function postStep3(Request $request)
     {

        // Validate the data
        $request->validate([
            'states' => 'required|array',
            'postal_codes' => 'required|array',
        ]);

        // Retrieve and process selected states and postal codes
        $states = $request->input('states', []);
        $postalCodes = $request->input('postal_codes', []);

        $workState = [];
        $workStatePostalCode = [];

        foreach ($states as $index => $selectedStates) {
            foreach ($selectedStates as $state) {
                $workState[] = $state;
                if (isset($postalCodes[$index])) {
                    $workStatePostalCode[] = $postalCodes[$index];
                }
            }
        }

        // Store in session
        $request->session()->put('form.step3.work_state', $workState);
        $request->session()->put('form.step3.work_state_postal_code', $workStatePostalCode);

        return redirect()->route('form.step4');

     }



    //Fifth Page functions
    public function showStep4()
    {
        $formData = Session::get('form.step4', ['future_work' => '']);
        return view('nursing-application.form-page-five', compact('formData'));
    }

    public function postStep4(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'future_work' => 'required|string',
        ]);

        // Get the selected future work from the request
        $futureWork = $request->input('future_work');

        // Store the future work in session
        $request->session()->put('form.step4.future_work', $futureWork);

        // Redirect to the next step or complete the form process
        return redirect()->route('form.step5'); // Assuming there's a step 5
    }



    //Sixth Page functions
    public function showStep5()
    {
        $formData = Session::get('form.step5', ['work_type' => '']);
        return view('nursing-application.form-page-six', compact('formData'));
    }

    public function postStep5(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'work_type' => 'required|string',
        ]);

        // Get the selected work type from the request
        $workType = $request->input('work_type');

        // Store the work type in session
        $request->session()->put('form.step5.work_type', $workType);

        // Redirect to the next step or complete the form process
        return redirect()->route('form.step6'); // Assuming there's a completion route
    }



    //Seventh Page functions
    public function showStep6()
    {
        $formData = Session::get('form.step6', ['training_type' => '']);
        return view('nursing-application.form-page-added', compact('formData'));
    }

    public function postStep6(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'training_type' => 'required|string',
        ]);

        // Get the selected training type from the request
        $trainingType = $request->input('training_type');

        // Store the training type in session
        $request->session()->put('form.step6.training_type', $trainingType);

        // Redirect to the next step or complete the form process
        return redirect()->route('form.step7'); // Assuming there's a completion route
    }




    //Eight Page functions
    public function showStep7()
    {
        $formData = Session::get('form.step7', ['additional_qualifications' => '']);
        return view('nursing-application.form-page-seven', compact('formData'));
    }


    public function postStep7(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'additional_qualifications' => 'required|string',
        ]);

        // Get the selected additional qualifications from the request
        $additionalQualifications = $request->input('additional_qualifications');

        // Store the additional qualifications in session
        $request->session()->put('form.step7.additional_qualifications', $additionalQualifications);

        // Redirect to the next step or complete the form process
        return redirect()->route('form.step8'); // Assuming there's a completion route
    }


    //Nine Page functions
    public function showStep8()
    {
        $formData = Session::get('form.step8', ['start_date' => '']);
        return view('nursing-application.form-page-eight', compact('formData'));
    }

    public function postStep8(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'start_date' => 'required|string',
        ]);

        // Get the selected start date from the request
        $startDate = $request->input('start_date');

        // Store the start date in session
        $request->session()->put('form.step8.start_date', $startDate);

        // Redirect to the next step or complete the form process
        return redirect()->route('form.step9'); // Assuming there's a completion route
    }

    // Ten Page functions
    public function showStep9(Request $request)
    {
        // Retrieve the data from the session
        $euLicense = $request->session()->get('form.step9.eu_license', '');

        // Pass the data to the view
        return view('nursing-application.form-page-nine', [
            'eu_license' => $euLicense,
        ]);
    }


    public function postStep9(Request $request)
    {
        $request->validate([
            'eu_license' => 'required|boolean',
        ]);

        $euLicense = $request->input('eu_license');

        // Store the final step data in session
        $request->session()->put('form.step9.eu_license', $euLicense);

        // Redirect to the form complete page
        return redirect()->route('form.step10');
    }



     //Eleventh Page functions
    public function showStep10(Request $request)
    {
        // Retrieve the data from the session
        $language = $request->session()->get('form.step10.language', '');
        $language_level = $request->session()->get('form.step10.language_level', '');

        // Pass the data to the view
        return view('nursing-application.select-lang', [
            'language' => $language,
            'language_level' => $language_level,
        ]);
    }

    public function postStep10(Request $request)
    {
        // Validate the form submission
        $request->validate([
            'language' => 'required', // Add more validation rules as needed
            'language_level' => 'required',
        ]);

        // Store validated data in the session
        $request->session()->put('form.step10.language', $request->input('language'));
        $request->session()->put('form.step10.language_level', $request->input('language_level'));

        // Redirect to the next step
        return redirect()->route('form.complete');

    }



    // Complete Page functions
    public function showLast(Request $request)
    {
        $formData = Session::get('form.complete', []);
        return view('nursing-application.form-complete', compact('formData'));
    }


    public function postLast(Request $request)
    {
         // Validate the data
         $request->validate([
            'gender' => 'required|string',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        // Store the final step data in session
        Session::put('form.complete', $request->only([
            'gender',
            'first_name',
            'middle_name',
            'surname',
            'email',
            'phone_number',
        ]));

        // Retrieve all session data
        $formData = array_merge(
            Session::get('form.step', []),
            Session::get('form.step1', []),
            Session::get('form.step2', []),
            Session::get('form.step3', []),
            Session::get('form.step4', []),
            Session::get('form.step5', []),
            Session::get('form.step6', []),
            Session::get('form.step7', []),
            Session::get('form.step8', []),
            Session::get('form.step9', []),
            Session::get('form.step10', []),
            Session::get('form.complete', [])
        );

         // Convert arrays to JSON strings
        if (isset($formData['work_country'])) {
            $formData['work_country'] = json_encode($formData['work_country']);
        }
        if (isset($formData['work_state'])) {
            $formData['work_state'] = json_encode($formData['work_state']);
        }
        if (isset($formData['work_state_postal_code'])) {
            $formData['work_state_postal_code'] = json_encode($formData['work_state_postal_code']);
        }

        // Save the data in the database
        NurseApplcationData::create($formData);

        // Send the email with the form data to a hardcoded email address using a queue


        //$receiverEmail = 'amahandy11@gmail.com';
        //Mail::to($receiverEmail)->queue(new EmployeeMail($formData));


        // Clear the session
        Session::forget('form');

        Alert::success('job Application', 'you have successfully applied for a jab,  Check your email for our responses');

        // Redirect to the complete page
        return redirect()->route('form.step');
    }





}
