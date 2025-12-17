<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$values = [
    'full_name' => '',
    'email' => '',
    'age' => '',
    'city' => '',
    'gender' => '',
    'hobbies' => [],
    'study_format' => '',
    'language' => '',
    'newsletter' => '',
    'comment' => '',
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $default) {
        if ($key === 'hobbies') {
            $values[$key] = isset($_POST[$key]) ? (array)$_POST[$key] : [];
        } else {
            $values[$key] = trim($_POST[$key] ?? '');
        }
    }
}
?>
<div class="card">
    <h1>ЛР1 — Анкета (Упражнение 5)</h1>
    <p>Заполните форму. Результат обработки будет показан на отдельной странице action.php.</p>
    <form method="post" action="action.php" class="grid">
        <div>
            <label for="full_name">ФИО</label>
            <input id="full_name" name="full_name" required value="<?php echo htmlspecialchars($values['full_name']); ?>" />
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required value="<?php echo htmlspecialchars($values['email']); ?>" />
        </div>
        <div>
            <label for="age">Возраст</label>
            <input id="age" type="number" min="0" name="age" value="<?php echo htmlspecialchars($values['age']); ?>" />
        </div>
        <div>
            <label for="city">Город</label>
            <select id="city" name="city">
                <?php
                $cities = ['Москва', 'Санкт-Петербург', 'Казань', 'Новосибирск', 'Другое'];
                foreach ($cities as $city) {
                    $sel = $values['city'] === $city ? 'selected' : '';
                    echo "<option $sel>" . htmlspecialchars($city) . "</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label>Пол</label>
            <div class="button-row">
                <?php foreach (['Мужской', 'Женский'] as $gender): ?>
                    <label><input type="radio" name="gender" value="<?php echo htmlspecialchars($gender); ?>" <?php echo $values['gender'] === $gender ? 'checked' : ''; ?> /> <?php echo htmlspecialchars($gender); ?></label>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <label>Увлечения</label>
            <div class="button-row">
                <?php foreach (['Спорт', 'Музыка', 'Программирование', 'Путешествия'] as $hobby): ?>
                    <label><input type="checkbox" name="hobbies[]" value="<?php echo htmlspecialchars($hobby); ?>" <?php echo in_array($hobby, $values['hobbies'], true) ? 'checked' : ''; ?> /> <?php echo htmlspecialchars($hobby); ?></label>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <label for="study_format">Формат обучения</label>
            <select id="study_format" name="study_format">
                <?php foreach (['Очный', 'Заочный', 'Дистанционный'] as $format): ?>
                    <option <?php echo $values['study_format'] === $format ? 'selected' : ''; ?>><?php echo htmlspecialchars($format); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="language">Любимый язык программирования (новый вопрос)</label>
            <input id="language" name="language" value="<?php echo htmlspecialchars($values['language']); ?>" placeholder="PHP, Python, C#..." />
        </div>
        <div>
            <label for="newsletter">Хотите получать рассылку? (новый вопрос)</label>
            <select id="newsletter" name="newsletter">
                <?php foreach (['Да', 'Нет'] as $choice): ?>
                    <option <?php echo $values['newsletter'] === $choice ? 'selected' : ''; ?>><?php echo htmlspecialchars($choice); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div style="grid-column: 1 / -1;">
            <label for="comment">Комментарий</label>
            <textarea id="comment" name="comment" rows="3"><?php echo htmlspecialchars($values['comment']); ?></textarea>
        </div>
        <div>
            <button type="submit">Отправить</button>
        </div>
    </form>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
