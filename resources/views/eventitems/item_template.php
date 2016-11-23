<script id="model" type="text/x-handlebars-template">
    <div class="card item" >
        <div class="card-content ">
            <a class="delete-item" href="#" style="float: right">X</a>
                <label for="name">Item &agrave; ajouter :</label>
                <input length="30" name="eventitem[{{count}}][name]" type="text">
                <label for="qty_asked">Quantit&eacute; :</label>
                <input name="eventitem[{{count}}][qty_asked]" type="number" value="0">
        </div>
    </div>

</script>