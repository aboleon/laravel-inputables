<?php

namespace Aboleon\Inputables\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class ValidationError extends Component
{
    public function __construct(public string $field)
    {
        $this->field = str_replace(['[',']'], ['.',''], $this->field);
    }
    public function render(): Renderable
    {
        return view('aboleon-inputable::validation-error');
    }
}
