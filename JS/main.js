window.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector("#hamburger");
  const menus = document.querySelector("#menus");

  hamburger.addEventListener("click", () => {
    if (menus.className.includes("show")) {
      menus.classList.remove("show");
    } else {
      menus.classList.add("show");
    }
  });
});

window.addEventListener("resize", () => {
  if (window.innerWidth > 992) {
    if (menus.className.includes("show")) {
      menus.classList.remove("show");
    }
  }
});

const amount = document.querySelectorAll(`#price`);
const totalAmount = document.querySelector(`#totalAmount`);

const getTotal = () => {
  let sum = 0;
  for (let i = 0; i < amount.length; i++) {
    sum += Number(amount[i].value);
  }
  totalAmount.value = sum;
};

let navbar = document.querySelector(".header .navbar");
let accountBox = document.querySelector(".header .account-box");

document.querySelector("#menu-btn").onclick = () => {
  navbar.classList.toggle("active");
  accountBox.classList.remove("active");
};

document.querySelector("#user-btn").onclick = () => {
  accountBox.classList.toggle("active");
  navbar.classList.remove("active");
};

window.onscroll = () => {
  navbar.classList.remove("active");
  accountBox.classList.remove("active");
};

document.querySelector("#close-update").onclick = () => {
  document.querySelector(".edit-product-form").style.display = "none";
  window.location.href = "admin_products.php";
};
