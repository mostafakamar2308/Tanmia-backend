
 <div class="category_btn_del" style="display: inline-block">
     <form  action="{{ route('admin.messages.destroy', $messages->id) }}" class="my-1 my-xl-0  " id="form_delete_messages" method="post" data-id="{{$messages->id}}" >
         @csrf
         @method('delete')
         <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
             <i class="material-icons mdc-button__icon">delete</i>
         </button>
     </form>
 </div>




 <button
     class="mdc-button mdc-button--raised icon-button filled-button--success"
     data-toggle="modal" data-target="#edit_messages" id="edit_model_messages"
     data-url="{{route('admin.messages.reply')}}" data-id="{{$messages->id}}"
     data-message="{{$messages->message}}}}"


 >
    <span class="material-symbols-outlined">
reply
</span>
 </button>




 <div  class="modal fade" id="edit_messages_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

     <div class="modal-dialog  modal-dialog-centered ">

         <div class="modal-content">
             <div class="modal-header">

                 <h5 class="modal-title" id="exampleModalLabel"> @lang('general.reply_name') {{$messages->name}}</h5>





             </div>
             <form action="{{route('admin.messages.reply')}}" method="post" id="form_update_messages" data-id="" >
                 @csrf
                 <input type="hidden" name="_method" value="POST" id="method">
                    <input type="hidden" name="id" value="" id="id">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="modal-body">
                     <div class="container">
                         <div class="row">



                                 <div style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-input col-md-12">
                                     <label class="col-form-label" for="exampleFormControlTextarea1">@lang('general.message')</label>
                                     <textarea  style="border: #c3a962 2px solid;border-radius: 20px" name="replay"  class="form-control"  rows="3"></textarea>




                                    </div>

                          </div>







                     <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg_edit @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                     <button type="submit" style="background-color: #c3a962" class="btn">@lang('general.replay')</button>
                 </div>

                 </div>
             </form>

         </div>
     </div>
 </div>








        <!-- Button trigger modal -->




<script>



</script>

