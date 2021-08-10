@extends(Section::get('layout'))

@section('title', "Perfil da Empresa $company->name")

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/toastr.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>{{ $company->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('companies.index') }}">Empresas</a></li>
            <li>Perfil da Empresa</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    @if ($company->privacy_policy == 'N')
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-card alert-warning text-center" role="alert">
                    Esta empresa não assinou a <strong class="text-capitalize">Política de Privacidade.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if ($company->terms_of_use == 'N')
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-card alert-warning text-center" role="alert">
                    Esta empresa não assinou os <strong class="text-capitalize">Termos de Uso.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="{{ asset('assets/images/mac_book.jpg') }}" alt="">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <h3 class="text-uppercase font-weight-700 text-muted mt-4 mb-4">
                        {{ $company->name }}
                    </h3>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1">
                                    <i class="i-ID-3 text-16 mr-1"></i> 
                                    {{ $company->company_type == 'cpf' ? 'Pessoa Física' : 'Pessoa Jurídica'}}
                                </p>
                                <span>{{ $company->company_type == 'cpf' ? formatCPF($company->document_number) : formatCNPJ($company->document_number) }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1">
                                    <i class="i-MaleFemale text-16 mr-1"></i> 
                                    Responsável
                                </p>
                                <span>
                                    <a href="{{ route('users.profile', ['id' => $company->user->id]) }}" target="_blank">
                                        {{ $company->user->name }}
                                    </a>
                                </span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p>
                                <span>Dhaka, DB</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1">
                                    <i class="i-Email text-16 mr-1"></i> 
                                    E-mail
                                </p>
                                <span>{{ $company->email }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1">
                                    <i class="i-Shop-2 text-16 mr-1"></i> 
                                    Criada em:
                                </p>
                                <span>{{ $company->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p>
                                <span>www.ui-lib.com</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1">
                                    @if ($company->whatsapp == 'Y')
                                    <i class="fab fa-whatsapp text-success text-16"></i>
                                    @endif
                                    <i class="i-Telephone text-16 mr-1"></i> 
                                    Celular
                                </p>
                                <span>{{ $company->phone }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1">
                                    <i class="i-Calendar text-16 mr-1"></i> 
                                    Atualizada em:
                                </p>
                                <span>{{ $company->updated_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Home1 text-16 mr-1"></i> School</p>
                                <span>School of Digital Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 mt-5">
            <h2>Treinadores</h2>
        </div>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row justify-content-sm-center">
        @livewire('admin.companies.profile-coaches', ['id' => $company->id])
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 mt-5">
            <h2>Extensões Contratadas</h2>
        </div>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <section class="ul-product-detail__box">
        <div class="row justify-content-sm-center">
            @livewire('admin.companies.profile-extensions', ['id' => $company->id])
        </div>
    </section>

    <div class="row">
        <div class="col-lg-12 col-md-12 mt-5">
            <h2>Atletas Vinculados</h2>
        </div>
    </div>
    <div class="separator-breadcrumb border-top"></div>

        @livewire('admin.companies.profile-athletes', ['id' => $company->id])

@endsection

@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('gull/assets/js/sweetalert.script.js')}}"></script>
@endsection

@section('livewire-js')
    <script src="{{asset('js/livewireToastr.js')}}"></script>
    <script src="{{asset('js/livewireSweetAlert.js')}}"></script>
@endsection