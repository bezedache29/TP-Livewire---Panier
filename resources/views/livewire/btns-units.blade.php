<div>
    <div class="d-flex">
        <button wire:click="decrementNumber" class="btn btn-primary">-</button>
        <input wire:model="userStock" type="text" style="width: 50px;" class="pl-2">
        <button @if ($outOfStock != true) wire:click="incrementNumber" @endif class="btn {{ $outOfStock ? 'btn-secondary' : 'btn-primary' }}">+</button>
    </div>
    <div>
        @error('userStock')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
