@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Expenses Report Between <strong>{{$startDate}}</strong> and <strong>{{$endDate}}</strong>  </h3>
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
                                        aria-label="Expense Title: activate to sort column descending">Expense Title
                                    </th>
                                    <th>Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                        colspan="1" aria-label="Purchaser: activate to sort column ascending">
                                        Purchaser ( User )</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Amount: activate to sort column ascending">
                                        Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Reviewer 1: activate to sort column ascending">
                                        Reviewer 1
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Reviewer 2: activate to sort column ascending">Reviewer
                                        2
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Reviewer 3: activate to sort column ascending">
                                        Reviewer 3
                                    </th>
                                    <th>Details</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Bill Image: activate to sort column ascending">
                                        Bill Image
                                    </th>
                                    <th>Reviewers Signed Image</th>
                                    <th>
                                        Saved On
                                    </th>
                                    <th>
                                        Last Updated
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inc as $student)
                                    <tr class="odd">
                                        <td>{{ $student->title }}</td>
                                        <td>
                                            @if ($student->category == 'students_affairs')
                                                Students Affairs
                                            @elseif($student->category == 'teachers_affairs')
                                                Teachers Affairs
                                            @elseif ($student->category == 'kankor_form')
                                                Kankor Form 
                                            @else
                                                Others
                                            @endif

                                        </td>
                                        <td>{{ $student->used_by }}</td>
                                        <td>{{ $student->amount }}</td>
                                        <td>{{ $student->reviewer1 }}</td>
                                        <td>{{ $student->reviewer2 }}</td>
                                        <td>{{ $student->reviewer3 }}</td>
                                        <td>{!! Str::substr($student->details, 0, 50) !!} <a
                                                href="{{ route('expenses.show', [$student->id]) }}">Read More ...</a>
                                        </td>
                                        <td><a href="{{ asset('images/expenses/bills/' . $student->bill_image) }}"><img
                                                    src="{{ asset('images/expenses/bills/' . $student->bill_image) }}"
                                                    alt="" class="img-square   elevation-2 nav-icon"
                                                    height="60px"></a>
                                        </td>
                                        <td> <a href="{{ asset('images/expenses/verify/' . $student->verify_image) }}"><img
                                                    src="{{ asset('images/expenses/verify/' . $student->verify_image) }}"
                                                    alt="" class="img-square   elevation-2 nav-icon"
                                                    height="60px"></a>
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($student->created_at)->diffForHumans() }}

                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($student->updated_at)->diffForHumans() }}

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
