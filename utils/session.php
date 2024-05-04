<?php
  class Session {
    private array $messages;
    private $item_id;
    private array $checkoutItems;

    public function __construct() {
      session_start();

      $this->messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
      $this->item_id = isset($_SESSION['item_id']) ? $_SESSION['item_id'] : null;
      $this->checkoutItems = isset($_SESSION['checkoutItems']) ? $_SESSION['checkoutItems'] : array();
      unset($_SESSION['messages']);
    }

    public function isLoggedIn() : bool {
      return isset($_SESSION['id']);    
    }

    public function logout() {
      session_destroy();
    }

    public function getId() : ?int {
      return isset($_SESSION['id']) ? $_SESSION['id'] : null;    
    }

    public function getItemId() : ?int {
      return isset($_SESSION['item_id']) ? $_SESSION['item_id'] : null;    
    }

    public function getCheckoutItems() : array {
      return $this->checkoutItems;
    }

    public function addCheckoutItem(int $item_id) {
      //check if item is already in the checkoutItems 
      if(in_array($item_id, $this->checkoutItems)) {
        return;
      }

      $_SESSION['checkoutItems'][] = $item_id;
    }

    public function removeCheckoutItem(int $item_id) {
      $key = array_search($item_id, $this->checkoutItems);
      if($key !== false) {
        unset($_SESSION['checkoutItems'][$key]);
      }
    }

    public function setItemId(int $item_id) {
      $_SESSION['item_id'] = $item_id;
    }

    public function addMessage(string $type, string $text) {
      $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages() {
      return $this->messages;
    }

    static function getName() : ?string {
      return isset($_SESSION['name']) ? $_SESSION['name'] : 'null';
    }

    static function getEmail() : ?string {
      return isset($_SESSION['email']) ? $_SESSION['email'] : 'null';
    }

    static function getPwd() : ?string {
      return isset($_SESSION['password']) ? $_SESSION['password'] : 'null';
    }

    public function setId(int $id) {
      $_SESSION['id'] = $id;
    }

    public function setName(string $name) {
      $_SESSION['name'] = $name;
    }

    public function setEmail(string $email) {
      $_SESSION['email'] = $email;
    }

    public function setUsername(string $username) {
      $_SESSION['username'] = $username;
    }

    public function setPwd(string $password) {
      $_SESSION['password'] = $password;
    }

  }
?>