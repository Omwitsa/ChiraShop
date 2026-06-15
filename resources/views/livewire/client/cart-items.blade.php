<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Shopping cart</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
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
                        <h3 class="card-title">Shopping cart</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                @foreach ($cartItems as $index => $item)
                                    <div class="row align-items-center mb-4">
                                        <div class="col-sm-2">
                                            <img src="{{ asset('storage'.env('IMG_STORAGE').$item->picUrl) }}" alt="Beauty" class="product-img">
                                        </div>

                                        <div class="col-md-4 col-8">
                                            <h6 class="mb-1">{{ $item->name }}</h6>
                                            <!-- <p class="text-muted-small mb-0">Code: {{ $item->code }}</p> -->
                                            <p class="text-muted-small">Price: Ksh {{ $item->price }}</p>
                                        </div>
                                        <div class="col-md-3 col-6 text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <!-- <button class="btn btn-sm btn-light border">-</button> -->
                                                <!-- <button wire:click="decrement({{ $index }})" wire:key="{{ $item->id }}"><i class="fas fa-minus"></i></button> -->
                                                <input type="number" wire:blur="onEnterQuantity({{ $index }}, $event.target.value)" wire:key="{{ $item->id }}" wire:model="cartItems.{{ $index }}.quantity" class="qty-input mx-2" min="1" oninput="validity.valid||(value='');">
                                                <!-- <button wire:click="increment({{ $index }})" wire:key="{{ $item->id }}"><i class="fas fa-plus"></i></button> -->
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-4 text-right">
                                            <span class="font-weight-bold">Ksh {{ $item->subTotal }}</span>
                                        </div>
                                        <div class="col-md-1 col-2 text-right">
                                            <a wire:click="delete({{ $index }})" wire:key="{{ $index }}" wire:confirm="Are you sure you want to delete?" class="text-danger"><i class="fas fa-trash-alt"></i> &times;</a>
                                        </div>
                                    </div><hr>
                                @endforeach
                            </div>

                            <div class="col-sm-4">
                                <div class="card p-4">
                                    <h5 class="font-weight-bold mb-4">Order Summary</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotal</span>
                                        <span>Ksh {{ $orderHeader['subTotal'] }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Shipping</span>
                                        <span class="text-success">Ksh {{ $orderHeader['shipping'] }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <!-- <span>Estimated Tax</span> -->
                                        <!-- <span>$12.40</span> -->
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-4">
                                        <span class="font-weight-bold">Total</span>
                                        <h4 class="font-weight-bold">Ksh {{ $orderHeader['total'] }}</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <button wire:click="order" wire:target="order" wire:loading.attr="disabled" class="btn btn-checkout btn-block">
                                                <span wire:loading.remove wire:target="order">
                                                    Order Now
                                                </span>

                                                 <span wire:loading wire:target="order">
                                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                                    Processing...
                                                </span>
                                            </button>
                                        </div>

                                        <div class="8">
                                            <a href="{{env('APP_ROOT')}}shop" class="btn btn-checkout btn-block">Continue Shopping</a>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 text-center">
                                        <p class="text-muted-small">We accept:</p>
                                        <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" width="50" class="mr-2"> -->
                                        <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" width="40"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
