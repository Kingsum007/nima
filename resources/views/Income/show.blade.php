@extends('layouts.app')
@section('content')
    

<div class="card card-solid">
    <div class="card-header"><h3 class="text-xl text-center">Details of Income # {{$inc->id}}</h3></div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none">{{$inc->title}}</h3>
          <div class="col-12">
            <img src="{{ asset('images/incomes/' . $inc->paper_image) }}" class="product-image" alt="Product Image">
          </div>
        
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3">{{$inc->title}}</h3>
          <p>{!!$inc->details!!}</p>

          <hr>
          <h4>Income Category</h4>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-default text-center active">
                @if ($inc->category == 'students_monthly')
               
                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
            
                <i class="fas fa-circle fa-2x text-green"></i>  Students Monthly Payment
         
              <br>
           
            </label>
            @elseif ($inc->category == 'teachers_monthly')
           
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
              Teachers Monthly Payment
              <br>
              <i class="fas fa-circle fa-2x text-blue"></i>
            </label>
            
          @elseif($inc->category == 'kankor_form')
          
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
              <i class="fas fa-circle fa-2x text-purple"></i>   Kankor Form
              <br>
              
            </label>
            @else
            Others
     
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
              Others
              <br>
              <i class="fas fa-circle fa-2x text-red"></i>
            </label>
            @endif
          
          </div>

          <h4 class="mt-3">Reviewers <small>Name</small></h4>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
              <span class="text-xl">1<sup>st</sup></span>
              <br>
              {{$inc->reviewer1}}
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
              <span class="text-xl">2<sup>nd</sup></span>
              <br>
              {{$inc->reviewer2}}
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
              <span class="text-xl">3<sup>rd</sup></span>
              <br>
              {{$inc->reviewer3}}
            </label>
            
          </div>

          <div class="bg-green py-2 px-3 mt-4">
            <h2 class="mb-0">
              {{$inc->amount}}
            </h2>
            <h4 class="mt-0">
              <small>Afghani</small>
            </h4>
          </div>
          <div class="mt-4">
            <i class="btn btn-primary fas fa-print text-xl" onclick="javascript:window.print()"></i>
        </div>
        </div>
        
      </div>
     
    </div>
    <!-- /.card-body -->
  </div>
  @endsection