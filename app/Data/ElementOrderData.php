<?php

namespace App\Data;

use Livewire\Wireable;

class ElementOrderData implements Wireable
{
    public $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function toLivewire()
    {
        return $this->items;
    }

    public static function fromLivewire($value)
    {
        return new static($value);
    }

}
