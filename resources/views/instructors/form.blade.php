<div class="form-group">
    <label for="exampleInputEmail1">{{ __('lang.name') }}</label>
    <input type="text" name="name" value="{{ old('name', $item->name ?? null) }}" class="form-control" id="exampleInputEmail1"
        placeholder="{{ trans('lang.name') }}" autocomplete="off">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">{{ trans('lang.email') }}</label>
    <input type="email" name="email" value="{{ old('email', $item->email ?? '') }}" class="form-control" id="exampleInputEmail1"
        placeholder="{{ trans('lang.email') }}" autocomplete="off">
</div>

<div class="form-group">
    <label>{{ trans('lang.phone') }}</label>
    <input type="text" name="phone" value="{{ old('phone', $item->phone ?? '') }}" class="form-control"
        placeholder="{{ trans('lang.phone') }}" autocomplete="off">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">{{ __('lang.password') }}</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
        placeholder="{{ __('lang.password') }}">
</div>

<div class="form-group">
    <label for="exampleInputFile">File input</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
    </div>

    @if(isset($item))
        <img src="{{ \Storage::url($item->avatar) }}" width="100" height="100">
    @endif 
</div>