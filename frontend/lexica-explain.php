<?php 
    $json_path = './analyzer/tokens.json';
    if (file_exists($json_path)) {
        $json = json_decode(file_get_contents($json_path), true);
        ?> 
            <table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>Token</th>
                    <th>Ignorar</th>
                    <th>Definição Regular</th>
                </tr>
            <?php 
            foreach ($json['tokens'] as $token) { ?>
                <tr>
                    <td><?= htmlspecialchars($token['token']) ?></td>
                    <td><?= ($token['ignore'] ? 'Sim' : 'Não') ?></td>
                    <td><?= htmlspecialchars($token['regex']) ?></td>
                </tr>
            <?php }
            ?>
            </table>
        <?php
    } else {
        die("Arquivo JSON não encontrado.");
    }
?>