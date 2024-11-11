<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\OtherProffessionEmployer;


class OtherProffessionEmployerController extends Controller
{
    public function index()
    {
        return view('other-proffessions.employer');
    }

    public function store(Request $request)
    {
        try {
            // Log the incoming request data
            Log::info('Employer form submission data:', $request->all());

            // Validate the data
            $validatedData = $request->validate([
                'company_name' => 'required|string|max:255',
                'email' => 'required|email|unique:other_proffession_employers,email',
                'phone_number' => 'required|string',
                'industry' => 'required|string|max:255',
                'is_registered_in_europe' => 'required|in:yes,no',
                'company_type' => 'required|in:startup,established',
                'company_size' => 'required|in:1-10,11-50,51-200,201-500,501+',
                'available_positions' => 'required|string',
                'number_of_openings' => 'required|integer|min:1',
                'job_type' => 'required|in:Full-time,Part-time',
                'start_availability' => 'required|in:Immediately,Later',
                'company_country' => 'required|array',
                'company_country.*' => 'in:Germany,Switzerland,Luxembourg,Austria,Belgium',
                'address' => 'required|string',
                'zip_code' => 'required|string',
                'required_degrees' => 'required|string',
                'languages' => 'required|array',
                'languages.*' => 'in:German,French,Italian,English,Luxembourgian,Dutch',
                'language_proficiency' => 'required|array',
                'language_proficiency.*' => 'in:A1,A2,B1,B2,C1,C2',
                'job_description' => 'required|string',
                'contact_method' => 'required|in:Email Address,Whatsapp',
                'contact_consent' => 'required|accepted',
                'privacy_consent' => 'required|accepted',
            ]);

            // Log validated data
            Log::info('Validated employer data:', $validatedData);

            // Process boolean fields
            $validatedData['is_registered_in_europe'] = $validatedData['is_registered_in_europe'] === 'yes';
            $validatedData['contact_consent'] = $request->has('contact_consent');
            $validatedData['privacy_consent'] = $request->has('privacy_consent');

            // Convert arrays to JSON
            $validatedData['company_country'] = json_encode($request->company_country);
            $validatedData['required_languages'] = json_encode($request->required_languages);
            $validatedData['language_proficiency'] = json_encode($request->language_proficiency);

            // Use DB transaction
            DB::beginTransaction();

            try {
                // Create the record
                $other_proffession_employers = OtherProffessionEmployer::create($validatedData);

                // Log success
                Log::info('Employer record created successfully:', ['id' => $other_proffession_employers->id]);

                DB::commit();

                return redirect()
                    ->back()
                    ->with('success', 'Employer registration submitted successfully!');

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Database error during employer registration:', ['error' => $e->getMessage()]);
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Employer form submission error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->withErrors(['error' => 'There was an error submitting your employer form: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
