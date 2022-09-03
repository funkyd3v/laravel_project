<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $subCategories;
    protected $subCategory;

    public function addSubCategory()
    {
        return view('admin.sub-category.add-subcategory', ['categories' => Category::all()]);
    }

    public function newSubCategory(Request $request) 
    {
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('message', 'Sub Category saved successfully');
    }

    public function manageSubCategory()
    {
        $this->subCategories = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.sub-category.manage-subCategory', ['subCategories' => $this->subCategories]);
    }

    public function editSubCategory($id)
    {
        return view('admin.sub-category.edit-subcategory', ['subCategory' => SubCategory::find($id)]);
    }

    public function updateSubCategory(Request $request)
    {
        SubCategory::updateSubCategory($request);
        return redirect('/manage-subcategory')->with('message', 'Sub Category update successfully');
    }

    public function deleteSubCategory($id)
    {
        $this->subCategory = SubCategory::find($id);
        if (file_exists($this->subCategory->image)) {
            unlink($this->subCategory->image);
        }
        $this->subCategory->delete();
        return redirect()->back()->with('message', 'Sub Category deleted Successfully');
    }
}
