<?php

namespace App\Http\Livewire\Backend\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $count = 5;
    public $destroyId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCount()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.backend.category.index', [
            'categories' => Category::where('name', 'LIKE', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->count)
        ]);
    }

    public function setDestroyId($id)
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        $this->destroyId = $id;
    }

    public function destroy()
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        Category::destroy($this->destroyId);
        $this->destroyId = null;
        $this->resetPage();
        session()->flash('message', 'Category successfully deleted.');
    }

    public function cancelDestroy()
    {
        $this->destroyId = null;
    }

    public function exportExcel()
    {
        $fileName = "export-" . time() . "-categories.xlsx";
        return Excel::download(new CategoryExport, $fileName);
    }

}
