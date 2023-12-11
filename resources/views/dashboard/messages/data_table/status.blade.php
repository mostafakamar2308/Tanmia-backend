
@if($message->status == 'replied')
    <h5><span class="badge badge-success">@lang('general.replied')</span></h5>
@else
    <h5><span class="badge badge-danger">@lang('general.waiting')</span></h5>
@endif

