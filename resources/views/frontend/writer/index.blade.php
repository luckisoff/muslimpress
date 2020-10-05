@extends('frontend.main')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{__('Apply and Become a writer')}}</div>
        <div class="panel-body">
            <form action="{{route('frontend.writer.apply.store', app()->getLocale())}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="article">{{__('Sample Article')}} <span>*</span></label>
                    <textarea name="article" id="article" class="form-control" min="200" required>{{old('article')}}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="terms" name="terms" value="accept" class="form-check-input"> {{__('Accept terms and conditions')}} <span>*</span>
                </div>
                <button class="btn btn-default" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('scripts')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
        $('#article').summernote({
            height: 250,
            placeholder: '{{__('Write your sample piece of article in more than 200 words.')}}',
            toolbar:[
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        [ 'fontname', [ 'fontname' ] ],
                        ['para', ['ul', 'ol', 'paragraph']],
                        [ 'insert', [ 'link'] ],
                        [ 'view', [ 'undo', 'redo', 'fullscreen', 'help' ] ]
                    ]
        })
    })
</script>
@endsection