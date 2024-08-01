@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6 offset-md-3 shadow-md">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Teachers Registration</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('teachers.register') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="teacher_name">Teacher Name</label>
                            <input type="text" class="form-control" id="teacer_name" name="teacher_name"
                                placeholder="Enter Teacher Name">
                        </div>
                        <div class="form-group">
                            <label for="teacher_father_name">Teacher Father Name</label>
                            <input type="text" class="form-control" id="teacher_father_name" name="teacher_father_name"
                                placeholder="Enter Teacher Father Name">
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
                            <label for="teacher_NID_number">Teacher NID ( Tazkira ) Number</label>
                            <input type="text" class="form-control" id="teacher_nid_number" name="teacher_NID_number"
                                placeholder="Enter Teacher NID Number ">
                        </div>
                        <div class="form-group">
                            <label for="teacher_NIMA_ID">Teacher NIMA ID</label>
                            <input type="text" class="form-control" id="teacher_NIMA_ID" name="teacher_NIMA_ID"
                                placeholder="Enter Teacher NIMA ID">
                        </div>
                        <div class="form-group">
                            <label for="teacher_phone">Teacher Phone Number</label>
                            <input type="text" class="form-control" id="teacher_phone" name="teacher_phone"
                                placeholder="Enter Teacher Phone Number">
                        </div>
                       <div class="form-group">
                        <input type="file" name="image" id="teacher_image" class="form-control">
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
