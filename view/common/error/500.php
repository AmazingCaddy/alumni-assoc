<!DOCTYPE html>
<html lang="zh">
    <head>
        <title>500 Internal Server Error</title>
        <?php //View::load('common/module/header'); ?>
    </head>
    <body>
        <div class="layout">
            <div class="container">
                <div class="row">
                    <div class="offset2 span8" style="text-align:center;">
                        <h2>对不起，服务器发生错误</h2>
                        <div style="margin-top: 20px;">
                            <p><?=$data;?></a></p>
                        </div>
                    </div>
                    <!--/.span8-->
                </div>
            </div>
        </div>
        <?php //View::load('common/module/footer'); ?>
    </body>
</html>