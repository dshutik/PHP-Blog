
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 style="text-align: center"><?=$arr1['title']?></h1>
                <p><?=$arr1['text']?></p>
                <p class="post-meta">Автор: <a href="#"><?=$arr1['author']?></a> Время публикации: <span style="color: #333;"><?=$arr1['date'].' '.$arr1['time']?></span>  Комментариев: <span style="color: #333;"><?=($arr3['comments_count']==0) ? 0 : $arr3['comments_count']?></span></p>

                <h4 style="text-decoration: underline">Комментарии:</h4>
                <?php if($arr2) :?>
                <?php foreach ($arr2 as $item) :?>
                <div style="border-bottom: solid 1px #c0c0c0">
                    <p><?=$item['author']?></p>
                    <p><?=$item['text']?></p>
                </div>
                <?php endforeach;?>
                <?php else :?>
                <p>Комментариев нет.</p>
                <?php endif;?>
                <h2 style="padding-top: 50px;text-decoration: underline">Создать новый комментарий:</h2>
                <form method="post" action="index.php?page=article&id=<?=$arr1['id']?>">

                    Имя: <br>
                    <input type="text" name="author"><Br>
                    Текст комментария: <br>
                    <textarea cols="40" rows="10" name="text"></textarea><Br>


                    <p><input id="add-comment" type="submit" name="add" value="Создать"></p>
                </form>
            </div>
        </div>
    </div>
</article>

<hr>



