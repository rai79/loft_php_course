<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'turistic');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QX>VV9izq /-vzb=t0BViMtD{5y#8S^&%^iEuS4-RmsMd=LT4^t4{|k[}(59rAZW');
define('SECURE_AUTH_KEY',  '>wkn[HU/N.55Bm#-h>WvqN#6<2P({cqC+,Z$ykIVl`z/,.j;!B;Rkef??#V|Y4)z');
define('LOGGED_IN_KEY',    'VD--(!(G|b^Kr.N3(p~aAE-1smE0U+5ig9bM>%O5hRflViLp9,vB*BD!Y<R;c.B@');
define('NONCE_KEY',        '30SE*=^<K<wh{(x) LPv!!eE<|L!XR:5}IGPm@So/A^edSI=UD3).N3s^Xb&;Gv)');
define('AUTH_SALT',        '9b.R3:GGKHbn[Htq+$BChTnFP_YnW0-O`B@svOq!FFJm$f4_ z=xtD7plmdR4-vl');
define('SECURE_AUTH_SALT', ' ZuFpIgST5~;%;-oNkx[g#gjUS`jb?r4:|l0{1(L,nO*%lG?+adxCG#>TA;So[Xq');
define('LOGGED_IN_SALT',   'QS7<dS<Z5a4#uC}?S@?etnB4@Nr2ao7f|8@sy@sJ+g4V?ke8/Z*e#6cV.P6/;:aR');
define('NONCE_SALT',       '=wFp tK4mc<_(GGT- )E@TI1IdfY JV[32+5_9$u4KaPXpSe_G1!H<B=8[Tl[$B*');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
