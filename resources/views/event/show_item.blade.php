<div class="col s12 m6">
    <div class="card ">
        <div class="card-image" style="float:left">
            <img alt="item {{$item->name}} thumbnail" src="{{url('/')}}/imgs/colddrink-icon.png" class="item-image">
        </div>
        <div class="card-content activator">
            <span class="card-title activator">{{$item->qty_asked}} de {{$item->name}}</span>
            <div class="activator">
                <div class="progress">
                    <div id="complete-bar-{{$item->id}}" class="determinate green accent-4" style="width: {{$item->completedAt()}}%"></div>
                </div>
                </span>
            </div>

            <div class="item-orders">
                <ul>
                    @forelse($item->orders as $order)
                        <li {!! $order->user->id === $user->id ? "id='my-contrib-$item->id'" : "" !!}><span class="item-order-username">{{$order->user->name}}</span> prends <span class="item-order-value">{{$order->qty_taken}}</span></li>
                    @empty
                        <li>Be the first to taken some !</li>
                    @endforelse
                </ul>
            </div>
        </div>
<<<<<<< HEAD
        <div class="card-action">
            <p class="range-field" style="margin: 0px">
                <input style="display: none" item="{{$item->id}}" name="qty_taken" value="{{$item->qtyTakenByUser($user)}}" class="item-qty-taken" type="range" id="test5" min="0.0" step="0.1" max="{{$item->qty_asked}}" />
            </p>

            <a {!! $item->qtyTakenByUser($user) > 0 ? '' : "style='display:none'" !!} class="waves-effect waves-teal btn-flat green-text alter-take-btn">Modifier</a>

            <a {!! $item->qtyTakenByUser($user) > 0 ? "style='display:none'"  : ''!!} class="waves-effect waves-teal btn-flat take-btn blue-text">Prendre une quantité</a>

=======
        <div class="card-action ">
            <label for="qty_taken">Je prends</label>
            <input item="{{$item->id}}" name="qty_taken" value="0" class="item-qty-taken" type="number" placeholder="qty.." min="0.0" step="0.1" max="{{$item->qty_asked}}"/>
>>>>>>> 14d0bb1eff7107806a8c8ce53dfbf000b1441231
        </div>
    </div>
</div>