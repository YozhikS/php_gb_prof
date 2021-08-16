<?
abstract class Product {
	private $id;
	private $title;
	private $image;
	private $price;
	private $costs;

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

	abstract function getSumm();

	abstract function getProfit();
}

class DigitalProduct extends Product {
	private $count;

	public function __construct($id = NULL, $title = "", $image = "", $price = 0, $count = 0){
		parent::__construct($id, $title, $image, $price);
		$this->count = $count;
	}

	public function getSumm(){
		return $this->count*parent::getPrice();
	}

	public function getProfit(){
		$ratio = 0.5;
		return $this->getSumm()*$ratio;
	}
}

class PieceProduct extends Product {
	private $count;

	public function __construct($id = NULL, $title = "", $image = "", $price = 0, $count = 0){
		parent::__construct($id, $title, $image, $price);
		$this->count = $count;
	}

	public function getSumm(){
		return $this->count*parent::getPrice();
	}

	public function getProfit(){
		$ratio = 1;
		return $this->getSumm()*$ratio;
	}
}

class BulkProduct extends Product {
	private $count;

	public function __construct($id = NULL, $title = "", $image = "", $price = 0, $count = 0){
		parent::__construct($id, $title, $image, $price);
		$this->count = $count;
	}

	public function getSumm(){
		return $this->count*parent::getPrice();
	}

	public function getProfit(){
		$ratio = 0.02*$this->count;
		return $this->getSumm()*$ratio;
	}
}

// $product1 = new Product(1,"Лицензия", "https://scontent-arn2-1.xx.fbcdn.net/v/t31.18172-8/14542459_653451241480571_1109330217809083179_o.jpg?_nc_cat=104&ccb=1-5&_nc_sid=6e5ad9&_nc_ohc=BGeq-bjk15gAX8CNZcC&_nc_ht=scontent-arn2-1.xx&oh=dcbaf4f949e1af0f08c2f621bd10e0bc&oe=613F659C", 15);
// $product2 = new Product(2,"Пыво", "https://shanghai-paper.com/wp-content/uploads/2020/06/Beer-in-China-696x348.jpg", 35);
// $product3 = new Product(3,"Соль", "https://images.ru.prom.st/843914750_w700_h500_sol-1-pomol.jpg", 0.0139);

$cartProduct1 = new DigitalProduct(1,"Лицензия", "https://scontent-arn2-1.xx.fbcdn.net/v/t31.18172-8/14542459_653451241480571_1109330217809083179_o.jpg?_nc_cat=104&ccb=1-5&_nc_sid=6e5ad9&_nc_ohc=BGeq-bjk15gAX8CNZcC&_nc_ht=scontent-arn2-1.xx&oh=dcbaf4f949e1af0f08c2f621bd10e0bc&oe=613F659C", 15, 10);
$cartProduct2 = new DigitalProduct(2,"Пыво", "https://shanghai-paper.com/wp-content/uploads/2020/06/Beer-in-China-696x348.jpg", 35, 24);
$cartProduct3 = new DigitalProduct(3,"Соль", "https://images.ru.prom.st/843914750_w700_h500_sol-1-pomol.jpg", 0.0139, 2863);

echo "Товар из корзины:";
echo $cartProduct1->render();
echo "общая стоимость: ".$cartProduct1->getSumm()."руб. прибыль от товара ".$cartProduct1->getProfit()."руб.";
echo $cartProduct2->render();
echo "общая стоимость: ".$cartProduct2->getSumm()."руб. прибыль от товара ".$cartProduct2->getProfit()."руб.";
echo $cartProduct3->render();
echo "общая стоимость: ".$cartProduct3->getSumm()."руб. прибыль от товара ".$cartProduct3->getProfit()."руб.";