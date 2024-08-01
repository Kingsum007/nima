@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Report of Meetings Between <strong>{{$startDate}}</strong> and <strong>{{$endDate}}</strong>  </h3>
                <i class="btn btn-primary float-end" onclick="javascript:window.print('#table1')">Print &nbsp;&nbsp;<i
                        class="fas fa-print"></i></i>
               
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
                    <div class="row">
                        <div class="col-sm-12">
                            <table  class="table table-bordered table-striped dataTable dtr-inline">
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
                 
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    @endsection
