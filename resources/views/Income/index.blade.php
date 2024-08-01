@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Students and Teachers Payment Information</h3>
                <a href="{{ route('income.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
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

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Semester Timing: activate to sort column ascending">
                                            Document or Image
                                        </th>
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
                                    @foreach ($income as $student)
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
                                            <td>{!! Str::substr($student->details, 0, 20) !!} <a
                                                href="{{ route('income.show', [$student->id]) }}">Read More ...</a>
                                        </td>
                                            <td><img src="{{ asset('images/incomes/' . $student->paper_image) }}"
                                                    alt="" class="img-square   elevation-2 nav-icon" height="60px">
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
        <div class="modal fade" id="deleteCategory" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="deleteCategory" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">This action is not reversible.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <span id="modal-category_name"></span>?
                        <input type="hidden" id="category" name="category_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="modal-confirm_delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
    <script>
        function loadDeleteModal(id, name) {
            $('#modal-category_name').html(name);
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
            $('#deleteCategory').modal('show');
        }

        function confirmDelete(id) {
            $.ajax({
                url: '{{ url('income') }}/' + id,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method': 'delete',
                },
                success: function (data) {
                    // Success logic goes here..!

	            $('#deleteCategory').modal('hide');
                },
                error: function (error) {
                    // Error logic goes here..!
                }
            });
        }
    </script>
 
    
