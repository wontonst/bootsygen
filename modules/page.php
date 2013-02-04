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
   <?php foreach($page as $k=>$v)
{
  if(strtolower($k) != 'summary' && $k && strtoupper($k) != 'DESCRIPTION')
  echo '<a class="btn" href="#'.$k.'">'.$k.'</a>';
}?>
                </div><!--/buttongroup-->
                </div><!--/span-->
                </div><!--/row-->
                <?php
		    if(isset($page['description']))
		      {
echo '<div class="row-fluid">
                <div class="span9">
                    ' . $page['description'] . '
                </div><!--/span-->
                </div><!--/row-->';
unset($page['description']);
		      }
		    if(isset($page['summary']))
		      {
echo '<div class="row-fluid">
                <div class="span9">
                    ' . $page['summary'] . '
                </div><!--/span-->
                </div><!--/row-->';
unset($page['summary']);
		      }

                foreach ($page as $k => $v) {
		  if(!$k)break;
                    echo '<div class="row-fluid">
                <div class="span9">
                    <h2 id="'.$k.'">' . $k . '</h2>
                    ' . $v . '
                </div><!--/span-->
                </div><!--/row-->';
                }
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