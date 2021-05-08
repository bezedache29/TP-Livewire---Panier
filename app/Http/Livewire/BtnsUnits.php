<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BtnsUnits extends Component
{

    public $product;
    public $userStock = 0;
    public $outOfStock = false;
    public $errorInput = false;

    protected $listeners = [
        'newUserNumber',
        'addOneItem',
        'addUserStock',
        'changeUserStock',
        'stockIsOut',
        'stockIsOn'
    ];

    public function stockIsOn(Product $product)
    {
        if ($this->product['id'] == $product->id) {
            $this->outOfStock = false;
        }
    }

    public function stockIsOut(Product $product)
    {
        if ($this->product['id'] == $product->id) {
            $this->outOfStock = true;
        }
    }

    public function changeUserStock($value)
    {
        $this->userSotck = $value;
    }

    public function addUserStock(Product $product)
    {
        if ($this->product == $product->id) {
            $this->userStock++;
        }
    }

    public function addOneItem(Product $product)
    {
        if ($this->product == $product->id) {
            $this->userStock = 1;
        }
    }

    public function newUserNumber($value)
    {
        $this->userStock = $value;
    }

    // Retourne notre tableau de rules (cela permet de concatener des valeurs)
    public function getRules()
    {
        return [
            'userStock' => [
                'required', 
                'integer',
                'min:1',
                'max:'.$this->product['stock']
            ]
        ];
    }

    // Messages d'erreurs custom
    public function messages()
    {
        return [
            'userStock.required' => 'Vous devez saisir un chiffre',
            'userStock.integer' => 'Seul les chiffres sont acceptés',
            'userStock.min' => 'Le chiffre doit être supérieur à zéro',
            'userStock.max' => 'Pas assez de produits en stock',
        ];
    }

    public function updatedUserStock()
    {
        $userNumber = $this->validateOnly('userStock', $this->getRules());

        $userStock = [
            'id' => $this->product['id'],
            'userNumber' => $userNumber['userStock']
        ];

        $this->emit('newUserStock', $userStock);
    }

    public function incrementNumber()
    {
        if ($this->userStock < $this->product['stock']) {
            $this->userStock++;

            $this->emit('addAnotherOne', $this->product['id']);

            if ($this->product['stock'] == $this->userStock) {
                $this->outOfStock = true;

                $this->emit('outOfStock', $this->product['id']);
            }
        }
    }

    public function decrementNumber()
    {
        $this->userStock--;

        if ($this->userStock == 0) {
            $this->emit('closeBtns', $this->product['id']);
        }
        
        if ($this->userStock < $this->product['stock']) {
            $this->outOfStock = false;

            $this->emit('stockOn', $this->product['id']);
        }

        $this->emit('removeAnotherOne', $this->product['id']);
    }

    public function render()
    {
        if (session()->has('panier.products')) {
            foreach (session()->get('panier.products') as $product) {
                if ($this->product['id'] == $product['id']) {
                    $this->userStock = $product['userNumber'];

                    if (isset($product['outOfStock'])) {
                        if ($product['outOfStock']) {
                            $this->outOfStock = true;
                        } else {
                            $this->outOfStock = false;
                        }
                    }
                }
            }
        }

        return view('livewire.btns-units');
    }
}
