
//googleMapsAPIの表示にcallback=initMapと記述したためinitMap関数を作成
function initMap() {
    var target = document.getElementById('map'); //マップを表示する要素を指定
  var address = point; //住所を指定
  var geocoder = new google.maps.Geocoder();  

  geocoder.geocode({ address: address }, function(results, status){
    if (status === 'OK' && results[0]){

      console.log(results[0].geometry.location);

       var map = new google.maps.Map(target, {  
         center: results[0].geometry.location,
         zoom: 18
       });

       var marker = new google.maps.Marker({
         position: results[0].geometry.location,
         map: map,
         animation: google.maps.Animation.DROP
       });

    }else{ 
      //住所が存在しない場合の処理
      alert('住所が正しくないか存在しません。');
      target.style.display='none';
    }
  });
}