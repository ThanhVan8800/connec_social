<div class="main-content right-chat-active">
    <?php
        $icons = new \Feather\IconManager();
    ?>
    <div class="middle-sidebar-bottom">
        @if($user->count())
            <!-- <span>Số người tham gia:{{$user->count()}}</span> -->
            <div wire:loading></div>
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <div class="card-body d-flex align-items-center p-0">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Friends</h2>
                                <div class="search-form-2 ms-auto">
                                    <i class=" font-xss" style="margin-top:-10px">{!!$icons->getIcon('search')!!}</i>
                                
                                    <input type="text" wire:model="search"
                                        class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                        placeholder="Search here.">
                                </div>
                            </div>
                        </div>

                        <div class="row ps-2 pe-2">
                            @forelse ($user as $us )

                            <div class="col-md-3 col-sm-4 pe-2 ps-2">
                                <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                    <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">
                                        <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1">
                                            <img src="{{asset('storage').'/'.$us->profile}}" alt="image"
                                                class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">
                                        </figure>
                                        <div class="clearfix"></div>
                                        <h4 class="fw-700 font-xsss mt-3 mb-1">
                                            {{$us->first_name.' '.$us->last_name}}
                                        </h4>
                                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">{{$us->email}}</p>
                                        @if(App\Models\Friend::where([
                                            'friend_id' => auth()->id(),
                                            'user_id'=>$us->id,
                                            'status' => 'pending'
                                        ])->exists())
                                            <button wire:click="acceptfriend('{{ $us->id }}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-primary font-xsssss fw-700 ls-lg">
                                                ACCEPT
                                            </button>
                                        @elseif(App\Models\Friend::where([
                                            'user_id'=>auth()->id(),
                                            'friend_id' => $us->id,
                                            'status' => 'pending'
                                        ])->exists())
                                            <button wire:click="removefriend('{{ $us->uuid }}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-warning font-xsssss fw-700 ls-lg">
                                                CANCEL
                                            </button>
                                        @elseif (App\Models\Friend::where([
                                            'user_id'=>$us->id,
                                            'friend_id' => auth()->id(),
                                            'status' => 'rejected'
                                        ])->exists())
                                            <button wire:click="addfriend('{{$us->uuid}}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg">
                                                ADD FRIEND
                                            </button>
                                        @elseif ($us->is_friend() == 'accepted')
                                            <button 
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-info font-xsssss fw-700 ls-lg">
                                                FRIEND
                                            </button>
                                        @else
                                            <button wire:click="addfriend('{{ $us->uuid }}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg">
                                                ADD FRIEND
                                            </button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @empty
                            <h2 class="text-danger">WHO</h2>

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row ps-2 pe-2">
                            @forelse ($user as $us )

                            <div class="col-md-3 col-sm-4 pe-2 ps-2">
                                <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                    <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">
                                        <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1">
                                            <img src="{{asset('storage').'/'.$us->profile}}" alt="image"
                                                class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">
                                        </figure>
                                        <div class="clearfix"></div>
                                        <h4 class="fw-700 font-xsss mt-3 mb-1">
                                            {{$us->first_name.' '.$us->last_name}}
                                        </h4>
                                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">{{$us->email}}</p>
                                        @if(App\Models\Friend::where([
                                            'friend_id' => auth()->id(),
                                            'user_id'=>$us->id,
                                            'status' => 'pending'
                                        ])->exists())
                                            <button wire:click="acceptfriend('{{ $us->id }}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-primary font-xsssss fw-700 ls-lg">
                                                ACCEPT
                                            </button>
                                        @elseif(App\Models\Friend::where([
                                            'user_id'=>auth()->id(),
                                            'friend_id' => $us->id,
                                            'status' => 'pending'
                                        ])->exists())
                                            <button wire:click="removefriend('{{ $us->uuid }}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-warning font-xsssss fw-700 ls-lg">
                                                CANCEL
                                            </button>
                                        @elseif (App\Models\Friend::where([
                                            'user_id'=>$us->id,
                                            'friend_id' => auth()->id(),
                                            'status' => 'rejected'
                                        ])->exists())
                                            <button wire:click="addfriend('{{$us->uuid}}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg">
                                                ADD FRIEND
                                            </button>
                                        @elseif ($us->is_friend() == 'accepted')
                                            <button 
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-info font-xsssss fw-700 ls-lg">
                                                FRIEND
                                            </button>
                                        @else
                                            <button wire:click="addfriend('{{ $us->uuid }}')"
                                                class="pt-2 pb-2 mt-0 text-white btn ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg">
                                                ADD FRIEND
                                            </button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @empty
                            <h2 class="text-danger">WHO</h2>

                            @endforelse
                        </div>                       
        @endif
    </div>
</div>