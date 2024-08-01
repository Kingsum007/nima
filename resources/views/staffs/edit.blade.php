@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6 offset-md-3 shadow-md">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Information of Teacher <strong class="badge badge-danger">{{$teachers->full_name}}</strong></h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('teacher.update',$teachers->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf  
                  @method('PUT')
                  <div class="card-body">
                    @if(session()->has('success'))
                    <p>
                        {{ session()->get('success') }}
                    </p>
                @endif
                
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                    <div class="form-group">
                            <label for="teacher_name">Teacher Name</label>
                            <input type="text" class="form-control" id="teacer_name" value="{{$teachers->full_name}}" name="teacher_name"
                                placeholder="Enter Teacher Name">
                        </div>
                        <div class="form-group">
                            <label for="teacher_father_name">Teacher Father Name</label>
                            <input type="text" class="form-control" value="{{$teachers->father_name}}" id="teacher_father_name" name="teacher_father_name"
                                placeholder="Enter Teacher Father Name">
                        </div>
                        <div class="form-group">
                            <label for="teacher_NID_number">Teacher NID ( Tazkira ) Number</label>
                            <input type="text" class="form-control" value="{{$teachers->nid_number}}" id="teacher_nid_number" name="teacher_NID_number"
                                placeholder="Enter Teacher NID Number ">
                        </div>
                        <div class="form-group">
                            <label for="teacher_NIMA_ID">Teacher NIMA ID</label>
                            <input type="text" class="form-control" value="{{$teachers->nima_id}}" id="teacher_NIMA_ID" name="teacher_NIMA_ID"
                                placeholder="Enter Teacher NIMA ID">
                        </div>
                        <div class="form-group">
                            <label for="teacher_phone">Teacher Phone Number</label>
                            <input type="text" class="form-control" id="teacher_phone" value="{{$teachers->phone}}" name="teacher_phone"
                                placeholder="Enter Teacher Phone Number">
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
