if (isset($_POST['ServiceName']) && isset($_POST['ServicePrice']) && isset($_POST['ServiceReSub'])){
    // Переменные с формы
    $ServiceName = $_POST['ServiceName'];
    $ServicePrice = $_POST['ServicePrice'];
    $ServiceReSub = $_POST['ServiceReSub'];
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "user"; // Логин БД
    $db_password = "123"; // Пароль БД
    $db_base = 'SubscriptionDB'; // Имя БД
    $db_table = "Subscriptions"; // Имя Таблицы БД
    
    try {
        // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data = array( 'ServiceName' => $ServiceName, 'ServicePrice' => $ServicePrice, 'ServiceReSub' => $ServiceReSub ); 
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO $db_table (ServiceName, ServicePrice, ServiceReSub) values (:ServiceName, :ServicePrice, :ServiceReSub)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
    	echo "Успех. Информация занесена в базу данных";
    }
}