
    
    <div class="homeContainer">
       <?php 
       //toggle logic, dir == null when home view first loads in, so set start value. When sort method is triggered,
       // dir gets sent and processed in the controller, data gets injected into the view. Since dir is sent to the controller,
       //it becomes available for the home view ternary logic, so if and then switches it.
       $dir = $dir ?? null;
       if (!$dir) {
        $dir = "ASC";
       }
       ?>
    
    <table>
        <tr>
            <th><a href=" <?= URLROOT ?>/home/sort/series/title/?dir=<?= $dir == "ASC" ? "DESC" : "ASC"?>">Title<?= $dir == "ASC" ? "^" : "⌄" ?></a></th>
            <th><a href="<?= URLROOT ?>/home/sort/series/rating/?dir=<?= $dir == "ASC" ? "DESC" : "ASC"?>">Rating<?= $dir == "ASC" ? "^" : "⌄" ?></a></th>
            <th>Meer info</th>
        </tr>
        <h1>Series</h1>
        <?php foreach ($arraySeries as $row ) :?> 
            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['rating'] ?></td>
                <td><a href = "<?=  URLROOT ?>/home/details/series/<?= $row['id'] ?>">Details</a></td>
            </tr>
        <?php endforeach ?>
        
    </table>
    <a class="addButton" href="<?= URLROOT ?>/add/show/series">Add new Series</a>
    <h1>Movies</h1>
    <table>
            <tr>
                <th><a href=" <?= URLROOT ?>/home/sort/movies/title/?dir=<?= $dir == "ASC" ? "DESC" : "ASC"?>">Title<?= $dir == "ASC" ? "^" : "⌄" ?></a></th>
                <th><a href="<?= URLROOT ?>/home/sort/movies/length_in_minutes/?dir=<?= $dir == "ASC" ? "DESC" : "ASC"?>">Duur<?= $dir == "ASC" ? "^" : "⌄" ?></a></th>
                <th>Meer info</th>
            </tr>
            <?php foreach ($arrayMovies as $row ) :?> 
                <tr>
                    <td class = ><?= $row['title'] ?></td>
                    <td><?= $row['length_in_minutes'] ?></td>
                    <td><a href = "<?=  URLROOT ?>/home/details/movies/<?= $row['id'] ?>">Details</a></td>
                </tr>
            <?php endforeach ?>
            
    </table>
    <a class="addButton" href="<?= URLROOT ?>/add/show/movies">Add new Movie</a>
    </div>
