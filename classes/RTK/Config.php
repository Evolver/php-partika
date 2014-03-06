<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \Web\Config as BaseConfig;

class Config extends BaseConfig
{
    /**
     * Directory where template files are located.
     *
     * @var string
     */
    public $templateRoot;

    /**
     * @var string
     */
    public $name = 'pārtika.rtk.lv';

    /**
     * @var string
     */
    public $descr = 'RTK pārtikas interneta veikals. 2012. gada rudens semestra A-IT-2 Kursa darbs.';

    /**
     * @var string
     */
    public $slogan = 'Svaigākie produkti no visas Latvijas.';

    /**
     * @var string
     */
    public $author = 'Dmitrijs Stepanovs, A-IT-2, dmitry@xhtml.guru';

    /**
     * @var string
     */
    public $copyright = '© 2013 Dmitrijs Stepanovs, A-IT-2.';

    /**
     * @var string
     */
    public $contactName = 'RTK, A-IT-2, Dmitrijs Stepanovs.';

    /**
     * @var string
     */
    public $contactEmail = 'dmitry@xhtml.guru';

    /**
     * @var string
     */
    public $defaultFormat = 'xhtml';

    /**
     * @var string
     */
    public $defaultRequest = 'Index';

    /**
     * @var string
     */
    public $notFoundRequest = 'NotFound';

    /**
     * @var string
     */
    public $xmlns = 'http://stepanov.lv/2013/rtk/partika';

    /**
     * @var string
     */
    public $googleMapsAPIKey = 'AIzaSyDDM6ClL-9CLwl-uzRvrk9KgytggLfYnis';

    /**
     * @var array
     */
    public $products =
    [
        // Alcohol
        'aldaris.beer' =>
        [
            'name' => 'Alus "Aldaris"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '0.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'cesu.beer' =>
        [
            'name' => 'Alus "Cēsu"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '1.19',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'rubenis.livu.beer' =>
        [
            'name' => 'Alus "Rubenis"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '2',
            'unitPrice' => '2.00',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'sencu.livu.beer' =>
        [
            'name' => 'Alus "Senču"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '0.85',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'asti.martini' =>
        [
            'name' => 'Šampanietis "Martini Asti"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.75',
            'unitPrice' => '4.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'jack_daniels.whiskey' =>
        [
            'name' => 'Viskijs "Jack Daniels"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '15.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'tullamore_dew.whiskey' =>
        [
            'name' => 'Viskijs "Tullamore Dew"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.750',
            'unitPrice' => '18.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'sierra.tequila' =>
        [
            'name' => 'Tekila "Sierra"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '6.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'fundador.brandy' =>
        [
            'name' => 'Brendijs "Fundador"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.75',
            'unitPrice' => '35.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        // Milk products
        'karums.curd' =>
        [
            'name' => 'Biezpiens "Kārums" ar saldo krējumu un mellenēm',
            'unitType' => 'Weight',
            'unitAmount' => '0.160',
            'unitPrice' => '1.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'karums.curd_bun' =>
        [
            'name' => 'Biezpiena sieriņš "Kārums", vaniļas',
            'unitType' => 'Weight',
            'unitAmount' => '0.045',
            'unitPrice' => '0.24',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'karums.milk' =>
        [
            'name' => 'Piens "Kārums"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '0.79',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'lase.milk' =>
        [
            'name' => 'Piens "Lāse"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '0.89',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'limbazu.milk' =>
        [
            'name' => 'Piens "Limbažu"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '0.75',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'smiltene.sour_cream' =>
        [
            'name' => 'Skābs krējums "Smiltene"',
            'unitType' => 'Weight',
            'unitAmount' => '0.5',
            'unitPrice' => '0.67',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'tautas.dense.milk' =>
        [
            'name' => 'Iebiezināts piens "TAUTAS"',
            'unitType' => 'Weight',
            'unitAmount' => '0.400',
            'unitPrice' => '0.45',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        // Vegetables
        'tomatoes' =>
        [
            'name' => 'Tomāti',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '0.15',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'cucumbers' =>
        [
            'name' => 'Gurķi',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '0.10',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'potatoes' =>
        [
            'name' => 'Kartupeļi',
            'unitType' => 'Weight',
            'unitAmount' => '1',
            'unitPrice' => '0.25',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'carrots' =>
        [
            'name' => 'Burkāni',
            'unitType' => 'Weight',
            'unitAmount' => '0.1',
            'unitPrice' => '0.10',
            'minUnits' => 5,
            'maxUnits' => 20
        ],

        'onions' =>
        [
            'name' => 'Sīpoli',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '0.10',
            'minUnits' => 2,
            'maxUnits' => 10
        ],

        'green.onions' =>
        [
            'name' => 'Sīpolu loki',
            'unitType' => 'Weight',
            'unitAmount' => '0.05',
            'unitPrice' => '0.05',
            'minUnits' => 2,
            'maxUnits' => 20
        ],

        'parsley' =>
        [
            'name' => 'Pētersīļi',
            'unitType' => 'Weight',
            'unitAmount' => '0.05',
            'unitPrice' => '0.03',
            'minUnits' => 2,
            'maxUnits' => 20
        ],

        'broccoli' =>
        [
            'name' => 'Brokoļi',
            'unitType' => 'Weight',
            'unitAmount' => '0.1',
            'unitPrice' => '0.30',
            'minUnits' => 1,
            'maxUnits' => 20
        ],

        'cabbage' =>
        [
            'name' => 'Kāposti',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '0.29',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        // Meat products
        'pork' =>
        [
            'name' => 'Cūkgaļas karbonāde',
            'unitType' => 'Weight',
            'unitAmount' => '0.5',
            'unitPrice' => '8.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'beef' =>
        [
            'name' => 'Teļa gaļa',
            'unitType' => 'Weight',
            'unitAmount' => '0.5',
            'unitPrice' => '14.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'mince' =>
        [
            'name' => 'Kotlešu masa',
            'unitType' => 'Weight',
            'unitAmount' => '0.100',
            'unitPrice' => '0.45',
            'minUnits' => 5,
            'maxUnits' => 20
        ],

        // Seafood
        'crawfish' =>
        [
            'name' => 'Vēži',
            'unitType' => 'Weight',
            'unitAmount' => '0.5',
            'unitPrice' => '15.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'dried.roach' =>
        [
            'name' => 'Vītināta rauda',
            'unitType' => 'Weight',
            'unitAmount' => '0.5',
            'unitPrice' => '10.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'herring' =>
        [
            'name' => 'Silķe',
            'unitType' => 'Weight',
            'unitAmount' => '0.5',
            'unitPrice' => '12.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'salmon' =>
        [
            'name' => 'Lasis',
            'unitType' => 'Weight',
            'unitAmount' => '0.5',
            'unitPrice' => '18.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'salmon.caviar' =>
        [
            'name' => 'Lašu ikri',
            'unitType' => 'Weight',
            'unitAmount' => '0.100',
            'unitPrice' => '8.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'trout' =>
        [
            'name' => 'Forele',
            'unitType' => 'Weight',
            'unitAmount' => '0.250',
            'unitPrice' => '8.55',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        // Cakes
        'birthday.cake' =>
        [
            'name' => 'Torte "Dzimšanas dienai"',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '5.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'bonton.chocolate.cake' =>
        [
            'name' => 'Šokolādes torte "Bonton"',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '2.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'cake' =>
        [
            'name' => 'Torte "Garšīgā"',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '1.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'chocolate.cake' =>
        [
            'name' => 'Šokolādes torte "Ņammīgā"',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '3.50',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'strawberry.cake' =>
        [
            'name' => 'Torte ar zemenēm',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '4.15',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'valentines.cake' =>
        [
            'name' => 'Torte "Valentīndienas"',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '8.15',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'wedding.cake' =>
        [
            'name' => 'Torte "Kāzu"',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '45',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        // Fruits
        'apple' =>
        [
            'name' => 'Āboli',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '0.10',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'oranges' =>
        [
            'name' => 'Apelsīni',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '0.20',
            'minUnits' => 2,
            'maxUnits' => 10
        ],

        'grapes' =>
        [
            'name' => 'Vīnogas, gaišās',
            'unitType' => 'Weight',
            'unitAmount' => '0.250',
            'unitPrice' => '3',
            'minUnits' => 2,
            'maxUnits' => 10
        ],

        'dark.grapes' =>
        [
            'name' => 'Vīnogas, tumšās',
            'unitType' => 'Weight',
            'unitAmount' => '0.250',
            'unitPrice' => '2.59',
            'minUnits' => 2,
            'maxUnits' => 10
        ],

        'kiwi' =>
        [
            'name' => 'Kivi',
            'unitType' => 'Quantity',
            'unitAmount' => '1',
            'unitPrice' => '0.25',
            'minUnits' => 2,
            'maxUnits' => 10
        ],

        // Juices
        'pure.grapefruit' =>
        [
            'name' => 'Greipfrūtu sula "Pure"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '1.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'pure.orange' =>
        [
            'name' => 'Apelsīnu sula "Pure"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '1.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'pure.pineapple' =>
        [
            'name' => 'Ananāsu sula "Pure"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '1',
            'unitPrice' => '1.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        // Lemonades
        'coca_cola' =>
        [
            'name' => 'Coca-Cola',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '1.50',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'fanta' =>
        [
            'name' => 'Fanta',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '1.29',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'sprite' =>
        [
            'name' => 'Sprite',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '1.29',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'limpo' =>
        [
            'name' => 'Limpo',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '0.99',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'buratino' =>
        [
            'name' => 'Buratino',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.5',
            'unitPrice' => '0.79',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        // Ice cream
        'karlsons.tio.chocolate' =>
        [
            'name' => 'Šokolādes saldējums "Karlsons"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.1',
            'unitPrice' => '0.35',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'lukss.grape' =>
        [
            'name' => 'Vīnogu saldējums "Lukss"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.125',
            'unitPrice' => '0.49',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'pols.chocolate' =>
        [
            'name' => 'Šokolādes saldējums "Pols"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.120',
            'unitPrice' => '0.59',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'tio.caramel' =>
        [
            'name' => 'Karamelizētais saldējums "TIO"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.130',
            'unitPrice' => '0.45',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'tio.chocolate' =>
        [
            'name' => 'Šokolādes saldējums "TIO"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.130',
            'unitPrice' => '0.45',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'tio.lemon' =>
        [
            'name' => 'Citronu saldējums "TIO"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.130',
            'unitPrice' => '0.45',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'tio.cream' =>
        [
            'name' => 'Plombīra saldējums "TIO"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.300',
            'unitPrice' => '1',
            'minUnits' => 1,
            'maxUnits' => 10
        ],

        'viva.caramel' =>
        [
            'name' => 'Karameizētais saldējums "Super VIVA"',
            'unitType' => 'Volume_Liquids',
            'unitAmount' => '0.200',
            'unitPrice' => '0.60',
            'minUnits' => 1,
            'maxUnits' => 10
        ],
    ];

    /**
     * @var array
     */
    public $categories =
    [
        'milk' =>
        [
            'name' => 'Piena produkti',
            'products' =>
            [
                'karums.milk', 'lase.milk', 'limbazu.milk', 'karums.curd', 'karums.curd_bun',
                'smiltene.sour_cream', 'tautas.dense.milk'
            ]
        ],

        'vegetables' =>
        [
            'name' => 'Dārzeņi',
            'products' =>
            [
                'tomatoes', 'cucumbers', 'potatoes', 'carrots', 'onions', 'green.onions',
                'parsley', 'broccoli', 'cabbage'
            ]
        ],

        'meat' =>
        [
            'name' => 'Gaļas produkti',
            'products' =>
            [
                'pork', 'beef', 'mince'
            ]
        ],

        'seafood' =>
        [
            'name' => 'Jūras produkti',
            'products' =>
            [
                'salmon', 'trout', 'herring', 'dried.roach', 'salmon.caviar', 'crawfish'
            ]
        ],

        'cakes' =>
        [
            'name' => 'Tortītes',
            'products' =>
            [
                'cake', 'chocolate.cake', 'bonton.chocolate.cake', 'strawberry.cake', 'birthday.cake',
                'valentines.cake', 'wedding.cake'
            ]
        ],

        'fruits' =>
        [
            'name' => 'Augļi',
            'products' =>
            [
                'apple', 'oranges', 'kiwi', 'grapes', 'dark.grapes'
            ]
        ],

        'juices' =>
        [
            'name' => 'Sulas',
            'products' =>
            [
                'pure.orange', 'pure.pineapple', 'pure.grapefruit'
            ]
        ],

        'lemonades' =>
        [
            'name' => 'Limonādes',
            'products' =>
            [
                'coca_cola', 'sprite', 'fanta', 'limpo', 'buratino'
            ]
        ],

        'icecream' =>
        [
            'name' => 'Saldējums',
            'products' =>
            [
                'tio.caramel', 'tio.chocolate', 'tio.lemon', 'viva.caramel', 'tio.cream',
                'lukss.grape', 'pols.chocolate', 'karlsons.tio.chocolate'
            ]
        ],

        'alcohol' =>
        [
            'name' => 'Alkohols',
            'products' =>
            [
                'aldaris.beer', 'cesu.beer', 'rubenis.livu.beer', 'sencu.livu.beer', 'asti.martini',
                'jack_daniels.whiskey', 'tullamore_dew.whiskey', 'sierra.tequila', 'fundador.brandy'
            ]
        ]
    ];
}
