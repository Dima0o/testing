<?
/* Подгрузка данных теста */
$json = '
{  
   "1":"Нравится ли Вам решать нестандартные задачи?",
   "2":"У Вас часто меняется настроение?",
   "3":"Сталкиваясь с трудностями, стремитесь ли Вы преодолеть их новыми, нестандартными способами?",
   "4":"Кажется ли Вам жизнь трудной?",
   "5":"Вам нравится выступать перед коллегами (например, проводить и организовывать презентации новых проектов, товаров, услуг и т.п.)?",
   "6":"Вам легко переключаться с одного вида деятельности на другой?",
   "7":"Можете ли Вы сильно воодушевиться, увлечься новым делом?",
   "8":"Являетесь ли Вы общительным, легко идущим на контакт человеком?",
   "9":"Вам нравится решать задачи, предполагающие получение конкретного результата?",
   "10":"Нравится ли Вам работа с людьми, требующая внимания к их индивидуальным проблемам?",
   "11":"Свойственна ли Вам повышенная стрессоустойчивость и отсутствие боязни перед трудностями?",
   "12":"Нравится ли Вам ставить перед собой сложные, масштабные задачи?",
   "13":"Нравится ли Вам ставить перед собой сложные, масштабные задачи?",
   "14":"Считаете ли Вы необходимым соблюдение всех формальностей в каждодневной работе?",
   "15":"Характерна ли Вам недоверчивость?",
   "16":"Стремитесь ли Вы во всем и всюду соблюдать порядок?",
   "17":"Может ли Вас так захватить кинофильм, книга, что слёзы выступят на глазах?",
   "18":"Легко ли Вы улавливаете малейшие оттенки настроения собеседника?",
   "19":"Можете ли Вы легко понять состояние человека, если он делится с Вами заботами?",
   "20":"Нравится ли Вам решать задачи, связанные с контролем за результатами труда других?",
   "21":"Нравится ли Вам решать задачи, связанные с внедрением новых условий, правил, технологий работы?",
   "22":"Волнуетесь ли Вы, начиная новый проект, что что-либо пойдет не так?",
   "23":"Легко ли Вы переносите смену места работы, изменения в должностном статусе?",
   "24":"Вы часто переживаете из-за того, что сделали или сказали что-то не то?",
   "25":"Нравится ли Вам работа, предполагающая многочисленные контакты с различными людьми?",
   "26":"Можно ли сказать, что Вы при неудачах не теряете чувства юмора?",
   "27":"Помогает ли Ваша общительность, изобретательность выходить из сложных ситуаций?",
   "28":"Вам нравится часто ходить в гости  и бывать в обществе?"
}
';

//print_r( json_decode($json) );

?>

<div class="col-md-8">

    <div class="col-md-12">

        <h3 class="mb-0">Тест для измерения характерологического профиля</h3>

        <br>

        <form action="/testing/" method="post">

            <? foreach ( json_decode($json) as $key_item => $item ): ?>

                <p id="question_1" class="card-text mb-auto"> <b><?=$key_item?>) <?=$item?> </b> <br>
                    <div class="radio"><label><input type="radio" value="1" name="<?=$key_item?>" required>Нет</label></div>
                    <div class="radio"><label><input type="radio" value="2" name="<?=$key_item?>">Скорее нет, чем да</label></div>
                    <div class="radio"><label><input type="radio" value="3" name="<?=$key_item?>">Затрудняюсь ответить</label></div>
                    <div class="radio"><label><input type="radio" value="4" name="<?=$key_item?>">Скорее да чем нет</label></div>
                    <div class="radio"><label><input type="radio" value="5" name="<?=$key_item?>">Да</label></div>
                </p>

            <? endforeach; ?>


<!--            -->
<!--            <p id="question_1" class="card-text mb-auto"> <b>1) Нравится ли Вам решать нестандартные задачи?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="1" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="1">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="1">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="1">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="1">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_2" class="card-text mb-auto"> <b>2) У Вас часто меняется настроение?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="2" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="2">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="2">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="2">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="2">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_3" class="card-text mb-auto"> <b>3) Сталкиваясь с трудностями, стремитесь ли Вы преодолеть их новыми, нестандартными способами?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="3" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="3">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="3">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="3">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="3">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_4" class="card-text mb-auto"> <b>4) Кажется ли Вам жизнь трудной?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="4" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="4">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="4">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="4">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="4">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_5" class="card-text mb-auto"> <b>5) Вам нравится выступать перед коллегами (например, проводить и организовывать презентации новых проектов, товаров, услуг и т.п.)?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="5" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="5">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="5">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="5">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="5">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_6" class="card-text mb-auto"> <b>6) Вам легко переключаться с одного вида деятельности на другой?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="6" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="6">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="6">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="6">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="6">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_7" class="card-text mb-auto"> <b>7) Можете ли Вы сильно воодушевиться, увлечься новым делом?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="7" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="7">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="7">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="7">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="7">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_8" class="card-text mb-auto"> <b>8) Являетесь ли Вы общительным, легко идущим на контакт человеком?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="8" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="8">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="8">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="8">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="8">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_9" class="card-text mb-auto"> <b>9) Вам нравится решать задачи, предполагающие получение конкретного результата?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="9" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="9">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="9">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="9">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="9">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_10" class="card-text mb-auto"> <b>10) Нравится ли Вам работа с людьми, требующая внимания к их индивидуальным проблемам?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="10" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="10">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="10">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="10">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="10">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_11" class="card-text mb-auto"> <b>11) Свойственна ли Вам повышенная стрессоустойчивость и отсутствие боязни перед трудностями?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="11" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="11">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="11">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="11">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="11">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_12" class="card-text mb-auto"> <b>12) Нравится ли Вам ставить перед собой сложные, масштабные задачи?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="12" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="12">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="12">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="12">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="12">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_13" class="card-text mb-auto"> <b>13) Нравится ли Вам заниматься неспешной работой, требующей аккуратности и точности, внимания к мелким деталям?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="13" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="13">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="13">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="13">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="13">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_14" class="card-text mb-auto"> <b>14) Считаете ли Вы необходимым соблюдение всех формальностей в каждодневной работе?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="14" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="14">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="14">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="14">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="14">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_15" class="card-text mb-auto"> <b>15) Характерна ли Вам недоверчивость?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="15" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="15">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="15">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="15">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="15">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_16" class="card-text mb-auto"> <b>16) Стремитесь ли Вы во всем и всюду соблюдать порядок?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="16" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="16">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="16">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="16">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="16">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_17" class="card-text mb-auto"> <b>17) Может ли Вас так захватить кинофильм, книга, что слёзы выступят на глазах?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="17" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="17">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="17">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="17">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="17">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_18" class="card-text mb-auto"> <b>18) Легко ли Вы улавливаете малейшие оттенки настроения собеседника?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="18" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="18">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="18">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="18">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="18">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_19" class="card-text mb-auto"> <b>19) Можете ли Вы легко понять состояние человека, если он делится с Вами заботами?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="19" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="19">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="19">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="19">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="19">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_20" class="card-text mb-auto"> <b>20) Нравится ли Вам решать задачи, связанные с контролем за результатами труда других?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="20" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="20">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="20">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="20">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="20">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_21" class="card-text mb-auto"> <b>21) Нравится ли Вам решать задачи, связанные с внедрением новых условий, правил, технологий работы?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="21" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="21">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="21">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="21">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="21">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_22" class="card-text mb-auto"> <b>22) Волнуетесь ли Вы, начиная новый проект, что что-либо пойдет не так?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="22" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="22">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="22">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="22">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="22">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_23" class="card-text mb-auto"> <b>23) Легко ли Вы переносите смену места работы, изменения в должностном статусе?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="23" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="23">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="23">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="23">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="23">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_24" class="card-text mb-auto"> <b>24) Вы часто переживаете из-за того, что сделали или сказали что-то не то?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="24" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="24">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="24">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="24">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="24">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_25" class="card-text mb-auto"> <b>25) Нравится ли Вам работа, предполагающая многочисленные контакты с различными людьми?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="25" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="25">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="25">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="25">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="25">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_26" class="card-text mb-auto"> <b>26) Можно ли сказать, что Вы при неудачах не теряете чувства юмора?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="26" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="26">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="26">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="26">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="26">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_27" class="card-text mb-auto"> <b>27) Помогает ли Ваша общительность, изобретательность выходить из сложных ситуаций?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="27" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="27">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="27">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="27">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="27">Да</label></div>-->
<!--            </p>-->
<!---->
<!--            <p id="question_28" class="card-text mb-auto"> <b>28) Вам нравится часто ходить в гости и бывать в обществе?</b> <br>-->
<!--                <div class="radio"><label><input type="radio" value="1" name="28" required>Нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="2" name="28">Скорее нет, чем да</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="3" name="28">Затрудняюсь ответить</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="4" name="28">Скорее да чем нет</label></div>-->
<!--                <div class="radio"><label><input type="radio" value="5" name="28">Да</label></div>-->
<!--            </p>-->


            <button name="testing_end" type="submit" class="btn btn-success" value="1">Получить результат</button>

        </form>

    </div>




</div>

<aside class="col-md-4 blog-sidebar">
    <!--
    <div class="p-3" style="position: fixed;">

        <h5 class="font-italic">Вопросы</h5>

        <div class="p-3 mb-3 bg-light rounded">

            <nav aria-label="...">
                <ul class="pagination">

                    <li class="page-item active"><a class="page-link" href="#question_1">1</a></li>
                    <li class="page-item"><a class="page-link" href="#question_2">2</a></li>
                    <li class="page-item"><a class="page-link" href="#question_3">3</a></li>
                    <li class="page-item"><a class="page-link" href="#question_4">4</a></li>
                    <li class="page-item"><a class="page-link" href="#question_5">5</a></li>
                    <li class="page-item"><a class="page-link" href="#question_6">6</a></li>
                    <li class="page-item"><a class="page-link" href="#question_7">7</a></li>
                    <li class="page-item"><a class="page-link" href="#question_8">8</a></li>
                    <li class="page-item"><a class="page-link" href="#question_9">9</a></li>
                    <li class="page-item"><a class="page-link" href="#question_10">10</a></li>

                </ul>
                <ul class="pagination">

                    <li class="page-item"><a class="page-link" href="#question_11">11</a></li>
                    <li class="page-item"><a class="page-link" href="#question_12">12</a></li>
                    <li class="page-item"><a class="page-link" href="#question_13">13</a></li>
                    <li class="page-item"><a class="page-link" href="#question_14">14</a></li>
                    <li class="page-item"><a class="page-link" href="#question_15">15</a></li>
                    <li class="page-item"><a class="page-link" href="#question_16">16</a></li>
                    <li class="page-item"><a class="page-link" href="#question_17">17</a></li>
                    <li class="page-item"><a class="page-link" href="#question_18">18</a></li>

                </ul>

                <ul class="pagination">

                    <li class="page-item"><a class="page-link" href="#question_19">19</a></li>
                    <li class="page-item"><a class="page-link" href="#question_20">20</a></li>
                    <li class="page-item"><a class="page-link" href="#question_21">21</a></li>
                    <li class="page-item"><a class="page-link" href="#question_22">22</a></li>
                    <li class="page-item"><a class="page-link" href="#question_23">23</a></li>
                    <li class="page-item"><a class="page-link" href="#question_24">24</a></li>
                    <li class="page-item"><a class="page-link" href="#question_25">25</a></li>
                    <li class="page-item"><a class="page-link" href="#question_26">26</a></li>

                </ul>

                <ul class="pagination">

                    <li class="page-item"><a class="page-link" href="#question_27">27</a></li>
                    <li class="page-item"><a class="page-link" href="#question_28">28</a></li>

                </ul>


            </nav>

        </div>

    </div>
    -->

</aside>