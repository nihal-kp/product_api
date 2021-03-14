@extends("layout.app")
@section("content")
<div class="container col-9">
    <table class="table">
    <tr>
        <th>Name:</th> <td>{{$product->name}}</td>
    </tr>
    <tr>
        <th>Category:</th> <td>{{$product->category->name}}</td>
    </tr>
    <tr>
        <th>Image 1:</th> <td><img src="/assets/images/{{$product->image1}}" width="50"></td>
    </tr>
    <tr>
        <th>Image 2:</th> <td><img src="/assets/images/{{$product->image2}}" width="50"></td>
    </tr>
    <tr>
        <th>Slug:</th> <td>{{$product->slug}}</td>
    </tr>
    <tr>
        <th>Price:</th> <td>{{$product->price}}</td>
    </tr>
    <tr>
        <th>Status:</th> <td>{{$product->status}}</td>
    </tr>
    </table>
    <a class="btn btn-info m-3" href="{{ route('products.edit',$product->id) }}">Edit</a>
    <a class="btn btn-secondary m-3" href="{{ route('products.index') }}">Back</a>
</div>
@endsection 