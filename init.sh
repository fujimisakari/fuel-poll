#!/bin/bash

echo "##### Initialize Start #####"

source .env
# echo "DROP DATABASE IF EXISTS $DB_NAME;" | mysql -u$DB_USER -p$DB_PASS -h $DB_HOST
echo "CREATE DATABASE IF NOT EXISTS $DB_NAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;" | mysql -u$DB_USER -p$DB_PASS -h $DB_HOST
php oil r migrate

echo "insert into todo_categories values (1, 'todo', '2017-01-11 00:00:00', '2017-01-11 00:00:00'), (2, 'do', '2017-01-11 00:00:00', '2017-01-11 00:00:00'), (3, 'done', '2017-01-11 00:00:00', '2017-01-11 00:00:00');" | mysql -u$DB_USER -p$DB_PASS $DB_NAME -h $DB_HOST

php oil r cache:update

echo "##### Initialize Done #####"
