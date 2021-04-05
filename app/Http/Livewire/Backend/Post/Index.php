<?php

namespace App\Http\Livewire\Backend\Post;

use App\Exports\PostExport;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use AuthorizesRequests;
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
        return view('livewire.backend.post.index', [
            'posts' => Post::with('category', 'user')
                ->where('posts.title', 'LIKE', '%' . $this->search . '%')
                ->orWhere('posts.views', 'LIKE', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->count)
        ]);
    }

    public function setDestroyId($id)
    {
        $post = Post::find($id);
        $this->authorize('view', $post);
        $this->destroyId = $id;
    }

    public function destroy()
    {
        $post = Post::find($this->destroyId);
        $this->authorize('view', $post);
        Storage::disk('public')->delete($post->thumbnail);
        Post::destroy($this->destroyId);
        $this->destroyId = null;
        $this->resetPage();
        session()->flash('message', 'Post successfully deleted.');
    }

    public function cancelDestroy()
    {
        $this->destroyId = null;
    }

    public function exportExcel()
    {
        $fileName = "export-" . time() . "-posts.xlsx";
        return Excel::download(new PostExport, $fileName);
    }
}
