<?php
    // Se existe uma mensagem, ele irá utilizar os componentes
    // do bootstrap para fazer uma caixinha bonitinha!
    if(isset($_SESSION['message'])) :
?>   
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Estimada gente!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    unset($_SESSION['message']);
    endif;
?>