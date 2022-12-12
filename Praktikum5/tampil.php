<table border="1" align="center" style="border-color: darkslategrey;">
    <tr>
        <th> No. </th>
        <th> NIM </th>
        <th> Nama </th>
        <th> Kampus </th>
    </tr>
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "praktikum5";
    $connection = mysqli_connect("$host", $user, $password, $dbName);
    
    $query = "SELECT * FROM mhs ORDER BY nim ASC";
    $result = mysqli_query($connection, $query);
    $i = 0;
    while ($data = mysqli_fetch_array($result)) :
    $i++;
?>
<tr>
    <td> <?= $i ?> </td>
    <td> <?= $data["nim"] ?> </td>
    <td> <?= $data["nama"] ?> </td>
    <td> <?= $data["kampus"] ?> </td>
</tr>
<?php
endwhile
?>
</table>

<script>
    $('#kampus').on('change', function () {

        var data = this.value;
        var mhs = $("tbody").find("tr");
        mhs.hide();
        mhs.filter(function (i, v) {
            var $t = $(this);
            if ($t.is(":contains('" + data + "')")) {
                return true;
            }
            return false;
        }).show();
});
</script>
