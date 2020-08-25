@extends('layout.master')
@section('content')
    <div class="container my-5">
        <h2 class="p-2 text-center">Data Table</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">SL No</th>
                <th scope="col">Age</th>
                <th scope="col">Sex</th>
                <th scope="col">Temperature</th>
                <th scope="col">Assesment Date</th>
                <th scope="col">Assesment Score</th>
                <th scope="col">COVID-19 Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $i=> $row)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$row->age}}</td>
                    <td>{{$row->sex}}</td>
                    <td>{{$row->temperature}}</td>
                    <td>{{date("Y-m-d",strtotime($row->created_at))}}</td>
                    <td>{{$row->result->assesment_score}}</td>
                    <td>{{$row->result->result}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{url('/')}}" type="button" class="btn btn-primary">Back</a>
    </div>
@endsection    
