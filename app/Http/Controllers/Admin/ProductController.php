<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use File;



use App\Product;
use App\Category;
use App\Tag;

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
        $model = new Product();
        $categories = Category::pluck('name', 'id')->prepend('Pilih Kategori');
        $tags = Tag::pluck('name', 'id')->prepend('Pilih Kategori');
        $status = $this->status();
        return view('admin.pages.products.form', compact('model','categories', 'tags','status'));
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
        $product = Product::create($request->all());
        $product->tags()->attach($request->input('tag_list'));

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
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id')->prepend('Pilih Kategori');
        $status = $this->status();
        return view('admin.pages.products.form', compact('model','categories','tags', 'status'));
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
        if ($request->hasFile('image')){
            !empty($model->image) ? File::delete(public_path('uploads/product/' . $model->image)) : null;
            !empty($model->image) ? File::delete(public_path('uploads/thumb/' . $model->image)) : null;
            $request = $this->saveFiles($request);
        }
        
        $model->update($request->all());
        $model->tags()->sync($request->input('tag_list'));
        return view('admin.pages.products.index')->with(['success' => '<strong>' . $model->name . '</strong> Diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $model)
    {
        if(!empty($model->image)) {
            File::delete(public_path('uploads/product/' . $model->image));
            File::delete(public_path('uploads/thumb/' . $model->image));
        }

        $model->delete();
    }


    public function dataTable()
    {
        $model = Product::with('category', 'tags');

        return DataTables::of($model)
        ->addColumn('tag', function (Product $product) {
            return $product->tags->pluck('name');

            // $tagItem = '';
            // foreach ($product->tags as $tag) {
            //       $tagItem .= $tag->name;
            //       $tagItem .= ' | ' ;
            // }    
            // return $tagItem;
        })
        ->addColumn('category', function (Product $product) {
            return $product->category->name; 
        })
        ->addColumn('action', function ($model) {
            return view('admin.layouts._action_nm', [
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

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    private function status()
    {
        return collect([
            ['step' => 'Publish', 'name' => 'Publikasikan'],
            ['step' => 'Draft', 'name' => 'Simpan sebagai Draft']
        ])
            ->pluck('name', 'step')->prepend('Pilih Status');
    }

}