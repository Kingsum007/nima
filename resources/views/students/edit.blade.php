@extends('layouts.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-md-3 shadow-md">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit information for <strong class="badge badge-danger">{{$st->full_name}}</strong></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" enctype="multipart/form-data" action="{{route('student.update',$st->id)}}">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{$st->id}}">
          <div class="card-body">
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="name" value="{{$st->full_name}}" id="name" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
              <label for="Father_Name">Father Name</label>
              <input type="text" class="form-control" id="father_name" value="{{$st->father_name}}" name="father_name" placeholder="Enter Father Name">
            </div>
            <div class="form-group">
              <label for="entrance_year">Entrance Year</label>
              <input type="date" class="form-control" value="{{$st->entrance_year}}" id="entrance_year" name="entrance_year" >
            </div>
            <div class="form-group">
                <label for="NID">NID ( Tazkira )</label>
                <input type="text" class="form-control" value="{{$st->nid_number}}" id="NID" name="NID" placeholder="Enter NID Number ">
              </div>
              <div class="form-group">
                <label for="NIMA_ID">NIMA ID</label>
                <input type="text" class="form-control" value="{{$st->nima_id}}" id="NIMA_ID" name="NIMA_ID" placeholder="Enter NIMA  ID">
              </div>
              <div class="form-group">
                <label for="phone"> Phone #</label>
                <input type="text" class="form-control" value="{{$st->phone}}" id="phone" name="phone" placeholder="Enter Phone Number">
              </div>
              <div class="form-group">
                <label for="department">Choose Department</label>
                <select name="department" id="department" class="form-control">
                    <option value="0">Choose Department</option>
                   @foreach ($dept as $dept )
                      <option value="{{$dept->id}}">{{$dept->dept_title}}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="semester">Choose Semester</label>
                <select name="semester" id="sem" class="form-control">
                   
                </select>
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