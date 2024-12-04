<?php

namespace App\Http\Controllers\Users;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OtherProffessionEmployer;

class OtherProffessionEmployersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = OtherProffessionEmployer::query();

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where(function($q) use ($searchTerm) {
                    $q->where('company_name', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('industry', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('email', 'LIKE', '%'.$searchTerm.'%')
                      ->orWhere('phone_number', 'LIKE', '%'.$searchTerm.'%');
                });
            }

            $employers = $query->latest()->paginate(10);
            $totalEmployers = OtherProffessionEmployer::count();

            if ($request->ajax()) {
                return view('components.other-proffession-employer-table', [
                    'employers' => $employers,
                    'totalEmployers' => $totalEmployers
                ])->render();
            }

            return view('user.other-proffession-employer', [
                'employers' => $employers,
                'totalEmployers' => $totalEmployers
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
            $employers = OtherProffessionEmployer::findOrFail($id);
            $employers->delete();

            return redirect()->route('other-proffession-employer.index')
                ->with('success', 'Application deleted successfully');

        } catch (\Exception $e) {
            return redirect()->route('other-proffession-employer.index')
                ->with('error', 'Failed to delete application');
        }
    }
}
