
<!-- Подключение хедера -->
<? $this->includes('header'); ?>

<div style="padding-top: 20px;"></div>

<main role="main" class="container">
    <div class="row">

        <div class="col-md-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">Лента тестов</h2>
                <h3>(в процессе разработки)</h3>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            </div>

        </div>

        <aside class="col-md-4 blog-sidebar">

            <div class="p-3">

                <h4 class="font-italic">Разделы</h4>

                <div class="p-3 mb-3 bg-light rounded">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link <? if( $var['act'] == 'chains') echo 'active'; ?> active" href="/feed/all/">Все</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <? if( $var['act'] == 'partners') echo 'active'; ?>" href="/feed/buy/">Купленные</a>
                        </li>
                    </ul>
                </div>

            </div>

        </aside>

    </div>

</main>

<!-- Подключение футера -->
<? $this->includes('footer'); ?>