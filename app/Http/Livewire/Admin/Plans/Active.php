<?php

namespace App\Http\Livewire\Admin\Plans;

use Livewire\Component;
use App\Models\Plan;

class Active extends Component
{
    public $planId;
    public $active;
    public $checked;

    protected $messages = [
        'active.required' => 'Oops! Ocorreu um erro. Por favor, contate o suporte.',
        'active.boolean' => 'O valor informado para ativação esta incorreto. Por favor contate o suporte.',
    ];

    public function mount($plan)
    {
        $this->planId = $plan->id;
        $this->active = $plan->active;
        $this->checked = ($plan->active === 1) ? 'checked' : '';
    }

    public function render()
    {
        return view('livewire.admin.plans.active');
    }

    public function activating($planId, $active)
    {
        $this->validateOnly($active, [
            'active' => 'required|boolean',
        ]);

        $this->active = ($active === 0) ? 1 : 0;
        $this->checked = ($active === 0) ? 'checked' : '';
        $message = ($active === 0) ? 'Plano ativado.' : 'Plano desativado.';

        $plan = Plan::find($planId);

        if ($plan) {
            $plan->update(['active' => $this->active]);

            $this->emit('message', [
                'type' => 'success', 
                'message' => $message
            ]);
        } else {
            $this->emit('message', [
                'type' => 'warning', 
                'message' => 'Não foi possível executar a tarefa. Tente novamente ou contate o suporte.'
            ]);
        }
    }
}
