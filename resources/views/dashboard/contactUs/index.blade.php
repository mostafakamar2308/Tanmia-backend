@extends('.dashboard.layouts.app')
@section('subtitle', __('general.contact_us'))

@section('content')
    <!-- Button trigger modal -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="create_contactUs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">@lang('general.create') @lang('general.contact_us')</h5>





                </div>
                <form action="{{route('admin.contactUs.store')}}" method="post" id="form_create_contactUs" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                              <div class="col-md-12">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input"  type="email" name="email" value="{{ old('email') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.email')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input"  type="tel" name="phone" value="{{ old('phone') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.phone')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input"  type="tel" name="Fax" value="{{ old('fax') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.fax')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input"  type="text" name="POBox" value="{{ old('POBox') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.POBox')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input"  type="text" name="zip_code" value="{{ old('zip_code') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.zip_code')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input"  type="text" name="Box_no" value="{{ old('Box_no') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.Box_no')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>












                        </div>

                    </div>







                        <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg  @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn_close" data-dismiss="modal">@lang('general.close')</button>
                    <button type="submit" style="background-color: #c3a962" class="btn">@lang('general.create')</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Button trigger modal -->


    <!-- Modal -->



    <div class="mdc-layout-grid" style="margin-top: 20px;" >
        <div style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif">
            <button type="button" class="mdc-button mdc-button--raised filled-button--btn" data-toggle="modal" data-target="#create_contactUs">
                <i class="material-icons mdc-button__icon">add</i>

                @lang('general.create')
            </button>
            <form method="post" action="{{ route('admin.contactUs.bulk_delete') }}" style="display: inline-block;" id="bulk_delete_contactUs">
                @csrf
                @method('delete')
                <input type="hidden" name="record_ids" class="record-ids">
                <button class="mdc-button mdc-button--raised filled-button--btn all_delete"  disabled="true" id="bulk-delete">
                    <i class="material-icons mdc-button__icon">delete</i>

                    @lang('general.bulk_delete')
                </button>
            </form><!-- end of form -->
            <form method="post" action="{{route('admin.contactUs.status')}}" style="display: inline-block;" id="status_contactUs">
                @csrf
                @method('POST')
                <input type="hidden" name="record_ids" class="record-ids">
                <button type="submit" id="status_id" class="mdc-button mdc-button--raised filled-button--btn all_status"  disabled="disabled">
                    <i class="material-icons mdc-button__icon">colorize</i>

                    @lang('general.Change_Status')</button>
            </form><!-- end of form -->

            <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start" style="color: black">
                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex" style="background-color: white;border-radius: 20px" >
                    <i class="material-icons mdc-text-field__icon">search</i>
                    <input class="mdc-text-field__input  data-table-search" id="text-field-hero-input">
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__notch">
                            <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.search')</label>
                        </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
            </div>


        </div>

        <div class="mdc-layout-grid__inner" style="margin-top: 1px">

            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">

                <div class="mdc-card p-0">


                    <div class="table-responsive">
                        <table style="width: 100%;" class="table m-0" id="contactUs-table">
                            <thead >
                            <tr >
                                <th  class= "@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">

                                    <div class="animated-checkbox">
                                        <label class="m-0">
                                            <input type="checkbox" id="record__select-all">
                                            <span class="label-text"></span>
                                        </label>
                                    </div>
                                </th>

                             <th>@lang('general.id')</th>
                                <th>@lang('general.email')</th>
                                <th>@lang('general.phone')</th>
                                <th>@lang('general.fax')</th>
                                <th>@lang('general.POBox')</th>
                                <th>@lang('general.Box_no')</th>
                                <th>@lang('general.zip_code')</th>
                                <th>@lang('general.status')</th>
                               <th>@lang('general.created_at')</th>

                                <th>@lang('general.actions')</th>

                            </tr>
                            </thead>

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
        let rolesTable = $('#contactUs-table').DataTable({
            sPaginationType: "full_numbers",
            dom: "tiplr",
            serverSide: true,
            processing: true,
            responsive: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('admin.contactUs.data') }}',
            },
            columns: [

                {data: 'record_select', name: 'record_select', orderable: false, searchable: false },
                {data: 'id', name: 'id',orderable: false, searchable: false},
                {data: 'email', name: 'email', searchable: true, sortable: true },

                {data: 'phone', name: 'phone', searchable: true, sortable: true },
                {data: 'Fax', name: 'Fax', searchable: false, sortable: false ,orderable: false },
                {data: 'POBox', name: 'POBox', searchable: false, sortable: false ,orderable : false},
                {data: 'Box_no', name: 'Box_no', searchable: false, sortable: false  ,orderable: false},
                {data: 'zip_code', name: 'zip_code', searchable: false, sortable: false ,orderable: false},
                {data: 'status', name: 'status',  sortable: true , },
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false ,orderable: false},
            ],
            order: [[8, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
                $('#status_id').attr('disabled', true);

            }

        });
        $('.data-table-search').keyup(function () {
            rolesTable.search(this.value).draw();
        })
        $(document).on('submit','#form_create_contactUs',function (e){
            e.preventDefault();
            let formData = new FormData($('#form_create_contactUs')[0]);
            $.ajax({
                type: "post",
                url: "{{route('admin.contactUs.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#create_contactUs").modal("hide");

                    // $('#create_category').modal('hide');
                    $('#form_create_contactUs')[0].reset();
                    rolesTable.draw();
                    new Noty({
                        text: response.message,
                        type: "success",
                        @if(app()->getLocale() == 'ar')
                        layout:'topLeft',
                        @else
                        layout:'topRight',
                        @endif
                        timeout: 3000,
                        killer: true,
                    }).show();
                },
                error: function (error) {

                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display','block');
                    $.each(error.responseJSON.errors, function (key, value) {
                        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });

                }
            });
        });

        $(document).on('submit','#form_delete_contactUs',function(e){
            let id = $(this).data('id');
            let url = $(this).attr('action');

            e.preventDefault();
            var n = new Noty(
                {
                    text: "@lang('general.confirm_delete_msg')",
                    type: "warning",
                    @if(app()->getLocale() == 'ar')
                    layout:'topLeft',
                    @elseif(app()->getLocale() == 'he')
                    layout:'topLeft',
                    @else
                    layout:'topRight',
                    @endif
                    timeout: 3000,
                    killer: true,
                    id:id,
                    url:url,
                    buttons: [
                        Noty.button("@lang('general.yes')", 'btn btn-success mr-2', function ()
                            {
                                $.ajax({
                                    type: "DELETE",
                                    url: url,
                                    data: {
                                        '_token': "{{csrf_token()}}",
                                        'id': id,
                                    },
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
                            }



                        ),

                        Noty.button("@lang('general.no')", 'btn btn-primary mr-2', function () {

                            n.close();

                        })
                    ]
                }
            );

            n.show();


        })

        $(document).on('click','#edit_model_contactUs',function (e){
            e.preventDefault();
              let url = $(this).data('url');
            let id = $(this).data('id');
            let name_ar = $(this).data('name_ar');
            let name_en = $(this).data('name_en');
            let name_he = $(this).data('name_he');
            let description_ar = $(this).data('description_ar');
            let description_en = $(this).data('description_en');
            let description_he = $(this).data('description_he');




            $('#edit_contactUs_show').modal('show');
            $("#edit_contactUs_show").find('#ar-name').val(name_ar);
            $("#edit_contactUs_show").find('#en-name').val(name_en);
            $("#edit_contactUs_show").find('#he-name').val(name_he);
            $("#edit_contactUs_show").find('#ar-description').val(description_ar);
            $("#edit_contactUs_show").find('#en-description').val(description_en);
            $("#edit_contactUs_show").find('#he-description').val(description_he);

            $('#edit_contactUs_show #form_update_contactUs').attr('action',url);
            $('#edit_contactUs_show #form_update_contactUs').attr('data-id',id);





        });

        $(document).on('submit','#form_update_contactUs',function (e){
            e.preventDefault();

            let url = $(this).attr('action');
            let formData = new FormData($('#form_update_contactUs')[0]);




            $.ajax({
                type: "POST",

                dataType: 'json',
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#edit_contactUs_show").modal("hide");
                    // $('#create_category').modal('hide');
                    $('#form_update_contactUs')[0].reset();
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


                    $(".print-error-msg_edit").find("ul").html('');
                    $(".print-error-msg_edit").css('display','block');
                    $.each(error.responseJSON.errors, function (key, value) {
                        console.log(value);
                        $(".print-error-msg_edit").find("ul").append('<li>'+value+'</li>');
                    });

                }
            });
        });

       $(document).on('submit','#bulk_delete_contactUs',function (e){
           e.preventDefault();
           let formData = new FormData($('#bulk_delete_contactUs')[0]);
           $.ajax({
               type: "post",
               url: "{{route('admin.contactUs.bulk_delete')}}",
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

        $(document).on('submit','#status_contactUs',function (e){
            e.preventDefault();
            let formData = new FormData($('#status_contactUs')[0]);
            $.ajax({
                type: "post",
                url: "{{route('admin.contactUs.status')}}",
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


