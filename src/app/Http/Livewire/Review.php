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
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Review extends Component
{
    public $showModal = false;
    public $reservation;
    public $rating;
    public $comment;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function render()
    {
        return view('livewire.review');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
