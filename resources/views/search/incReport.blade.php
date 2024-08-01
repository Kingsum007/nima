@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Income Report Between <strong>{{$startDate}}</strong> and <strong>{{$endDate}}</strong>  </h3>
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
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Full Name: activate to sort column descending">Income Title
                                    </th>
                                    <th>Income Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Father Name: activate to sort column ascending">
                                        Payer ( Collector )</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="NID activate to sort column ascending">
                                        Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Department: activate to sort column ascending">
                                        Reviewer 1
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Semester: activate to sort column ascending">Reviewer
                                        2
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Semester Timing: activate to sort column ascending">
                                        Reviewer 3
                                    </th>
                                    <th>Details</th>

                                  
                                    <th>
                                        Saved On
                                    </th>
                                    <th>
                                        Last Updated
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Semester Timing: activate to sort column ascending">
                                    Document or Image
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inc as $student)
                                    <tr class="odd">
                                        <td>{{ $student->title }}</td>
                                        <td>
                                            @if ($student->category == 'students_monthly')
                                                Students Monthly Payment
                                            @elseif ($student->category == 'teachers_monthly')
                                                Teachers Monthly Payment
                                            @elseif($student->category == 'kankor_form')
                                                Kankor Form
                                            @else
                                                Others
                                            @endif
                                        </td>
                                        <td>{{ $student->payer }}</td>
                                        <td>{{ $student->amount }}</td>
                                        <td>{{ $student->reviewer1 }}</td>
                                        <td>{{ $student->reviewer2 }}</td>
                                        <td>{{ $student->reviewer3 }}</td>
                                        <td>{!! $student->details !!}</td>
                                        <td>{{Date($student->created_at)}}</td>
                                        <td>{{Date($student->updated_at)}}</td>
                                        <td><img src="{{ asset('images/incomes/' . $student->paper_image) }}"
                                                alt="" class="img-square   elevation-2 nav-icon" height="60px">
                                        </td>
                                      
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
