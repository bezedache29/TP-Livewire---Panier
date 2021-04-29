<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BtnsUnits extends Component
{

    public $stock;

    public $userStock = 0;
    public $outOfStock = false;

    public $errorInput = false;

    public function render()
    {
        return view('livewire.btns-units');
    }

    // Retourne notre tableau de rules (cela permet de concatener des valeurs)
    public function getRules()
    {
        return [
            'userStock' => [
                'required', 
                'integer',
                'min:0',
                'max:'.$this->stock
            ]
        ];
    }

    // Messages d'erreurs custom
    public function messages()
    {
        return [
            'userStock.required' => 'Vous devez saisir un chiffre',
            'userStock.integer' => 'Seul les chiffres sont acceptés',
            'userStock.min' => 'Le chiffre ne peux pas être négatif',
            'userStock.max' => 'Pas assez de produits en stock',
        ];
    }

    public function updatedUserStock()
    {
        $this->validateOnly('userStock', $this->getRules());
    }

    public function incrementNumber()
    {
        if ($this->userStock < $this->stock) {
            $this->userStock++;

            if ($this->stock == $this->userStock) {
                $this->outOfStock = true;
            }
        }
    }

    public function decrementNumber()
    {
        if ($this->userStock != 0) {
            $this->userStock--;

            if ($this->userStock < $this->stock) {
                $this->outOfStock = false;
            }
        }
    }
}
