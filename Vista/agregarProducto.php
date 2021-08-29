<div class="container">
    <div class="row" style="margin: 5%;">

        <form id="form1" name="form1" method="post">
            <label for="" style="color: snow;">Productos a añadir: </label>
            <select id="numPro" type="number" name="numPro">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="submit" name="Submit" value="Listo" />

        </form>
    </div>

    <?php
    $cant = 0;
    if (isset($_POST["numPro"])) {
        $cant = $_POST["numPro"];
    }


    if ($cant > 0) {
        $aux = 0;
        while ($aux < $cant) {
    ?>

            <form style="width: 40%; color:snow" method="post">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre<?php echo ($aux + 1) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio<?php echo ($aux + 1) ?>">
                </div>
                <div class="mb-3 ">
                    <label class="form-label">Talla</label>
                    <select id="numPro" type="number" name="talla<?php echo ($aux + 1) ?>">
                        <?php
                        $talla = new Talla();
                        $tallas = $talla->consultarTodos();
                        foreach ($tallas as $tallasActual) {
                            echo "<option value='" . $tallasActual->getId() . "'>" . $tallasActual->getNombre() . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 ">
                    <label class="form-label">Categoria: </label>

                    <select id="numPro" type="number" name="categoria<?php echo ($aux + 1) ?>">
                        <?php
                        $categoria = new Categoria();
                        $categorias = $categoria->consultarTodos();
                        foreach ($categorias as $categoriaActual) {
                            echo "<option value='" . $categoriaActual->getId() . "'>" . $categoriaActual->getNombre() . "</option>";
                        }
                        ?>
                    </select>
                </div>


            <?php
            $aux++;
        }
            ?>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
            </form>
        <?php


    }

    if (isset($_POST["guardar"])) {
        for ($i = 0; $i <= $cant; $i++) {
            $nombre = $_POST["nombre" . ($i+1)];
            $precio = $_POST["precio" . ($i+1)];
            $talla = $_POST["talla" . ($i+1)];
            $categoria = $_POST["categoria" . ($i+1)];
            $producto = new Producto("", $nombre, $precio, $talla, $categoria);
            $producto->insertar();
        }
    }



        ?>

</div>