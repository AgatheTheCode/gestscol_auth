<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class StudentFilter extends Component
{

    public $search = '';

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $students = Student::orderBy('lastname', 'asc')
            ->orderBy('firstname', 'asc')
            ->when(trim($this->search) !== '', function (Builder $query) {
                foreach (preg_split('#\s+#', $this->search) as $word) { //#\s+# -> motif composé d'espaces # peut remplacer /
                    $query->where(function (Builder $query) use ($word) {
                        $query->where('firstname', 'like', '%' . $word . '%')
                            ->orWhere('lastname', 'like', '%' . $word . '%');
                    });
                }
            })
            ->get();
        return view('livewire.student-filter', [
            'students' => $students,
        ]);
    }
}
