<?php

namespace App\View\Components\Ui\Banner;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Title extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $subtitle,
        public string $title,
        public string $breadcrumb,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.banner.title');
    }
}
