<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>入力内容チェック</title>
</head>
<body>

<?php

$post=$_POST;
$pro_otoshimono=$post['otoshimono'];
$pro_otodate=$post['otodate'];
$pro_place=$post['place'];

if($pro_otoshimono=='')
{
	print '落とし物が入力されていません。<br />';
}
else
{
	print '落とし物:';
	print $pro_otoshimono;
	print '<br />';
}

if($pro_otodate=='')
{
	print '預かり日時が入力されていません。<br />';
}
else
{
	print '預かり日時:';
	print $pro_otodate;
	print '<br />';
}

if($pro_place=='')
{
	print '場所が入力されていません。<br />';
}
else
{
	print '場所:';
	print $pro_place;
	print '<br />';
}

if($pro_otoshimono=='' || $pro_otodate=='' || $pro_place=='')
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の内容を追加します。<br />';
	print '<form method="post" action="add_done.php">';
	print '<input type="hidden" name="otoshimono" value="'.$pro_otoshimono.'">';
	print '<input type="hidden" name="otodate" value="'.$pro_otodate.'">';
	print '<input type="hidden" name="place" value="'.$pro_place.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="登録">';
	print '</form>';
}

?>

</body>
</html>
