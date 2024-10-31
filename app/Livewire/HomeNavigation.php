<?php

namespace App\Livewire;

use Livewire\Component;

class HomeNavigation extends Component
{
    public $isOpen = false;

    public function toggleNav()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function closeNav()
    {
        $this->isOpen = false;
    }


    public function render()
    {
        return view('livewire.home-navigation');
    }
}
