{{-- Using extends base layout base.blade --}}
@extends('base.base')

{{-- Send section content -> yield content base.blade --}}
@section('content')
        <div class="mt-3">
            <h2>Hi, Controller!</h2>
        </div>
@endsection