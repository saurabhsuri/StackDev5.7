@extends('layouts.admin_layout.admin_design')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Edit Sub Category</h1>
  </div>
    
  <div class="container-fluid"><hr>
    
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
          </div>


          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('admin/edit-category/'.$categoryDetails->id)}}" name="add_category" id="add_category" novalidate="novalidate">
            	{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">Sub Category Name</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name" value="{{$categoryDetails->name}}">
                </div>
              </div>


              <div class="control-group">
                <label class="control-label">Categories</label>
                <div class="controls">
                	<select name="parent_id" style="width:223px;">
                		<option value=0>Categories</option>
                		@foreach($category as $cat)
                				<option value={{$cat->id}} @if($cat->id==$categoryDetails->parent_id) selected @endif>{{$cat->name}}</option>
                		@endforeach
                	</select>
                </div>
              </div>
            

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <input type="text" name="description" id="description" value="{{$categoryDetails->description}}">

                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL </label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="{{$categoryDetails->url}}">

                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection