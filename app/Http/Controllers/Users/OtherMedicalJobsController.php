<?php

namespace App\Http\Controllers\Users;

use Exception;
use Illuminate\Http\Request;
use App\Models\OtherMedicalJob;
use App\Http\Controllers\Controller;

class OtherMedicalJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = OtherMedicalJob::query();

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('last_name', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('email', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('phone_number', 'LIKE', '%'.$searchTerm.'%');
                });
            }

            $applications = $query->latest()->paginate(10);
            $totalApplications = OtherMedicalJob::count();

            if ($request->ajax()) {
                return view('components.other-medical-job-table', [
                    'applications' => $applications,
                    'totalApplications' => $totalApplications
                ])->render();
            }

            return view('user.other-medical-job', [
                'applications' => $applications,
                'totalApplications' => $totalApplications
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching applications: ' . $e->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $application = OtherMedicalJob::findOrFail($id);
            $application->delete();

            return redirect()->route('nurse-application-data.index')
                ->with('success', 'Application deleted successfully');

        } catch (\Exception $e) {
            return redirect()->route('nurse-application-data.index')
                ->with('error', 'Failed to delete application');
        }
    }
}
