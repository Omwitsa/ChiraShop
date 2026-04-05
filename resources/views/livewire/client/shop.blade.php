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
                        @foreach ($productCategories as $c_index => $category)
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3> {{$category->name}} </h3> 

                                    <div class="row">
                                        @foreach ($category->products as $p_index => $product)
                                            <div class="col-xs-12 col-sm-3 p-4">
                                                <div class="row type">
                                                    <div class="col-xs-12">
                                                        <a wire:click="viewInfo({{ $product->id }})" wire:key="{{ $product->id }}"><img src="{{ asset('storage'.env('IMG_STORAGE').$product->picUrl) }}" style="width:100%;" alt="Beauty"></a>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <p> {{$product->name}} </p> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    @if (auth()->guard('client')->check())
                                                        <div class="col-sm-7">
                                                            @if($product->inStock)
                                                                <button wire:click="addToCart({{ $c_index }}, {{ $p_index }})" wire:key="{{ $product->id }}" class="btn waves-effect waves-light btn-primary">ADD TO CART</button>
                                                            @else
                                                                <button wire:click="" wire:key="{{ $product->id }}" type="button" class="btn">Out of Stock</button>
                                                            @endif
                                                        </div>

                                                        <div class="col-sm-5">
                                                            @if ($product->addedToCart)
                                                                <a href="{{env('APP_ROOT')}}cart-items" class="btn waves-effect waves-light btn-secondary" wire:navigate>
                                                                <i class="ti-shopping-cart"></i>View Cart</a>
                                                            @endif
                                                        </div>
                                                    @endif
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
