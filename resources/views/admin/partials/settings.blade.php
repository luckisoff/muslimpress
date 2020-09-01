@extends('admin.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                <li class="nav-item"><a class="nav-link" href="#logos" data-toggle="tab">Logo/Icon</a></li>
                <li class="nav-item"><a class="nav-link" href="#social" data-toggle="tab">Social</a></li>
                <li class="nav-item"><a class="nav-link" href="#others" data-toggle="tab">Others</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="general">
                    <form class="form-horizontal" action="{{route('admin.setting.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                        <label htmlFor="inputName" class="col-sm-2 col-form-label">Site Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Site Name" name="site_name" required value="{{settings('site_name')?:old('site_name')}}"  />
                        </div>
                        </div>
                        <div class="form-group row">
                        <label htmlFor="inputEmail" class="col-sm-2 col-form-label">Site Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email address of website" name="email" required value="{{settings('email')?:old('email')}}"/>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label htmlFor="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Company phone number" name="phone" required value="{{settings('phone')?:old('phone')}}"/>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label htmlFor="inputName2" class="col-sm-2 col-form-label">Company Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Company phone number" name="address" required value="{{settings('address')?:old('address')}}" />
                        </div>
                        </div>

                        <div class="form-group row">
                        <label htmlFor="inputName2" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" required id="terms" class="form-control">{{settings('description')?:old('description')}}</textarea>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label htmlFor="keywords" class="col-sm-2 col-form-label">Keywords</label>
                        <div class="col-sm-10">
                            <textarea name="keywords" required id="keywords" class="form-control" placeholder="Enter the keywords comma separated for seo">{{settings('keywords')?:old('keywords')}}</textarea>
                        </div>
                        </div>


                        <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="logos">
                    <form class="form-horizontal" action="{{route('admin.setting.store-logo')}}" method="POST" encType="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label htmlFor="inputName" class="col-sm-2 col-form-label">Logo Image</label>
                            <div class="col-sm-10">
                                @if(array_key_exists('logo', $setting)?$setting['logo']:'')
                                <img src="{{array_key_exists('logo', $setting)?$setting['logo']:''}}" alt="Logo" style="width:100px">
                                @endif
                                <input accept="image/*" type="file" class="form-control" id="inputName" name="logo"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label htmlFor="inputName" class="col-sm-2 col-form-label">Icon Image</label>
                            <div class="col-sm-10">
                            @if(array_key_exists('logo', $setting)?$setting['logo']:'')
                            <img src="{{$setting['icon']}}" alt="Icon" style="width:100px">
                            @endif
                            <input accept="image/*" type="file" class="form-control" id="inputName" name="icon"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="social">
                    <form class="form-horizontal" action="{{route('admin.setting.store')}}" method="POST" >
                        @csrf
                        <div class="form-group row">
                        <label htmlFor="facebook" class="col-sm-2 col-form-label">Facebook Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="facebook" placeholder="Facebook link" name="facebook" value="{{settings('facebook')?:old('facebook')}}"/>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label htmlFor="twitter" class="col-sm-2 col-form-label">Twitter Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="twitter" placeholder="Twitter link"  name="twitter" value="{{settings('twitter')?:old('twitter')}}"/>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label htmlFor="instagram" class="col-sm-2 col-form-label">Instagram Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="instagram" placeholder="Tnstagram link" name="instagram" value="{{settings('instagram')?:old('instagram')}}"/>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label htmlFor="tiktok" class="col-sm-2 col-form-label">TikTok Link</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="tiktok" placeholder="TikTok link" name="tiktok" value="{{settings('tiktok')?:old('tiktok')}}"/>
                        </div>
                        </div>


                        <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="others">
                    <form class="form-horizontal" action="{{route('admin.setting.store')}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Records Per Page</label>
                            <div class="col-sm-10">
                            <input name="per_page" type="number" required id="terms" class="form-control" value="{{settings('per_page')?:old('per_page')}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Privacy</label>
                            <div class="col-sm-10">
                            <textarea name="privacy" required id="terms" class="textarea">{{settings('privacy')?:old('privacy')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Terms of Use</label>
                            <div class="col-sm-10">
                                <textarea name="terms" required id="terms" class="textarea">{{settings('terms')?:old('terms')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">SEO Tags</label>
                            <div class="col-sm-10">
                                <textarea name="seo" required id="seo" class="form-control" placeholder="Enter seo tags seperated with (,) commas">{{settings('seo')?:old('seo')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function () {
        $('.textarea').summernote()
    })
</script>
@endsection
