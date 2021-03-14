@extends("layout.app")
@section("content")
<div class="container col-9">
    <table class="table">
    <tr>
        <th>Name:</th> <td>{{$category->name}}</td>
    </tr>
    <tr>
        <th>Slug:</th> <td>{{$category->slug}}</td>
    </tr>
    <tr>
        <th>Status</th> <td>{{$category->status}}</td>
    </tr>
    </table>
    <a class="btn btn-info m-3" href="{{ route('categories.edit',$category->id) }}">Edit</a>
    <a class="btn btn-secondary m-3" href="{{ route('categories.index') }}">Back</a>
</div>
@endsection 