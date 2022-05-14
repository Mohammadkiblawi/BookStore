@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Cart
                </div>
                <div class="card-body">
                    @if($items->count())
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        @php($totalPrice = 0)
                        @foreach ($items as $item)
                        @php($totalPrice += $item->price * $item->pivot->number_of_copies)

                        <tbody>
                            <tr>
                                <th scope="row">{{ $item->title}}</th>
                                <td>{{$item->price}}</td>
                                <td>{{$item->pivot->number_of_copies}}</td>
                                <td>{{$item->price * $item->pivot->number_of_copies}} $</td>
                                <td>
                                    <form action="{{route('cart.remove_all',$item->id)}}" method="POST"
                                        style="float: right;margin:auto 5px;">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Remove All</button>
                                    </form>

                                    <form action="{{route('cart.remove_one',$item->id)}}" method="POST"
                                        style="float: right;margin:auto 5px;">
                                        @csrf
                                        <button class="btn btn-warning btn-sm" type="submit">Remove One</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    <h4> Total Price: {{$totalPrice}} $ </h4>
                    @else
                    <h1>There are no books in your cart.</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection