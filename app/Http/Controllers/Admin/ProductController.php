<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManagerStatic as Image;
use File;

use App\Product;
use App\Category;

class ProductController extends Controller
{
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
        $categories = Category::pluck('category_name', 'id');
        $status = collect([
            ['step' => 'Publish', 'name' => 'Publikasikan'],
            ['step' => 'Draft', 'name' => 'Simpan sebagai Draft']
        ])
            ->pluck('name', 'step');
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
        //Default $image = null
        $image = null;
        //Jika terdapat file (Foto / Gambar ) yang dikirim
        if ($request->hasFile('image')) {
            // Jalankan Method saveFIle()
            $image = $this->saveFile($request->product_name, $request->file('image'));  
        }
        
        Product::firstOrCreate($request->except('_token','image'),['user_id' => 1, 'image' => $image]);
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
        $model = Product::query();
        return DataTables::of($model)
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

    private function saveFile($name, $photo)
    {
        //set nama file adalah gabungan antara nama produk dan time(). Ekstensi gambar tetap dipertahankan
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        //set path untuk menyimpan gambar
        $path = public_path('uploads/product');

        //cek jika uploads/product bukan direktori / folder

        if (!File::isDirectory($path)) {
            //maka folder tersebut dibuat
            File::makeDirectory($path, 0777, true, true);
        }

        //simpan gambar yang diuplaod ke folrder uploads/produk
        Image::make($photo)->save($path . '/' . $images);
        //mengembalikan nama file yang ditampung divariable $images
        return $images;
    }
}
