
<h3>新增標題區圖片</h3>
<hr>

<form action="./api/title.php" method="post" enctype="multipart/form-data">
    <table style="width:450px;margin:auto">
        <tr>
            <td style="text-align:right">標題區圖片123</td>
            <td><input type="file" name="file" id=""> </td>
        </tr>
        <tr>
            <td style="text-align:right">標題區替代文字</td>
            <td><input type="text" name="text"> </td>
        </tr>
        <tr>
            <td colspan="2" class="cent">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
            
        </tr>
    </table>
</form>

