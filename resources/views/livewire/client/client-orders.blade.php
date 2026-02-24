<div class="content-wrapper">
    <style>
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; }
        .cart-container { margin-top: 50px; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .product-img { width: 100px; height: 100px; object-fit: cover; border-radius: 8px; }
        .qty-input { width: 60px; text-align: center; border: 1px solid #ddd; border-radius: 4px; }
        .btn-checkout { background-color: #000; color: #fff; border-radius: 8px; padding: 12px; font-weight: 600; transition: 0.3s; }
        .btn-checkout:hover { background-color: #333; color: #fff; }
        .text-muted-small { font-size: 0.85rem; color: #6c757d; }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Your Shopping Bag</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card p-4 mb-3">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-2 col-4">
                            <img src="{{env('APP_ROOT')}}assets/images/1.jpg" alt="Product" class="product-img">
                        </div>
                        <div class="col-md-4 col-8">
                            <h6 class="mb-1">Premium Leather Tote</h6>
                            <p class="text-muted-small mb-0">Color: Midnight Black</p>
                            <p class="text-muted-small">Size: Large</p>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-sm btn-light border">-</button>
                                <input type="text" class="qty-input mx-2" value="1">
                                <button class="btn btn-sm btn-light border">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 col-4 text-right">
                            <span class="font-weight-bold">Ksh 1500</span>
                        </div>
                        <div class="col-md-1 col-2 text-right">
                            <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> &times;</a>
                        </div>
                    </div><hr>
                    <div class="row align-items-center">
                        <div class="col-md-2 col-4">
                            <img src="{{env('APP_ROOT')}}assets/images/2.jpg" alt="Product" class="product-img">
                        </div>
                        <div class="col-md-4 col-8">
                            <h6 class="mb-1">Minimalist Silk Scarf</h6>
                            <p class="text-muted-small mb-0">Color: Ivory</p>
                            <p class="text-muted-small">Material: 100% Silk</p>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-sm btn-light border">-</button>
                                <input type="text" class="qty-input mx-2" value="1">
                                <button class="btn btn-sm btn-light border">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 col-4 text-right">
                            <span class="font-weight-bold">Ksh 1500</span>
                        </div>
                        <div class="col-md-1 col-2 text-right">
                            <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> &times;</a>
                        </div>
                    </div><hr>
                    <div class="row align-items-center">
                        <div class="col-md-2 col-4">
                            <img src="{{env('APP_ROOT')}}assets/images/3.jpg" alt="Product" class="product-img">
                        </div>
                        <div class="col-md-4 col-8">
                            <h6 class="mb-1">Chara Vanille</h6>
                            <p class="text-muted-small mb-0">Color: Ivory</p>
                            <p class="text-muted-small">Material: 100% Silk</p>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-sm btn-light border">-</button>
                                <input type="text" class="qty-input mx-2" value="1">
                                <button class="btn btn-sm btn-light border">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 col-4 text-right">
                            <span class="font-weight-bold">Ksh 1500</span>
                        </div>
                        <div class="col-md-1 col-2 text-right">
                            <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> &times;</a>
                        </div>
                    </div><hr>
                    <div class="row align-items-center">
                        <div class="col-md-2 col-4">
                            <img src="{{env('APP_ROOT')}}assets/images/4.jpg" alt="Product" class="product-img">
                        </div>
                        <div class="col-md-4 col-8">
                            <h6 class="mb-1">Chara Rose</h6>
                            <p class="text-muted-small mb-0">Color: Ivory</p>
                            <p class="text-muted-small">Material: 100% Silk</p>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-sm btn-light border">-</button>
                                <input type="text" class="qty-input mx-2" value="1">
                                <button class="btn btn-sm btn-light border">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 col-4 text-right">
                            <span class="font-weight-bold">Ksh 1500</span>
                        </div>
                        <div class="col-md-1 col-2 text-right">
                            <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> &times;</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="text-dark font-weight-bold">&larr; Continue Shopping</a>
            </div>

            <div class="col-lg-4">
                <div class="card p-4">
                    <h5 class="font-weight-bold mb-4">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>$165.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span class="text-success">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Estimated Tax</span>
                        <span>$12.40</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="font-weight-bold">Total</span>
                        <h4 class="font-weight-bold">$177.40</h4>
                    </div>
                    <button class="btn btn-checkout btn-block">PROCEED TO CHECKOUT</button>
                    
                    <div class="mt-4 text-center">
                        <p class="text-muted-small">We accept:</p>
                        <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" width="50" class="mr-2"> -->
                        <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" width="40"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
