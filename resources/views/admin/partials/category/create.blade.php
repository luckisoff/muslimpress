@extends('admin.app')
@section('title','Create Category')
@section('content')
<div class="col-md-12">
    <div class="create-form">
        <form action="{{$category?route('admin.category.update', $category):route('admin.category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Category Name: <span class="tick">*</span></label>
                <input type="text" name="name" id="name" placeholder="Enter the category name" class="form-control" value="{{$category?$category->name:old('name')}}">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="en">Name in English: <span class="tick">*</span></label>
                        <input type="text" name="en" id="en" placeholder="Enter the name of the category in english" class="form-control" value="{{$category?$category->en:old('en')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hi">Name in Hindi: <span class="tick">*</span></label>
                        <input type="text" name="hi" id="hi" placeholder="Enter the name of the category in Hindi" class="form-control" value="{{$category?$category->hi:old('hi')}}"> 
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Cover Image:</label>
                <input type="file" name="image" class="form-control">
                @if($category)
                    <img src="{{$category->image}}" alt="" class="edit-img img-responsive">
                @endif
            </div>

            <button class="btn btn-default" type="submit">{{$category?'Save':'Create'}}</button>


        </form>
    </div>
</div>
@endsection