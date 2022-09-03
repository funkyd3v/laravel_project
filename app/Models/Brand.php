<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected static $brand;
    protected static $brandImage;
    protected static $imageDir;
    protected static $imageName;
    protected static $image;

    public static function saveImage ($request)
    {
        self::$brandImage = $request->file('image');
        self::$imageDir   = 'brnad-images/';
        self::$imageName  = 'brand-image'.time().'.'.self::$brandImage->getClientOriginalExtension();
        self::$brandImage->move(self::$imageDir, self::$imageName);
        return self::$imageDir.self::$imageName;
    }

    public static function newBrand ($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        if ($request->image) {
            self::$brand->image = self::saveImage($request);
        }
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function updateBrand($request)
    {
        self::$brand = Brand::find($request->brand_id);

        if ($request->hasFile($request->image)) {
            self::$image = self::saveImage($request);
        }else{
            self::$image = self::$brand->image;
        }

        self::$brand->name        = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image       = self::$image;
        self::$brand->status = $request->status;
        self::$brand->save();
    }
}
