<?php

namespace App\Livewire\Student;

use App\Models\Review;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class Company extends Component
{

    public $id;
    #[Url(as: 'ctgy')]
    public $category = '';
    #[Url(as: 'loc')]
    public $location = '';
    public $rating = 0;
    public $modalRating = false;
    public function mount($company,$id)
    {
        $this->id = $id;
        $check = Review::where('student_id',Auth::guard('student')->id())->where('company_id',$this->id)->first();
        if($check)
        {
            $this->rating = $check->rating;
        }
    }
    public function searchCompany()
    {

    }

    public function changeRating($i)
    {
        $this->rating = $i;
        $check = Review::where('student_id',Auth::guard('student')->id())->where('company_id',$this->id)->first();
        if($check)
        {
            $check->update([
                'rating'=>$i
            ]);
        }else{
            Review::create([
                'student_id'=>Auth::guard('student')->id(),
                'company_id'=>$this->id,
                'rating'=>$i,
            ]);
        }
        sleep(1);
        $this->modalRating = false;
    }

    public function openModal()
    {
        $this->modalRating = true;
    }
    public function render()
    {
        $company = \App\Models\Company::query()->where('id',$this->id)->first();
        $jobs = \App\Models\Job::where('company_id',$this->id)->where('category','LIKE','%'.$this->category.'%')->where('location','LIKE','%'.$this->location.'%')->get();
        return view('livewire.student.company',compact('company','jobs'));
    }
}
