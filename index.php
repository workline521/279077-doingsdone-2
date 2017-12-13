<?php
$projects = ['Все', 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$interview = [
    'task' => 'Собеседование в IT компании',
    'deadline' => '01.06.2018',
    'category' => 'Работа',
    'completed' => false
];
$test = [
    'task' => 'Выполнить тестовое задание',
    'deadline' => '25.05.2018',
    'category' => 'Работа',
    'completed' => false
];
$finished_task = [
    'task' => 'Сделать задание первого раздела',
    'deadline' => '21.04.2018',
    'category' => 'Учеба',
    'completed' => true
];
$meeting = [
    'task' => 'Встреча с другом',
    'deadline' => '22.04.2018',
    'category' => 'Входящие',
    'completed' => false
];
$catfood = [
    'task' => 'Купить корм для кота',
    'deadline' => null,
    'category' => 'Домашние дела',
    'completed' => false
];
$pizza = [
    'task' => 'Заказать пиццу',
    'deadline' => null,
    'category' => 'Домашние дела',
    'completed' => false
];
$task_list = [$interview, $test, $finished_task, $meeting, $catfood, $pizza];
$filtered_tasks = $task_list;

if (isset($_GET['project_id'])) {
    $projectId = (int) $_GET['project_id'];
    $filtered_tasks = [];
    if ($projectId == 0) {
        $filtered_tasks = $task_list;
    } else {
                if (!isset($projects[$projectId])) {
                        header("HTTP/1.1 404 Not Found");
                        die('Страница не найдена');
                }

       $project = $projects[$projectId];

       foreach ($task_list as $task) {
            if ($task['category'] == $project) {
            $filtered_tasks[] = $task;
            }
       }
    }
 }
include('functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<?= includeTemplate("templates/head.php", []); ?>

<body><!--class="overlay"-->
<h1 class="visually-hidden">Дела в порядке</h1>

<div class="page-wrapper">
    <div class="container container--with-sidebar">
        <?= includeTemplate("templates/header.php", []); ?>
        <?= includeTemplate("templates/main.php", ['projects' => $projects, 'task_list' => $task_list, 'filtered_tasks' => $filtered_tasks]); ?>
    </div>
</div>

<?= includeTemplate("templates/footer.php", []); ?>

<div class="modal" hidden>
    <button class="modal__close" type="button" name="button">Закрыть</button>

    <h2 class="modal__heading">Добавление задачи</h2>

    <form class="form" action="index.html" method="post">
        <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup></label>

            <input class="form__input" type="text" name="name" id="name" value="" placeholder="Введите название">
        </div>

        <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>

            <select class="form__input form__input--select" name="project" id="project">
                <option value="">Входящие</option>
            </select>
        </div>

        <div class="form__row">
            <label class="form__label" for="date">Дата выполнения <sup>*</sup></label>

            <input class="form__input form__input--date" type="text" name="date" id="date" value="" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
        </div>

        <div class="form__row">
            <label class="form__label" for="file">Файл</label>

            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="preview" id="preview" value="">

                <label class="button button--transparent" for="preview">
                    <span>Выберите файл</span>
                </label>
            </div>
        </div>

        <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Добавить">
        </div>
    </form>
</div>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
