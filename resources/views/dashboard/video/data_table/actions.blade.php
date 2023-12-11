
 <div class="category_btn_del" style="display: inline-block">
     <form  action="{{ route('admin.video.destroy', $video->id) }}" class="my-1 my-xl-0  " id="form_delete_video" method="post" data-id="{{$video->id}}" >
         @csrf
         @method('delete')
         <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
             <i class="material-icons mdc-button__icon">delete</i>
         </button>
     </form>
 </div>




 <button
     class="mdc-button mdc-button--raised icon-button filled-button--success" data-toggle="modal" data-target="#edit_category" id="edit_model_video" data-url="{{route('admin.video.update',$video->id)}}" data-id="{{$video->id}}" data-video="{{$video->video_path}}" >
     <i class="material-icons mdc-button__icon">colorize</i>
 </button>





 <div class="modal fade" id="edit_video_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

     <div class="modal-dialog">

         <div class="modal-content">
             <div class="modal-header">

                 <h5 class="modal-title" id="exampleModalLabel">@lang('general.update')</h5>





             </div>
             <form action="{{route('admin.video.update',$video->id)}}" method="post" id="form_update_video" data-id="" enctype="multipart/form-data">

                 <input type="hidden" name="_method" value="PUT" id="method">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="form-group col-md-12"  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif">

                                 <label for="Image" class="floating-label">@lang('general.image')</label>
                                 <input type="file" class="form-control video " id="video" name="video"  >


                             </div>

                         </div>
                         <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg_edit @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>
                     </div>


                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                     <button id="submit_video_update" type="submit" style="background-color: #c3a962" class="btn">@lang('general.update')</button>
                 </div>
             </form>
         </div>
     </div>
 </div>








        <!-- Button trigger modal -->






