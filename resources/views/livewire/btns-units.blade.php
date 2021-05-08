<div>
    <div class="d-flex">
        <button wire:click="decrementNumber" class="btn btn-primary border border-primary" wire:loading.attr="disabled">-</button>
        <input wire:model.debounce.500ms="userStock" type="text" style="width: 50px;" class="pl-2">
        <button @if ($outOfStock != true) wire:click="incrementNumber" @endif wire:loading.attr="disabled" class="btn {{ $outOfStock ? 'btn-secondary' : 'btn-primary' }} border border-primary">+</button>
    </div>
    <div>
        @error('userStock')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>