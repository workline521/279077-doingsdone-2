<div class="content">
    <section class="content__side">
        <h2 class="content__side-heading">Проекты</h2>

        <nav class="main-navigation">
            <ul class="main-navigation__list">
                <?php foreach ($data['projects'] as $value => $project): ?>
                    <li class="main-navigation__list-item <?= ($value == $_GET['project_id']) ? 'main-navigation__list-item--active' : ''?> ">
                        <a class="main-navigation__list-item-link" href="index.php?project_id=<?= $value ?>"><?= htmlspecialchars($project) ?></a>
                        <span class="main-navigation__list-item-count"><?= calculateTasks($data['task_list'], $project); ?></span>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>

        <a class="button button--transparent button--plus content__side-button" href="#">Добавить проект</a>
    </section>
    <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

        <form class="search-form" action="index.php" method="post">
            <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

        <div class="tasks-controls">
            <div class="radio-button-group">
                <label class="radio-button">
                    <input class="radio-button__input visually-hidden" type="radio" name="radio" checked="">
                    <span class="radio-button__text">Все задачи</span>
                </label>

                <label class="radio-button">
                    <input class="radio-button__input visually-hidden" type="radio" name="radio">
                    <span class="radio-button__text">Повестка дня</span>
                </label>

                <label class="radio-button">
                    <input class="radio-button__input visually-hidden" type="radio" name="radio">
                    <span class="radio-button__text">Завтра</span>
                </label>

                <label class="radio-button">
                    <input class="radio-button__input visually-hidden" type="radio" name="radio">
                    <span class="radio-button__text">Просроченные</span>
                </label>
            </div>

            <label class="checkbox">
                <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox" checked>
                <span class="checkbox__text">Показывать выполненные</span>
            </label>
        </div>

        <table class="tasks">
            <?php foreach ($data['filtered_tasks'] as $task_value): ?>
                <tr  class="tasks__item task <?= ($task_value['completed'] == true) ? 'task--completed' : '' ?> ">
                    <td class="task__select">
                        <label class="checkbox task__checkbox">
                            <input class="checkbox__input visually-hidden" type="checkbox">
                            <span class="checkbox__text"><?= htmlspecialchars($task_value['task']) ?></span>
                        </label>
                    </td>

                    <td class="task__date">
                        <?= htmlspecialchars($task_value['deadline']) ?>
                    </td>

                    <td class="task__controls">
                        <button class="expand-control" type="button" name="button">Выполнить первое задание</button>

                        <ul class="expand-list hidden">
                            <li class="expand-list__item">
                                <a href="#">Выполнить</a>
                            </li>

                            <li class="expand-list__item">
                                <a href="#">Удалить</a>
                            </li>

                            <li class="expand-list__item">
                                <a href="#">Дублировать</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </main>
</div>