<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationEdit extends Component
{
    public $reservation;
    public $date;
    public $time;
    public $number_of_people;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }
    
    public function render()

    {
        return view('livewire.reservation-edit');
    }
}
