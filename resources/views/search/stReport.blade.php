@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Students Report</h3>
                <i class="btn btn-primary float-end" onclick="javascript:window.print('#table1')">Print &nbsp;&nbsp;<i
                        class="fas fa-print"></i></i>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="table1" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIMA ID
                                    </th>
                                    <th>Full Name
                                    </th>
                                    <th>
                                        Father Name</th>
                                    <th>Gender</th>
                                    <th>
                                        NID</th>
                                    <th>
                                        Department
                                    </th>
                                    <th>Semester
                                    </th>
                                    <th>
                                        Time
                                    </th>
                                    <th>Entrance Year</th>
                                    <th>Phone</th>
                                    <th>
                                        Image
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr class="odd">
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->nima_id }}</td>
                                        <td>{{ $student->full_name }}</td>
                                        <td>{{ $student->father_name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->nid_number }}</td>
                                        <td>{{ $student->dept_title }}</td>
                                        <td>{{ $student->sem_title }}</td>
                                        <td>{{ $student->sem_time }}</td>
                                        <td>{{ $student->entrance_year }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td><img src="{{ asset('images/students/' . $student->image) }}" alt=""
                                                class="img-square   elevation-2 nav-icon" height="60px"></td>

                                                @empty
                                              <td colspan="12">  <p class="alert alert-danger text-center text-bold">
                                                    No Records Found
                                                </p></td>
                                    </tr>
                                  
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
