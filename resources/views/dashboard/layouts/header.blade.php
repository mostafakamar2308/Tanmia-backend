<header class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>

        </div>
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
                <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <img src="{{auth()->user()->profile_photo_url}}" alt="user" class="user">
                  </span>
                  <span class="user-name">{{auth()->user()->name}}</span>
                </span>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon-only">
                                <i class="mdi mdi-account-edit-outline text-primary"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                             <a href="{{route('profile.show')}}"><h6 class="item-subject font-weight-normal">@lang('general.Edit_profile')</h6></a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="divider d-none d-md-block"></div>

            <div class="menu-button-container d-none d-md-block">
                <button class="mdc-button mdc-menu-button">
                    <i class="mdi mdi-flag"></i>
                </button>
                @if(!request()->is('user/profile'))
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="mdc-list-item" role="menuitem">
                                <a  style="text-align: center" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native']}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="menu-button-container">
                <button class="mdc-button mdc-menu-button">
                    <i class="mdi mdi-email"></i>
                    <span class="count-indicator">
                  <span class="count count_notifications">
                      @if(isset($count))
                                {{$count}}
                    @else
                          {{ auth()->user()->unreadNotifications->count() }}
                      @endif


                  </span>
                </span>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <h6 class="title @if(app()->getLocale() === "ar") text-right @elseif(app()->getLocale() === "he")  text-right @else text-left @endif"><i class="mdi mdi-email-outline mr-2 tx-16"></i> @lang('general.messages')</h6>
                    <ul class="mdc-list notifications_id" role="menu" aria-hidden="true" aria-orientation="vertical">
          @if(auth()->user()->unreadNotifications->count() > 0)
                        @foreach(auth()->user()->unreadNotifications as $notification)


                                <li class="mdc-list-item" role="menuitem">
                                    <div class="item-thumbnail item-thumbnail-icon">
                                        <i class="mdi mdi-account-outline"></i>
                                    </div>
                                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                        <a style=" text-decoration: none;color: black" href="{{route('admin.messages.show',$notification->data['id'])}}">
                                            <h6 class="item-subject font-weight-normal">
                                                {{$notification->data['name']}} @lang('general.send_message')


                                            </h6>
                                        </a>
                                        <small class="text-muted"> {{ $notification->created_at->diffForhumans() }}</small>
                                    </div>
                                </li>





                        @endforeach
                        @else
                            <li  class="mdc-list-item no_messages" role="menuitem">

                                <div class="item-content d-flex align-items-start flex-column justify-content-center">

                                    <h6 class="item-subject font-weight-normal">
                                        @lang('general.no_messages')


                                    </h6>

                                </div>
                            </li>

                        @endif
                    </ul>
                </div>
            </div>


            <div class="menu-button-container d-none d-md-block">
                <button class="mdc-button mdc-menu-button">
                    <i class="mdi mdi-power"></i>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">

                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon-only">
                                <i class="mdi mdi-logout-variant text-primary"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                                            <i class="fas fa-sign-out-alt"></i>

                                            {{ __('general.logout') }}
                                        </a>
                                    </div>
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
