<script id="model" type="text/x-handlebars-template">
    <div class="card item col s12 m6" >
        <div class="card-content ">
            
            <!--Modal trigger-->
            <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Modal</a>

            <a class="delete-item" href="#" style="float: right">X</a>
                <label for="name">Item à ajouter :</label>
                <input length="30" name="eventitem[{{count}}][name]" type="text">
                <label for="qty_asked">Quantité :</label>
                <input name="eventitem[{{count}}][qty_asked]" type="number" value="0">
        </div>
    </div>

</script>