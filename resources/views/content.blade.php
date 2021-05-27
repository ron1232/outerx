@extends('master')
@section('main_content')
<div class="container">
    @if($contents)
    @foreach($contents as $content)
    <div class="row">
        <h3>{{$content->ctitle}}</h3>
    </div>
    <div class="row">
        <p>{!!$content->article !!}</p>
    </div>
    @endforeach
    @else
    <div class="col">
        <p><i>No content avaliable...</i></p>
    </div>
    @endif
</div>
@endsection
