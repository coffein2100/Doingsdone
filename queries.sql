/* наполнение БД*/
INSERT INTO users
  (email, user_name, user_password)
VALUES
('ilya-best85@yandex.ru','Илья','25087265'),
('test','Антон','секрет');

INSERT INTO projects
  (name_project, user_id)
VALUES
('ВХОДЯЩИЕ', 1),
('УЧЕБА', 1),
('РАБОТА',1),
('ДОМАШНИЕ ДЕЛА',1),
('АВТО',1),
('СПИСОК ПОКУПОК',2),
('НАКОПЛЕНИЯ',2),
('КРЕДИТЫ',2);

INSERT INTO tasks
  (task_status, task_name, task_file, date_finish, user_id, project_id)
VALUES
(0, 'Собеседование в IT компании',null, '2022-08-31', 1, 3),
(1, 'Выполнить тестовое задание',null, '2022-08-27', 1, 3),
(1, 'Сделать задание первого раздела',null, '2019-12-21', 1, 2),
(0, 'Встреча с другом',null, '2022-08-26', 1, 1),
(0, 'Купить корм для кота',null, null, 1, 4),
(0, 'Заказать пиццу',null, null, 1, 4),
(1, 'Купить хлеба',null, '2022-08-27', 2, 6),
(1, 'Купить молока',null, '2022-08-27', 2, 6),
(0, 'Накопить 150 000',null, '2023-08-27', 2, 7),
(0, 'Выплатить кредит на 50 000',null, '2023-03-20', 2, 8);

/* получить список из всех проектов для одного пользователя*/
SELECT name_project FROM projects WHERE user_id = 1;
SELECT name_project FROM projects WHERE user_id = 2;

/* получить список из всех задач для одного проекта*/
SELECT task_name,name_project FROM tasks t
JOIN projects p
ON t.project_id = p.id WHERE p.id = 3;

/* пометить задачу как выполненную*/
UPDATE tasks
SET task_status=1 where task_name ='Выплатить кредит на 50 000';

/* обновить название задачи по её идентификатору */
UPDATE tasks
SET task_name = 'Выплатить этот гребанный кредит на 50 000'
where id=20;
