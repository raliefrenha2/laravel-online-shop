<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ConfigurationRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use File;


use App\Configuration;

class ConfigurationController extends Controller
{
    use FileUploadTrait;
    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
    	$model = Configuration::find(1);
    	return view('admin.pages.configurations.form', compact('model'));
    }


    public function update(ConfigurationRequest $request)
    {
        $model = Configuration::find(1);

    	 if ($request->hasFile('logo')){
            !empty($model->logo) ? File::delete(public_path('uploads/product/' . $model->logo)) : null;
            !empty($model->logo) ? File::delete(public_path('uploads/thumb/' . $model->logo)) : null;
        }

        if ($request->hasFile('icon')){
            !empty($model->icon) ? File::delete(public_path('uploads/product/' . $model->icon)) : null;
            !empty($model->icon) ? File::delete(public_path('uploads/thumb/' . $model->icon)) : null;
        }

        $request = $this->saveFiles($request);
        $model->update($request->all());
        return redirect(route('configuration.edit'));
    }
}
