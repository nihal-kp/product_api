@extends("layout.app")
@section("content")
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive mt-2">
                    <a class="btn btn-success" href="{{ route('categories.create') }}">Add New Category</a>
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>SI No.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach($categories as $category)
                            <tr>
                                <td><?php echo $n++; ?></td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->status}}</td>
                                <td>
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                        <a class="btn btn-light" href="{{ route('categories.show',$category->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-light" href="{{ route('categories.edit',$category->id) }}"><i class="fa fa-pencil"></i></a>
                                        
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