# Код CSDR

<a href="https://translate.google.com/translate?sl=ru&tl=zh-CN&u=https%3A%2F%2Fgithub.com%2Fit-architector%2Fcode.csdr%2Fblob%2Fmaster%2FREADME.md&result=%D0%9F%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C+%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4">用中文（表达</a>

<h3>Предисловие</h3>

Применяя **CSDR** (Conditions, Space, Distribution и Realization) можно быть уверенным, что исходный код проекта будет конструктивным.

![](./Картинки/Энтузиазм-2.jpg)

<h3>Навигация</h3>

1. <a href="#Проект">Проект</a>

    1.1. <a href="#Замысел">Замысел</a>
    
    1.2. <a href="#Потенциалы">Потенциалы</a>
    
    1.3. <a href="#Компоненты">Компоненты</a>
    
    1.4. <a href="#Содержание">Содержание</a>
    
    1.5. <a href="#Ранжировка">Ранжировка</a>
    
    1.6. <a href="#Процесс">Процесс</a>

    1.7. <a href="#Код">Код</a>
    
    1.8. <a href="#Роли">Роли</a>
    
2. <a href="#Образец-проектов-на-PHP">Образец проектов на PHP</a>

    2.1. <a href="#Роли-1">Роли</a>
    
    2.2. <a href="#Взаимодействие">Взаимодействие</a>
    
    2.3. <a href="#Многопоточность">Многопоточность</a>
    
    2.4. <a href="#Вариантность">Вариантность</a>
    
3. <a href="#Образец-проектов-на-JS">Образец проектов на JS</a>

    3.1. <a href="#Роли-2">Роли</a>
    
    3.2. <a href="#Контроль">Контроль</a>
    
    3.3. <a href="#Многопоточность-1">Многопоточность</a>
    
    3.4. <a href="#Вариантность-1">Вариантность</a>
    
    3.5. <a href="#Навигация">Навигация</a>
    
    3.6. <a href="#реакция-pagespeed">Реакция pagespeed</a>
    
3. <a href="#ссылки">Ссылки</a>

![---------------------](./Картинки/hr.png)

<h2>Проект</h2>

<h3>Замысел</h3>

Проект начинается с обозначения необходимых в нём конструкций (вам это знакомо из MVC как model). Для этого нужно обозначить назначение конструкции (например: форум, магазин, анимация при загрузке страницы) и предпочтения к конструкции. Так будет делаться у конструкций проекта: флажок начала работы (назначение) и флажок завершения работы (предпочтение). Собственно это всё, что нужно ожидать от заказчика.

<h3>Потенциалы</h3>

По моим расчётам (и подсказкам таки еврейских братьев) наш мир 4-х-мерный: прошлое (наша опора), будущее (наша среда), объединяющее (таки да, торговля и подарки важны) и настоящее (наши дела). Основавшись на таких знаниях, и признав, что лучшего целостного проектирования, согласованного с ходом нашего времени, для моих устремлений не найти, я вычислил, что разрабатываемый проект (ядро, интерфейс, программа, сайт) нуждается в накоплении 4-х потенциалов: 

1. Права
2. Роли
3. Возможности
4. Способности

И ничего более, или менее.

<h3>Компоненты</h3>

Для накопления потенциалов я спроектировал такие компоненты: Conditions, Space, Distribution и Realization. Зафиксируем их как международную аббревиатуру CSDR. 

![](./Картинки/Дом-2.jpg)

Для удобства изъяснений, сделаю общую картину проекта и его перевод:

1) Conditions, где создаются права проекта -> <b>Рефлексы</b>

> При просмотре всех рефлексов мы можем понять какие внешние события проект обрабатывает, по простому: для чего проект существует.


2) Space, где создаются роли проекта -> <b>Места</b>

> При просмотре мест мы можем понять какие у проекта функции, оболочки, переменные и их значения.


3) Distribution, где создаются возможности проекта -> <b>Связи</b>

> При просмотре связей мы можем понять как заполняется и куда поступают значения переменных.


4) Realization, где создаются способности проекта -> <b>Реакции</b>

> При просмотре реакций мы можем понять логику проекта.

<h3>Содержание</h3>

Для каждого компонента так же было выявлено необходимое содержание, дабы каждый компонент смог раскрыть себя полностью и быть применим на любом уровне проекта.

Для <b>рефлексов</b>:
1. Ориентир, где обозначение рефлекса
2. Расчёты, где устанавливается состав задач, обеспечивающих реализацию поставленных целей; уточняется характер взаимосвязи и их основные характеристики; определяются необходимые для решения задач функции обработки данных 
3. Сценарий, где id мест для активации
4. Права, где код регуляции
5. Вложение, где подкатегории рефлексов


Для <b>мест</b>:
1. Смысл, где обозначение места
2. Роль, где назначение места (вы знакомы с этим в виде модулей по api технологии)
3. Связь, где id связи для активации
4. Реакция, где id реакции для активации
4. Вложение, где подкатегории мест / значения


Для <b>связей</b>:
1. Тип, где дальность связи / внутренняя, внешняя
2. Возможности, где массив назначения мест
3. Образец возможностей


Для <b>реакций</b>:
1. Способность, где алгоритм (или true, когда алгоритм в зашит в роли)
2. Начальные данные, где информация для способности
3. Результативные данные, где созданная информация

<h3>Ранжировка</h3>

Рефлексы и места из за своих особенностей (необходимости вложенности) должны выстраиваться гомоархически (в субъекты), а вот связи и реакции гетерархично (в объекты) по причине завязки на места.

![](./Картинки/Гомоархия%20и%20гетерархия-2.jpg)


<h3>Процесс</h3>

Процесс проект запускается в виде циклического процесса:

1. Рефлексы активируют места
2. Места активируют связи
3. Связи активируют реакции
4. Реакции активируют рефлексы
и т.д. с самого начала, до тех пор пока есть не активированные рефлексы.

Чтобы запустить данный процесс, будет отдельная функция "процессора".

![](./Картинки/4-х%20мерный%20проект%20в%20виде%20CSDR-2.png)

<h3>Код</h3>

Код принято делать в виде соответствующих 7-и массивов:

```php
$project['Параметры']   = [...];
$project['Конструкции'] = [...];
$project['Рефлексы']    = [...];
$project['Места']       = [...];
$project['Связи']       = [...];
$project['Реакции']     = [...];
$project['Процессор']   = [...];
```

**Параметры** принято делать в готовом массиве:

```php
$project['Параметры'] = [
    'Название' => 'Название проекта',
    'Версия' => '{correct fix}',
    'Технологии'  => ['{Технология 1}', '{Технология 2}']
];
```

> Где, название это название Вашего проекта.
> 
> Где, в версии {correct fix} это номер зафиксированной корректировки/бага.
> 
> Где, технологии в массиве перечисляют требования к предустановленным технологиям устройства, на котором будет запущен проект.

**Конструкции** принято делать последовательно:

```php
$project['Конструкции'] = [
    '1' => [
        'Назначение'    => 'Назначение 1',
        'Предпочтение'  => 'Предпочтение 1',
        'Условия'       => ['{reflex_1}'],
    ],
    '2' => [
        'Назначение'    => 'Назначение 2',
        'Предпочтение'  => 'Предпочтение 2',
        'Условия'       => ['{reflex_1.1}','{reflex_1.1.1}','{reflex_1.1.2}'],
    ]
];
```

> Где, назначение это ключевое слово конструкции.
>
> При этом, id рефлексов добавляются в условия тогда, когда проектируются рефлексы.

> Где, предпочтение содержит всю информацию о необходимости конструкции.

> Где, условия это массив id рефлексов, которые созданы для конструкции.

**Рефлексы** принято делать со вложением:

```php
$project['Рефлексы'] = [
    '1' => [
        'Ориентир'   => 'Рефлекс 1',
        'Расчёты'    => 'Описание 1',
        'Сценарий'   => ['{place_id_1.1}','{place_id_1.2}'],
        'Права'      => 'Код условия 1',
        'Вложение'   => [
            '1.1' => [
                'Ориентир'   => 'Рефлекс 2',
                'Расчёты'    => 'Описание 2',
                'Сценарий'   => [['{place_id_3.2.1}' => '{reflex_1.1.1}'],'{place_id_3.2.2}'],
                'Права'      => 'Код условия 2',
                'Вложение'   => [
                     '1.1.1' => [
                           'Ориентир'   => 'Рефлекс 3',
                           'Расчёты'    => 'Описание 3',
                            'Сценарий'   => ['{place_id_4}'],
                            'Права'      => false,
                            'Вложение'   => false
                     ],
                ]
            ],
        ]
    ]
];
```

> Каждый вложенный рефлекс будет автоматически активан (запустится сценарий),  в зависимости от проверки прав.

> Где, в сценарии указываются id мест для последовательной активации: array({place_id_1}, {place_id_2}, {place_id_3}, ...).
>
> При этом, id мест добавляются в сценарий тогда, когда проектируются места, в нужной для этого последовательности.
>
> При этом, если у роли id места сценарий со вложением, то нужно указать id рефлекса в таком виде: array({place_id_1} => {reflex_id_3.2}).


> Где, в права можно добавить код условия (то что заключается в if) для активации сценария. 
> 
> Конструкция: array('вместилище'=>array('вместилище'=>['значение 1','оператор','значение 2'],'вместилище'=>['значение 1','оператор','значение 2']))
> 
> Где, вместилище: 
> 1. для обозначения условия - число
> 2. для обозначения сопоставления "OR" - 'variation'
> 3. для обозначения сопоставления "AND" - 'constant'
> 
> Где, значение 1 и 2: 
> 1. предполагаемое значение места
> 2. значение из места - '{place_id}'
> 3. текст
> 
> Где, оператор: 
> 1. равенство - '='
> 2. больше - '>'
> 3. равно либо больше - '>='
> 4. не равно - '!='
> 5. значение 1 есть в массиве значения 2 - 'in'
> 6. значения 1 нет в массиве значения 2 - 'not in'
>
>> где в п. 5 и п. 6 значение 2 может иметь: 
>> 1. текст
>> 2. варианты текстов в массиве
>>
>> При этом, текст может содержать в начале или конце знак "%", что будет означать любое кол-во символов
> 
> При этом, вложенность может быть:
> 1. для одного условия: array('число'=>['значение 1','оператор','значение 2'])
> 2. много-вложенным: array('variation'=>array( 'число'=>['значение 1','оператор','значение 2'], 'constant'=>array( 'число'=>['значение 1','оператор','значение 2'], 'число'=>['значение 1','оператор','значение 2'] )))
> 
> 
> При этом, обозначения (variation, constant) могут содержать добавочно на конце цифру:
> 
>     'variation'=> array(
>
>     'constant_1'=>array('число'=>['значение 1','оператор','значение 2'],'число'=>['значение 1','оператор','значение 2']),
>
>     'constant_2'=>array('число'=>['значение 1','оператор','значение 2'],'число'=>['значение 1','оператор','значение 2'])
>
>      )

**Места** принято делать со вложением:

```php
$project['Места']    = [
    '1' => [
        'Смысл'    => 'Описание 1',
        'Роль'     => ['Тип роли 1'=>['Название роли 1'=>'Команда роли 1']],
        'Связь'    => 'Наличие связи 1',
        'Реакция'  => 'Наличие реакции 1',
        'Вложение' => [
            '1.1' => [
                'Смысл'    => 'Описание 2',
                'Роль'     => ['Тип роли 2'=>['Название роли 2'=>'Команда роли 2']],
                'Связь'    => 'Наличие связи 2',
                'Реакция'  => 'Наличие реакции 2',
                'Вложение' => [
                    '1.1.1' => [
                        'Смысл'    => 'Описание 3',
                        'Роль'     => ['Тип роли 3'=>['Название роли 3'=>'Команда роли 3']],
                        'Связь'    => 'Наличие связи 3',
                        'Реакция'  => 'Наличие реакции 3',
                        'Вложение' => false,
                     ],
                    '1.1.2' => [
                        'Смысл'    => 'Описание 4',
                        'Роль'     => ['Тип роли 4'=>['Название роли 4'=>'Команда роли 4']],
                        'Связь'    => 'Наличие связи 4',
                        'Реакция'  => 'Наличие реакции 4',
                        'Вложение' => false,
                     ],
                ],
            ],
        ]
    ]
];
```

> Подробнее о <a href="#Роли">ролях</a>

**Связи** принято делать последовательно:

```php
$project['Связи']    = [
    '1'  => [
        'Тип'                 => 'Внутренняя',
        'Возможности'         => ['Номер места 1'=>'Обозначение 1', 'Номер места 2'=>'Обозначение 2'],
        'Образец возможностей' => [
            'Обозначение 1' => 'Пример 1',
            'Обозначение 2' => 'Пример 2'
        ],
        'Реакция'             => 'Наличие реакции 1'
    ],
    '2'  => [
        'Тип'                 => 'Внешняя',
        'Возможности'         => ['Обозначение 4'=>'Номер места 4'],
        'Образец возможностей' => [
            'Обозначение 4' => 'Пример 4',
        ],
        'Реакция'             => 'Наличие реакции 2'
    ],
];
```

> Где, тип можно задать внутреним и внешним. 
> 
> Где, в возможности можно добавить массив для импорта значений переменных ({откуда 1} => {куда 1}, {откуда 2} => {куда 2}). 
>
> При этом, если нет: null. 
>
> Где, образцы указываются для тестируемости проекта. 

**Реакции** принято делать последовательно:

```php
$project['Реакции']    = [
    '1'  => [
        'Начальные данные' => 'Массив начальных данных после активации связи 1',
        'Способность'  => function($opportunities = []){

            /*получаем значения переменных*/
            $var_1 = $opportunities['Обозначение 1'];
            $var_2 = $opportunities['Обозначение 2'];
            
            /*выполняем трансмутацию*/
            
            $var_new = $var_1 + $var_2;
            
            /*результат*/
            return [
                'Обозначение 3' => $var_new,
            ];
        },
        'Результативные данные' => 'Массив результативных данных после выполнения способности 1'
    ],
    '2'  => [
        'Начальные данные' => 'Массив начальных данных после активации связи 2',
        'Способность'  => function($opportunities = []){

            /*получаем значения переменных*/
            $var_1 = $opportunities['Обозначение 1'];
            $var_2 = $opportunities['Обозначение 2'];
            
            /*выполняем трансмутацию*/
            
            if($var_1 == 1){
                $var_new = $var_2;
            }
            else{
                $var_new = false;
            }
            
            /*результат*/
            return [
                'Обозначение 3' => $var_new,
            ];
        },
        'Результативные данные' => 'Массив результативных данных после выполнения способности 2'
    ],
];
```

> Где, в $opportunities будет информация из начальных данных. 
> 
> Где, return добавит информацию в результативные данные. 

**Процессор**:

```php
$project['Процессор'] = function(){
/*функция процессора*/
};
```

<h3>Роли</h3>

Роли это готовые проекты, созданные согласно коду CSDR. Вам это знакомо как модули с проработанным api. 

Обозначаются роли типом, названием (и набором команд).

**Типизация роли** нужна для узко-направленного проектирования:
1. Хранение
> форма вмещения
> 
> где, варианты вложения: 
> 1. Нет
> 2. Есть, другие роли (шаблон)
>
> где, варианты связи:
> 1. Нет
>
> где, варианты реакции:
> 1. Нет
2. Содержание
> значения формы
> 
> где, варианты вложения: 
> 1. Есть, текст (шаблон)
> 2. Есть, массив (шаблон)
>
> где, варианты связи:
> 1. Нет
>
> где, варианты реакции:
> 1. Нет
3. Вычисление
> создание содержания
> 
> где, варианты вложения: 
> 1. Нет
>
> где, варианты связи:
> 1. Нет
>
> где, варианты реакции:
> 1. Есть, редактируемая способность
> 2. Есть, не редактируемая способность
4. Контроль
> отдача и получение содержания
> 
> где, варианты вложения: 
> 1. Нет
>
> где, варианты связи:
> 1. Есть, внутренняя
> 2. Есть, внешняя
>
> где, варианты реакции:
> 1. Нет

**Название роли** может обозначать объект, так и субъект.

**Команда роли** предназначена для определенного действия. У роли их может быть несколько, или ни одной.

**Код используемых ролей** нужно размещать в функции процесса в отмеченном месте.

```php
$project['Процессор'] = function($opportunities = []){

...
            /*code roles - start*/
            $roles = [
              'Хранение'   => [...],
              'Содержание' => [...],
              'Вычисление' => [...],
              'Контроль'   => [...],
            ];
            /*code roles - end*/
...
}
```

Для базового проектирования (проектов или новых ролей) нужны такие **роли**:

1. Хранение: всего
> благодаря которой проект сможет капсулировать роли
2. Содержание: всего
> благодаря которой проект сможет запоминать информацию
3. Вычисление: всего
> благодаря которой проект сможет выполнять логику
4. Контроль: запросов: получения, передачи
> благодаря которой проект сможет взаимодействовать с внешними конструкциями
5. Контроль: реакций: получения, передачи
> благодаря которой проект сможет взаимодействовать с внутренними реакциями

Пример (<a target="_blank" href="https://github.com/it-architector/code.csdr/blob/master/%D0%9A%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8/%D0%92%D0%B7%D0%B0%D0%B8%D0%BC%D0%BE%D0%B4%D0%B5%D0%B9%D1%81%D1%82%D0%B2%D0%B8%D0%B5%20%D1%8F%D0%B4%D1%80%D0%B0.png?raw=true">открыть в отдельном окне</a>):

![---------------------](./Картинки/Взаимодействие%20ядра.png)

![---------------------](./Картинки/hr.png)

<h2>Образец проектов на PHP</h2>

<h3>Роли</h3>

Создадим для ядра такие роли:

1. Вместилище // варианты: 
    - Для любого вложения: all
        > Размещение:
        > нет.
2. Запрос // варианты: 
    - Для активации реакции: reaction
        > Размещение:
        > 1. локальная связь для передачи значений в реакцию и распределения результата по местам.
        > 2. реакция
    - Для распределения массива: distribution
        > Размещение:
        > 1. локальная связь для распределения значений из массива по местам.
        > 2. в возможностях связи массив обозначить как "array".
        > 3. в сценарии активация места этой роли может содержать вложение для активации мест (и рефлексов) при обходах массива.
3. Ожидание // варианты: 
    - Для получения значений с post(get) и отдачи ответа: request
        > Размещение:
        > 1. глобальная связь для получения значений из post(get) и ответа в интерфейс.
        > 2. в сценарии активация места этой роли может содержать вложение активаций мест (и рефлексов) до отправки ответа.
5. Атрибут // варианты: 
    - Для хранения информации: information
        > Размещение:
        > 1. во вложении места с этой ролью будет значение переменной.

<h3>Взаимодействие</h3>

Установим цель такую: на внешний запрос ("x" и "y") выдать результат "z", рассчитанный по формуле x + y = z.

Спланируем проект (стрелками обозначим влияние / активацию):

![](./Картинки/Планировка%20php%20проекта-2.png)

<a href="https://www.youtube.com/watch?v=SW-4kUMS27M&feature=youtu.be">Видео планировки</a>

Результат: <a href="./PHP/Взаимодействие.php">Код взаимодействия</a> (<a href="https://framework-csdr.ru/samples/PHP/Взаимодействие.php?x=2&y=6">запустить вариант 2 + 6</a>).

<h3>Многопоточность</h3>

Ход работы: На вход дадим массив из вариантов "x" и "y" и последовательно выведем результат в ответ.

Результат: <a href="./PHP/Многопоточность.php">Код многопоточности</a> (<a href="https://framework-csdr.ru/samples/PHP/Многопоточность.php?data_x_y[1][x]=3&data_x_y[1][y]=7&data_x_y[2][x]=12&data_x_y[2][y]=5&data_x_y[3][x]=6&data_x_y[3][y]=6">запустить вариант (3 + 7, 12 + 5, 6 + 6)</a>).

<h3>Вариантность</h3>

Ход работы: На вход дадим переменную "kill" и в зависимости от её значения дадим ответ.

Результат: <a href="./PHP/Вариантность.php">Код вариантности</a> (<a href="https://framework-csdr.ru/samples/PHP/Вариантность.php?kill=false">запустить вариант kill=false</a>, <a href="https://framework-csdr.ru/samples/PHP/Вариантность.php?kill=true">вариант kill=true</a>).

![---------------------](./Картинки/hr.png)

<h2>Образец проектов на JS</h2>

<h3>Роли</h3>

Создадим для интерфейса такие роли:

1. Вместилище // варианты: 
    - Для любого вложения: all
        > Размещение:
        > ни на что не влияет (необходимо для общего обозначения внутреннего содержимого)
    - Для информации (чтобы innerHTML не сбивала внутреннии тэги): text
        > Размещение:
        > 1. во вложении возможно разметить лишь атрибут со значением information.
    - Для html тэгов: перечислены здесь https://html5book.ru/examples/html-tags.html
        > Размещение:
        > 1. будет создан тэг в родительском тэге.
2. Запрос // варианты: 
    - Для активации реакции: reaction
        > Размещение:
        > 1. локальная связь для передачи значений в реакцию и распределения результата по местам.
        > 2. реакция.
    - Для распределения массива: distribution
        > Размещение:
        > 1. локальная связь для распределения значений из массива по местам.
        > 2. в возможностях связи массив обозначить как "array".
        > 3. в сценарии активация места этой роли может содержать вложение для активации мест (и рефлексов) при обходах массива.
        > 4. для вложенных тэгов конец id будет дополняться id с массива.
4. Ожидание // варианты: 
    - Для получения значений запроса от браузера: request
        > Размещение:
        > 1. глобальная связь с возможностями (url,anchor,parameters(разбор get)), приобретения = null.
        > 2. в сценарии активация места этой роли может содержать вложение активаций мест (и рефлексов) до отправки ответа.
    - Для кликанья мышкой: click
        > Размещение:
        > 1. глобальная связь с возможностями (разбор атрибутов), приобретения (url или null).
        > 2. в сценарии активация места этой роли может содержать вложение для активации мест (и рефлексов) при клике.
    - Для подвода мышки: hover
        > Размещение:
        > 1. глобальная связь с возможностями (разбор атрибутов), приобретения = null.
        > 2. в сценарии активация места этой роли может содержать вложение для активации мест (и рефлексов) при подводе.
    - Для отвода мышки: abduction
        > Размещение:
        > 1. глобальная связь с возможностями (разбор атрибутов), приобретения = null.
        > 2. в сценарии активация места этой роли может содержать вложение для активации мест (и рефлексов) при отводе.
5. Атрибут // варианты: 
    - Для хранения информации: information
        > Размещение:
        > 1. во вложении места с этой ролью будет значение переменной.
        > 2. вложение при активации будет отображено в родительском тэге.
    - Для очистки от внутреннего выстроенного DOM: clear
        > Размещение:
        > 1. применяется для родительского тэга.
    - Для установки стиля: style
        > Размещение:
        > 1. применяется для родительского тэга.
        > 2. во вложении стили перечислять массивом: {{'имя 1':'значение 1'},{'имя 2':'значение 2'}}
    - Для атрибутов html тэгов: перечислены здесь http://on-line-teaching.com/html/lsn031.html
        > Размещение:
        > 1. применяется для родительского тэга.

<h3>Контроль</h3>

 - развёртка html
 - наполнение содержимым
 - установка стиля
 - установка favicon
 - смена текста по нажатию на тэг
 - показ подсказки по наведению (и отведению) на тэг

Результат: <a href="./JS/Контроль.html">Код контроля</a> (<a href="https://framework-csdr.ru/samples/JS/Контроль.html">открыть на хостинге</a>).

<h3>Многопоточность</h3>

Ход работы: На вход дадим массив с вариантами "id" и "текст" и последовательно на основе полученных данных выведем ссылки в браузер.

Результат: <a href="./JS/Многопоточность.html">Код многопоточности</a> (<a href="https://framework-csdr.ru/samples/JS/Многопоточность.html">открыть на хостинге</a>).

<h3>Вариантность</h3>

Ход работы: Выведем ссылки меню и в зависимости от "id" из браузера активируем открытую ссылку из меню.

Результат: <a href="./JS/Вариантность.html">Код вариантности</a> (<a href="https://framework-csdr.ru/samples/JS/Вариантность.html">открыть на хостинге</a>).

<h3>Навигация</h3>

Ход работы: Выведем ссылки меню и в зависимости от "id" из браузера активируем открытую ссылку из меню, без перезагрузки страницы, но меняя открытую ссылку в браузере.

Результат: <a href="./JS/Навигация.html">Код навигации</a> (<a href="https://framework-csdr.ru/samples/JS/Навигация.html">открыть на хостинге</a>).

<h3>Реакция pagespeed</h3>

Для тестирования у <a href="https://developers.google.com/speed/pagespeed/insights/?url=https%3A%2F%2Fframework-csdr.ru%2F">google pagespeed</a> была создана стандартная страница, со всеми графическим наворотами: https://framework-csdr.ru/index.html

Результат проверки:

![](./Картинки/pagespeed/pagespeed_1.png)

![](./Картинки/pagespeed/pagespeed_3.png)

![](./Картинки/pagespeed/pagespeed_2.png)

![](./Картинки/pagespeed/pagespeed_4.png)

![---------------------](./Картинки/hr.png)

<h2>Ссылки</h2>

Материал по теме: 

![](./Картинки/Общение.png) <a target="_blank" href="https://www.youtube.com/watch?v=VgH-R3puQes">Ефим Гринкруг: что такое программная инженерия / проектирование</a><br>
![](./Картинки/Общение.png) <a target="_blank" href="https://www.youtube.com/watch?v=fwlNqJudtHk">Юлия Пучнина: использование компонентной архитектуры в веб-приложениях / архитектирование</a><br>
![](./Картинки/Общение.png) <a target="_blank" href="https://www.youtube.com/watch?v=mc7EMdyawBk">Игорь Алексеенко: классические приёмы программирования во фронтенде / дизайнирование</a><br>

Проект поддерживают:

![](./Картинки/поддержка/phpstorm.png) <a target="_blank" href="https://www.jetbrains.com/?from=framework+csdr">JetBrains PhpStorm</a><br>
