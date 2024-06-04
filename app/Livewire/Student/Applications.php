<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Applications extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Application::query()->with('jobInfo', 'companyInfo')->where('student_id', Auth::guard('student')->id())->orderBy('id', 'desc'))


            ->columns([

                TextColumn::make('jobInfo.job_title')->label('Job Title')->url(fn ($record) => route('student.job', ['id' => $record->job_id, 'job' => $record->companyInfo?->company_name])),
                TextColumn::make('jobInfo.category')->label('Job Category'),
                TextColumn::make('status')->state(function ($record) {
                    if ($record->status == 2) {
                        return 'pending';
                    } else if ($record->status == 1) {
                        return 'Approved';
                    } else {
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
                ])->color(Color::Blue)
            ])
            ->bulkActions([
                // ...
            ])->paginationPageOptions([5, 10, 20]);
    }
    public function render()
    {
        return view('livewire.student.applications');
    }
}
