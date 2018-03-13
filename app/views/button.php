
<!-- Подключение хедера -->
<? $this->includes('header'); ?>

<div style="padding-top: 20px;"></div>

<main role="main" class="container">
    <div class="row">

        <? if ( $this->GET[0] == 1 ): ?>

            <div class="col-md-12 blog-main">

                <div class="blog-post">

                    <h3> Презентация контента технологий </h3> <br>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2">Название документа</th>
                            <th>Название документа</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.0 ПРОВОДНИК</td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.0_ПРОВОДНИК.docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                            <tr>
                                <td>1.1 Аннотация услуги "Успешная самореализация" для руководителей </td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.1_Аннот.усл.Усп.самореал.дл.Руков..docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                            <tr>
                                <td>1.1 Аннотация услуги "Успешная самореализация" для заинтересованных лиц</td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.1_Допол.к.аннот.усл.Усп.самор..docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                            <tr>
                                <td>1.1б Дополнение к аннотации услуги “Успешная самореализация”</td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.1б_Аннот.усл.Усп.самор.дл.Заин.лиц.docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                            <tr>
                                <td>1.2 Анонс курса с аннотацией комплекса тем</td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.2_Анон.курс.с.аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                           
                            <tr>
                                <td>1.3 Приложение 1 к файлу авторская технология</td>
                                <td><span class="badge badge-warning">MS PowerPoint</span></td>
                                <td><a href="/uploads/buttons/1/1.3_Авт.технол.опт.самор.в.жиз.слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                            <tr>
                                <td>1.3.1 Авторская технология оптимизации самореализации в жизнедеятельности</td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.3.1_Прил.1.к.файлу.Авт.техн.слайды.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                            <tr>
                                <td>1.4 Введение в контент технологии оптимизации самореализации в жизнедеятельности</td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.4%20Введ.%20в%20конт.авт.техн.оптимиз.самор..doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>
                            <tr>
                                <td>1.5 Административное обеспечение оптимизации управления человеческими ресурсами</td>
                                <td><span class="badge badge-primary">MS Word</span></td>
                                <td><a href="/uploads/buttons/1/1.5_Администр.обеспеч.опт.упр.чел.рес..doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>

        <? elseif( $this->GET[0] == 2): ?>

            <h3> Освоение контента Технологии </h3> <br><br>

            <? if ( isset( $this->GET[1] ) ) : ?>

                <a href="/button/2/" class="btn btn-sm btn-success" style="margin-bottom: 15px" >Назад</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Название документа</th>
                        </tr>
                    </thead>
                    <tbody>

                    <? if ( $this->GET[1] == 1 ) : ?>

                        <tr>
                            <td>1.1 Аннотация услуги "Успешная самореализация" для руководителей</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/1/1.1%20Аннот.усл.Усп.самореал.дл.Руков..docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.1а Аннотация услуги "Успешная самореализация" для главы региона</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/1/1.1а%20Аннот.усл.Усп.самор.дл.Глав.рег..docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.1б Аннотация услуги "Успешная самореализация" для заинтересованных лиц</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/1/1.1б%20Аннот.усл.Усп.самор.дл.Заин.лиц.docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.1в Дополнение к аннотации услуги “Успешная самореализация”</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/1/1.1в%20Допол.к%20аннот.усл.Усп.самор..docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Дополнение к аннотации услуги “Успешная самореализация”</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/1/1.2%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.3 Авторская технология оптимизации самореализации в жизнедеятельности</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/1/1.3%20Авт.технол.опт.самор.в%20жиз.,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.3.1 Приложение 1 к файлу авторская технология</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/1/1.3.1%20Прил.1%20к%20файлу.Авт.%20техн.%20...,слайды.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.5 Административное обеспечение оптимизации управления человеческими ресурсами</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/1/1.5%20Администр.обеспеч.опт.упр.чел.рес..doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>


                    <? elseif( $this->GET[1] == 2 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/2/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов характера и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/2/1.2%20Спец.св.ресурс.характера.,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 3 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/3/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов мотивации ведущих жизненных целей и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/3/1.2%20Спец.св.ресурс.мот.ведущ....,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 4 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/4/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов индивидуальных свойств поведения и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/4/1.2%20Спец.особ.рес.инд.св.повед.,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 5 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/5/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов личностных состояний и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/5/1.2%20Спец.особ.рес.лич.состоян,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 6 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/6/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов управленческих установок и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/6/1.2%20Спец.особ.рес.управл.устан,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>


                    <? elseif( $this->GET[1] == 7 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/7/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов установок-регуляторов взаимодействия и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/7/1.2%20Спец.особ.рес.устан.-регул,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 8 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/8/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические особенности и свойства ресурсов темперамента и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/8/1.2%20Спец.особ.рес.темперам.,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 9 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/9/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов межполушарной асимметрии и типа личности и их проявление</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/9/1.2%20Спец.особ.рес.межп.ас.и%20т.л.,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>


                    <? elseif( $this->GET[1] == 10 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/10/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфические свойства ресурсов эмоциональной сферы психики</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/10/1.2%20Спец.особ.рес.эмоц.сф.псих,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.3.1 Исходник для результатов тестирования темперамента</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/10/1.3.1%20Исх.к%20тестир.инф.пс.св.темперам..docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 11 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/11/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфика пользования общими умственными способностями</td>
                            <td><span class="badge badge-primary">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/11/1.2%20Спец.польз.рес.общ.ум.спос,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                    <? elseif( $this->GET[1] == 12 ): ?>

                        <tr>
                            <td>1.1 Анонс курса с аннотацией комплекса тем</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/12/1.1%20Анон.курс.с%20аннотац.комплекс.тем.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.2 Специфика оптимизации пользования профессионально-личностными ресурсами</td>
                            <td><span class="badge badge-warning">MS PowerPoint</span></td>
                            <td><a href="/uploads/buttons/2/12/1.2%20Спец.опт.польз.проф.-лич.р,слайды.pptx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        <tr>
                            <td>1.3 Оптимизация применения профессионально-личностных ресурсов</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/12/1.3%20Оптим.пользов.проф-личн.ресурс..doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>

                        <!--
                        <tr>
                            <td>1.4 Метод.матер. к практическ.заданию.doc</td>
                            <td><span class="badge badge-primary">MS Word</span></td>
                            <td><a href="/uploads/buttons/2/12/1.4%20Метод.матер.%20к%20практическ.заданию.doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        </tr>
                        -->

                    <? endif; ?>

                    </tbody>
                </table>

            <? else: ?>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th colspan="2">Название раздела</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Кн.2.1  Методические материалы к занятию 1:<br>
                                «Введение в технологию и администратичное обеспечение оптимизации управления человеческими ресурсами»
                            </td>
                            <td><a href="/button/2/1/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.2  Методические материалы к занятию 2:<br>
                                «Пользвание ресурсами характера»
                            </td>
                            <td><a href="/button/2/2/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.3  Методические материалы к занятию 3:<br>
                                «Пользование ресурсами мотивации ведущих жизненых ценностей»
                            </td>
                            <td><a href="/button/2/3/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.4  Методические материалы к занятию 4:<br>
                            «Пользование ресурсами индивидуальных свойств поведения»
                            </td>
                            <td><a href="/button/2/4/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.5  Методические материалы к занятию 5:<br>
                            «Польховаие ресурсами личностных состояний»
                            </td>
                            <td><a href="/button/2/5/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.6  Методические материалы к занятию 6:<br>
                            «Пользование ресурсами управленческих установок»
                            </td>
                            <td><a href="/button/2/6/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.7  Методические материалы к занятию 7:<br>
                            «Пользование ресурсами регуляторов взаимодействия»
                            </td>
                            <td><a href="/button/2/7/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.8  Методические материалы к занятию 8:<br>
                            «Пользование ресурсоми темперамента»
                            </td>
                            <td><a href="/button/2/8/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.9  Методические материалы к занятию 9:<br>
                            «Пользование ресурсами межполушарной асиметрии и типа личности»
                            </td>
                            <td><a href="/button/2/9/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Индивидуальное практическое пособие для успешной самореализации <br> «Оптимизация пользования одаренностью личностными ресурсами»</td>
                            <td><span class="badge badge-warning">Платный</span></td>
                        </tr>
                        <tr>
                            <td>Кн.2.10  Методические материалы к занятию 10:<br>
                            «Пользование ресурсами эмоциональной сферы психики»
                            </td>
                            <td><a href="/button/2/10/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.11  Методические материалы к занятию 11:<br>
                            «Польхование общими умственными способностями»
                            </td>
                            <td><a href="/button/2/11/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>
                        <tr>
                            <td>Кн.2.12  Методические материалы к занятию 12:<br>
                            «Оптимизация пользования профессионально-личностными ресурсами»
                            </td>
                            <td><a href="/button/2/12/" class="btn btn-sm btn-success">Перейти</a></td>
                        </tr>

                    </tbody>
                </table>

            <? endif; ?>

        <? elseif( $this->GET[0] == 3): ?>

            <h3> Пользование контентом Технологии </h3> <br><br>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Название документа</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Кн. 3.1 Исходники к построению партнёрских отношений</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><span class="badge badge-warning">Платный</span></td>
                        <!--
                        <td><a href="/uploads/buttons/3/1_petrov_petr_01_01_1990.docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        -->
                    </tr>
                    <tr>
                        <td>Кн.3.2 Пользование личностными ресурсами сотрудниками компании</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" >Просмотреть / Скачать</button></td>
                        <!--
                        <td><a href="/uploads/buttons/3/2_petrov_petr_01_01_1990.docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        -->
                    </tr>
                    <tr>
                        <td>Кн.3.3 Утверждённое положение о мотивации</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" >Просмотреть / Скачать</button></td>
                        <!--
                        <td><a href="/uploads/buttons/3/3_3.3.1%20Пол.о%20мот.сотр.подр.001%20....doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        -->
                    </tr>
                    <tr>
                        <td>Кн.3.4 Обезличенное положение о мотивации</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" >Просмотреть / Скачать</button></td>
                        <!--
                        <td><a href="/uploads/buttons/3/4_3.3.1%20Пол.о%20мот.сотр.подр.001%20....doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                        -->
                    </tr>
                    <tr>
                        <td>Кн.3.5 Распорядительные документы</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><a href="/uploads/buttons/3/5_3.5.1%20Приказ%20об%20адм.обесп.оп.уп.ч.р..doc" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                    </tr>

                    <!-- Модальное окно -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Информация</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    Данная кнопка отражает архитектуру контента Технологии и служит напоминанием о целесообразности применения подобной архитектуры на информационном ресурсе Пользователя услугой «Успешная самореализация»
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tbody>
            </table>

        <? elseif( $this->GET[0] == 4): ?>

            <h3> Дополнительная информация </h3> <br><br>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th colspan="2">Название документа</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4.1 Коротко об условиях Успешной самореализации</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><a href="/uploads/buttons/4/4.1%20Коротко%20об%20усл.Успешн.самореал..docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                    </tr>
                    <tr>
                        <td>4.2 Анонс семинара-тренинга(коучинг) АТОС-ИСИ</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><a href="/uploads/buttons/4/4.2%20Анон.сем.-трен.(коуч)АТОС-ИСИ.docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                    </tr>
                    <tr>
                        <td>4.3 Объявления</td>
                        <td><span class="badge badge-primary">MS Word</span></td>
                        <td><a href="/uploads/buttons/4/4.3.docx" class="btn btn-sm btn-success" target="_blank">Просмотреть / Скачать</a></td>
                    </tr>

                </tbody>
            </table>

        <? endif; ?>

        <!--
        <div class="col-md-12 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">Лента тестов <?=$this->GET[0] ?> </h2>
                <h3>(в процессе разработки)</h3>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            </div>

        </div>
        -->

    </div>

</main>

<!-- Подключение футера -->
<? $this->includes('footer'); ?>