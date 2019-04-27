<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Collection;



use App\Product;
use App\Category;

class ProductController extends Controller
{
    use FileUploadTrait;
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $model = new Product();
        $categories = Category::pluck('category_name', 'id')->prepend('Pilih Kategori');
        $status = collect([
            ['step' => 'Publish', 'name' => 'Publikasikan'],
            ['step' => 'Draft', 'name' => 'Simpan sebagai Draft']
        ])
            ->pluck('name', 'step')->prepend('Pilih Status');
        return view('admin.pages.products.create', compact('categories', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {    
        $request = $this->saveFiles($request);
        $request['user_id'] = 1;

        Product::create($request->all());
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $model)
    {
        return view('admin.pages.products.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $model)
    {
        $categories = Category::pluck('category_name', 'id');
        $status = collect([
            ['step' => 'Publish', 'name' => 'Publikasikan'],
            ['step' => 'Draft', 'name' => 'Simpan sebagai Draft']
        ])
            ->pluck('name', 'step');
        return view('admin.pages.products.create', compact('model','categories', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $model)
    {
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $model)
    {
        $model->delete();
    }


    public function dataTable()
    {
        $model = Product::with('category');

        return DataTables::of($model)
        ->addColumn('category', function (Product $product) {
            return $product->category->category_name; 
        })
        ->addColumn('action', function ($model) {
            return view('admin.layouts._action', [
                'model' => $model,
                'url_show' => route('product.show', $model->id),
                'url_edit' => route('product.edit', $model->id),
                'url_destroy' => route('product.destroy', $model->id),
            ]);
        })
         ->addIndexColumn()
        ->rawColumns(['action'])
        ->make('true');
    }

}
