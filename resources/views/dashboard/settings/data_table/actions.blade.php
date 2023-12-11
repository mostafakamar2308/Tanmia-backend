
 <div class="category_btn_del" style="display: inline-block">
     <form  action="{{ route('admin.settings.destroy', $settings->id) }}" class="my-1 my-xl-0  " id="form_delete_settings" method="post" data-id="{{$settings->id}}" >
         @csrf
         @method('delete')
         <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
             <i class="material-icons mdc-button__icon">delete</i>
         </button>
     </form>
 </div>




 <button
     class="mdc-button mdc-button--raised icon-button filled-button--success" data-toggle="modal" data-target="#edit_category" id="edit_model_settings" data-url="{{route('admin.settings.update',$settings->id)}}" data-id="{{$settings->id}}"
     data-name_en="{{$settings->translate('en')->title}}"
     data-name_he="{{$settings->translate('he')->title}}"
     data-name_ar="{{$settings->translate('ar')->title}}"


     data-image="{{$settings->image_path}}" >
     <i class="material-icons mdc-button__icon">colorize</i>
 </button>





 <div class="modal fade" id="edit_settings_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

     <div class="modal-dialog">

         <div class="modal-content">
             <div class="modal-header">

                 <h5 class="modal-title" id="exampleModalLabel">@lang('general.update')</h5>





             </div>
             <form action="{{route('admin.settings.update',$settings->id)}}" method="post" id="form_update_settings" data-id="">

                 <input type="hidden" name="_method" value="PUT" id="method">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             @foreach(config('translatable.locales') as $locale)
                                 <div class=" col-md-12" style="margin-top: 10px;">
                                     <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                         <label for="exampleInputEmail1">@lang('general.'.$locale.'.name')</label>
                                         <input style="border: black 2px solid;border-radius: 10px" type="text" class="form-control" name="{{$locale}}[name]" id="{{$locale}}-name" value="{{$settings->translate($locale)->name}}">
                                     </div>
                                 </div>
                             @endforeach



                             <div class="form-group col-md-12"  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif">

                                 <label for="Image" class="floating-label">@lang('general.image')</label>
                                 <input type="file" class="form-control image" id="image" name="image"  >


                             </div>

                             <div class="form-group col-md-12">
                                 <div class="form-group">
                                     <img src=""  style="width: 100px" class="img-thumbnail image-preview" alt="">
                                 </div>


                             </div>
                         </div>
                         <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg_edit @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>
                     </div>


                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                     <button id="submit_settings_update" type="submit" style="background-color: #c3a962" class="btn">@lang('general.update')</button>
                 </div>
             </form>
         </div>
     </div>
 </div>








        <!-- Button trigger modal -->




<script>

    $(".image").change(function () {
        console.log(this.files);
        //each loop for multiple file preview

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });


</script>

