@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Teachers Report</h3>
                <i class="btn btn-primary float-end" onclick="javascript:window.print('#table1')">Print &nbsp;&nbsp;<i
                        class="fas fa-print"></i></i>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
            <div class="table table-condensed">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-sort="ascending" aria-label="Full Name: activate to sort column descending">#
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Department: activate to sort column ascending">
                                NIMA ID
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Full Name: activate to sort column descending">Full Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Father Name: activate to sort column ascending">
                                Father Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="NID activate to sort column ascending">
                                NID ( Tazkira )</th>


                            <th>Phone</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Semester Timing: activate to sort column ascending">
                                Image
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teachers as $student)
                            <tr class="odd">
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->nima_id }}</td>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->nid_number }}</td>
                                <td>{{ $student->phone }}</td>
                                <td><img src="{{ asset('images/teachers/' . $student->image) }}" alt=""
                                        class="img-square   elevation-2 nav-icon" height="60px"></td>
                        @empty
                        <p class="alert alert-danger">
                            No Records Found
                        </p>
                                        @endforelse
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td> <i class="badge badge-info" onclick="window.print()">Print</i></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="d-block text-center card-footer">
                    {{ $teachers->links() }}
                </div>
            </div>
        </div>
    </div>
    
</div>

</div>
</div>
<!-- /.card-body -->
</div>
@endsection
