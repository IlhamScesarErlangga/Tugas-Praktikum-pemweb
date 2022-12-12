<form id="form_mahasiswa" align="center">
    <label for="kampus">Kampus</label>
    <select name="kampus" id="kampus">
        <option value=""> Pilih Kampus </option>
        <option value="ITERA"> Institut Teknologi Sumatera </option>
        <option value="UINRIL"> UIN Raden Intan Lampung </option>
        <option value="UNILA"> Universitas Lampung </option>
        <option value="UBL"> Universitas Bandar Lampung </option>
        <option value="UTB"> Universitas Tulang Bawang </option>
        <option value="UTI"> Universitas Teknokrat Indonesia </option>
    </select>
</form>

<br>

<div id="tampil_data"></div>
    <script src = "https://code.jquery.com/jquery-3.6.1.min.js"
    integrity = "sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin = "anonymous">
    </script>


	<script>
    $(document).ready(function () {
        $("#tampil_data").load("tampil.php");
            $("#btn_tampil").click(function () {
            let data = $("#form_mahasiswa").serialize();
            $.ajax({
            type : "POST",
            url : "tambah.php",
            data : data,
            success : function (response) {
            $("#tampil_data").load("tampil.php");
            }
            });
        });
    });
    
</script>