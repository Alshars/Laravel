@extends('layouts.admin')
@section('title', 'Заказы')

@section('content')
    <?php $orders = new \App\Models\Post() ?>
<?php
/* Все варианты сортировки */
$sort_list = array(
	'created_at_asc'   => '`created_at`',
	'created_at_desc'  => '`created_at` DESC',
	'updated_at_asc'  => '`updated_at`',
	'updated_at_desc' => '`updated_at` DESC',
    'status_asc' => '`status`',
    'status_desc' => '`status` DESC',
);

/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
	$sort_sql = $sort_list[$sort];
} else {
	$sort_sql = reset($sort_list);
}

/* Запрос в БД */
$dbh = new PDO('mysql:dbname=app;host=localhost', 'root', 'root');
$sth = $dbh->prepare("SELECT * FROM `posts` ORDER BY {$sort_sql}");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

/* Функция вывода ссылок */
function sort_link_bar($title, $a, $b) {
	$sort = @$_GET['sort'];

	if ($sort == $a) {
		return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>↑</i></a>';
   	} elseif ($sort == $b) {
		return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>↓</i></a>';
	} else {
		return '<a href="?sort=' . $a . '">' . $title . '</a>';
	}
}
?>
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Статьи</h3>
        <div class="sort-bar">
            <div class="sort-bar-title">Сортировать по:</div>
            <div class="sort-bar-list">
                <?php echo sort_link_bar('Статус', 'status_asc', 'status_desc'); ?>
                <?php echo sort_link_bar('Дата создания', 'created_at_asc', 'created_at_desc'); ?>
                <?php echo sort_link_bar('Дата обновления', 'updated_at_asc', 'updated_at_desc'); ?>
            </div>
        </div>


        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Заголовок</th>
                                <th>Краткое описание</th>
                                <th>Статус</th>
                                <th>Дата создания</th>
                                <th>Дата обновления</th>
                                <th>Кнопки</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list as $row): ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['preview']; ?></td>
                                <td>
                                    @foreach ($orders::STATUSES as $key => $value)
                                        @if ($row['status'] == $key && $key == 1)
                                            <span class="text-danger">{{ $value }}</span>
                                        @elseif ($row['status'] == $key && $key == 2)
                                            <span class="text-success">{{ $value }}</span>
                                        @endif
                                    @endforeach
                                </td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['updated_at']; ?></td>
                                <td>
                                    @foreach ($orders::STATUSES as $key => $value)
                                        @if ($row['status'] == $key && $key == 1)
                                            <button type="button" class="btn btn-primary"><a href="{{ route("admin.posts.edit", $row['id']) }}" class="text-decoration-none text-reset">Редактировать</a></button><br>
                                            <button type="button" class="btn btn-info"><a href="{{ route("admin.posts.show", $row['id']) }}" class="text-decoration-none text-reset">Подробнее</a></button>
                                        @elseif ($row['status'] == $key && $key == 2)
                                            <button type="button" class="btn btn-info"><a href="{{ route("admin.posts.show", $row['id']) }}" class="text-decoration-none text-reset">Подробнее</a></button>
                                        @endif
                                    @endforeach
                                </td>

                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>

@endsection
