@extends('layout.mainlayout')

@section('content')
    <div class="container">

        @include('layout.partials.breadcrumb')

        <div class="row">

            <div class="col-lg-8">

                <h2>{{$story->title}}</h2>
                <hr>
                <p><i class="fa fa-clock-o"></i> Posted on Posted on {{ $story->created_at }} by <a href="#">{{ $story->author }}</a>
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


{{--                <hr>--}}
{{--                <!-- the comment box -->--}}
{{--                <div class="well">--}}
{{--                    <h4>Leave a Comment:</h4>--}}
{{--                    <form role="form">--}}
{{--                        <div class="form-group">--}}
{{--                            <textarea class="form-control" rows="3"></textarea>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--                <hr>--}}
{{--                <!-- the comments -->--}}
{{--                <h3>Start Bootstrap--}}
{{--                    <small>9:41 PM on August 24, 2013</small>--}}
{{--                </h3>--}}
{{--                <p>This has to be the worst blog post I have ever read. It simply makes no sense. You start off by talking about space or something, then you randomly start babbling about cupcakes, and you end off with random fish names.</p>--}}

{{--                <h3>Start Bootstrap--}}
{{--                    <small>9:47 PM on August 24, 2013</small>--}}
{{--                </h3>--}}
{{--                <p>Don't listen to this guy, any blog with the categories 'dinosaurs, spaceships, fried foods, wild animals, alien abductions, business casual, robots, and fireworks' has true potential.</p>--}}

            </div>

            <div class="col-lg-4">
                @include('layout.partials.search')
                @include('layout.partials.popular_categories')
                @include('layout.partials.side_widgets')
            </div>
        </div>

    </div>
@endsection
