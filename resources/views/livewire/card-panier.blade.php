<div class="card" style="width: 18rem;">
    <img src="{{ $product->image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $product->title }}</h5>
        <p>Prix : {{ number_format($product->price / 100, 2, ',', ' ') }} €</p>
        <p class="card-text">{{ $product->description }}</p>
        <p>Stock : {{ $product->stock }}</p>

        <div>

            @if (!$isItemAdded)
                <button class="btn btn-primary" wire:click="addItem({{ $product }})">+</button>
            @else
                @livewire('btns-units', [
                    'stock' => $product->stock
                ])
            @endif
            
        </div>
    </div>
</div>
