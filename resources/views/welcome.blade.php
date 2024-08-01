@extends('layouts.app')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        <i class="far fa-chart-bar"></i>
        Donut Chart
      </h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div id="donut-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="714" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 571.6px; height: 300px;"></canvas><canvas class="flot-overlay" width="714" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 571.6px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 69.5px; left: 343.756px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 209.5px; left: 321.756px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 128.5px; left: 162.756px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>

@endsection