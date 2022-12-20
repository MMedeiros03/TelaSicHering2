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
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">Devolução TMD</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
        <label class="form-check-label" for="flexRadioDefault2">Devolução Normal</label>
    </div>
    <script>
        $(document).ready(function() {
            $("#flexRadioDefault1, #flexRadioDefault2").click((e) => {
                const [radioButton] = $("#flexRadioDefault1");

                radioButton.checked

                if (radioButton.checked) {
                    $("#buttonsGroup1").css("display", "none");
                    $("#buttonsGroup2").css("display", "grid");
                } else {
                    $("#buttonsGroup1").css("display", "grid");
                    $("#buttonsGroup2").css("display", "none");
                }
            });
        });
    </script>

    <div style="background-color: rgba(218, 219, 219, 0.61);">
        <div style="justify-content: space-evenly; display: flex; margin-top: 1px; align-items: center;">
            <form id="HeadForm">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Nr da SubProposta</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="id" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" id="btn_consulta" class="btn btn-primary">Consulta</button>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                function verifyEmptyFields() {
                    // Get all required fields
                    var requiredFields = $('#HeadForm [required]');
                    // Check if any of the required fields are empty
                    var emptyFields = requiredFields.filter(function() {
                        return !this.value;
                    });
                    // If there are empty fields, prevent the form from being submitted
                    if (emptyFields.length > 0) {
                        $("#inputPassword6").css("border", "1px solid red").attr('placeholder', 'value is required');
                        return true;
                    } else {
                        return false;
                    }

                };

                $("#btn_consulta").click((e) => {
                    e.preventDefault();
                    if (!verifyEmptyFields()) {
                        $.get("form.php", function(result, status) {
                            $("#inputPassword6").css("border", "1px solid transparent");
                            console.log(status);
                            console.log(result);
                        });
                    }
                });
            </script>


            <div class="grid" id="buttonsGroup1" style="display: none;
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
            </div>
            <div class="grid" id="buttonsGroup2" style="display: grid;
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

            </div>
        </div>

        <hr>

        <div style="overflow-y: scroll; max-height: 200px ;">
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

                    .td_input {
                        background-color: white !important;

                    }

                    .td_input input {
                        border: none;
                        background-color: transparent;
                    }
                </style>

                <tbody>
                        <?php

                        $list = [
                            0 => [
                                "artigo" => "teste",
                                "tam" => "teste",
                                "qtde" => "teste",
                                "valor" => "teste",
                                "valortotal" => "teste",
                                "valoripi" => "teste",
                                "valorSubTrib" => "teste",
                                "aliqicms" => "teste",
                                "ValorICMS" => "teste"
                            ],
                            1 => [ 
                                "artigo" => "teste",
                                "tam" => "teste",
                                "qtde" => "teste",
                                "valor" => "teste",
                                "valortotal" => "teste",
                                "valoripi" => "teste",
                                "valorSubTrib" => "teste",
                                "aliqicms" => "teste",
                                "ValorICMS" => "teste"
                            ]
                        ];
                        $rows = "";
                        foreach ($list as $line) {
                            $rows .= "<tr> <th style='align-items:center' scope='col'><input type='checkbox'></th>
                                <td>{$line['artigo']}</td>
                                <td>{$line['tam']}</td>
                                <td class='td_input'><input type='text' value='{$line['qtde']}'></input></td>
                                <td>{$line['valor']}</td>
                                <td>{$line['valortotal']}</td>
                                <td class='td_input'><input type='text' value='{$line['valoripi']}'></input></td>
                                <td class='td_input'><input type='text' value='{$line['valorSubTrib']}'></input></td>
                                <td>Valor Desc.ZF</td>
                                <td class='td_input'><input type='text' value='{$line['aliqicms']}'></input></td>
                                <td class='td_input'><input type='text' value='{$line['ValorICMS']}'></input></td>
                                <td>Centro</td> <tr>";
                        }
                        echo $rows;
                        ?>
                </tbody>
            </table>
        </div>

        <form>
            <div class="row g-3 ">
                <div class="col-auto">
                    <input type="text" name="id" placeholder="Motivo" class="form-control" aria-describedby="passwordHelpInline" style="width: 80vw;margin-top: 20px;" required>
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