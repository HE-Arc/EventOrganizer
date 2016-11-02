<div class="card card-item">
    <div class="card-image" style="float:left">
        <img src="http://localhost/imgs/colddrink-icon.png" class="item-image">
    </div>
    <div class="card-content activator">
        <span class="card-title activator">{{$item->qty_asked}} : {{$item->name}}</span>
        <div class="activator">
            <div class="progress">
                <div class="determinate blue darken-1" style="width: 70%"></div>
            </div>
            </span>
        </div>
    </div>
    <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Quantité que je prends<i class="material-icons right">close</i></span>
        <div class="qty-input">
            <input type="number" />
            <span class="unity-container">
                  Litres
                </span>
        </div>
    </div>
    <div class="card-action">
        <a href="#" class="activator">Prendre une partie</a>
    </div>
</div>