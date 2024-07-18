<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Company;

use function App\Helpers\LocalTime;

class CompanyTable extends DataTableComponent
{
    protected $model = Company::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true)
                ->sortable(),
            Column::make("Bussines field id", "bussinesField.name")
                ->sortable(),
            Column::make("Timezone", "timezone")
                ->collapseAlways()
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Company name", "company_name")
                ->hideIf(true)
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Phone number", "phone_number")
                ->sortable(),
            Column::make("Logo image", "logo_image")
                ->hideIf(true)
                ->sortable(),
            Column::make("Address", "address")
                ->collapseAlways()
                ->sortable(),
            Column::make("Website", "website")
                ->collapseAlways()
                ->sortable(),
            Column::make("Province", "province")
                ->collapseAlways()
                ->sortable(),
            Column::make("City", "city")
                ->collapseAlways()
                ->sortable(),
            Column::make("District", "district")
                ->collapseAlways()
                ->sortable(),
            Column::make("Village", "village")
                ->collapseAlways()
                ->sortable(),
            Column::make("Postal code", "postal_code")
                ->collapseAlways()
                ->sortable(),
            Column::make("Time zone", "time_zone")
                ->collapseAlways()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->collapseAlways()
                ->format(fn ($value) => LocalTime($value))
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->hideIf(true)
                ->sortable(),
            Column::make('Aksi')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatable-action-column')->with(
                        [
                            'detail'   => route("users.edit", $row->id),
                            'edit'   => route("users.edit", $row->id),
                        ]
                    )
                )->html(),
        ];
    }
}
