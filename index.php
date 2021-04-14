<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Форма отправки данных</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

  <div>
    <h3>Форма отправки данных</h3>
    <form action="" onsubmit="return submitAction(this);">

      <input id="text" type="text" placeholder="Enter some text">
      <p></p>
      <input id="file" type="file">
      <p></p>

      <button class="submit">Submit</button>
    </form>
    <span id="message_form"></span>
  </div>


  <script>
    function submitAction(form) {
      var formData = new FormData();
      jQuery.each($('#file')[0].files, function(i, file) {
        formData.append('file', file);
      });
      formData.append('text', $('input#text').val());
      $.ajax({
        url: "/upload.php",
        type: "POST",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function(data) {

          if (data.result == "Y") {
            $('#message_form').html('Файл добавлен');
            setTimeout(function() {
              $('#message_form').html(' ');
            }, 8000);
          } else {
            $('#message_form').html('Файл не добавлен');
            setTimeout(function() {
              $('#message_form').html(' ');
            }, 8000);
          }
        }
      });

      return false;
    }
  </script>
</body>

</html>