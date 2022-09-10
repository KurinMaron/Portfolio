$(function (){  //HTMLを読み込んでjQuery実行、というおまじない
    var like = $('.js-like-toggle');  //toggle=on/off button
    var likePostId;
    console.log('test');
    console.log($('mata[name="csrf-token"]').attr('content'));
    like.on('click', function(){
        var $this = $(this);
        likePostId = $this.data('postid');
        
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('mata[name="csrf-token"]').attr('content')
            },  //おまじない、ajaxを利用するためのCSRFトークン設定
            
            url: '/ajaxlike',  //route
            type: 'POST',  //受け取り方法
            data: {
                'post_id': likePostId  //Controllerに渡すparameter、$requestに値が渡される
            },
        })
        
        //Ajaxリクエストが成功した場合
        .done(function (data){  //後に実行したい処理
            $this.toggleClass('loved');  //lovedクラス追加
            $this.next('.likeCount').html(data.postLikesCount);  //.likeCountの次の要素のhtmlをdata.postlikeCountの値に置換
            
        })
        
        //Ajaxリクエストが失敗の場合
        .fail(function(data, xhr, err){  //エラー時の処理
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
        
        return false;
    });
});