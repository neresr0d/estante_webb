const btn_menu = document.getElementById("btn-menu");
const nav_menu = document.getElementById("menu-nav");

btn_menu.addEventListener("click", () => {
  nav_menu.classList.toggle("aparecer");
});

// Logica de preview das capas
const inputCapa = document.querySelector("#capa-livro");
const capa_img = document.querySelector(".capa_img");

const editInputCapa = document.querySelector("#edit-capa-livro");
const edit_capa_img = document.querySelector(".edit_capa_img");

if (capa_img) {
  capa_img.addEventListener("click", () => {
    inputCapa.click();
  });

  inputCapa.addEventListener("change", (evento) => {
    if (inputCapa.files.length <= 0) {
      return;
    }

    let leitor = new FileReader();

    leitor.onload = () => {
      capa_img.src = leitor.result;
    };

    leitor.readAsDataURL(inputCapa.files[0]);
  });
}

if (edit_capa_img) {
  edit_capa_img.addEventListener("click", () => {
    editInputCapa.click();
  });

  editInputCapa.addEventListener("change", (evento) => {
    if (editInputCapa.files.length <= 0) {
      return;
    }

    let leitor = new FileReader();

    leitor.onload = () => {
      edit_capa_img.src = leitor.result;
    };

    leitor.readAsDataURL(editInputCapa.files[0]);
  });
}
