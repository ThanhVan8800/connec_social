<div class="main-content right-chat-active">
    <?php
    $icons = new \Feather\IconManager();
    ?>
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <!-- loader wrapper -->
            <div class="p-3 preloader-wrap">
                <div class="box shimmer">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
                <div class="mb-3 box shimmer">
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
            <div class="row feed-body">
                <div class="col-12">

                    @forelse ($posts as $post)
                        <div class="p-4 mb-3 border-0 card w-100 shadow-xss rounded-xxl">
                            <div class="p-0 card-body d-flex">
                                <figure class="avatar me-3"><img
                                        src="{{ asset('storage') . '/' . $post->user->profile ?? 'images/user-7.png' }}"
                                        alt="image" class="shadow-sm rounded-circle w45"></figure>
                                <h4 class="mt-1 fw-700 text-grey-900 font-xssss"> <a
                                        href="{{ route('user', $post->user->uuid) }}">{{ $post->user->name }}</a>
                                    @if ($post->is_group_post)
                                        posted on <a
                                            href="{{ route('group', $post->group->uuid) }}">{{ $post->group->name }}</a>
                                    @endif
                                    @if ($post->is_page_post)
                                        posted on <a
                                            href="{{ route('page', $post->page->uuid) }}">{{ $post->page->name }}</a>
                                    @endif <span
                                        class="mt-1 d-block font-xssss fw-500 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span>
                                </h4>
                                <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class=" text-grey-900 btn-round-md bg-greylight font-xss"
                                        style="margin-top: -10px">{!! $icons->getIcon('more-vertical') !!}</i></a>
                                <div class="p-4 border-0 shadow-lg dropdown-menu dropdown-menu-end rounded-xxl"
                                    aria-labelledby="dropdownMenu2">
                                    <div class="p-0 card-body d-flex" style="cursor: pointer"
                                        wire:click="save({{ $post->id }})">
                                        <i class=" text-grey-500 me-3 font-lg"
                                            style="margin-top: -10px">{!! $icons->getIcon('bookmark') !!}</i>
                                        <h4 class="mt-0 fw-600 text-grey-900 font-xssss me-4">Save Link <span
                                                class="mt-1 d-block font-xsssss fw-500 lh-3 text-grey-500">Add this to
                                                your saved items</span></h4>
                                    </div>
                                    @if ($post->is_group_post)
                                        <div wire:click="hide_all_from('group',{{ $post->group->id }})"
                                            class="p-0 mt-2 card-body d-flex" style="cursor: pointer">
                                            <i class=" text-grey-500 me-3 font-lg"
                                                style="margin-top: -10px">{!! $icons->getIcon('alert-octagon') !!}</i>
                                            <h4 class="mt-0 fw-600 text-grey-900 font-xssss me-4">Hide all from
                                                {{ $post->group->name }}
                                                <span class="mt-1 d-block font-xsssss fw-500 lh-3 text-grey-500">Save to
                                                    your
                                                    saved items</span>
                                            </h4>
                                        </div>
                                    @elseif ($post->is_page_post)
                                        <div wire:click="hide_all_from('page',{{ $post->page->id }})"
                                            class="p-0 mt-2 card-body d-flex" style="cursor: pointer">
                                            <i class=" text-grey-500 me-3 font-lg"
                                                style="margin-top: -10px">{!! $icons->getIcon('alert-octagon') !!}</i>
                                            <h4 class="mt-0 fw-600 text-grey-900 font-xssss me-4">Hide all from
                                                {{ $post->page->name }}
                                                <span class="mt-1 d-block font-xsssss fw-500 lh-3 text-grey-500">Save to
                                                    your
                                                    saved items</span>
                                            </h4>
                                        </div>
                                    @else
                                        <div wire:click="hide_all_from('user',{{ $post->user->id }})"
                                            class="p-0 mt-2 card-body d-flex" style="cursor: pointer">
                                            <i class=" text-grey-500 me-3 font-lg"
                                                style="margin-top: -10px">{!! $icons->getIcon('alert-octagon') !!}</i>
                                            <h4 class="mt-0 fw-600 text-grey-900 font-xssss me-4">Hide all from
                                                {{ $post->user->username }}
                                                <span class="mt-1 d-block font-xsssss fw-500 lh-3 text-grey-500">Save to
                                                    your
                                                    saved items</span>
                                            </h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="p-0 card-body me-lg-5">
                                <a
                                    href="{{ route('single-post', ['useruuid' => $post->user->uuid, 'postuuid' => $post->uuid]) }}">
                                    <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">{{ $post->content }}</p>
                                </a>
                            </div>
                            <div class="p-0 card-body d-block">
                                <div class="row ps-2 pe-2">
                                    @php
                                        $post_media = App\Models\PostMedia::where('post_id', $post->id)->first();

                                    @endphp
                                    @if ($post_media && $post_media->file_type == 'image')
                                        @php

                                            $medias = json_decode($post_media->file);
                                        @endphp
                                        @foreach ($medias as $media)
                                            @if ($loop->index > 2)
                                                @continue
                                            @endif
                                            <div
                                                class=" p-1 {{ count($medias) == 1 ? 'col-12' : 'col-xs-4 col-sm-4' }} ">
                                                <a href="{{ asset('storage') . '/' . $media }}"
                                                    data-lightbox="roadtrip"
                                                    class="{{ $loop->index == 2 ? 'position-relative d-block' : '' }}"><img
                                                        src="{{ asset('storage') . '/' . $media }}"
                                                        class="rounded-3 w-100" alt="image">
                                                    @if ($loop->index == 2)
                                                        <span
                                                            class="text-white img-count font-sm ls-3 fw-600"><b>+{{ count($medias) - 3 }}</b></span>
                                                    @endif
                                                </a>
                                            </div>
                                        @endforeach
                                    @elseif ($post_media && $post_media->file_type == 'video')
                                        <video id="my-video" class="video-js" controls preload="auto" data-setup="{}"
                                            width="100%" height="100%">
                                            <source src="{{ asset('storage') . '/' . $post_media->file }}"
                                                type="video/mp4" />
                                            <p class="vjs-no-js">
                                                To view this video please enable JavaScript, and consider upgrading to a
                                                web browser that
                                                <a href="https://videojs.com/html5-video-support/"
                                                    target="_blank">supports HTML5 video</a>
                                            </p>
                                        </video>
                                    @endif

                                </div>
                            </div>
                            <div class="p-0 mt-3 card-body d-flex">
                                @php
                                    $like = App\Models\Like::where(['post_id' => $post->id, 'user_id' => auth()->id()])->exists();
                                @endphp
                                @if ($like)
                                    <a href="#" wire:click.prevent="dislike({{ $post->id }})"
                                        class=" d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"><i
                                            class="text-white me-2 btn-round-xs font-xss"
                                            style="margin-top: -10px">{!! $icons->getIcon('thumbs-up', ['fill' => 'yellow']) !!}</i>{{ $post->likes ?? 0 }}
                                        Like</a>
                                @else
                                    <a href="#" wire:click.prevent="like({{ $post->id }})"
                                        class=" d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"><i
                                            class="text-white me-2 btn-round-xs font-xss"
                                            style="margin-top: -10px">{!! $icons->getIcon('thumbs-up') !!}</i>{{ $post->likes ?? 0 }}
                                        Like</a>
                                @endif


                                <a href="#"
                                    class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                        class=" text-dark text-grey-900 btn-round-sm font-lg"
                                        style="margin-top: -10px">{!! $icons->getIcon('message-circle') !!}</i><span
                                        class="d-none-xss">{{ $post->comments }} Comment</span></a>
                                <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                        class=" text-grey-900 text-dark btn-round-sm font-lg"
                                        style="margin-top: -10px">{!! $icons->getIcon('share-2') !!} </i><span
                                        class="d-none-xs">Share</span></a>
                                <div class="p-4 border-0 shadow-lg dropdown-menu dropdown-menu-end rounded-xxl"
                                    aria-labelledby="dropdownMenu21">
                                    <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share
                                        <i
                                            class="feather-x ms-auto font-xssss btn-round-xs bg-greylight text-grey-900 me-2"></i>
                                    </h4>
                                    <div class="p-0 card-body d-flex">
                                        <ul class="mt-2 d-flex align-items-center justify-content-between">
                                            <li class="me-1"><a href="#" class="btn-round-lg bg-facebook"><i
                                                        class="text-white font-xs "
                                                        style="margin-top: -10px">{!! $icons->getIcon('facebook') !!}</i></a>
                                            </li>
                                            <li class="me-1"><a href="#" class="btn-round-lg bg-twiiter"><i
                                                        class="text-white font-xs "
                                                        style="margin-top: -10px">{!! $icons->getIcon('twitter') !!}</i></a>
                                            </li>
                                            <li class="me-1"><a href="#" class="btn-round-lg bg-linkedin"
                                                    style="margin-top: -10px">{!! $icons->getIcon('linkedin') !!}<i
                                                        class="text-white font-xs "></i></a></li>
                                            <li class="me-1"><a href="#" class="btn-round-lg bg-instagram"><i
                                                        class="text-white font-xs "
                                                        style="margin-top: -10px">{!! $icons->getIcon('instagram') !!}</i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- <div class="p-0 card-body d-flex">
                                    <ul class="mt-2 d-flex align-items-center justify-content-between">
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-tumblr"><i class="text-white font-xs ti-tumblr"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-youtube"><i class="text-white font-xs ti-youtube"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-flicker"><i class="text-white font-xs ti-flickr"></i></a></li>
                                        <li class="me-1"><a href="#" class="bg-black btn-round-lg"><i class="text-white font-xs ti-vimeo-alt"></i></a></li>
                                        <li><a href="#" class="btn-round-lg bg-whatsup"><i class="text-white font-xs feather-phone"></i></a></li>
                                    </ul>
                                </div> --}}
                                    <h4 class="mt-4 mb-3 fw-700 font-xssss text-grey-500 d-flex align-items-center">
                                        Copy Link</h4>
                                    {{-- <i class="mt-3 position-absolute right-35 font-xs text-grey-500" style="">{!! $icons->getIcon("copy")  !!}</i> --}}
                                    <input type="text"
                                        value="{{ route('single-post', ['useruuid' => $post->user->uuid, 'postuuid' => $post->uuid]) }}"
                                        class="p-2 border-0 bg-grey text-grey-500 font-xssss lh-32 fw-600 rounded-3 w-100 theme-dark-bg">
                                </div>
                            </div>
                            <form method="POST" wire:submit.prevent="saveComment({{ $post->id }})">
                                <input type="text" placeholder="write your comments here..." required
                                    name="comment" wire:model.lazy="comment"
                                    class="p-2 border-0 bg-grey text-grey-500 font-xssss lh-32 fw-600 rounded-3 w-100 theme-dark-bg"
                                    id="">
                            </form>
                        </div>

                    @empty
                        <h1 class="text-center text-danger">No Post Fund!</h1>
                    @endforelse



                    <div class="p-4 mt-3 mb-3 text-center border-0 card w-100 shadow-xss rounded-xxl">
                        <div class="mt-2 snippet ms-auto me-auto" data-title=".dot-typing">
                            <div class="stage">
                                <div class="dot-typing"></div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>