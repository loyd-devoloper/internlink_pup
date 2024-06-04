<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\Student;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        $company = Company::get()->count();
        $student = Student::get()->count();
        return view('livewire.admin.homepage',compact('company','student'));
    }
}
