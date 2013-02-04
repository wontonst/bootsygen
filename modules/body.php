<?php include(__DIR__ . '/header.php');?>
<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $navbar;
        ?>
        <div class="span9">
            <div class="hero-unit">
                <h1><?php echo $title;?></h1>
                <p><?php echo $description;?></p>
            </div>
            <div class="row-fluid">

<?php   
   $i=0;
foreach($previews as $k=>$p){
echo'                <div class="span4">
                    <h2>'.$k.'</h2>
                    <p>'.$p.'</p>
                    <p><a class="btn" href="'.$k.'.html">View details &raquo;
                        </a></p>
                </div><!--/span-->';
$i++;if($i % 3 == 0)echo '            </div><!--/row-->
            <div class="row-fluid">';
 }
?>
            </div><!--/row-->
        </div><!--/span-->
    </div><!--/row-->

    <hr />

    <footer>
        <p>&copy;
            <?php echo $author.' '.$year;?></p>
    </footer>

</div><!--/.fluid-container-->

<?php include(__DIR__ . '/footer.php');?>
