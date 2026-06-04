function setLight() {
  document.body.className = "light";
  document.body.style.background = "white";
  document.body.style.color = "black";
  localStorage.setItem("theme", "light");
}

function setDark() {
  document.body.className = "dark";
  document.body.style.background = "black";
  document.body.style.color = "white";
  localStorage.setItem("theme", "dark");
}

function showPicker() {
  const picker = document.getElementById("picker");

  if (picker.style.display === "none") {
    picker.style.display = "block";
  } else {
    picker.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const savedTheme = localStorage.getItem("theme");
  const savedColor = localStorage.getItem("color");

  if (savedTheme === "light") {
    setLight();
  }

  if (savedTheme === "dark") {
    setDark();
  }

  if (savedTheme === "custom" && savedColor) {
    document.body.style.background = savedColor;
    document.body.style.color = "white";
    document.getElementById("picker").style.display = "block";
  }

  document.getElementById("color").addEventListener("input", function () {
    const color = this.value;

    document.body.style.background = color;
    document.body.style.color = "white";

    localStorage.setItem("theme", "custom");
    localStorage.setItem("color", color);
  });
});
