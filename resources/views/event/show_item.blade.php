<div class="col s12 m6">
    <div class="card card-item">
        <div class="card-image" style="float:left">
            <img alt="item {{$item->name}} thumbnail" src="http://localhost/imgs/colddrink-icon.png" class="item-image">
        </div>
        <div class="card-content activator">
            <span class="card-title activator">{{$item->qty_asked}} : {{$item->name}}</span>
            <div class="activator">
                <div class="progress">
                    <div class="determinate blue darken-1" style="width: 70%"></div>
                </div>
                </span>
            </div>

            <div class="item-orders">
                <ul>
                    @forelse($item->orders()->get() as $order)
                        <li>{{$order->user->name}} : {{$order->qty_taken}}</li>
                    @empty
                        Be the first to taken some !
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="card-action ">
            <label for="qty_taken">Je prends</label>
            <input item="{{$item->id}}" name="qty_taken" value="{{$order->qty_taken}}" class="item-qty-taken" type="number" placeholder="qty.." min="0.0" step="0.1"/>
        </div>
    </div>
</div>