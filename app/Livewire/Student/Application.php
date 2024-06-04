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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class Application extends Component implements HasForms
{
    use InteractsWithForms;
    public $id;
    public $data = [];
    public function mount($id)
    {
        $this->id = $id;
    }

    public function form(Form $form): Form
    {
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
                        ->type('email')
                        ->required(),

                ]),
                Select::make('resume_type')
                ->options([
                    '0' => 'Use Resume Builder',
                    '1' => 'Upload Resume',
                ])->default(1)->live(),
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
        $this->validate();
    }
    public function render()
    {
        $job = \App\Models\Job::with('company')->where('id', $this->id)->first();


        return view('livewire.student.application', compact('job'));
    }
}
