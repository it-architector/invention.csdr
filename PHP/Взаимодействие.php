<?php

/**
 * Проект создан на основе архитектуры CSDR
 * https://github.com/it-architector/architecture.csdr
 * */

/*эмулируем запрос интерфейса*/
if(!isset($_GET["x"]) or !isset($_GET["y"])){
    $_GET["x"] = rand(1,9);
    $_GET["y"] = 4;
}

/*1 компонент проекта*/
$GLOBALS['Рефлексы'] = [
    '1' => [
        'Ориентир'   => 'Ядро (образец взаимодействия)',
        'Расчёты'    => 'Принять внешние "x" и "y", решить формулу z = x + y и отдать "z"',
        'Сценарий'   => [
            ['place_1.2'=>['place_1.2.1']]
        ],
        'Права'      => 'true',
        'Вложение'   => false
    ]
];

/*2 компонент проекта*/
$GLOBALS['Места']    = [
    '1' => [
        'Смысл'    => 'Память ядра',
        'Роль'     => ['Вместилище'=>'all'],
        'Связь'    => false,
        'Вложение' => [
            '1.1' => [
                'Смысл'    => 'Параметры ядра',
                'Роль'     => ['Вместилище'=>'all'],
                'Связь'    => false,
                'Вложение' => [
                    '1.1.1' => [
                        'Смысл'    => 'id рефлекса для авто-запуска',
                        'Роль'     => ['Атрибут'=>'information'],
                        'Связь'    => false,
                        'Вложение' => '1'
                        ],
                    '1.1.2' => [
                        'Смысл'    => 'Логика ядра',
                        'Роль'     => ['Запрос'=>'reaction'],
                        'Связь'    => '1',
                        'Вложение' => false
                        ],
                    ],
                ],
            '1.2' => [
                'Смысл'    => 'Получение x и y',
                'Роль'     => ['Ожидание'=>'request'],
                'Связь'    => '2',
                'Вложение' => [
                    '1.2.1' => [
                        'Смысл'    => 'Вычисление формулы x + y = z',
                        'Роль'     => ['Запрос'=>'reaction'],
                        'Связь'    => '3',
                        'Вложение' => [
                            '1.2.1.1' => [
                                'Смысл'    => 'Значение x',
                                'Роль'     => ['Атрибут'=>'information'],
                                'Связь'    => false,
                                'Вложение' => null
                            ],
                            '1.2.1.2' => [
                                'Смысл'    => 'Значение y',
                                'Роль'     => ['Атрибут'=>'information'],
                                'Связь'    => false,
                                'Вложение' => null
                            ],
                            '1.2.1.3' => [
                                'Смысл'    => 'Значение z',
                                'Роль'     => ['Атрибут'=>'information'],
                                'Связь'    => false,
                                'Вложение' => null
                            ],
                        ]
                    ],
                ]
            ],
        ]
    ]
];

/*3 компонент проекта*/
$GLOBALS['Связи']    = [
    '1'  => [
        'Тип'                 => 'Локальное',
        'Возможности'         => ['1.1.1'=>'reflex_id'],
        'Приобретение'        => null,
        'Образец возможностей' => [
            '1.1.1' => '1'
        ],
        'Образец приобретения' => null,
        'Реакция'             => '1'
    ],
    '2'  => [
        'Тип'                 => 'Глобальное',
        'Возможности'         => ['x'=>'1.2.1.1', 'y'=>'1.2.1.2'],
        'Приобретение'        => ['1.2.1.3'=>'z'],
        'Образец возможностей' => [
            'x' => 1,
            'y' => 3,
        ],
        'Образец приобретения' => [
            'z' => 4,
        ],
        'Реакция'             => false
    ],
    '3'  => [
        'Тип'                 => 'Локальное',
        'Возможности'         => ['1.2.1.1'=>'x', '1.2.1.2'=>'y'],
        'Приобретение'        => ['z'=>'1.2.1.3'],
        'Образец возможностей' => [
            '1.2.1.1' => 1,
            '1.2.1.2' => 3,
        ],
        'Образец приобретения' => [
            '1.2.1.3' => 4,
        ],
        'Реакция'             => '2'
    ],
];

/*4 компонент проекта*/
$GLOBALS['Реакции']  = [
    '1'  => [
        'Способность'  => function($opportunities = []){

            /*вспомогательные алгоритмы*/
            $helper_algorithms = [
                /*алгоритм выдачи значения рефлекса по id*/
                'reflex_value' => function ($opportunities = ['reflex_id' => null]){

                    /*создаём ссылку на корень рефлексов*/
                    $reflex_value = $GLOBALS['Рефлексы'];

                    /*создаём уровень вложенности*/
                    $reflex_id_explode = explode('.', $opportunities['reflex_id']);

                    /*переходим по вложенностям*/
                    $last_reflex_id = '';

                    foreach($reflex_id_explode as $key=>$reflex_id_in){
                        if($key == 0){
                            /*определяем название уровня*/
                            $last_reflex_id = $reflex_id_in;
                        }
                        else{
                            /*определяем название уровня*/
                            $last_reflex_id = $last_reflex_id . '.' . $reflex_id_in;
                            /*переходим во вложенность*/
                            $reflex_value = $reflex_value['Вложение'];
                        }
                        /*переходим во вложенность*/
                        $reflex_value = $reflex_value[$last_reflex_id];
                    }

                    /*убираем лишнее*/
                    $reflex_value['Вложение'] = false;

                    /*результат*/
                    return $reflex_value;
                },
                /*алгоритм выдачи ссылки на место по id*/
                'get_place_link' => function &($opportunities = ['place_id' => null]){

                    $place_id = $opportunities['place_id'];

                    /*создаём ссылку на корень места*/
                    $link = &$GLOBALS['Места'];

                    /*создаём уровень вложенности*/
                    $place_id_explode = explode('.', $place_id);

                    /*переходим по вложенностям*/
                    $last_place_id = '';
                    foreach($place_id_explode as $key=>$place_id){
                        if($key == 0){
                            /*определяем название уровня*/
                            $last_place_id = $place_id;
                        }
                        else{
                            /*определяем название уровня*/
                            $last_place_id = $last_place_id . '.' . $place_id;
                            /*переходим во вложенность*/
                            $link = &$link['Вложение'];
                        }
                        /*переходим во вложенность*/
                        $link = &$link[$last_place_id];
                    }

                    /*результат*/
                    return ($link);
                },
                /*проверяем права для активации рефлекса*/
                'verification_rights' => function($opportunities = ['rights' => null,'helper_algorithms' => ['verification_rights' => null,'get_place_link' =>null]]){

                    $helper_algorithms = [
                        /*получаем значения с мест, если необходимо*/
                        'get_place_id_from_value' => function($opportunities = ['value' => null,'helper_algorithms' => ['get_place_link' =>null]]){

                            $value = $opportunities['value'];

                            if(preg_match('/\{([0-9.]{1,})\}/',$opportunities['value'],$value_is_place_id)){
                                /*получаем значение с места*/
                                $value = $opportunities['helper_algorithms']['get_place_link']([
                                    'place_id' => $value_is_place_id[1]
                                ])['Вложение'];

                            }

                            /*результат*/
                            return $value;

                        }
                    ];

                    /*значение проверки*/
                    $verification = false;

                    /*если права есть без проверки*/
                    if($opportunities['rights'] == 'true'){
                        $verification = true;
                    }
                    /*если прав нет, проверять не нужно*/
                    else if($opportunities['rights'] == 'false'){
                        $verification = true;
                    }
                    /*проверяем*/
                    else{

                        /*проверяем на инкапсуляцию*/
                        $keys = array_keys($opportunities['rights']);
                        $encapsulation = $keys[0];

                        /*если есть особая Вместилище*/
                        if(preg_match('/(constant|variation)/',$encapsulation)){

                            $encapsulation_verification = [];

                            foreach($opportunities['rights'][$encapsulation] as $encapsulation_in=>$rights_in){

                                $encapsulation_verification[] = $opportunities['helper_algorithms']['verification_rights']([
                                    'rights' => [$encapsulation_in => $rights_in],
                                    'helper_algorithms' => [
                                        'verification_rights' =>$opportunities['helper_algorithms']['verification_rights'],
                                        'get_place_link' =>$opportunities['helper_algorithms']['get_place_link']
                                    ]
                                ]);
                            }

                            /*Вместилище OR сработала*/
                            if(preg_match('/(variation)/',$encapsulation) and in_array(true,$encapsulation_verification)){
                                $verification = true;
                            }
                            /*Вместилище AND сработала*/
                            else if(preg_match('/(constant)/',$encapsulation) and !in_array(false,$encapsulation_verification)){
                                $verification = true;
                            }
                            else{
                                $verification = false;
                            }

                        }
                        /*сопоставление*/
                        else{

                            $operation = $opportunities['rights'][$encapsulation][1];

                            /*получаем значения с мест, если необходимо*/
                            $value_1 = $helper_algorithms['get_place_id_from_value']([
                                'value' => $opportunities['rights'][$encapsulation][0],
                                'helper_algorithms' => [
                                    'get_place_link' =>$opportunities['helper_algorithms']['get_place_link']
                                ]
                            ]);

                            $value_2 = $helper_algorithms['get_place_id_from_value']([
                                'value' => $opportunities['rights'][$encapsulation][2],
                                'helper_algorithms' => [
                                    'get_place_link' =>$opportunities['helper_algorithms']['get_place_link']
                                ]
                            ]);

                            /*проверяем*/
                            if($operation=='>' and $value_1>$value_2){
                                $verification = true;
                            }
                            else if($operation=='=' and $value_1==$value_2){
                                $verification = true;
                            }
                            else if($operation=='>=' and $value_1>=$value_2){
                                $verification = true;
                            }
                            else if($operation=='!=' and $value_1!=$value_2){
                                $verification = true;
                            }
                            else if($operation=='in' and in_array($value_1,$value_2,true)){
                                $verification = true;
                            }
                            else if($operation=='not in' and !in_array($value_1,$value_2,true)){
                                $verification = true;
                            }
                            else{
                                $verification = false;
                            }

                        }
                    }



                    /*результат*/
                    return $verification;

                },
                /*алгоритм активации мест*/
                'activation_place' => function($opportunities = ['places' => null,'helper_algorithms' => ['get_place_link' => null,'activation_place'=>null]]){

                    /*вспомогательные алгоритмы*/
                    $helper_algorithms = [
                        /*алгоритм установки значений по местам*/
                        'set_place_values' => function($opportunities = ['place_values' => null,'helper_algorithms' => ['get_place_link' => null]]){

                            /*обрабатываем приобретения*/
                            if($opportunities['place_values']!=null and is_array($opportunities['place_values'])){
                                /*сохраняем результат по местам*/
                                foreach($opportunities['place_values'] as $place_id=>$place_value){
                                    /*создаём ссылку на место*/
                                    $place_link = &$opportunities['helper_algorithms']['get_place_link']([
                                        'place_id' => $place_id
                                    ]);
                                    /*сохраняем значение*/
                                    $place_link['Вложение'] = $place_value;
                                    /*убираем ссылку*/
                                    unset($place_link);
                                }
                            }

                        },
                        /*алгоритм получения значений c мест*/
                        'get_place_values' => function($opportunities = ['communication_id' => null,'helper_algorithms' => ['get_place_link' => null]]){

                            $communication_id = $opportunities['communication_id'];

                            /*получаем значения с мест*/
                            $place_values = [];

                            if($GLOBALS['Связи'][$communication_id]['Возможности'] != null){

                                foreach($GLOBALS['Связи'][$communication_id]['Возможности'] as $place_id=>$place_code){

                                    $place_values[$place_code] = $opportunities['helper_algorithms']['get_place_link']([
                                        'place_id' => $place_id
                                    ])['Вложение'];

                                }
                            }

                            return $place_values;

                        },
                        /*алгоритм активации ролей*/
                        'activation_roles' => [
                            'Вместилище' => [
                                /*обозначение категории*/
                                'all' => function($opportunities = []){
                                    /*ничего не делаем*/
                                },
                            ],
                            'Ожидание' => [
                                /*получение GET и POST данных и отправка ответа*/
                                'request' => function($opportunities = ['place_value' => null,'attachment_places' => null,'helper_algorithms' => ['activation_place' => null,'set_place_values' => null,'get_place_link' => null]]){

                                    /*если у места есть связь*/
                                    if($opportunities['place_value']['Связь']){

                                        $communication_id = $opportunities['place_value']['Связь'];

                                        if($GLOBALS['Связи'][$communication_id]['Возможности'] != null){

                                            $place_values_from_interface = [];

                                            /*получаем информацию из интерфейса*/
                                            foreach($GLOBALS['Связи'][$communication_id]['Возможности'] as $request_id=>$place_id){
                                                /*получаем значение извне*/
                                                if(isset($_POST[$request_id])){
                                                    $place_value = $_POST[$request_id];
                                                }
                                                elseif(isset($_GET[$request_id])){
                                                    $place_value = $_GET[$request_id];
                                                }
                                                else{
                                                    $place_value = null;
                                                }

                                                $place_values_from_interface[$place_id] = $place_value;

                                            }

                                            /*сохраняем информацию*/
                                            $opportunities['helper_algorithms']['set_place_values']([
                                                'place_values' => $place_values_from_interface,
                                                'helper_algorithms' => [
                                                    'get_place_link' => $opportunities['helper_algorithms']['get_place_link']
                                                ]
                                            ]);

                                        }

                                        /*активируем приложенные места*/
                                        $opportunities['helper_algorithms']['activation_place']([
                                            'places' => $opportunities['attachment_places'],
                                            'helper_algorithms' => [
                                                'get_place_link' => $opportunities['helper_algorithms']['get_place_link'],
                                                'activation_place' => $opportunities['helper_algorithms']['activation_place']
                                            ]
                                        ]);

                                        if($GLOBALS['Связи'][$communication_id]['Приобретение'] != null){

                                            $place_values_to_interface = [];

                                            /*получаем информацию с мест*/
                                            foreach($GLOBALS['Связи'][$communication_id]['Приобретение'] as $place_id=>$request_id){
                                                /*получаем значения*/
                                                $place_values_to_interface[$request_id] = &$opportunities['helper_algorithms']['get_place_link']([
                                                    'place_id' => $place_id
                                                ])['Вложение'];
                                            }

                                            /*отправляем информацию в интерфейс*/
                                            echo json_encode($place_values_to_interface);
                                        }
                                    }
                                },
                            ],
                            'Запрос' => [
                                /*активация реакции*/
                                'reaction' => function($opportunities = ['place_value' => null,'helper_algorithms' => ['get_place_values' => null,'get_place_link' => null,'set_place_values' => null]]){

                                    /*если у места есть связь*/
                                    if($opportunities['place_value']['Связь']){

                                        $communication_id = $opportunities['place_value']['Связь'];

                                        /*получаем значения для реакции*/
                                        $place_values_to_reaction = $opportunities['helper_algorithms']['get_place_values']([
                                            'communication_id' => $communication_id,
                                            'helper_algorithms' => [
                                                'get_place_link' => $opportunities['helper_algorithms']['get_place_link']
                                            ]
                                        ]);

                                        /*если есть реакция у связи*/
                                        if($GLOBALS['Связи'][$communication_id]['Реакция']){

                                            $reaction_id = $GLOBALS['Связи'][$communication_id]['Реакция'];

                                            /*активируем реакцию*/
                                            $results = $GLOBALS['Реакции'][$reaction_id]['Способность']($place_values_to_reaction);

                                            /*если есть что сохранять по местам*/
                                            if($GLOBALS['Связи'][$communication_id]['Приобретение']!=null){

                                                $place_values_from_reaction = [];

                                                /*соотносим полученными от реакции переменные с назначенными переменными в связи*/
                                                foreach($GLOBALS['Связи'][$communication_id]['Приобретение'] as $place_code=>$place_id){
                                                    /*если есть значение в результате реакции*/
                                                    if(isset($results[$place_code])){
                                                        $place_values_from_reaction[$place_id] = $results[$place_code];
                                                    }
                                                    /*в результате реакции нет значения*/
                                                    else{
                                                        $place_values_from_reaction[$place_id] = null;
                                                    }
                                                }

                                                /*сохраняем значения результата реакции*/
                                                $opportunities['helper_algorithms']['set_place_values']([
                                                    'place_values' => $place_values_from_reaction,
                                                    'helper_algorithms' => [
                                                        'get_place_link' => $opportunities['helper_algorithms']['get_place_link']
                                                    ]
                                                ]);

                                            }
                                        }

                                    }
                                },
                                /*распределение переменных с массива*/
                                'distribution' => function($opportunities = ['place_value' => null,'attachment_places' => null,'helper_algorithms' => ['get_place_values' => null,'get_place_link' => null,'set_place_values' => null]]){

                                    /*если у места есть связь*/
                                    if($opportunities['place_value']['Связь']){

                                        $communication_id = $opportunities['place_value']['Связь'];

                                        if($GLOBALS['Связи'][$communication_id]['Возможности'] != null and $GLOBALS['Связи'][$communication_id]['Приобретение'] != null){

                                            /*импортируемые значения с мест*/
                                            $place_values_distribution_array = $opportunities['helper_algorithms']['get_place_values']([
                                                'communication_id' => $communication_id,
                                                'helper_algorithms' => [
                                                    'get_place_link' => $opportunities['helper_algorithms']['get_place_link']
                                                ]
                                            ])['array'];

                                            /*значение массива находится в array*/
                                            foreach($place_values_distribution_array as $place_values_distribution){

                                                /*распределяем значения*/
                                                $place_values_from_distribution = [];

                                                /*назначенные переменными в связи*/
                                                foreach($GLOBALS['Связи'][$communication_id]['Приобретение'] as $place_code=>$place_id){
                                                    /*если есть значение в импорте*/
                                                    if(isset($place_values_distribution[$place_code])){
                                                        $place_values_from_distribution[$place_id] = $place_values_distribution[$place_code];
                                                    }
                                                    /*в результате реакции нет значения*/
                                                    else{
                                                        $place_values_from_distribution[$place_id] = null;
                                                    }
                                                }

                                                /*сохраняем значения распределения*/
                                                $opportunities['helper_algorithms']['set_place_values']([
                                                    'place_values' => $place_values_from_distribution,
                                                    'helper_algorithms' => [
                                                        'get_place_link' => $opportunities['helper_algorithms']['get_place_link']
                                                    ]
                                                ]);

                                                /*активируем приложенные места*/
                                                $opportunities['helper_algorithms']['activation_place']([
                                                    'places' => $opportunities['attachment_places'],
                                                    'helper_algorithms' => [
                                                        'get_place_link' => $opportunities['helper_algorithms']['get_place_link'],
                                                        'activation_place' => $opportunities['helper_algorithms']['activation_place']
                                                    ]
                                                ]);

                                            }

                                        }

                                    }

                                },
                            ],
                        ],
                    ];

                    /*если есть места*/
                    if($opportunities['places']){

                        /*обходим все места*/
                        foreach($opportunities['places'] as $place_id){

                            /*приложенные места*/
                            $attachment_places = false;

                            /*если id места с приложенными местами: ['id' => ['id2','id3']]*/
                            if(is_array($place_id)){

                                $place_id_with_attachment = $place_id;

                                /*вычисляем идентификатор места*/
                                $keys = array_keys($place_id_with_attachment);
                                $place_id = $keys[0];

                                /*приложенные места*/
                                $attachment_places = $place_id_with_attachment[$place_id];
                            }
                            /*если обозначен рефлекс*/
                            else if(substr_count($place_id,'reflex_')){

                                /*получаем id рефлекса*/
                                $reflex_id = str_replace('reflex_','',$place_id);

                                /*активируем рефлекс*/
                                $GLOBALS['Реакции'][1]['Способность'](['reflex_id'=>$reflex_id]);

                                continue;
                            }

                            /*получаем id рефлекса*/
                            $place_id = str_replace('place_','',$place_id);

                            /*получаем значения места*/
                            $place_value =  $opportunities['helper_algorithms']['get_place_link']([
                                'place_id' => $place_id
                            ]);

                            /*вычисляем идентификатор роли*/
                            $keys = array_keys($place_value['Роль']);
                            $role_id = $keys[0];
                            $role_additional = $place_value['Роль'][$role_id];

                            /*активируем роль*/
                            $helper_algorithms['activation_roles'][$role_id][$role_additional]([
                                'place_value' => $place_value,
                                'attachment_places' => $attachment_places,
                                'helper_algorithms' => [
                                    'activation_place' => $opportunities['helper_algorithms']['activation_place'],
                                    'get_place_link' => $opportunities['helper_algorithms']['get_place_link'],
                                    'set_place_values' => $helper_algorithms['set_place_values'],
                                    'get_place_values' => $helper_algorithms['get_place_values'],
                                ]
                            ]);
                        }
                    }
                },
            ];

            /*получаем значения запрашиваемого рефлекса*/
            $reflex_value = $helper_algorithms['reflex_value']([
                'reflex_id' => $opportunities['reflex_id']
            ]);

            /*проверяем права для активации рефлекса*/
            $verification_rights = $helper_algorithms['verification_rights']([
                'rights' => $reflex_value['Права'],
                'helper_algorithms' => [
                    'get_place_link' => $helper_algorithms['get_place_link'],
                    'verification_rights' => $helper_algorithms['verification_rights']
                ]
            ]);

            /*если права рефлекса выполнимы*/
            if($verification_rights == true){

                /*активируем места*/
                $helper_algorithms['activation_place']([
                    'places' => $reflex_value['Сценарий'],
                    'helper_algorithms' => [
                        'get_place_link' => $helper_algorithms['get_place_link'],
                        'activation_place' => $helper_algorithms['activation_place']
                    ]
                ]);

            }

            /*результат*/
            return null;

        }
    ],
    '2'  => [
        'Способность'  => function($opportunities = []){

            /*x + y = z*/
            $z = $opportunities['x'] + $opportunities['y'];

            /*результат*/
            return [
                'z' => $z,
            ];
        }
    ],
];

/*активируем рефлексию ядра*/
$GLOBALS['Реакции'][1]['Способность'](['reflex_id'=>$GLOBALS['Места']['1']['Вложение']['1.1']['Вложение']['1.1.1']['Вложение']]);

?>
