<form class="form-signin" method="POST" <?php !empty($data) ? print "action=updateInstagramAction/$data->id\"" : print "action=/insertInstagramAction"  ?>>
    {{ csrf_field() }}

    <input type="text" id="image" name="image" class="form-control" placeholder="Url image" <?php if(!empty($data->image)) echo "value= '" . $data->image . "'" ?> required>

    <input type="text" id="link" name="link" class="form-control" placeholder="Link to instagram" <?php if(!empty($data->link)) echo "value= '" . $data->link . "'" ?>>
    <input type="text" id="date" name="date" class="form-control" placeholder="dd/mm/yyyy" <?php if(!empty($data->year)) echo "value= '" . $data->day . "/" . $data->month . "/" . $data->year . "'" ?> required>

    <button class="btn btn-lg btn-primary btn-block btn-signin"
            type="submit"><?php !empty($data) ? print "Updated" : print "Add" ?></button>
</form>
