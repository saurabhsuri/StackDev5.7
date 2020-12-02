@extends('layouts.admin_layout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Categories</a> </div>
    <h1>View Categories</h1>
  </div>

  @if(Session::has('flash_message_error'))
        <div class=" alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!!Session('flash_message_error')!!}</strong>
        </div>
        @endif

        @if(Session::has('flash_message_success'))
        <div class=" alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!!Session('flash_message_success')!!}</strong>
        </div>
        @endif

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Categories</h5>
          </div>
          
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Sub Category Name</th>
                  <th>Category URL</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($category as $category)
                <tr class="gradeX">
                  <td>{{$category->id}}</td>
                  <td>{{$category->category}}</td>
        		  <td>{{$category->subcategory}}</td>	
                  <td>{{$category->url}}</td>
                  <td class="center"><a href="{{url('admin/edit-category/'.$category->id)}}" class="btn btn-primary btn-mini">Edit</a> <a href="{{url('admin/delete-category/'.$category->id)}}" class="btn btn-danger btn-mini">Delete</a></div></td>
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
@endsection

