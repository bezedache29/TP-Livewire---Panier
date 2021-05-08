<div class="p-2 w-25">
    <div class="card">
        <img src="{{ $product->image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p>Prix : {{ number_format($product->price / 100, 2, ',', ' ') }} €</p>
            <p class="card-text">{{ $product->description }}</p>
            <p>Stock : {{ $product->stock }}</p>
    
            <div>
    
                @if (!$isItemAdded)
                    <button class="btn btn-primary" wire:click="addProduct">+</button>
                @else
                    @livewire('btns-units', ['product' => [
                        'id' => $product->id,
                        'title' => $product->title,
                        'price' => $product->price,
                        'stock' => $product->stock
                    ]], key($product->id))
                @endif
                
            </div>
        </div>
    </div>
</div>

