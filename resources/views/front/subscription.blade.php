@extends(Section::get('layout'))

@section('before-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/smart.wizard/smart_wizard_theme_dots.min.css')}}">
@endsection

@section('title', "Subscrição do Plano")

@section('content')

<div class="breadcrumb">
    <h1>Subscrição e Cadastro</h1>
    <ul>
        <li><a href="{{ route('index') }}">Home</a></li>
        <li>Assinar</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<section class="chekout-page">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Plano Escolhido</div>

                    <div class="p-2 d-flex align-items-center">
                        <i class="{{ $plan->icon }} text-34 text-{{ $plan->state_color }} mr-3"></i>
                        <div>
                            <h3 class="text-22 text-{{ $plan->state_color }} mb-1">{{ $plan->name }}</h3>
                        </div>
                    </div>
                    <div class="p-1 d-flex align-items-center">
                          <h5 class="text-16 t-font-boldest text-mute mb-1">{{ $plan->description }}</h5>
                    </div>

                    <div class="ul-widget-s6__items">
                        <div class="ul-widget-s6__item">
                            <span class="ul-widget-s6__badge">
                                <p class="badge-dot-secondary ul-widget6__dot"></p>
                            </span>
                            <span class="ul-widget-s6__text">12 new users registered</span>
                        </div>
                        <div class="ul-widget-s6__item">
                            <span class="ul-widget-s6__badge">
                                <p class="badge-dot-secondary ul-widget6__dot"></p>
                            </span>
                            <span class="ul-widget-s6__text">System shutdown</span>
                        </div>
                    </div>


                    <div class="row ">
                      <div class="col-lg-12 mt-5">
                        <div class="ul-product-cart__invoice">
                          <div class="card-title">
                            <h4 class="heading text-primary">Pagamento Total</h4>
                          </div>
                          <table class="table">
                            <tbody>
                              <tr>
                                <th scope="row" class="text-16">Subtotal</th>
                                <td class="text-16 text-success font-weight-700">
                                  R${{ number_format($plan->price, 2, ',', '.') }}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row" class="text-16">Taxa de Adesão</th>
                                <td class="text-16 text-info font-weight-700">
                                  R$99,00
                                </td>
                              </tr>
                              <tr>
                                <th scope="row" class="text-primary text-16">
                                  Total:
                                </th>
                                <td class="font-weight-700 text-16">R${{ number_format($plan->price + 99, 2, ',', '.')}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="col-lg-8">
        
        @livewire('front.subscription')

      </div>
    </div>
</section>
@endsection
