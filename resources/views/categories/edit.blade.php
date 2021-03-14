@extends("layout.app")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center mt-4">
    <form class="form-horizontal" action="{{ route('categories.update',$category->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ $category->name }}" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Slug:</label>
            <input type="text" class="form-control" placeholder="Enter slug" name="slug" value="{{ $category->slug }}" required>
            @error("slug")
            <p style="color:red">{{$errors->first("slug")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="pr-5">Status:</label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="active" name="status" checked>Active
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="inactive" name="status">Inactive
                </label>
            </div>
        </div>
        <a class="btn btn-light m-3" href="{{ route('categories.index') }}">Cancel</a>
        <button type="submit" class="btn btn-primary my-4 mx-3">Save Changes</button>
    </form>
</div>
@endsection