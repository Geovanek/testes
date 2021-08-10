<div wire:ignore.self wire:keydown.escape="cancel()" class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalExtension" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalExtension">
                    {{ ($modalMode == 'store') ? 'Adicionar Novo Detalhe' : 'Editar Detalhe' }}
                </h4>
                <button wire:click.prevent="cancel()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input wire:model.defer="name" type="text" class="form-control" name="name" id="name" placeholder="Nome do Detalhe">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <input wire:model.defer="description" type="text" class="form-control" name="description" id="description" placeholder="Descrição curta">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="icon">Ícone representativo:</label>
                        <input wire:model.defer="icon" type="text" class="form-control" name="icon" id="icon" placeholder="Ícone">
                        <small class="ul-form__text ">
                            <a href="{{ route('admin.icons') }}" target="_blank">Clique para escolher o ícone</a>
                        </small>
                        @error('icon') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="state_color">Cor de estilo do detalhe:</label>
                        <input wire:model.defer="state_color" type="text" class="form-control" name="state_color" id="state_color" placeholder="Cor de estilo">
                        <small class="ul-form__text ">
                            Copiar o nome nos badges abaixo e colar no campo
                        </small>
                        @error('state_color') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group row justify-content-center">
                        <span class="badge badge-pill badge-primary p-2 m-1">primary</span>
                        <span class="badge badge-pill badge-secondary p-2 m-1">secondary</span>
                        <span class="badge badge-pill badge-success p-2 m-1">success</span>
                        <span class="badge badge-pill badge-danger p-2 m-1">danger</span>
                        <span class="badge badge-pill badge-warning p-2 m-1">warning</span>
                        <span class="badge badge-pill badge-info p-2 m-1">info</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="{{ $modalMode }}()" class="btn btn-primary">
                    {{ ($modalMode == 'store') ? 'Cadastrar' : 'Atualizar' }}
                </button>
            </div>
        </div>
    </div>
</div>