<?php

namespace App\Livewire;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Component;

class FormationFilter extends Component
{
    public $search = '';

    public function render()
    {
        $formations = Formation::orderBy('name', 'asc')
            ->when(trim($this->search) !== '', function (Builder $query) {
                Str::of($this->search)->squish()->explode(' ')->each(function (string $word) use ($query) {
                    $query->where(function (Builder $query) use ($word) {
                        $query->where('name', 'like', '%' . $word . '%')
                            ->orWhere('categorie', 'like', '%' . $word . '%')
                            ->orWhere('promotion', 'like', '%' . $word . '%')
                            ->orWhere('option', 'like', '%' . $word . '%');
                    });
                });
            })
            ->get();
        return view('livewire.formation-filter', [
            'formations' => $formations,
        ]);
    }
}
