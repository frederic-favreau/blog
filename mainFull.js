const modaleBox = document.querySelector(".bloc-modale");
let linkDel = document.querySelectorAll(".delete-article");
let main = document.querySelector("main");

for (const linkDels of linkDel) {
  linkDels.addEventListener("click", function () {
    let titre = this.dataset.titre;
    let id = this.dataset.id;
    modaleBox.style.display = "block";

    const boxDelete = document.createElement("div");
    boxDelete.setAttribute("id", "box-delete");
    boxDelete.classList.add("active-box-delete");
    main.append(boxDelete);

    const reminderM = document.createElement("p");
    boxDelete.appendChild(reminderM);
    reminderM.innerText = "Voulez vous supprimer l'article suivant :";

    const titleArticle = document.createElement("p");
    titleArticle.setAttribute("class", "article-name-box");
    boxDelete.appendChild(titleArticle);
    titleArticle.innerText = titre;

    const contBtn = document.createElement("div");
    titleArticle.append(contBtn);

    const btnCancel = document.createElement("a");
    btnCancel.setAttribute("id", "btn-cancel");
    contBtn.appendChild(btnCancel);
    btnCancel.innerHTML = "Annuler";

    const btnConfirmed = document.createElement("a");
    btnConfirmed.setAttribute("id", "btn-confirmed");
    btnConfirmed.setAttribute("href", "./delete.php?id=" + id);
    contBtn.appendChild(btnConfirmed);
    btnConfirmed.innerHTML = "Confirmer";

    btnCancel.addEventListener("click", function () {
      boxDelete.remove();
      modaleBox.style.display = "none";
    });
  });
}
