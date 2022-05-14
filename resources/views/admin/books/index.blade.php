@extends('theme.default')
@section('head')
<link rel="stylesheet" href="{{asset('theme/vendor/dataTables.bootstrap4.min.css')}}">
@endsection
@section('heading')
View Books
@endsection


@section('content')
<a class="btn btn-primary" href="{{route('books.create')}}"> <i class="fas fa-plus"></i> Add new Book</a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-stribed" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Serial Number</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td><a href="{{route('books.show',$book)}}">{{$book->title}}</a></td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->category !=null ? $book->category->name : ''}}</td>
                    <td>
                        @if($book->authors()->count()>0)
                        @foreach($book->authors as $author)
                        {{$loop->first ? '' : ','}}
                        {{$author->name}}
                        @endforeach

                        @endif
                    </td>
                    <td>
                        {{$book->publisher !=null ? $book->publisher->name : ''}}
                    </td>
                    <td>{{$book->price}}$</td>
                    <td>
                        <a href="{{route('books.edit',$book)}}" class="btn btn-info btn-sm">Edit <i
                                class="fa fa-edit"></i></a>
                        <form class="d-inline block" method="POST" action="{{route('books.destroy',$book)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this book?')">Delete <i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
@section('script')
<!--Page level Plugins-->
<script src={{asset('theme/vendor/datatables/jquery.dataTables.min.js')}}></script>
<script src={{asset('theme/vendor/datatables/dataTables.bootstrap4.min.js')}}></script>
@endsection