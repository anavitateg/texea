<!DOCTYPE html>

<?php
require('conexionsql.php');
?>

<head>
  <link rel="stylesheet" href="../assets/style/database.css">
  <link rel="stylesheet" href="/assets/style/nav.css">
</head>

<body>

  <main id="main">

    <div id="form_base">

      <div id="form_base_boxes">

        <div id="form_base_box1">

          <div id="form_base_box1_1">
            <p>Agregar nuevo item</p>
          </div>

          <div id="form_base_box1_2">
            <p>Agregar nueva columna</p>
          </div>

        </div>

        <form action="additem.php" method="post" accept-charset='utf-8' role="form">

          <div id="form_base_box2">

            <div id="form_base_box2_1">

              <div id="form_base_input_div_text">

                <div id="form_base_input_div1">
                  <label id="form_base_column">Gasto</label>
                </div>

                <div id="form_base_input_div2">
                  <input type="text" placeholder="Nombre o identificador del gasto" id="form_base_input_text" name="gasto" maxlength="30" required>
                </div>

              </div>

              <div id="form_base_input_div_number">

                <div id="form_base_input_div1_number">
                  <label id="form_base_column">Precio</label>
                </div>

                <div id="form_base_input_div2_number">
                  <input id="form_base_input_number" type="number" placeholder="Precio de la compra" name="precio"></input>
                </div>

              </div>



              <div id="form_base_input_div_date">

                <div id="form_base_input_div1_date">
                  <label id="form_base_column">Fecha del gasto</label>
                </div>

                <div id="form_base_input_div2_date">
                  <input id="form_base_input_date" type="date" name="fecha"></input>
                </div>

              </div>


              <div id="form_base_input_div_textarea">

                <div id="form_base_input_div1_textarea">
                  <label id="form_base_column">Descripción</label>
                </div>

                <div id="form_base_input_div2_textarea">
                  <textarea id="form_base_input_textarea" placeholder="Descripción de lo comprado" name="descripcion" maxlength="100"></textarea>
                </div>

              </div>


              <div id="form_base_input_div_submit">

                <div id="form_base_input_div1_submit">
                  <button type="submit" id="form_base_input_submit">Borrar todo</button>
                </div>

                <div id="form_base_input_div2_submit">
                  <button type="submit" id="form_base_input_submit" name="submit">Agregar item</button>
                </div>

              </div>


            </div>

          </div>
        </form>

        <div id="form_base_box3">
        </div>

      </div>
    </div>

    <div id="table_base">


      <div id="box1">
        <div id="box1_2">

          <span id="box1_2_span">
            <p>Usuario</p>
          </span>
          <div id="box1_2_img">
            <img id="box1_2_img_userlogo" src="../assets/img/user.png">
          </div>


        </div>

      </div>

      <div id="box2">

        <div id="box2_1">
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="file-input-wrapper">
              <input type="file" id="fileInput" name="fileInput" class="file-input">
              <label for="fileInput">Seleccionar archivo(*xsl, *sql, *csv):</label>
            </div>



        </div>

        <div id="box2_2">
          <span id="box2_1_span">
            <p id="prueba"></p>
          </span>

        </div>
        <div id="box2_3">

          <input type="submit" name="submit" value="Subir archivo" id="boton_subir_file">

        </div>
        </form>

        <div id="box2_4">

          <input type="text" placeholder="Buscar palabra clave" id="barra_busqueda">
          <img id="barra_busqueda_icon" src="/assets/img/lupa.png">

        </div>
      </div>

      <div id="box3">


        <div id="box3_1">

          <table>
            <thead>
              <tr>
                <?php

                $esquema = "public";
                $tabla = "gastos";

                // Consulta para obtener los nombres de las columnas
                $consulta = "SELECT column_name
                 FROM information_schema.columns
                 WHERE table_schema = '$esquema'
                   AND table_name = '$tabla'";

                $resultado = pg_query($conexion, $consulta);

                if (!$resultado) {
                  die("Error en la consulta: " . pg_last_error());
                }

                // Procesar el resultado
                while ($fila = pg_fetch_assoc($resultado)) {
                  echo "<th>" . $fila['column_name'] . "</th>";
                }

                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $tabla = "gastos";

              // Consulta para obtener los nombres de las columnas
              $consulta = "SELECT * FROM $tabla";

              $resultado = pg_query($conexion, $consulta);

              if (!$resultado) {
                die("Error en la consulta: " . pg_last_error());
              }

              // Procesar el resultado
              while ($fila = pg_fetch_assoc($resultado)) {
                echo "<tr id='fila_1' class='filaTabla'>";
                // Imprimir cada columna de la fila
                foreach ($fila as $columna => $valor) {
                  echo "<td><div id='miDiv'><p>" . $valor . "</p></div></td>";
                }
                echo "</tr>";
              }

              // Cerrar la conexión
              pg_close($conexion);
              ?>

            </tbody>
          </table>


        </div>
      </div>
      <footer id="box4">
        <a href="../index.php">
          <img id="foo_img" src="../assets/img/logo.png">
          <span id="textologo">TEXEA</span></a>
      </footer>


  </main>


  <script src="filejs.js"></script>
  <script src="clicktabla.js"></script>

</body>


</form>


</html>