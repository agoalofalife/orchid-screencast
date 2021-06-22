<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProgressBoard extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param int $percent
     * @param int $mainDigit
     * @param int $quantityFromOneHundred
     */
    public function __construct(
        public string $title,
        public int $percent,
        public int $mainDigit,
        public int $quantityFromOneHundred
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.progress-board');
    }
}
