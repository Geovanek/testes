<?php

namespace App\Http\Livewire\Admin\Companies;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class CompaniesTable extends PowerGridComponent
{
    use ActionButton;

    public function setUp()
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showExportOption('download', ['excel', 'csv'])
            ->showSearchInput();
    }

    public function template(): ?string
    {
        return null;
    }

    public function dataSource(): ?Builder
    {
        return Company::query();
    }

    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('document_number')
            ->addColumn('company_type')
            ->addColumn('email')
            ->addColumn('phone')
            ->addColumn('whatsapp')
            ->addColumn('privacy_policy')
            ->addColumn('terms_of_use')
            ->addColumn('slug')
            ->addColumn('logo')
            ->addColumn('active')
            ->addColumn('subscription')
            ->addColumn('expires_at')
            ->addColumn('subscription_id')
            ->addColumn('subscription_active')
            ->addColumn('subscription_suspended')
            ->addColumn('created_at_formatted', function(Company $model) { 
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function(Company $model) { 
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title(__('ID'))
                ->field('id')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('NAME'))
                ->field('name')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('DOCUMENT NUMBER'))
                ->field('document_number')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('COMPANY TYPE'))
                ->field('company_type')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('EMAIL'))
                ->field('email')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('PHONE'))
                ->field('phone')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('WHATSAPP'))
                ->field('whatsapp')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('PRIVACY POLICY'))
                ->field('privacy_policy')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('TERMS OF USE'))
                ->field('terms_of_use')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('SLUG'))
                ->field('slug')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('LOGO'))
                ->field('logo')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('ACTIVE'))
                ->field('active')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('SUBSCRIPTION'))
                ->field('subscription')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('EXPIRES AT'))
                ->field('expires_at')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('SUBSCRIPTION ID'))
                ->field('subscription_id')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title(__('SUBSCRIPTION ACTIVE'))
                ->field('subscription_active')
                ->toggleable(),

            Column::add()
                ->title(__('SUBSCRIPTION SUSPENDED'))
                ->field('subscription_suspended')
                ->toggleable(),

            Column::add()
                ->title(__('CREATED AT'))
                ->field('created_at_formatted')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title(__('UPDATED AT'))
                ->field('updated_at_formatted')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('updated_at'),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable this section only when you have defined routes for these actions.
    |
    */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption(__('Edit'))
               ->class('bg-indigo-500 text-white')
               ->route('company.edit', ['company' => 'id']),

           Button::add('destroy')
               ->caption(__('Delete'))
               ->class('bg-red-500 text-white')
               ->route('company.destroy', ['company' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods
    |
    */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Company::query()->find($data['id'])->update([
                $data['field'] => $data['value']
           ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status, string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field' => __('Custom Field updated successfully!'),
            ],
            "error" => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field' => __('Error updating custom field.'),
            ]
        ];

        return ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);
    }
    */
}
