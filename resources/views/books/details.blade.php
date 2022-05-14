@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Book Details</div>

                <div class="card-body">
                    <table class="table table-stribed">
                        <tr>
                            <th>Title</th>
                            <td class="lead"><b>{{ $book->title }}</b></td>
                        </tr>

                        <tr>
                            <th>User's Rate</th>
                            <td>
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
                                <span>Number of ratings {{$book->ratings()->count()}}</span>
                            </td>
                        </tr>

                        @if($book->isbn)
                        <tr>
                            <th>Serial Number</th>
                            <td>{{$book->isbn}}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Cover Image</th>
                            <td><img class="img-fluid img-thumbnail" src="{{ asset('storage/'. $book->cover_image )}}"
                                    </td>
                        </tr>
                        @if($book->category)
                        <tr>
                            <th>Category</th>
                            <td>{{$book->category->name}}</td>
                        </tr>
                        @endif
                        @if($book->authors->count() > 0)
                        <tr>
                            <th>Authors</th>
                            <td>
                                @foreach ($book->authors as $author)
                                {{$loop->first ? '' : ','}}
                                {{$author->name}}
                                @endforeach
                            </td>
                        </tr>
                        @endif
                        @if($book->publisher)
                        <tr>
                            <th>Publishers</th>
                            <td>{{$book->publisher->name}}</td>
                        </tr>
                        @endif
                        @if($book->description)
                        <tr>
                            <th>Description</th>
                            <td>{{$book->description}}</td>
                        </tr>
                        @endif
                        @if($book->publish_year)
                        <tr>
                            <th> Year Published</th>
                            <td>{{$book->publish_year}}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Page Number</th>
                            <td>{{$book->number_of_pages}}</td>
                        </tr>
                        <tr>
                            <th>Number of Copies</th>
                            <td>{{$book->number_of_copies}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$book->price}} $</td>
                        </tr>
                    </table>
                    @auth
                    <h4>Rate this Book</h4>
                    @if(auth()->user()->rated($book))
                    <div class="rating">
                        <span class="rating-star {{auth()->user()->bookRating($book)->value==5 ? 'checked' : ''}}"
                            data-value="5"></span>
                        <span class="rating-star {{auth()->user()->bookRating($book)->value==4 ? 'checked' : ''}}"
                            data-value="4"></span>
                        <span class="rating-star {{auth()->user()->bookRating($book)->value==3 ? 'checked' : ''}}"
                            data-value="3"></span>
                        <span class="rating-star {{auth()->user()->bookRating($book)->value==2 ? 'checked' : ''}}"
                            data-value="2"></span>
                        <span class="rating-star {{auth()->user()->bookRating($book)->value==1 ? 'checked' : ''}}"
                            data-value="1"></span>
                    </div>
                    @else
                    <div class="rating">
                        <span class="rating-star" data-value="5"></span>
                        <span class="rating-star" data-value="4"></span>
                        <span class="rating-star" data-value="3"></span>
                        <span class="rating-star" data-value="2"></span>
                        <span class="rating-star" data-value="1"></span>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.rating-star').click(function(){
        var submitStars=$(this).attr('data-value');

            $.ajax({

                type:'post',
                url:{{ $book->id }} + '/rate',
                data:{
                    '_token':$('meta[name="csrf-token"]').attr('content'),
                    'value':submitStars
                },
                success:function(){
                    alert('Rate has been successfully applied');
                    location.reload();
                },
                error:function(){
                    alert('Something went wrong');
                },
            });
    });
</script>
@endsection