<?php

namespace App\Http\Controllers\Users;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\OtherMedicalJob;
use App\Models\NurseApplcationData;
use App\Http\Controllers\Controller;
use App\Models\OtherProffessionEmployee;
use App\Models\OtherProffessionEmployer;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalNurseApplcations = NurseApplcationData::count();
        $totalMedicalEmployers = Employer::count();
        $totalOtherMedicalJob = OtherMedicalJob::count();
        $totalOtherProffessionEmployee = OtherProffessionEmployee::count();
        $totalOtherProffessionEmployer = OtherProffessionEmployer::count();
        return view('user.dashboard' , compact('totalNurseApplcations', 'totalMedicalEmployers', 'totalOtherMedicalJob', 'totalOtherProffessionEmployee', 'totalOtherProffessionEmployer'));
    }
}
