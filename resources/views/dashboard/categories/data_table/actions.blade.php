
 <div class="category_btn_del" style="display: inline-block">
     <form  action="{{ route('admin.categories.destroy', $category->id) }}" class="my-1 my-xl-0  " id="form_delete_category" method="post" data-id="{{$category->id}}" >
         @csrf
         @method('delete')
         <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
             <i class="material-icons mdc-button__icon">delete</i>
         </button>
     </form>
 </div>




 <button
     class="mdc-button mdc-button--raised icon-button filled-button--success" data-toggle="modal" data-target="#edit_category" id="edit_model_category" data-url="{{route('admin.categories.update',$category->id)}}" data-id="{{$category->id}}" data-name_en="{{$category->translate('en')->name}}" data-name_he="{{$category->translate('he')->name}}" data-name_ar="{{$category->translate('ar')->name}}">
     <i class="material-icons mdc-button__icon">colorize</i>
 </button>





 <div class="modal fade" id="edit_category_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

     <div class="modal-dialog">

         <div class="modal-content">
             <div class="modal-header">

                 <h5 class="modal-title" id="exampleModalLabel">@lang('general.update')</h5>





             </div>
             <form action="{{route('admin.categories.update',$category->id)}}" method="post" id="form_update_category" data-id="">

                 <input type="hidden" name="_method" value="PUT" id="method">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="modal-body">
                     @foreach(config('translatable.locales') as $locale)
                         <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                             <label for="exampleInputEmail1">@lang('general.'.$locale.'.name')</label>
                             <input type="text" class="form-control" name="{{$locale}}[name]" id="{{$locale}}-name" value="{{$category->translate($locale)->name}}">
                         </div>


                     @endforeach
                     <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg_edit  @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                     <button id="submit_category_update" type="submit" style="background-color: #c3a962" class="btn">@lang('general.update')</button>
                 </div>
             </form>
         </div>
     </div>
 </div>








        <!-- Button trigger modal -->




<script>



</script>

