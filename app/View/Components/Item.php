<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Item extends Component
{
    public $photo;
    public $n;
    public $price;
    public $rated;
    public $description;
    public $itemId;
    
    public function __construct($photo , $n=null , $price=null , $rated=null , $description=null, $itemId=null)
    {
    	$this->photo = $photo;
		$this->price = $price;
		$this->n = $n;
		$this->rated = $rated;
		$this->description = $description;
		$this->itemId = $itemId;
	}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item');
    }
}
