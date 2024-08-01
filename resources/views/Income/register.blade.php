@extends('layouts.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-md-3 shadow-md">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Save Money Collection Information</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('income.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            @if(session()->has('success'))
            <p>
                {{ session()->get('success') }}
            </p>
        @endif
        
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
            <div class="form-group">
              <label for="category">Income Source Category</label>
              <select name="category" id="category" class="form-control">
                <option value="0">Please Select Income Source</option>
                <option value="students_monthly">Students Monthly Payment</option>
                <option value="teachers_monthly">Teachers Monthly Payment</option>
                <option value="kankor_form">Entrance Kankor Form</option>
                <option value="others">Other Payments</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Source Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Enter Source Title">
            </div>
            <div class="form-group">
              <label for="payer">Payer Name</label>
              <input type="text" class="form-control" id="payer" name="payer" placeholder="Enter Payer Name">
            </div>
            <div class="form-group">
                <label for="reviewer1">Reviewer 1</label>
                <input type="text" class="form-control" id="reviewer1" name="reviewer1" placeholder="Enter First Reviewer ">
              </div>
              <div class="form-group">
                <label for="reviewer2">Reviewer 2</label>
                <input type="text" class="form-control" id="reviewer2" name="reviewer2" placeholder="Enter Second Reviewer  ">
              </div>
              <div class="form-group">
                <label for="reviewer3">Reviewer 3</label>
                <input type="text" class="form-control" id="reviewer3" name="reviewer3" placeholder="Enter Third Reviewer  ">
              </div>
               <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount ">
              </div>
              <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" id="details" name="details" ></textarea>
              </div>
              <div class="form-group">
                <label for="image">Verification Document</label>
                <input type="file" name="paper_image" id="image" class="form-control">
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