<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];


//возвращает массив из разделённых ФИО
function getPartsFromFullname($string)
{
    $array_keys = ['surname', 'name', 'patronomyc'];
    $array_values = explode(' ', $string);
    return array_combine($array_keys, $array_values);
}


//аргументы склеенные в строку через пробел
function getFullnameFromParts($surname, $name, $patronomyc)
{
    return $surname . ' ' . $name . ' ' . $patronomyc;
}


//Сокращенное ФИО
function getShortName($string)
{
    $array = getPartsFromFullname($string);
    return $array['name'] . ' ' . mb_substr($array['surname'], 0, 1) . '.';
}
// ...


// принимает строку ФИО, возвращает 1 (мужчина), -1 (женщина) или 0 (пол не определён)
function getGenderFromName($string)
{
    $sex_sign = 0;
    $array = getPartsFromFullname($string);
    if (mb_substr($array['patronomyc'], -3) === 'вна') {
        $sex_sign--;
    } else if (mb_substr($array['name'], -1) === 'а') {
        $sex_sign--;
    } else if (mb_substr($array['surname'], -2) === 'ва') {
        $sex_sign--;
    } else if (mb_substr($array['patronomyc'], -2) === 'ич') {
        $sex_sign++;
    } else if (
        mb_substr($array['name'], -1) === 'й' ||
        mb_substr($array['name'], -1) === 'н'
    ) {
        $sex_sign++;
    } else if (mb_substr($array['surname'], -1) === 'в') {
        $sex_sign++;
    }

    return $sex_sign <=> 0;
}


?> 
</body>
</html>


