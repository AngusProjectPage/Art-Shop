<footer>
    <nav aria-label="Art results navigation">
    <?php
        if($page < $count) {
            $nextPage = $page + 1;
            $disabledClass2 = '';
        }
        else {
            $nextPage = $page;
            $disabledClass2 = 'disabled';
        }
        ?>
        <ul class="pagination justify-content-center pb-3">
            <li class="page-item"><a class="page-link <?php echo $disabledClass1 ?>" href="index.php?page=<?php echo $previousPage?>">Previous</a></li>
            <li class="page-item"><a class="page-link <?php echo $disabledClass2 ?>" href="index.php?page=<?php echo $nextPage?>">Next</a></li>
        </ul>
    </nav>
</footer>