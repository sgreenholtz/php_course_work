<?php
    include('header.php');

    if (isset($_POST['submit']))
    {
        $search_term = $_POST['search'];
    }
?>
<div class="container">
    <div class="col-md-12">
        <div class="well">
            <p><?= $search_term ?></p>
        </div>
    </div>
</div>
<?php
    include('footer.php');
?>