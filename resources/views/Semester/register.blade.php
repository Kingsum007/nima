@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6 offset-md-3 shadow-md">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Semester Registration</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('semester.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Semester Title</label>
                            <input type="text" class="form-control" id="name" name="sem_title"
                                placeholder="Enter Semester Title">
                        </div>
                        <div class="form-group">
                            <label for="dept_id">Department</label>
                            <select name="dept_id" id="dept_id" class="form-control">
                                <option value="0">Choose Department</option>
                                @foreach ($dept as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->dept_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sem_time">Semester Timing</label>
                            <select name="sem_time" id="sem_time" class="form-control">
                                <option value="0">Please Choose Semster Timing</option>
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
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
@endsection
