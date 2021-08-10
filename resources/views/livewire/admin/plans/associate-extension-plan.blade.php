<div>
    <button type="button" 
        wire:click.self="associate({{ $extensionId }}, {{ $associate }})" 
        class="btn {{ $associate ? 'btn-primary' : 'btn-outline-primary' }} btn-block m-1">
    {{ $associate ? 'Vinculada' : 'Desvinculada' }}
</button>
</div>
