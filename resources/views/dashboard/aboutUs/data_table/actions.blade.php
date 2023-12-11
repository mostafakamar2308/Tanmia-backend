
 <div class="category_btn_del" style="display: inline-block">
     <form  action="{{ route('admin.aboutUs.destroy', $aboutUs->id) }}" class="my-1 my-xl-0  " id="form_delete_aboutUs" method="post" data-id="{{$aboutUs->id}}" >
         @csrf
         @method('delete')
         <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
             <i class="material-icons mdc-button__icon">delete</i>
         </button>
     </form>
 </div>




 <button
     class="mdc-button mdc-button--raised icon-button filled-button--success"
     data-toggle="modal" data-target="#edit_aboutUs" id="edit_model_aboutUs"
     data-url="{{route('admin.aboutUs.update',$aboutUs->id)}}" data-id="{{$aboutUs->id}}"
     data-name_en="{{$aboutUs->translate('en')->name}}"
     data-name_he="{{$aboutUs->translate('he')->name}}"
     data-name_ar="{{$aboutUs->translate('ar')->name}}"

     data-description_en="{{$aboutUs->translate('en')->description}}"
     data-description_he="{{$aboutUs->translate('he')->description}}"
     data-description_ar="{{$aboutUs->translate('ar')->description}}"
        data-image="{{$aboutUs->image}}"
 >
     <i class="material-icons mdc-button__icon">colorize</i>
 </button>




 <div  class="modal fade" id="edit_aboutUs_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

     <div class="modal-dialog  modal-dialog-centered modal-lg">

         <div class="modal-content">
             <div class="modal-header">

                 <h5 class="modal-title" id="exampleModalLabel">@lang('general.update') @lang('general.about_us')</h5>





             </div>
             <form action="{{route('admin.aboutUs.update',$aboutUs->id)}}" method="post" id="form_update_aboutUs" data-id="" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="_method" value="PUT" id="method">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             @foreach(config('translatable.locales') as $locale)
                                 <div class="col-md-4" style="margin-top: 10px;">
                                     <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                         <label for="exampleInputEmail1">@lang('general.'.$locale.'.name')</label>
                                         <input style="border: black 2px solid;border-radius: 10px" type="text" class="form-control" name="{{$locale}}[name]" id="{{$locale}}-name" value="{{$aboutUs->translate($locale)->name}}">
                                     </div>
                                 </div>
                                 <div class="col-md-8">

                                     <div style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-input">
                                         <label class="col-form-label" for="exampleFormControlTextarea1">@lang('general.'.$locale.'.description')</label>
                                         <textarea  style="border: #c3a962 2px solid;border-radius: 20px" name="{{$locale}}[description]"  class="form-control" id="{{$locale}}-description" rows="3"></textarea>
                                     </div>
                                 </div>

                             @endforeach








                                 <div class="form-group col-md-12"  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif">

                                     <label for="Image" class="floating-label">@lang('general.image')</label>
                                     <input type="file" class="form-control image" id="image" name="image"  >


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

