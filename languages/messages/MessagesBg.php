<?php
/** Bulgarian (Български)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author BloodIce
 * @author Borislav
 * @author DCLXVI
 * @author Daggerstab
 * @author Kaganer
 * @author Spiritia
 * @author Stanqo
 * @author Turin
 * @author Urhixidur
 * @author Vladimir Penov
 * @author Петър Петров
 * @author לערי ריינהארט
 */

$fallback8bitEncoding = 'windows-1251';

$namespaceNames = array(
	NS_MEDIA            => 'Медия',
	NS_SPECIAL          => 'Специални',
	NS_TALK             => 'Беседа',
	NS_USER             => 'Потребител',
	NS_USER_TALK        => 'Потребител_беседа',
	NS_PROJECT_TALK     => '$1_беседа',
	NS_FILE             => 'Файл',
	NS_FILE_TALK        => 'Файл_беседа',
	NS_MEDIAWIKI        => 'МедияУики',
	NS_MEDIAWIKI_TALK   => 'МедияУики_беседа',
	NS_TEMPLATE         => 'Шаблон',
	NS_TEMPLATE_TALK    => 'Шаблон_беседа',
	NS_HELP             => 'Помощ',
	NS_HELP_TALK        => 'Помощ_беседа',
	NS_CATEGORY         => 'Категория',
	NS_CATEGORY_TALK    => 'Категория_беседа',
);

$namespaceAliases = array(
	'Картинка' => NS_FILE,
	'Картинка беседа' => NS_FILE_TALK,
);


$datePreferences = false;

$bookstoreList = array(
	'books.bg'   => 'http://www.books.bg/ISBN/$1',
	'Пингвините' => 'http://www.pe-bg.com/?cid=3&search_q=$1&where=ISBN&x=0&y=0**',
	'Бард'       => 'http://www.bard.bg/search/?q=$1'
);

$magicWords = array(
	'redirect'                => array( '0', '#пренасочване', '#виж', '#REDIRECT' ),
	'notoc'                   => array( '0', '__БЕЗСЪДЪРЖАНИЕ__', '__NOTOC__' ),
	'nogallery'               => array( '0', '__БЕЗГАЛЕРИЯ__', '__NOGALLERY__' ),
	'forcetoc'                => array( '0', '__СЪССЪДЪРЖАНИЕ__', '__FORCETOC__' ),
	'toc'                     => array( '0', '__СЪДЪРЖАНИЕ__', '__TOC__' ),
	'noeditsection'           => array( '0', '__БЕЗ_РЕДАКТИРАНЕ_НА_РАЗДЕЛИ__', '__NOEDITSECTION__' ),
	'currentmonth'            => array( '1', 'ТЕКУЩМЕСЕЦ', 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonth1'           => array( '1', 'ТЕКУЩМЕСЕЦ1', 'CURRENTMONTH1' ),
	'currentmonthname'        => array( '1', 'ТЕКУЩМЕСЕЦИМЕ', 'CURRENTMONTHNAME' ),
	'currentmonthnamegen'     => array( '1', 'ТЕКУЩМЕСЕЦИМЕРОД', 'CURRENTMONTHNAMEGEN' ),
	'currentmonthabbrev'      => array( '1', 'ТЕКУЩМЕСЕЦСЪКР', 'CURRENTMONTHABBREV' ),
	'currentday'              => array( '1', 'ТЕКУЩДЕН', 'CURRENTDAY' ),
	'currentday2'             => array( '1', 'ТЕКУЩДЕН2', 'CURRENTDAY2' ),
	'currentdayname'          => array( '1', 'ТЕКУЩДЕНИМЕ', 'CURRENTDAYNAME' ),
	'currentyear'             => array( '1', 'ТЕКУЩАГОДИНА', 'CURRENTYEAR' ),
	'currenttime'             => array( '1', 'ТЕКУЩОВРЕМЕ', 'CURRENTTIME' ),
	'currenthour'             => array( '1', 'ТЕКУЩЧАС', 'CURRENTHOUR' ),
	'numberofpages'           => array( '1', 'БРОЙСТРАНИЦИ', 'NUMBEROFPAGES' ),
	'numberofarticles'        => array( '1', 'БРОЙСТАТИИ', 'NUMBEROFARTICLES' ),
	'numberoffiles'           => array( '1', 'БРОЙФАЙЛОВЕ', 'NUMBEROFFILES' ),
	'numberofusers'           => array( '1', 'БРОЙПОТРЕБИТЕЛИ', 'NUMBEROFUSERS' ),
	'numberofactiveusers'     => array( '1', 'БРОЙАКТИВНИПОТРЕБИТЕЛИ', 'NUMBEROFACTIVEUSERS' ),
	'numberofedits'           => array( '1', 'БРОЙРЕДАКЦИИ', 'NUMBEROFEDITS' ),
	'numberofviews'           => array( '1', 'БРОЙПРЕГЛЕДИ', 'NUMBEROFVIEWS' ),
	'pagename'                => array( '1', 'СТРАНИЦА', 'PAGENAME' ),
	'pagenamee'               => array( '1', 'СТРАНИЦАИ', 'PAGENAMEE' ),
	'namespace'               => array( '1', 'ИМЕННОПРОСТРАНСТВО', 'NAMESPACE' ),
	'namespacee'              => array( '1', 'ИМЕННОПРОСТРАНСТВОИ', 'NAMESPACEE' ),
	'fullpagename'            => array( '1', 'ПЪЛНОИМЕ_СТРАНИЦА', 'FULLPAGENAME' ),
	'fullpagenamee'           => array( '1', 'ПЪЛНОИМЕ_СТРАНИЦАИ', 'FULLPAGENAMEE' ),
	'subpagename'             => array( '1', 'ИМЕ_ПОДСТРАНИЦА', 'SUBPAGENAME' ),
	'subpagenamee'            => array( '1', 'ИМЕ_ПОДСТРАНИЦАИ', 'SUBPAGENAMEE' ),
	'talkpagename'            => array( '1', 'ИМЕ_БЕСЕДА', 'TALKPAGENAME' ),
	'talkpagenamee'           => array( '1', 'ИМЕ_БЕСЕДАИ', 'TALKPAGENAMEE' ),
	'msg'                     => array( '0', 'СЪОБЩ:', 'MSG:' ),
	'subst'                   => array( '0', 'ЗАМЕСТ:', 'SUBST:' ),
	'msgnw'                   => array( '0', 'СЪОБЩБУ:', 'MSGNW:' ),
	'img_thumbnail'           => array( '1', 'мини', 'thumbnail', 'thumb' ),
	'img_manualthumb'         => array( '1', 'мини=$1', 'thumbnail=$1', 'thumb=$1' ),
	'img_right'               => array( '1', 'вдясно', 'дясно', 'д', 'right' ),
	'img_left'                => array( '1', 'вляво', 'ляво', 'л', 'left' ),
	'img_none'                => array( '1', 'н', 'none' ),
	'img_width'               => array( '1', '$1пкс', '$1п', '$1px' ),
	'img_center'              => array( '1', 'център', 'центр', 'ц', 'center', 'centre' ),
	'img_framed'              => array( '1', 'рамка', 'врамка', 'framed', 'enframed', 'frame' ),
	'img_frameless'           => array( '1', 'безрамка', 'frameless' ),
	'img_border'              => array( '1', 'ръб', 'контур', 'border' ),
	'int'                     => array( '0', 'ВЪТР:', 'INT:' ),
	'sitename'                => array( '1', 'ИМЕНАСАЙТА', 'SITENAME' ),
	'ns'                      => array( '0', 'ИП:', 'NS:' ),
	'localurl'                => array( '0', 'ЛОКАЛЕНАДРЕС:', 'LOCALURL:' ),
	'localurle'               => array( '0', 'ЛОКАЛЕНАДРЕСИ:', 'LOCALURLE:' ),
	'server'                  => array( '0', 'СЪРВЪР', 'SERVER' ),
	'servername'              => array( '0', 'ИМЕНАСЪРВЪРА', 'SERVERNAME' ),
	'scriptpath'              => array( '0', 'ПЪТДОСКРИПТА', 'SCRIPTPATH' ),
	'grammar'                 => array( '0', 'ГРАМАТИКА:', 'GRAMMAR:' ),
	'gender'                  => array( '0', 'ПОЛ:', 'GENDER:' ),
	'currentweek'             => array( '1', 'ТЕКУЩАСЕДМИЦА', 'CURRENTWEEK' ),
	'currentdow'              => array( '1', 'ТЕКУЩ_ДЕН_ОТ_СЕДМИЦАТА', 'CURRENTDOW' ),
	'revisionid'              => array( '1', 'ИД_НА_ВЕРСИЯТА', 'REVISIONID' ),
	'revisionday'             => array( '1', 'ДЕН_НА_ВЕРСИЯТА', 'REVISIONDAY' ),
	'revisionday2'            => array( '1', 'ДЕН_НА_ВЕРСИЯТА2', 'REVISIONDAY2' ),
	'revisionmonth'           => array( '1', 'МЕСЕЦ_НА_ВЕРСИЯТА', 'REVISIONMONTH' ),
	'revisionyear'            => array( '1', 'ГОДИНА_НА_ВЕРСИЯТА', 'REVISIONYEAR' ),
	'plural'                  => array( '0', 'МН_ЧИСЛО:', 'PLURAL:' ),
	'fullurl'                 => array( '0', 'ПЪЛЕН_АДРЕС:', 'FULLURL:' ),
	'fullurle'                => array( '0', 'ПЪЛЕН_АДРЕСИ:', 'FULLURLE:' ),
	'lcfirst'                 => array( '0', 'МБПЪРВА:', 'LCFIRST:' ),
	'ucfirst'                 => array( '0', 'ГБПЪРВА:', 'UCFIRST:' ),
	'lc'                      => array( '0', 'МБ:', 'LC:' ),
	'uc'                      => array( '0', 'ГБ:', 'UC:' ),
	'raw'                     => array( '0', 'НЕОБРАБ:', 'RAW:' ),
	'displaytitle'            => array( '1', 'ПОКАЗВ_ЗАГЛАВИЕ', 'DISPLAYTITLE' ),
	'newsectionlink'          => array( '1', '__ВРЪЗКА_ЗА_НОВ_РАЗДЕЛ__', '__NEWSECTIONLINK__' ),
	'language'                => array( '0', '#ЕЗИК:', '#LANGUAGE:' ),
	'numberofadmins'          => array( '1', 'БРОЙАДМИНИСТРАТОРИ', 'NUMBEROFADMINS' ),
	'defaultsort'             => array( '1', 'СОРТКАТ:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'hiddencat'               => array( '1', '__СКРИТАКАТЕГОРИЯ__', '__HIDDENCAT__' ),
	'index'                   => array( '1', '__ИНДЕКСИРАНЕ__', '__INDEX__' ),
	'noindex'                 => array( '1', '__БЕЗИНДЕКСИРАНЕ__', '__NOINDEX__' ),
);

$specialPageAliases = array(
	'Activeusers'               => array( 'Активни_потребители' ),
	'Allmessages'               => array( 'Системни_съобщения' ),
	'Allpages'                  => array( 'Всички_страници' ),
	'Ancientpages'              => array( 'Стари_страници' ),
	'Blankpage'                 => array( 'Празна_страница' ),
	'Block'                     => array( 'Блокиране' ),
	'Blockme'                   => array( 'Блокирай_ме' ),
	'Booksources'               => array( 'Източници_на_книги' ),
	'BrokenRedirects'           => array( 'Невалидни_пренасочвания' ),
	'Categories'                => array( 'Категории' ),
	'ChangePassword'            => array( 'Промяна_на_парола' ),
	'Confirmemail'              => array( 'Потвърждаване_на_е-поща' ),
	'Contributions'             => array( 'Приноси' ),
	'CreateAccount'             => array( 'Създаване_на_сметка' ),
	'Deadendpages'              => array( 'Задънени_страници' ),
	'DeletedContributions'      => array( 'Изтрити_приноси' ),
	'Disambiguations'           => array( 'Пояснителни_страници' ),
	'DoubleRedirects'           => array( 'Двойни_пренасочвания' ),
	'Emailuser'                 => array( 'Писмо_на_потребител' ),
	'Export'                    => array( 'Изнасяне' ),
	'Fewestrevisions'           => array( 'Страници_с_най-малко_версии' ),
	'FileDuplicateSearch'       => array( 'Повтарящи_се_файлове' ),
	'Filepath'                  => array( 'Път_към_файл' ),
	'Import'                    => array( 'Внасяне' ),
	'Invalidateemail'           => array( 'Отмяна_на_е-поща' ),
	'BlockList'                 => array( 'Блокирани_потребители' ),
	'LinkSearch'                => array( 'Търсене_на_външни_препратки' ),
	'Listadmins'                => array( 'Администратори' ),
	'Listbots'                  => array( 'Ботове' ),
	'Listfiles'                 => array( 'Файлове' ),
	'Listgrouprights'           => array( 'Групови_права' ),
	'Listredirects'             => array( 'Пренасочвания' ),
	'Listusers'                 => array( 'Потребители' ),
	'Lockdb'                    => array( 'Заключване_на_БД' ),
	'Log'                       => array( 'Дневници' ),
	'Lonelypages'               => array( 'Страници_сираци' ),
	'Longpages'                 => array( 'Дълги_страници' ),
	'MergeHistory'              => array( 'История_на_сливането' ),
	'MIMEsearch'                => array( 'MIME-търсене' ),
	'Mostcategories'            => array( 'Страници_с_най-много_категории' ),
	'Mostimages'                => array( 'Най-препращани_картинки' ),
	'Mostlinked'                => array( 'Най-препращани_страници' ),
	'Mostlinkedcategories'      => array( 'Най-препращани_категории' ),
	'Mostlinkedtemplates'       => array( 'Най-препращани_шаблони' ),
	'Mostrevisions'             => array( 'Страници_с_най-много_версии' ),
	'Movepage'                  => array( 'Преместване_на_страница' ),
	'Mycontributions'           => array( 'Моите_приноси' ),
	'Mypage'                    => array( 'Моята_страница' ),
	'Mytalk'                    => array( 'Моята_беседа' ),
	'Newimages'                 => array( 'Нови_файлове' ),
	'Newpages'                  => array( 'Нови_страници' ),
	'Popularpages'              => array( 'Най-посещавани_страници' ),
	'Preferences'               => array( 'Настройки' ),
	'Prefixindex'               => array( 'Всички_страници_с_представка', 'Представка' ),
	'Protectedpages'            => array( 'Защитени_страници' ),
	'Protectedtitles'           => array( 'Защитени_заглавия' ),
	'Randompage'                => array( 'Случайна_страница' ),
	'Randomredirect'            => array( 'Случайно_пренасочване' ),
	'Recentchanges'             => array( 'Последни_промени' ),
	'Recentchangeslinked'       => array( 'Свързани_промени' ),
	'Revisiondelete'            => array( 'Изтриване_на_версии' ),
	'Search'                    => array( 'Търсене' ),
	'Shortpages'                => array( 'Кратки_страници' ),
	'Specialpages'              => array( 'Специални_страници' ),
	'Statistics'                => array( 'Статистика' ),
	'Tags'                      => array( 'Етикети' ),
	'Unblock'                   => array( 'Отблокиране' ),
	'Uncategorizedcategories'   => array( 'Некатегоризирани_категории' ),
	'Uncategorizedimages'       => array( 'Некатегоризирани_картинки' ),
	'Uncategorizedpages'        => array( 'Некатегоризирани_страници' ),
	'Uncategorizedtemplates'    => array( 'Некатегоризирани_шаблони' ),
	'Undelete'                  => array( 'Възстановяване' ),
	'Unlockdb'                  => array( 'Отключване_на_БД' ),
	'Unusedcategories'          => array( 'Неизползвани_категории' ),
	'Unusedimages'              => array( 'Неизползвани_картинки' ),
	'Unusedtemplates'           => array( 'Неизползвани_шаблони' ),
	'Unwatchedpages'            => array( 'Ненаблюдавани_страници' ),
	'Upload'                    => array( 'Качване' ),
	'Userlogin'                 => array( 'Регистриране_или_влизане' ),
	'Userlogout'                => array( 'Излизане' ),
	'Userrights'                => array( 'Потребителски_права' ),
	'Version'                   => array( 'Версия' ),
	'Wantedcategories'          => array( 'Желани_категории' ),
	'Wantedfiles'               => array( 'Желани_файлове' ),
	'Wantedpages'               => array( 'Желани_страници' ),
	'Wantedtemplates'           => array( 'Желани_шаблони' ),
	'Watchlist'                 => array( 'Списък_за_наблюдение' ),
	'Whatlinkshere'             => array( 'Какво_сочи_насам' ),
	'Withoutinterwiki'          => array( 'Без_междууикита' ),
);

$linkTrail = '/^([a-zабвгдежзийклмнопрстуфхцчшщъыьэюя]+)(.*)$/sDu';

$separatorTransformTable = array( ',' => "\xc2\xa0", '.' => ',' );

