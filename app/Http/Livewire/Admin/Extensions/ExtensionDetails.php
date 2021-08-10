<?php

namespace App\Http\Livewire\Admin\Extensions;

use Livewire\Component;
use App\Models\Extension;
use App\Models\ExtensionDetail;

class ExtensionDetails extends Component
{
    public $extension, $details, $detail_id, $name, $description, $icon, $state_color;
    public $modalMode;

    protected $listeners = ['destroy'];

    protected $rules = [
        'name' => "required|min:3|max:30|unique:extension_details,name",
        'description' => "min:3|max:100",
        'icon' => "required",
        'state_color' => "required"
    ];

    public function mount()
    {
        $this->extension = Extension::where('slug', request()->slug)->first();
    }

    public function render()
    {
        $this->details = $this->extension->details()->get();
        return view('livewire.admin.extensions.extension-details');
    }

    public function store()
    {
        $validate = $this->validate();

        $this->extension->details()->create($validate);

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Detalhe adicionado a extensão.'
        ]);

        $this->resetInputFields();

        $this->emit('closeModalStoreUpdate');
    }

    public function action($modalMode, $detail_id = null)
    {
        if ($modalMode == 'create') {
            $this->modalMode = 'store';
        }
        if ($modalMode == 'update') {
            $detail = ExtensionDetail::where('id',$detail_id)->first();
            $this->detail_id = $detail_id;
            $this->name = $detail->name;
            $this->description = $detail->description;
            $this->icon = $detail->icon;
            $this->state_color = $detail->state_color;
            $this->modalMode = 'update';
        }
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => "required|min:3|max:30|unique:extension_details,name,{$this->detail_id},id",
            'description' => "min:3|max:100",
            'icon' => "required",
            'state_color' => "required",
        ]);

        $detail = ExtensionDetail::findOrFail($this->detail_id);
        $detail->update($validate);

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Detalhe atualizada.'
        ]);

        $this->resetInputFields();
        $this->emit('closeModalStoreUpdate');
    }

    public function destroy($key)
    {
        $detail = ExtensionDetail::where('id', $key)->firstOrFail();
        $detail->delete();

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Detalhe deletado.'
        ]);
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->reset([
            'name', 'description', 'icon', 'state_color'
        ]);
        $this->resetErrorBag();
    }

    public function showConfirmation($id)
    { 
        $this->dispatchBrowserEvent('swalConfirm', ['key' => $id]);
    }
}
