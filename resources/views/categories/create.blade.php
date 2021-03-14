@extends("layout.app")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center mt-4">
    <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ old('name') }}" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Slug:</label>
            <input type="text" class="form-control" placeholder="Enter slug" name="slug" value="{{ old('slug') }}" required>
            @error("slug")
            <p style="color:red">{{$errors->first("slug")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="pr-5">Status:</label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="active" value="active" checked>Active
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="inactive" value="inactive">Inactive
                </label>
            </div>
        </div>
        <a class="btn btn-light m-3" href="">Cancel</a>
        <button type="submit" class="btn btn-primary my-4 mx-3">Save Changes</button>
    </form>
</div>
@endsection