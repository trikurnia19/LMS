<?php

namespace App\View\Components\Preview;

use Illuminate\View\Component;

class Application extends Component
{
    public $application;
    
    public function __construct($application)
    {
        $this->application = $application;
    }

    public function render()
    {
        return view('components.preview.application');
    }
}
