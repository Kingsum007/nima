@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Registered Staff Information</h3>
                <a href="{{route('staff.create')}}" class="btn btn-primary float-end"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="btn-group"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="example1_filter" class="dataTables_filter">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Full Name: activate to sort column descending">Full Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Father Name: activate to sort column ascending">
                                            Father Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="NID activate to sort column ascending">
                                            NID ( Tazkira )</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Department: activate to sort column ascending">
                                            NIMA ID
                                        </th>
                                        <th>Province</th>
                                        <th>Position</th>
                                        <th>Phone</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Semester Timing: activate to sort column ascending">
                                            Image
                                        </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $student)
                                        <tr class="odd">
                                            <td>{{ $student->full_name }}</td>
                                            <td>{{ $student->father_name }}</td>
                                            <td>{{ $student->nid_number }}</td>
                                            <td>{{ $student->nima_id }}</td>
                                            <td>{{$student->province}}</td>
                                            <td>{{$student->position}}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td><img src="{{ asset('images/staff/' . $student->image) }}" alt=""
                                                    class="img-square   elevation-2 nav-icon" height="60px"></td>
                                                    <td>
                                                    @if (Auth::user()->role == 'dean')
                                                    <a href="{{ route('income.edit', [$student->id]) }}"
                                                        class="btn  btn-info btn-block"><i class="fas fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-block"
                                                        onclick="loadDeleteModal({{ $student->id }}, `{{ $student->full_name }}`)"><i class="fa fa-trash"></i>
                                                </button>
                                                @else
                                                    <i class="badge badge-danger">You cant Edit or Delete</i>
                                                @endif
                                                    </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">

                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    @endsection
