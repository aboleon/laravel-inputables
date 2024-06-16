<?php

namespace Aboleon\Inputables\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Aboleon\Inputables\Helpers;

class Checkbox extends Component
{
    public string $id;
    public bool $isSelected = false;

    public function __construct(
        public int|string|null $value,
        public string          $name,
        public mixed           $affected = null,
        public string|null     $label = '',
        public string          $class = '',
        public bool            $switch = false,
        public array           $params = [],
        public bool $randomize = true
    )
    {

        if (!$this->affected instanceof Collection) {
            $this->affected = collect($this->affected);
        }

        $this->id = Helpers::generateInputId($this->name . ($this->randomize ? '_' . Str::random(8) : ''));

        $this->isSelected = $this->affected->contains($this->value);
        $this->name = Helpers::generateInputName($this->name);
    }

    public function render(): Renderable
    {
        return view('aboleon-inputable::checkbox');
    }
}
