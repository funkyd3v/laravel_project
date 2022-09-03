<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\FileRead;

use function Ramsey\Uuid\v1;

class BrandController extends Controller
{
    public function addBrand()
    {
        return view('admin.brand.add-brand');
    }

    public function newBrand(Request $request)
    {
        Brand::newBrand($request);
        return redirect()->back()->with('message', 'Brand saved successfully');
    }

    public function manageBrand ()
    {
        return view('admin.brand.manage-brand', ['brands' => Brand::all()]);
    }

    public function editBrand ($id)
    {
        return view('admin.brand.edit-brand', ['brand' => Brand::find($id)]);
    }

    public function updateBrand(Request $request)
    {
        Brand::updateBrand($request);
        return redirect('/manage-brand')->with('message', 'Brand updated successfully');
    }

    public function deleteBrand ($id)
    {
        $this->brand = Brand::find($id);
        if (file_exists($this->brand->image)) {
            unlink($this->brand->image);
        }
        $this->brand->delete();
        return redirect()->back()->with('message', 'Deleted successfuly');
    }
}
