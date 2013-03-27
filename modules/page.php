<?php include(__DIR__ . '/header.php'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $navbar;
        ?>
        <div class="span9">
            <div class="row-fluid">
                <div class="span4">
                    <h1><?php echo $title; ?></h1>
                </div><!--/span-->
		<div class="row-fluid">
                <div class="span9">
                <div class="btn-group">
   <?php //need table of contents here 
?>
                </div><!--/buttongroup-->
                </div><!--/span-->
                </div><!--/row-->
                <?php
		    if(isset($description))
		      {
echo '<div class="row-fluid">
                <div class="span9">
                    ' . $description . '
                </div><!--/span-->
                </div><!--/row-->';
		      }
/*
                foreach ($page as $k => $v) {
		  if(!$k)break;
                    echo '<div class="row-fluid">
                <div class="span9">
                    <h2 id="'.$k.'">' . $k . '</h2>
                    ' . $v . '
                </div><!--/span-->
                </div><!--/row-->';
                }*/
echo $content;
                ?>
            </div><!--/row-->
        </div><!--/span-->
    </div><!--/row-->
    <hr />

    <footer>
        <p>&copy;
            <?php echo $author . ' ' . $year; ?></p>
    </footer>

</div><!--/.fluid-container-->

<?php include(__DIR__ . '/footer.php'); ?>
