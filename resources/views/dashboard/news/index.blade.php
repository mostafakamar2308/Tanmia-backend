@extends('.dashboard.layouts.app')
@section('subtitle', __('general.news'))

@section('content')
    <!-- Button trigger modal -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="create_news" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">@lang('general.create') @lang('general.new')</h5>





                </div>
                <form action="{{route('admin.news.store')}}" method="post" id="form_create_news" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @foreach(config('translatable.locales') as $locale)
                            <div class="col-md-4">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input"  name="{{$locale}}[title]" value="{{ old($locale.'.title') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.'.$locale.'.title')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-8">

                                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                        <div class="mdc-text-field mdc-text-field--outlined">

                                            <textarea name="{{$locale}}[description]"   class="form-input mdc-text-field__input" id="text-field-hero-input" required>{{ old($locale.'.description') }}</textarea>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.'.$locale.'.description')</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                @foreach(config('translatable.locales') as $locale)
                                <div class="col-md-4">

                                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="form-input mdc-text-field__input" id="text-field-hero-input"  name="{{$locale}}[short_name]" value="{{ old($locale.'.short_name') }}" required>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.'.$locale.'.short_name')</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="form-group col-md-12">
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <select  name="category_id" class="form-input mdc-text-field__input" id="text-field-hero-input-category_id">
                                           <option value="" selected disabled></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input-category_id" class="mdc-floating-label">@lang('general.categories')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>





                                <div class="form-group  col-md-12">
                                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input type="file" class="form-input mdc-text-field__input image" id="text-field-hero-input"  name="image">
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label for="text-field-hero-input" class="mdc-floating-label">@lang('general.image')</label>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
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
            <button type="button" class="mdc-button mdc-button--raised filled-button--btn" data-toggle="modal" data-target="#create_news">
                <i class="material-icons mdc-button__icon">add</i>

                @lang('general.create')
            </button>
            <form method="post" action="{{ route('admin.news.bulk_delete') }}" style="display: inline-block;" id="bulk_delete_news">
                @csrf
                @method('delete')
                <input type="hidden" name="record_ids" class="record-ids">
                <button class="mdc-button mdc-button--raised filled-button--btn all_delete"  disabled="true" id="bulk-delete">
                    <i class="material-icons mdc-button__icon">delete</i>

                    @lang('general.bulk_delete')
                </button>
            </form><!-- end of form -->
            <form method="post" action="{{route('admin.news.status')}}" style="display: inline-block;" id="status_news">
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
                        <table style="width: 100%;" class="table m-0" id="news-table">
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
                                <th>@lang('general.title')</th>
                                <th>@lang('general.short_name')</th>
                                <th>@lang('general.description')</th>
                                <th>@lang('general.image')</th>
                                <th>@lang('general.category')</th>
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
        let rolesTable = $('#news-table').DataTable({
            sPaginationType: "full_numbers",
            dom: "tiplr",
            serverSide: true,
            processing: true,
            responsive: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('admin.news.data') }}',
            },
            columns: [

                {data: 'record_select', name: 'record_select', orderable: false, searchable: false },
                {data: 'id', name: 'id' ,orderable: false, searchable: false},
                {data: 'title', name: 'title', searchable: true, sortable: true },
                {data: 'short_name', name: 'short_name', searchable: true, sortable: true },
                {data: 'description', name: 'description', searchable: false, sortable: false ,orderable: false},
                {data: 'image', name: 'image', searchable: false, sortable: false ,orderable: false},
                {data: 'category_id', name: 'category_id', searchable: true, sortable: false },
                {data: 'status', name: 'status',  sortable: true , },

                {data: 'created_at', name: 'created_at', searchable: false },
                {data: 'actions', name: 'actions', searchable: false, sortable: false ,orderable: false},
            ],
            order: [[6, 'desc']],
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
        $(document).on('submit','#form_create_news',function (e){
            e.preventDefault();
            let formData = new FormData($('#form_create_news')[0]);
            $.ajax({
                type: "post",
                url: "{{route('admin.news.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#create_news").modal("hide");

                    // $('#create_category').modal('hide');
                    $('#form_create_news')[0].reset();
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

        $(document).on('submit','#form_delete_news',function(e){
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

        $(document).on('click','#edit_model_news',function (e){
            e.preventDefault();
              let url = $(this).data('url');
            let id = $(this).data('id');
            let name_ar = $(this).data('name_ar');
            let name_en = $(this).data('name_en');
            let name_he = $(this).data('name_he');

            let short_name_ar = $(this).data('short_name_ar');
            let short_name_en = $(this).data('short_name_en');
            let short_name_he = $(this).data('short_name_he');
            let description_ar = $(this).data('description_ar');
            let description_en = $(this).data('description_en');
            let description_he = $(this).data('description_he');

            let category_name = $(this).data('category_name');
            let category_id = $(this).data('category_id');
            console.log(category_id,'category_id');


            $('#edit_news_show').modal('show');
            $("#edit_news_show").find('#ar_short_name').val(short_name_ar);
            $("#edit_news_show").find('#en_short_name').val(short_name_en);
            $("#edit_news_show").find('#he_short_name').val(short_name_he);

            $("#edit_news_show").find('#ar-name').val(name_ar);
            $("#edit_news_show").find('#en-name').val(name_en);
            $("#edit_news_show").find('#he-name').val(name_he);

            $("#edit_news_show").find('#ar-description').val(description_ar);
            $("#edit_news_show").find('#en-description').val(description_en);
            $("#edit_news_show").find('#he-description').val(description_he);

            $('#edit_news_show #form_update_news').attr('action',url);
            $('#edit_news_show #form_update_news').attr('data-id',id);

             $('#edit_news_show #category_id').find('#category_option_id').val(category_id);
             $('#edit_news_show #category_id').find('#category_option_id').html(category_name);
             $('#edit_news_show #category_id').find('#category_option_id').attr('selected',true);



        });

        $(document).on('submit','#form_update_news',function (e){
            e.preventDefault();

            let url = $(this).attr('action');
            let formData = new FormData($('#form_update_news')[0]);




            $.ajax({
                type: "POST",

                dataType: 'json',
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#edit_news_show").modal("hide");
                    // $('#create_category').modal('hide');
                    $('#form_update_news')[0].reset();
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
                    console.log(error.responseJSON)

                    $(".print-error-msg_edit").find("ul").html('');
                    $(".print-error-msg_edit").css('display','block');
                    $.each(error.responseJSON.errors, function (key, value) {
                        console.log(value);
                        $(".print-error-msg_edit").find("ul").append('<li>'+value+'</li>');
                    });

                }
            });
        });

       $(document).on('submit','#bulk_delete_news',function (e){
           e.preventDefault();
           let formData = new FormData($('#bulk_delete_news')[0]);
           $.ajax({
               type: "post",
               url: "{{route('admin.news.bulk_delete')}}",
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

        $(document).on('submit','#status_news',function (e){
            e.preventDefault();
            let formData = new FormData($('#status_news')[0]);
            $.ajax({
                type: "post",
                url: "{{route('admin.news.status')}}",
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


