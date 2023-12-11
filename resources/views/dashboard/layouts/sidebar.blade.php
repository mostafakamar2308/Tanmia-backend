<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open" style="background-color: white">
    <div class="mdc-drawer__header">
        <div href="index.html" class="brand-logo" style="margin-top: -40px;" >
            <img src="{{asset('imagl.png')}}" width="100%" alt="logo" >
            <hr class="hr_sidebar" style="margin-top: -30px ; background-color: #c3a962" >
        </div>

    </div>

    <div class="mdc-drawer__content" style="margin-top: -4px">

        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item ">
                    <a class="mdc-drawer-link {{ request()->is('*dashboard*') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">


                        <span class="material-symbols-outlined  {{ request()->is('*dashboard*') ? 'active_icon' : '' }}">
                        house
                     </span>
                        @lang('general.dashboard')
                    </a>
                </div>

            </nav>
            <hr class="hr_sidebar" >
        </div>
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item ">
                    <a class="mdc-drawer-link {{ request()->is('*users*') ? 'active' : '' }}" href="{{route('admin.users.index')}}">


                       <span class="material-symbols-outlined {{ request()->is('*users*') ? 'active_icon' : '' }}">
shield_person
</span>
                        @lang('general.admin')
                    </a>
                </div>

            </nav>
            <hr class="hr_sidebar" >
        </div>



        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*categories*') ? 'active' : '' }}" href="{{route('admin.categories.index')}}">
                        <span class="material-symbols-outlined mdc-list-item__start-detail {{ request()->is('*categories*') ? 'active_icon' : '' }}"  >
                     category
                     </span>

                        @lang('general.categories')
                    </a>
                </div>

            </nav>
            <hr class="hr_sidebar"  >
        </div>
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*news*') ? 'active' : '' }}" href="{{route('admin.news.index')}}">
                      <span class="material-symbols-outlined {{ request()->is('*news*') ? 'active_icon' : '' }}">
                      feed
                    </span>

                        @lang('general.news')
                    </a>
                </div>

            </nav>
            <hr class="hr_sidebar"  >
        </div>

        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*sliders*') ? 'active' : '' }}" href="{{route('admin.sliders.index')}}">
                     <span class="material-symbols-outlined {{ request()->is('*sliders*') ? 'active_icon' : '' }}">
                    sliders
                    </span>

                        @lang('general.sliders')
                    </a>
                </div>

            </nav>
            <hr  class="hr_sidebar" >
        </div>
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*aboutUs*') ? 'active' : '' }}" href="{{route('admin.aboutUs.index')}}">
                   <span class="material-symbols-outlined {{ request()->is('*aboutUs*') ? 'active_icon' : '' }}">
contact_page
</span>

                        @lang('general.about_us')
                    </a>
                </div>

            </nav>
            <hr  class="hr_sidebar" >
        </div>

        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*contactUs*') ? 'active' : '' }}" href="{{route('admin.contactUs.index')}}">
<span class="material-symbols-outlined {{ request()->is('*contactUs*') ? 'active_icon' : '' }}">
phone_enabled
</span>

                        @lang('general.contactUs')
                    </a>
                </div>

            </nav>
            <hr  class="hr_sidebar">
        </div>
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*messages*') ? 'active' : '' }}" href="{{route('admin.messages.index')}}">
                        <span class="material-symbols-outlined {{ request()->is('*messages*') ? 'active_icon' : '' }}">
mail
</span>

                        @lang('general.messages')
                    </a>
                </div>

            </nav>
            <hr  class="hr_sidebar" >
        </div>

        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*settings*') ? 'active' : '' }}" href="{{route('admin.settings.index')}}">
           <span class="material-symbols-outlined {{ request()->is('*settings*') ? 'active_icon' : '' }}">
              settings
            </span>

                        @lang('general.settings')
                    </a>
                </div>

            </nav>
            <hr  class="hr_sidebar" >
        </div>
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ request()->is('*video*') ? 'active' : '' }}" href="{{route('admin.video.index')}}">
          <span class="material-symbols-outlined">
play_circle
</span>
                        @lang('general.video')
                    </a>
                </div>

            </nav>
            <hr  class="hr_sidebar" >
        </div>



    </div>
</aside>
