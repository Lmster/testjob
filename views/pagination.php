
<nav class='mt-4' aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="/" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <?php for($i = 0, $numpage = ''; $i < $numpages; $i++, $numpage = $i + 1){?>
            <li class="page-item <?=$numpage == $current_page ? 'active' : ''?>"><a class="page-link" href="/<?=$numpage ? '?page=' . $numpage . '&' . $sort : ($sort ? '?' . $sort : '')?>"><?=$i + 1?></a></li>
        <?php }?>

        <li class="page-item">
            <a class="page-link" href="/?page=<?=$numpages?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>