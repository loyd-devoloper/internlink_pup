<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Concerns\InteractsWithTable;

class Applications extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Application::query()->with('jobInfo','userInfo')->where('company_id',Auth::guard('company')->id())->orderBy('id','desc'))


            ->columns([
                TextColumn::make('userInfo')->label('Applicant Name')->state(function($record){
                    return $record->userInfo?->firstname.' '.$record->userInfo?->firstname;
                }),
                TextColumn::make('jobInfo.job_title')->label('Job Title'),
                TextColumn::make('jobInfo.category')->label('Job Category'),
                TextColumn::make('status')->state(function($record){
                    if($record->status == 2)
                    {
                        return 'pending';
                    }else if($record->status == 1){
                        return 'Approved';
                    }else{
                        return 'Rejected';
                    }
                })->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'Approved' => 'success',
                    'Rejected' => 'danger',
                })->badge(),


            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('Approve')->color(Color::Green)->action(function($record){
                    $record->update([
                        'status'=>1
                    ]);
                }),
                Action::make('Reject')->color(Color::Red)->action(function($record){
                    $record->update([
                        'status'=>0
                    ]);
                }),
                ActionGroup::make([
                    Action::make('viewresume')->icon('heroicon-o-eye')->label('View Resume')->modalContent(function($record){
                        $type = 1;
                        $check = \App\Models\Resume::where('student_id',$record->student_id)->first();

                        return view('livewire.company.view-file',compact('record','type','check'));
                    })->closeModalByClickingAway()->modalSubmitAction(false)->modalCancelAction(false)->modalWidth(MaxWidth::FiveExtraLarge),
                    Action::make('view')->icon('heroicon-o-eye')->label('View Endorment Letter')->modalContent(function($record){

                        $type = 2;
                        return view('livewire.company.view-file',compact('record','type'));
                    })->closeModalByClickingAway()->modalSubmitAction(false)->modalCancelAction(false)->modalWidth(MaxWidth::FiveExtraLarge),
                    Action::make('internship_agreement')->icon('heroicon-o-eye')->label('View Internship Agreement')->modalContent(function($record){

                        $type = 3;
                        return view('livewire.company.view-file',compact('record','type'));
                    })->closeModalByClickingAway()->modalSubmitAction(false)->modalCancelAction(false)->modalWidth(MaxWidth::FiveExtraLarge),
                    Action::make('insurance')->icon('heroicon-o-eye')->label('View Insurance')->modalContent(function($record){

                        $type = 4;
                        return view('livewire.company.view-file',compact('record','type'));
                    })->closeModalByClickingAway()->modalSubmitAction(false)->modalCancelAction(false)->modalWidth(MaxWidth::FiveExtraLarge)
                ])->icon('heroicon-o-eye')->color(Color::Blue)
            ])
            ->bulkActions([
                // ...
            ])->paginationPageOptions([5, 10, 20]);
    }
    public function render()
    {
        return view('livewire.company.applications');
    }
}
