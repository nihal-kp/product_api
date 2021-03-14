@extends("layout.app")
@section("content")
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive mt-2">
                    <a class="btn btn-success" href="{{ route('products.create') }}">Add New Product</a>
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>SI No.</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Image 1</th>
                                <th>Image 2</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach($products as $product)
                            <tr>
                                <td><?php echo $n++; ?></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->slug}}</td>
                                <td><img src="/assets/images/{{$product->image1}}" width="50"></td>
                                <td><img src="/assets/images/{{$product->image2}}" width="50"></td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->status}}</td>
                                <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                        <a class="btn btn-light" href="{{ route('products.show',$product->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-light" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pencil"></i></a>
                                        
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this category?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection