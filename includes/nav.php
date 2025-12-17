<?php
return [
    [
        'title' => 'Главная',
        'url' => '/',
    ],
    [
        'title' => 'ЛР1',
        'url' => '/labs/lr1/index.php',
        'children' => [
            ['title' => 'Анкета', 'url' => '/labs/lr1/index.php'],
            ['title' => 'Обработчик', 'url' => '/labs/lr1/action.php'],
        ],
    ],
    [
        'title' => 'ЛР2',
        'url' => '/labs/lr2/ex2_1.php',
        'children' => [
            ['title' => 'Упр. 2.1', 'url' => '/labs/lr2/ex2_1.php'],
            ['title' => 'Упр. 2.2', 'url' => '/labs/lr2/ex2_2.php'],
            ['title' => 'Самостоятельная', 'url' => '/labs/lr2/self.php'],
        ],
    ],
    [
        'title' => 'ЛР3',
        'url' => '/labs/lr3/ex3_1_1.php',
        'children' => [
            ['title' => '3.1.1 Максимум', 'url' => '/labs/lr3/ex3_1_1.php'],
            ['title' => '3.1.2 Знак числа', 'url' => '/labs/lr3/ex3_1_2.php'],
            ['title' => '3.2 Викторина', 'url' => '/labs/lr3/ex3_2.php'],
            ['title' => '3.3.1 Таблица умножения', 'url' => '/labs/lr3/ex3_3_1.php'],
            ['title' => '3.3.2 Таблица Пифагора', 'url' => '/labs/lr3/ex3_3_2.php'],
            ['title' => '3.3.3 Квадраты четных', 'url' => '/labs/lr3/ex3_3_3.php'],
        ],
    ],
    [
        'title' => 'ЛР4',
        'url' => '/labs/lr4/ex4_1_1.php',
        'children' => [
            ['title' => '4.1.1 Массив', 'url' => '/labs/lr4/ex4_1_1.php'],
            ['title' => '4.1.2 Ассоциативный массив', 'url' => '/labs/lr4/ex4_1_2.php'],
            ['title' => '4.2.1 factorial()', 'url' => '/labs/lr4/ex4_2_1.php'],
            ['title' => '4.3 Файлы', 'url' => '/labs/lr4/ex4_3.php'],
        ],
    ],
    [
        'title' => 'КР',
        'url' => '/labs/kr/task1_quiz.php',
        'children' => [
            ['title' => 'Тест 1', 'url' => '/labs/kr/task1_quiz.php'],
            ['title' => '2.3 Автоморфные', 'url' => '/labs/kr/task2_3_automorph.php'],
            ['title' => '2.4 Табулирование', 'url' => '/labs/kr/task2_4_tab.php'],
            ['title' => '3.2 Палиндром', 'url' => '/labs/kr/task3_2_palindrome.php'],
        ],
    ],
];
