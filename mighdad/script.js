const screen = document.querySelector("#screen");
const btn = document.querySelectorAll(".btn");

for (item of btn) {
  item.addEventListener("click", (e) => {
    btntext = e.target.innerText;

    if (btntext == "×") {
      btntext = "*";
    }

    if (btntext == "÷") {
      btntext = "/";
    }
    screen.value += btntext;
  });
}

function backspc() {
  screen.value = screen.value.substr(0, screen.value.length - 1);
}
