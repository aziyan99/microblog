<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CategoryExport implements FromView
{
    /**
     * @return View
     */
    public function view(): View
    {
        return view('backend.export.xlsx.category', [
            'categories' => Category::all()
        ]);
    }
}
