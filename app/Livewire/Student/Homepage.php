<?php

namespace App\Livewire\Student;

use App\Models\Company;
use Livewire\Component;
use Livewire\Attributes\Url;

class Homepage extends Component
{
    #[Url(as: 'q')]
    public $search = '';

    public function searchCompany()
    {

    }
    public function render()
    {
        $companies = Company::withCount('jobs')->withAvg('reviews','rating')->where('location','LIKE','%'.$this->search.'%')->where('status',1)->get();

        return view('livewire.student.homepage',compact('companies'));
    }
}
