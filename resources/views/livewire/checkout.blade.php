<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Checkout</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}category-component">Category</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
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
                        <h3 class="card-title">Checkout</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Variety</th>
                                    <th>Stems Per Bunch</th>
                                    <th>No. of Bunches</th>
                                    <th>Total Stems</th>
                                    <th>Bunch Price</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach ($boxes as $box_index => $box)
                                <tbody>
                                    <tr>
                                        <td colspan="7" class="text-center"><b>Box {{++$box_index}}</b></td>
                                        <td><a wire:click="delete({{ --$box_index }})" wire:key="{{ $box_index }}" wire:confirm="Are you sure you want to delete?"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                    @foreach ($box->bunches as $bunch_index => $bunch)
                                        <tr>
                                            <td><img src="{{ asset('storage'.env('IMG_STORAGE').$bunch->picUrl) }}" alt="{{ $bunch->VarietyName }}" class="waves-effect waves-light bunch-img"></td>
                                            <td>{{ $bunch->VarietyName }}</td>
                                            <td>{{ $stemsPerBunch}}</td>
                                            <td>{{ $bunch->quantity }}</td>
                                            <td>{{ $bunch->quantity * $stemsPerBunch }}</td>
                                            <td>{{ $amount }}</td>
                                            <td>{{ $bunch->cost }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
               
            </div>
        </div>
    </section>
</div>
