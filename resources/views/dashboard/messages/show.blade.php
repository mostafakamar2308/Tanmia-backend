@extends('.dashboard.layouts.app',  ['title' => __('general.messages')])

@section('content')
    <!-- Button trigger modal -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <!-- Modal -->

    <!-- Button trigger modal -->


    <!-- Modal -->



    <div class="mdc-layout-grid" style="margin-top: 20px;" >

        <div class="mdc-layout-grid__inner" style="margin-top: 1px">

            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">

                <div class="mdc-card p-0">


                    <div class="table-responsive">
                        <table style="width: 100%;" class="table m-0" id="messagesShow-table">
                            <thead  class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">
                            <tr >


                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.id')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.name')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.email')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.phone')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.object')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.message')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.status')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.created_at')</th>

                                <th>@lang('general.actions')</th>

                            </tr>
                            </thead>
                            <tbody class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">

                                <tr>
                                    <td class="text-capitalize ">{{$message->id}}</td>
                                    <td class="text-capitalize ">{{$message->name}}</td>
                                    <td class="text-capitalize ">{{$message->email}}</td>
                                    <td class="text-capitalize">{{$message->phone}}</td>
                                    <td class="text-capitalize">{{$message->subject}}</td>
                                    <td class="text-capitalize">{{$message->message}}</td>
                                    @if($message->status == 'replied')
                                        <td class="text-capitalize">
                                            <h5><span class="badge badge-success">@lang('general.replied')</span></h5>
                                        </td>
                                    @else
                                        <td class="text-capitalize">
                                        <h5><span class="badge badge-danger">@lang('general.waiting')</span></h5>
                                        </td>
                                    @endif

                                    <td class="text-capitalize">{{$message->created_at}}</td>

                                    <td class="text-capitalize">
                                        <div class="category_btn_del" style="display: inline-block">
                                            <form  action="{{ route('admin.messages.destroy', $message->id) }}" class="my-1 my-xl-0  " id="form_delete_messages" method="post" data-id="{{$message->id}}" >
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
                                            data-url="{{route('admin.messages.reply')}}" data-id="{{$message->id}}"
                                            data-message="{{$message->message}}}}"


                                        >
                                         <span class="material-symbols-outlined">
                                           reply
                                         </span>
                                        </button>
                                        <div  class="modal fade" id="edit_messages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog  modal-dialog-centered ">

                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLabel"> @lang('general.reply_name') {{$message->name}}</h5>





                                                    </div>
                                                    <form action="{{route('admin.messages.reply')}}" method="post" id="form_update_messages" data-id="" >
                                                        @csrf
                                                        <input type="hidden" name="_method" value="POST" id="method">
                                                        <input type="hidden" name="id" value="{{$message->id}}" id="id">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="name" value="{{ $message->name  }}">
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

                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>

        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });






            $(document).on('submit','#form_update_messages',function (e){
                e.preventDefault();

                let url = $(this).attr('action');
                let formData = new FormData($('#form_update_messages')[0]);
                console.log(url);




                $.ajax({
                    type: "POST",

                    dataType: 'json',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $("#edit_messages").modal("hide");
                        // $('#create_category').modal('hide');
                        $('#form_update_messages')[0].reset();

                        new Noty({
                            text: response.message,
                            type: "success",
                            @if(app()->getLocale() == 'ar')
                            layout:'topLeft',
                            @elseif(app()->getLocale() == 'he')
                            layout:'topLeft',
                            @else
                            layout:'topRight',
                            @endif
                            timeout: 3000,
                            killer: true,
                        }).show();
                    },
                    error: function (error) {


                        $(".print-error-msg_edit").find("ul").html('');
                        $(".print-error-msg_edit").css('display','block');
                        $.each(error.responseJSON.errors, function (key, value) {
                            console.log(value);
                            $(".print-error-msg_edit").find("ul").append('<li>'+value+'</li>');
                        });

                    }
                });
            });


            $(document).on('submit','#bulk_delete_messages',function (e){
                e.preventDefault();
                let formData = new FormData($('#bulk_delete_messages')[0]);
                $.ajax({
                    type: "post",
                    url: "{{route('admin.messages.bulk_delete')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        rolesTable.draw();
                        new Noty({
                            text: response.message,
                            type: "success",
                            @if(app()->getLocale() == 'ar')
                            layout:'topLeft',
                            @elseif(app()->getLocale() == 'he')
                            layout:'topLeft',
                            @else
                            layout:'topRight',
                            @endif
                            timeout: 3000,
                            killer: true,
                        }).show();
                    },
                    error: function (error) {
                        new Noty({
                            text: error.message,
                            type: "error",
                            @if(app()->getLocale() == 'ar')
                            layout:'topLeft',
                            @elseif(app()->getLocale() == 'he')
                            layout:'topLeft',
                            @else
                            layout:'topRight',
                            @endif
                            timeout: 3000,
                            killer: true,
                        }).show();
                    }
                });
            });


        });



    </script>

@endsection


