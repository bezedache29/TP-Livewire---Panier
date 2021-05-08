<div class="p-2 text-white border rounded position-fixed bg-secondary w-25" style="top: 80px; right: 80px">
    <p>Votre panier</p>

    @if (!empty($panierItems))
        @foreach ($panierItems as $product)
            <div class="d-flex flex-column mb-4" wire:key="btn-{{ $product['id'] }}">
                <p class="m-0">{{ $product['title'] }}</p>
                <div class="d-flex align-items-center">
                    @livewire('btns-units', ['product' => [
                        'id' => $product['id'],
                        'title' => $product['title'],
                        'price' => $product['price'],
                        'stock' => $product['stock']
                    ]], key('btn-' . $product['id']))
                    <h5 class="ml-auto m-0 mr-2">{{ number_format($product['price'] / 100, 2, ',', ' ') }} €</h5>
                </div>
            </div>
        @endforeach

        <hr class="border border-primary w-75" />

        <h2 class="text-center">TOTAL</h2>
        <h3 class="text-center">{{ number_format($total / 100, 2, ',', ' ') }} €</h3>
    @else
        <p>Votre panier est vide</p>
    @endif

</div>
