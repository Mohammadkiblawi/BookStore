@extends('theme.default')
@section('head')
<link rel="stylesheet" href="{{asset('theme/vendor/dataTables.bootstrap4.min.css')}}">
@endsection
@section('heading')
View Publishers
@endsection


@section('content')
<a class="btn btn-primary" href="{{route('publishers.create')}}"><i class="fas fa-plus"> </i> Add new Publisher</a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-stribed" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Options</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                <tr>
                    <td>{{$publisher->name}}</td>
                    <td>{{$publisher->address}}</td>
                    <td>
                        <a href="{{route('publishers.edit',$publisher)}}" class="btn btn-info btn-sm">Edit <i
                                class="fa fa-edit"></i></a>
                        <form method="POST" action="{{route('publishers.destroy',$publisher)}}"
                            style="display:inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this publisher?')">Delete <i
                                    class="fa-fa-trash"></i></button>
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