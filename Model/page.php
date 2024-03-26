<?php
    class page
    {
        function findPage($count,$limit)
        {
            return (($count%$limit)==0?$count/$limit:ceil($count/$limit));
        }
        function findStart($limit)
        {
            if(!isset($_GET['page'])||$_GET['page']==1)
            { 
                $start=0;
            }
            else
            {
                $start=($_GET['page']-1)*$limit;
            }
            return $start;
        }
    }
?>