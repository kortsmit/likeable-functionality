@extends('layouts.app')

@section('content')
    <div class="container" id="vue-app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($posts as $post)
                    <article>
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $post->title }}</div>
                            <div class="panel-body">
                                {{ $post->body }}
                            </div>
                            <div class="panel-footer">
                                <i class="fa fa-clock-o"></i>
                                <small>{{ $post->created_at->diffForHumans() }}</small>
                                <span class="pull-right">
                                    <likeable
                                        total_like_count="{{ $post->likeCount }}"
                                        user_liked="{{ $post->liked() }}"
                                        post_id="{{ $post->id }}">
                                    </likeable>
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
