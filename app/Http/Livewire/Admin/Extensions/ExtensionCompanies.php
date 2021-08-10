<?php

namespace App\Http\Livewire\Admin\Extensions;

use App\Models\Extension;
use DB;
use Livewire\Component;

class ExtensionCompanies extends Component
{
    public $extension;

    public function mount()
    {
        $this->extension = Extension::where('id', request()->id)
                            ->with([
                                'plans.companies.user',
                                'companies' => function ($query) {
                                        $query->whereNotExists(function ($query) {
                                            $query->select(DB::raw('plan_id'))
                                                ->from('extension_plan')
                                                ->whereRaw("extension_plan.extension_id =".request()->id)
                                                ->whereRaw('extension_plan.plan_id = companies.plan_id');
                                        })->with('user');
                                    },
                                ])
                            ->first();
    }

    public function render()
    {
        return view('livewire.admin.extensions.extension-companies');
    }
}
