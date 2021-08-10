<div class="card mb-2">
    @include('admin.includes.alerts')
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-3">Descrição do detalhe:</div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="description" id="description" value="{{ $detail->description ?? old('description') }}">
            </div>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-3">Extensão inclusa no plano?</div>
            <div class="col-sm-6">
                <label class="checkbox checkbox-primary">
                    @php 
                        if (isset($detail->plan_package) && $detail->plan_package == 'Y') {
                            $planPackage = 'checked';
                        } else {
                            $planPackage = null;
                        }
                    @endphp
                    <input type="checkbox" name="plan_package" id="plan_package" value="Y" {{ $planPackage ?? old('plan_package') }}>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">Desconto no pacote de extensões?</div>
            <div class="col-sm-6">
                <label class="checkbox checkbox-success">
                    @php 
                        if (isset($detail->plan_discount) && $detail->plan_discount == 'Y') {
                            $planDiscount = 'checked';
                        } else {
                            $planDiscount = null;
                        }
                    @endphp
                    <input type="checkbox" name="plan_discount" id="plan_discount" value="Y" {{ $planDiscount ?? old('plan_discount') }}>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="mc-footer">
            <div class="row text-right">
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary m-1">Salvar</button>
                    <a href="{{ route('details.index', $plan->slug) }}" class="btn btn-outline-secondary m-1">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>