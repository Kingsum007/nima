@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-6 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-header">Generate Students Reports</div>
        <div class="card-body">
            <form action="/stReport" method="post">
                @csrf
                <div class="form-group">
                    <label for="department">Choose Department</label>
                    <select name="department" id="department" class="form-control">
                        <option value="0">Choose Department</option>
                       @foreach ($departments as $dept )
                          <option value="{{$dept->id}}">{{$dept->dept_title}}</option>
                       @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="semester">Choose Semester</label>
                    <select name="semester" id="sem" class="form-control">
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">Generate Report</button>
                  </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-xs-12 shadow-2xl">
    <div class="card">
        <div class="card-header">Generate Meetings Reports</div>
        <div class="card-body">
            <form action="/meetReport" method="POST">
                @csrf
                <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" class="form-control" name="startDate" id="startDate">
                </div>
                <div class="form-group">
                    <label for="endDate">End Date</label>
                <input type="date" class="form-control" name="endDate" id="endDate">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success" role="submit">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-header">Generate Income Reports</div>
            <div class="card-body">
                <form action="/incReport" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" name="startDate" id="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                    <input type="date" class="form-control" name="endDate" id="endDate">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-warning" role="submit">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-header">Generate Income Reports</div>
            <div class="card-body">
                <form action="/expReport" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" name="startDate" id="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                    <input type="date" class="form-control" name="endDate" id="endDate">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-warning" role="submit">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection