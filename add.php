<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品入力</title>
</head>
<body>
商品入力<br />
<br />

<form method="post" action="add_check.php">
落とし物<br />
<input type="text" name="otoshimono" style="width:200px"><br />
預かり日時<br />
<input type="text" name="otodate" style="width:200px"><br />
場所<br />
<input type="text" name="place" style="width:200px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="確認">
</form>

</body>
</html>
