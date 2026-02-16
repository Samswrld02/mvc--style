
    
    <div class="homeContainer">
    <table>
        <tr>
            <th>Title</th>
            <th>Rating</th>
            <th>Meer info</th>
        </tr>
        <h1>Series</h1>
        <?php foreach ($arraySeries as $row ) :?> 
            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['rating'] ?></td>
                <td><a href = "home/details/series/<?= $row['id'] ?>">Details</a></td>
            </tr>
        <?php endforeach ?>
    </table>
    <h1>Movies</h1>
    <table>
            <tr>
                <th>Title</th>
                <th>Duur</th>
                <th>Meer info</th>
            </tr>
            <?php foreach ($arrayMovies as $row ) :?> 
                <tr>
                    <td class = ><?= $row['title'] ?></td>
                    <td><?= $row['length_in_minutes'] ?></td>
                    <td><a href = "home/details/movies/<?= $row['id'] ?>">Details</a></td>
                </tr>
            <?php endforeach ?>
    </table>
    </div>
