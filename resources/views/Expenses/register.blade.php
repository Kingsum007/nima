@extends('layouts.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-md-3 shadow-md">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Save Expenses Information</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('expenses.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter  title">
            </div>
            <div class="form-group">
              <label for="category">Income Source Category</label>
              <select name="category" id="category" class="form-control">
                <option value="0">Please Select Exoenses Category</option>
                <option value="students_affairs">Students Affairs</option>
                <option value="teachers_affairs">Teachers Affairs</option>
                <option value="kankor_form">Kankor Form</option>
                <option value="others">Others</option>
              </select>
            </div>
            <div class="form-group">
              <label for="used_by">Purchaser ( User )</label>
              <input type="text" class="form-control" id="used_by" name="used_by" placeholder="Enter Purchase User">
            </div>
            <div class="form-group">
                <label for="amount">amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount ">
              </div>
              <div class="form-group">
                <label for="details">details</label>
               <textarea name="details" id="details"></textarea>
              </div>
              <div class="form-group">
                <label for="reviewer1">First Reviewer</label>
                <input type="text" class="form-control" id="reviewer1" name="reviewer1" placeholder="Enter First Reviewer Person Name">
              </div>
              <div class="form-group">
                <label for="reviewer2">Second Reviewer</label>
                <input type="text" class="form-control" id="reviewer2" name="reviewer2" placeholder="Enter First Reviewer Person Name">
              </div>
              <div class="form-group">
                <label for="reviewer3">Third Reviewer</label>
                <input type="text" class="form-control" id="reviewer3" name="reviewer3" placeholder="Enter First Reviewer Person Name">
              </div>
              
            <div class="form-group">
              <label for="bill_image">Bill Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="bill_image" name="bill_image">
                  <label class="custom-file-label" for="exampleInputFile">Choose Bill Image</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="verify_image">Verification Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="verify_image" name="verify_image">
                  <label class="custom-file-label" for="exampleInputFile">Choose Verification Document Image</label>
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