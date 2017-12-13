<?php

function includeTemplate(string $path, array $data = []): string
{
    if (!file_exists($path)) {
        return '';
    }
    ob_start();
    require_once $path;
    return ob_get_clean();
}
function calculateTasks(array $task_list, string $project): int
{
    if ($project == 'Все') {
        return count($task_list);
    }
    $count = 0;
    foreach ($task_list as $task_value) {
        if ($task_value['category'] == $project) {
            $count++;
        }
    }
    return $count;
}

?>