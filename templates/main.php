<?php

?>
<section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                    <?php foreach ($projects as $key => $val): ?>
                        <li class="main-navigation__list-item<?=$project_id === $val["id"] ? " main-navigation__list-item--active" : "" ?>">

                            <a class="main-navigation__list-item-link" href="/?project_id=<?=$val["id"]?>"><?=htmlspecialchars($val["name_project"]);?></a>
                            <span class="main-navigation__list-item-count"><?= count_project($tasks, $val["id"]);?></span>
                        </li>
                        <?php $index++;
                         ?>
                    <?php endforeach; ?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
            </section>

            <main class="content__main">
                <h2 class="content__main-heading">Список задач </h2>

                <form class="search-form" action="index.php" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->

                        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if ($show_complete_tasks==1): ?> checked <?php endif; ?>>
                        <span class="checkbox__text">Показывать выполненные</span>

                    </label>
                </div>

                <table class="tasks">


                <?php foreach ($tasks as $key => $val): ?>
                    <?php if ($show_complete_tasks==1 && $val["task_status"]==0 ||
                    $show_complete_tasks==0 && $val["task_status"]==1 ||
                $project_id !== "" && $val["project_id"] !== $project_id ): continue ?><?php endif; ?>
                    <?php $res = get_time_left (htmlspecialchars($val["date_finish"]))?>
                    <tr class="tasks__item<?php if ($res[0]<= 24) : ?> task--important <?php endif; ?> ">
                        <td class="task__select  <?php if ($val["task_status"]==true): ?>task--completed"<?php endif; ?>>
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" <?php if ($val["task_status"]==1): ?>checked<?php endif; ?>>
                                <span class="checkbox__text "><?=htmlspecialchars($val["task_name"]); ?>"</span>
                            </label>
                        </td>

                        <td class="task__file">
                            <a class="download-link" href="#"><?=htmlspecialchars($val["task_file"]); ?></a>
                        </td>

                        <td class="task__date"><?=htmlspecialchars(get_normal_date($val["date_finish"])); ?></td>


                        <td class="task__controls"></td>
                    </tr>
                <?php endforeach; ?>
               <!--     <?php if ($show_complete_tasks == 1): ?>
                    <tr class="tasks__item task task--completed">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                            <input class="checkbox__input visually-hidden" type="checkbox" checked>
                            <span class="checkbox__text">Записаться на интенсив "Базовый PHP"</span>
                            </label>
                        </td>
                        <td class="task__date">10.10.2019</td>

                        <td class="task__controls"></td>
                    </tr>
                    <?php endif; ?> -->
                    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
                </table>
            </main>

