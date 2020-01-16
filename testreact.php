<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
body {
  padding: 40px;
}

.select_box_area {
  position: relative;
  display: inline-block;
}
.select_box_area p {
  margin-bottom: 0px;
  min-width: 300px;
  max-width: 300px;
  background: #ffffff;
  padding: 10px 15px;
  border: 1px solid #999999;
  line-height: 24px;
  padding-right: 30px;
  cursor: pointer;
}
.select_box_area p em {
  position: absolute;
  right: 15px;
  top: 13px;
  font-size: 20px;
  transition: all 0.3s linear;
}
.select_box_area p em.angle-up {
  transform: rotate(180deg);
}
.select_box_area p .option {
  position: relative;
  display: inline-block;
  padding-right: 15px;
}
.select_box_area p .option::after {
  content: ",";
  position: absolute;
  right: 5px;
  top: 0;
}
.select_box_area p .option:last-of-type {
  padding-right: 0px;
}
.select_box_area p .option:last-of-type::after {
  display: none;
}

.filter_list {
  padding: 0px;
  background: #ffffff;
  border: 1px solid #999999;
  border-top: none;
  display: none;
}
.filter_list li {
  list-style: none;
}
.filter_list li label {
  display: block;
  width: 100%;
  padding: 10px;
  margin: 0px;
  font-size: 14px;
  cursor: pointer;
}
.filter_list li input[type="checkbox"] {
  margin-right: 5px;
}
.filter_list li + li {
  border-top: 1px solid #999999;
}

.custom-select {
  display: none;
}

  </style>
  <script>
$(document).ready(function() {
  "use strict";
  
  /*---------------
  --------- Converting Options into list (own structure) -------- */

  var myUl = [];

  $(".custom-select option").each(function() {
    var optionText = $(this).text();
    var optionValue = $(this).val();
    var thisList = $(this).parent();

    myUl.push(
      '<li><label><input type="checkbox"/>' + optionText + '</label></li>'
    );
  });

  var $p = $("<p />", {
    class: "select",
    html:
      '<span class="placeholder">Select</span><em class="fa fa-angle-down"></em>'
  });

  var $ul = $("<ul/>", {
    class: "filter_list",
    html: myUl.join("")
  });

  var expendBefore = $("<div />", {
    class: "select_box_area",
    html: [$p, $ul]
  });

  $(".custom-select").before(expendBefore);
  
  
  /*---------------
  --------- Toggle Multiselect list -------- */

  $(document).on("click", ".select", function() {
    var filterList = $(this).next(".filter_list");

    if (filterList.is(":hidden")) {
      $(filterList).fadeIn();
      $(this).find("em").addClass("angle-up");
    } else {
      $(filterList).fadeOut();
      $(this).find("em").removeClass("angle-up");
    }
  });

  /*---------------
  --------- Check and uncheck Options from the list -------- */

  $(document).on("click", '.filter_list input[type="checkbox"]', function() {
    var inputVal = $(this).parent("label").text();
    var placeholderSpan = $(".placeholder");
    var findVal = $(".select").find('span[data-title="' + inputVal + '"]');

    if ($(this).is(":checked")) {
      placeholderSpan.remove();
      $(".select").append(
        '<span data-title="' +
          inputVal +
          '" class="option">' +
          inputVal +
          "</span>"
      );
    } else {
      if ($(".select span").length >= 1) {
        findVal.remove();
      }
      if ($(".select span").length < 1) {
        $(".select").append('<span class="placeholder">Select</span>');
      }
    }
  });


});

</script> 
</head>
<body>

<div class="ui form">
  
  
  

   

    <select class="custom-select form-control col-md-1 ">
    <option value="HTML">HTML</option>
    <option value="jQuery">jQuery</option>
    <option value="Pug">Pug</option>
    <option value="SASS">SASS</option>
    <option value="Angular">Angular</option>
    <option value="React">React</option>
    <option value="Jade">Jade</option>
    <option value="PHP">PHP</option>
    <option value="Java">Java</option>
  </select>
  </div>  
   
</div>

  <br><br>
  

  <div class="ui button">
    Clear Filters
  </div>






</body>
</html>
