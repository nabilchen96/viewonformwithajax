<html>
<?php include 'koneksi.php';?>
    <body>
        <table>
            <tr>
                <td>nama</td>
                <td><input type="text" name="nama" id="nama"></td>
                
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" id="alamat"</td

            </tr>

        </table>
        <br>
        <table border="1">
            <?php 
                
                $hasil = $koneksi->query("select * from tbl_latihan");
                foreach($hasil as $h){?>
            <tr>
                <td>id</td>
                <td>nama</td>
                <td>alamat</td>
                <td>aksi</td>
            </tr>
            <tr>
                <td>
                    <?php echo $h['id'];?>
                </td>
                <td>
                    <?php echo $h['nama'];?>
                </td>
                <td>
                    <?php echo $h['alamat'];?>
                </td>
                <td>
                    <button class="view_data" id='<?php echo $h['id'];?>'>edit</button>
                </td>
            </tr>
            <?php }?>
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('.view_data').click(function(){
                    var id = $(this).attr("id");
                    $.ajax({
                    url: 'proses-ajax.php',
                    method : 'get',
                    data: {id:id},
                    })
                    .success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#alamat').val(obj.alamat);

                    });
                });
            });    
        </script>
    </body>
</html>