<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    
    <link rel="stylesheet" href="{{asset("template/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset("template/css/feather.css")}}">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset("template/images/favicon.png")}}"> -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset("template/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("template/css/emoji.css")}}">

    <link rel="stylesheet" href="{{asset("template/css/lightbox.css")}}">
    <link rel="stylesheet" href="{{asset("templatecss/video-player.css")}}">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- Scripts -->
    @livewireStyles
</head>

<body class="color-theme-blue mont-font">
    <?php $icons = new \Feather\IconManager(); ?>
    <div class="preloader"></div>
    <div class="main-wrapper">
        @include('layouts.navigation')
        @include('layouts.left-navigation')
        <main>
            @yield('content')
        </main>

        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->
                        @yield('suggest_page')
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>
                            <a href="default-event.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-success me-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24
                                    new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-warning me-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24
                                    new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-primary me-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24
                                    new work, NY 10010</span> </h4>
                        </div>
                    </div>

            </div>
        </div>
        <!-- right chat -->
        <div class="app-footer border-0 shadow-lg bg-primary-gradiant">
            <a href="default.html" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
            <a href="default-video.html" class="nav-content-bttn"><i class="feather-package"></i></a>
            <a href="default-live-stream.html" class="nav-content-bttn" data-tab="chats"><i
                    class="feather-layout"></i></a>
            <a href="shop-2.html" class="nav-content-bttn"><i class="feather-layers"></i></a>
            
        </div>
    </div>
        @foreach (App\Models\Story::where('created_at', '>=', now()->subDay())->latest()->get()->unique('user_id') as $story)
            <div class="modal bottom side fade" id="{{ $story->user->uuid }}" tabindex="-1" role="dialog"
                style="overflow-y: auto;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="bg-transparent border-0 modal-content">
                        <button type="button" class="mt-0 close position-absolute top--30 right--10" data-dismiss="modal"
                            aria-label="Close"><i class=" text-grey-900 font-xssss">X</i></button>
                        <div class="p-0 modal-body">
                            <div class="overflow-hidden border-0 card w-100 rounded-3 bg-gradiant-bottom bg-gradiant-top">
                                <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                                    @foreach (json_decode($story->story) as $story)
                                        <div class="item" style=""><img src="{{ asset('storage') . '/' . $story }}"
                                                alt="image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="bottom-0 p-3 mt-3 mb-0 form-group position-absolute z-index-1 w-100">
                                <input type="text"
                                    class="p-3 text-white bg-transparent style2-input w-100 border-light-md pe-5 font-xssss fw-500"
                                    placeholder="Write Comments">
                                <span class="text-white font-md position-absolute"
                                    style="bottom: 35px;right:30px;"><i>{!! $icons->getIcon('send') !!}</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    <script src="{{asset("template/js/plugin.js")}}"></script>
    <script src="{{asset("template/js/lightbox.js")}}"></script>
    <script src="{{asset("template/js/scripts.js")}}"></script>
    <script src="{{asset("template/js/video-player.js")}}"></script>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>
    <script>
        window.onscroll = function(x) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit("load-more")
            }
        }
    </script>
</body>

</html>