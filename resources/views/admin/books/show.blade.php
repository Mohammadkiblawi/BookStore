@extends('theme.default')
@section('heading')
View Book Details
@endsection

@section('head')
<style>
    table {
        table-layout: fixed;
    }

    table tr th {
        width: 30%;
    }
</style>
@endsection

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
                    <a href="{{route('books.edit',$book)}}" class="btn btn-info btn-sm">Edit<i
                            class="fa fa-edit"></i></a>
                    <form class="d-inline block" method="POST" action="{{route('books.destroy',$book)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this book?')">Delete <i
                                class="fa fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection