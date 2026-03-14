<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>THE CLUBHOUSE</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">THE CLUBHOUSE</h3>
                    </div>

                    <div class="card-body">
                        @foreach ($productCategories as $index => $category)
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3> {{$category->name}} </h3> 

                                    <div class="row">
                                        @foreach ($category->products as $index1 => $product)
                                            <div class="col-xs-12 col-sm-3">
                                                <div class="row type">
                                                    <div class="col-xs-12">
                                                        <img src="{{ asset('storage'.env('IMG_STORAGE').$product->picUrl) }}" alt="Beauty" style="width:100%;">
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                    <p> {{$product->name}} </p> 
                                                        @if (auth()->guard('client')->check())
                                                            <div class="form-group">
                                                                <a href="" style="color: #FFFFFF" class="btn waves-effect waves-light btn-primary btn-outline-primary" wire:navigate>
                                                                <i class="ti-shopping-cart"></i>Add to Cart</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
