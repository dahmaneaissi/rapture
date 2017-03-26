<?php
if( !function_exists( 'getWillayas' ) )
{
    function getWillaya( $id = null )
    {
        $data = array(
			'' => 'Sélectionner',
            '1' => 'Adrar',
            '2' => 'Chlef',
            '3' => 'Laghouat'	,
            '4' => 'Oum El-Bouaghi',
            '5' => 'Batna',
            '6' => 'Béjaïa',
            '7' => 'Biskra',
            '8' => 'Béchar',
            '9' => 'Blida',
            '10' => 'Bouira',
            '11' => 'Tamanrasset',
            '12' => 'Tébessa',
            '13' => 'Tlemcen',
            '14' => 'Tiaret',
            '15' => 'Tizi-Ouzou',
            '16' => 'Alger',
            '17' => 'Djelfa',
            '18' => 'Jijel',
            '19' => 'Sétif',
            '20' => 'Saida',
            '21' => 'Skikda',
            '22' => 'Sidi Bel-Abbès',
            '23' => 'Annaba',
            '24' => 'Guelma',
            '25' => 'Constantine',
            '26' => 'Médéa',
            '27' => 'Mostaganem',
            '28' => "M'Sila",
            '29' => 'Mascara',
            '30' => 'Ouargla',
            '31' => 'Oran',
            '32' => 'El - Bayadh',
            '33' => 'Illizi',
            '34' => 'Bordj Bou - Arreridj',
            '35' => 'Boumerdès',
            '36' =>  'El - Taref',
            '37' => 'Tindouf',
            '38' => 'Tissemsilt',
            '39' => 'El - Oued',
            '40' => 'Khenchela',
            '41' => 'Souk - Ahras',
            '42' => 'Tipaza',
            '43' => 'Mila',
            '44' => 'Ain - Defla',
            '45' => 'Naâma',
            '46' => 'Ain - Temouchent',
            '47' => 'Ghardaia',
            '48' =>'Relizane'
        );

        if( $id  && array_key_exists( $id , $data ))
        {
            return $data[ $id ];
        }

        return $data;
    }
}

if( !function_exists( 'getAge' ) )
{
    function getAge( $birthDate )
    {
        if( !$birthDate )
        {
            return null;
        }

        $birthDate = explode("-", $birthDate);

        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));

        return $age;
    }
}
