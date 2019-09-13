@extends('layout.mainlayout')

@section('content')
<div class="container">

    @include('layout.partials.breadcrumb')
    <div class="row">

        <div class="col-lg-8">

            @forelse ($stories as $story)
                <h1><a href="{{ '/stories/' .$story->id. '/show' }}">{{ $story->title}}</a>
                </h1>
                <p class="lead">by <a href="#">{{ $story->author }}</a>
                </p>
                <hr>
                <p><i class="fa fa-clock-o"></i> Posted on {{ $story->created_at }}</p>
                <hr>
                <a href="blog-post.html">
                    <img src="http://placehold.it/900x300" class="img-responsive">
                </a>
                <hr>
                <p>{{ Str::limit($story->description, 250) }}</p>
                <a class="btn btn-primary" href="{{ '/stories/' .$story->id. '/show' }}">Read More <i class="fa fa-angle-right"></i></a>

                <hr>
            @empty
                <p>No news</p>
            @endforelse


            <hr>

            {{ $stories->links() }}

        </div>

        <div class="col-lg-4">
            @include('layout.partials.search')
            @include('layout.partials.popular_categories')
            @include('layout.partials.side_widgets')
        </div>
    </div>

</div>
@endsection
