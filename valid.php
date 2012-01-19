<?php

/**
 * @author Piero Giusti (pierophp)
 * @version 0.2
 * Essa classe foi baseada nas informações do site da Fazenda:
 * http://pfe.fazenda.sp.gov.br/consist_ie.shtm
 * 
 * Correções:
 * No site diz que para o estado de MT o tamanho é 11, mas na verdade o tamanho é 9
 * Desabilitada a regra de AL que o 3° dígito deve ser 0,3,5,7,8. Encontrado caso válido que é 6.
 * NO DF IEs começados com 075 também são válidos
 */
class Valid
{

    public static function inscricao_estadual($ie, $estado)
    {

        $estado = strtoupper($estado);

        $pesos = array(
            'p1' => array(
                '1' => '0',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '2',
                '11' => '3',
                '12' => '4',
                '13' => '5',
                '14' => '6',
            ),
            'p2' => array(
                '1' => '0',
                '2' => '0',
                '3' => '2',
                '4' => '3',
                '5' => '4',
                '6' => '5',
                '7' => '6',
                '8' => '7',
                '9' => '8',
                '10' => '9',
                '11' => '2',
                '12' => '3',
                '13' => '4',
                '14' => '5',
            ),
            'p3' => array(
                '1' => '2',
                '2' => '0',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '2',
                '11' => '3',
                '12' => '4',
                '13' => '5',
                '14' => '6',
            ),
            'p4' => array(
                '1' => '0',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '0',
                '8' => '0',
                '9' => '0',
                '10' => '0',
                '11' => '0',
                '12' => '0',
                '13' => '0',
                '14' => '0',
            ),
            'p5' => array(
                '1' => '0',
                '2' => '8',
                '3' => '7',
                '4' => '6',
                '5' => '5',
                '6' => '4',
                '7' => '3',
                '8' => '2',
                '9' => '1',
                '10' => '0',
                '11' => '0',
                '12' => '0',
                '13' => '0',
                '14' => '0',
            ),
            'p6' => array(
                '1' => '0',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '0',
                '9' => '0',
                '10' => '8',
                '11' => '9',
                '12' => '0',
                '13' => '0',
                '14' => '0',
            ),
            'p7' => array(
                '1' => '0',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '1',
                '11' => '2',
                '12' => '3',
                '13' => '4',
                '14' => '5',
            ),
            'p8' => array(
                '1' => '0',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '2',
                '9' => '3',
                '10' => '4',
                '11' => '5',
                '12' => '6',
                '13' => '7',
                '14' => '8',
            ),
            'p9' => array(
                '1' => '0',
                '2' => '0',
                '3' => '2',
                '4' => '3',
                '5' => '4',
                '6' => '5',
                '7' => '6',
                '8' => '7',
                '9' => '2',
                '10' => '3',
                '11' => '4',
                '12' => '5',
                '13' => '6',
                '14' => '7',
            ),
            'p10' => array(
                '1' => '0',
                '2' => '0',
                '3' => '2',
                '4' => '1',
                '5' => '2',
                '6' => '1',
                '7' => '2',
                '8' => '1',
                '9' => '2',
                '10' => '1',
                '11' => '1',
                '12' => '2',
                '13' => '1',
                '14' => '0',
            ),
            'p11' => array(
                '1' => '0',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
                '11' => '11',
                '12' => '2',
                '13' => '3',
                '14' => '0',
            ),
            'p12' => array(
                '1' => '0',
                '2' => '0',
                '3' => '0',
                '4' => '0',
                '5' => '10',
                '6' => '8',
                '7' => '7',
                '8' => '6',
                '9' => '5',
                '10' => '4',
                '11' => '3',
                '12' => '1',
                '13' => '0',
                '14' => '0',
            ),
            'p13' => array(
                '1' => '0',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
                '11' => '2',
                '12' => '3',
                '13' => '0',
                '14' => '0',
            ),
        );


        $md = '';

        $peso = '';

        $tamanho = 0;

        // Acre
        if ($estado == 'AC')
        {

            $fator = 0;


            /*
             * IEs após 11/99
             */
            if (strlen($ie) == 13)
            {
                $md = array(11, 11);

                $peso = array('p2', 'p1');

                $rot = array(array('E'), array('E'));

                $verificadores = array(12, 13);

                $tamanho = 13;
            }
            /*
             * IEs até 11/99
             */
            else if (strlen($ie) == 9)
            {
                $md = array(11);

                $peso = array('p1');

                $rot = array(array('E'));

                $verificadores = array(9);

                $tamanho = 9;
            }
            else
            {
                return false;
            }

            if (substr($ie, 0, 2) != '01')
            {
                return false;
            }
        }
        else if ($estado == 'AL')
        {
            $md = array(11);

            $rot = array(array('B', 'D'));

            $fator = 0;

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            if (substr($ie, 0, 2) != '24')
            {
                return false;
            }


            /*
             * Desabilitado pois existem IEs válidas que não se enqudram nessa regra
             * if (!in_array(substr($ie, 2, 1), array(0, 3, 5, 7, 8)))
              {
              return false;
              } */
        }
        else if ($estado == 'AP')
        {
            $md = array(11);

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            if ((int)$ie <= 30170009)
            {
                $rot = array(array('C', 'E'));

                $fator = 0;
            }
            else if ((int)$ie >= 30170010 AND (int)$ie <= 30190229)
            {    

                $rot = array(array('C', 'E'));

                $fator = 1;
            }
            else
            {  
                $rot = array(array('E'));

                $fator = 0;
            }

            if (substr($ie, 0, 2) != '03')
            {
                return false;
            }
        }
        else if ($estado == 'AM')
        {
            $md = array(11);

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $fator = 0;

            if (substr($ie, 0, 2) != '04' AND substr($ie, 0, 2) != '07')
            {
                return false;
            }
        }
        else if ($estado == 'BA')
        {

            $peso = array('p2', 'p3');

            $tamanho = 8;

            $verificadores = array(8, 7); // O 2° dígito vem primeiro

            $rot = array(array('E'), array('E'));

            $fator = 0;

            if (!in_array(substr($ie, 0, 1), array(6, 7, 9)))
            {
                $md = array(10, 10);
            }
            else
            {
                $md = array(11, 11);
            }
        }
        else if ($estado == 'CE')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $fator = 0;

            $md = array(11);

            if (substr($ie, 0, 1) != '0')
            {
                return false;
            }
        }
        else if ($estado == 'DF')
        {           
            
            $peso = array('p2', 'p1');

            $tamanho = 13;

            $verificadores = array(12, 13);

            $rot = array(array('E'), array('E'));

            $fator = 0;

            $md = array(11, 11);

            if (substr($ie, 0, 3) != '073' AND substr($ie, 0, 3) != '074' AND substr($ie, 0, 3) != '075')
            {
                return false;
            }
        }
        else if ($estado == 'ES')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $fator = 0;

            $md = array(11);

            if (substr($ie, 0, 2) != '00' AND substr($ie, 0, 2) != '08')
            {
                return false;
            }
        }
        else if ($estado == 'GO')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            if ($ie >= 101031050 AND $ie <= 101199979)
            {

                $fator = 0;
            }
            else
            {
                $fator = 1;
            }

            if (substr($ie, 0, 2) != '10' AND substr($ie, 0, 2) != '11' AND substr($ie, 0, 2) != '15')
            {
                return false;
            }
        }
        else if ($estado == 'MA')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 2) != '12')
            {
                return false;
            }
        }
        else if ($estado == 'MT')
        {

            $peso = array('p1');

            /*
             * No site da Fazenda diz que é 11, mas as IEs todas do MT que vi é 9
             */
            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;
        }
        else if ($estado == 'MS')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 2) != '28')
            {
                return false;
            }
        }
        else if ($estado == 'MG')
        {

            $peso = array('p10', 'p11');

            $tamanho = 13;

            $verificadores = array(12, 13);

            $rot = array(array('A', 'E'), array('E'));

            $md = array(10, 11);

            $fator = 0;
        }
        else if ($estado == 'PA')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 2) != '15')
            {
                return false;
            }
        }
        else if ($estado == 'PB')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 2) != '16')
            {
                return false;
            }
        }
        else if ($estado == 'PR')
        {

            $peso = array('p9', 'p8');

            $tamanho = 10;

            $verificadores = array(9, 10);

            $rot = array(array('E'), array('E'));

            $md = array(11, 11);

            $fator = 0;
        }
        else if ($estado == 'PE')
        {

            $peso = array('p7');

            $tamanho = 14;

            $verificadores = array(14);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 1;

            if (substr($ie, 0, 2) != '18')
            {
                return false;
            }
        }
        else if ($estado == 'PI')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 2) != '19')
            {
                return false;
            }
        }
        else if ($estado == 'RJ')
        {

            $peso = array('p8');

            $tamanho = 8;

            $verificadores = array(8);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (!in_array(substr($ie, 0, 1), array(1, 7, 8, 9)))
            {
                return false;
            }
        }
        else if ($estado == 'RN')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('B', 'D'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 2) != '20')
            {
                return false;
            }
        }
        else if ($estado == 'RS')
        {

            $peso = array('p1');

            $tamanho = 10;

            $verificadores = array(10);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 1) > 4)
            {
                return false;
            }
        }
        else if ($estado == 'RO')
        {

            $rot = array(array('E'));

            $md = array(11);

            /*
             * IEs até 07/2000
             */
            if (strlen($ie) == 9)
            {
                $tamanho = 9;

                $fator = 1;

                $verificadores = array(9);

                $peso = array('p4');

                if (substr($ie, 0, 1) == 0)
                {
                    return false;
                }
            }
            /*
             * IEs após 08/2000
             */
            else if (strlen($ie) == 14)
            {
                $tamanho = 14;

                $fator = 0;

                $verificadores = array(14);

                $peso = array('p1');
            }
        }
        else if ($estado == 'RR')
        {

            $peso = array('p5');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('D'));

            $md = array(9);

            $fator = 0;

            if (substr($ie, 0, 2) != '24')
            {
                return false;
            }
        }
        else if ($estado == 'SC')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;
        }
        else if ($estado == 'SP')
        {
            /*
             * IE comécio e indústria
             */
            if (substr($ie, 0, 1) != 'P')
            {
                $tamanho = 12;

                $verificadores = array(9, 12);

                $peso = array('p12', 'p13');

                $md = array(11, 11);

                $rot = array(array('D'), array('D'));
            }
            /*
             * IE rural
             */
            else
            {
                $tamanho = 13;

                $verificadores = array(10);

                $peso = array('p12');

                $md = array(11);

                $rot = array(array('D'));
            }

            $fator = 0;
        }
        else if ($estado == 'SE')
        {

            $peso = array('p1');

            $tamanho = 9;

            $verificadores = array(9);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;
        }
        else if ($estado == 'TO')
        {

            $peso = array('p6');

            $tamanho = 11;

            $verificadores = array(11);

            $rot = array(array('E'));

            $md = array(11);

            $fator = 0;

            if (substr($ie, 0, 2) != '29')
            {
                return false;
            }

            if (!in_array(substr($ie, 3, 1), array(1, 2, 3, 9)))
            {
                return false;
            }
        }

        if ($tamanho <> strlen($ie))
        {
            return false;
        }

        $j = 0;
    
        foreach ($verificadores as $verificador)
        {            
            $soma = 0;

            for ($i = 0; $i < ($verificador - 1); $i++)
            {
                $digito = substr($ie, $i, 1);

                $indice_peso = strlen($ie) - $i;

                $valor_peso = $pesos[$peso[$j]][$indice_peso];

                $mi = $digito * $valor_peso;

                if (in_array('A', $rot[$j]))
                {
                    $mi = $mi + floor($mi / 10);
                }

                $soma += $mi;
            }

            /*
             * Inclui o último dígito na soma
             * BA exceção digíto 2 ven antes
             */
            if ($estado == 'BA' AND $verificador == '7')
            {
                $soma += substr($ie, 7, 1) * 2;
            }

            if (in_array('B', $rot[$j]))
            {
                $soma = $soma * 10;
            }

            if (in_array('C', $rot[$j]))
            {
                $soma = $soma + 5 + (4 * $fator);
            }

            if (in_array('D', $rot[$j]))
            {
                $digito_verificador = $soma % $md[$j];
            }
            else if (in_array('E', $rot[$j]))
            {
                $digito_verificador = $md[$j] - ($soma % $md[$j]);
            }

            if ($digito_verificador == 10)
            {
                $digito_verificador = 0;
            }
            else if ($digito_verificador == 11)
            {
                $digito_verificador = $fator;
            }

            if ($digito_verificador != substr($ie, $verificador - 1, 1))
            {
                return false;
            }

            $j++;
        }
        
        return true;
    }

}
