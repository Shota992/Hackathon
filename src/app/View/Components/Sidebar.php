<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $name;
    public $target;

    public function __construct($name, $target)
    {
        $this->name = $name;
        $this->target = $target;
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
