<div class="card">
    <div class="card-header">
        <h5>Order Summary</h5>
    </div>
    <div class="card-block table-border-style">
        <div class="form-group row">
            <label class="col-xs-12 col-sm-2 col-form-label">Flight Date</label>
            <div class="col-xs-12 col-sm-2">
                <input wire:model="receivingDate" name="receivingDate" type="date" class="form-control" autocomplete="off" required>
                <x-input-error :messages="$errors->get('receivingDate')" class="mt-2" />
            </div>

            <label class="col-xs-12 col-sm-2 col-form-label">Drop Off</label>
            <div class="col-xs-12 col-sm-2">
                <select wire:model="dropOff" class="form-control" required>
                    <option disabled value=""></option>
                    @foreach($dropoffs as $dropoff)
                        <option value="{{ $dropoff->name }}">{{ $dropoff->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('dropOff')" class="mt-2" />
            </div>
        </div><br>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Length</th>
                        <th>Box Type</th>
                        <th>PackRate</th>
                        <th>Quantity</th>
                        <th>Box Marking</th>
                        <th>Stems</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @if ($order_lines != null)
                        @foreach($order_lines as $index => $line)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $line->VarietyName }}</td>
                                <td><select wire:change="onLengthChange({{ $index }}, $event.target.value)" wire:key="{{ $index }}" wire:model="order_lines.{{ $index }}.Length" class="form-control" required>
                                    <option disabled value=""></option>
                                    <option value="len40">40 cm</option>
                                    <option value="len50">50 cm</option>
                                    <option value="len60">60 cm</option>
                                    <option value="len70">70 cm</option>
                                    <option value="len80">80 cm</option>
                                    <option value="len90">90 cm</option>
                                </select></td>
                                <td><select wire:change="onBoxTypeChange({{ $index }}, $event.target.value)" wire:key="{{ $index }}" wire:model="order_lines.{{ $index }}.BoxType" class="form-control" required>
                                    <option disabled value=""></option>
                                    @foreach($boxTypes as $boxType)
                                        <option value="{{ $boxType->Name }}">{{ $boxType->Name }}</option>
                                    @endforeach
                                </select></td>
                                <td>{{ $line->PackRate }}</td> 
                                <td><input wire:blur="onEnterQuantity({{ $index }}, $event.target.value)" wire:key="{{ $index }}" type="number" wire:model="order_lines.{{ $index }}.Boxes" class="form-control" required></td>
                                <td><input wire:key="{{ $index }}" type="text" wire:model="order_lines.{{ $index }}.BoxMarking" class="form-control"></td>
                                <td>{{ $line->StemQty}}</td>
                                <td><a wire:click="removeItem({{ $index }})" wire:confirm="Are you sure you want to delete?" class="btn btn-danger btn-sm waves-effect waves-light">Remove</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- <a href="/" class="btn btn-order btn-inverse waves-effect waves-light">Continue Shopping</a> -->
        <a wire:click="order" class="btn btn-order btn-primary waves-effect waves-light">Order Now</a>
    </div>
</div>