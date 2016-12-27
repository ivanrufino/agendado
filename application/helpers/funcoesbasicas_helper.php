<?php
function labelDias($dia,$compacto =false){
    $dias= array('Domingo', 'Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado');
    $dias_compacto= array('Dom','Seg','Ter','Qua','Qui','Sex','Sab');
    
    if($compacto){
        return $dias_compacto[$dia];
    }else{
        return $dias[$dia];
    }
}
function getDias($dias_trabalhos) {
    $dias = explode(',', $dias_trabalhos);
    $sequencia = TRUE;
    if (count($dias) == 0) {
        echo "Nenhum";
        return;
    }
    if (count($dias) == 1) {
        return labelDias(current($dias));        
    } else {
        $inicio = $fim=null;
        $stringDias=array();
        foreach ($dias as $key => $dia) {
            if(is_null($inicio)){
                $inicio = labelDias($dia,1);    
            }
            $stringDias[]=labelDias($dia,1);
            $fim = labelDias($dia,1);
           if($dias[$key+1]!= $dia+1 && isset($dias[$key+1])){
               $sequencia=  FALSE;
           }
        }
        
        $deAte ="de $inicio à $fim";
        $ret= ($sequencia)? $deAte: implode(', ', $stringDias);
        return $ret;
    }
}
