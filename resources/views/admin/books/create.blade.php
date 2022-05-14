@extends('theme.default')
@section('heading')
Add New Book
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Add New Book
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('books.index')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Book Title</label>
                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" value={{old('title')}} autocomplete="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isbn" class="col-md-4 col-form-label">Serial Number</label>
                    <div class="col-md-6">
                        <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror"
                            name="isbn" value={{old('isbn')}} autocomplete="isbn">
                        @error('isbn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label">Book Cover</label>
                    <div class="col-md-6">
                        <input id="cover_image" accept="image/*" type="file"
                            class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                            value={{old('cover_image')}} autocomplete="cover_image" onchange="readCoverImage(this);">
                        @error('cover_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <img id="cover-image-thumb" class="img-fluid img-thumbnail" src="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label">category</label>
                    <div class="col-md-6">
                        <select id="category" class="form-control" name="category">
                            <option disabled selected>Choose a Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="authors" class="col-md-4 col-form-label">ِAuthors</label>
                    <div class="col-md-6">
                        <select id="authors" multiple class="form-control" name="authors[]">
                            <option disabled selected>Choose Authors</option>
                            @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach

                        </select>
                        @error('authors')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-md-4 col-form-label">Publishers</label>
                    <div class="col-md-6">
                        <select id="as" multiple class="form-control" name="publisher">
                            <option disabled selected>Choose a Publisher</option>
                            @foreach($publishers as $publisher)
                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                            @endforeach

                        </select>
                        @error('publisher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>
                    <div class="col-md-6">
                        <textarea id="description" type="text"
                            class="form-control @error('description') is-invalid @enderror" name="description"
                            autocomplete="description">
                            {{old('description')}}
                        </textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_year" class="col-md-4 col-form-label">Publish Year</label>
                    <div class="col-md-6">
                        <input id="publish_year" type="text"
                            class="form-control @error('publish_year') is-invalid @enderror" name="publish_year"
                            value={{old('publish_year')}} autocomplete="publish_year">
                        @error('publish_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="number_of_pages" class="col-md-4 col-form-label">Number of Pages</label>
                    <div class="col-md-6">
                        <input id="number_of_pages" type="text"
                            class="form-control @error('number_of_pages') is-invalid @enderror" name="number_of_pages"
                            value={{old('number_of_pages')}} autocomplete="number_of_pages">
                        @error('number_of_pages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="number_of_copies" class="col-md-4 col-form-label">Number of Copies</label>
                    <div class="col-md-6">
                        <input id="number_of_copies" type="text"
                            class="form-control @error('number_of_copies') is-invalid @enderror" name="number_of_copies"
                            value={{old('number_of_copies')}} autocomplete="number_of_copies">
                        @error('number_of_copies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Price</label>
                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                            name="price" value={{old('price')}} autocomplete="price">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button class=" btn btn-primary" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function readCoverImage(input){
        if(input.files && input.files[0]){
            var reader=new FileReader();
            reader.onload=function(e){
                $('#cover-image-thumb').attr('src',e.target.result);
                
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection