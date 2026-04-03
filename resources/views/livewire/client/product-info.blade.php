<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product Info</li>
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
                        <h3 class="card-title">{{ $product->name }}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <button wire:click="addToCart()" class="btn waves-effect waves-light btn-primary">ADD TO CART</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('storage'.env('IMG_STORAGE').$product->picUrl) }}" alt="Chara Beauty" style="max-width: 100%;" class="block max-w-full">
                            </div>
                            <div class="col-sm-6">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#description"> Description </a>
                                            </h4>
                                        </div>

                                        <div id="description" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">{{ $product->description }}</div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#howToUse"> How To Use </a>
                                            </h4>
                                        </div>

                                        <div id="howToUse" class="collapse" data-parent="#accordion">
                                            <div class="card-body">{{ $product->howToUse }}</div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#reasonToLove"> Reason To Love </a>
                                            </h4>
                                        </div>

                                        <div id="reasonToLove" class="collapse" data-parent="#accordion">
                                            <div class="card-body">{{ $product->reasonToLove }}</div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#ingredients"> Ingredients </a>
                                            </h4>
                                        </div>

                                        <div id="ingredients" class="collapse" data-parent="#accordion">
                                            <div class="card-body">{{ $product->ingredients }}</div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#claims"> Claims </a>
                                            </h4>
                                        </div>

                                        <div id="claims" class="collapse" data-parent="#accordion">
                                            <div class="card-body">{{ $product->claims }}</div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#olFactoryNotes"> OL Factory Notes </a>
                                            </h4>
                                        </div>

                                        <div id="olFactoryNotes" class="collapse" data-parent="#accordion">
                                            <div class="card-body">{{ $product->olFactoryNotes }}</div>
                                        </div>
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
