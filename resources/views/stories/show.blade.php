@extends('layout.mainlayout')

@section('content')
    <div class="container">

        @include('layout.partials.breadcrumb')

        <div class="row">

            <div class="col-lg-8">

                <h2>{{$story->title}}</h2>
                <hr>
                <p><i class="fa fa-clock-o"></i> Posted on Posted on {{ $story->created_at }} by <a href="#">{{ $story->author->name }}</a>
                </p>
                <hr>
                <img src="http://placehold.it/900x300" class="img-responsive">
                <hr>
                <p class="lead">{{ $story->description }}</p>

{{--                <p><strong>Related stories:</strong></p>--}}
{{--                <ul>--}}
{{--                    <li><a href="http://spaceipsum.com/">Space Ipsum</a>--}}
{{--                    </li>--}}
{{--                    <li><a href="http://cupcakeipsum.com/">Cupcake Ipsum</a>--}}
{{--                    </li>--}}
{{--                    <li><a href="http://tunaipsum.com/">Tuna Ipsum</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}


                @foreach($story->comments as $comment)
                    <hr>
                    <!-- the comments -->
                    <h3>{{ $comment->writer->name }}
                        <small>{{ $comment->created_at }}</small>
                    </h3>
                    <p>{{ $comment->detail }}</p>
                @endforeach

                <hr>
                @guest
                    <ol class="login-nav">
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">traveler login</a></li><span class="vl"></span>
                        <li><a href="{{ url("/login") }}">homes owner login</a></li>
                    </ol>
                    <a href="{{ url("/") }}" class="btn">list your home</a>
                @endguest
                @auth
                <!-- the comment box -->
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form role="form" action="{{ $story->path() . '/comments' }}" method="post">
                            @csrf

                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="detail"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                @endauth                 <hr>


            </div>

            <div class="col-lg-4">
                @include('layout.partials.search')
                @include('layout.partials.popular_categories')
                @include('layout.partials.side_widgets')
            </div>
        </div>

    </div>
@endsection
