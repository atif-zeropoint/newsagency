@extends('layout.mainlayout')

@section('content')
    <div class="container">

        @include('layout.partials.breadcrumb')

        <div class="row">

            <div class="col-lg-8">

                @auth
                <!-- the comment box -->
                    <div class="well">
                        <h4>Create a new story:</h4>

                        <form role="form" action="/stories" method="post">
                            @csrf

                            <div class="form-group">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                                <input class="form-control" rows="3" name="title" placeholder="Title..."></input>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                                <textarea class="form-control" rows="3" name="description" placeholder="Description..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                @endauth
                <hr>


            </div>

            <div class="col-lg-4">
                @include('layout.partials.search')
                @include('layout.partials.popular_categories')
                @include('layout.partials.side_widgets')
            </div>
        </div>

    </div>
@endsection
