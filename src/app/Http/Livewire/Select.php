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

class Select extends Component
{
    public $shop;
    public $date;
    public $time;
    public $number_of_people;

    public function mount($shop)
    {
        $this->shop = $shop;
    }

    public function render()
    {
        return view('livewire.select');
    }
}
