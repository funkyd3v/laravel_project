@extends('admin.master')
@section('body')
<section class="py">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h2 class="text-center">All Brands</h2>
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
                                 @foreach ($brands as $brand)
                                 <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->description }}</td>
                                    <td>
                                       <img src="{{ asset($brand->image) }}" style="width: 100px; height: 80px"
                                          alt="No Image" />
                                    </td>
                                    <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                       <a href="{{ route('edit-brand', ['id' => $brand->id]) }}"
                                          class="btn btn-primary">Edit</a>
                                       <a href="{{ route('delete-brand', ['id' => $brand->id]) }}"
                                          class="btn btn-danger">Delete</a>
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