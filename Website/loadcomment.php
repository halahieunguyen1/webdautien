<?php
   require("ketnoi.php");
    if (isset($_POST['id_product'])){
        $sql="SELECT * FROM comment WHERE id_product=".$_POST['id_product']." AND id_rep=0 ORDER BY time DESC";
                $query=mysqli_query($conn,$sql);
                while ($row=mysqli_fetch_array($query)){
                    echo "<ul class='comment-text'><li class='account_comment'>".$row['account']."</li>
                            <li class='time_comment'>".$row['time']."</li>
                            <li class='content_comment'><div>".$row['text']."</div></li></ul>";
    }
}
?>