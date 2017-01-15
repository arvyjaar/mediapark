@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($description))
            <h3>My advertisements</h3>
        @endif
        @if($adverts->count() > 0)
            <div class="row">
                <div class="col-xs-3">
                    <b>Title</b>
                </div>
                <div class="col-xs-4">
                    <b>Description</b>
                </div>
                <div class="col-xs-2">
                    <b>Published</b>
                </div>
                <div class="col-xs-3">
                    <b>Author</b>
                </div>
            </div>
            <hr>
            @foreach($adverts as $ad)
                <div class="row">
                    <div class="col-xs-3">
                        {{ $ad->title }}
                    </div>
                    <div class="col-xs-4">
                        {{ $ad->description }}
                    </div>
                    <div class="col-xs-2">
                        {{ $ad->created_at }}
                    </div>
                    <div class="col-xs-3">
                        {{ $ad->user->name }}
                        @if(Auth::check() && Auth::user()->id == $ad->user_id)
                            <a href="{{ route('private.edit', $ad->id) }}">
                                <span class="edit pull-right">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="row">
                <div class="col-xs-12">
                    <p class="align-center">{{ $adverts->links() }}<p></p>
                </div>
            </div>
        @else No ads found.
        @endif

    </div>
@endsection
