<div class="main-content right-chat-active"> 
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3 overflow-hidden">
                                <div class="card-body position-relative h240 bg-image-cover bg-image-center" style="background-image: url( 
                                {{asset('storage').'/'.$user->profile}});"></div>
                                <div class="card-body d-block pt-4 text-center position-relative">
                                    <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 ms-auto me-auto">
                                        @if ($user->profile)
                                            <img src="{{asset('storage').'/'.$user->profile}}" 
                                            alt="image" class="p-1 bg-white rounded-xl w-100">
                                        @else
                                            <img src="template/images/pt-1.jpg" 
                                            alt="image" class="p-1 bg-white rounded-xl w-100">
                                        @endif
                                        
                                    </figure>

                                    <h4 class="font-xs ls-1 fw-700 text-grey-900">{{$user->first_name .''.$user->last_name}}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{'@'.''.$user->email}}</span></h4>
                                    <div class="d-flex align-items-center pt-0 position-absolute left-15 top-10 mt-4 ms-2">
                                        <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 ms-2 me-2">
                                            <b class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">
                                                {{App\Models\Post::where("user_id",$user->id)->count()?? 0 }} 
                                            </b> 
                                            Posts
                                        </h4>
                                        <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 ms-2 me-2">
                                            <b class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">
                                                {{App\Models\Friend::where(['user_id'=>$user->id,'status'=>'accepted'])
                                                                    ->orwhere(['friend_id'=>$user->id,'status'=>'accepted'])->count()}}    
                                            </b>
                                            Friends
                                        </h4>
                                        <!-- <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 ms-2 me-2"><b class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">32k </b> Follow</h4> -->
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center position-absolute right-15 top-10 mt-2 me-2">
                                        <a href="#" class="d-none d-lg-block bg-success p-3 z-index-1 rounded-3 text-white font-xsssss text-uppercase fw-700 ls-3">Add Friend</a>
                                        <a href="#" class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700"><i class="feather-mail font-md"></i></a>
                                        <a href="#" id="dropdownMenu8" class="d-none d-lg-block btn-round-lg ms-2 rounded-3 text-grey-700 bg-greylight" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more font-md"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu8">
                                            <div class="card-body p-0 d-flex">
                                                <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-0">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body d-block w-100 shadow-none mb-0 p-0 border-top-xs">
                                    <ul class="nav nav-tabs h55 d-flex product-info-tab border-bottom-0 ps-4" id="pills-tab" role="tablist">
                                        <li class="active list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block active" href="#navtabs1" data-toggle="tab">About</a></li>
                                        <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs2" data-toggle="tab">Membership</a></li>
                                        <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs3" data-toggle="tab">Discussion</a></li>
                                        <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs4" data-toggle="tab">Video</a></li>
                                        <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs3" data-toggle="tab">Group</a></li>
                                        <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs1" data-toggle="tab">Events</a></li>
                                        <li class="list-inline-item me-5">
                                            <a href='#' wire:click="toggle" class="fw-700 me-sm-5 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs7" data-toggle="tab">Media</a>
                                        </li>
                                        <li class="list-inline-item ms-auto mt-3 me-4"><a href="#" class=""><i class="ti-more-alt text-grey-500 font-xs"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-block p-4">
                                    <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                                    <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                                </div>
                                <div class="card-body border-top-xs d-flex">
                                    <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-0">Private <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">What's up, how are you?</span></h4>
                                </div>

                                <div class="card-body d-flex pt-0">
                                    <i class="feather-eye text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-0">Visble <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Anyone can find you</span></h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">Flodia, Austia </h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-users text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">Genarel Group</h4>
                                </div>
                            </div>
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center  p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Photos</h4>
                                    <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-block pt-0 pb-2">
                                    <div class="row">
                                        @forelse ($post_media as $media )
                                            <div class="col-6 mb-2 pe-1">
                                                <a href="{{asset('storage').'/'.json_decode($media->file)[0]}}" data-lightbox="roadtrip">
                                                    <img src="{{asset('storage').'/'.json_decode($media->file)[0]}}" alt="image" class="img-fluid rounded-3 w-100">
                                                </a>
                                            </div>
                                        @empty
                                            <span class="text-danger">Up anh cho xem dee</span>
                                        @endforelse
                                        
                                    </div>
                                </div>
                                <div class="card-body d-block w-100 pt-0">
                                    <a href="#" class="p-2 lh-28 w-100 d-block bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i class="feather-external-link font-xss me-2"></i> More</a>
                                </div>
                            </div>
                            
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center  p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>
                                    <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-success me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>

                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-warning me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>

                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-primary me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>
                                 
                            </div>

                        </div>
                        <div class="col-xl-8 col-xxl-9 col-lg-8">
                        <?php
                            $icons = new \Feather\IconManager();
                        ?>
                        @livewire('components.create-post')
                    @forelse ($user->posts as $post )
                    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                        <div class="card-body p-0 d-flex">
                            <figure class="avatar me-3"><img src="{{asset('storage').'/'.$post->user->profile ?? 'template/images/user-7.png'}}" alt="image" class="shadow-sm rounded-circle w45">
                            </figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$post->user->username}} <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                            </h4>
                            <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                aria-expanded="false"><i
                                    class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                            <!-- <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg"
                                    aria-labelledby="dropdownMenu2">
                                    <div class="card-body p-0 d-flex">
                                        <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Link <span
                                                class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your
                                                saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span
                                                class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                                saved
                                                items</span></h4>
                                    </div>
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
                                </div> -->
                        </div>
                        <div class="card-body p-0 me-lg-5">
                            <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">{{$post->content}} <a href="#"
                                    class="fw-600 text-primary ms-2">See more</a></p>
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
                                        <!-- <video id='video' src='images/v-2.mp4' playsinline></video> -->
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
                                <a href="#" wire:click.prevent="dislike({{$post->id}})"
                                        class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                        <i class="text-white me-2 btn-round-xs font-xss" style="margin-top: -10px">
                                            {!! $icons->getIcon('thumbs-up', ['fill' => 'yellow']) !!}
                                        </i>{{$post->likes ?? 0}} Like
                                </a>
                                @else 
                                <a href="#" wire:click.prevent="like({{$post->id}})"
                                        class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                        <i class="text-white me-2 btn-round-xs font-xss" style="margin-top: -10px">
                                            {!! $icons->getIcon('thumbs-up',['fill'=>'blue']) !!}
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
                                    class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span
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
                                <input type="text" value="https://socia.be/1rGxjoJKVF0"
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
                    </div>
                </div>
            
            </div>            
        </div>