### Maintainability and linter status:
[![testLinter](https://github.com/Mikhail325/test-task-100sp/actions/workflows/testLinter.yml/badge.svg)](https://github.com/Mikhail325/test-task-100sp/actions/workflows/testLinter.yml)
<a href="https://codeclimate.com/github/Mikhail325/test-task-100sp/maintainability"><img src="https://api.codeclimate.com/v1/badges/06dbe3b43a600e25cb39/maintainability" /></a>

# Тестовое задание

## Минимальные требования
* Composer >= 2.2;
* PHP >= 8.1;
* GNU Make >= 4.3;
* PostgreSQL >= 14.8;

## Инструкции по установке

С клонируйте репозиторий с GitHub и перейдите в директорию проекта используя команды:
```
git clone https://github.com/Mikhail325/test-task-100sp.git
cd test-task-100sp
```
### Подключения БД к приложению

Заполните данные о БД в строку имеющий следующий формат:
{provider}://{user}:{password}@{host}:{port}/{db}
Выполните команду в терминале подставив получившуюся строку
```
export DATABASE_URL=postgresql://janedoe:mypassword@localhost:5432/mydb
```
Если отсувует переменая оккружения то заполните даные в файле config/database.ini

### Инструкции по установке и запуску

Для установки зависимостей используйте команду **make install**.
Для запуска программы используйте команду **make start** результат работы будет хранится в базе данных в таблицах type_purchases, purchases.
