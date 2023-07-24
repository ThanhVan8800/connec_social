<div class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0">
    <?php 
        $icons = new \Feather\IconManager();
    ?>
        <div class="owl-carousel category-card owl-theme overflow-hidden nav-none">
            <div class="item">
                <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-none rounded-xxxl bg-dark overflow-hidden mb-3 mt-3">
                    <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">
                        <style>
                            .upload-btn-wapper{
                                position:relative;
                                overflow: hidden;
                                display:inline-block;
                            }
                            .upload-btn-wapper input[type="file"]{
                                font-size: 100px;
                                position:absolute;
                                left:0;
                                top:0;
                                opacity: 0  ;
                            }
                        </style>
                        <a href="#" class="upload-btn-wapper">
                        <div wire:loading wire:target="images">
                            <div class="preloader"></div>
                        </div>
                            <span class="btn-round-lg bg-white"><i class=" font-lg">
                                {!!$icons->getIcon('plus')!!}
                            </i></span>
                            <div class="clearfix"></div>
                            <h4 class="fw-700 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">Add Story </h4>
                            <input type="file" name="images" multiple  accept="png, jpeg, jpg" id="story" wire:model="images">
                        </a>
                    </div>
                </div>
            </div>
            @forelse ($stories as $story)
                <div class="item">
                    <div data-bs-toggle="modal" data-bs-target="#{{ $story->user->uuid }}"
                        class="mt-3 mb-3 overflow-hidden border-0 cursor-pointer card w125 h200 d-block shadow-xss rounded-xxxl bg-gradiant-bottom"
                        style="background-image: url({{ asset('storage') . '/' . json_decode($story->story)[0] }});">
                        <div class="bottom-0 p-3 text-center card-body d-block w-100 position-absolute">
                            <a href="#">
                                <figure class="mb-0 avatar ms-auto me-auto position-relative w50 z-index-1">
                                    <img src="{{ asset('storage') . '/' . $story->user->profile }}" alt="image"
                                        class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">
                                </figure>
                                <div class="clearfix"></div>
                                <h4 class="mt-2 mb-1 text-white fw-600 position-relative z-index-1 ls-1 font-xssss">
                                    {{ $story->user->username }} </h4>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
            @endforelse
        </div>
    </div>