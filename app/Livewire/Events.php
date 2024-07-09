<?php

namespace App\Livewire;

use App\Models\Deadline;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Events extends Component
{
    public $currentDate;
    public $currentTime;
    public $events;

    public function mount()
    {
        $this->loadEvents();
        $this->currentDate = $this->getCurrentDate();
    }

    public function loadEvents()
    {
        $this->events = Deadline::where('user_id', Auth::user()->id)->get();
        foreach ($this->events as $event) {
            $event->day = $this->getDay($event->dates[0]['start']);
            $event->dayName = Carbon::parse($event->dates[0]['start'])->format('l');
            $event->month = $this->getMonth($event->dates[0]['start']);
            $event->year = $this->getYear($event->dates[0]['start']);
            $event->start_time = $this->getStartTime($event->dates[0]['start']);
            $event->end_time = $this->getEndTime($event->dates[0]['end']);
        }
    }

    #[On('eventAdded')]
    public function refreshEvents()
    {
        $this->loadEvents();
    }

    public function getCurrentDate()
    {
        // return dayName, month, year and week number
        return [
            'dayName' => Carbon::now()->format('l'),
            'day' => Carbon::now()->format('jS'),
            'month' => Carbon::now()->format('F'),
            'year' => Carbon::now()->format('Y'),
            'week' => Carbon::now()->weekOfYear,
        ];
    }

    public function getDay($date)
    {
        return Carbon::parse($date)->format('jS');
    }

    public function getMonth($date)
    {
        return Carbon::parse($date)->format('F');
    }

    public function getYear($date)
    {
        return Carbon::parse($date)->format('Y');
    }

    public function getStartTime($date)
    {
        return Carbon::parse($date)->format('H:i');
    }

    public function getEndTime($date)
    {
        return Carbon::parse($date)->format('H:i');
    }

    public function render()
    {
        return view('livewire.events');
    }
}
