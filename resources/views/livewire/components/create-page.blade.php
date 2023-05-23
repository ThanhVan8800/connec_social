
<div class="main-content bg-white right-chat-active">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="card p-lg-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                <div class="bg-pattern-div"></div>
                                <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Checkout  </h2>
                            </div>
                        </div>                                 
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card bg-greyblue border-0 p-4 mb-5">
                                <p class="mb-0 mont-font font-xssss text-uppercase fw-600 text-grey-500"><i class="fa fa-exclamation-circle"></i> Have A Coupon? <a class="expand-btn text-grey-500 fw-700" href="#coupon_info">Click Here To Enter Your Code.</a></p>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="page-title">
                                <h4 class="mont-font fw-600 font-md mb-lg-5 mb-4">Billing address</h4>
                                <form action="#" wire:submit.prevent="createpage" enctype="multipart/data">
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Page Name</label>
                                                <input type="text" name="name" wire:model.lazy="name" class="form-control">
                                            </div>        
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Localtion</label>
                                                <input type="text" name="location" wire:model.lazy="location" class="form-control">
                                            </div>        
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Type</label>
                                                <input type="text" name="type" wire:model.lazy="type" class="form-control">
                                            </div>        
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Email</label>
                                                <input type="text" name="comment-name" class="form-control">
                                            </div> 
                                            <div class="col-12 mt-4">
                                                <label class="mont-font fw-600 font-xssss">Page Icon</label>
                                                <div class="custom-file">
                                                    <input id="icon" wire:model.lazy="icon"
                                                        class="custom-file-input" type="file" name="icon">
                                                    <label for="icon" class="custom-file-label">Page Icon</label>
                                                </div>
                                                <div class="col-md-2">
                                                    @if ($icon)
                                                        <img src="{{ $icon->temporaryUrl() }}" alt=""
                                                            width="width:10px">
                                                    @endif
                                                </div>
                                            </div>   
                                            <div class="col-12 mt-4">
                                                <label class="mont-font fw-600 font-xssss">Page Thumbnail</label>
                                                <div class="custom-file">
                                                    <input id="thumbnail" wire:model.lazy="thumbnail"
                                                        class="custom-file-input" type="file" name="thumbnail">
                                                    <label for="thumbnail" class="custom-file-label">Page Thumbnail</label>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Country</label>
                                                <textarea type="text" name="description" rows="3" wire:model.lazy="description" class="form-control"></textarea>
                                            </div>        
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Address</label>
                                                <input type="text" name="comment-name" class="form-control">
                                            </div>        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Twon / City</label>
                                                <input type="text" name="comment-name" class="form-control">
                                            </div>        
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Postcode</label>
                                                <input type="text" name="comment-name" class="form-control">
                                            </div>        
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-check text-left mb-3">
                                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1">
                                                <label class="pt--1 form-check-label fw-600 font-xsss text-grey-700" for="exampleCheck1">Create an acount ?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-info">Create</button>
                                </form>
                                
                            
                            </div>
                        </div>
                        

                    </div>
                </div>               
            </div>
        </div>
            
    </div>            
</div>
        