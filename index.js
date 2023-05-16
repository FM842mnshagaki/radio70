const form = document.getElementById("form");
const input = document.getElementById("input");
const ul = document.getElementById("ul");

form.addEventListener("submit",function(event) {
    event.preventDefault();
  console.log(input.value);
})

