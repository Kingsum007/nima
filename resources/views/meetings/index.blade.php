@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Previews Meetings</h3>
                <a href="{{ route('meeting.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
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
                                            aria-label="Full Name: activate to sort column descending">Meeting ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Father Name: activate to sort column ascending">
                                            Meeting Title</th>
                                       
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Department: activate to sort column ascending">
                                            Meeting Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="NID activate to sort column ascending">
                                        Meeting Agenda</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Semester Timing: activate to sort column ascending">
                                        Meeting Members
                                    </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Semester: activate to sort column ascending">
                                            Meeting Decision
                                        </th>
                                       
                                        <th>Members Sign Image</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Semester Timing: activate to sort column ascending">
                                            Members Sample  Image
                                        </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meeting as $student)
                                        <tr class="odd">
                                            <td>{{$student->id}}</td>
                                            <td>{{ $student->title}}</td>
                                            <td>{{ $student->meeting_date}}</td>
                                            <td>{!! Str::substr($student->meeting_agenda,0,50)  !!} <a href="{{route('meeting.show',[$student->id])}}">Read More ...</a></td>
                                            <td>{!! Str::substr($student->meeting_members,0,50)  !!} <a href="{{route('meeting.show',[$student->id])}}">Read More ...</a></td>
                                            <td>{!! Str::substr($student->meeting_decision,0,50)  !!} <a href="{{route('meeting.show',[$student->id])}}">Read More ...</a></td>
                                            <td><a href="{{asset('images/meetings/sign_image/' . $student->meeting_sign_image)}}"><img src="{{ asset('images/meetings/sign_image/' . $student->meeting_sign_image) }}"
                                                alt="" class="img-square   elevation-2 nav-icon" height="60px"></a>
                                            </td>
                                            <td> <a href="{{asset('images/meetings/members_image/' . $student->meeting_members_image)}}"><img src="{{ asset('images/meetings/members_image/' . $student->meeting_members_image) }}"
                                                alt="" class="img-square   elevation-2 nav-icon" height="60px"></a>
                                        </td>
                                         
                                            <td><a href="{{ route('meeting.edit', [$student->id]) }}"
                                                    class="btn  btn-info"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('meeting.destroy', [$student->id]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>

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
