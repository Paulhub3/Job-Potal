<?php

namespace App\Http\Controllers;

use App\Models\OtherMedicalJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class OtherMedicalJobController extends Controller
{
    public function index()
    {
        return view('other.other-medical-job');
    }

    public function store(Request $request)
    {
        try {
            // Log the incoming request data
            Log::info('Form submission data:', $request->all());

            // Validate the data
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:other_medical_jobs,email',
                'primary_specialty' => 'required|string',
                'secondary_specialty' => 'nullable|string',
                'phone_number' => 'required|string',
                'gender' => 'required|in:Male,Female,Non-disclosure',
                'eu_license' => 'required|string',
                'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
                'country_of_origin' => 'required|string',
                'present_country' => 'required',
                'preferred_countries' => 'required|array',
                'preferred_countries.*' => 'in:Germany,Switzerland,Luxembourg,Austria,Belgium',
                'start_availability' => 'required|in:Immediately,Later',
                'address' => 'required|string',
                'zip_code' => 'required|string',
                'languages' => 'required|array',
                'languages.*' => 'in:German,French,Italian,English,Luxembourgian,Dutch',
                'language_proficiency' => 'required|array',
                'language_proficiency.*' => 'in:A1,A2,B1,B2,C1,C2',
                'job_type' => 'required|in:Full-time,Part-time',
                'contact_method' => 'required|in:Email Address,Whatsapp',
                'additional_info' => 'nullable|string',
                'contact_consent' => 'required|accepted',
                'privacy_consent' => 'required|accepted',
            ]);

            // Log validated data
            Log::info('Validated data:', $validatedData);

            // Handle file upload
            if ($request->hasFile('cv')) {
                $cv = $request->file('cv');
                $cvPath = $cv->store('cvs', 'public');
                $validatedData['cv_path'] = $cvPath;
            }

            // Convert arrays to JSON
            $validatedData['preferred_countries'] = json_encode($request->preferred_countries);
            $validatedData['languages'] = json_encode($request->languages);
            $validatedData['language_proficiency'] = json_encode($request->language_proficiency);

            // Convert checkboxes to boolean
            $validatedData['contact_consent'] = $request->has('contact_consent');
            $validatedData['privacy_consent'] = $request->has('privacy_consent');

            // Use DB transaction
            DB::beginTransaction();

            try {
                // Create the record
                $job = OtherMedicalJob::create($validatedData);

                // Log success
                Log::info('Record created successfully:', ['id' => $job->id]);

                DB::commit();

                return redirect()
                    ->back()
                    ->with('success', 'Registration submitted successfully!');

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Database error:', ['error' => $e->getMessage()]);
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Form submission error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->withErrors(['error' => 'There was an error submitting your form: ' . $e->getMessage()])
                ->withInput();
        }
    }
}

