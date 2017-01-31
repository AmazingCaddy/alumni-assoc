<!DOCTYPE html>
<html lang="zh">
    <head>
        <title>404 Not Found</title>
        <?php //View::load('common/module/header'); ?>
    </head>
    <body>
        <div class="layout">
            <div class="container">
                <div class="row">
                    <div class="offset2 span8" style="text-align:center;">
                        <h2>对不起，没有找到您所请求的页面</h2>
                        <div style="margin-top: 20px;">
                            <p>页面将于<span id="second_count">5</span>秒后返回首页，您也可以点击链接<a href="/">返回首页</a></p>
                        </div>
                    </div>
                    <!--/.span8-->
                </div>
            </div>
        </div>
        <?php //View::load('common/module/footer'); ?>
        <script type="text/javascript">
            $(function() {
                var time_count = 5;
                setInterval(
                    function () {
                        time_count --;
                        $('#second_count').html(time_count);
                    },
                    1000
                );
                setTimeout(
                    function go_pre () {
                        location.href = '/';
                    }, 
                    5000
                );
            });
        </script>
    </body>
</html>