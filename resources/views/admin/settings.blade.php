<x-adminLayout name="Settings" path="" padding="4">
<form action="{{route('save-settings')}}" method="POST" class="form-width" enctype='multipart/form-data'>
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Website Settings</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                        @csrf
                        <x-form.text name="title" value="{{old('title') ?? config('site.siteTitle')}}" display="Website Title" type="text"/>
                        <div style="display:flex;gap:20px;">
                            <div style="width:80%; margin-top:auto;margin-bottom:auto;">
                                <x-form.text required="false" name="favicon" display="Favicon Recommended(16X16)..." type="file" />
                            </div>
                            <img style="width:20%" src="{{ config('site.siteFavicon') }}" width="100" alt="">
                        </div>
                        <x-form.text name="tagline" value="{{old('tagline') ?? config('site.siteTagline')}}" type="text"/>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Home SEO</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                        <x-form.text name="description" value="{{old('description') ?? config('site.siteDescription')}}" type="text"/>
                        <x-form.text name="keywords" value="{{old('keywords') ?? config('site.siteKeywords')}}" type="text"/>
                </div>
            </div>
        </div>
    </div>
    <div style="display:flex;justify-content:right;"><x-form.small-btn>Save Changes</x-form.small-btn></div>
</form>
</x-adminLayout>