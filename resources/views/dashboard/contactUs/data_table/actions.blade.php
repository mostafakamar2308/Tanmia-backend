
 <div class="category_btn_del" style="display: inline-block">
     <form  action="{{ route('admin.contactUs.destroy', $contactUs->id) }}" class="my-1 my-xl-0  " id="form_delete_contactUs" method="post" data-id="{{$contactUs->id}}" >
         @csrf
         @method('delete')
         <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
             <i class="material-icons mdc-button__icon">delete</i>
         </button>
     </form>
 </div>




 <button
     class="mdc-button mdc-button--raised icon-button filled-button--success"
     data-toggle="modal" data-target="#edit_contactUs" id="edit_model_contactUs"
     data-url="{{route('admin.contactUs.update',$contactUs->id)}}" data-id="{{$contactUs->id}}"
    data-email="{{$contactUs->email}}"
     data-phone="{{$contactUs->phone}}"
     data-Fax="{{$contactUs->Fax}}"
     data-POBox="{{$contactUs->POBox}}"
     data-Box_no="{{$contactUs->Box_no}}"
     data-zip_code="{{$contactUs->zip_code}}"

 >
     <i class="material-icons mdc-button__icon">colorize</i>
 </button>




 <div  class="modal fade" id="edit_contactUs_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

     <div class="modal-dialog  modal-dialog-centered modal-lg">

         <div class="modal-content">
             <div class="modal-header">

                 <h5 class="modal-title" id="exampleModalLabel">@lang('general.update') @lang('general.contact_us')</h5>





             </div>
             <form action="{{route('admin.contactUs.update',$contactUs->id)}}" method="post" id="form_update_contactUs" data-id="" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="_method" value="PUT" id="method">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="modal-body">
                     <div class="container">
                         <div class="row">

                                 <div class="col-md-12">
                                     <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                         <label for="exampleInputEmail1">@lang('general.email')</label>
                                         <input type="email" class="form-control" name="email" id="email" value="{{$contactUs->email}}">
                                     </div>
                                 </div>

                             <div class="col-md-12">
                                 <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                     <label for="exampleInputEmail1">@lang('general.phone')</label>
                                     <input style="" type="tel" class="form-control text-right @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif" name="phone" id="phone" value="{{$contactUs->phone}}">
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                     <label for="exampleInputEmail1">@lang('general.fax')</label>
                                     <input type="tel" class="form-control  @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif" name="Fax" id="Fax" value="{{$contactUs->Fax}}">
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                     <label for="exampleInputEmail1">@lang('general.POBox')</label>
                                     <input type="text" class="form-control" name="POBox" id="POBox" value="{{$contactUs->POBox}}">
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                     <label for="exampleInputEmail1">@lang('general.Box_no')</label>
                                     <input  type="text" class="form-control" name="Box_no" id="Box_no" value="{{$contactUs->Box_no}}">
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                     <label for="exampleInputEmail1">@lang('general.zip_code')</label>
                                     <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{$contactUs->zip_code}}">
                                 </div>
                             </div>

                         </div>

                     </div>







                     <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg_edit @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                     <button type="submit" style="background-color: #c3a962" class="btn">@lang('general.update')</button>
                 </div>
             </form>
         </div>
     </div>
 </div>








        <!-- Button trigger modal -->




<script>



</script>

