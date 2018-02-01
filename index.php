<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "absen";
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <canvas></canvas>
  <br>
  <select></select>


  <form  action="" class="form-user" id="senddata" method="post">
    <input type="text" name="id" id="data" value="">
    <button type="button" class="simpan">Send</button>
  </form>

<br>
<br>
<br>
<br>
<br>

<table border="1">
  <th>Nama</th>
  <th>jam kehadiran</th>

  <tr>
    <div class="tampildata"></div>
  </tr>
</table>

    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/qrcodelib.js"></script>
    <script type="text/javascript" src="js/webcodecamjquery.js"></script>


    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                $("#data").val(result.code);
                $(".simpan").trigger('click');

            }
        };
        var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
        decoder.buildSelectMenu("select");
        decoder.play();
        /*  Without visible select menu
            decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
        */
        $('select').on('change', function(){
            decoder.stop().play();
        });


        $(".simpan").click(function(){
          var data = $('.form-user').serialize();
          $.ajax({
            type: 'POST',
            url: "aksi.php",
            data: data,
            dataType: "html",
            success: function(data) {
              $('.tampildata').load("read.php")
            }
          });
        });

        function readRecords() {
          $.get("read.php", {}, function (data) {
            $(".tampildata").html(data);
          });
        }
    </script>


  </body>
</html>
