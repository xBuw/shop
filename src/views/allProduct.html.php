<p>All Product</p>
<?php
    foreach($array as $line){
        if($line[books_id]!=null)
            echo "Books:id=".$line[books_id]." name=".$line[name].
                " author=".$line[author]." year=".$line[year]."</br>";
    }
?>