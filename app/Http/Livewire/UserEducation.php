<?php

namespace App\Http\Livewire;

use App\Models\Education;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserEducation extends LivewireTableComponent
{
    protected $model = Education::class;

    public $showButtonOnHeader = true;
    public $buttonComponent = 'education.components.add-button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setQueryStringStatus(false);
        $this->setThAttributes(function (Column $column) {
            if ($column->getField() == 'id') {
                return [
                    'style' => 'width:9%;text-align:center',
                ];
            }

            return [];
        });

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->getField() === 'first_name') {
                return [
                    'class' => 'w-75',
                ];
            }

            return [];
        });

    }

    public function builder(): Builder
    {
        return Education::query()->where('user_id', '=', Auth::id());
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Institute", "institude")
                ->sortable()
                ->searchable(),

            Column::make("Course", "course")
                ->sortable()
                ->searchable(),

            Column::make("Attended from", "attended_from")
                ->sortable()
                ->searchable(),

            Column::make("Attended to", "attended_to")
                ->sortable()
                ->searchable(),

            Column::make("Degree date", "degree_date")
                ->sortable()
                ->searchable(),

            Column::make("Specialization", "specialization")
                ->sortable()
                ->searchable(),

            Column::make("Telephone", "telephone")
                ->sortable()
                ->searchable(),

            Column::make("Fax", "fax")
                ->sortable()
                ->searchable(),

            Column::make("Certificate", "certificate")
                ->format(function ($value, $row) {
                    if ($row->certificate) {
                        return '<a href="' . asset($row->certificate) . '" target="_blank">View</a>';
                    }
                    return 'No Certificate';
                })
                ->html() // Make sure the HTML is rendered
                ->sortable()
                ->searchable(),

            Column::make("Created at", "created_at")
                ->format(function ($value, $row) {
                    return $row->created_at->format('Y-m-d'); // Format as date
                })
                ->sortable()
                ->searchable(),

            Column::make("Updated at", "updated_at")
                ->format(function ($value, $row) {
                    return $row->updated_at->format('Y-m-d'); // Format as date
                })
                ->sortable()
                ->searchable(),

            Column::make(__('messages.common.action'), 'id')
                ->format(function ($value, $row, Column $column) {
                    return view('livewire.action-button')->with([
                        'editRoute' => route('client.education.edit', $row->id),
                        'dataId' => $row->id,
                        'row' => $row,
                        'editClass' => 'user-edit-btn',
                        'deleteClass' => 'user-delete-btn',
                        // 'isDefaultAdmin' => $row->is_default_admin,
                    ]);
                }),
        ];
    }

}
