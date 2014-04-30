<!DOCTYPE html>
<?php
    require("config/config.php");
?>


<html>
    <head>
        <title>TANAPA Safari Admin Panel</title>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
            include 'navbar.php';
        ?>
        <div class="row-fluid">
            <div class="offset1 span10" id="backer">
                <div id="inner">
                    <div class="accordion" id="loc-acc">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="btn btn-large btn-block btn-inverse" data-toggle="collapse" data-parent="#loc-acc" href="#collapseOne">
                                    Media
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>URL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php

                                                $stmt = $db_conn->prepare("SELECT MEDIA.url, MEDIA.id FROM MEDIA");
                                                $stmt->execute();
                                                $stmt->bind_result($media_url, $media_id);
                                                while($stmt->fetch()) {
                                            ?>                      
                                                <tr>
                                                    <td><?php echo $media_id?></td>
                                                    <td><a href="<?php echo substr($media_url, 1); ?>"><?php echo $media_url?></a></td>
                                                    <form name="" method=POST action="">
                                                        <input type="hidden" name="ID" value="<?php echo $r_id; ?>">
                                                        <td>
                                                            <input type="submit" name="delete" value="Delete" class="btn btn-block btn-danger">
                                                        </td>
                                                    </form>
                                                </tr>
                                            <?php
                                                }

                                                $stmt->close();
                                            ?>
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                      

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
