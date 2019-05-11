<?php 
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'classes/documentos.class.php';

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();
?>

<h1>Sistema logado!</h1>
<hr />
<?php if($usuarios->temPermissao("SECRET")): ?>
    <a href="secreto.php">Página secreta</a>
    <br />
    <br />
<?php endif; ?>

<?php if($usuarios->temPermissao("ADD")): ?>
    <a href="#">Adicionar documento</a>
<?php endif; ?>
<br />
<br />
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Documento:</th>
            <th>Ações:</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($lista as $item): ?>
        <tr>
            <td><?php echo $item['titulo']; ?></td>
            <td>
                <?php if($usuarios->temPermissao("EDIT")): ?>
                    <a href="#">Editar</a>
                <?php endif; ?>
                <?php if($usuarios->temPermissao("DEL")): ?>
                    <a href="#">Excluir</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
