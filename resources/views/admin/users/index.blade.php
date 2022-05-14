@extends('theme.default')
@section('head')
<link rel="stylesheet" href="{{asset('theme/vendor/dataTables.bootstrap4.min.css')}}">
@endsection
@section('heading')
View Users
@endsection


@section('content')
<a class="btn btn-primary" href="{{route('users.create')}}"><i class="fas fa-plus"></i> Add new User</a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-stribed" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Options</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->isSuperAdmin() ? 'General Manager' :($user->isAdmin() ? 'Manager' : 'User') }}</td>
                    <td>
                        <form method="POST" action="{{route('users.update',$user)}}" class="form-inline mr-4"
                            style="display:inline-block">
                            @method('patch')
                            @csrf
                            <select class="form-control form-control-sm" name="administration_level">
                                <option selected disabled>Choose a type</option>
                                <option value="0">User</option>
                                <option value="1">Manager</option>
                                <option value="2">General Manager</option>
                            </select>
                            <button type="submit" class="btn btn-info btn-sm"> Save <i class="fa fa-edit"></i></button>
                        </form>
                        <form method="POST" action="{{route('users.destroy',$user)}}" style="display:inline-block">
                            @method('delete')
                            @csrf
                            @if(auth()->user() != $user)
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete <i
                                    class="fa-fa-trash"></i></button>
                            @else
                            <div class="btn btn-danger btn-sm disabled">Delete <i class="fa fa-trash"></i></div>
                            @endif
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