@extends('admin.master')
@section('body')
<section class="py">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h2 class="text-center">All Categories</h2>
               </div>
               <div class="card-body">

                  <div class="page-content fade-in-up">
                     <div class="ibox">
                        <div class="ibox-head">
                           <div class="ibox-title">Data Table</div>
                        </div>
                        <div class="ibox-body">
                           <table class="table table-striped table-bordered table-hover" id="example-table"
                              cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($categories as $category)
                                    <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $category->name }}</td>
                                       <td>{{ $category->description }}</td>
                                       <td>
                                          <img src="{{ asset($category->image) }}" style="width: 100px; height: 80px" alt="No Image"/>
                                       </td>
                                       <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                       <td>
                                          <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-primary">Edit</a>
                                          <a href="{{ route('delete-category', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
                                       </td>
                                    </tr>
                                 @endforeach   
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection