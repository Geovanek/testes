<?php

namespace App\Http\Livewire\Admin\Extensions;

use Livewire\Component;
use App\Models\Extension;
use App\Models\Company;
use App\Services\ExtensionService;

class Extensions extends Component
{
    public $extensions, $name, $price, $icon, $state_color, $active, $uuid, $companiesTotal;
    public $modalMode;

    protected $listeners = ['destroy'];

    protected $messages = [
        'price.required' => 'Preço é obrigatório',
        'active.boolean' => 'Oops! Algo esta errado.'
    ];

    public function render()
    {
        $this->extensions = Extension::with('details', 'plans.companies', 'companies')->get();
        $this->companiesTotal = Company::count();
        return view('livewire.admin.extensions.extensions');
    }

    public function store()
    {
        $validate = $this->validate([
            'name' => "required|min:3|max:255|unique:extensions,name",
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ]);

        Extension::create($validate);

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Extensão criada.'
        ]);

        $this->resetInputFields();
        $this->emit('closeModalStoreUpdate');
    }

    public function action($modalMode, $uuid = null)
    {
        if ($modalMode == 'create') {
            $this->modalMode = 'store';
        }
        if ($modalMode == 'update') {
            $extension = Extension::where('uuid',$uuid)->first();
            $this->uuid = $uuid;
            $this->name = $extension->name;
            $this->price = $extension->price;
            $this->icon = $extension->icon;
            $this->state_color = $extension->state_color;
            $this->active = $extension->active;
            $this->modalMode = 'update';
        }
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => "required|min:3|max:255|unique:extensions,name,{$this->uuid},uuid",
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ]);

        $extension = Extension::where('uuid',$this->uuid)->firstOrFail();
        $extension->update($validate);

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Extensão atualizada.'
        ]);

        $this->resetInputFields();
        $this->emit('closeModalStoreUpdate');
    }

    public function destroy($key)
    {
        $extension = Extension::where('uuid', $key)->firstOrFail();
        $extension->delete();

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Extensão deletada.'
        ]);
    }

    public function activating($uuid, $active)
    {
        $extension = Extension::where('uuid', $uuid)->firstOrFail();
        $return = app(ExtensionService::class)->activating($extension, $active);

        $this->emit('message', [
            'type' => $return['type'], 
            'message' => $return['message'],
        ]);
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->reset([
            'name', 'price', 'icon', 'state_color'
        ]);
    }

    public function showConfirmation($uuid)
    { 
        $this->dispatchBrowserEvent('swalConfirm', ['key' => $uuid]);
    }
}
