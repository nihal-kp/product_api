@extends("layout.app")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center mt-4">
    <form class="form-horizontal" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter product name" name="name" value="{{ old('name') }}" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="pr-5">Category:</label>
            @foreach ($categories as $category)
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="category_id" value="{{$category->id}}"checked>{{$category->name}}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="">Slug:</label>
            <input type="text" class="form-control" placeholder="Enter slug" name="slug" value="{{ old('slug') }}" required>
            @error("slug")
            <p style="color:red">{{$errors->first("slug")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image 1:</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="image1" required/>
                <label class="custom-file-label" for="customFile">Upload Image 1</label>
                @error("image1")
                <p style="color:red">{{$errors->first("image1")}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="image">Image 2:</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="image2" required/>
                <label class="custom-file-label" for="customFile">Upload Image 2</label>
                @error("image2")
                <p style="color:red">{{$errors->first("image2")}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="">Price:</label>
            <input type="text" class="form-control" placeholder="Enter price" name="price" value="{{ old('price') }}" required>
            @error("price")
            <p style="color:red">{{$errors->first("price")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="pr-5">Status:</label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="active" checked>Active
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="inactive">Inactive
                </label>
            </div>
        </div>
        <a class="btn btn-light m-3" href="">Cancel</a>
        <button type="submit" class="btn btn-primary my-4 mx-3">Save Changes</button>
    </form>
</div>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection