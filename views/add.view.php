<h1></h1>
<div class="formContainer">
    <form method="POST" action="<?= URLROOT ?>/add/add/<?= key_exists("length_in_minutes",$results[0]) ? "movies" : "series"?>" class ="editForm">
        <?php foreach ($results[0] as $key => $value) :?>
            <?php if ($key != "id") : ?>
                <label for= "<?=$key?>"><?=$key?></label>
                <input id ="<?=$key?>" name = "<?=$key?>">
            <?php endif ?>
        <?php endforeach?>
        <button type="submit" id="saveButton">Save</button>
    </form>
</div>
