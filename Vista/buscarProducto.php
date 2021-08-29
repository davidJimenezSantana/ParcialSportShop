<?php


$filas = 20;
$pag = 1;
if (isset($_GET["atributo"])) {
    $atributo = $_GET["atributo"];
}
if (isset($_GET["direccion"])) {
    $direccion = $_GET["direccion"];
}
if (isset($_GET["pag"]) && $_GET["pag"] > 0) {
    $pag = $_GET["pag"];
}
if (isset($_GET["filas"])) {
    $filas = $_GET["filas"];
}


$producto = new Producto();
$productos = $producto->consultarTodos($filas, $pag);
$totalFilas = $producto->consultarTotalFilas();
?>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Consultar Producto</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <label>Resultados:</label>
                            <select class="form-select" id="filas">
                                <option value="5" <?php if ($filas == 5) echo "selected" ?>>5</option>
                                <option value="10" <?php if ($filas == 10) echo "selected" ?>>10</option>
                                <option value="20" <?php if ($filas == 20) echo "selected" ?>>20</option>
                                <option value="50" <?php if ($filas == 50) echo "selected" ?>>50</option>
                            </select>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>talla</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pos = 1;
                            foreach ($productos as $productoActual) {
                                echo "<tr>";                                                           
                                echo "<td>" . $pos++ . "</td>
                                        <td>" . $productoActual-> getNombre() . "</td>
                                        <td>" . $productoActual-> getPrecio() . "</td>                                        
                                        <td>" . $productoActual -> getTalla()  . "</td>
                                      <td>" . $productoActual-> getCategoria() . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
                            $numPags = intval($totalFilas / $filas);
                            if ($totalFilas % $filas != 0) {
                                $numPags++;
                            }
                            echo ($pag != 1) ? "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("Vista/buscarProducto.php") . "&pag=" . ($pag - 1) . "&filas=" . $filas . (($atributo != "" && $direccion != "") ? ("&atributo=" . $atributo . "&direccion=" . $direccion) : "") . "'> <span aria-hidden='true'>&laquo;</span></a></li>" : "<li class='page-item disabled'><a class='page-link'>&laquo;</li></a>";
                            for ($i = 1; $i <= $numPags; $i++) {
                                echo "<li class='page-item " . (($pag == $i) ? "active" : "") . "'>" . (($pag != $i) ? "<a class='page-link' href='index.php?pid=" . base64_encode("Vista/buscarProducto.php") . "&pag=" . $i . "&filas=" . $filas . (($atributo != "" && $direccion != "") ? ("&atributo=" . $atributo . "&direccion=" . $direccion) : "") . "'>" . $i . "</a>" : "<a class='page-link'>" . $i . "</a>") . "</li>";
                            }
                            echo ($pag != $numPags) ? "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("Vista/buscarProducto.php") . "&pag=" . ($pag + 1) . "&filas=" . $filas . (($atributo != "" && $direccion != "") ? ("&atributo=" . $atributo . "&direccion=" . $direccion) : "") . "'> <span aria-hidden='true'>&raquo;</span></a></li>" : "<li class='page-item disabled'><a class='page-link'>&raquo;</li></a>";
                            ?>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#filas").change(function() {
        var filas = $("#filas").val();
        var url = "index.php?pid=<?php echo base64_encode("Vista/buscarProducto.php") ?>&filas=" + filas;
        <?php if ($atributo != "" && $direccion != "") { ?>
            url += "&atributo=<?php echo $atributo ?>&direccion=<?php echo $direccion ?>";
        <?php } ?>
        location.replace(url);
    });
</script>