<!doctype html>
<html lang="en">
<head>
    <meta charset="gbk">
    <title><?php if(isset($_GET['name']))
        {
            echo $_GET['name'];
        }
        else
            echo  ".";?></title>
    <script src="js/jquery.js"></script>
    <style>
        .tu{
            width: 100%;
        }

        .pic{
            position: fixed;
            right: 20px;
            top: 20px;
        }

        #num{
            font-size: 20px;
            font-family: Arial;
        }
    </style>
</head>

<body>

<?php
$num = 0;

if(isset($_GET['name']))
{
    $dirName = $_GET['name'];
}
else
    $dirName = ".";
//echo $dirName;
//$dirName=iconv("utf-8","gb2312",$dirName);
//echo $dirName;
$dir_handle = opendir($dirName);
echo "<h2><a href='?name="."."."'>"."Top Folder"."</a></h2>";
while ($file = readdir($dir_handle)) {
    echo '<br>';
//    echo $file;
    $dirFile = $dirName . "\\" . $file;
//    $file=iconv("utf-8","gb2312",$file);
    $bgcolor = $num++ % 2 == 0 ? '#ffffff' : '#cccccc';
//    echo '<tr bgcolor=' . $bgcolor . '>';
//    echo  $file ;
//    echo '<td>' . filesize($dirFile) . '</td>';
//    echo '<td>' . filetype($dirFile) . '</td>';
//    echo '<td>' . date('Y/n/t', filemtime($dirFile)) . '</td>';
//    echo '</tr>';
    if(filetype($dirFile)=='dir')
    {
        if($file=='.')
        {

        }
        else if($file=='..')
            echo "<h2><a href='?name="."$dirFile"."'>"."Father Folder"."</a></h2>";
        else
            echo "<a href='?name=".$dirFile."'><h2>".$file."</h2></a>";
    }
    else if(filetype($dirFile)=='file')
    {
        if(substr(strrchr($file, '.'), 1)=='jpg')
            echo "<img class='tu' il='false' src='027.jpg' srcs='".$dirFile."'>";
        if(substr(strrchr($file, '.'), 1)=='png')
            echo "<img class='tu' il='false' src='027.jpg' srcs='".$dirFile."'>";
//        else
//            echo "<a href='".$dirFile."'>";
    }
}
?>
</body>
<script>
    function isShow($el){
        var winH = $(window).height(),
            scrollH = $(window).scrollTop(),
            top = $el.offset().top;
        if(top < scrollH + winH*4) {
            return true;
        }else{
            return false;
        }
    }
    function showImg($el){
        $el.attr('src', $el.attr('srcs'));
        $el.attr('il','true');
    }

    $(window).on('scroll', function(){
        checkShow();
    });
    checkShow();

    function checkShow(){
        $('img').each(function(){
            var $cur = $(this);

            if($cur.attr('il')==='true'){return;}

            if (isShow($cur)) {
                    showImg($cur);
            }
        });
    }

</script>
</html>