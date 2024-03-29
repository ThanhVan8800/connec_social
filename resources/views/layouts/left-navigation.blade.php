<nav class="navigation scroll-bar">
        <?php
            $icons = new \Feather\IconManager();
        ?>
        <div class="container ps-0 pe-0">
            <div class="nav-content">
                <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                    <ul class="mb-1 top-content">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li><a href="{{ config('app.url') }}" class="nav-content-bttn open-font"><i
                                    class=" btn-round-md bg-blue-gradiant me-3">{!! $icons->getIcon('tv') !!}</i><span>Newsfeed</span></a>
                        </li>
                        <li><a href="{{ route('pages') }}" class="nav-content-bttn open-font"><i
                                    class=" btn-round-md bg-red-gradiant me-3">{!! $icons->getIcon('award') !!}</i><span>Pages</span></a>
                        </li>
                        <li><a href="{{route('explore')}}" class="nav-content-bttn open-font"><i
                                    class=" btn-round-md bg-gold-gradiant me-3">{!!$icons->getIcon('globe')!!}</i><span>Explore
                                    Stories</span></a></li>
                        <li><a href="{{route('groups')}}" class="nav-content-bttn open-font"><i
                                    class="- btn-round-md bg-mini-gradiant me-3">{!! $icons->getIcon('zap') !!}</i><span>Popular
                                    Groups</span></a></li>
                        <li><a href="{{route('settings.account_information')}}" class="nav-content-bttn open-font"><i
                                    class=" btn-round-md bg-primary-gradiant me-3">{!! $icons->getIcon('user') !!}</i><span>Author Profile
                                </span></a></li>
                    </ul>
                </div>

                <!-- <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>More </span>Pages</div>
                    <ul class="mb-3">
                        <li><a href="default-email-box.html" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-inbox me-3"></i><span>Email Box</span><span
                                    class="circle-count bg-warning mt-1">584</span></a></li>
                        <li><a href="default-hotel.html" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-home me-3"></i><span>Near Hotel</span></a></li>
                        <li><a href="default-event.html" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-map-pin me-3"></i><span>Latest Event</span></a>
                        </li>
                        <li><a href="default-live-stream.html" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-youtube me-3"></i><span>Live Stream</span></a>
                        </li>
                    </ul>
                </div> -->
                <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                    <ul class="mb-1">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li><a href="{{route('settings')}}" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i
                                    class="font-sm  me-3 text-grey-500">{!!$icons->getIcon('settings')!!}</i><span>Settings</span></a>
                        </li>
                        
                        <li>
                            <a href="{{route('chatify')}}" class="nav-content-bttn open-font h-auto pt-2 pb-2">
                            <i class="font-sm  me-3 text-grey-500">{!!$icons->getIcon('message-circle')!!}</i><span>Chat</span><span
                                    class="circle-count bg-warning mt-0">23</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- navigation left -->