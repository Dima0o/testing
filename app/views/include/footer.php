        <footer class="blog-footer">
<!--            <p>Тестирование онлайн</p>-->
            <p>
                <a href="#">Наверх</a>
            </p>
            
        </footer>

        <!-- Подключение js скриптов -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="/tmp/dashboard/assets/jquery-slim.min.js"></script>
        <script src="/tmp/dashboard/assets/popper.min.js"></script>
        <script src="/tmp/dashboard/assets/bootstrap.min.js"></script>
        <script src="/tmp/dashboard/assets/holder.min.js"></script>
        <script>
            Holder.addTheme('thumb', {
                bg: '#55595c',
                fg: '#eceeef',
                text: 'Thumbnail'
            });
        </script>
        <script>
            var h_hght = 180; // высота шапки
            var h_mrg = 0;     // отступ когда шапка уже не видна
            $(function(){
                $(window).scroll(function(){
                    var top = $(this).scrollTop();
                    var elem = $('#top_nav');
                    if (top+h_mrg < h_hght) {
                        elem.css('top', (h_hght-top));
                    } else {
                        elem.css('top', h_mrg);
                    }

                    if ($(window).width() <= '995'){
                        elem.css('display','none');
                    }
                });
            });
            //$(input).click(function() {
              //  Console.log($(input).attr("date-log"));
                //var a =;
               // $($(input).attr("date-log")).css("color": "#f8f9fa","background-color":"#28a745");
               // Console.log(a);
             //   });
            $(".radio").click(function() {
               // console.log($( this ).attr("attrName"));
                //console.log($( this ));
                $('[attrName1='+$( this ).attr("attrName")+']').css({'color':'#f8f9fa', 'background-color': '#28a745'});
                //var a=$( this ).attr("attrName");
                //$('[date-value=a]').css({'color':'#f8f9fa', 'background-color': '#28a745'});
                //
            });

        </script>
    </body>
</html>