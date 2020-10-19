<?php

/**
 * Product model data access and manipulation (DAM) class.
 * This version is vulnerable to SQL injection.
 *
 * @author jam
 * @version 201018
 */
class ProductDAM extends DAM {

    // Database connection is inherited from the parent.
    function __construct() {
        parent::__construct();
    }

    /**
     * Read the Product object from the database with the specified ID
     * @param type $productID the ID of the product to be read.
     * @return \Product the resulting Product object - null if product is
     * not in the database.
     */
    public function readProduct($productID) {
        $query = 'SELECT * FROM products
              WHERE productID = \''. $productID . '\'';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $productDB = $statement->fetch();
        $statement->closeCursor();
        if ($productDB == null) {
            return null;
        } else {
            return new Product($this->mapColsToVars($productDB));
        }
    }

    /**
     * Read all the Product objects in the database.
     * @return \Product an array of Product objects.
     */
    public function readProducts() {
        $query = 'SELECT * FROM products
              ORDER BY productID';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $productsDB = $statement->fetchAll();
        $statement->closeCursor();

        // Build an array of Product objects
        $products = array();
        foreach ($productsDB as $key => $value) {
            $products [$key] = new Product($this->mapColsToVars($productsDB[$key]));
        }
        return $products;
    }

    /**
     * Read all the Product objects in the database with the specified
     * categoryID.
     * @param type $categoryID the ID of the product category to be read.
     * @return \Product an array of Product objects.
     */
    public function readProductsByCategoryId($categoryID) {
        $query = 'SELECT * FROM products
              WHERE categoryID = \''. $categoryID . '\'
              ORDER BY productID';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $productsDB = $statement->fetchAll();
        $statement->closeCursor();

        // Build an array of Product objects
        $products = array();
        foreach ($productsDB as $key => $value) {
            $products [$key] = new Product($this->mapColsToVars($productsDB[$key]));
        }
        return $products;
    }

    /**
     * Write the specified product to the database. If the product is not
     * in the database, the object is added. If the product is already in the
     * database, the object is updated.
     * @param type $product the Product object to be written.
     */
    public function writeProduct($product) {

        // Check to see if the product is already in the database.
        $query = 'SELECT productID FROM products
              WHERE productID = \''. $product->id . '\'';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $productDB = $statement->fetch();
        $statement->closeCursor();
        if ($productDB == null) {

            // Add a new product to the database
            $query = 'INSERT INTO products
                (categoryID, productCode, productName,
                 description, listPrice, discountPercent)
              VALUES
                (\'' . $product->categoryId . '\', \'' .
                    $product->productCode . '\', \'' .
                    $product->name . '\', \'' .
                    $product->description . '\', \'' .
                    $product->listPrice . '\', \'' .
                    $product->discountPercent . '\')';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
        } else {

            // Update an existing Product.
            $query = 'UPDATE products
              SET productName = \'' . $product->name . '\',
                  productCode = \'' . $product->productCode . '\',
                  listPrice = \'' . $product->listPrice . '\',
                  discountPercent = \'' . $product->discountPercent . '\',
                  categoryID = \'' . $product->categoryId . '\',
                  description = \'' . $product->description . '\'
              WHERE productID = \'' . $product->id . '\'';

            $statement = $this->db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
        }
    }

    /**
     * Delete the specified Product object from the database.
     * 
     * @param type $product the Product object to be deleted.
     */
    public function deleteProduct($product) {
        $this->deleteProductById($product->id);
    }

    /**
     * Delete the Product object from the database with the specified ID.
     * 
     * @param type $productID the ID of the Product to be deleted.
     */
    public function deleteProductById($productID) {
        $query = 'DELETE FROM products WHERE productID = \'' . $productID . '\'';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    }

    // Translate database columnames to object instance variable names
    private function mapColsToVars($colArray) {
        $varArray = array();
        foreach ($colArray as $key => $value) {
            if ($key == 'productID') {
                $varArray ['id'] = $value;
            } else if ($key == 'categoryID') {
                $varArray ['categoryId'] = $value;
            } else if ($key == 'productCode') {
                $varArray ['productCode'] = $value;
            } else if ($key == 'productName') {
                $varArray ['name'] = $value;
            } else if ($key == 'description') {
                $varArray ['description'] = $value;
            } else if ($key == 'listPrice') {
                $varArray ['listPrice'] = $value;
            } else if ($key == 'discountPercent') {
                $varArray ['discountPercent'] = $value;
            }
        }
        return $varArray;
    }
}
