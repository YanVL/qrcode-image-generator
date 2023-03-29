@extends('layouts.phanton-view')

@section('content')
    <div id="app">
        <card-component></card-component>
        <div style="display:flex; justify-content:center; align-items:center; height:100%;">
            {!! QrCode::size(150)->generate(route('profile', auth()->id())) !!}
        </div>
    </div>
@endsection
