const crearTablaLibros = () => {
  $("#tbo").empty();

  $.ajax({
    type: "post",
    url: "./cargarTabla.php",
    data: {
      orden: $("#btnOrden").val(),
      filtroID: $("#filID").val(),
      filTitu: $("#filTitu").val(),
      filAuto: $("#filAuto").val(),
      filGene: $("#filGene").val(),
      filPrecio: $("#filPrecio").val(),
      filLanza: $("#filLanza").val(),
      filEdi: $("#filEdi").val(),
    },
    success: function (respuestaDelServer) {
      alert(respuestaDelServer);
      $("#tbo").empty();

      var JSONDB = JSON.parse(respuestaDelServer);
      JSONDB.libros.forEach(function (argvalor) {
        var fila = document.createElement("tr");

        var celID = document.createElement("td");
        celID.innerHTML = argvalor.IDLibro;
        fila.append(celID);

        var celTitulo = document.createElement("td");
        celTitulo.innerHTML = argvalor.Titulo;
        fila.append(celTitulo);

        var celAutor = document.createElement("td");
        celAutor.innerHTML = argvalor.Autor;
        fila.append(celAutor);

        var celGenero = document.createElement("td");
        celGenero.innerHTML = argvalor.Genero;
        fila.append(celGenero);

        var celPrecio = document.createElement("td");
        celPrecio.innerHTML = argvalor.precio;
        fila.append(celPrecio);

        var celLanza = document.createElement("td");
        celLanza.innerHTML = argvalor.Lanzamiento;
        fila.append(celLanza);

        var celEdi = document.createElement("td");
        celEdi.innerHTML = argvalor.Editorial;
        fila.append(celEdi);

        var celTapa = document.createElement("td");
        celTapa.innerHTML = "<button class='btnPDF'>Ver PDF</button>";
        fila.append(celTapa);

        var celModi = document.createElement("td");
        celModi.innerHTML = "<button class='btnModif'>Modificar</button>";
        fila.append(celModi);

        var celBaja = document.createElement("td");
        celBaja.innerHTML = "<button class='btnBaja'>Baja</button>";
        fila.append(celBaja);

        $("#tbo").append(fila);
      });

      $("#cantLibros").html(JSONDB.cuenta);

      $(".btnBaja").click(function () {
        if (confirm("Desea dar la baja de este libro?")) {
          var IDLibro = $(this).closest("tr").find("td:first").text();
          $.ajax({
            type: "post",
            url: "./bajas.php",
            data: {
              IDLibro: IDLibro,
            },
            success: function (respuestaDelServer) {
              alert(respuestaDelServer);
            },
          });
        }
      });

      $(".btnPDF").click(function () {
        $("#fondo").attr("class", "fondoApagado");
        // $("#PDFModal").empty();
        $("#PDFModal").attr("class", "altaModal");
        var IDLibro = $(this).closest("tr").find("td:first").text();
        $.ajax({
          type: "post",
          url: "./cargarTapa.php",
          data: {
            IDLibro: IDLibro,
          },
          success: function (respuestaDelServer) {
            // alert(respuestaDelServer);
            respJSON = JSON.parse(respuestaDelServer);
            $("#ventanaIframe").html(
              "<iframe width='100%' height='100%' src='data:application/pdf;base64," +
                respJSON.documentoPDF +
                "'></iframe>"
            );
          },
        });
      });

      $(".btnModif").click(function () {
        var IDLibro = $(this).closest("tr").find("td:first").text();
        cargarSelectModif();
        $("#fondo").attr("class", "fondoApagado");
        $("#modifModal").attr("class", "altaModal");
        $("#idModif").val(IDLibro);
        $("#idModif").attr("disabled", "true");

        $("#enviarModif").click(function () {
          $.ajax({
            type: "post",
            url: "./modificacion.php",

            data: {
              IDLibro: IDLibro,
              tituloModif: $("#tituloModif").val(),
              autorModif: $("#autorModif").val(),
              generoModif: $("#generoModif").val(),
              precioModif: $("#precioModif").val(),
              lanzamientoModif: $("#lanzamientoModif").val(),
              editorialModif: $("#editorialModif").val(),
            },
            success: function (respuestaDelServer) {
              // alert($("#generoModif").val());
              alert(respuestaDelServer);
            },
          });
        });
      });
    },
  });
};

const limpiarFiltros = () => {
  $("#limpiar").click(function () {
    $("#filID").val("");
    $("#filTitu").val("");
    $("#filAuto").val("");
    $("#filPrecio").val("");
    $("#filGene").val("");
    $("#filLanza").val("");
    $("#filEdi").val("");
  });
};

const esconderTabla = () => {
  $("#esconder").click(function () {
    $("#tbo").empty();
  });
};

const CargarOrden = () => {
  $("#btnID").click(function () {
    $("#btnOrden").val("IDLibro");
  });

  $("#btnTitulo").click(function () {
    $("#btnOrden").val("Titulo");
  });

  $("#btnAutor").click(function () {
    $("#btnOrden").val("Autor");
  });

  $("#btnGenero").click(function () {
    $("#btnOrden").val("Genero");
  });

  $("#btnPrecio").click(function () {
    $("#btnOrden").val("precio");
  });

  $("#btnLanzamiento").click(function () {
    $("#btnOrden").val("Lanzamiento");
  });

  $("#btnEditorial").click(function () {
    $("#btnOrden").val("Editorial");
  });
};

const cargarSelect = () => {
  $.ajax({
    type: "post",
    url: "./cargarSelect.php",
    success: function (respuestaDelServer) {
      var jsonRespuesta = JSON.parse(respuestaDelServer);
      jsonRespuesta.Genero.forEach(function (genero) {
        let desplegable = $("#filGene");
        var option = document.createElement("option");
        option.setAttribute("value", genero.Genero);
        option.innerHTML = genero.Genero;
        desplegable.append(option);
      });
    },
  });
};

const cargarSelectAlta = () => {
  $.ajax({
    type: "post",
    url: "./cargarSelect.php",
    success: function (respuestaDelServer) {
      var jsonRespuesta = JSON.parse(respuestaDelServer);
      jsonRespuesta.Genero.forEach(function (genero) {
        let desplegable = $("#generoAlta");
        var option = document.createElement("option");
        option.setAttribute("value", genero.Genero);
        option.innerHTML = genero.Genero;
        desplegable.append(option);
      });
    },
  });
};

const cargarSelectModif = () => {
  $.ajax({
    type: "post",
    url: "./cargarSelect.php",
    success: function (respuestaDelServer) {
      var jsonRespuesta = JSON.parse(respuestaDelServer);
      jsonRespuesta.Genero.forEach(function (genero) {
        let desplegable = $("#generoModif");
        var option = document.createElement("option");
        option.setAttribute("value", genero.Genero);
        option.innerHTML = genero.Genero;
        desplegable.append(option);
      });
    },
  });
};

const darAlta = () => {
  $("#alta").click(function () {
    $("#fondo").attr("class", "fondoApagado");
    $("#altaModal").attr("class", "altaModal");
    cargarSelectAlta();
  });

  $("#cerrar").click(function () {
    $("#fondo").attr("class", "fondo");
    $("#altaModal").attr("class", "divCerrado");
  });

  $("#cerrarIframe").click(function () {
    $("#fondo").attr("class", "fondo");
    $("#PDFModal").attr("class", "divCerrado");
  });

  $("#cerrarIModif").click(function () {
    $("#fondo").attr("class", "fondo");
    $("#modifModal").attr("class", "divCerrado");
  });

  $("#enviarAlta").click(function () {
    $.ajax({
      type: "post",
      url: "./alta.php",
      data: {
        idAlta: $("#idAlta").val(),
        tituloAlta: $("#tituloAlta").val(),
        autorAlta: $("#autorAlta").val(),
        generoAlta: $("#generoAlta").val(),
        precioAlta: $("#precioAlta").val(),
        lanzamientoAlta: $("#lanzamientoAlta").val(),
        editorialAlta: $("#editorialAlta").val(),
      },
      success: function (respuestaDelServer) {
        alert(respuestaDelServer);
      },
    });
  });
};

$(document).ready(function () {
  CargarOrden();
  cargarSelect();
  limpiarFiltros();
  darAlta();
  esconderTabla();
  $("#mostrar").click(function () {
    crearTablaLibros();
  });
});
