<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ $category }} sub-Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}category-component">Category</a></li>
                        <li class="breadcrumb-item active"> Sub-categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content product-sub-category">
        <div class="row ">
            @foreach ($subCategories as $index => $subCategory)
                <div class="col-sm-10 offset-sm-1 text-center col-sub-category">
                    <h3 >{{ $subCategory->Name }}</h3> 
                    <h6 class="hr-lines">COLLECTION</h6>
                    @if($subCategory->HeadSize)
                        <h6> {{ $subCategory->HeadSize }} HEADSIZE</h6>
                    @endif
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <div class="row variety-section">
                                @foreach ($subCategory->varieties as $v_index => $variety)
                                    <div class="col-sm-4 text-center variety">
                                        <a href="#"><img src="{{ asset('storage'.env('IMG_STORAGE').$variety->picUrl) }}" alt="{{ $variety->VarietyName }}" class="waves-effect waves-light variety-img"></a>
                                        <div> <strong class="variety-name">{{ $variety->VarietyName }}</strong> ({{$stemsPerBunch}} stems per bunch)</div> 
                                        <select wire:model.live="length" required>
                                            <option disabled selected>LENGTH</option>
                                            <option value="len40">40 cm</option>
                                            <option value="len50">50 cm</option>
                                            <option value="len60">60 cm</option>
                                            <option value="len70">70 cm</option>
                                            <option value="len80">80 cm</option>
                                            <option value="len90">90 cm</option>
                                        </select>

                                        <div>{{$currency}} {{$amount}}</div>
                                        
                                        <div class="ordered-quantity">
                                            <button wire:click="decrement({{ $index }}, {{ $v_index }})" wire:key="{{ $variety->id }}"><i class="fas fa-minus"></i></button>
                                            <input type="number" wire:model="subCategories.{{ $index }}.varieties.{{ $v_index }}.quantity" min="1" oninput="validity.valid||(value='');">
                                            <button wire:click="increment({{ $index }}, {{ $v_index }})" wire:key="{{ $variety->id }}"><i class="fas fa-plus"></i></button>
                                        </div>

                                        @if($variety->InStock)
                                            <button wire:click="add({{ $index }}, {{ $v_index }})" wire:key="{{ $variety->id }}" class="btn">ADD TO BOX ({{$currentBoxQuantity}} / {{$boxCapacity}})</button>
                                        @else
                                            <!-- <button wire:click="loadAlternatives({{ $index }}, {{ $v_index }})" wire:key="{{ $variety->id }}" type="button" class="btn" data-toggle="modal" data-target="#variety-alternative">Out of Stock - Get alternative(s)</button> -->
                                            <button wire:click="loadAlternatives({{ $index }}, {{ $v_index }})" wire:key="{{ $variety->id }}" type="button" class="btn">Out of Stock - Get alternative(s)</button>
                                        @endif
                                    </div>

                                    @if(!$variety->InStock && $variety->focused)
                                        <div class="col-sm-12" id="variety-alternative">
                                            <div class="card card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$selectedVariety->VarietyName}} &nbsp;&nbsp; Alternative(s)</h3>

                                                    <div class="card-tools">
                                                        <button wire:click="closeAlternative({{ $index }}, {{ $v_index }})" wire:key="{{ $variety->id }}" type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach($selectedVariety->alternatives as $index =>  $alternative)
                                                            <div class="col-sm-4 text-center variety">
                                                                <a href="#"><img src="{{ asset('storage'.env('IMG_STORAGE').$alternative->picUrl) }}" alt="{{ $alternative->VarietyName }}" class="waves-effect waves-light variety-img"></a>
                                                                <div> <strong class="variety-name">{{ $alternative->VarietyName }}</strong> ({{$stemsPerBunch}} stems per bunch)</div> 
                                                                <!-- <select wire:model.live="length" required>
                                                                    <option disabled selected>LENGTH</option>
                                                                    <option value="len40">40 cm</option>
                                                                    <option value="len50">50 cm</option>
                                                                    <option value="len60">60 cm</option>
                                                                    <option value="len70">70 cm</option>
                                                                    <option value="len80">80 cm</option>
                                                                    <option value="len90">90 cm</option>
                                                                </select> -->

                                                                <div>{{$currency}} {{$amount}}</div>

                                                                <div class="ordered-quantity">
                                                                    <!-- <button wire:click="decrementAlternative({{ $index }})" wire:key="{{ $alternative->id }}"><i class="fas fa-minus"></i></button> -->
                                                                    <input type="number" wire:model="selectedVariety.alternatives.{{ $index }}.quantity" min="1" oninput="validity.valid||(value='');">
                                                                    <!-- <button wire:click="incrementAlternative({{ $index }})" wire:key="{{ $alternative->id }}"><i class="fas fa-plus"></i></button> -->
                                                                </div>

                                                                <button wire:click="addAlternative({{ $index }})" wire:key="{{ $alternative->id }}" class="btn">ADD TO BOX ({{$currentBoxQuantity}} / {{$boxCapacity}})</button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- Here -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                @if($selectedVariety)
                    <div class="modal fade" id="variety-alternative">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$selectedVariety->VarietyName}} &nbsp;&nbsp; Alternative(s)</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        @foreach($selectedVariety->alternatives as $index =>  $alternative)
                                            <div class="col-sm-6 text-center variety">
                                                <a href="#"><img src="{{ asset('storage'.env('IMG_STORAGE').$alternative->picUrl) }}" alt="{{ $alternative->VarietyName }}" class="waves-effect waves-light variety-img"></a>
                                                <div> <strong class="variety-name">{{ $alternative->VarietyName }}</strong> ({{$stemsPerBunch}} stems per bunch)</div> 
                                                <!-- <select wire:model.live="length" required>
                                                    <option disabled selected>LENGTH</option>
                                                    <option value="len40">40 cm</option>
                                                    <option value="len50">50 cm</option>
                                                    <option value="len60">60 cm</option>
                                                    <option value="len70">70 cm</option>
                                                    <option value="len80">80 cm</option>
                                                    <option value="len90">90 cm</option>
                                                </select> -->

                                                <div>{{$currency}} {{$amount}}</div>

                                                <div class="ordered-quantity">
                                                    <!-- <button wire:click="decrementAlternative({{ $index }})" wire:key="{{ $alternative->id }}"><i class="fas fa-minus"></i></button> -->
                                                    <input type="number" wire:model="selectedVariety.alternatives.{{ $index }}.quantity" min="1" oninput="validity.valid||(value='');">
                                                    <!-- <button wire:click="incrementAlternative({{ $index }})" wire:key="{{ $alternative->id }}"><i class="fas fa-plus"></i></button> -->
                                                </div>

                                                <button wire:click="addAlternative({{ $index }})" wire:key="{{ $alternative->id }}" class="btn">ADD TO BOX ({{$currentBoxQuantity}} / {{$boxCapacity}})</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
