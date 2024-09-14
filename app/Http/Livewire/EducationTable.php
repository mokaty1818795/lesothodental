<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
class EducationTable extends LivewireTableComponent
{
    public $buttonComponent = 'education.components.add-button';
    public function render()
    {
        return view('livewire.education-table');
    }
}
