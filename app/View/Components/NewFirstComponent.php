<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewFirstComponent extends Component
{
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.new-first-component', [
            'tags' => $this->getTags()
        ]);
        
    }

    public function getTags(){
        return [
            'Html',
            'PHP',
            'Javascript'
        ]; 
    }
}
