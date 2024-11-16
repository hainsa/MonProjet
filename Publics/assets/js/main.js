$(document).ready(function () {
    let id;
    $(".modifier").on("click", function () {
      id = this.getAttribute("data-id");
      const nom = this.getAttribute("data-nom");
      const prix = this.getAttribute("data-prix");
      const ref = this.getAttribute("data-ref");
      $("#nom").val(nom);
      $("#prix").val(prix);
      $("#ref").val(ref);
    });
  
    $("#ajout").on("click", function () {
      id = null;
      $("#nom").val("");
      $("#prix").val("");
      $("#ref").val("");
    });
  
    $("#save").on("click", function (e) {
      e.preventDefault();
      const anarana = $("#nom").val();
      const fanampiny = $("#prix").val();
      const kilasy = $("#ref").val();
      const sary = $("#image")[0].files[0];
  
      const donnee = new FormData();
      donnee.append("nom", anarana);
      donnee.append("prix", fanampiny);
      donnee.append("ref", kilasy);
      donnee.append("image", sary);
      if (id) {
        donnee.append("id", id);
      }
      $.ajax({
        type: "post",
        url: "index.php?page=dataFromAjax",
        data: donnee,
  
        contentType: false,
  
        processData: false,
  
        success: function (donnee) {
          if (id) {
            console.log(donnee);
  
            document.getElementById(id).cells[0].textContent = id;
            document.getElementById(id).cells[1].textContent = anarana;
            document.getElementById(id).cells[2].textContent = fanampiny;
            document.getElementById(id).cells[3].textContent = kilasy;
            document
              .getElementById(`img-${id}`)
              .setAttribute("src", `images/${sary.name}`);
          } else {
            console.log(donnee);
            const tr = document.createElement("tr");
            tr.innerHTML = `
                      <td>${donnee.id}</td>
                      <td>${anarana}</td>
                      <td>${fanampiny}</td>
                      <td>${kilasy}</td>
                      <td>
                      <img src="images/${sary.name}"alt="sary" height="80px">
                      </td>
                      <td><a href="index.php?page=delete&amp;id=${donnee.id}">Supprimer</a></a>
                      <button class="btn btn-secondary modifier" 
                      data-toggle="modal" data-target="#myModal"
                      data-id="${donnee.id}"
                      data-nom="${anarana}"
                      data-prenom="${fanampiny}"
                      data-classe="${kilasy}"
                      >Modifier
                  </button>
                      </td>`;
            $("tbody").append(tr);
          }
        },
      });
    });
    $('#search').on('keyup', function () {
      const tbody = document.querySelector('tbody');
      tbody.innerHTML = "";
      $.ajax({
        type: 'post',
        url: 'index.php?page=search',
        data: { 'motCle': $('#search').val() },
        success: function (donnee) {
          donneeJson = JSON.parse(donnee)
          console.log(donneeJson);
          for (donnee of donneeJson) {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                      <td>${donnee.idEdition}</td>
                      <td>${donnee.nom}</td>
                      <td>${donnee.prix}</td>
                      <td>${donnee.ref}</td>
                      <td>
                          <a href="index.php?page=delete&amp;id=${donnee.id}">Supprimer</a>
                          <a href="index.php?page=modify&amp;id=${donnee.id}">Modifier</a>
                      </td>
                  `
            tbody.append(tr);
         }
        }
      })
  
  
    })
  
  });
  