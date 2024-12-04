<?php

namespace App\Http\Controllers\Users;

use Exception;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalEmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {
            $query = Employer::query();

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where(function($q) use ($searchTerm) {
                    $q->where('company_name', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('phone_number', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('job_description', 'LIKE', '%'.$searchTerm.'%');
                });
            }

            $employers = $query->latest()->paginate(10);
            $totalEmployers = Employer::count();

            if ($request->ajax()) {
                return view('components.medical-employer-table', [
                    'employers' => $employers,
                    'totalApplications' => $totalEmployers
                ])->render();
            }

            return view('user.medical-employer', [
                'employers' => $employers,
                'totalEmployers' => $totalEmployers
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching applications: ' . $e->getMessage());
        }

        return view('user.medical-employer', compact('employers', 'totalEmployers'));
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
            $employers = Employer::findOrFail($id);
            $employers->delete();

            return redirect()->route('medical-employer.index')
                ->with('success', 'Request for worker deleted successfully');

        } catch (\Exception $e) {
            return redirect()->route('medical-employer.index')
                ->with('error', 'Failed to delete Request');
        }
    }
}
