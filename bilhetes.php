<?php
            include('mpdf60/mpdf.php');
	    ob_clean(); // cleaning the buffer before Output()
            $mpdf=new mPDF();
            
            $dias = $_POST['dias'];
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
            $nome = $_POST['nome'];
            $poltrona = $_POST['poltrona'];
            $rota = $_POST['rota'];
            //$ida = $_POST['sentido-viagem']=="true"?TRUE:FALSE;
            
            //echo $dias;
            
            $rotaNome = array("GENTILÂNDIA","PICI","ALDEOTA");
            
            //$nomeDaEmpresa = "SIMPTUR Agência de Viagens Ltda - ME";
            //$cnpjDaEmpresa = "CNPJ: 04.782.916/0001-00";
            //$enderecoDaEmpresa = "Rua 50 nº 40 - Loja 04 - (85) 3291.1750<br>CEP: 60.750-640 - José Walter - Fortaleza-CE<br>";
            
            
            //$nomeDaEmpresa = "MG DAS NUNES TURISMO ME";
            //$cnpjDaEmpresa = "14.575.667/0001-27 REG:1090";
            //$enderecoDaEmpresa = "AV.GODOFREDO MACIEL 2939";
            
            $nomeDaEmpresa = "M. CRISTIAN R.ALVES-ME";
            $cnpjDaEmpresa = "CNPJ:19.256.559/0001-05 REG: 1534";
            $enderecoDaEmpresa = "RUA 4, N° 315, JEREISSATI I,<br>MARACANAÚ-CE (85) 989733519";
            
            
            $tarifa = "R$ 8,00";
            
            
            
            for($s=0;$s<2;$s++){
                
                //echo $i;
                
                if($s==0){
                    $ida = TRUE;
                }
                if($s==1){
                    $ida = FALSE;
                }
                
                if($ida){
                    $origem = "FORTALEZA";
                    $destino = "REDENÇÃO";
                    $horarioViagem = "6:30";
                }else{
                    $origem = "REDENÇÃO";
                    $destino = "FORTALEZA";
                    $horarioViagem = "17:00";
                }

                $datasViagens = array();
                foreach($dias as $dia){
                    $datasViagens[] = str_pad($dia, 2, "0", STR_PAD_LEFT)."/".str_pad($mes, 2, "0", STR_PAD_LEFT)."/".$ano;
                }
                
                $html = "";

                $html .= "<style>";
                    $html .= "table {margin: 3px; border-collapse: collapse; font-family: Arial;}";
                    $html .= "table, td, th {border: 2px solid black; text-align: center;}";
                    $html .= ".letra1 {font-size: 8px; font-weight: bold; padding: 10px;}";
                    $html .= ".letra2 {font-size: 10px; padding: 10px;}";
                    $html .= ".letra3 {font-size: 8px;}";
                    $html .= ".letra4 {font-size: 7px; background-color: black; color: white; font-weight: bold;}";
                    $html .= ".letra5 {font-size: 10px; padding: 4px;}";
                    $html .= ".linha {background-color: orange; height: 400px; width: 99%;}";
                    $html .= ".passagem {float: left; width: 33%;}";
                $html .= "</style>";
                

                $qtdePorPagina = 12;
                $contPassagem = 0;

                for($i = 0; $i<count($datasViagens); $i++){

                    $html .= "<div class=\"passagem\">";
                        $html .= "<table>";
                            $html .= "<tr>";
                                $html .= "<td colspan=\"2\" class=\"letra1\">";
                                    $html .= $nomeDaEmpresa."<br>".$cnpjDaEmpresa."<br>".$enderecoDaEmpresa;
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td colspan=\"2\" class=\"letra3\">";
                                    $html .= "BILHETE DE PASSAGEM - ROTA ".$rotaNome[$rota-1];
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td colspan=\"2\" class=\"letra4\">";
                                    $html .= "SERVIÇO DE TRANSPORTE REGULAR DE PASSAGEIROS<br>FRETAMENTO COM MOTORISTA";
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">ORIGEM</div><div class=\"letra5\">".$origem."</div>";
                                $html .= "</td>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">DESTINO</div><div class=\"letra5\">".$destino."</div>";
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">HORA DA VIAGEM</div><div class=\"letra5\">".$horarioViagem."</div>";
                                $html .= "</td>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">DATA DA VIAGEM</div><div class=\"letra5\">".$datasViagens[$i]."</div>";
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">EMBARQUE</div><div class=\"letra5\">:</div>";
                                $html .= "</td>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">DESEMBARQUE</div><div class=\"letra5\">:</div>";
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">DATA DE EMISSÃO</div><div class=\"letra5\">".$datasViagens[$i]."</div>";
                                $html .= "</td>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">POLTRONA</div><div class=\"letra5\">".$poltrona."</div>";
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">IDENTIFICAÇÃO</div><div class=\"letra5\">".$nome."</div>";
                                $html .= "</td>";
                                $html .= "<td>";
                                    $html .= "<div class=\"letra3\">TARIFA</div><div class=\"letra5\">".$tarifa."</div>";
                                $html .= "</td>";
                            $html .= "</tr>";
                            $html .= "<tr>";
                                $html .= "<td colspan=\"2\" class=\"letra3\">";
                                    $html .= "CONFIRA SUA PASSAGEM E PRESERVE SEU BILHETE";
                                $html .= "</td>";
                            $html .= "</tr>";
                        $html .= "</table>";
                    $html .= "</div>";

                    $contPassagem++;

                    if($contPassagem==$qtdePorPagina){
                        $mpdf->WriteHTML($html);
                        $mpdf->AddPage();
                        $html = "";
                        $contPassagem = 0;
                    }
                }
                
                
                $mpdf->WriteHTML($html);
                if($s==0){
                    $mpdf->AddPage();
                }
                $html = "";
                $contPassagem = 0;
            
            }
            
            
            //echo $html;
            //$mpdf->WriteHTML($html);
            $mpdf->Output();
            exit;
        ?>
