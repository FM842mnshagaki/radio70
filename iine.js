function textcopy() {
    var textarea = document.getElementById("textarea").value;
    document.getElementById("textarea").value = "";
    var counter = 0;
    textarea = "<div class='frame'>" + "<p class='memo'>" + textarea + "</p>" +
      "<button type='button' + class='far fa-thumbs-up' id='goodbutton'>" +
      "いいね" + "</button>" + "<a id='clicks'>" + counter + "</a>" +
      "</div>" + document.getElementById("insert").innerHTML;
    document.getElementById("insert").innerHTML = textarea;
    document.getElementById("goodbutton").onclick = function() {
      counter += 1;
      document.getElementById("clicks").innerHTML = counter;
    }
  }
