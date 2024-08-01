@extends('layouts.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-md-3 shadow-md">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Students Registration</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if (session()->has('success'))
        <div id="toast-container" class="toast-top-right">
         
                <div class="toast toast-success" aria-live="polite" style="">
                    <div class="toast-message"> {{ session()->get('success') }}</div>
                </div>
        </div>
        @endif
    
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
   
        <form method="POST" enctype="multipart/form-data" action="{{route('students.register')}}">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
              <label for="Father_Name">Father Name</label>
              <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father Name">
            </div>
            <div class="form-group">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="0">Please Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="form-group">
                <label for="NID">NID ( Tazkira )</label>
                <input type="text" class="form-control" id="NID" name="NID" placeholder="Enter NID Number ">
              </div>
              <div class="form-group">
                <label for="NIMA_ID">NIMA ID</label>
                <input type="text" class="form-control" id="NIMA_ID" name="NIMA_ID" placeholder="Enter NIMA  ID">
              </div>
              <div class="form-group">
                <label for="entrance_year">Entrance Year</label>
                <input type="date" name="entrance_year" id="entrance_year" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone"> Phone #</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
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
            <div class="form-group">
              <label for="image">Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose Student Image</label>
                </div>
              </div>
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