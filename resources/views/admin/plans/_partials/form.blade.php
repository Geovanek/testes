<div class="card ul-card__margin-25">
    <div class="card-body">

        @include('admin.includes.alerts')
        
        <div class="form-group row">
            <label for="name" class="ul-form__label ul-form--margin col-lg-2 col-form-label ">Nome do plano:</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome do plano" value="{{ $plan->name ?? old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <label for="price" class="ul-form__label ul-form--margin col-lg-2 col-form-label ">Preço:</label>
            <div class="col-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="price" id="price" placeholder="Preço" aria-label="Preço do Plano" aria-describedby="plan-price" value="{{ $plan->price ?? old('price') }}">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent" id="plan-price">
                            <i class="i-Dollar-Sign"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="price_details" class="ul-form__label ul-form--margin col-lg-2 col-form-label ">Detalhes do preço:</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="price_details" id="price_details" placeholder="Detalhes do preço" value="{{ $plan->price_details ?? old('price_details') }}">
                <small class="ul-form__text form-text ">
                    Colocar <em>por mês</em> ou <em>por ano</em>
                </small>
            </div>

            <label for="discount" class="ul-form__label ul-form--margin col-lg-2 col-form-label ">Desconto:</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="discount" id="discount" placeholder="Desconto" value="{{ $plan->discount ?? old('discount') }}">
                <small class="ul-form__text form-text ">
                    Colocar somente valor sem %
                </small>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="ul-form__label ul-form--margin col-lg-2 col-form-label ">Descrição:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="description" id="description" placeholder="Descrição" value="{{ $plan->description ?? old('description') }}">
                <small class="ul-form__text form-text ">
                    Descrição simples do plano
                </small>
            </div>
        </div>

        <div class="custom-separator"></div>
        
        <div class="form-group row">
            <label for="icon" class="ul-form__label ul-form--margin col-lg-2 col-form-label ">Ícone representativo:</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="icon" id="icon" placeholder="Ícone do plano" value="{{ $plan->icon ?? old('icon') }}">
                <small class="ul-form__text ">
                    <a href="{{ route('admin.icons') }}" target="_blank">Clique para escolher o ícone</a>
                </small>
            </div>

            <label for="state_color" class="ul-form__label ul-form--margin col-lg-2 col-form-label ">Cor de estilo do plano:</label>
            <div class="col-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="state_color" id="state_color" placeholder="Cor do plano" value="{{ $plan->state_color ?? old('state_color') }}">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent">
                            <i class="i-CMYK"></i>
                        </span>
                    </div>
                </div>
                <small class="ul-form__text ">
                    Copiar o nome nos badges abaixo e colar no campo
                </small>
            </div>
        </div>
        
        <div class="form-group row justify-content-center">
            <span class="badge badge-pill badge-primary p-2 m-1">primary</span>
            <span class="badge badge-pill badge-secondary p-2 m-1">secondary</span>
            <span class="badge badge-pill badge-success p-2 m-1">success</span>
            <span class="badge badge-pill badge-danger p-2 m-1">danger</span>
            <span class="badge badge-pill badge-warning p-2 m-1">warning</span>
            <span class="badge badge-pill badge-info p-2 m-1">info</span>
            <span class="badge badge-pill badge-light p-2 m-1">light</span>
            <span class="badge badge-pill badge-dark p-2 m-1">dark</span>
        </div>
    </div>
    <div class="card-footer">
        <div class="mc-footer">
            <div class="row text-right">
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary m-1">Salvar</button>
                    <a href="{{ route('plans.index') }}" class="btn btn-outline-secondary m-1">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>