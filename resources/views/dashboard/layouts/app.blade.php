
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tanmia - @yield('subtitle')</title>

    <link rel="icon" href="{{asset('b.png')}} "
          type="image/x-icon">

    <script src="{{asset('admin_assets/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="{{asset('admin_assets/plugins/morris/morris.css')}}">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- // -->



    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin_assets/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->



    {{--jquery--}}
    <script src="{{ asset('admin_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/jquery-ui.js') }}"></script>



    {{--datatable--}}
    <script type="text/javascript" src="{{ asset('admin_assets/plugins/jquery.dataTables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/plugins/dataTables.bootstrap/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


    <link rel="stylesheet" href="{{asset('admin_assets/plugins/magnific-popup/magnific-popup.css')}}">

    <!-- Plugin css for this page -->



    <link rel="stylesheet" href="{{asset('admin_assets/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <!-- End plugin css for this page -->


    <!-- Layout styles -->
    @if(app()->getLocale() === 'ar')
        <link rel="stylesheet" href="{{asset('admin_assets/assets/css/demo/styleAr.css')}}">
    @elseif(app()->getLocale() === 'he')
        <link rel="stylesheet" href="{{asset('admin_assets/assets/css/demo/styleHe.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('admin_assets/assets/css/demo/style.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('admin_assets/assets/css/demo/datatable.css')}}">


    <!-- End layout styles -->


    {{--jquery--}}


    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/noty/noty.css') }}">
    <script src="{{ asset('admin_assets/plugins/noty/noty.min.js') }}"></script>

    {{--datatable--}}
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
        .active {
            background-color: #c3a962;
            color: black;
        }
        .hr_sidebar{
            background-color: #c3a962;
        }




        .active_icon{
            color: black;
        }
    </style>

    </script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>



        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('b7238b3d6df784f2a296', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('massage-channel');
        channel.bind('sent-message-user', function(data) {
            let count = $('.count_notifications').html()
            let NewCount = parseInt(count)+1;
            $('.no_messages').remove()
            var url = '{{ route("admin.messages.show", ":id") }}';
            url = url.replace(':id', data.id);
            $('.count_notifications').html(NewCount)
             let li = `  <li class="mdc-list-item" role="menuitem">
                          <div class="item-thumbnail item-thumbnail-icon">
                                    <i class="mdi mdi-account-outline"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <a style=" text-decoration: none;color: black" href="${url}">
                                        <h6 class="item-subject font-weight-normal">
                                        ${data.name}   @lang('general.send_message')


             </h6>
         </a>
         <small class="text-muted"> ${data.time}</small>
                                </div>
                            </li>
`
            $('.notifications_id').append(li)







           // let NewCount = parseInt(count)+1;







        });
    </script>



    <!-- Styles -->
    @livewireStyles
    @stack('css')

</head>
<body>
<div class="body-wrapper">
    @include('dashboard.layouts.partials._session')
    <!-- partial:partials/_sidebar.html -->
    @include('dashboard.layouts.sidebar')
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
        <!-- partial:partials/_navbar.html -->
        @include('dashboard.layouts.header')
        <!-- partial -->
        @yield('content')
        <!-- partial:partials/_footer.html -->
        @include('dashboard.layouts.footer')
        <!-- partial -->
    </div>
</div>


@livewireScripts
<!-- Essential javascripts for application to work-->
<script src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin_assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('admin_assets/plugins/morris/morris.css') }}">
<style>
    .loader {
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    .loader-sm {
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid #009688;
        width: 40px;
        height: 40px;
    }

    .loader-md {
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #009688;
        width: 90px;
        height: 90px;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>


<script src="{{asset('admin_assets/assets/js/material.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/misc.js')}}"></script>

<script src="{{asset('admin_assets/assets/js/dashboard.js')}}"></script>

<script src="{{ asset('admin_assets/js/custom/index.js') }}"></script>
<script src="{{ asset('admin_assets/js/custom/roles.js') }}"></script>

<!-- End custom js for this page-->

<script>
    $('.all_delete').click(function (e) {

        var that = $(this)

        e.preventDefault();

        var n = new Noty(
            {
                text: "@lang('general.confirm_delete_msg')",
                type: "warning",
                @if(app()->getLocale() == 'ar')
                layout:'topLeft',
                @else
                layout:'topRight',
                @endif
                timeout: 3000,
                killer: true,
                buttons: [
                    Noty.button("@lang('general.yes')", 'btn btn-success mr-2', function () {

                        that.closest('form').submit();

                    }),

                    Noty.button("@lang('general.no')", 'btn btn-primary mr-2', function () {

                        n.close();

                    })
                ]
            }
        );

        n.show();

    });//end of delete
    $('.all_status').click(function (e) {

        var that = $(this)

        e.preventDefault();

        var n = new Noty(
            {
                text: "@lang('general.confirm_status_msg')",
                type: "success",
                @if(app()->getLocale() == 'ar')
                layout:'topLeft',
                @else
                layout:'topRight',
                @endif
                timeout: 3000,
                killer: true,
                buttons: [
                    Noty.button("@lang('general.yes')", 'btn btn-success mr-2', function () {

                        that.closest('form').submit();

                    }),

                    Noty.button("@lang('general.no')", 'btn btn-primary mr-2', function () {

                        n.close();

                    })
                ]
            }
        );

        n.show();

    });//end of delete

    $('.delete').click(function (e) {

        var that = $(this)

        e.preventDefault();

        var n = new Noty(
            {
                text: "@lang('general.confirm_delete_msg')",
                type: "warning",
                @if(app()->getLocale() == 'ar')
                layout:'topLeft',
                @else
                layout:'topRight',
                @endif
                timeout: 3000,
                killer: true,
                buttons: [
                    Noty.button("@lang('general.yes')", 'btn btn-success mr-2', function () {

                        that.closest('form').submit();

                    }),

                    Noty.button("@lang('general.no')", 'btn btn-primary mr-2', function () {

                        n.close();

                    })
                ]
            }
        );

        n.show();

    });//end of delete

    // image preview
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
    $(".image_Slider").change(function (e) {

        //each loop for multiple file preview

        if (e.target.files) {
            let filesAmount = e.target.files.length;
            $('.upload-img').html("");
            for (let i = 0; i < filesAmount; i++) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let html = `

                            <img src = "${e.target.result} "  style="width: 100px" class="img-thumbnail image-preview" alt="">


                    `;
                    $(".upload-img").append(html);
                }
                reader.readAsDataURL(e.target.files[i]);
            }

        }

    });

    $(".video").change(function () {

        //each loop for multiple file preview

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                $('.video-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });



    //select 2


</script>
<script  src="{{asset('admin_assets/plugins/morris/morris.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>


@stack('scripts')
</body>

</html>


