<?php 

// $link = mysqli_connect('localhost', 'root', '');
// 	if (!$link) 
// 	{
// 	    die('Could not connect: ' . mysqli_error($link));
// 	}
// 	mysqli_select_db($link,'gestion_bibliotheque');
try {
	//code...
	$pdo = new PDO ('mysql:host=localhost;dbname=gestion_bibliotheque','root','');
} catch (PDOException $e) {
	echo "<p>Erreur: ".$e->get_message();
	die();
}

//  ?>
<?php 
// try {
//     $host = 'autorack.proxy.rlwy.net'; // المضيف العام
//     $port = 31339; // المنفذ العام (من MYSQL_PUBLIC_URL)
//     $dbname = 'gestion_bibliotheque'; // اسم قاعدة البيانات
//     $username = 'root'; // اسم المستخدم
//     $password = 'CFekxMuOxepjPzblNokuOLSeBlkvdkOj'; // كلمة المرور

//     // إنشاء الاتصال بـ PDO
//     $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);

//     // تعيين وضع الأخطاء
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// } catch (PDOException $e) {
//     echo "<p>Erreur: " . $e->getMessage();
//     die();
// }
?>

