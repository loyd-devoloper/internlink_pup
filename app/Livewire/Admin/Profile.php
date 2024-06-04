<?php

namespace App\Livewire\Admin;

use App\Models\User;
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
            'firstname'=>Auth::guard('web')->user()->firstname,
            'lastname'=>Auth::guard('web')->user()->lastname,
            'email'=>Auth::guard('web')->user()->email,
            'mobile_number'=>Auth::guard('web')->user()->mobile_number,



        ]);
    }
    public function form(Form $form): Form
    {

        return $form
            ->schema([

                Grid::make([
                    'default' => 2
                ])->schema([
                    TextInput::make('firstname')->required(),
                    TextInput::make('lastname')->required(),

                ]),
                Grid::make([
                    'default' => 2
                ])->schema([
                    TextInput::make('email')->required(),
                    TextInput::make('mobile_number')->required(),
                ]),

                TextInput::make('company_passwords')->label('Company Password')->password()->revealable(),


            ])
            ->statePath('data');
    }

    public function updateInfo()
    {
        $record = User::where('id',Auth::guard('web')->id())->first();
        $record->update([
            'firstname' => $this->data['firstname'],
            'lastname' => $this->data['lastname'],
            'email' => $this->data['email'],
            'mobile_number' => $this->data['mobile_number'],



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
        return view('livewire.admin.profile');
    }
}
