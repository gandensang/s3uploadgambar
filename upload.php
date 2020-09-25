<?php

// Include the SDK using the composer autoloader
require 'vendor/autoload.php';

/*
bagian ini tidak perlu di edit atau modifikasi sedikitpun
karena berisi informasi dari api system s3
*/
$s3 = new Aws\S3\S3Client([
	'region'  => 'ap-southeast-1',
	'version' => 'latest',
	'credentials' => [
	    'key'    => "AKIAIOG73KHWVM5Z3LDQ",
	    'secret' => "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",
	]
]);

/* merubah nama file untuk di simpan, nama file harus ekstra hati hati
 mengingat pengguna web ada ratusan ribu jenis orang yang berbeda beda
sehingga besar kemungkinan mendapati nama file yang sama, ini sangat berbahaya dan beresiko
jika menggunakan c# bisa menggunakan GUID biar unik setiap filenya
*/
$key = 'namafileorang.jpg';

$result = $s3->putObject([
	'Bucket' => 'datapemilihlapangan', // jangan di rubah, ini adalah nama folder penyimpanan
	'Key'    => $key, // variable untuk nama file di atas
    'Body'   => 'this is the body!',
    'ACL'    => 'public-read',
    // ini adalah path atau root gambar yang ingin di upload
	'SourceFile' => 'C:\Users\gandensang\Desktop\gambar.png' 
]);

// Print the body of the result by indexing into the result object.
var_dump($result);