<div class="main-content right-chat-active">
    <?php
        $icons = new \Feather\IconManager();
    ?>
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
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
            <div class="row feed-body">
                <div class="col-xl-8 col-xxl-9 col-lg-8">
                    @livewire('components.stories')
                    @livewire('components.create-post')
                    @forelse ($posts as $post )
                    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                        <div class="card-body p-0 d-flex">
                            <figure class="avatar me-3">
                                <img src="{{asset('storage').'/'.$post->user->profile ?? 'template/images/user-7.png'}}" alt="image" class="shadow-sm rounded-circle w45">
                            </figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$post->user->first_name}} 
                                @if ($post->is_page_post) posted on
                                    <a href="{{route('page',$post->page->uuid)}}">{{$post->page->name}}</a>
                                @elseif($post->is_group_post) posted on
                                    <a href="{{route('group',$post->group->uuid)}}">{{$post->group->name}}</a>
                                @endif
                                <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                            </h4>
                            <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class=" text-grey-900 btn-round-md bg-greylight font-xss">
                                    {!!$icons->getIcon('more-vertical')!!}
                                </i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg"
                                    aria-labelledby="dropdownMenu2">
                                    <div class="card-body p-0 d-flex" wire:click="savepost({{$post->id}})">
                                        <i class=" text-grey-500 me-3 font-lg" style="margin-top:-10px;">{!!$icons->getIcon('bookmark')!!}</i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Post <span
                                                class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your
                                                saved items</span></h4>
                                    </div>
                                    <!--  Ẩn bài -->
                                    @if($post->is_group_post)
                                        <div wire:click="hide_all_from('group',{{$post->group->id}})" class="card-body p-0 d-flex mt-2">
                                            <i class="-- text-grey-500 me-3 font-lg"style="margin-top: -10px">{!! $icons->getIcon('alert-octagon') !!}</i>
                                            <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from
                                                {{ $post->group->name }} <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                                    saved
                                                    items</span></h4>
                                        </div>
                                    @elseif($post->is_page_post)
                                        <div wire:click="hide_all_from('page',{{$post->page->id}})" class="card-body p-0 d-flex mt-2">
                                            <i class=" text-grey-500 me-3 font-lg" style="margin-top: -10px">{!! $icons->getIcon('alert-octagon') !!}</i>
                                            <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from
                                                {{ $post->page->name }} <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                                    saved
                                                    items</span></h4>
                                        </div>
                                    @else
                                        <div wire:click="hide_all_from('user',{{$post->user->id}})" class="card-body p-0 d-flex mt-2" style="cursor:pointer">
                                            <i class=" text-grey-500 me-3 font-lg" style="margin-top: -10px">{!! $icons->getIcon('alert-octagon') !!}</i>
                                            <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from
                                                {{ $post->user->name }} <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                                    saved
                                                    items</span></h4>
                                        </div>
                                    @endif
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span
                                                class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                                saved
                                                items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span
                                                class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                                saved
                                                items</span></h4>
                                    </div>
                                </div>
                        </div>
                        <div class="card-body p-0 me-lg-5">
                            <a href="{{route('single-post',[
                                'useruuid'=>$post->user->uuid,
                                'postuuid'=>$post->uuid])}}">
                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">{{$post->content}}
                                <a href="#" class="fw-600 text-primary ms-2">See more
                                </a></p>
                            </a>
                        </div>
                        <div class="card-body d-block p-0">
                            <div class="row ps-2 pe-2">
                                @php
                                    $post_media = App\Models\PostMedia::where('post_id',$post->id)->first();
                                @endphp
                                @if ($post_media && $post_media->file_type == 'image')
                                    @php
                                        $medias = json_decode($post_media->file);
                                    @endphp
                                @foreach ($medias as $media )
                                    @if($loop->index > 2)
                                        @continue
                                    @endif
                                <div class="p-1 {{count($medias) == 1 ? 'col-12' : 'col-xs-4 col-sm-4'}} ">
                                    <a href="{{asset("storage").'/'.$media}}" data-lightbox="roadtrip"
                                        class="{{$loop->index == 2?'position-relative d-block' : ''}}">
                                        <img src="{{asset('storage').'/'.$media}}" class="rounded-3 w-100" alt="image">
                                        @if ($loop->index == 2)
                                        <span
                                            class="text-white img-count font-sm ls-3 fw-600"><b>+{{ count($medias) - 3 }}</b></span>
                                        @endif
                                    </a>
                                </div>
                                
                                @endforeach
                                @elseif($post_media && $post_media->file_type="video")
                                <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                                    <div class="player bg-transparent shadow-none">
                                        <video id="my-video" class="video-js" controls preload="auto"
                                            poster="images/poster-1.png" data-setup="{}" style="width: 100%;">
                                            <source src="{{ asset('storage') . '/' . $post_media->file }}"
                                                type="video/mp4" />
                                            <p class="vjs-no-js">
                                                To view this video please enable JavaScript, and consider upgrading to a
                                                web browser that
                                                <a href="https://videojs.com/html5-video-support/"
                                                    target="_blank">supports HTML5 video</a>
                                            </p>
                                        </video>
                                    </div>
                                </div>
                                @endif
                            
                            </div>
                        </div>
                        <div class="card-body d-flex p-0 mt-3">
                                @php
                                    $like = App\Models\Like::where(['post_id'=> $post->id,'user_id'=>auth()->id()])->exists();
                                @endphp
                                @if ($like)
                                <a href="#" wire:click.prevent="dislike({{$post->id}})" onclick="return confirm('Are you sure you want to remove the user from this group?');"
                                        class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                        <i class="text-white me-2 btn-round-xs font-xss" style="margin-top: -10px">
                                            {!! $icons->getIcon('heart', ['fill' => 'red']) !!}
                                        </i>{{$post->likes ?? 0}} Like
                                </a>
                                @else 
                                <a href="#" wire:click.prevent="like({{$post->id}})" onclick="return confirm('Are you sure you want to remove the user from this group?');"
                                        class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                        <i class="text-white me-2 btn-round-xs font-xss" style="margin-top: -10px">
                                            {!! $icons->getIcon('heart') !!}
                                        </i>
                                        {{$post->likes ?? 0}}Like
                                    </a>
                                @endif
                            
                            <!-- <div class="emoji-wrap">
                                <ul class="emojis list-inline mb-0">
                                    <li class="emoji list-inline-item"><i class="em em---1"></i> </li>
                                    <li class="emoji list-inline-item"><i class="em em-angry"></i></li>
                                    <li class="emoji list-inline-item"><i class="em em-anguished"></i> </li>
                                    <li class="emoji list-inline-item"><i class="em em-astonished"></i> </li>
                                    <li class="emoji list-inline-item"><i class="em em-blush"></i></li>
                                    <li class="emoji list-inline-item"><i class="em em-clap"></i></li>
                                    <li class="emoji list-inline-item"><i class="em em-cry"></i></li>
                                    <li class="emoji list-inline-item"><i class="em em-full_moon_with_face"></i></li>
                                </ul>
                            </div> -->
                            <a href="#"
                                class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                                <i class=" text-dark text-grey-900 btn-round-sm font-lg">{!!$icons->getIcon('message-circle')!!}</i>
                                <span class="d-none-xss">{{$post->comments}} Comment</span></a>
                            <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="false"
                                class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                    class=" text-grey-900 text-dark btn-round-sm font-lg"></i><span
                                    class="d-none-xs">Share</span></a>
                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg"
                                aria-labelledby="dropdownMenu21">
                                <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share <i
                                        class="feather-x ms-auto font-xssss btn-round-xs bg-greylight text-grey-900 me-2"></i>
                                </h4>
                                <div class="card-body p-0 d-flex">
                                    <ul class="d-flex align-items-center justify-content-between mt-2">
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-facebook"><i
                                                    class="font-xs ti-facebook text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-twiiter"><i
                                                    class="font-xs ti-twitter-alt text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-linkedin"><i
                                                    class="font-xs ti-linkedin text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-instagram"><i
                                                    class="font-xs ti-instagram text-white"></i></a></li>
                                        <li><a href="#" class="btn-round-lg bg-pinterest"><i
                                                    class="font-xs ti-pinterest text-white"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body p-0 d-flex">
                                    <ul class="d-flex align-items-center justify-content-between mt-2">
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-tumblr"><i
                                                    class="font-xs ti-tumblr text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-youtube"><i
                                                    class="font-xs ti-youtube text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-flicker"><i
                                                    class="font-xs ti-flickr text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-black"><i
                                                    class="font-xs ti-vimeo-alt text-white"></i></a></li>
                                        <li><a href="#" class="btn-round-lg bg-whatsup"><i
                                                    class="font-xs feather-phone text-white"></i></a></li>
                                    </ul>
                                </div>
                                <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3">Copy
                                    Link
                                </h4>
                                <i class="feather-copy position-absolute right-35 mt-3 font-xs text-grey-500"></i>
                                <input type="text" value="{{route('single-post',[
                                'useruuid'=>$post->user->uuid,
                                'postuuid'=>$post->uuid])}}"
                                    class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg">
                            </div>
                        </div>
                        <form method="POST" wire:submit.prevent="saveComment({{ $post->id }})">
                            <input type="text" name="comment" wire:model.lazy="comment"  placeholder="write your comments here..." 
                                class="p-2 border-0 bg-grey text-grey-500 font-xssss lh-32 fw-600 rounded-3 w-100 theme-dark-bg">
                        </form>
                    </div>
                    @empty
                    <h1 class="text-danger">Oops! No found post</h1>
                    @endforelse


                </div>
                <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friend Request</h4>
                                    <a href="{{route('explore')}}" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                @forelse($friend_requests as $friend )
                                    <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                                        <figure class="avatar me-3"><img src="{{asset('storage').'/'.$friend->user->profile}}" alt="image"
                                                class="shadow-sm rounded-circle w45"></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$friend->user->first_name.''.$friend->user->last_name}} <span
                                                class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span>
                                        </h4>
                                    </div>
                                    <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                                        <button wire:click="acceptfriend({{$friend->user_id}})"
                                            class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">Confirm
                                        </button>
                                        <button wire:click="rejectfriend({{$friend->user_id}})"
                                            class="p-2 lh-20 w100 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl">
                                            Delete
                                        </button>
                                    </div>
                                @empty
                                    <h1>alo</h1>
                                @endforelse
                            </div>

                            <div class="card w-100 shadow-xss rounded-xxl border-0 p-0 ">
                                <div class="card-body d-flex align-items-center p-4 mb-0">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Confirm Friend</h4>
                                    <a href="{{ route('explore') }}" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                @forelse ($suggested_friends as $friend )
                                    <div class="card-body bg-transparent-card d-flex p-3 bg-greylight ms-3 me-3 rounded-3">
                                        <figure class="avatar me-2 mb-0">
                                            <img src="{{asset('storage').'/'.$friend->profile}}" alt="image" class="shadow-sm rounded-circle w45">
                                            </figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-2">{{$friend->name}} <span
                                                class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{$friend->mutual_friends()}} mutual friends</span>
                                        </h4>
                                            <a href="{{ route('user', $friend->uuid) }}"
                                                class="mt-2 bg-white btn-round-sm text-grey-900  font-xss ms-auto"
                                                style="margin-top:-10px">{!! $icons->getIcon('chevron-right') !!}
                                            </a>
                                    </div>
                                    
                                @empty
                                    <span class="text-blue">Mic...</span>
                                @endforelse 
                                
                            </div>
                    
                </div>
                @section('suggest_page')
                <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                    <div class="p-4 card-body d-flex align-items-center">
                            <h4 class="mb-0 fw-700 font-xssss text-grey-900">Suggest Pages</h4>
                            <a href="{{ route('pages') }}" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        @forelse ($suggested_pages as $page)
                            <div title="{{ $page->name }}"
                                class="pt-4 pb-0 overflow-hidden card-body d-flex ps-4 pe-4 border-top-xs bor-0">
                                <img src="{{ asset('storage') . '/' . $page->thumbnail }}" alt="img"
                                    class="mb-2 img-fluid rounded-xxl">
                            </div>
                            <div class="pt-0 pb-4 card-body d-flex align-items-center ps-4 pe-4">
                                <a style="cursor: pointer" wire:click="follow({{ $page->id }}) "
                                    href="{{route('pages')}}"
                                    title="like {{ $page->name }}"
                                    class="p-2 text-center lh-28 w-100 bg-grey text-grey-800 font-xssss fw-700 rounded-xl"><i
                                        class=" font-xss me-2" style="margin-top: -10px">{!! $icons->getIcon('external-link') !!}</i>
                                    Like Page</a>
                            </div>
                        @empty
                            <p class="text-center text-danger">No Page Found..</p>
                        @endforelse

                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggest Groups</h4>
                            <a href="default-group.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        @forelse ($suggested_groups as $group)
                            <div title="{{ $group->name }}"
                                class="pt-4 pb-0 overflow-hidden card-body d-flex ps-4 pe-4 border-top-xs bor-0">
                                <img src="{{ asset('storage') . '/' . $group->thumbnail }}" alt="img"
                                    class="mb-2 img-fluid rounded-xxl">
                            </div>
                            <div class="pt-0 pb-4 card-body d-flex align-items-center ps-4 pe-4">
                                <a style="cursor: pointer" wire:click="follow({{ $group->id }}) "
                                    href="{{route('group',$group->uuid)}}"
                                    title="like {{ $group->name }}"
                                    class="p-2 text-center lh-28 w-100 bg-grey text-grey-800 font-xssss fw-700 rounded-xl"><i
                                        class=" font-xss me-2" style="margin-top: -10px">{!! $icons->getIcon('external-link') !!}</i>
                                    Like Page</a>
                            </div>
                        @empty
                            <p class="text-center text-danger">No Page Found..</p>
                        @endforelse


                    </div>
                @endsection
            </div>
        </div>

    </div>
</div>
<!-- main content -->