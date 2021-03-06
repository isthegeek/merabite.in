@extends('layouts.single')
@section('content')

    <ol class="breadcrumb">
        <li><a href="index-2.html">Home</a></li>
        <li><a href="shopping-cart.html">Order Summary</a></li>
    </ol>

    
    
    @if (!is_null($orderDetails))
    <p class="bg-info" style="padding: 10px;">
        Download your 
        <a href="{{action('StoreController@getPdfinvoice', ['id' => $orderDetails[0]->id])}}">
        invoice here</a>
    </p>

     <div class="page-header">
        <h1>Order Summary</h1>
    </div>
        <div class="cart-info table-responsive">
            <table class="table table-bordered">
                <thead><tr>
                    <th class="image">Image</th>
                    <th class="name">Product Name</th>
                    <th class="quantity">Quantity</th>
                    <th class="price">Unit Price</th>
                    <th class="totalprice">Total Price</th>
                </tr></thead>
                <tbody>
                    @foreach($orderDetails[0]->orderProducts as $product)   
                    <tr>
                        <td class="image">
                            <a href="{{action('StoreController@getView', ['id' => $product->product->id])}}">
                                <img src="{{url($product->product->image)}}" alt="{{$product->product->name}}" title="{{$product->product->name}}">
                            </a>
                        </td>
                        <td class="name">
                            <a href="{{action('StoreController@getView', ['id' => $product->product->id])}}">{{$product->product->title}}</a>
                        </td>
                        <td class="quantity">
                            {{$product->quantity}}
                        </td>
                        <td class="price">
                            ₹{{$product->product->price}}
                        </td>
                        <td class="totalprice">
                            ₹{{$product->price}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <p class="pull-right">Total: ₹{{$orderDetails[0]->price}}</p>
       @endif

   
@stop