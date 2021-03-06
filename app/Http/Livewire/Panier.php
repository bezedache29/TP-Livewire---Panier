<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Panier extends Component
{
    public $panierItems;
    public $total;

    protected $listeners = [
        'panierItems',
        'total'
    ];

    // Change la valeur du total
    public function total($value)
    {
        $this->total = $value;
    }

    // Insere les produits dans le panier
    public function panierItems($panierItems)
    {
        $this->panierItems = $panierItems;
    }

    public function render()
    {

        if (session()->has('panier.products')) {
            $this->panierItems = session()->get('panier.products');
        }

        if (session()->has('panier.total')) {
            $this->total = session()->get('panier.total');
        }

        return view('livewire.panier');
    }
}
