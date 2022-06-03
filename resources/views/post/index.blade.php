@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h1>Posts <small>({{count($posts)}})</small></h1>
          </div>
          <div class="card-body">
            Blog Posts
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  @foreach ($posts as $post)
  @can('view', $post)
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div>
              {{ $post->title }}
            </div>
            <form method="POST" action="{{ route('delete', ['id' => $post->id]) }}">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">
                Delete post
              </button>
            </form>
          </div>
          <div class="card-body">{{ $post->content }}</div>
        </div>
      </div>
  </div>
  <hr>
  @endcan
  @endforeach


@endsection