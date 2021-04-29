<div class="container py-2">

    <h1>Page Home Panier</h1>

    <div class="d-flex">
        @foreach ($products as $product)
            @livewire('card-panier', compact('product'))
        @endforeach
    </div>
    
</div>
