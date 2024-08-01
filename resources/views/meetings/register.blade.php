@extends('layouts.app')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-md-3 shadow-md">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Save Meetings Information</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('meeting.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter  title">
            </div>
            <div class="form-group">
              <label for="meeting_date">Date</label>
              <input type="date" class="form-control" id="meeting_date" name="meeting_date">
            </div>
            <div class="form-group">
                <label for="agenda">Agenda</label>
                <textarea type="text" class="form-control" id="agenda" name="agenda"></textarea>
              </div>
              <div class="form-group">
                <label for="decision">Decisions</label>
               <textarea name="decision" id="decision"></textarea>
              </div>
              
              <div class="form-group">
                <label for="members">All Present Members Names</label>
               <textarea name="members" id="members"></textarea>
              </div>
            <div class="form-group">
              <label for="meeting_sign_image">Members Sign Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="meeting_sign_image" name="meeting_sign_image">
                  <label class="custom-file-label" for="exampleInputFile">Choose Sign Image</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="meeting_members_image">General Image of Meeting</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="meeting_members_image" name="meeting_members_image">
                  <label class="custom-file-label" for="exampleInputFile">Choose  General Image</label>
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