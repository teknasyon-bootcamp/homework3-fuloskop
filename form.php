<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */
class Form {
    public $action = "";
    public $method = "";
    public $fields = array();

    private function __construct($action,&$method="POST") { // contructer ile nesne oluşturulurken verileri içeriye yazıyoruz
        $this->action=$action;
        $this->method=$method;
    }

    public function addField(...$fields){ // addfield ile sınırsız parametre alıyoruz
        array_push($this->fields, $fields); //alınan tüm dataları arraye ekliyoruz
    }

    public function setMethod($method){
        $this->method=$method;  // nesnenin method özelliğini günelliyoruz
    }

    public function render(){ // tüm kısımları yazdırıyoruz
        echo "<form method='".$this->method."' action='".$this->action."'>
	<label for='".$this->fields[0][1]."'>".$this->fields[0][0]."</label>
	<input type='text' name='".$this->fields[0][1]."' value='' />
	<label for='".$this->fields[1][1]."'>".$this->fields[1][0]."</label>
	<input type='text' name='".$this->fields[1][1]."' value='' />
	<label for='".$this->fields[2][1]."'>".$this->fields[2][0]."</label>
	<input type='text' name='".$this->fields[2][1]."' value='".$this->fields[2][2]."' />
	<button type='submit'>Gönder</button>
</form>";
        //var_dump($this);
    }

    public static function createPostForm($action) {
        //$PostForm = new Form($action);
        $PostForm = self::createForm($action,"POST"); // self ile Form türünde nesne türetiyoruz
        //$PostForm->method="POST";
        return $PostForm;
    }
    public static function createGetForm($action) {
        //$GetForm = new Form($action);
        $GetForm = self::createForm($action,"GET");// self ile Form türünde nesne türetiyoruz
        //$GetForm->method="GET";
        return $GetForm;
    }
    public static function createForm($action,$method) {
        $Form = new Form($action,$method); // new ile Form türünde yeni nesne türetiyoruz
        return $Form;
    }
}