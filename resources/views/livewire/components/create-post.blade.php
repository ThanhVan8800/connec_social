<form wire:submit.prevent="createpost" class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
    
    <div class="card-body p-0">
        @php
            $icons = new \Feather\IconManager();
        @endphp
        <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center">
            <i class="btn-round-sm font-xs text-primary me-2 bg-greylight">{!!$icons->getIcon('edit-2')!!}</i>Create
            Post</a>
    </div>
    <div class="card-body p-0 mt-3 position-relative">
        <figure class="avatar position-absolute ms-2 mt-1 top-5">
            <img src="{{auth()->user()->profile ? asset('storage').'/'.auth()->user()->profile : 'template/images/user-8.png'}}"
                alt="image" class="shadow-sm rounded-circle w30" style="height:30px">
        </figure>
        <textarea wire:model.lazy="content" name="content"
            class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg"
            cols="30" rows="10" placeholder="What's on your mind?"></textarea>
            @error('content') <span  class="text-danger">{{ $message }}</span> @enderror
    </div>
        <div wire:loading wire:target="images">Uploading...</div>
        <div wire:loading wire:target="video">Uploading...</div>
    @if ($images)
    <div class="pos">
        @foreach ($images as $value )
        <div class="pos_chi">
            <img src="{{$value->temporaryUrl()}}" alt="" style="height: 36px;width: 36px;" >
        </div>
        @endforeach
    </div>
    @endif
    @if($video)
            <video src="{{$video->temporaryUrl()}}"></video>
    @endif
    <style>
        .pos{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .pos_chi{
            
        }
        
    </style>
    <div class="card-body d-flex p-0 mt-0">
        <style>
            .upload-btn-wapper{
                position: relative;
                overflow:hidden;
                display:inline-block;
            }
            .upload-btn-wapper input[type="file"]{
                font-size:100px;
                position: absolute;
                left: 0;
                top: 0;
                opacity: 0;
            }
        </style>
        <a type="file" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 upload-btn-wapper">
            <i class="font-md text-danger  me-2">{!!$icons->getIcon('image')!!}</i>
                <span class="d-none-xs">Photo
                    <input type="file" multiple id="file" wire:model="images">
                </span>
                @error('images') <span  class="text-danger">{{ $message }}</span> @enderror
        </a>

        <a type="file" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 upload-btn-wapper">
            <i class="font-md text-success me-2">{!!$icons->getIcon('video')!!}</i>
                <span class="d-none-xs">Photo/Video
                    <input type="file" id="file" wire:model="video">
                </span>
                @error('video')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </a>
        <a href="#" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i
                class="font-md text-warning feather-camera me-2"></i><span class="d-none-xs">Feeling/Activity</span></a>
        <a href="#" class="ms-auto" id="dropdownMenu4" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
        <div class="card-body p-0 d-flex mt-2">
            <button style="outline:none;border:none;border-radius:43px" type="submit"
                class="outline-none ms-auto border-none bg-none text-gray-900 hover:bg-blue-200">
                <i class="">Send</i>
            </button>
        </div>
        <div class="dropdown-menu dropdown-menu-start p-4 rounded-xxl border-0 shadow-lg"
            aria-labelledby="dropdownMenu4">
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
                        saved items</span></h4>
            </div>
            <div class="card-body p-0 d-flex mt-2">
                <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span
                        class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                        saved items</span></h4>
            </div>
            <div class="card-body p-0 d-flex mt-2">
                <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span
                        class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                        saved items</span></h4>
            </div>

        </div>
    </div>
</form>