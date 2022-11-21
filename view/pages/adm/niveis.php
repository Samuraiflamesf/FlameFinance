<?php
require_once("../../../int/conexao.php");
require_once("../../../int/verificar.php");
$pagina = 'niveis';

?>

<div class="col-md-12 my-3 ">
    <a type="button" class="btn btn-primary darkmode-ignore" data-bs-toggle="modal" data-bs-target="#modalForm">Novo Nível</a>
</div>


<div class="tabela" id="listar">

</div>



<!-- Modal Form  -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalForm" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalForm">
                    <span class="tituloModal" id="tituloModal">Inserir Registro</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="post">
                <div class="modal-body p-4">
                    <!--Nome-->
                    <div class="row form-floating mt-3">
                        <input type="text" class="form-control" id="nivel" placeholder="Nível" name="nivel">
                        <label for="nivel">Nível</label>
                    </div>
                    <small>
                        <div id="mensagem"></div>
                    </small>

                    <input type="" name="id-usuario" value="<?php echo $id_usuario ?>">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-fechar">
                            Fechar
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<script type="text/javascript">
    var pag = "<?= $pagina ?>"
</script>


<script src="../../../assets/js/ajax.js"></script>