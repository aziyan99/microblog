<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PostExport implements FromView
{
    /**
     * @return View
     */
    public function view(): View
    {
        return view('backend.export.xlsx.post', [
            'posts' => Post::with('category')->get()
        ]);
    }
}
