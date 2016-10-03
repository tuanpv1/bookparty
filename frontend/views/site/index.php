<?php
use common\models\Book;
use yii\helpers\Url;
?>
<!-- content -->
<div class="content" xmlns="http://www.w3.org/1999/html">

    <!-- slide -->
    <div class="container slider">
        <div id="slide-main" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php if (isset($banner) && !empty($banner)) {
                    $i = 0;
                    foreach ($banner as $item) {
                        ?>
                        <li data-target="#slide-main" data-slide-to="<?= $i ?>"
                            class="<?= $i == 0 ? 'active' : '' ?>"></li>
                        <?php $i++;
                    }
                } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                if(isset($banner)) {
                    $i = 0;
                    foreach ($banner as $item) {
                        ?>
                        <div class="item <?php if ($i == 0) { ?> active <?php } ?>">
                            <img src="<?= $item->getImageLink() ?>" alt="<?= $item->name?>">
                            <div class="carousel-caption">
                                <div>
                                    <h3><a><?= $item->name?></a></h3>
                                    <?= $item->des ?><br>
                                    <a href="<?=Url::toRoute(['course/pay','course_id'=>$item->id])?>" class="bt-more-1">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </div> <!-- Carousel -->
    </div>
    <!-- end slide -->

    <!-- List NEW block-->

    <div class="container">
        <div class="news-block cm-block">
            <h2 class="text-center">Giỏ hàng hiện có: <span id="sl" style="color: #61ffb0"> <?= $total.' Món ăn' ?></span> <span class="glyphicon glyphicon-shopping-cart"></span></h2>
            <h2>CHƯƠNG TRÌNH GIẢM GIÁ<a href="<?= Url::toRoute(['document/index'])?>"><span>Tất cả</span><i class="fa fa-chevron-right"></i></a></h2>
            <div class="list-item">
                <?php
                if(isset($sale)) {
                    foreach($sale as $item) {
                        ?>
                        <div class="news">
                            <div class="if-cm-2">
                                <a href=""><h3 class="name-1"><?= $item->name?></h3><br></a>
                                <span class="des-cm-1"><?= $item->des?$item->des:'Đang cập nhật'?> </span>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!--end list CT block-->
    <div class="container">
        <div class="block-x">
            <div class="top-bl-x">
                <span class="tit-x">MÓN ĂN TRONG NGÀY</span>
            </div>
            <?php
            if(isset($food)) {
                foreach($food as $item) {
                    ?>
                    <div class="x-in-list">
                        <div class="thumb-common">
                            <img src="<?= Yii::getAlias('@web')?>/img/blank2.gif">
                            <a href="<?= Url::toRoute(['user/view','id'=>$item->id])?>"><img id="anhsanpham" class="thumb-cm" src="<?= $item->getImageLink() ?>"><br></a>
                        </div>
                        <h4><p id="tensp"><?= $item->name ?><a onclick="addCart(<?= $item->id ?>)"><img width="40px" src="<?= Yii::getAlias('@web')?>/img/add_cart.png" alt=""></a></p></h4>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="text-center">
                <a href="<?= Url::toRoute(['food/index'])?>" class="more-2">Xem thêm món ăn</a>
            </div>
            <!-- abc -->
            <div class="tab-key">
                <ul>
                    <li class="active"><a href="">Tất cả</a></li>
                    <li><a href="">A</a></li>
                    <li><a href="">B</a></li>
                    <li><a href="">C</a></li>
                    <li><a href="">D</a></li>
                    <li><a href="">E</a></li>
                    <li><a href="">G</a></li>
                    <li><a href="">H</a></li>
                    <li><a href="">K</a></li>
                    <li><a href="">L</a></li>
                    <li><a href="">M</a></li>
                    <li><a href="">N</a></li>
                    <li><a href="">O</a></li>
                    <li><a href="">P</a></li>
                    <li><a href="">Q</a></li>
                    <li><a href="">R</a></li>
                    <li><a href="">S</a></li>
                    <li><a href="">T</a></li>
                    <li><a href="">U</a></li>
                    <li><a href="">V</a></li>
                    <li><a href="">X</a></li>
                    <li><a href="">Y</a></li>

                </ul>
            </div>
        </div>
    </div>
    <!--Customer block-->

    <div class="container">
        <div class="news-block cm-block text-center">
            <div class="col-md-6 bt-tp "><a href="<?= Url::to(['site/book','type'=>Book::TYPE_FOOD])?>">Đặt cơm</a></div>
            <div class="col-md-6 bt-tp"><a href="<?= Url::to(['site/book','type'=>Book::TYPE_PARTY])?>">Đặt tiệc</a></div>
        </div>
    </div>

    <div class="container">
        <div class="banner-block clearfix">
            <img src="<?= Yii::getAlias('@web')?>/img/banner2.png">
        </div>
    </div>

    <!--end banner block-->

    <!--partner block-->
    <div class="partner-block clearfix">
        <div class="container">
            <h2>CÁC GÓI ĐẶT TIỆC<a href="<?= Url::toRoute(['package/index'])?>"><span>Tất cả</span><i class="fa fa-chevron-right"></i></a></h2>
            <ul class="bxslider3">
                <?php
                if(isset($package)) {
                    foreach($package as $item) {
                        ?>
                        <li>
                            <a href="<?= Url::toRoute(['package/view','id'=>$item->id])?>">
                                <img src="<?= $item->getImageLink() ?>">
                                <h3><?= $item->name?></h3>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!--end partner-->

</div>
<!-- end content -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông Tin Mua Hàng</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 clearfix">
                        <img data-src="#" alt="" class="thumbnail" id="idanh" width="250px">
                    </div>
                    <div class="col-md-5 col-xs-12 col-sm-12">
                        <h4 class="alert alert-success" id="TenSP">Tên món ăn</h4>
                        <p class="red"><span id = "giaid"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= Url::to(['site/detail'])?>">Xem đơn đặt</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tiếp tục mua hàng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    var url="<?php echo Yii::$app->request->baseUrl ?>";
    function addCart(id) {

        tenSanPham = $("#tensp").text();
        $("#TenSP").text(tenSanPham);

        imgSource = $("#anhsanpham").attr("src");
        $("#idanh").attr({
            "src":imgSource
        });
        $.post(url+'/ShoppingCart/AddCart',{"productid":id}, function(data){
            $("#sl").text(data);
            $("#modal").modal('show');
        });
    }
</script>