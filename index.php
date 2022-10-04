<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Geração de Bilhetes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
    </head>
    <body>
        <?php   
            $mesSelecionado = date("n")-1;
            if(isset($_POST['mes'])){
                $mesSelecionado = $_POST['mes'];
            }
            $anoSelecionado = date("Y");
            if(isset($_POST['ano'])){
                $anoSelecionado = $_POST['ano'];
            }
            $sentifoSelecionado = "true";
            if(isset($_POST['sentido'])){
                $sentifoSelecionado = $_POST['sentido'];
            }
            $rotaSelecionada = 1;
            if(isset($_POST['rota'])){
                $rotaSelecionada = $_POST['rota'];
            }
            $nome = "";
            if(isset($_POST['nome'])){
                $nome = $_POST['nome'];
            }
            $poltrona = 1;
            if(isset($_POST['poltrona'])){
                $poltrona = $_POST['poltrona'];
            }
            //echo $mesSelecionado;
        ?>
        <div class="container-fluid">
            
            <h1 class="text-center text-info">Sistema de Geração de Bilhetes - TropTur</h1>
            
            <div class="alert alert-info text-center" role="alert">
                Para gerar os bilhetes, preencha todos os campos do formulário abaixo.<br>
                Após isso, clique no botão "Mostrar dias" e marque no calendário os dias necessários para o respectivo mês.<br>
                Após selecionar os dias, clique no botão "Gerar bilhetes", deverá ser gerado um PDF com os dados fornecidos.<br>
                O PDF gerado já possui os bilhetes da IDA e da VOLTA.<br>
            </div>

            <form action="" class="" name="periodo" id="periodo" method="POST">
            <!--<div class="form-group">
                <label for="sentido">Sentido</label>
                <select class="form-control" name="sentido">
                    <option value="true" <?php echo $sentifoSelecionado=="true"?'selected="selected"':''; ?>>IDA</option>
                    <option value="false" <?php echo $sentifoSelecionado=="false"?'selected="selected"':''; ?>>VOLTA</option>
                </select> 
            </div>-->
            <div class="form-group">
                <label for="rota">Rota</label>
                <select class="form-control" name="rota">
                    <option value="1" <?php echo $rotaSelecionada==1?'selected="selected"':''; ?>>Gentilândia</option>
                    <option value="2" <?php echo $rotaSelecionada==2?'selected="selected"':''; ?>>Pici</option>
                    <option value="3" <?php echo $rotaSelecionada==3?'selected="selected"':''; ?>>Aldeota</option>
                </select> 
            </div>
            <div class="form-group">
                <label for="mes">Mês</label>
                <select class="form-control" name="mes">
                    <option value="1" <?php echo $mesSelecionado==1?'selected="selected"':''; ?>>Janeiro</option>
                    <option value="2" <?php echo $mesSelecionado==2?'selected="selected"':''; ?>>Fevereiro</option>
                    <option value="3" <?php echo $mesSelecionado==3?'selected="selected"':''; ?>>Março</option>
                    <option value="4" <?php echo $mesSelecionado==4?'selected="selected"':''; ?>>Abril</option>
                    <option value="5" <?php echo $mesSelecionado==5?'selected="selected"':''; ?>>Maio</option>
                    <option value="6" <?php echo $mesSelecionado==6?'selected="selected"':''; ?>>Junho</option>
                    <option value="7" <?php echo $mesSelecionado==7?'selected="selected"':''; ?>>Julho</option>
                    <option value="8" <?php echo $mesSelecionado==8?'selected="selected"':''; ?>>Agosto</option>
                    <option value="9" <?php echo $mesSelecionado==9?'selected="selected"':''; ?>>Setembro</option>
                    <option value="10" <?php echo $mesSelecionado==10?'selected="selected"':''; ?>>Outubro</option>
                    <option value="11" <?php echo $mesSelecionado==11?'selected="selected"':''; ?>>Novembro</option>
                    <option value="12" <?php echo $mesSelecionado==12?'selected="selected"':''; ?>>Dezembro</option>
                </select> 
            </div>
            <div class="form-group">
                <label for="ano">Ano</label>
                <select class="form-control" name="ano">
                    <option value="2019" <?php echo $anoSelecionado==2019?'selected="selected"':''; ?>>2019</option>
                    <option value="2020" <?php echo $anoSelecionado==2020?'selected="selected"':''; ?>>2020</option>
                    <option value="2021" <?php echo $anoSelecionado==2021?'selected="selected"':''; ?>>2021</option>
                </select> 
            </div>
            <div class="form-group">
                <label for="nome">Primeiro nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
            </div>
            <div class="form-group">
                <label for="poltrona">Poltrona</label>
                <input type="number" class="form-control" name="poltrona" value="<?php echo $poltrona; ?>">
            </div>
            <input type="submit" value="Mostrar dias" name="periodo-selecionado" class="btn btn-primary"/>
        </form>
            
        
        
        <?php
        // put your code here
            if(isset($_POST['periodo-selecionado'])){
                //echo "teste";
                $espaco1 = '';
                $formDiasSelecionados = '';
                $formDiasSelecionados .= '<form action="bilhetes.php" class="" name="periodo" id="periodo" method="POST">';
                $formDiasSelecionados .= '<input type="hidden" value="'.$_POST['sentido'].'" name="sentido-viagem"/>';
                $formDiasSelecionados .= '<input type="hidden" value="'.$_POST['rota'].'" name="rota"/>';
                $formDiasSelecionados .= '<input type="hidden" value="'.$_POST['mes'].'" name="mes"/>';
                $formDiasSelecionados .= '<input type="hidden" value="'.$_POST['ano'].'" name="ano"/>';
                $formDiasSelecionados .= '<input type="hidden" value="'.$_POST['nome'].'" name="nome"/>';
                $formDiasSelecionados .= '<input type="hidden" value="'.$_POST['poltrona'].'" name="poltrona"/>';
                $formDiasSelecionados .= '<br>';
                $formDiasSelecionados .= '<div class="alert alert-info text-center" role="alert">Dias do mês selecionado';
                //$formDiasSelecionados .= $_POST['sentido']=="true"?'IDA':'VOLTA';
                $formDiasSelecionados .= '</div>';
                $formDiasSelecionados .= '<table class="table table-bordered text-center">';
                $formDiasSelecionados .= '<thead>';
                $formDiasSelecionados .= '<tr>';
                $formDiasSelecionados .= '<th scope="col" class="text-danger">D</th>';
                $formDiasSelecionados .= '<th scope="col">S</th>';
                $formDiasSelecionados .= '<th scope="col">T</th>';
                $formDiasSelecionados .= '<th scope="col">Q</th>';
                $formDiasSelecionados .= '<th scope="col">Q</th>';
                $formDiasSelecionados .= '<th scope="col">S</th>';
                $formDiasSelecionados .= '<th scope="col" class="text-danger">S</th>';
                $formDiasSelecionados .= '</tr>';
                $formDiasSelecionados .= '</thead>';
                $formDiasSelecionados .= '<tboby>';
                $primeiraLinha = TRUE;
                for($i=1; $i <= cal_days_in_month(CAL_GREGORIAN, $_POST['mes'], $_POST['ano']); $i++){
                    $diaDaSemana = jddayofweek(cal_to_jd(CAL_GREGORIAN, $_POST['mes'], $i, $_POST['ano'])); 
                    if($diaDaSemana==0){
                        $formDiasSelecionados .= '<tr>';
                    }
                    if($primeiraLinha){
                        for($j=0; $j<$diaDaSemana; $j++){
                            $formDiasSelecionados .= '<td></td>';
                        }
                        $primeiraLinha = FALSE;
                    }
                    if($diaDaSemana>0 && $diaDaSemana<6){
                        $formDiasSelecionados .= '<td>';
                        $formDiasSelecionados .= '<input class="form-control" type="checkbox" name="dias[]" value="'.$i.'" checked><b>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</b>';
                        $formDiasSelecionados .= '</td>';
                    }else{
                        $formDiasSelecionados .= '<td>';
                        $formDiasSelecionados .= '<input class="form-control" type="checkbox" name="dias[]" value="'.$i.'"><b class="text-danger">'.str_pad($i, 2, "0", STR_PAD_LEFT).'</b>';
                        $formDiasSelecionados .= '</td>';
                    }
                    if($diaDaSemana==6){
                        $formDiasSelecionados .= '</tr>';
                    }
                }
                $formDiasSelecionados .= '</tbody>';
                $formDiasSelecionados .= '</table>';
                $formDiasSelecionados .= '<input class="btn btn-primary" type="submit" value="Gerar bilhetes" name="gerar-bilhetes" onclick="this.form.target=\'_blank\';return true;" />';
                $formDiasSelecionados .= '</form>';
                $formDiasSelecionados .= '<br>';
                
                echo $formDiasSelecionados;
            }
        ?>
        </div>
    </body>
</html>
