@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Authors</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form action="{{route('gallery.authors.search')}}" class="form-inline d-flex col-md-6" method="GET">
                            <input type="text" class="form-control mx-sm-3 mb-2" name="term">
                            <button type="submit" class="btn btn-secondary mb-2">Search</button>
                        </form>
                    </div>
                    <hr>
                    <br>
                    <h3>{{$title}}</h3>
                    @if($authors->count())
                    <ul class="list-group">
                        @foreach($authors as $author)
                        <a style="color:grey;" href="{{route('gallery.authors.show',$author)}}">
                            <li class="list-group-item">
                                {{$author->name}} ({{$author->books->count()}})
                            </li>
                        </a>
                        @endforeach
                    </ul>
                    @else
                    <h4>No results</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection