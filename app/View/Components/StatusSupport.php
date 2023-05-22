<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $status,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $this->status = 'Active';
        $color = 'blue';
        $color = $this->status === 'Pending' ? 'red' : $color;
        $color = $this->status === 'Complete' ? 'green' : $color;
        $textStatus = getStatusSupport($this->status);

        return view('components.status-support', compact('textStatus', 'color'));
    }
}
