<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $username;
    public $goal;

    /**
     * Create a new component instance.
     */
    public function __construct($username, $goal)
    {
        $this->username = $username;
        $this->goal = $goal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
