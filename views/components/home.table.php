<?php 
    $databaseArray = [["title" => "test", "rating" => 1] ,["title" => "the good place", "rating" => 4.5]];
?>

<table>
    <tr>
        <th>Title</th>
        <th>Rating</th>
    </tr>
    <?php foreach ($databaseArray as $row ) :?> 
        <tr>
            <td><?= $row['title'] ?></td>
            <td><?= $row['rating'] ?></td>
        </tr>
        

    <?php endforeach ?>
</table>
