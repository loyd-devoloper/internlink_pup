<?php

namespace App\Livewire\Student;

use Filament\Forms\Get;
use Livewire\Component;
use App\Models\Bookmark;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\Application as ModelsApplication;

class Application extends Component implements HasForms
{
    use InteractsWithForms;
    public $id;
    public $company_id;
    public $data = [];
    public function mount($id,$company_id)
    {
        $this->id = $id;
        $this->company_id = $company_id;

        $this->form->fill([
            'fullname'=>Auth::guard('student')->user()->firstname.' '.Auth::guard('student')->user()->lastname,
            'email'=>Auth::guard('student')->user()->email,
            'contact_number'=>Auth::guard('student')->user()->mobile_number,
        ]);
    }

    public function form(Form $form): Form
    {
        $check = \App\Models\Resume::where('student_id',Auth::guard('student')->id())->first();
        if($check)
        {
            $value = [
                0 => 'Use Resume Builder',
                1 => 'Upload Resume',
             ];
        }else{
            $value = [

                1 => 'Upload Resume',
             ];
        }

        return $form
            ->schema([
                Grid::make([
                    'default' => 3
                ])->schema([
                    TextInput::make('fullname')
                        ->required(),
                    TextInput::make('email')
                        ->label('Email Address')
                        ->type('email')
                        ->required(),
                        TextInput::make('contact_number')
                        ->label('Mobile Number')

                        ->required()->tel(),

                ]),
                Select::make('resume_type')
                ->options($value)->default(1)->live(),
                Grid::make([
                    'default' => 2
                ])->schema([

                    FileUpload::make('resume')->required()->hidden(fn(Get $get):bool => $get('resume_type') == '0' ? true : false  ),
                    FileUpload::make('endorsement_letter')->required(),
                    FileUpload::make('internship_agreement')->required(),
                    FileUpload::make('insurance')->required(),
                ])


            ])
            ->statePath('data');
    }

    public function submitApplication()
    {



       if($this->data['resume_type'] == '0')
       {

        $resume = '';
       }else{

        $resume = $this->form->getState()['resume'];
       }

        ModelsApplication::create([
            'student_id' => Auth::guard('student')->id(),
            'job_id' => $this->id,
            'company_id' => $this->company_id,
            'fullname' => $this->data['fullname'],
            'email' => $this->data['email'],
            'contact_number' => $this->data['contact_number'],
            'resume' => $resume ,
            'resume_type' => $this->data['resume_type'],
            'endorsement_letter' =>  $this->form->getState()['endorsement_letter'],
            'internship_agreement' =>$this->form->getState()['internship_agreement'],
            'insurance' =>$this->form->getState()['insurance'],
        ]);

  Notification::make()
  ->title('Submited successfully')
  ->success()
  ->send();
    }
    public function render()
    {
        $job = \App\Models\Job::with('company')->where('id', $this->id)->first();

        return view('livewire.student.application', compact('job'));
    }
}
