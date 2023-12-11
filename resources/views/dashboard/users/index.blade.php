@extends('.dashboard.layouts.app')
@section('subtitle', __('general.admins'))

@section('content')
    <!-- Button trigger modal -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="create_users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">@lang('general.create') @lang('general.admin') </h5>





                </div>
                <form action="{{route('admin.users.store')}}" method="post" id="form_create_users" >
                    @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input_name"  type="text" name="name" value="{{ old('name') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input_name" class="mdc-floating-label">@lang('general.name')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input_email"  type="email" name="email" value="{{ old('email') }}" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input_email" class="mdc-floating-label">@lang('general.email')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input_password"  type="password" name="password"  required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input_password" class="mdc-floating-label">@lang('general.password')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop" style="margin-bottom: 22px">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="form-input mdc-text-field__input" id="text-field-hero-input_password_confirmation"  type="password" name="password_confirmation" value="" required>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input_password_confirmation" class="mdc-floating-label">@lang('general.password_confirmation')</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg  @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>
                    </div>



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
            <button type="button" class="mdc-button mdc-button--raised filled-button--btn" data-toggle="modal" data-target="#create_users">
                <i class="material-icons mdc-button__icon">add</i>

                @lang('general.create')
            </button>
            <form method="post" action="{{ route('admin.users.bulk_delete') }}" style="display: inline-block;" id="bulk_delete_users">
                @csrf
                @method('delete')
                <input type="hidden" name="record_ids" class="record-ids">
                <button class="mdc-button mdc-button--raised filled-button--btn all_delete"  disabled="true" id="bulk-delete">
                    <i class="material-icons mdc-button__icon">delete</i>

                    @lang('general.bulk_delete')
                </button>
            </form><!-- end of form -->
            <form method="post" action="{{route('admin.users.status')}}" style="display: inline-block;" id="status_users">
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
                        <table style="width: 100%;" class="table m-0" id="users-table">
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

                             <th  class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.id')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.name')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.email')</th>
                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.status')</th>
                               <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.created_at')</th>

                                <th class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">@lang('general.actions')</th>

                            </tr>
                            </thead>

                            <tbody id="tbody">
                            @forelse($admins as $admin)
                                <tr id="tr_body_users">
                                    <td>
                                        <div class="animated-checkbox">
                                            <label class="m-0">
                                                <input type="checkbox" class="record__select" value="{{$admin->id }}">
                                                <span class="label-text"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td id="last_id" class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">{{ $loop->iteration }}</td>
                                    <td class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">{{$admin->name}}</td>
                                    <td class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">{{$admin->email}}</td>
                                    <td class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">
                                        @if($admin->status == 'active')
                                            <h5><span class="badge badge-success">@lang('general.active')</span></h5>
                                        @else
                                            <h5><span class="badge badge-danger">@lang('general.inactive')</span></h5>
                                        @endif



                                    </td>
                                    <td class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">{{$admin->created_at->format('Y-m-d')}}</td>
                                    <td class="@if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif">

                                        <div class="category_btn_del" style="display: inline-block">
                                            <form  action="{{ route('admin.users.destroy', $admin->id) }}" class="my-1 my-xl-0  " id="form_delete_users" method="post" data-id="{{$admin->id}}" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="mdc-button mdc-button--raised icon-button filled-button--secondary delete">
                                                    <i class="material-icons mdc-button__icon">delete</i>
                                                </button>
                                            </form>
                                        </div>




                                        <button class="mdc-button mdc-button--raised icon-button filled-button--success" data-toggle="modal" data-target="#edit_category_{{$admin->id}}" id="edit_model_users">
                                            <i class="material-icons mdc-button__icon">colorize</i>
                                        </button>
                                        <div class="modal fade" id="edit_category_{{$admin->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLabel">@lang('general.update')</h5>

                                                    </div>
                                                    <form action="{{route('admin.users.update',$admin->id)}}" method="post" id="form_update_users" data-id="" enctype="multipart/form-data">

                                                        <input type="hidden" name="_method" value="PUT" id="method">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12" style="margin-top: 10px;">
                                                                        <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                                                            <label for="exampleInputEmail1">@lang('general.name')</label>
                                                                            <input style="border: black 2px solid;border-radius: 10px" type="text" class="form-control" name="name" id="name_user" value="{{$admin->name}}" >
                                                                            @error('name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin-top: 10px;">
                                                                        <div  style="text-align: @if(app()->getLocale() === 'ar' ) right @elseif(app()->getLocale() === "he") right @else left @endif" class="form-group">
                                                                            <label for="exampleInputEmail1">@lang('general.email')</label>
                                                                            <input style="border: black 2px solid;border-radius: 10px" type="email" class="form-control" name="email" id="email_user" value="{{$admin->email}}">
                                                                            @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div  style="display: none;margin-top: 10px;border: 2px solid saddlebrown; border-radius: 20px" class="alert alert-danger print-error-msg_edit @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"> <ul></ul></div>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                                                            <button id="submit_users_update" type="submit" style="background-color: #c3a962" class="btn">@lang('general.update')</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                    </td>

                                </tr>
                            @empty
                                <div class="alert alert-dark" role="alert" style="text-align: center">
                                    <strong>@lang('site.no_data_found')</strong>
                                </div>
                            @endforelse


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection


