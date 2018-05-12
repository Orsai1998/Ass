@extends('layouts.app')
@section('title')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')
 <div class="row">
    <div class="col-lg-12">
       <div class="card">
          <div class="card-body">
             <h4 class="card-title">Our employees</h4>
                <div class="col-xs-8 col-xs-offset-2">
                 <div class="input-group">
                  <form class="form-inline" action="{{action('MainController@employees')}}">
                   <label class="sr-only" for="inlineFormInput">Name</label>
                   <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="name_e" id="inlineFormInput" placeholder="Enter name of employee">
                   <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="name_l" id="inlineFormInput" placeholder="Enter last name of employee">
                   <label class="sr-only" for="inlineFormInputGroup">Departments</label>
                   <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <select  class="custom-select mb-2 mr-sm-2 mb-sm-0" name="departments" id="">
                     <option value="">Select departments</option>
                     @foreach($dept as $key)
                     <option value="{{$key->dept_no}}">{{$key->dept_name}}</option>
                     @endforeach
                    </select>
                   </div> 
                   <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
             </div>
            @include('info-table')
        </div>
   </div>                  
</div>
</div>
@endsection
@section('footer')
@parent
@endsection