
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
