<x-adminLayout name="Dashboard" path="" padding="4">

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
                    <form action="{{route('save-settings')}}" method="POST" class="form-width" enctype='multipart/form-data'>
                        @csrf
                        <x-form.text name="title" value="{{old('title') ?? config('app.siteTitle')}}" display="Website Title" type="text"/>
                        <div style="display:flex;gap:20px;">
                            <div style="width:80%; margin-top:auto;margin-bottom:auto;">
                                <x-form.text required="false" name="favion" display="Favicon Recommended(16X16)..." type="file" />
                            </div>
                            <img style="width:20%" src="{{ config('app.siteFavicon') }}" width="100" alt="">
                        </div>
                        <x-form.text name="tagline" value="{{old('tagline') ?? config('app.siteTagline')}}" type="text"/>
                    
                        <x-form.small-btn>Save Changes</x-form.small-btn>
                    </form>
                </div>
            </div>
        </div>
    </div>
            
</x-adminLayout>