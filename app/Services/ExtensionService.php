<?php

namespace App\Services;

use App\Models\Extension;

class ExtensionService
{
    private $extension;
    private $active;

    public function activating(Extension $extension, int $active): array
    {
        $this->extension = $extension;
        $this->active = ($active === 0) ? 1 : 0;

        if ($active == 1 && $this->hasPlan()) {
            $type = 'warning';
            $message = 'Não é possível executar a tarefa. Existem planos vinculados a extensão, por favor desvincule primeiramente os planos.';

            return (['type' => $type, 'message' => $message]);
        }

        $query = $this->extension->update(['active' => $this->active]);

        if (!$query) {
            $type = 'warning'; 
            $message = 'Não foi possível executar a tarefa. Tente novamente ou contate o suporte.';

            return (['type' => $type, 'message' => $message]);
        }
        
        if ($this->active == 0) {
            $this->toggleCompanies();
        }

        $type = 'success';
        $message = ($active === 0) ? 'Extensão ativada.' : 'Extensão desativada.';

        return (['type' => $type, 'message' => $message]);
    }

    public function hasPlan()
    {
        return $this->extension->plans->count();
    }

    public function toggleCompanies()
    {
        return $this->extension->companies()->detach();
    }
}