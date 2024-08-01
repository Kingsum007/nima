@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Assets</h3>
                <a href="{{ route('asset.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
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
                                        <th>Asset ID</th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="asset Title: activate to sort column descending">Asset Name
                                        </th>
                                        <th>Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                            colspan="1" aria-label="Purchaser: activate to sort column ascending">
                                            Location</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Amount: activate to sort column ascending">
                                            Details</th>
                                        
                                        <th>
                                            Saved On
                                        </th>
                                        <th>
                                            Last Updated
                                        </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asset as $student)
                                        <tr class="odd">
                                            <td>{{ $student->id }}</td>
                                            <td>
                                               {{$student->title}}
                                            </td>
                                            <td>{{ $student->category }}</td>
                                            <td>{{$student->location}}</td>
                                            <td>{!! Str::substr($student->details, 0, 50) !!} <a
                                                    href="{{ route('expenses.show', [$student->id]) }}">Read More ...</a>
                                            </td>
                                           
                                            <td>
                                                {{ Carbon\Carbon::parse($student->created_at)->diffForHumans() }}

                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($student->updated_at)->diffForHumans() }}

                                            </td>
                                            <td>
                                                @if (Auth::user()->role == 'dean')
                                                <a href="{{ route('income.edit', [$student->id]) }}"
                                                    class="btn  btn-info btn-block"><i class="fas fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-block"
                                                    onclick="loadDeleteModal({{ $student->id }}, `{{ $student->title }}`)"><i class="fa fa-trash"></i>
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
