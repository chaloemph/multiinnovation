<?php require_once __DIR__.'/config/app.php'?>

<!DOCTYPE html>
<html lang="<?php echo __LANG__?>">
<head><?php require __DIR__."/templates/head.php"?></head>

<body class="about-us">
	<?php require_once __DIR__."/templates/nav.php" ?>

	<?php require_once __DIR__."/templates/slide.php" ?>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container" style="overflow:hidden">
	            <div class="title">
                    <input type="text" class="form-control" value="Close Your Eyes and Open Your Mind">
                </div>	 
                <?php
                
                $mySql = new Database();
                $sql_command = "SELECT * FROM `j3_rost` WHERE 1";
                $result = $mySql->result($sql_command);

                print_r($result);


                foreach($result as $value) {
                    print_r($value);
                }
                
                
                ?>
	    	</div>
        </div>
        
        <?php require_once __DIR__."/templates/footer.php"?>
    </div>
    <?php require_once __DIR__."/templates/script.php"?>
</body>
</html>