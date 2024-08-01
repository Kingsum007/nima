@extends('layouts.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-md-3 shadow-md">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Save Assets Information</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('asset.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter  title">
            </div>
            <div class="form-group">
              <label for="Location">Location</label>
              <input type="text" class="form-control" id="Location" name="Location" placeholder="Enter  Location">
            </div>
            <div class="form-group">
              <label for="category">Asset Category</label>
              <select name="category" id="category" class="form-control">
                <option value="0">Please Select  Category</option>
                <option value="Computers">Computers</option>
                <option value="Screens">Screens</option>
                <option value="Tables And Chairs">Tables and Chairs</option>
                <option value="others">Others</option>
              </select>
            </div>
              <div class="form-group">
                <label for="details">details</label>
               <textarea name="details" id="details"></textarea>
              </div>
             
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
   
        </div>
        
      </div>
   

@endsection