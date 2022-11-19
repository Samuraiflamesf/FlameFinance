<?php
require_once("../../../int/conexao.php");
require_once("../../../int/verificar.php");
$pagina = 'niveis';

?>

<div class="col-md-12 my-3 ">
    <a type="button" class="btn btn-primary darkmode-ignore">Novo Nível</a>
</div>

<table id="example" class="table table-hover my-4 w-100">
    <thead class="table-dark">
        <tr>
            <th>Nível</th>

            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $pdo->query("SELECT * from niveis order by id desc");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < @count($result); $i++) {
            foreach ($result[$i] as $key => $value) {
            }
        ?>
            <tr>
                <td><?php echo $result[$i]['nivel'] ?></td>
                <td>02</td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "ordering": false,
            "language": {
                url: "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
            }
        });
    });
</script>