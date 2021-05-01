<div class="container py-2">

    <h1>Page Home Panier</h1>

    <div class="d-flex">
        @foreach ($products as $product)
            @livewire('card-panier', ['product' => $product], key($loop->index))
        @endforeach
    </div>

    <button wire:click="togglePanier" class="position-absolute border rounded-circle m-2 bg-secondary text-white" style="top: 0; right: 0; font-size: 20px; width:80px; height: 80px; cursor: pointer;">
        <p class="text-white m-0" style="cursor: pointer;">{{ count($panierItems) }}</p>
    </button>

    @if ($panier)
        <div class="position-absolute border bg-secondary text-white w-25 p-2 rounded" style="top: 80px; right: 80px">
            <p>Votre panier</p>

            @if (!empty($panierItems))
                @dump($panierItems)
            @else
                <p>Votre panier est vide</p>
            @endif

        </div>
    @endif
    
    @dump($panierItems)
</div>
