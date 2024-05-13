<?php

class Item {
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public float $old_price;
    public string $category;
    public string $condition;
    public string $location;
    public string $main_image;
    public int $seller_id;
  

    public function __construct(int $id, string $name, string $description, float $price, string $category, string $condition, string $location, string $main_image, int $seller_id){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
        $this->condition = $condition;
        $this->location = $location;
        $this->main_image = $main_image;
        $this->seller_id = $seller_id;
        $this->old_price = 0.0;
    }

    static function findItem($id, $db): ?Item {
        $query = 'SELECT * FROM Items WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        $item = $stmt->fetch();
        
        if($item){
            $seller_id = (int) $item['seller_id']; // Cast to integer
            $item_id = (int) $item['id']; // Cast to integer
            return new Item(
                $item_id,
                $item['name'],
                $item['description'],
                $item['price'],
                $item['category'],
                $item['condition'],
                $item['location'],
                $item['main_image'],
                $seller_id,
            );
        } else {
            return NULL;
        }
    }

    static function addItem($id, $name, $description, $price, $category, $condition, $location, $main_image, $seller_id, $db){
        $query = 'INSERT INTO Items (id, name, description, price, old_price, category, condition, location, main_image, seller_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id, $name, $description, $price, null, $category, $condition, $location, $main_image, $seller_id));
    }

    static function editItem($id, $name, $description, $price, $category, $condition, $location, $main_image, $seller_id, $db){
        //get old item price
        $item = Item::findItem($id, $db);
        $old_price = $item->price;
        $query = 'UPDATE Items SET name = ?, description = ?, price = ?, old_price = ?, category = ?, condition = ?, location = ?, main_image = ?, seller_id = ? WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($name, $description, $price, $old_price, $category, $condition, $location, $main_image, $seller_id, $id));

    }

    static function deleteItem($id, $db){
        $query = 'DELETE FROM Items WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
    }

    static function findMyItems($seller_id, $db) {
        $query = 'SELECT * FROM Items WHERE seller_id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($seller_id));
        $items = $stmt->fetchAll();
        return $items;
    }

    static function getSeller($id, $db) : int{
        $query = 'SELECT seller_id FROM Items WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        $seller_id = $stmt->fetchColumn();
        return $seller_id;
    }
        




}
?>
