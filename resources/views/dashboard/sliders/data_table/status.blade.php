
@if($slider->status == 'active')
    <h5><span class="badge badge-success">@lang('general.active')</span></h5>
@else
    <h5><span class="badge badge-danger">@lang('general.inactive')</span></h5>
@endif

