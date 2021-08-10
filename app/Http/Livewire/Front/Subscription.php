<?php

namespace App\Http\Livewire\Front;

use App\Services\SubscriptionService;
use Livewire\Component;

class Subscription extends Component
{
    public $company;
    public $user;
    public $companyType;

    public $step = 1;

    protected $rules = [
        'company.name' => 'required|min:3|unique:companies,name',
        'company.company_type' => 'required|string',
        'company.email' => 'required|email',
        'company.phone' => 'required',
        'company.privacy_policy' => 'accepted',
        'company.terms_of_use' => 'accepted',

        'user.name' => 'required|min:3',
        'user.email' => 'required|email|unique:users,email',
        'user.password' => 'required|min:6',
        'user.password_confirmation' => 'required|min:6|same:user.password'
    ];

    protected $messages = [
        'company.name.required' => 'Nome da empresa é obrigatório.',
        'company.name.min' => 'O nome da empresa deve conter no mínimo 3 caracteres.',
        'company.name.unique' => 'Este nome de empresa já esta cadastrado.',
        'company.email.required' => 'Obrigatório forneer um e-mail válido.',
        'company.email.email' => 'Forneça um endereço de e-mail válido',
        'company.company_type.required' => 'Selecionar tipo do documento',
        'company.phone.required' => 'Obrigatório forneer um número de telefone.',

        'user.name.required' => 'Nome é obrigatório.',
        'user.name.min' => 'O nome deve conter no mínimo 3 caracteres.',
        'user.email.required' => 'Obrigatório forneer um e-mail válido.',
        'user.email.email' => 'Forneça um endereço de e-mail válido',
        'user.email.unique' => 'Este já esta cadastrado.',
        'user.password.required' => 'Obrigatório definir uma senha',
        'user.password.min' => 'Senha deve conter no nínimo 6 caracteres',
        'user.password_confirmation.required' => 'Confirme a senha',
        'user.password_confirmation.min' => 'As senhas devem ser iguais',
        'user.password_confirmation.same' => 'As senhas devem ser iguais',
    ];

    public function mount()
    {
        $this->step = 1;
    }

    public function decreaseStep()
    {
        $this->step--;
    }

    public function increaseStep()
    {
        $this->step++;
    }

    public function resetData()
    {
        $this->reset(['company', 'user', 'companyType', 'step']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.front.subscription');
    }

    public function updatedCompanyName($value)
    {
        $this->validateOnly('company.name');
    }

    public function updatedCompanyEmail($value)
    {
        $this->validateOnly('company.email');
    }

    public function updatedCompanyPhone($value)
    {
        $this->validateOnly('company.phone');
    }

    public function updatedCompanycompanyType($value)
    {
        $this->validateOnly('company.company_type');
        $this->companyType = $value;
    }

    public function updatedCompanyDocumentNumber($value)
    {
        $this->validateOnly('company.document_number', [
            'company.document_number' => "required|{$this->companyType}",
        ], [
            'company.document_number.required' => "Obrigatório informar o ".strtoupper($this->companyType),
            "company.document_number.{$this->companyType}" => strtoupper($this->companyType)." informado é inválido",
        ]);
    }

    public function updatedCompanyPrivacyPolicy($value)
    {
        $this->validateOnly('company.privacy_policy');
    }

    public function updatedCompanyTermsOfUse($value)
    {
        $this->validateOnly('company.terms_of_use');
    }

    public function updatedUserName($value)
    {
        $this->validateOnly('user.name');
    }

    public function updatedUserEmail($value)
    {
        $this->validateOnly('user.email');
    }

    public function updatedUserPassword($value)
    {
        $this->validateOnly('user.password');
    }

    public function updatedUserPasswordConfirmation($value)
    {
        $this->validateOnly('user.password_confirmation');
    }

    public function createAndSubscribe()
    {
        $this->validate();
        $this->companyType = $this->company['company_type'];
        
        $this->validateOnly('company.document_number', [
            'company.document_number' => "required|{$this->companyType}",
        ], [
            'company.document_number.required' => "Obrigatório informar o ".strtoupper($this->companyType),
            "company.document_number.{$this->companyType}" => strtoupper($this->companyType)." informado é inválido",
        ]);

        if (!$plan = session('plan')) {
            return redirect()->back();
        }

        $user = app(SubscriptionService::class)->make($plan, $this->company, $this->user);

        return $user;
    }
}
