@extends('layout.master')
  @section('content')
      <div class="jumbotron mt-4 text-center">
          <h2><u>your Score is {{$result->assesment_score}}!!!</u></h2>
          @if($result->assesment_score < 5)
          <h3>You merely have chance to get affected by COVID-19. Maintain home quarantine and contact doctor and follow advice.</h3>
          @elseif($result->assesment_score == 5)
          <h3>Possible suspected case for COVID-19 affected. Maintain home quarantine and contact doctor and follow advice.</h3>
          @elseif(($result->assesment_score > 5) && ($result->assesment_score < 7) )
          <h3>Highly chance of COVID-19 affected. Maintain home quarantine and contact doctor and follow advice.</h3>
          <hr class="my-4">
          <p>Contact these numbers in case of an emergency</p>
            <a href="">+8801800000000</a>
          | <a href="">+8801345678900</a>
          | <a href="">+8801012345972</a>
          @elseif($result->assesment_score > 7)
          <h3>Almost confirmed case of COVID-19 positive. Maintain home quarantine and contact doctor and follow advice. You are highly adviced to be hospitalized.</h3>
          <hr class="my-4">
          <p>Contact these numbers in case of an emergency</p>
            <a href="">+8801800000000</a>
          | <a href="">+8801345678900</a>
          | <a href="">+8801012345972</a>
          @endif
          <a href="{{url('/')}}" type="button" class="btn btn-primary mt-4">Back</a>
      </div>
  @endsection