@extends('layouts.app')


@section('content')
    <h1>Plant find detail</h1>

    <ul class="son-test">
        @if(isset($plant))
        <li>
            title: {{$plant->name}} <br/>
            species: {{$plant->species}} <br/>
            Water Instruction: {{$plant->water_instruction}}
        </li>
        @else
            <li> Not found </li>
         @endif
    </ul>

@stop



@section('footer')


@stop
