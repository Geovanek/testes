<div>
    {{-- Nesta tela, iria utilizar o smartwizard para fazer o cadastro no modo StepForm. Mas estava dando conflito entre o livewire e o smartwizard.js. Logo, só utilizei o css do SmartWizard e criei o steps via livewire --}}
<div class="card mb-3">
    <form wire:submit.prevent="createAndSubscribe">
    <div class="card-body">
        <div id="smartwizard" class="sw-main sw-theme-dots sw-justified">
            <ul class="nav nav-tabs step-anchor">
                <li class="nav-item {{ ($step == 1) ? 'active' : 'done' }} {{ $errors->has('company.*') ? 'danger' : '' }}">
                    <a href="#" class="nav-link">Empresa<br><small>Ficha de cadastro</small></a>
                </li>
                <li class="nav-item {{ ($step == 2) ? 'active' : '' }} {{ ($step > 2) ? 'done' : '' }} {{ $errors->has('user.*') ? 'danger' : '' }}">
                    <a href="#" class="nav-link">Treinador<br><small>Criação da conta</small></a>
                </li>
                <li class="nav-item {{ ($step == 3) ? 'active' : '' }}">
                    <a href="#" class="nav-link">Pagamento<br><small>Método de pagamento</small></a>
                </li>
            </ul>

            <div class="sw-container tab-content">
            @if($step == 1)
                <div id="company" class="tab-pane step-content" style="{{ ($step == 1) ? 'display: block;' : '' }}">
                    <h3 class="border-bottom border-gray pb-2">
                        Preencha os dados para cadastro da empresa:
                    </h3>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="companyName" class="ul-form__label">Nome da Empresa:</label>
                            <input wire:model.lazy="company.name" type="text" class="form-control {{ $errors->has('company.name') ? 'is-invalid' : '' }}" id="companyName" />
                            <small class="ul-form__text ">Acessoria, Consultoria, Clube, Equipe, etc.</small>
                            @error('company.name')
                                <div class="invalid-feedback mt-0">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-3">
                            <label class="radio radio-primary">
                                <input wire:model.lazy="company.company_type" type="radio" name="companyType" value="{{ App\Models\Company::COMPANY_TYPE_LEGAL }}" />
                                <span>Pessoa Jurídica (CNPJ)</span>
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio radio-primary">
                                <input wire:model.lazy="company.company_type" type="radio" name="companyType" value="{{ App\Models\Company::COMPANY_TYPE_INDIVIDUAL }}" />
                                <span>Pessoa Física (CPF)</span>
                                <span class="checkmark"></span>
                                @error("company.company_type")
                                    <div class="invalid-feedback mt-0">{{ $message }}</div>
                                @enderror
                            </label>
                        </div>

                        <div class="col-md-9 m-0 p-0 row">
                            <label for="companyDocument" class="col-md-3 text-md-right col-form-label">Nº Documento</label>
                            <div class="col-md-9">
                                <input wire:model.lazy="company.document_number" type="text" class="form-control {{ $errors->has("company.document_number") ? 'is-invalid' : '' }}" id="companyDocument" />
                                <small class="ul-form__text ">Caso não possua CNPJ, cadastre-se com o seu CPF.</small>
                                @error("company.document_number")
                                    <div class="invalid-feedback mt-0">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6"">
                            <label for="companyEmail" class="ul-form__label">E-mail:</label>
                            <input wire:model.lazy="company.email" type="text" class="form-control {{ $errors->has('company.email') ? 'is-invalid' : '' }}" id="companyEmail">
                            @error('company.email')
                                <div class="invalid-feedback mt-0">{{ $message }}</div>
                            @enderror

                            <div class="form-check mt-1">
                                <input wire:model.lazy="company.newsletter" class="form-check-input" type="checkbox" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Deseja receber informações sobre novos produtos, promoções?
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6"">
                            <label for="companyPhone" class="ul-form__label">Celular:</label>
                            <input wire:model.lazy="company.phone" type="tel" class="form-control {{ $errors->has('company.phone') ? 'is-invalid' : '' }}" id="companyPhone">
                            @error('company.phone')
                                <div class="invalid-feedback mt-0">{{ $message }}</div>
                            @enderror

                            <div class="form-check mt-1">
                                <input wire:model.lazy="company.whatsapp" class="form-check-input" type="checkbox" id="whatsapp">
                                <label class="form-check-label" for="whatsapp">
                                    Também é WhatsApp?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="alert {{ $errors->has('company.privacy_policy') ? 'alert-danger' : 'alert-light' }}" role="alert">
                        <label class="switch switch-success mr-3">
                            <span>Li e aceito a <strong class="text-capitalize">política de privacidade</strong>.</span>
                            <input type="checkbox" wire:model.lazy="company.privacy_policy"><span class="slider"></span>
                        </label>
                        <p class="mb-0"></p>
                        <a href="#" data-toggle="modal" data-target="#modalPrivacyPolicy"><small>Clique aqui para ler a política de privacidade.</small></a>
                    </div>

                    <div class="alert {{ $errors->has('company.terms_of_use') ? 'alert-danger' : 'alert-light' }}" role="alert">
                        <label class="switch switch-success mr-3">
                            <span>Li e aceito os <strong class="text-capitalize">termos de uso</strong>.</span>
                            <input type="checkbox" wire:model.lazy="company.terms_of_use"><span class="slider"></span>
                        </label>
                        <p class="mb-0"></p>
                        <a href="#" data-toggle="modal" data-target="#modalTermsOfUse"><small>Clique aqui para ler os termos de uso.</small></a>
                    </div>
                </div>
            @endif

            @if($step == 2)
                <div id="coach" class="tab-pane step-content" style="{{ ($step == 2) ? 'display: block;' : '' }}">
                    <h3 class="border-bottom border-gray pb-2">
                        Crie sua conta de treinador:
                    </h3>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="userName" class="ul-form__label">Nome completo:</label>
                            <input wire:model.lazy="user.name" type="text" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" id="userName" />
                            @error('user.name')
                                <div class="invalid-feedback mt-0">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12"">
                            <label for="userEmail" class="ul-form__label">E-mail:</label>
                            <input wire:model.lazy="user.email" type="text" class="form-control {{ $errors->has('user.email') ? 'is-invalid' : '' }}" id="userEmail">
                            @error('user.email')
                                <div class="invalid-feedback mt-0">{{ $message }}</div>
                            @enderror

                            <div class="form-check mt-1">
                                <input wire:model.lazy="user.newsletter" class="form-check-input" type="checkbox" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Deseja receber informações sobre novos produtos, promoções?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="userPassword" class="ul-form__label">Senha:</label>
                            <input wire:model.lazy="user.password" type="password" class="form-control {{ $errors->has('user.password') ? 'is-invalid' : '' }}" id="userPassword" />
                            @error('user.password')
                                <div class="invalid-feedback mt-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="userPasswordConfirmation" class="ul-form__label">Confirme a senha:</label>
                            <input wire:model.lazy="user.password_confirmation" type="password" class="form-control {{ $errors->has('user.password_confirmation') ? 'is-invalid' : '' }}" id="userPasswordConfirmation" />
                            @error('user.password_confirmation')
                                <div class="invalid-feedback mt-0">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            @endif

            @if($step == 3)
                <div id="payment" class="tab-pane step-content" style="{{ ($step == 3) ? 'display: block;' : '' }}">
                    <h3 class="border-bottom border-gray pb-2">Escolha o método de pagamento:</h3>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-basic-tab" data-toggle="tab" href="#homeBasic" role="tab"
                            aria-controls="homeBasic" aria-selected="true">
                            <i class="i-Credit-Card-2 text-danger text-16 align-middle mr-1"></i>
                            <span>credit card</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-basic-tab" data-toggle="tab" href="#profileBasic" role="tab"
                            aria-controls="profileBasic" aria-selected="false">
                            <i class="i-Paypal text-primary text-16 align-middle mr-1"></i>
                            <span>Paypal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-basic-tab" data-toggle="tab" href="#contactBasic" role="tab"
                            aria-controls="contactBasic" aria-selected="false">
                            <i class="i-Bitcoin text-warning text-16 align-middle mr-1"></i>
                            <span>Bitcoin</span>
                            </a>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="homeBasic" role="tabpanel"
                            aria-labelledby="home-basic-tab">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">Card Number:</label>
                                <input type="text" class="form-control" id="inputtext11" value="card number" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail12" class="ul-form__label">Full Name:</label>
                                <input type="text" class="form-control" id="inputEmail12" value="full name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">Ex Date:</label>
                                <input type="text" class="form-control" id="inputtext11" value="dd/mm/yy" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail12" class="ul-form__label">CCV:</label>
                                <input type="text" class="form-control" id="inputEmail12" value="CVC" />
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profileBasic" role="tabpanel" aria-labelledby="profile-basic-tab">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">Card Number:</label>
                                <input type="text" class="form-control" id="inputtext11" value="card number" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail12" class="ul-form__label">Full Name:</label>
                                <input type="text" class="form-control" id="inputEmail12" value="full name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">Ex Date:</label>
                                <input type="text" class="form-control" id="inputtext11" value="dd/mm/yy" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail12" class="ul-form__label">CCV:</label>
                                <input type="text" class="form-control" id="inputEmail12" value="CVC" />
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contactBasic" role="tabpanel" aria-labelledby="contact-basic-tab">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">Card Number:</label>
                                <input type="text" class="form-control" id="inputtext11" value="card number" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail12" class="ul-form__label">Full Name:</label>
                                <input type="text" class="form-control" id="inputEmail12" value="full name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputtext11" class="ul-form__label">Ex Date:</label>
                                <input type="text" class="form-control" id="inputtext11" value="dd/mm/yy" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail12" class="ul-form__label">CCV:</label>
                                <input type="text" class="form-control" id="inputEmail12" value="CVC" />
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            @endif

                <div class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end">
                    <div class="btn-group mr-2 sw-btn-group" role="group">
                        <button wire:click="decreaseStep" 
                                class="btn btn-secondary sw-btn-prev {{ ($step == 1) ? 'disabled' : '' }}" type="button">
                                    Anterior
                        </button>
                        <button wire:click="increaseStep" 
                                class="btn btn-secondary sw-btn-next {{ ($step == 3) ? 'disabled' : '' }}" type="button">
                                    Próximo
                        </button>
                    </div>
                    <div class="btn-group mr-2 sw-btn-group-extra" role="group">
                        <button wire:click="resetData" class="btn btn-dark" type="button">Cancelar</button>
                        <button class="btn btn-primary finish {{ ($step == 3) ? '' : 'd-none' }}" type="submit">Finalizar Cadastro</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>
</div>

@include('front.includes.modalPrivacyPolicy')
@include('front.includes.modalTermsOfUse')

</div>
