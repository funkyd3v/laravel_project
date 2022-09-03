@extends('admin.master')
@section('body')
<section class="py-5">
   <div class="container">
      <div class="row">
         <div class="col-md-10">
            <div class="card">
               <div class="card-header">
                  <h2 class="text-center">Add Brand</h2>
               </div>
               <div class="card-body">
                  <form action="{{ route('new-brand') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right">Brand Name :</label>
                        <div class="col-md-8">
                           <input type="text" name="name" class="form-control">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right">Brand Description :</label>
                        <div class="col-md-8">
                           <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right">Brand Image :</label>
                        <div class="col-md-8">
                           <input type="file" name="image" class="form-control-file">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right">Brand Status :</label>
                        <div class="col-md-8">
                           <label for=""><input type="radio" name="status" value="1">Published</label>
                           <label for=""><input type="radio" name="status" value="0">Unpublished</label>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-md-4 text-right"></label>
                        <div class="col-md-8">
                           <input type="submit" value="Add Brand" class="btn btn-outline-success">
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