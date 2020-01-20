<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<script>
   const pickr2 = new Pickr({
  el: '#color-picker-2',
  useAsButton: true,
  default: "123456",

  components: {
    preview: true,
    opacity: true,
    hue: true,

    interaction: {
      hex: true,
      rgba: true,
      hsla: true,
      hsva: true,
      cmyk: true,
      input: true,
      clear: true,
      save: true
    }
  }
});
</script>
<body>
<div class="card">
  <div class="card-body text-center d-flex justify-content-center align-items-center flex-column">
    <p>Click the below button to activate the Color Picker</p>
    <button class="btn btn-primary btn-sm" id="color-picker-2">Open Picker</button>
  </div>
</div>
</body>
</html>