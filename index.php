<?php
$randomsayilar=[];
$target;

function createrandom(){
global $randomsayilar;
global $target;

while(count($randomsayilar)<4){
    $random=rand(1,9);
    
if (in_array($random, $randomsayilar, true)) {
}
else {
    $randomsayilar[]+=$random;
}
  
    
}
$random=rand(1,9)*10;
$randomsayilar[]+=$random;
$random=rand(100,999);
$target=$random;    
}

$_GET['rastgele']=1;
if(isset($_GET['manuel'])){
    $randomsayilar[]+=$_GET['sayi1'];
    $randomsayilar[]+=$_GET['sayi2'];
    $randomsayilar[]+=$_GET['sayi3'];
    $randomsayilar[]+=$_GET['sayi4'];
    $ciftsayi=$_GET['sayicift']-$_GET['sayicift']%10;
    $randomsayilar[]+=$ciftsayi;
    $target=$_GET['target'];
    echo 'manuel';    
}
else if(isset($_GET['rastgele'])){
    createrandom();
    echo 'rastgele';    
}

    
echo 'target='.$target;

$Total=[];
echo '<br><br>Random Sayilar<pre>';print_r($randomsayilar);echo '<pre>';

$temp;
for($i=1111;$i<=4444;$i++){
    
$foo="$i";
$strsplit=str_split($foo); 
$haystack = ['5','6','7','8','9','0'];

if(count(array_intersect($haystack, $strsplit)) == 0 ){
 $bar=0; 
    
    foreach ($randomsayilar as $key => $val) {
  if($key==0){
      $bar=$val;
  }
else{
    
 if($foo[$key-1]=='1'){
     $bar+=$val;
 }else if($foo[$key-1]=='2'){
     
     $bar-=$val;
 }else if($foo[$key-1]=='3'){
     
     $bar*=$val;
 }else if($foo[$key-1]=='4'){
     
     $bar/=$val;
 }
    }
  
}
$Total+=[$foo=>abs($target-$bar)];
}    

}
asort($Total);
#print_r($Total);

 foreach ($Total as $key => $val) {
     echo '+- '.$val.' Değeri kadar yaklaşıldı.'.'<br><br>';
     $key = "$key";
     foreach ($randomsayilar as $keyf => $val) {
        if($keyf==0){
            echo $val;
            $sonuc=$val;
        }else{
          if($key[$keyf-1]=='1'){
     echo '+'.$val;
              $sonuc+=$val;
                }
          if($key[$keyf-1]=='2'){
     echo '-'.$val;
              $sonuc-=$val;
                }
        if($key[$keyf-1]=='3'){
     echo '*'.$val;
            $sonuc*=$val;
                }
         
      if($key[$keyf-1]=='4'){
     echo '/'.$val;
          $sonuc/=$val;
                }
        }
            
     }
     echo '='.$sonuc;
     break;
 }
?>
<form action="" method="GET">
 <p><input  type="submit" name="rastgele"; value="Rastgele"/></p>
</form>
<form action="" method="GET">
 <p>Sayı1 <input minlength="1" maxlength="1" type="text" name="sayi1" required /></p>
 <p>Sayı2 <input minlength="1" maxlength="1" type="text" name="sayi2"  required /></p>
 <p>Sayı3 <input minlength="1" maxlength="1" type="text" name="sayi3"  required /></p>
 <p>Sayı4 <input minlength="1" maxlength="1" type="text" name="sayi4"  required /></p>
 <p>Sayı5 Çift Basamak <input minlength="2" maxlength="2" type="text" name="sayicift" required /></p>
 <p>Hedef <input minlength="3" maxlength="3" type="text" name="target" required  /></p>
 <p><input type="submit" name="manuel" value="Manuel"  /></p>
</form>