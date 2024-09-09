const modal = document.getElementById("myModal");
const btn = document.querySelectorAll(".btn-ver");
const span = document.getElementsByClassName("close")[0];

btn.forEach(element => {
  element.addEventListener('click', () => {
    modal.style.display = "block";
  });
});

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}