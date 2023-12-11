
 <div class="category_btn_del" style="display: inline-block">
     <form  action="{{ route('admin.sliders.destroy', $slider->id) }}" class="my-1 my-xl-0  " id="form_delete_slider" method="post" data-id="{{$slider->id}}" >
         @csrf
         @method('delete')
         <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
             <i class="material-icons mdc-button__icon">delete</i>
         </button>
     </form>
 </div>



 @if($slider->type === "image")
     <button
         class="mdc-button mdc-button--raised icon-button filled-button--success" data-toggle="modal"  id="edit_model_slider_image" data-url="{{route('admin.sliders.update',$slider->id)}}" data-id="{{$slider->id}}" data-image="{{$slider->image_path}}" >
         <i class="material-icons mdc-button__icon">colorize</i>
     </button>

     <div class="modal fade" id="edit_slider_show_image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

         <div class="modal-dialog">

             <div class="modal-content">
                 <div class="modal-header">

                     <h5 class="modal-title" id="exampleModalLabel">@lang('general.update')</h5>





                 </div>
                 <form action="{{route('admin.sliders.update',$slider->id)}}" method="post" id="form_update_slider_image" data-id="">
                     <input type="hidden" name="type" value="image" >

                     <input type="hidden" name="_method" value="PUT" id="method">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="modal-body">
                         <div class="container">
                             <div class="row">
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
                         <button id="submit_slider_update" type="submit" style="background-color: #c3a962" class="btn">@lang('general.update')</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>


 @else
     <button
         class="mdc-button mdc-button--raised icon-button filled-button--success" data-toggle="modal"  id="edit_model_slider_video" data-url="{{route('admin.sliders.update',$slider->id)}}" data-id="{{$slider->id}}" data-video="{{$slider->video_path}}" >
         <i class="material-icons mdc-button__icon">colorize</i>
     </button>


     <div class="modal fade" id="edit_slider_show_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

         <div class="modal-dialog">

             <div class="modal-content">
                 <div class="modal-header">

                     <h5 class="modal-title" id="exampleModalLabel">@lang('general.update')</h5>





                 </div>
                 <form action="{{route('admin.sliders.update',$slider->id)}}" method="post" id="form_update_slider_video" data-id="">

                     <input type="hidden" name="_method" value="PUT" id="method">
                     <input type="hidden" name="type" value="video" >
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="modal-body">
                         <div class="container">
                             <div class="row">
                                 <div class="form-group col-md-12"  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif">

                                     <label for="video" class="floating-label">@lang('general.video')</label>
                                     <input type="file" class="form-control " id="video" name="video"  >


                                 </div>

                             </div>
                             <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg_edit @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>
                         </div>


                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                         <button id="submit_slider_update" type="submit" style="background-color: #c3a962" class="btn">@lang('general.update')</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>

 @endif















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

