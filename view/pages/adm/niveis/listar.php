<?php
require_once("../../../../int/conexao.php");

echo <<<HTML
<thead class="table-dark">
<tr>
<th>Nível</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;

$query = $pdo->query("SELECT * from niveis order by id desc");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
for ($i = 0; $i < @count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
    };
    echo <<<HTML
    <tr>
        
    <td>{$result[$i]['nivel']}</td>
    <td>
    <a href="" title="Editar Registro">    <i class="bi bi-pencil-square text-primary"></i>
    </a>
    <a href="" title="Excluir Registro">    <i class="bi bi-trash text-danger"></i>
    </a>
    </td>
    </tr>
    HTML;
}
echo <<<HTML
</tbody>
HTML;

?>
<script>
    $(document).ready(function() {
        listar().
        $("#tabela").DataTable({
            ordering: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json",
            },
        });

    });
</script>