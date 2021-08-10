<?php

namespace App\Http\Livewire\Admin\Plans;

use App\Models\Extension;
use Livewire\Component;

class AssociateExtensionPlan extends Component
{
    public $planId;
    public $planName;
    public $extensionId;
    public $associate;

    public function mount($extension, $planId)
    {
        $this->extensionId = $extension->id;

        if ($extension->plans()->find($planId)) {
            $this->associate = 1;
        } else {
            $this->associate = 0;
        }
    }

    public function render()
    {
        return view('livewire.admin.plans.associate-extension-plan');
    }

    public function associate($extensionId, $associate)
    {
        $extension = Extension::find($extensionId);
        
        if ($extension) {
           $query = $extension->plans()->toggle($this->planId);
        } else {
            $query = null;
        }

        if (!$query) {
            $this->emit('message', [
                'type' => 'warning', 
                'message' => "Não foi possível vincular a extensão ao plano {$this->planName}. Tente novamente, se o erro persistir entre em contato com o suporte."
            ]);
        } else {
            $this->associate = ($associate === 0) ? 1 : 0;

            $message = ($associate === 0) ? "Extensão vinculada ao plano {$this->planName}." : "Extensão desvinculada do plano {$this->planName}.";

            $this->emit('message', [
                'type' => 'success', 
                'message' => $message
            ]);
        }
    }
}
