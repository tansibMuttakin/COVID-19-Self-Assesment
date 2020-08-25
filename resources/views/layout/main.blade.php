@extends('layout.master')
@section('header')
<div class="header">
    <h2 class="p-3 text-center">COVID-19 Self-Assessment System</h2>
    <h4 class="text-center">This website runs symptomical test and based on the result it predicts whether you are CODID-19 positive or negative.It also suggest what sohuld you do based on the result.</h4>
</div>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="mt-5" action="{{url('/store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age">Age</label>
                <input type="text" class="form-control" name="age" id="age" placeholder="Age">
            </div>
            <div class="form-group col-md-6">
                <label for="sex">Sex</label>
                <select class="form-control" name="sex" id="sex">
                    <option value="M" selected>Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="body-temp">Body Temperature</label>
                <input type="text" name="temperature" class="form-control" id="body-temp" placeholder="Temperature">
            </div>
            <div class="form-group col-md-6">
                <label for="symptomps">Additional Symptoms</label>
                <select id="symptomps" name="additional_symptoms[]" class="form-control myselect" multiple>
                    <option value="1">Breathing problem</option>
                    <option value="1">Dry cough</option>
                    <option value="1">Sore throat</option>
                    <option value="1">Weakness</option>
                    <option value="1">Runny nose</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="more-symptomps">More Symptoms</label>
                <select id="more-symptomps" name="more_symptoms[]" class="form-control myselect" multiple>
                    <option value="1">Abdominal pain</option>
                    <option value="1">Vomiting</option>
                    <option value="1">Diarrhoea</option>
                    <option value="1">Chest pain or pressure</option>
                    <option value="1">Muscle pain</option>
                    <option value="1">Loss of taste or smell</option>
                    <option value="1">Rash on skin, or discoloration of fingers or toes</option>
                    <option value="1">Loss of speech or movement</option>
                </select>
            </div>
        </div>
        
        <hr>
        <button type="submit" class="btn btn-primary my-2">See Result</button>
        <hr>
    </form>
    
  <div class="card-body text-center">
    <h5 class="card-title">View All The Data</h5>
    <p class="card-text">It shows all the records from the database</p>
    <a href="{{url('/record/index')}}" class="btn btn-primary">View</a>
  </div>
@endsection