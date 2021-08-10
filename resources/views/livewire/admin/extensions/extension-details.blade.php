<div>
    @include('livewire.admin.extensions._partials.modalDetails')

    <div class="card">
        <div class="card-header">
            <div class="text-right w-50 float-right">
                <button type="button" wire:click.prevent="action('create')" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal">
                    <i class="nav-icon i-Add"></i>
                    Adicionar Novo Detalhe
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Icone</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Cor de Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $index => $detail)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>
                                    <i class="{{ $detail->icon }} text-22 text-{{ $detail->state_color }} font-weight-600 mr-3"></i>
                                </td>
                                <td>{{ $detail->name }}</td>

                                <td>{{ $detail->description }}</td>
                                <td>
                                    <span class="badge badge-pill badge-{{ $detail->state_color }} p-2 m-1">{{ $detail->state_color }}</span>
                                </td>
                                <td>
                                    <a href="#" wire:click="action('update', '{{ $detail->id }}')" data-toggle="modal" data-target="#modal" class="text-success mr-2">
                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                    </a>
                                    <a href="#" wire:click.prevent="showConfirmation('{{ $detail->id }}')" class="text-danger mr-2">
                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>