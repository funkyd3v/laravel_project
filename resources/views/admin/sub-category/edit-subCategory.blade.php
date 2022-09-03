@extends('admin.master')
@section('body')
<section class="py-5">
   <div class="container">
      <div class="row">
         <div class="col-md-10">
            <div class="card">
               <div class="card-header">
                  <h2 class="text-center">Edit Sub Category</h2>
               </div>
               <div class="card-body">
                  <form action="{{ route('update-subcategory') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group row">
                        <input type="hidden" name="category_id" value="{{ $subCategory->id }}" />
                        <label for="" class="col-md-4 text-right">Sub Category Name :</label>
                        <div class="col-md-8">
                           <input type="text" name="name" value="{{ $subCategory->name }}" class="form-control">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right">Sub Category Description :</label>
                        <div class="col-md-8">
                           <textarea class="form-control text-left" name="description" cols="30" rows="10">
                              {{ $subCategory->description }}
                           </textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right">Sub Category Image :</label>
                        <div class="col-md-8">
                           @if (file_exists($subCategory->image))
                           <img src="{{ asset($subCategory->image) }}" style="width: 100px; height: 100ox;" />
                           @endif
                           <input type="file" name="image" class="form-control-file">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right">Sub Category Status :</label>
                        <div class="col-md-8">
                           <label for=""><input type="radio" name="status" {{ $subCategory->status == 1 ? 'checked' : '' }}
                              value="1">Published</label>
                           <label for=""><input type="radio" name="status" {{ $subCategory->status == 0 ? 'checked' : '' }}
                              value="0">Unpublished</label>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right"></label>
                        <div class="col-md-8">
                           <input type="submit" value="Update Category" class="btn btn-outline-success">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection