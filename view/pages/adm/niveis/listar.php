<?php
require_once("../../../../int/conexao.php");

echo <<<HTML
<table id="tabela" class="table table-hover my-4 w-100" >
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
    <a  onclick="editar('{$result[$i]['id']}','{$result[$i]['nivel']}')" title="Editar Registro">    <i class="bi bi-pencil-square text-primary"></i>
    </a>
    <a title="Excluir Registro">    <i class="bi bi-trash text-danger"></i>
    </a>
    </td>
    </tr>
    HTML;
}
echo <<<HTML
</tbody>
</table>    

HTML;

?>
<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            "ordering": false,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json",
            },
        });

    });

    function editar(id, nivel) {
        $('#id').val(id);
        $('#nivel').val(nivel);
        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'));
        myModal.show();

    }
</script>