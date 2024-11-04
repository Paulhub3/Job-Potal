<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherMedicalJob;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OtherMedicalJobController extends Controller
{
    public function index()
    {
        return view('other.other-medical-job');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'primary_specialty' => 'required|string',
            'secondary_specialty' => 'nullable|string',
            'phone_number' => 'required|string',
            'gender' => 'required|in:Male,Female,Non-disclosure',
            'eu_license' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'country_of_origin' => 'required|string',
            'present_country' => 'required|in:Israel,Canada',
            'preferred_countries' => 'required|array',
            'preferred_countries.*' => 'in:Germany,Switzerland,Luxembourg,Austria,Belgium',
            'start_availability' => 'required|in:Immediately,Later',
            'address' => 'required|string',
            'zip_code' => 'required|string',
            'languages' => 'required|array',
            'languages.*' => 'in:German,French,Italian,English,Luxembourgian,Dutch',
            'job_type' => 'required|in:Full-time,Part-time',
            'contact_method' => 'required|in:Email Address,Whatsapp',
            'additional_info' => 'nullable|string',
            'contact_consent' => 'required|accepted',
            'privacy_consent' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle CV upload
            $cvPath = $request->file('cv')->store('cvs', 'public');

            // Create registration record
            $otherMedicalJob= OtherMedicalJob::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'primary_specialty' => $request->primary_specialty,
                'secondary_specialty' => $request->secondary_specialty,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'eu_license' => $request->eu_license,
                'cv_path' => $cvPath,
                'country_of_origin' => $request->country_of_origin,
                'present_country' => $request->present_country,
                'preferred_countries' => $request->preferred_countries,
                'start_availability' => $request->start_availability,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'languages' => $request->languages,
                'language_proficiency' => $request->language_proficiency,
                'job_type' => $request->job_type,
                'contact_method' => $request->contact_method,
                'additional_info' => $request->additional_info,
                'contact_consent' => $request->has('contact_consent'),
                'privacy_consent' => $request->has('privacy_consent'),
            ]);

            return redirect()
                ->back()
                ->with('success', 'Registration submitted successfully!');

        } catch (\Exception $e) {
            // Delete uploaded file if registration fails
            if (isset($cvPath)) {
                Storage::disk('public')->delete($cvPath);
            }

            return back()
                ->with('error', 'An error occurred while submitting your registration. Please try again.')
                ->withInput();
        }
    }
}
