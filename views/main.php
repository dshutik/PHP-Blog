<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <ul class="nav nav-pills nav-justified">
                <li class="active">
                    <a data-toggle="pill" href="#pills-home">Популярные статьи</a>
                <li>
                    <a data-toggle="pill" href="#pills-profile">Все статьи</a>
                </li>
                <li>
                    <a data-toggle="pill" href="#pills-contact">Создать статью</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade in active" id="pills-home">
                    <?php foreach ($arr1 as $item) :?>
                        <div class="post-preview">
                            <a href="index.php?page=article&id=<?=$item['id']?>">
                                <h2 class="post-title">
                                    <?=$item['title']?>
                                </h2>
                                <h3 class="post-subtitle">
                                    <?=substr($item['text'],0,100)?>
                                </h3>
                            </a>
                            <p class="post-meta">Автор: <a href="#"><?=$item['author']?></a> Время публикации: <span style="color: #333;"><?=$item['date'].' '.$item['time']?></span>  Комментариев: <span style="color: #333;"><?=($item['count']==0) ? 0 : $item['count']?></span></p>
                        </div>
                        <hr>
                    <?php endforeach;?>
                </div>
                <div class="tab-pane fade" id="pills-profile">
                    <?php foreach ($arr2 as $item) :?>
                        <div class="post-preview">
                            <a href="index.php?page=article&id=<?=$item['id']?>">
                                <h2 class="post-title">
                                    <?=$item['title']?>
                                </h2>
                                <h3 class="post-subtitle">
                                    <?=substr($item['text'],0,100)?>
                                </h3>
                            </a>
                            <p class="post-meta">Автор: <a href="#"><?=$item['author']?></a> Время публикации: <span style="color: #333;"><?=$item['date'].' '.$item['time']?></span>  Комментариев: <span style="color: #333;"><?=($item['count']==0) ? 0 : $item['count']?></span></p>
                        </div>
                        <hr>
                    <?php endforeach;?>
                </div>
                <div class="tab-pane fade" id="pills-contact">
                    <form method="post" action="index.php?page=addArticle" style="text-align: center;padding-top: 50px;">

                        Название статьи: <br>
                        <input type="text" name="title"><Br>
                        Текст статьи: <br>
                        <textarea cols="40" rows="10" name="text"></textarea><Br>
                        Автор статьи: <br>
                        <input type="text" name="author">

                        <input type="hidden" name="date" value="<?php echo date('Y-m-d');?>">
                        <input type="hidden" name="time" value="<?php echo date('H:i:s');?>">
                        <p><input type="submit" name="add" value="Создать"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>