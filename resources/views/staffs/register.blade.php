@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6 offset-md-3 shadow-md">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Staff Information Registration</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name"
                                placeholder="Enter  Father Name">
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
                            <label for="nid_number"> NID ( Tazkira ) Number</label>
                            <input type="text" class="form-control" id="nid_number" name="nid_number"
                                placeholder="Enter  NID Number ">
                        </div>
                        <div class="form-group">
                            <label for="nima_id"> NIMA ID</label>
                            <input type="text" class="form-control" id="nima_id" name="nima_id"
                                placeholder="Enter  NIMA ID">
                        </div>
                        <div class="form-group"><label for="province" class="control-label">Province</label>
                        <input type="text" name="province" id="province" class="form-control" placeholder="Enter Province">
                        </div>
                        <div class="form-group"><label for="position" class="control-label">Position</label>
                            <input type="text" name="position" id="position" class="form-control" placeholder="Enter Position">
                            </div>
                        <div class="form-group">
                            <label for="phone"> Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter  Phone Number">
                        </div>
                       <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
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
