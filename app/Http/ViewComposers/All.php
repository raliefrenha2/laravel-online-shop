<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Product;

class All
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Product::select('category_id')->groupBy('category_id')->get();

        $view->with(['categories' => $categories]);
    }

}