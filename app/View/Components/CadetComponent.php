<?php

namespace App\View\Components;

use App\Models\Cadet;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CadetComponent extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(
        public Cadet $cadet
    ) {
        //
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $totalTrainingHours = $this->cadet->total_training_hours;
        $authorizedHoursAbsences = $totalTrainingHours * 0.2;
        $minimumAttendance = $totalTrainingHours - $authorizedHoursAbsences;

        return view('components.cadet-component', [
            "cadet" => $this->cadet,
            "minimum_attendance" => $minimumAttendance
        ]);
    }
}
