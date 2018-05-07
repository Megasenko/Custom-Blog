-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost:80
-- Время создания: Май 07 2018 г., 13:27
-- Версия сервера: 5.7.22-0ubuntu0.16.04.1
-- Версия PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `custom_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `sub_title`, `content`, `created_at`, `url`, `author`) VALUES
(22, 'Прогноз погоды в Украине на неделю: небольшое похолодание и дожди', '<p>7 мая, в понедельник, осадки ожидаются на большей части страны</p>', '                                    <p>В Украине еще совсем недавно не могли дождаться весны, зато теперь, в самом начале мая – настоящее лето. Синоптики на днях <strong><a href="https://www.segodnya.ua/ukraine/sinoptik-rasskazala-kogda-v-ukraine-oslabnet-zhara-1135108.html" target="_blank">обещали, что к концу недели жара спадет</a></strong>. Сайт "Сегодня" решил выяснить, так ли это, и какой будет погода в первой половине следующей недели.</p>\r\n<p><strong>5 мая, в субботу</strong> на всей территории Украины все так же жарко, сообщает Укргидрометцентр. В западной части страны днем в среднем от 24 до 28 градусов тепла, в северной, центральной и восточной областях – от 28 до 31 градуса, на юге – от 29 до 32 выше нуля. При этом в западных областях ожидаются дожди с грозами.</p>\r\n<p style="text-align: center;"><a href="https://www.segodnya.ua/img/forall/users/3232/323236/new/05_orig.jpg" target="_blank"><img src="https://www.segodnya.ua/img/forall/users/3232/323236/new/05.jpg" alt="05" width="100%" class="today_img today_img_orig"></a></p>\r\n<p><strong>6 мая, в воскресенье</strong> дожди и грозы уйдут восточнее, в центральную часть Украины. Осадки ожидаются на территории от Черниговской до Одесской областей. И вот именно в воскресенье станет ощутимо прохладнее: в западных областях это 19-23 градуса днем, на севере 21-23 градуса, в центральных и восточных областях от 26 до 29, и на юге от от 25 до 30 градусов.</p>\r\n<p style="text-align: center;"><a href="https://www.segodnya.ua/img/forall/users/3232/323236/new/06_02_orig.jpg" target="_blank"><img src="https://www.segodnya.ua/img/forall/users/3232/323236/new/06_02.jpg" alt="06_02" width="100%" class="today_img today_img_orig"></a></p>\r\n<p><strong>7 мая, в понедельник</strong> осадки (в виде небольшого дождя, местами с грозами) уже на большей части страны – сухо только на западе Украины. Температура воздуха в западных областях днем – 19-21 градус, на севере и в центре 21-23 градуса, в восточных областях 25-27 градусов, на юге 23-27 градусов выше нуля.</p>\r\n<p style="text-align: center;"><a href="https://www.segodnya.ua/img/forall/users/3232/323236/new/07_orig.jpg" target="_blank"><img src="https://www.segodnya.ua/img/forall/users/3232/323236/new/07.jpg" alt="07" width="100%" class="today_img today_img_orig"></a></p>\r\n<p><strong>8 мая, во вторник</strong> дожди с грозами ожидаются по всей Украине. Сухо только в самом центре – в Черкасской, Полтавской, Кировоградской, Днепропетровской областях. Средняя температура воздуха по стране – от 20 до 25 градусов тепла.</p>\r\n<p style="text-align: center;"><a href="https://www.segodnya.ua/img/forall/users/3232/323236/new/08_orig.jpg" target="_blank"><img src="https://www.segodnya.ua/img/forall/users/3232/323236/new/08.jpg" alt="08" width="100%" class="today_img today_img_orig"></a></p>\r\n<ins class="adsbygoogle" style="display: block; text-align: center; height: 153px;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-4655607803669314" data-ad-slot="2033801169" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:153px;margin:0;padding:0;position:relative;visibility:visible;width:610px;background-color:transparent;"><ins id="aswift_0_anchor" style="display:block;border:none;height:153px;margin:0;padding:0;position:relative;visibility:visible;width:610px;background-color:transparent;"><iframe width="610" height="153" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&&s.handlers,h=H&&H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&&d&&(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;width:610px;height:153px;"></iframe></ins></ins></ins>\r\n<script>\r\n     (adsbygoogle = window.adsbygoogle || []).push({});\r\n</script><p><strong>9 мая, в среду</strong> погода останется практически такой же, как во вторник – в большей части страны осадки, тепло, но не жарко.</p>\r\n<p style="text-align: center;"><a href="https://www.segodnya.ua/img/forall/users/3232/323236/new/09_orig.jpg" target="_blank"><img src="https://www.segodnya.ua/img/forall/users/3232/323236/new/09.jpg" alt="09" width="100%" class="today_img today_img_orig"></a></p>\r\n<p><strong>Народный прогноз погоды</strong></p>\r\n<p><strong>5 мая</strong> - в этот день почитается память апостолов Нафанаила, Луки, Климента. В прежние времена заметили, что если 5 мая ночью будет похолодание, то еще 40 дней по утрам будет достаточно холодно, пишет сайт <a href="https://sinoptik.ua/%D0%BF%D0%BE%D0%B3%D0%BE%D0%B4%D0%B0-%D0%BA%D0%B8%D0%B5%D0%B2/2018-05-05" rel="nofollow" target="_blank">"Синоптик"</a>.</p>\r\n<p><strong>6 мая</strong> отмечается день памяти великомученика Георгия Победоносца. В это время прилетают ласточки: "Ласточка прилетела, скоро гром загремит".</p>\r\n<p><strong>7 мая</strong> – в этот день почитается память мучеников Саввы Стратилата и Евсевия. В старину с этого дня бывало еще 12 холодов.</p>\r\n<p><strong>8 мая</strong> отмечается день памяти святого апостола и евангелиста Марка. В народе его называли Марк Ключник. Считается, что Марк ведает ключами от дождей. "Если выпадет в мае три дождя добрых, то и хлеба будет на три года полных". Если певчие птицы прилетают стаями — к теплому лету. Если в этот день наблюдалась радуга высокая и крутая — к хорошей погоде, если же она была низкой и пологой — к ненастью.</p>\r\n<p><strong>9 мая</strong> почитается память святителя Стефана Великопермского. Наши предки заметили такую огородную примету: если лист березы развернулся полностью — можно сажать картофель.</p>\r\n\r\n            </span>', '2018-05-05 00:00:00', '1', 1),
(24, 'ДТП с гонщиком-блогером: люди пытались совершить самосуд над водителем джипа', '<p>Друзья погибшего Андрея Василенко повредили автомобиль скорой помощи</p>', '                                    <p>Друзья блогера, погибшего под Харьковом, повредили автомобиль скорой помощи, в котором находился участник ДТП. Об этом сообщили в Центре экстренной медицинской помощи и медицины катастроф.</p>\r\n<p>Самосуд пытались совершить друзья погибшего в ДТП 23-летнего Андрея Василенко. В машине скорой помощи находился 41-летний Дмитрий Одарченко – второй участник ДТП.</p>\r\n<div style="clear:both;"></div><blockquote>\r\n<p>"После того как 22-летнюю пассажирку авто Chevrolet Corvett передали бригаде скорой помощи для госпитализации, свидетели и друзья погибшего заблокировали другой автомобиль экстренной помощи. Они хотели совершить самосуд над водителем автомобиля Toyota Land Cruiser. Салон автомобиля экстренной помощи получил повреждения. Позже бригаде удалось выехать в сопровождении полиции", – отметили в центре.</p>\r\n</blockquote>\r\n<p>Как сообщалось, по предварительным данным следствия по смертельному ДТП, произошедшему 1 мая на дороге на Волачнск, <strong><a href="https://www.segodnya.ua/regions/kharkov/smertelnoe-dtp-s-harkovskim-gonshchikom-blogerom-v-krovi-voditelya-dzhipa-nashli-etilovyy-spirt-1135198.html" target="_blank">правила дорожного движения нарушил водитель Toyota Land Cruiser</a></strong>. Об этом сегодня, 2 мая, сообщила начальник отдела коммуникации Главного управления Национальной полиции в Харьковской области Елена Баранник.</p>\r\n<p><span>Сейчас 41-летний водитель Toyota находится в изоляторе временного содержания. Он отказался от дачи показаний, ссылаясь на ст. 63 Конституции. Он также отказывался проходить освидетельствование. </span><em>"Предварительно можно уже сказать, что у водителя Toyota в крови нашли этиловый спирт", – сообщила Баранник.</em></p>\r\n<p>Напомним, <span><a href="https://www.segodnya.ua/regions/kharkov/smertelnoe-dtp-v-harkovskoy-oblasti-pogib-22-letniy-paren-1134960.html" target="_blank">смертельная авария в Харьковской области</a>,</span> которая произошла 1 мая и унесла жизнь 22-летнего мужчины, произошла на трассе недалеко от села Кутузовка, а погибшим оказался гонщик и блогер Андрей Василенко, известный под ником Amigos.</p>\r\n<p>Между тем стало известно о состоянии пассажирки автомобиля Chevrolet Corvette, которая получила ранения: она находится в больнице скорой и неотложной помощи, ее состояние врачи оценивают как стабильное. По данным пресс-службы городского совета, девушка 1995 года рождения сейчас проходит лечение в отделении нейрохирургии. В данный момент жизни пострадавшей ничего не угрожает, она лежит в общей палате.</p>\r\n<p>Также сообщалось, что участник смертельного ДТП под Харьковом, сидевший за рулем внедорожника Toyota Land Cruiser,<span><a href="https://www.segodnya.ua/regions/kharkov/smertelnaya-avariya-pod-harkovom-podozrevaemogo-otpravili-v-sizo-1135074.html" target="_blank"> был задержан полицией и помещен в СИЗО</a></span>. Как сообщили в пресс-службе управления областной полиции,<span><a href="https://www.segodnya.ua/regions/kharkov/dtp-s-harkovskim-gonshchikom-blogerom-poyavilsya-kommentariy-policii-1135110.html" target="_blank"> будут проведены судебно-медицинская, транспортно-трассологическая</a></span>, автотехнические экспертизы технического состояния автомобилей, автотехническая экспертиза по действиям обоих водителей.</p>\r\n\r\n            </span>', '2018-05-05 00:00:00', '2', 18),
(33, 'В Харькове прошел чемпионат барист', '<p>В приготовлении кофе соревновались и профессионалы, и начинающие мастера</p>', '<span class="_ga1_on_">\r\n\r\n                                    <p>В Харькове под внимательными взглядами судей прошел чемпионат среди барист – мастеров приготовления кофе – в котором приняли участие как начинающие, так и титулованные участники. Степень помола и обжарки, сорт кофе и даже сила, с которой его трамбуют – для вкуса напитка важна каждая деталь, утверждают судьи.</p>\r\n<p>По нормативам соревнований, за 10 минут бариста должен приготовить три чашки кофе для судей: эспрессо, молочный и авторский напитки.</p>\r\n<div style="clear:both;"></div><blockquote>\r\n<p>"Я доволен. Не буду скрывать, я немножко устал, но мне кажется, это не важно. Потому что, когда я вышел на сцену – все было замечательно", – рассказал один из участников конкурса, бариста Павел Кобыльский.</p>\r\n</blockquote>\r\n<p>Интересно, что в финал вышла только одна девушка – по ее словам, она впервые приняла участие в серьезном соревновании, и поэтому волнуется, забывает ингредиенты, и почти рыдает, но получает поддержку зрителей.</p>\r\n<div style="clear:both;"></div><blockquote>\r\n<p>"Банановый концентрат, который был главным ингредиентом в моем авторском напитке, я его забыла у себя на станции подготовки, – призналась бариста Диана Захарченко.</p>\r\n</blockquote>\r\n<p>Судят выступления признанные кофейные мастера и чемпионы Украины прошлых лет. Некоторые из них признались, что для того, чтобы оценить работу участников чемпионата, необходимо крепкое здоровье.</p>\r\n<div style="clear:both;"></div><blockquote>\r\n<p>"Наша работа очень тяжелая, потому что иногда бывают такие напитки, которые очень тяжело пить, но мы должны это сделать. Нужно сделать минимум два глотка", – объяснил Александр Галицин, судья чемпионата.</p>\r\n</blockquote>\r\n<p>За два дня соревнований участники приготовили десятки литров ароматных напитков.</p>\r\n<div style="clear:both;"></div><blockquote>\r\n<p>Как рассказал соорганизатор чемпионата Станислав Лущ, "Я думаю, здесь десятками, может сотнями килограмм молотого кофе исчисляется".</p>\r\n</blockquote>\r\n<p>В свою очередь, баристы поделились секретом: чтобы и дома любимый напиток был не хуже чемпионского, нужно не экономить на качественном кофе, покупать только свежеобжаренный и готовить с душой.&nbsp;</p>\r\n<p>Напомним,&nbsp;<strong><a href="https://kiev.segodnya.ua/kother/sorevnovaniya-patrulnyh-po-krossfitu-priehali-vosem-komand-so-vsey-ukrainy-1110502.html" target="_blank">патрульные со всей Украины приехали в Киев на соревнования по кроссфиту</a></strong>.&nbsp;Этот вид соревнований состоит из силовых упражнений. Спортсмену нужна изрядная выносливость.</p>\r\n<p>Также мы писали, что&nbsp;<strong><a href="https://www.segodnya.ua/economics/avto/v-cherkassah-proshli-gonki-na-seriynyh-avto-video-1117482.html" target="_blank">в Черкассах прошли гонки на серийных авто</a></strong>.&nbsp;Среди десятков автомобилей в этом году впервые на старте "Запорожцы". ЗАЗ-968 производства советского автопрома до сих пор на ходу.</p>\r\n\r\n            </span>', '2018-05-06 00:00:00', '3', 1),
(81, '<h1> Злодій обікрав столичний офіс за 13 секунд</h1>', '<p>Злодій обікрав столичний офіс за 13 секунд. Забрав ноутбук.</p>', '"Ви можете мати надійну охорону, встановити відеоспостереження у всіх без винятку кімнатах і весь день провести в офісі, але досить вийти лише на 13 секунд в сусідній кабінет, і вуаля - вашого ноута вже немає. А разом з ним і всіх документів, файлів, доступів, цінність яких куди більше вартості "мака". ', '2018-05-07 00:00:00', '4', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `login`, `email`, `password`) VALUES
(19, 'Stiv', 'Djobs', 'BIngo', 'bingo@mail.org', 'd41d8cd98f00b204e9800998ecf8427e'),
(18, 'Иван', 'Данилов', 'Danya', 'Danya@mail.org', 'c4ca4238a0b923820dcc509a6f75849b'),
(1, 'Дмитрий', 'Миколенко', 'admin', 'Dimidi07@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b'),
(22, 'Иван', 'Дорн', 'Dorn', 'Dorn@mail.org', 'c4ca4238a0b923820dcc509a6f75849b'),
(27, 'Дима', '', 'dima', 'dima@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
