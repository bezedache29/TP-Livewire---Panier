<div class="container py-2">

    <h1>Page Home Panier</h1>

    <div class="d-flex w-100 flex-wrap">
        @foreach ($products as $product)
            @livewire('card-panier', compact('product'), key($product->id))
        @endforeach
    </div>

    <div class="d-flex justify-content-center align-items-center">
        {{ $products->links() }}
    </div>

    <button wire:click="togglePanier" class="m-2 text-white border position-fixed rounded-circle bg-secondary" style="top: 0; right: 0; font-size: 20px; width:80px; height: 80px; cursor: pointer;">
        <p class="m-0 text-white" style="cursor: pointer;">{{ $countItems }}</p>
    </button>

    @if ($panier)
        @livewire('panier', $panierItems)
    @endif
</div>
