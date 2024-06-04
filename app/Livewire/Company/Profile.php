<?php

namespace App\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Component implements HasForms
{

    use InteractsWithForms;
    public $data = [];
    public function mount()
    {
        $this->form->fill([
            'company_name'=>Auth::guard('company')->user()->company_name,
            'company_email'=>Auth::guard('company')->user()->company_email,
            'company_contact_number'=>Auth::guard('company')->user()->company_contact_number,
            'company_employer_name'=>Auth::guard('company')->user()->company_employer_name,
            'location'=>Auth::guard('company')->user()->location,
            'company_profile'=>Auth::guard('company')->user()->company_profile,
            'company_description'=>Auth::guard('company')->user()->company_description,

        ]);
    }
    public function form(Form $form): Form
    {

        return $form
            ->schema([
                TextInput::make('company_name')->required(),
                Grid::make([
                    'default' => 2
                ])->schema([
                    TextInput::make('company_email')->required(),
                    TextInput::make('company_contact_number')->required(),
                ]),
                Grid::make([
                    'default' => 2
                ])->schema([
                    TextInput::make('company_employer_name')->required(),
                    Select::make('location')->options([  'Manila' => 'Manila',
                    'Quezon City' => 'Quezon City',
                    'Caloocan' => 'Caloocan',
                    'Las Piñas' => 'Las Piñas',
                    'Makati' => 'Makati',
                    'Malabon' => 'Malabon',
                    'Mandaluyong' => 'Mandaluyong',
                    'Marikina' => 'Marikina',
                    'Muntinlupa' => 'Muntinlupa',
                    'Navotas' => 'Navotas',
                    'Parañaque' => 'Parañaque',
                    'Pasay' => 'Pasay',
                    'Pasig' => 'Pasig',
                    'Pateros' => 'Pateros',
                    'San Juan' => 'San Juan',
                    'Taguig' => 'Taguig',
                    'Valenzuela' => 'Valenzuela',])->required(),
                ]),

                Grid::make([
                    'default' => 1
                ])->schema([
                    FileUpload::make('company_profile')->directory('/company/profile')->required(),

                ]),

                RichEditor::make('company_description')
                    ->disableToolbarButtons([
                        'blockquote',
                        'attachFiles',
                    ])->required(),

                TextInput::make('company_passwords')->label('Company Password')->password()->revealable(),


            ])
            ->statePath('data');
    }

    public function updateInfo()
    {
        $record = Company::where('id',Auth::guard('company')->id())->first();
        $record->update([
            'company_name' => $this->data['company_name'],
            'company_email' => $this->data['company_email'],
            'company_contact_number' => $this->data['company_contact_number'],
            'company_employer_name' => $this->data['company_employer_name'],
            'location' => $this->data['location'],

            'company_profile' => $this->form->getState()['company_profile'],

            'company_description' => $this->data['company_description'],


        ]);
        if (!!$this->data['company_passwords']) {
            $record->update([
                'password' => Hash::make($this->data['company_passwords']),
            ]);
        }
        Notification::make()
            ->title('Updated successfully')
            ->success()
            ->send();
    }
    public function render()
    {
        return view('livewire.company.profile');
    }
}
