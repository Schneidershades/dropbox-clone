<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FileBrowser extends Component
{
	public $object;

	public $ancestors;

	public $creatingNewFolder;

    public function render()
    {
        return view('livewire.file-browser');
    }
}
