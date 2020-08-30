@extends('admin.app')
@section('title', $news?"Edit News Article":"Create News Article")
@section('content')
<form class="row" action="{{$news?route('admin.news.update', $news):route('admin.news.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-8">
        <div class="create-form">
            <span class="title-tag">{{$news?'Edit':'Create'}} {{ucfirst($type)}}</span>
            <div class="border-bottom text-left"><em>Note: Fields with <span class="tick">*</span> are necessary.</em></div>
            <input type="hidden" value="{{$type}}">

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="locale">Language: <span class="tick">*</span></label>

                        <select name="locale" id="locale" class="form-control">
                            @foreach(config('app.available_locales') as $locale)
                                <option value="{{$locale['code']}}" {{ ($news && $news->locale == $locale['code']) ? 'selected' : ''}}>
                                    {{$locale['name']}}
                                </option>
                            @endforeach
                        </select>
                    
                    </div>
                </div>

                <divl class="col-md-9 col-sm-6">
                    <label for="categories">{{ucfirst($type)}} Categories: <span class="tick">*</span></label>
                    <select name="categories[]" id="categories" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ ($news && $news->categories->contains($category->id)) ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </divl>
            </div>

            <div class="form-group">
                <label for="title">{{ucfirst($type)}} Title: <span class="tick">*</span></label>
                <input type="text" name="title" id="title" placeholder="Enter the news title" class="form-control" value="{{$news?$news->title:old('title')}}">
            </div>

            <div class="form-group">
                <label for="summary">{{ucfirst($type)}} Summary: <span class="tick">*</span></label>
                <textarea name="summary" id="summary" cols="30" rows="5" class="form-control" placeholder="Write summary of the news in maximum of 500 words">{{$news?$news->summary:old('summary')}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">{{ucfirst($type)}} Content: <span class="tick">*</span></label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Write news in detail">{{$news?$news->content:old('content')}}</textarea>
            </div>

            <div class="form-group">
                <label for="references">{{ucfirst($type)}} References: </label>
                <textarea name="references" id="references" cols="30" rows="8" class="form-control" placeholder="Write news references if any">{{$news?$news->references:old('references')}}</textarea>
            </div>


        
        </div>
    </div>
    <div class="col-md-4">
        <div class="create-form">
            <div class="form-group">
                <label for="source">{{ucfirst($type)}} Source Name:</label>
                <input type="text" class="form-control" name="source" id="source" value="{{$news?$news->source:old('source')}}" placeholder="Source name from where the {{$type}} is taken">
            </div>
            <div class="form-group">
                <label for="source_url">{{ucfirst($type)}} Source URL:</label>
                <input type="text" class="form-control" name="source_url" id="source_url" value="{{$news?$news->source_url:old('source_url')}}" placeholder="Source url from where the {{$type}} is taken">
            </div>

            <div class="form-group">
                <label for="tags">{{ucfirst($type)}} Tags: <span class="tick">*</span></label>
                <input type="text" class="form-control" name="tags" id="tags" value="{{$news?$news->tags:old('tags')}}" placeholder="Write, each, tags, separated, by, comma">
            </div>

            <div class="form-group">
                <label for="image">Cover Image:</label>
                <input type="file" name="image" class="form-control">
                @if($news)
                    <img src="{{$news->image}}" alt="" class="edit-img img-responsive">
                @endif
            </div>
            <button class="btn btn-default" type="submit">{{$news?'Save':'Submit'}}</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#categories').select2({
            placeholder:"Select Multiple Categories"
        })
    })
    $(function () {
        $('#content').summernote({
            height: 250,
            placeholder: "Write in detail, elaborate, try to rewrite if taken from other sources..."
        })

        $('#references').summernote({
            height: 100,
            placeholder: "Point out the references if there is any..."
        })
    })
</script>
@endsection