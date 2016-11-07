<div class="col s12 m6">
    <div class="card card-item">
        <div class="card-image" style="float:left">
            <img alt="item {{$item->name}} thumbnail" src="{{url('/')}}/imgs/colddrink-icon.png" class="item-image">
        </div>
        <div class="card-content activator">
            <span class="card-title activator">{{$item->qty_asked}} : {{$item->name}}</span>
            <div class="activator">
                <div class="progress">
                    <div id="complete-bar-{{$item->id}}" class="determinate blue darken-1" style="width: {{$item->completedAt()}}%"></div>
                </div>
                </span>
            </div>

            <div class="item-orders">
                <ul>
                    @forelse($item->orders as $order)
                        <li {!! $order->user->id === $user->id ? "id='my-contrib-$item->id'" : "" !!}><span class="item-order-username">{{$order->user->name}}</span> : <span class="item-order-value">{{$order->qty_taken}}</span></li>
                    @empty
                        <li>Be the first to taken some !</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="card-action ">
            <label for="qty_taken">Je prends</label>
            <input item="{{$item->id}}" name="qty_taken" value="{{$order->qty_taken}}" class="item-qty-taken" type="number" placeholder="qty.." min="0.0" step="0.1" max="{{$item->qty_asked}}"/>
        </div>
    </div>
</div>