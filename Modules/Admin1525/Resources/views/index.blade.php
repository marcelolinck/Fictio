@extends('admin1525::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('admin1525.name') !!}
    </p>
@endsection
