<html lang="en">
<head>
  <meta charset="utf-8">
<script>
function mydate() {
  //alert("");
  document.getElementById("dt").hidden = false;
  document.getElementById("ndt").hidden = true;
}

function mydate1() {
  d = new Date(document.getElementById("dt").value);
  dt = d.getDate();
  mn = d.getMonth();
  mn++;
  yy = d.getFullYear();
  document.getElementById("ndt").value = dt + "/" + mn + "/" + yy
  document.getElementById("ndt").hidden = false;
  document.getElementById("dt").hidden = true;
}

</script>
  <title>
  </title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="./styles.css">

</head>

<body>
  <input type="date" id="dt" onchange="mydate1();" hidden/>
  <input type="text" id="ndt"  onclick="mydate();" hidden />
  <input type="button" Value="Date" onclick="mydate();" />
</body>
</html> 
