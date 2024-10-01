{{-- Using extends base layout base.blade --}}
@extends('base.base')

{{-- Send section content -> yield content base.blade --}}
@section('content')
        <div class="mt-3">
            <h2>Hi, ini halaman Post!</h2>

            <article>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti debitis asperiores natus unde aliquam consequuntur velit laboriosam incidunt, beatae officia ullam doloribus maiores possimus nesciunt iusto quas labore expedita commodi.
            </article>
        </div>
@endsection