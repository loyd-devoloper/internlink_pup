<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class Resume extends Component implements HasForms
{
    use InteractsWithForms;
    public $data = [];
    public function mount()
    {
        $this->data['student_id'] = Auth::guard('student')->id();
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('x')
                    ->heading('Online Resume Builder')
                    ->schema([
                        Grid::make([
                            'default' => 3
                        ])->schema([
                            TextInput::make('firstname')
                                ->required(),
                            TextInput::make('middlename')
                                ->required(),
                            TextInput::make('lastname')
                                ->required(),
                        ]),
                        FileUpload::make('profile')->required(),
                        Grid::make([
                            'default' => 3
                        ])->schema([
                            TextInput::make('linkedin')->url(),
                            TextInput::make('github')->url(),
                            TextInput::make('facebook')->url(),
                        ]),
                        Grid::make([
                            'default' => 3
                        ])->schema([
                            TextInput::make('mobile_phone')->required(),
                            TextInput::make('course')->required(),
                            TextInput::make('student_number')->required(),
                        ]),
                        TextInput::make('address')->required(),
                        TextInput::make('about_me')->label('About Me')->required(),
                        Fieldset::make('Elementary School')->schema([
                            Grid::make([
                                'default' => 3
                            ])->schema([
                                TextInput::make('e_school_name')->label('School Name')->required(),
                                TextInput::make('e_start')->label(' Elementary Start Date')->type('month')->required(),
                                TextInput::make('e_end')->label('Elementary End Date')->type('month')->required(),
                            ])
                        ]),
                        Fieldset::make('Junior School')->schema([
                            Grid::make([
                                'default' => 3
                            ])->schema([
                                TextInput::make('j_school_name')->label('School Name')->required(),
                                TextInput::make('j_start')->label(' Junior Start Date')->type('month')->required(),
                                TextInput::make('j_end')->label('Junior End Date')->type('month')->required(),
                            ])
                        ]),
                        Fieldset::make('Senior School')->schema([
                            Grid::make([
                                'default' => 3
                            ])->schema([
                                TextInput::make('s_school_name')->label('School Name')->required(),
                                TextInput::make('s_start')->label(' Senior Start Date')->type('month')->required(),
                                TextInput::make('s_end')->label('Senior End Date')->type('month')->required(),
                            ])
                        ]),
                        Fieldset::make('College')->schema([
                            Grid::make([
                                'default' => 2
                            ])->schema([
                                TextInput::make('c_school_name')->label('School Name')->required(),
                                TextInput::make('c_start')->label(' College Start Date')->type('month')->required(),

                            ])
                        ]),
                        Fieldset::make('CERTIFICATION')->schema([
                            Grid::make([
                                'default' => 1
                            ])->schema([
                                TextInput::make('certificate_name1')->label('Certificate Name 1'),
                                TextInput::make('certificate_name2')->label('Certificate Name 2'),
                                TextInput::make('certificate_name3')->label('Certificate Name 3'),
                                TextInput::make('certificate_name4')->label('Certificate Name 4'),
                                TextInput::make('certificate_name5')->label('Certificate Name 5'),

                            ])
                        ]),
                        Fieldset::make('Programming Skills')->schema([
                            Grid::make([
                                'default' => 2
                            ])->schema([
                                Select::make('pskill1')->label('Skill 1')
                                    ->options([
                                        'Python' => 'Python',
                                        'Java' => 'Java',
                                        'JavaScript' => 'JavaScript',
                                        'C++' => 'C++',
                                        'C#' => 'C#',
                                        'Ruby' => 'Ruby',
                                        'PHP' => 'PHP',
                                        'Swift' => 'Swift',
                                        'Kotlin' => 'Kotlin',
                                        'Go' => 'Go',
                                        'TypeScript' => 'TypeScript',
                                        'HTML' => 'HTML',
                                        'CSS' => 'CSS',
                                        'React.js' => 'React.js',
                                        'Angular' => 'Angular',
                                        'Vue.js' => 'Vue.js',
                                        'Node.js' => 'Node.js',
                                        'Express.js' => 'Express.js',
                                        'Django' => 'Django',
                                        'Flask' => 'Flask',
                                        'Bootstrap' => 'Bootstrap',
                                    ]),
                                TextInput::make('prating1')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('pskill2')->label('Skill 2')
                                    ->options([
                                        'Python' => 'Python',
                                        'Java' => 'Java',
                                        'JavaScript' => 'JavaScript',
                                        'C++' => 'C++',
                                        'C#' => 'C#',
                                        'Ruby' => 'Ruby',
                                        'PHP' => 'PHP',
                                        'Swift' => 'Swift',
                                        'Kotlin' => 'Kotlin',
                                        'Go' => 'Go',
                                        'TypeScript' => 'TypeScript',
                                        'HTML' => 'HTML',
                                        'CSS' => 'CSS',
                                        'React.js' => 'React.js',
                                        'Angular' => 'Angular',
                                        'Vue.js' => 'Vue.js',
                                        'Node.js' => 'Node.js',
                                        'Express.js' => 'Express.js',
                                        'Django' => 'Django',
                                        'Flask' => 'Flask',
                                        'Bootstrap' => 'Bootstrap',
                                    ])
                                    ,
                                TextInput::make('prating2')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('pskill3')->label('Skill 3')
                                    ->options([
                                        'Python' => 'Python',
                                        'Java' => 'Java',
                                        'JavaScript' => 'JavaScript',
                                        'C++' => 'C++',
                                        'C#' => 'C#',
                                        'Ruby' => 'Ruby',
                                        'PHP' => 'PHP',
                                        'Swift' => 'Swift',
                                        'Kotlin' => 'Kotlin',
                                        'Go' => 'Go',
                                        'TypeScript' => 'TypeScript',
                                        'HTML' => 'HTML',
                                        'CSS' => 'CSS',
                                        'React.js' => 'React.js',
                                        'Angular' => 'Angular',
                                        'Vue.js' => 'Vue.js',
                                        'Node.js' => 'Node.js',
                                        'Express.js' => 'Express.js',
                                        'Django' => 'Django',
                                        'Flask' => 'Flask',
                                        'Bootstrap' => 'Bootstrap',
                                    ])
                                    ,
                                TextInput::make('prating3')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('pskill4')->label('Skill 4')
                                    ->options([
                                        'Python' => 'Python',
                                        'Java' => 'Java',
                                        'JavaScript' => 'JavaScript',
                                        'C++' => 'C++',
                                        'C#' => 'C#',
                                        'Ruby' => 'Ruby',
                                        'PHP' => 'PHP',
                                        'Swift' => 'Swift',
                                        'Kotlin' => 'Kotlin',
                                        'Go' => 'Go',
                                        'TypeScript' => 'TypeScript',
                                        'HTML' => 'HTML',
                                        'CSS' => 'CSS',
                                        'React.js' => 'React.js',
                                        'Angular' => 'Angular',
                                        'Vue.js' => 'Vue.js',
                                        'Node.js' => 'Node.js',
                                        'Express.js' => 'Express.js',
                                        'Django' => 'Django',
                                        'Flask' => 'Flask',
                                        'Bootstrap' => 'Bootstrap',
                                    ])
                                    ,
                                TextInput::make('prating4')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('pskill5')->label('Skill 5')
                                    ->options([
                                        'Python' => 'Python',
                                        'Java' => 'Java',
                                        'JavaScript' => 'JavaScript',
                                        'C++' => 'C++',
                                        'C#' => 'C#',
                                        'Ruby' => 'Ruby',
                                        'PHP' => 'PHP',
                                        'Swift' => 'Swift',
                                        'Kotlin' => 'Kotlin',
                                        'Go' => 'Go',
                                        'TypeScript' => 'TypeScript',
                                        'HTML' => 'HTML',
                                        'CSS' => 'CSS',
                                        'React.js' => 'React.js',
                                        'Angular' => 'Angular',
                                        'Vue.js' => 'Vue.js',
                                        'Node.js' => 'Node.js',
                                        'Express.js' => 'Express.js',
                                        'Django' => 'Django',
                                        'Flask' => 'Flask',
                                        'Bootstrap' => 'Bootstrap',
                                    ])
                                    ,
                                TextInput::make('prating5')->label('Rating (%)')->numeric()->maxValue(100),

                            ])
                        ]),
                        Fieldset::make('Hardware Skills')->schema([
                            Grid::make([
                                'default' => 2
                            ])->schema([
                                Select::make('hskill1')->label('Skill 1')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ,
                                TextInput::make('hrating1')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('hskill2')->label('Skill 2')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ,
                                TextInput::make('hrating2')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('hskill3')->label('Skill 3')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ,
                                TextInput::make('hrating3')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('hskill4')->label('Skill 4')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ,
                                TextInput::make('hrating4')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('hskill5')->label('Skill 5')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ,
                                TextInput::make('hrating5')->label('Rating (%)')->numeric()->maxValue(100),

                            ])
                        ]),
                        Fieldset::make('Software Skills')->schema([
                            Grid::make([
                                'default' => 2
                            ])->schema([
                                Select::make('sskill1')->label('Skill 1')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ,
                                TextInput::make('srating1')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('sskill2')->label('Skill 2')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ,
                                TextInput::make('srating2')->label('Rating (%)')->numeric()->maxValue(100),
                                Select::make('sskill3')->label('Skill 3')
                                    ->options([
                                        'Computer Assembly and Disassembly' => 'Computer Assembly and Disassembly',
                                        'Troubleshooting Hardware Issues' => 'Troubleshooting Hardware Issues',
                                        'Knowledge of Computer Architecture' => 'Knowledge of Computer Architecture',
                                        'Networking' => 'Networking',
                                        'Electronics and Circuit Design' => 'Electronics and Circuit Design',
                                        'Component Level Repair' => 'Component Level Repair',
                                        'System Administration' => 'System Administration',
                                        'Hardware Maintenance' => 'Hardware Maintenance',
                                        'Peripheral Setup and Configuration' => 'Peripheral Setup and Configuration',
                                        'Hardware Testing and Diagnostics' => 'Hardware Testing and Diagnostics',
                                    ])
                                    ->required(),
                                TextInput::make('srating3')->label('Rating (%)')->numeric()->maxValue(100),

                            ])
                        ]),


                    ])->columnSpanFull()

                // ...
            ])
            ->statePath('data');
    }

    public function store()
    {
        $this->validate();
        $this->data['profile'] = $this->form->getState()['profile'];
        \App\Models\Resume::create($this->data);
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
      // \App\Models\Resume::create([
        //     'firstname' => 'John',
        //     'middlename' => 'Doe',
        //     'lastname' => 'Smith',
        //     'profile' => 'profile.jpg',
        //     'linkedin' => 'https://www.linkedin.com/in/johnsmith',
        //     'github' => 'https://github.com/johnsmith',
        //     'facebook' => 'https://www.facebook.com/johnsmith',
        //     'mobile_phone' => '123-456-7890',
        //     'course' => 'Computer Science',
        //     'student_number' => '123456',
        //     'e_school_name' => 'Elementary School',
        //     'e_start' => '2010-09-01',
        //     'e_end' => '2015-06-01',
        //     'j_school_name' => 'Junior School',
        //     'j_start' => '2015-09-01',
        //     'j_end' => '2018-06-01',
        //     's_school_name' => 'Senior School',
        //     's_start' => '2018-09-01',
        //     's_end' => '2021-06-01',
        //     'c_school_name' => 'College',
        //     'c_start' => '2021-09-01',
        //     'pskill1' => 'Python',
        //     'prating1' => 80,
        //     'pskill2' => 'JavaScript',
        //     'prating2' => 90,
        //     'pskill3' => 'HTML/CSS',
        //     'prating3' => 95,
        //     'pskill4' => 'React.js',
        //     'prating4' => 85,
        //     'pskill5' => 'Node.js',
        //     'prating5' => 90,
        //     'hskill1' => 'Computer Assembly and Disassembly',
        //     'hrating1' => 90,
        //     'hskill2' => 'Troubleshooting Hardware Issues',
        //     'hrating2' => 85,
        //     'hskill3' => 'Knowledge of Computer Architecture',
        //     'hrating3' => 95,
        //     'hskill4' => 'Networking',
        //     'hrating4' => 90,
        //     'hskill5' => 'Electronics and Circuit Design',
        //     'hrating5' => 85,
        //     'sskill1' => 'Software Skill 1',
        //     'srating1' => 90,
        //     'sskill2' => 'Software Skill 2',
        //     'srating2' => 85,
        //     'sskill3' => 'Software Skill 3',
        //     'srating3' => 95,
        //      ]);

    }

    public function resetResume()
    {
        \App\Models\Resume::with('studentInfo')->where('student_id',Auth::guard('student')->id())->delete();
    }
    public function render()
    {
        $check = \App\Models\Resume::where('student_id',Auth::guard('student')->id())->first();

        return view('livewire.student.resume',compact('check'));
    }
}
