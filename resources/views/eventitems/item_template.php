<script id="model" type="text/x-handlebars-template">
    <div class="card item col s12 m6" >
        <div class="card-content ">
            <!--Modal trigger-->
            <a class="waves-effect waves-light btn" href="#modal1">Modal</a>
            <a class="delete-item" href="#" style="float: right">X</a>
                <label for="name">Item à ajouter :</label>
                <input length="30" name="eventitem[{{count}}][name]" type="text">
                <label for="qty_asked">Quantité :</label>
                <input name="eventitem[{{count}}][qty_asked]" type="number" value="0">
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

</script>