<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolução</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="true" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">Devolu��o TMD</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="true" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">Devolu��o Normal</label>
    </div>
    <script>
        var valueCk = false;
        var checkbox = document.getElementsByName("flexRadioDefault");
        for (let i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                var valueCk = checkbox[i].checked;
            }
        }

        $("#flexRadioDefault2").click((e) => {
            e.preventDefault();
            let dados = valueCk;
            $.post("index.php", dados, function(result, status) {
                console.log(status);
                console.log(result);
            })
        });
    </script>

    <div style="background-color: rgba(218, 219, 219, 0.61);">
        <div style="justify-content: space-evenly; display: flex; margin-top: 1px; align-items: center;">
            <form>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Nr da SubProposta</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="id" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col-auto">
                        <button type="submit" id="btn_consulta" class="btn btn-primary">Consulta</button>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                $("#btn_consulta").click((e) => {
                    e.preventDefault();
                    $.get("form.php", function(result, status) {
                        console.log(status);
                        console.log(result);
                    })
                });
            </script>

            <?php
            $dados = $_POST;
            $x = 1;
            if ($x >= 1) { // se for devolu��o normal
                echo '<div class="grid" style="display: grid;
                        grid-template-columns: repeat(1, auto);
                        grid-row-gap: 1px;">

                            <div class="grid" style="display: grid;
                            grid-template-columns: repeat(5,max-content);
                            justify-content: center;">
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Liberar</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Excluir</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Gerar Excel</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Copiar</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Gravar</button></div>
                            </div>

                            <div class="grid" style="display: grid;
                            grid-template-columns: repeat(3, auto);
                            grid-row-gap: 1px;
                            align-items: center;">
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Nota Refaturamento</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Voltar Situação da Proposta</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Juntar Subpropostas</button></div>
                            </div>

                        </div>';
            } else { //se for devolu��o tmd
                echo '<div class="grid" style="display: grid;
                        grid-template-columns: repeat(1, auto);
                        grid-row-gap: 1px;">

                            <div class="grid" style="display: grid;
                            grid-template-columns: repeat(5,max-content);
                            justify-content: center;">
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Liberar</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Excluir</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Gerar Excel</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Copiar</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Gravar</button></div>
                            </div>

                            <div class="grid" style="display: grid;
                            grid-template-columns: repeat(3, auto);
                            grid-row-gap: 1px;
                            align-items: center;">
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Nota Refaturamento</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Converter em Dev.Comercial</button></div>
                                <div style="margin-left: 2px;"><button type="submit" class="btn btn-primary">Juntar Subpropostas</button></div>
                            </div>

                        </div>';
            }
            ?>
        </div>

        <hr>

        <?php
        $x = 1;

        if ($x >= 1) {
            echo '
        <div style="overflow-y: scroll; max-height: 200px ;" >
            <table class="table table-striped"> 
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Artigo</th>
                        <th scope="col">Tam</th>
                        <th scope="col">Qtde</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Valor IPI</th>
                        <th scope="col">Valor Sub.Trib</th>
                        <th scope="col">Valor Desc.ZF</th>
                        <th scope="col">Aliq ICMS</th>
                        <th scope="col">Valor ICMS</th>
                        <th scope="col">Centro</th>
                    </tr>
                </thead>

                <style type="text/css">
                    td {
                        white-space: nowrap;
                        text-overflow: ellipsis;
                        overflow: hidden;
                        max-width: 0.1px;
                    }
                </style>

                <tbody>
                    <tr>
                        <th style="align-items:center" scope="col"><input type="checkbox"></th>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                    </tr>
                </tbody>
            </table>
        </div>';
        } else {
            $list = [
                "v1" => "testeARTIGO",
                "v2" => "testeTam",
                "v3" => "testeQtde",
                "v4" => "teste1",
            ];
            echo '
            <div style="overflow-y: scroll; max-height: 200px ;" >
                <table class="table table-striped"> 
                    <thead>
                        <tr>
                            <th scope="col">Excluir</th>
                            <th scope="col">Artigo</th>
                            <th scope="col">Tam</th>
                            <th scope="col">Qtde</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Valor IPI</th>
                            <th scope="col">Valor Sub.Trib</th>
                            <th scope="col">Valor Desc.ZF</th>
                            <th scope="col">Aliq ICMS</th>
                            <th scope="col">Valor ICMS</th>
                            <th scope="col">Centro</th>
                        </tr>
                    </thead>

                    <style type="text/css">
                        td {
                            white-space: nowrap;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            max-width: 0.1px;
                        }
                    </style>

                    <tbody>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                        </tr>
                    </tbody>
                </table>
            </div>';
        }


        ?>
        <form>
            <div class="row g-3 ">
                <div class="col-auto">
                    <input type="text" name="id" placeholder="Motivo" class="form-control" aria-describedby="passwordHelpInline" style="width: 80vw;margin-top: 20px;">
                </div>
            </div>
        </form>

        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Ação</th>
                    <th scope="col">Dados Anterior</th>
                    <th scope="col">Dados Atual</th>
                    <th scope="col">Data Cadastro</th>
                    <th scope="col">Motivo</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>adadadaaddawdawawdadadadadadadadadadadad</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- End Example Code -->
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>