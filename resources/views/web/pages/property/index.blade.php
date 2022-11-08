@extends('web.master.index')

@section('content')
    <div class="container emphasis">

        @include('web.pages.components.product', ['products' => $properties])

    </div><!-- /.container -->
@endsection
