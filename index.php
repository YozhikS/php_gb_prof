<?
class Product {
	private $id;
	private $title;
	private $image;
	private $price;

	public function __construct($id = NULL, $title = "", $image = "", $price = 0){
		$this->id = $id;
		$this->title = $title;
		$this->image = $image;
		$this->price = $price;
	}

	public function getId(){
		return $this->id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getImage(){
		return $this->image;
	}

	public function getPrice(){
		return $this->price;
	}

	public function render(){
		return "<div id='{$this->id}'>
			<p>Товар: {$this->title}</p>
			<img src='{$this->image}'>
			<p>Цена: {$this->price}руб.</p>
			</div>";
	}
}

class CartProduct extends Product {
	private $count;

	public function __construct($product, $count = 0){
		parent::__construct($product->getId(), $product->getTitle(), $product->getImage(), $product->getPrice());
		$this->count = $count;
	}

	public function getCount(){
		return $this->count;
	}

	public function getId(){
		return parent::getId();
	}

	public function getTitle(){
		return parent::getTitle();
	}

	public function getImage(){
		return parent::getImage();
	}

	public function getPrice(){
		return parent::getPrice();
	}

	public function getSumm(){
		return $this->count*parent::getPrice();
	}

	public function render(){
		return "<div id='{$this->getId()}'>
			<p>Товар: {$this->getTitle()}</p>
			<p>Цена: {$this->getPrice()}руб.</p>
			<img src='{$this->getImage()}'>
			<p>Количество: {$this->count}</p>
			<p>Стоимость: {$this->getSumm()}руб.</p>
			</div>";
	}
}

$product1 = new Product(1,"beer", "https://shanghai-paper.com/wp-content/uploads/2020/06/Beer-in-China-696x348.jpg", 100);

$product2 = new CartProduct($product1, 100);

echo $product1->render();

echo "Товар из корзины:";
echo $product2->render();


class A {
    public function foo() {
        static $x = 0; //единственный экземпляр для всех объектов данного класса
        echo ++$x; 
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

class A {
    public function foo() {
        static $x = 0; 
        echo ++$x;
    }
}
class B extends A { //наследование класса (и метода) приводит к тому, что всё-таки создается новый метод
}
$a1 = new A();
$b1 = new B(); 
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A { 
}
$a1 = new A; //не нашел в чем особенность, из курса ООП забыл в чем разница A() или A
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 