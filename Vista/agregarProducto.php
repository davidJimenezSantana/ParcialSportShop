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
    $cantidad = 0;
    if (isset($_POST["numPro"])) {
        $cantidad = $_POST["numPro"];
    }


    if ($cantidad > 0) {
        $aux = 0;
        while ($aux < $cantidad) {
    ?>

            <h1 style="color: snow; margin: top 5%;">Producto <?php echo ($aux + 1) ?></h1>
            <form action="index.php?pid=<?php echo base64_encode('Vista/addproducto.php')?>&cant=<?php echo $cantidad ?>" style="width: 40%; color:snow" method="post">
                <div style="padding: 3px 10px;  border: PowderBlue 5px solid;  border-radius: 20px;">

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre<?php echo ($aux) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio<?php echo ($aux) ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label">Talla</label>
                        <select id="numPro" type="number" name="talla<?php echo ($aux) ?>">
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

                        <select id="numPro" type="number" name="categoria<?php echo ($aux) ?>">
                            <?php
                            $categoria = new Categoria();
                            $categorias = $categoria->consultarTodos();
                            foreach ($categorias as $categoriaActual) {
                                echo "<option value='" . $categoriaActual->getId() . "'>" . $categoriaActual->getNombre() . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>



            <?php
            $aux++;
        }
            ?>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
            </form>

        <?php

    }

        ?>

</div>