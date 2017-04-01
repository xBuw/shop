<p>All Product</p>
<?php
    foreach($array as $line){
        if($line[id]!=null)
            echo "Books:id=".$line[id]." name=".$line[name].
                " author=".$line[author]." year=".$line[year]."</br>";
    }
?>