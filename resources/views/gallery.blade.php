@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">BookStore</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <form action="{{ route('search') }}" class="form-inline d-flex col-md-6 justify-content-center"
                            method="GET">
                            <input type="text" class="form-control mx-sm-3 mb-2" name="term">
                            <button class="btn btn-primary mb-2" type="submit">Search</button>
                        </form>
                    </div>
                    <hr>
                    <br>
                    <h3>{{$title}}</h3>
                    <div class="row">
                        @if($books->count())
                        @foreach($books as $book)
                        @if($book->number_of_copies > 0)
                        <div class="col-lg-3 col-md-4 col-6" style="margin-bottom:10px">
                            <div class="d-block mb-2 h-100 border rounded" style="padding:10px">
                                <a href="{{route('book.details', $book->id)}}" style="color:#555555">
                                    <img class="img-fluid img-thumbnail"
                                        src="{{ asset('storage/'. $book->cover_image)}}" alt="">
                                    <b>
                                        <p style="height:25px">{{$book->title}}</p>
                                    </b>
                                </a>
                                <span class="score">
                                    <div class="score-wrap">
                                        <div class="stars-active" style="width: {{$book->rate()*20}}%">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="stars-inactive">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>

                                </span>
                                @if($book->category !=NULL)
                                <br><a style="color:#525252"
                                    href="{{route('gallery.categories.show', $book->category) }}"
                                    style>{{$book->category->name}}</a>
                                @endif

                                @if($book->authors->isNotEmpty())
                                <br><b>Written By:</b>
                                @foreach($book->authors as $author)
                                {{$loop->first ? '' : ','}}
                                <a style="color:#525252"
                                    href="{{route('gallery.authors.show',$author)}}">{{$author->name}}</a>
                                @endforeach
                                @endif
                                <br>
                                <b>Price:</b>{{$book->price}} $

                                @auth
                                <form action="{{route('cart.add')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$book->id}}">
                                    <input type="number" class="form-control" name="quantity" value="1" min="1"
                                        max="{{$book->number_of_copies}}" style="width:40%; float:left" required>
                                    <button type="submit" class="btn btn-primary" style="margin-left:10px">Add to cart
                                        <i class="fas fa-cart-plus"></i></button>
                                </form>
                                @endauth
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @else
                        <h3 style="margin:0 auto">No results found</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection