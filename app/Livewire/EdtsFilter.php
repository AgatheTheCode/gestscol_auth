<?php

namespace App\Livewire;


use App\Models\Edt;
use App\Models\Formation;
use App\Models\Group;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class EdtsFilter extends Component
{
    use WithPagination;

    public $form = [
        'magic' => '',
        'study' => null,
        'date' => null,
        'time_start' => null,
        'time_end' => null,
        'groups' => [],
        'link' => '',
    ];

    public function search()
    {
        $this->resetPage();
    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $magic = Edt::orderBy('label', 'asc')
            ->when(trim($this->form['magic']) !== '', function (Builder $query) {
                foreach (preg_split('#\s+#', $this->form['magic']) as $word) {
                    $query->where('label', 'like', '%' . $word . '%')
                        ->orWhere('room', 'like', '%' . $word . '%')
                        ->orWhere('teacher', 'like', '%' . $word . '%')
                        ->orWhereHas('formation', function (Builder $query) use ($word) {
                            $query->where('name', 'like', '%' . $word . '%')
                                ->orWhere('categorie', 'like', '%' . $word . '%')
                                ->orWhere('promotion', 'like', '%' . $word . '%')
                                ->orWhere('option', 'like', '%' . $word . '%');
                        })
                        ->orWhereHas('groups', function (Builder $query) use ($word) {
                            $query->where('TD_numero', 'like', '%' . $word . '%')
                                ->orWhere('TP_numero', 'like', '%' . $word . '%');
                        })
                        ->orWhereHas('formation.students', function (Builder $query) use ($word) {
                            $query->where('lastname', 'like', '%' . $word . '%')
                                ->orWhere('firstname', 'like', '%' . $word . '%');
                        });
                }
            })
            ->when(!empty($this->form['date']), function (Builder $query) {
                $query->where('date', '>=', $this->form['date']);
            })
            ->when(!empty($this->form['time_start']), function (Builder $query) {
                $query->where('begin', '<=', $this->form['time_start']);
            })
            ->when(!empty($this->form['time_end']), function (Builder $query) {
                $query->where('end', '>=', $this->form['time_end']);
            })->paginate(7);

        return view('livewire.edts-filter', [
            'magic' => $magic,
            ]);
    }
}
