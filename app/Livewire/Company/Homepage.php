<?php

namespace App\Livewire\Company;

use App\Models\Job;
use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class Homepage extends Component
{
    public function render()
    {
        $jobs = Job::where('company_id',Auth::guard('company')->id())->get()->count();
        $applicant = Application::where('company_id',Auth::guard('company')->id())->get()->count();
        return view('livewire.company.homepage',compact('jobs','applicant'));
    }
}
