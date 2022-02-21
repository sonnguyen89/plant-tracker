@extends('layouts.app')


@section('content')
    <h1>Plant list detail</h1>

    <ul class="son-test">
        @if(count($plant_list))
            @foreach($plant_list as $p)
            <li>title: {{$p['title']}} <br/>
                species: {{$p['species']}}  <br/>
            </li>
            @endforeach
        @endif
    </ul>

@stop



@section('footer')


@stop
