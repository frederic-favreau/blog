const delArt = document.getElementById("box-delete");
const modaleBox = document.querySelector(".bloc-modale");
const titleBox = document.getElementById("article-nane-box");

// let linkDel = document.querySelectorAll(".delete-article");
// for (const linkDels of linkDel) {
//   linkDels.addEventListener("click", persoModale);
// }

// function persoModale() {
//   let titre = this.dataset.titre;
//   delArt.style.display = "block";
//   modaleBox.classList.add("active-modale");

//   document.querySelector("#box-delete .article-nane-box").innerText = titre;
// }

const btnCancel = document.getElementById("btn-cancel");

btnCancel.addEventListener("click", function () {
  delArt.style.display = "none";
  modaleBox.classList.remove("active-modale");
});

modaleBox.addEventListener("click", () => {
  modaleBox.classList.remove("active-modale");
  delArt.style.display = "none";
});

const confirmedDel = document.getElementById("btn-confirmed");
const notifDel = document.getElementById("confirmed-delete");

confirmedDel.addEventListener("click", function () {
  modaleBox.classList.remove("active-modale");
  delArt.style.display = "none";
  notifDel.style.display = "block";
});

notifDel.addEventListener('click', function () {
    notifDel.style.display = "none";
});


