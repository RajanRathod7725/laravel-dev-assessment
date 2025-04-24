<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosting;
use Livewire\Component;

class Index extends Component
{
    public array $jobs = [];

    public function mount()
    {
        $this->jobs = JobPosting::latest()->get()->toArray();
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
