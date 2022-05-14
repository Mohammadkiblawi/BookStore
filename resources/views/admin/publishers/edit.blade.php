@extends('theme.default')
@section('heading')
Edit Publisher Data
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Publisher Data
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('publishers.update', $publisher)}}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Publisher Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{$publisher->name}}" autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label">address</label>
                    <div class="col-md-6">
                        <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" autocomplete="address">
                            {{$publisher->address}}
                            </textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button class=" btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection