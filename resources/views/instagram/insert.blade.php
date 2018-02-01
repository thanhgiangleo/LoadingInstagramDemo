@include("partials/head")

<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")

    <div class="w3-container" style="margin: 0 auto; text-align: justify;">
        <form class="form-signin"
              method="POST" <?php !empty($data) ? print "action=updateInstagramAction/$data->id\"" : print "action=/insertInstagramAction"  ?>>
            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleInputEmail1">Url image</label>
                <input type="text" id="image" name="image" class="form-control" placeholder=""
                       <?php if (!empty($data->image)) echo "value= '" . $data->image . "'" ?> required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Link to instagram</label>
                <input type="text" id="link" name="link" class="form-control"
                       placeholder="" <?php if (!empty($data->link)) echo "value= '" . $data->link . "'" ?>>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="text" id="date" name="date" class="form-control" placeholder="dd/mm/yyyy"
                       <?php if (!empty($data->year)) echo "value= '" . $data->day . "/" . $data->month . "/" . $data->year . "'" ?> required>
            </div>

            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block btn-signin"
                        type="submit"><?php !empty($data) ? print "Updated" : print "Add" ?></button>
            </div>

        </form>
    </div>
</div>

<div style="margin-top: 30px">
    @include("partials.footer")
</div>

@include("partials.endpage")
</body>
</html>
