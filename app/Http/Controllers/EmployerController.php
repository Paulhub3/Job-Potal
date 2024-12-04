<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class EmployerController extends Controller
{
    //Page 1 functions
    public function showPage()
    {
        $formData = Session::get('form.page', ['worker_location' => '']);
        return view('medical-employer.form-page-one', compact('formData'));
    }


    public function postPage(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'company_location' => 'required',
        ]);

        // Get the selected future work from the request
        $companyLocation = $request->input('company_location');

        // Store the future work in session
        $request->session()->put('form.page.company_location', $companyLocation);

        // Redirect to the next step or complete the form process
        return redirect()->route('form.page1'); // Assuming there's a step 5
    }


     //Page 2 functions
     public function showPage1()
     {
         // Pass cities to the view
         $formData = Session::get('form.step1', ['company_location' => []]);
         return view('medical-employer.form-page-two', compact('formData') );
     }

      public function postPage1(Request $request)
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
         $request->session()->put('form.page1.company_state', $workState);
         $request->session()->put('form.page1.company_state_postal_code', $workStatePostalCode);

         return redirect()->route('form.page2');

      }

    //Page 3 functions
    public function showPage2(Request $request)
    {
        // Retrieve the data from the session
        $profession = $request->session()->get('form.page2.profession', '');

        // Pass the data to the view
        return view('medical-employer.form-page-three', [
            'profession' => $profession,
        ]);
    }


    public function postPage2(Request $request)
    {
        $request->validate([
            'profession' => 'required|string',
        ]);

        $profession = $request->input('profession');

        // Store the final step data in session
        $request->session()->put('form.page2.profession', $profession);


        // Redirect to the form complete page
        return redirect()->route('form.page3');
    }


    //Page 4 functions
    public function showPage3()
    {
        $formData = Session::get('form.page3', ['start_date' => '']);
        return view('medical-employer.form-page-four', compact('formData'));
    }

    public function postPage3(Request $request)
    {
        // Validate and save the data in session
        $request->validate([
            'start_date' => 'required|string',
        ]);

        // Get the selected start date from the request
        $startDate = $request->input('start_date');

        // Store the start date in session
        $request->session()->put('form.page3.start_date', $startDate);

        // Redirect to the next step or complete the form process
        return redirect()->route('form.page4'); // Assuming there's a completion route
    }

    //Page 5 functions
    public function showPage4(Request $request)
    {
        // Retrieve the data from the session
        $currency = $request->session()->get('form.page4.currency', '');
        $salary_range = $request->session()->get('form.page4.salary_range', '');

        // Pass the data to the view
        return view('medical-employer.form-page-five', [
            'currency' => $currency,
            'salary_range' => $salary_range,
        ]);
    }

    public function postPage4(Request $request)
    {
        // Validate the form submission
        $request->validate([
            'currency' => 'required', // Add more validation rules as needed
            'salary_range' => 'required',
        ]);

        // Store validated data in the session
        $request->session()->put('form.page4.currency', $request->input('currency'));
        $request->session()->put('form.page4.salary_range', $request->input('salary_range'));

        // Redirect to the next step
        return redirect()->route('form.submit');

    }



     // View for the last page
    public function viewLastPage(Request $request)
    {
        return view('medical-employer.form-complete');
    }


    public function postLastPage(Request $request)
    {
        try {
            // Validate the final form data
            $request->validate([
                'company_name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:employers,email',
                'phone_number' => 'required|max:15|unique:employers,phone_number',
                'company_address' => 'required|string|max:255',
                'job_description' => 'required|string',
            ]);

            // Retrieve all relevant data from the session and request
            $formData = array_merge(
                Session::get('form.page', []),
                Session::get('form.page1', []),
                Session::get('form.page2', []),
                Session::get('form.page3', []),
                Session::get('form.page4', []),
                $request->only(['company_name', 'email', 'phone_number', 'company_address', 'job_description'])
            );

            // Ensure all necessary fields are strings and handle any arrays properly
            $formData = array_map(function($item) {
                return is_array($item) ? json_encode($item) : $item;
            }, $formData);

            // Manually adding timestamps
            $formData['created_at'] = Carbon::now();
            $formData['updated_at'] = Carbon::now();

            // Insert data into the database
            Employer::create($formData);

            // Send the email with the form data to a hardcoded email address using a queue
            //$receiverEmail = 'amahandy11@gmail.com';
            // Mail::to($receiverEmail)->queue(new medical-employerMail($formData));

            // Clear the session
            Session::flush();

            // Set success message in session
            session()->flash('success', 'You have successfully requested skill worker. Check your email for our responses');


            // Redirect to a thank you or confirmation page
            return redirect()->route('form.page');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database errors
            $errorMessage = 'Database error occurred: ';
            if (app()->environment('local')) {
                $errorMessage .= $e->getMessage();
            } else {
                $errorMessage .= 'Please try again later.';
            }
            Alert::error('Error', $errorMessage);
            return redirect()->back()->withInput();

        } catch (\Exception $e) {
            // Handle other general errors
            $errorMessage = 'An unexpected error occurred: ';
            if (app()->environment('local')) {
                $errorMessage .= $e->getMessage();
            } else {
                $errorMessage .= 'Please try again later.';
            }
            Alert::error('Error', $errorMessage);
            return redirect()->back()->withInput();
        }
    }


}
