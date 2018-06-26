<?php
/*****************************************************************************************
 　ぐるなびWebサービスのレストラン検索APIで緯度経度検索を実行しパースするプログラム
 　注意：緯度、経度、範囲の値は固定で入れています。
 　　　　アクセスキーはユーザ登録時に発行されたキーを指定してください。
*****************************************************************************************/
 
//エンドポイントのURIとフォーマットパラメータを変数に入れる
$uri   = "https://api.gnavi.co.jp/RestSearchAPI/20150630/";
//APIアクセスキーを変数に入れる
$acckey= "c7969aa52587cc2112c531285173d4f6";
//返却値のフォーマットを変数に入れる
$format= "json";
//緯度・経度、範囲を変数に入れる
$lat   = '';
$lon   = '';
$range = '';
 
//URL組み立て
$url  = sprintf("%s%s%s%s%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey, "&latitude=", $lat,"&longitude=",$lon,"&range=",$range);
//API実行
$json = file_get_contents($url);
//取得した結果をオブジェクト化
$obj  = json_decode($json);
 
//結果をパース
//店舗番号、店舗名、最寄の路線、最寄の駅を出力
foreach((array)$obj as $key => $val){
   
   if(strcmp($key, "rest") == 0){
       foreach((array)$val as $restArray){
            if(checkString($restArray->{'id'}))   echo $restArray->{'id'}."\t";
            if(checkString($restArray->{'name'})) echo $restArray->{'name'}."\t";
            if(checkString($restArray->{'access'}->{'line'}))    echo (string)$restArray->{'access'}->{'line'}."\t";
            if(checkString($restArray->{'access'}->{'station'})) echo (string)$restArray->{'access'}->{'station'}."\t";

            echo "\n";
       }
 
   }
}
 
//文字列であるかをチェック
function checkString($input)
{
 
    if(isset($input) && is_string($input)) {
        return true;
    }else{
        return false;
    }
 
}
?>