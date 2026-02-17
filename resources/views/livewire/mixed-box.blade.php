<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mixed Box</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Mixed Box</li>
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
                        <h3 class="card-title">Mixed Box</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="creatVariety" class="form-material" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <h4 class="sub-title">Category</h4>
                                    @foreach ($categories as $index => $category)
                                        <div class="form-check form-check-inline">
                                            <input wire:model.change="category" wire:model="{{$category->name}}" class="form-check-input" type="radio" id="{{$category->name}}" value="{{$category->name}}">
                                            <label class="form-check-label" for="{{$category->name}}">{{$category->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div><hr>
                            
                            <div class="row">
                                @foreach ($mixedBoxes as $mb_index => $mixedBox)
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="card">
                                            <div class="card-block table-border-style">
                                                <h5>{{$mixedBox->name}}</h5>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <td colspan="2"><span>Total Stems {{$mixedBox->totalStems}}</span> &nbsp;&nbsp;&nbsp; <span>{{$mixedBox->length}} cm</span></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mixedBox->mixBoxLines as $mbl_index => $mixBoxLine)
                                                                <tr>
                                                                    <td>{{$mixBoxLine->variety}}</td>
                                                                    <td>{{$mixBoxLine->stems}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label" for="{{ $mixedBox->id }}">Select</label> &nbsp;&nbsp;
                                                            <input wire:key="{{ $mixedBox->id }}" wire:model="mixedBoxes.{{ $mb_index }}.checked" id="{{ $mixedBox->id }}" type="checkbox" class="form-check-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><br>

                            <!-- <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


