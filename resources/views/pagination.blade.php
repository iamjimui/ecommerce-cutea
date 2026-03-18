<nav aria-label="..." style="position:relative;z-index:10;display:flex;justify-content:center;margin-top:7%;">
  <ul class="pagination">
    <?php
    if (isset($_GET['page'])) {
      if ($page > 1) {
        if ($page < $numberOfPages) {
          if ($numberOfPages > 2) {
            echo '<li class="page-item">
                    <a class="page-link" href="?page='.($page-1).'" style="background-color:white;">Précédent</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" style="background-color:gray;" href="?page='.($page-1).'">'.($page-1).'</a>
                  </li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link">'.$page.'<span class="visually-hidden">(current)</span></a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" style="background-color:gray;" href="?page='.($page+1).'">'.($page+1).'</a>
                  </li>
                  <li class="page-item">
                  <a class="page-link" style="background-color:white;" href="?page='.($page + 1).'">Suivant</a>
                  </li>';
          }
        } else {
          echo '<li class="page-item">
                  <a class="page-link" style="background-color:white;" href="?page='.($page-1).'">Précédent</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="?page='.($page-1).'" style="background-color:gray;">'.($page-1).'</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="?page='.$page.'">'.$page.'</a>
                </li>
                <li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Suivant</a>
                </li>';
        }
      } else {
        if ($numberOfPages > 1) {
          echo '<li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Précédent</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link">'.$page.'</a>
                </li>
                <li class="page-item">
                  <a class="page-link" style="background-color:gray;" href="?page='.($page+1).'">'.($page+1).'</a>
                </li>
                <li class="page-item">
                  <a class="page-link" style="background-color:white;" href="?page='.($page+1).'">Suivant</a>
                </li>';
        } else {
          echo '<li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Précédent</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link">'.$page.'</a>
                </li>
                <li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Suivant</a>
                </li>';
        }
      }
    } else {
      echo '<li class="page-item disabled">
              <a class="page-link" style="background-color:white;">Précédent</a>
            </li>
            <li class="page-item active" aria-current="page">
              <a class="page-link">1<span class="visually-hidden">(current)</span></a>
            </li>';
      if ($numberOfProducts > 8) {
        echo '<li class="page-item">
              <a class="page-link" style="background-color:white;" href="?page=2">Suivant</a>
            </li>';
      } else {
        echo '<li class="page-item disabled">
                <a class="page-link" style="background-color:white;">Suivant</a>
              </li>';
      }
    }
    ?>
  </ul>
</nav>