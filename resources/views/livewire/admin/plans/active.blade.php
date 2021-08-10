<div>
    <label class="switch switch-success mr-3">
        <span>Disponível no front?</span>
        <input type="checkbox" 
                wire:click="activating({{ $planId }}, {{ $active }})" 
                name="plan_{{ $planId}}" 
                {{ $checked }}>
        <span class="slider"></span>
    </label>
</div>
