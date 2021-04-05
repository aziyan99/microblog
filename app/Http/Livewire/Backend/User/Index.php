<?php

namespace App\Http\Livewire\Backend\User;

use App\Exports\UserExport;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
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
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        return view('livewire.backend.user.index', [
            'users' => User::where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('role', 'LIKE', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->count)
        ]);
    }

    public function setDestroyId($id)
    {
        $this->destroyId = $id;
    }

    public function destroy()
    {
        User::destroy($this->destroyId);
        $this->destroyId = null;
        $this->resetPage();
        session()->flash('message', 'User successfully deleted.');
    }

    public function cancelDestroy()
    {
        $this->destroyId = null;
    }

    public function exportExcel()
    {
        $fileName = "export-" . time() . "-users.xlsx";
        return Excel::download(new UserExport(), $fileName);
    }

    public function resetPassword($userId)
    {
        $user = User::find($userId);
        $user->update([
            'password' => bcrypt($user->email)
        ]);
        session()->flash('message', 'User password successfully reseted.');
    }
}
