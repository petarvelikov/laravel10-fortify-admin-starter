<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // public function productItemCreate()
    // {
    //     $selectedGroupId = $_GET['group_id'];
    //     $subgroups = DB::table('product-item-sub-groups')->where('group_id', $selectedGroupId)->get();

    //     return response()->json($subgroups);
    // }


    // public function getProductItems()
    // {
    //     $products = DB::table('product-items')->orderBy('name', 'desc')->get();

    //     return response()->json([
    //         'products' => $products
    //     ]);
    // }


    // public function getProductItemsUnit()
    // {
    //     $selectedProductId = $_GET['product-id'];
    //     $productUnit = DB::table('product-items')
    //         ->join('product-item-units', 'product-items.unit_id', '=', 'product-item-units.id')
    //         ->where('product-items.id', $selectedProductId)
    //         ->select('product-item-units.id as unit_id', 'product-item-units.name as unit_name')
    //         ->first();

    //     return response()->json($productUnit);
    // }


    // public function getSelledProductsFromStorehouse()
    // {
    //     $productsForSell = DB::table('storehouse_stocks')
    //         ->join('product-items', 'storehouse_stocks.product_id', '=', 'product-items.id')
    //         ->join('product-item-units', 'product-items.unit_id', '=', 'product-item-units.id')
    //         ->join('delivery_product', 'product-items.id', '=', 'delivery_product.product_id')
    //         ->where('delivery_product.remaining_quantity', '>', 0)
    //         ->select(
    //             'storehouse_stocks.product_id as product_id',
    //             'product-items.name as product_name',
    //             'storehouse_stocks.total_quantity as data_product_storehouse_availability',
    //             'storehouse_stocks.average_unit_price as data_product_storehouse_average_unit_price',
    //             'product-item-units.name as data_product_unit_name'
    //         )
    //         ->orderBy('product-items.name', 'desc')
    //         ->groupBy('product-items.id')
    //         ->get();

    //     return response()->json([
    //         'productsForSell' => $productsForSell
    //     ]);
    // }


    // public function editRecipe()
    // {
    //     $action = $_GET["action"];

    //     // add new product
    //     if ($action == "add-new-product-to-edit-recipe") {
    //         $recipeId = $_GET["recipe-id"];
    //         $productId = $_GET["product-id"];
    //         $productQuantity = $_GET["product-quantity"];

    //         if ($productId) {
    //             DB::table('product_recipe')->insert([
    //                 'recipe_id' => $recipeId,
    //                 'product_item_id' => $productId,
    //                 'quantity' => $productQuantity != null ? $productQuantity : null
    //             ]);
    //         } else {
    //             return false;
    //         }
    //     }

    //     // delete product
    //     if ($action == "delete-product-to-edit-recipe") {
    //         $productId = $_GET["product-id"];

    //         DB::table('product_recipe')->where('id', $productId)->delete();
    //     }
    // }


    // public function createMenu()
    // {
    //     // delete all old data from recipe confirmed temp table on change selectBox for menu group
    //     DB::table('menu_recipe_confirmed_data_temp')->delete();

    // 	$menuObjectsGroup = $_GET['customer_group'];

    // 	$customersList = DB::table('menu_objects_groups_customer_objects')
    // 	    ->where('menu_objects_groups_customer_objects.menu_object_group_id', $menuObjectsGroup)
    //         ->join('customer-objects', 'menu_objects_groups_customer_objects.customer_object_id', '=', 'customer-objects.id')
    // 	    ->join('customers', 'customer-objects.customer_id', '=', 'customers.id')
    // 	    ->select(
    //             'customers.id as customer_id',
    //             'customers.name as customer_name',
    // 		    'customer-objects.id as customer_object_id',
    // 		    'customer-objects.name as customer_object_name'
    // 	    )
    // 	    ->orderBy('customers.name')
    // 	    ->orderBy('customer-objects.name')
    // 	    ->get();

    // 	$recipesList = DB::table('recipes')->orderBy('title')->get();
    // 	$recipeGroupsList = DB::table('recipe_groups')->orderBy('name')->get();

    // 	return response()->json(['customersList' => $customersList, 'recipesList' => $recipesList, 'recipeGroupsList' => $recipeGroupsList]);
    // }


    // public function createMenuDeleteRecipe()
    // {
    //     $deleteRecipeNumrow = $_GET['deleteRecipeNumrow'];

    //     DB::table('menu_recipe_confirmed_data_temp')->where('recipe_numrow', $deleteRecipeNumrow)->delete();
    // }


    // public function createMenuConfirmRecipe()
    // {
    //     $recipeId = $_GET['recipeId'];

    //     $recipeData = DB::table('product_recipe')
    //         ->join('recipes', 'product_recipe.recipe_id', '=', 'recipes.id')
    //         ->join('product-items', 'product_recipe.product_item_id', '=', 'product-items.id')
    //         ->join('product-item-units', 'product-items.unit_id', '=', 'product-item-units.id')
    //         ->leftJoin('compatible_products', 'product-items.id', '=', 'compatible_products.compatible_products_1_id')
    //         ->leftJoin('storehouse_stocks', 'product_recipe.product_item_id', '=', 'storehouse_stocks.product_id')
    //         ->where('product_recipe.recipe_id', $recipeId)
    //         ->select(
    //             'recipes.title as recipe_title',
    //             'product-items.id as product_id',
    //             'product-items.name as product_name',
    //             DB::raw('sum(product_recipe.quantity) as product_quantity'),
    //             'storehouse_stocks.total_quantity as product_storehouse_quantity',
    //             'product-item-units.name as product_unit',
    //             'compatible_products.compatible_products_2_id as compatible_product_id',
    //             'compatible_products.compatible_products_2_name as compatible_product_name',
    //             DB::raw('sum(product_recipe.quantity * (compatible_products.compatible_products_2_quantity / compatible_products.compatible_products_1_quantity)) as compatible_product_quantity')
    //         )
    //         ->orderBy('product_recipe.id')
    //         ->orderBy('compatible_product_name')
    //         ->groupBy('product_recipe.product_item_id')
    //         ->groupBy('compatible_product_id')
    //         ->get();

    //     $compatibleProductStorehouseQuantity = [];
    //     foreach ($recipeData as $value) {
    //         array_push($compatibleProductStorehouseQuantity, DB::table('storehouse_stocks')->where('product_id', $value->compatible_product_id)->value('total_quantity'));
    //     }

    //     return response()->json(['recipeData' => $recipeData, 'compatibleProductStorehouseQuantity' => $compatibleProductStorehouseQuantity]);
    // }


    // public function createMenuConfirmRecipeTemp()
    // {
    //     $recipeNumrow = $_POST['recipeNumrow'];
    //     $recipeGroupId = $_POST['recipeGroupId'];
    //     $recipeId = $_POST['recipeId'];
    //     $productIdArr = $_POST['productIdArr'];
    //     $productQuantityArr = $_POST['productQuantityArr'];

    //     for ($i=0; $i < count($productIdArr); $i++) {
    //         $insertData = [
    //             'recipe_numrow' => $recipeNumrow,
    //             'recipe_group_id' => $recipeGroupId,
    //             'recipe_id' => $recipeId,
    //             'product_id' => $productIdArr[$i],
    //             'product_quantity' => $productQuantityArr[$i]
    //         ];

    //         DB::table('menu_recipe_confirmed_data_temp')->insert($insertData);
    //     }
    // }


    // public function editMenuDeleteRecipeRow()
    // {
    //     $rowIds = $_POST['ids'];
    //     $editedMenuId = $_POST['editedMenuId'];
    //     $action = $_POST['action'];

    //     $numRow = DB::table('menu_customer_recipe')->where('menu_id', $editedMenuId)->where('id', $rowIds[0])->value('numrow');

    //     if ($action == "edit-menu-delete-recipe-row") {
    //         DB::table('menu_recipe_confirmed_data')->where('menu_id', $editedMenuId)->where('recipe_numrow', $numRow)->delete();

    //         DB::table('menu_customer_recipe')->whereIn('id', $rowIds)->delete();
    //     }
    // }


    // public function editMenuAddNewRecipeAndConfirmedRecipe()
    // {
    //     $menuId = $_POST["menuId"];
    //     $menuData = $_POST["menuData"];
    //     $recipeId = $_POST["recipeId"];
    //     $nextNumRow = $_POST["nextNumRow"];
    //     $customerIdArr = $_POST["customerIdArr"];
    //     $customerObjectsIdArr = $_POST["customerObjectsIdArr"];
    //     $quantityArr = $_POST["quantityArr"];
    //     $recipeGroupId = $_POST["recipeGroupId"];
    //     $productIdArr = $_POST["productIdArr"];
    //     $productQuantityArr = $_POST["productQuantityArr"];
    //     $recipeTotalQuantity = $_POST["recipes_total_quantity"];
    //     $action = $_POST['action'];

    //     // generate meals batch number
    //     $batchNumberDate = date("Ymd", strtotime($menuData));
    //     $mealsBatchNumber = "L" . $batchNumberDate . "-" . $menuId . "-" . $recipeId . "-" . $nextNumRow;

    //     if ($menuData && $menuId && $recipeId && $nextNumRow && $customerIdArr && $customerObjectsIdArr && $quantityArr && $action == "edit-menu-add-new-recipe-row-and-confirmed-recipe") {
    //         for ($i = 0; $i < count($customerObjectsIdArr); $i++) {
    //             $insertData = [
    //                 'menu_id' => $menuId,
    //                 'customer_id' => $customerIdArr[$i],
    //                 'customer_object' => $customerObjectsIdArr[$i],
    //                 'recipe_id' => $recipeId,
    //                 'quantity' => $quantityArr[$i] ? $quantityArr[$i] : null,
    //                 'numrow' => $nextNumRow
    //             ];
    //             DB::table('menu_customer_recipe')->where('menu_id', $menuId)->insert($insertData);
    //         }

    //         // save data to db table menu_recipe_confirmed_data
    //         for ($i=0; $i < count($productIdArr); $i++) {
    //             $insertData = [
    //                 'menu_id' => $menuId,
    //                 'data' => $menuData,
    //                 'recipe_numrow' => $nextNumRow,
    //                 'recipe_group_id' => $recipeGroupId,
    //                 'recipe_id' => $recipeId,
    //                 'product_id' => $productIdArr[$i],
    //                 'product_quantity' => $productQuantityArr[$i],
    //                 'recipes_quantity' => $recipeTotalQuantity,
    //                 'meals_batch_number' => $mealsBatchNumber
    //             ];

    //             DB::table('menu_recipe_confirmed_data')->insert($insertData);
    //         }
    //     }
    // }


    // public function editMenuConfirmRecipe()
    // {
    //     $recipeId = $_GET['recipeId'];

    //     $recipeData = DB::table('product_recipe')
    //         ->join('recipes', 'product_recipe.recipe_id', '=', 'recipes.id')
    //         ->join('product-items', 'product_recipe.product_item_id', '=', 'product-items.id')
    //         ->join('product-item-units', 'product-items.unit_id', '=', 'product-item-units.id')
    //         ->leftJoin('compatible_products', 'product-items.id', '=', 'compatible_products.compatible_products_1_id')
    //         ->leftJoin('storehouse_stocks', 'product_recipe.product_item_id', '=', 'storehouse_stocks.product_id')
    //         ->where('product_recipe.recipe_id', $recipeId)
    //         ->select(
    //             'recipes.title as recipe_title',
    //             'product-items.id as product_id',
    //             'product-items.name as product_name',
    //             DB::raw('sum(product_recipe.quantity) as product_quantity'),
    //             'storehouse_stocks.total_quantity as product_storehouse_quantity',
    //             'product-item-units.name as product_unit',
    //             'compatible_products.compatible_products_2_id as compatible_product_id',
    //             'compatible_products.compatible_products_2_name as compatible_product_name',
    //             DB::raw('sum(product_recipe.quantity * (compatible_products.compatible_products_2_quantity / compatible_products.compatible_products_1_quantity)) as compatible_product_quantity')
    //         )
    //         ->orderBy('product_recipe.id')
    //         ->orderBy('compatible_product_name')
    //         ->groupBy('product_recipe.product_item_id')
    //         ->groupBy('compatible_product_id')
    //         ->get();

    //     $compatibleProductStorehouseQuantity = [];
    //     foreach ($recipeData as $value) {
    //         array_push($compatibleProductStorehouseQuantity, DB::table('storehouse_stocks')->where('product_id', $value->compatible_product_id)->value('total_quantity'));
    //     }

    //     return response()->json(['recipeData' => $recipeData, 'compatibleProductStorehouseQuantity' => $compatibleProductStorehouseQuantity]);
    // }


    // public function editMenuUpdateRecipeRowTotalQuantity()
    // {
    //     $menuId = $_GET['menuId'];
    //     $totalQuantityForMealArr = $_GET['totalQuantityForMealArr'];
    //     $numrowForMealArr = $_GET['numrowForMealArr'];
    //     $action = $_GET['action'];

    //     if ($action == "edit-menu-update-recipe-row-total-quantity" && count($totalQuantityForMealArr) == count($numrowForMealArr)) {
    //         for ($i=0; $i < count($numrowForMealArr); $i++) {
    //             DB::table('menu_recipe_confirmed_data')
    //                 ->where('menu_id', $menuId)
    //                 ->where('recipe_numrow', $numrowForMealArr[$i])
    //                 ->update(['recipes_quantity' => $totalQuantityForMealArr[$i]]);
    //         }
    //     }
    // }


    // public function DBRemoveMenuRecipeConfirmTempData()
    // {
    //     $action = $_GET['action'];

    //     if ($action == "db-remove-menu-recipe-confirm-temp-data") {
    //         DB::table('menu_recipe_confirmed_data_temp')->delete();
    //     }
    // }


    // public function needQuantityProductsForDelivery()
    // {
    //     $productIdArr = $_GET['productIdArr'];
    //     $productQuantityArr = $_GET['productQuantityArr'];
    //     $filterDate = $_GET['filterDate'];
    //     $productsLength = count($productIdArr);

    //     for ($i=0; $i < $productsLength; $i++) {
    //         DB::table('need_quantity_products')->insert(
    //             [
    //                 'date' => $filterDate,
    //                 'product_id' => $productIdArr[$i],
    //                 'product_quantity' => $productQuantityArr[$i]
    //             ]
    //         );
    //     }
    // }


    // public function needQuantityProductsAddAdditionalProduct()
    // {
    //     $additionalNeedProductId = $_GET['additionalNeedProductId'];
    //     $additionalNeedProductQuantity = $_GET['additionalNeedProductQuantity'];
    //     $date = $_GET['date'];

    //     DB::table('need_quantity_products')->insert([
    //         'date' => $date,
    //         'product_id' => $additionalNeedProductId,
    //         'product_quantity' => $additionalNeedProductQuantity,
    //         'additional' => 1
    //     ]);
    // }


    // public function needQuantityProductsDeleteAdditionalProduct()
    // {
    //     $additionalProductId = $_GET['additionalProductId'];

    //     DB::table('need_quantity_products')->where('id', $additionalProductId)->delete();
    // }


    // public function removedQuantityProductsFromStorehouse()
    // {
    //     $productIdArr =  $_GET['productIdArr'];
    //     $removedProductQuantityArr = $_GET['removedProductQuantityArr'];
    //     $date = $_GET['filterDate'];

    //     for ($i=0; $i < count($productIdArr); $i++) {
    //         $remainToBeRemoved = $removedProductQuantityArr[$i];
    //         $residue = $remainToBeRemoved;

    //         $oldDeliveryProductData = DB::table('delivery_product')->where('product_id', $productIdArr[$i])->where('remaining_quantity', '>', 0)->orderBy('id', 'asc')->first();

    //         if ($remainToBeRemoved <= $oldDeliveryProductData->remaining_quantity) {
    //             $deliveryProductNewRemainingQuantity = $oldDeliveryProductData->remaining_quantity - $remainToBeRemoved;
    //             DB::table('delivery_product')->where('id', $oldDeliveryProductData->id)->update(['remaining_quantity' => $deliveryProductNewRemainingQuantity]);
    //             DB::table('removed_quantity_products')->insert(['date' => $date, 'product_id' => $productIdArr[$i], 'removed_quantity' => $removedProductQuantityArr[$i], 'product_batch_number' => $oldDeliveryProductData->product_batch_number]);

    //             $storehouseProductOldQuantity = DB::table('storehouse_stocks')->where('product_id', $productIdArr[$i])->value('total_quantity');
    //             $storehouseProductNewQuantity = $storehouseProductOldQuantity - $removedProductQuantityArr[$i];

    //             DB::table('storehouse_stocks')->where('product_id', $productIdArr[$i])->update(['total_quantity' => $storehouseProductNewQuantity]);
    //         } else {
    //             $availability;
    //             $residue = $residue;
    //             $totalRemovedQuantity = 0;

    //             do {
    //                 $deliveryProductData = DB::table('delivery_product')->where('product_id', $productIdArr[$i])->where('remaining_quantity', '>', 0)->orderBy('id', 'asc')->first();
    //                 $availability = $deliveryProductData->remaining_quantity;
    //                 $remainToBeRemoved = abs($residue);

    //                 if ($availability < $remainToBeRemoved) {
    //                     DB::table('delivery_product')->where('id', $deliveryProductData->id)->update(['remaining_quantity' => 0]);
    //                     DB::table('removed_quantity_products')->insert(['date' => $date, 'product_id' => $productIdArr[$i], 'removed_quantity' => $deliveryProductData->remaining_quantity, 'product_batch_number' => $deliveryProductData->product_batch_number]);

    //                     $totalRemovedQuantity = $totalRemovedQuantity + $deliveryProductData->remaining_quantity;
    //                 } else {
    //                     DB::table('delivery_product')->where('id', $deliveryProductData->id)->update(['remaining_quantity' => ($availability - $remainToBeRemoved)]);
    //                     DB::table('removed_quantity_products')->insert(['date' => $date, 'product_id' => $productIdArr[$i], 'removed_quantity' => $remainToBeRemoved, 'product_batch_number' => $deliveryProductData->product_batch_number]);

    //                     $totalRemovedQuantity = $totalRemovedQuantity + $remainToBeRemoved;
    //                 }

    //                 $residue = $remainToBeRemoved - $availability;
    //             } while ($residue > 0);

    //             $storehouseProductOldQuantity = DB::table('storehouse_stocks')->where('product_id', $productIdArr[$i])->value('total_quantity');
    //             $storehouseProductNewQuantity = $storehouseProductOldQuantity - $totalRemovedQuantity;

    //             DB::table('storehouse_stocks')->where('product_id', $productIdArr[$i])->update(['total_quantity' => $storehouseProductNewQuantity]);
    //         }
    //     }

    //     // Add batch number on products used in nenu in menu_recipe_confirmed_data after removed of storehouse
    //     $removedProducts = DB::table('removed_quantity_products')->where('date', $date)->where('used', 0)->get();
    //     for ($i=0; $i < $removedProducts->count(); $i++) {
    //         $ProductQuantityResidue = $removedProducts[$i]->removed_quantity;
    //         $index = 0;
    //         do {
    //             $confirmedMenuRecipeProductsWithEmptyBatchNumber = DB::table('menu_recipe_confirmed_data')->where('data', $date)->where('product_id', $removedProducts[$i]->product_id)->where('product_batch_number', '')->get();
    //             if ($confirmedMenuRecipeProductsWithEmptyBatchNumber->count() > 0 && $confirmedMenuRecipeProductsWithEmptyBatchNumber->count() > $index) {
    //                 DB::table('removed_quantity_products')->where('id', $removedProducts[$i]->id)->update(['used' => 1]);
    //                 $ProductQuantityResidue = $ProductQuantityResidue - ($confirmedMenuRecipeProductsWithEmptyBatchNumber[$index]->product_quantity * $confirmedMenuRecipeProductsWithEmptyBatchNumber[$index]->recipes_quantity);
    //                 DB::table('menu_recipe_confirmed_data')->where('id', $confirmedMenuRecipeProductsWithEmptyBatchNumber[$index]->id)->update(['product_batch_number' => $removedProducts[$i]->product_batch_number]);
    //             }
    //             else {
    //                 $ProductQuantityResidue = 0;
    //             }
    //             $index++;
    //         } while ($ProductQuantityResidue > 0);

    //         // If have product with empty batch number in menu_recipe_confirmed_data it adds
    //         if (DB::table('menu_recipe_confirmed_data')->where('data', $date)->where('product_id', $removedProducts[$i]->product_id)->where('product_batch_number', '')->count() > 0) {
    //             $mostProduct = DB::table('removed_quantity_products')->where('date', $date)->where('product_id', $removedProducts[$i]->product_id)->orderBy('used')->orderBy('removed_quantity', 'desc')->first();
    //             DB::table('menu_recipe_confirmed_data')->where('data', $date)->where('product_id', $removedProducts[$i]->product_id)->where('product_batch_number', '')->update(['product_batch_number' => $mostProduct->product_batch_number]);
    //         }
    //     }
    // }


    // public function getRecipesFromGroup()
    // {
    //     $recipeGroupId = $_GET['recipeGroupId'];
    //     $recipes = DB::table('recipes')->where('group_id', $recipeGroupId)->orderBy('title')->get();

    //     return response()->json($recipes);
    // }


    // public function deliveryCreateGetProviderCarNumber()
    // {
    //     $providerId = $_GET["providerId"];

    //     $vehicleRegistrationNumber = DB::table('deliveries')->where('provider_id', $providerId)->orderBy('id', 'desc')->value('vehicle_registration_number');

    //     return response()->json(['vehicleRegistrationNumber' => $vehicleRegistrationNumber]);
    // }


    // public function deliveryCreateGetProductPrice()
    // {
    //     $productId = $_GET["productId"];

    //     $lastDeliveryProductData = DB::table('delivery_product')->where('product_id', $productId)->orderBy('id', 'desc')->first();

    //     return response()->json(['lastDeliveryProductData' => $lastDeliveryProductData]);
    // }


    // public function deliveryCreateIsExistDelivery()
    // {
    //     $deliveryProviderId = $_GET["deliveryProviderId"];
    //     $deliveryDocumentNumber = $_GET["deliveryDocumentNumber"];

    //     $isExistDelivery = DB::table('deliveries')
    //         ->where('provider_id', $deliveryProviderId)
    //         ->where('document_number', $deliveryDocumentNumber)
    //         ->get();

    //     if ($isExistDelivery->count() >= 1) {
    //         return response()->json(0);
    //     } else {
    //         return response()->json(1);
    //     }
    // }


    // public function deliveryShowAddNewProduct()
    // {
    //     $deliveryId =  $_GET["delivery-id"];
    //     $productId = $_GET["product-id"];
    //     $productUnitId = $_GET["product-unit-id"];
    //     $productQuantity = $_GET["product-quantity"];
    //     $productUnitPrice = $_GET["product-unit-price"];
    //     $productExpiryDate = $_GET["product-expiry-date"];
    //     $productBatchNumber = $_GET["product-batch-number"];
    //     $productStorageConditions = $_GET["product-storage-conditions"];
    //     $productNote = $_GET["product-note"];
    //     $action = $_GET['action'];

    //     if ($action == "add-new-product-to-show-delivery") {
    //         $insertData = [
    //             'delivery_id' => $deliveryId,
    //             'product_id' => $productId,
    //             'product_unit_id' => $productUnitId,
    //             'product_quantity' => $productQuantity,
    //             'product_unit_price' => $productUnitPrice,
    //             'product_expiry_date' => $productExpiryDate,
    //             'product_batch_number' => $productBatchNumber,
    //             'product_storage_conditions' => $productStorageConditions,
    //             'product_note' => $productNote,
    //             'remaining_quantity' => $productQuantity
    //         ];
    //         DB::table('delivery_product')->insert($insertData);

    //         // add/update to storehouse
    //         $itExist = DB::table('storehouse_stocks')->where('product_id', $productId)->first();

    //         if ($itExist !== null) {
    //             $oldProductQuantity = DB::table('storehouse_stocks')->where('product_id', $productId)->value('total_quantity');
    //             $oldProductUnitPrice = DB::table('storehouse_stocks')->where('product_id', $productId)->value('average_unit_price');
    //             $newProductQuantity = $productQuantity;
    //             $savedNewProductQuantity = $oldProductQuantity + $newProductQuantity;
    //             $savedNewProductUnitPrice = (($oldProductQuantity * $oldProductUnitPrice) + ($newProductQuantity * $productUnitPrice)) / ($oldProductQuantity + $newProductQuantity);

    //             DB::table('storehouse_stocks')
    //                 ->where('product_id', $productId)
    //                 ->update([
    //                     'total_quantity' => $savedNewProductQuantity,
    //                     'average_unit_price' => $savedNewProductUnitPrice
    //                 ]);
    //         } else {
    //             DB::table('storehouse_stocks')->insert([
    //                 [
    //                     'product_id' => $productId,
    //                     'total_quantity' => $productQuantity,
    //                     'average_unit_price' => $productUnitPrice
    //                 ]
    //             ]);
    //         }
    //     }
    // }


    // public function deliveryShowInlineEditProduct()
    // {
    //     $editedId =  $_GET["editedId"];
    //     $editedProductId =  $_GET["editedProductId"];
    //     $editedProductOldQuantity = $_GET["editedProductOldQuantity"];
    //     $editedProductNewQuantity = $_GET["editedProductNewQuantity"];
    //     $editedProductOldUnitPrice = $_GET["editedProductOldUnitPrice"];
    //     $editedProductNewUnitPrice = $_GET["editedProductNewUnitPrice"];
    //     $editedProductExpiryDate = $_GET["editedProductExpiryDate"];
    //     $editedProductBatchNumber = $_GET["editedProductBatchNumber"];
    //     $editedProductStorageConditions = $_GET["editedProductStorageConditions"];
    //     $editedProductNote = $_GET["editedProductNote"];
    //     $action = $_GET['action'];

    //     $oldProductStorehouseTotalQuantity = DB::table('storehouse_stocks')->where('product_id', $editedProductId)->value('total_quantity');
    //     $oldProductStorehouseAverageUnitPrice = DB::table('storehouse_stocks')->where('product_id', $editedProductId)->value('average_unit_price');

    //     $editedProductQuantityDifference = $editedProductNewQuantity - $editedProductOldQuantity;
    //     $newProductStorehouseTotalQuantity = $oldProductStorehouseTotalQuantity + $editedProductQuantityDifference;

    //     $oldNotErrorProductStorehouseTotalQuantity = $oldProductStorehouseTotalQuantity - $editedProductOldQuantity;
    //     $oldNotErrorProductStorehouseAverageUnitPrice = (($oldProductStorehouseTotalQuantity * $oldProductStorehouseAverageUnitPrice) - ($editedProductOldQuantity * $editedProductOldUnitPrice)) / ($oldProductStorehouseTotalQuantity - $editedProductOldQuantity);

    //     if ($editedProductOldUnitPrice !== $editedProductNewUnitPrice) {
    //         $newProductStorehouseAverageUnitPrice = (($oldNotErrorProductStorehouseTotalQuantity * $oldNotErrorProductStorehouseAverageUnitPrice) + ($editedProductNewQuantity * $editedProductNewUnitPrice)) / ($oldNotErrorProductStorehouseTotalQuantity + $editedProductNewQuantity);
    //     } else {
    //         $newProductStorehouseAverageUnitPrice = $oldProductStorehouseAverageUnitPrice;
    //     }

    //     if ($action == "edit-product-in-show-delivery") {
    //         $updateData = [
    //             'product_quantity' => $editedProductNewQuantity,
    //             'product_unit_price' => $editedProductNewUnitPrice,
    //             'product_expiry_date' => $editedProductExpiryDate,
    //             'product_batch_number' => $editedProductBatchNumber,
    //             'product_storage_conditions' => $editedProductStorageConditions,
    //             'product_note' => $editedProductNote
    //         ];

    //         // edit deliveri product data
    //         DB::table('delivery_product')->where('id', $editedId)->update($updateData);

    //         // edit storehouse product quantity and unit price
    //         DB::table('storehouse_stocks')->where('product_id', $editedProductId)->update([
    //             'total_quantity' => $newProductStorehouseTotalQuantity,
    //             'average_unit_price' => $newProductStorehouseAverageUnitPrice
    //         ]);

    //         // edit remaining_quantity
    //         $oldProductRemainingQuantity = DB::table('delivery_product')->where('id', $editedId)->value('remaining_quantity');
    //         $newProductRemainingQuantity = $oldProductRemainingQuantity + $editedProductQuantityDifference;
    //         DB::table('delivery_product')->where('id', $editedId)->update([
    //             'remaining_quantity' => $newProductRemainingQuantity
    //         ]);
    //     }
    // }


    // public function deliveryShowDeleteProduct()
    // {
    //     $id =  $_GET["id"];
    //     $action = $_GET['action'];

    //     $deliveryProduct = DB::table('delivery_product')->where('id', $id)->get();

    //     $deliveryProductId = $deliveryProduct[0]->product_id;
    //     $deliveryProductQuantity = $deliveryProduct[0]->product_quantity;
    //     $deliveryProductUnitPrice = $deliveryProduct[0]->product_unit_price;

    //     $productStorehouse = DB::table('storehouse_stocks')->where('product_id', $deliveryProductId)->get();

    //     $storehouseProductQuantity = $productStorehouse[0]->total_quantity;
    //     $storehouseProductAverageUnitPrice = $productStorehouse[0]->average_unit_price;

    //     $newStorehouseProductQuantity;
    //     $newStorehouseProductAverageUnitPrice;

    //     if ($deliveryProductQuantity === $storehouseProductQuantity) {
    //         $newStorehouseProductQuantity = 0;
    //         $newStorehouseProductAverageUnitPrice = 0;

    //         // delete storehouse product with quantity and unit price
    //         DB::table('storehouse_stocks')->where('product_id', $deliveryProductId)->delete();

    //         // delete deliveri product data
    //         DB::table('delivery_product')->where('id', $id)->delete();
    //     } else {
    //         $newStorehouseProductQuantity = $storehouseProductQuantity - $deliveryProductQuantity;
    //         $newStorehouseProductAverageUnitPrice = (($storehouseProductQuantity * $storehouseProductAverageUnitPrice) - ($deliveryProductQuantity * $deliveryProductUnitPrice)) / ($storehouseProductQuantity - $deliveryProductQuantity);

    //         // edit storehouse product quantity and unit price
    //         DB::table('storehouse_stocks')->where('product_id', $deliveryProductId)->update([
    //             'total_quantity' => $newStorehouseProductQuantity,
    //             'average_unit_price' => $newStorehouseProductAverageUnitPrice
    //         ]);

    //         // delete deliveri product data
    //         DB::table('delivery_product')->where('id', $id)->delete();
    //     }
    // }


    // public function deliveryShowInlineEditHeaders()
    // {
    //     $deliveryId =  $_GET["deliveryId"];
    //     $newDeliveryDate =  $_GET["newDeliveryDate"];
    //     $newDeliveryProvider =  $_GET["newDeliveryProvider"];
    //     $newDeliveryVehicleRegistrationNumber =  $_GET["newDeliveryVehicleRegistrationNumber"];

    //     $updateData = [
    //         'date' => $newDeliveryDate,
    //         'provider_id' => $newDeliveryProvider,
    //         'vehicle_registration_number' => $newDeliveryVehicleRegistrationNumber
    //     ];

    //     // edit delivery product data
    //     DB::table('deliveries')->where('id', $deliveryId)->update($updateData);
    // }


    // public function menuObjectsGroupShowGetCustomerObjectsFromCustomers()
    // {
    //     $selectedCustomerId = $_GET['selectedCustomerId'];

    //     $connectedCustomerObjects = DB::table('customer-objects')->where('customer_id', $selectedCustomerId)->orderBy('name')->get();

    //     return response()->json(['connectedCustomerObjects' => $connectedCustomerObjects]);
    // }


    // public function menuObjectsGroupShowAddNewObject()
    // {
    //     $menuObjectGroupId =  $_GET["menuObjectGroupId"];
    //     $customerObject =  $_GET["customerObject"];
    //     $action = $_GET['action'];

    //     $isExists = DB::table('menu_objects_groups_customer_objects')
    //         ->where('menu_object_group_id', $menuObjectGroupId)
    //         ->where('customer_object_id', $customerObject)
    //         ->count();

    //     if ($action == "add-new-object-to-show-menu-objects-group" && $isExists === 0) {
    //         $data = [
    //             'menu_object_group_id' => $menuObjectGroupId,
    //             'customer_object_id' => $customerObject
    //         ];
    //         DB::table('menu_objects_groups_customer_objects')->insert($data);
    //     }
    // }


    // public function menuObjectsGroupShowDeleteObject()
    // {
    //     $rowIdForDelete =  $_GET["rowIdForDelete"];
    //     $action = $_GET['action'];

    //     if ($action == "delete-object-to-show-menu-objects-group") {
    //         DB::table('menu_objects_groups_customer_objects')->where('id', $rowIdForDelete)->delete();
    //     }
    // }


    // public function validateAndCreateCompatibleProduct()
    // {
    //     $mainProductId = $_GET['mainProductId'];
    //     $mainProductQuantity = $_GET['mainProductQuantity'];
    //     $compatibleProductId = $_GET['compatibleProductId'];
    //     $compatibleProductQuantity = $_GET['compatibleProductQuantity'];

    //     $isExists = DB::table('compatible_products')
    //         ->where('compatible_products_1_id', $mainProductId)
    //         ->where('compatible_products_2_id', $compatibleProductId)
    //         ->count();

    //     if ($isExists === 0) {
    //         $mainProductName = DB::table('product-items')->where('id', $mainProductId)->value('name');
    //         $compatibleProductName = DB::table('product-items')->where('id', $compatibleProductId)->value('name');

    //         $mainProductUnitName = DB::table('product-items')
    //             ->join('product-item-units', 'product-items.unit_id', '=', 'product-item-units.id')
    //             ->where('product-items.id', $mainProductId)
    //             ->value('product-item-units.name');
    //         $compatibleProductUnitName = DB::table('product-items')
    //             ->join('product-item-units', 'product-items.unit_id', '=', 'product-item-units.id')
    //             ->where('product-items.id', $compatibleProductId)
    //             ->value('product-item-units.name');

    //         // save to DB
    //         DB::table('compatible_products')->insert(
    //             [
    //                 'compatible_products_1_id' => $mainProductId,
    //                 'compatible_products_1_name' => $mainProductName,
    //                 'compatible_products_1_quantity' => $mainProductQuantity,
    //                 'compatible_products_1_unit_name' => $mainProductUnitName,
    //                 'compatible_products_2_id' => $compatibleProductId,
    //                 'compatible_products_2_name' => $compatibleProductName,
    //                 'compatible_products_2_quantity' => $compatibleProductQuantity,
    //                 'compatible_products_2_unit_name' => $compatibleProductUnitName
    //             ]
    //         );
    //     }

    //     return response()->json(['isExists' => $isExists]);
    // }


    // public function selledProductsCreateAndShowModalGetProducts()
    // {
    //     $selectedProductId = $_GET['selectedProductId'];

    //     // Get all same products from storehouse but with different batch numbers
    //     $selledProductsAllIdenticalProducts = DB::table('delivery_product')
    //         ->join('storehouse_stocks', 'delivery_product.product_id', '=', 'storehouse_stocks.product_id')
    //         ->join('product-items', 'delivery_product.product_id', '=', 'product-items.id')
    //         ->join('product-item-units', 'product-items.unit_id', '=', 'product-item-units.id')
    //         ->where('delivery_product.product_id', $selectedProductId)
    //         ->where('delivery_product.remaining_quantity', '>', 0)
    //         ->select(
    //             'delivery_product.id as id',
    //             'delivery_product.product_id as product_id',
    //             'product-items.name as product_name',
    //             'delivery_product.product_batch_number as product_batch_number',
    //             'delivery_product.remaining_quantity as product_total_quantity',
    //             'product-item-units.name as product_unit_name',
    //             'storehouse_stocks.average_unit_price as product_storehouse_average_unit_price'
    //         )
    //         ->get();

    //     return response()->json(['selledProductsAllIdenticalProducts' => $selledProductsAllIdenticalProducts]);
    // }


    // public function selledProductsCreateAddProductsToTempData()
    // {
    //     $deliveryProductIdArr = $_GET["modalDeliveryProductIdArr"];
    //     $productIdArr = $_GET["modalProductIdArr"];
    //     $productBatchNumberArr = $_GET["modalProductBatchNumberArr"];
    //     $productQuantityArr = $_GET["modalProductQuantityArr"];

    //     for ($i=0; $i < count($deliveryProductIdArr); $i++) {
    //         DB::table('selled_products_list_temp_data')->insert([
    //             'delivery_product_id' => $deliveryProductIdArr[$i],
    //             'product_id' => $productIdArr[$i],
    //             'product_batch_number' => $productBatchNumberArr[$i],
    //             'product_quantity' => $productQuantityArr[$i]
    //         ]);
    //     }
    // }


    // public function selledProductsCreateDeleteOneProductsFromTempData()
    // {
    //     $selledProductTempDataId = $_GET["selledProductTempDataId"];

    //     DB::table('selled_products_list_temp_data')->where('id', $selledProductTempDataId)->delete();
    // }


    // public function selledProductsCreateDeleteAllProductsFromTempData()
    // {
    //     DB::table('selled_products_list_temp_data')->delete();
    // }


    // public function selledProductsShowInlineEditProduct()
    // {
    //     $editedId =  $_GET["editedId"];
    //     $editedDeliveryProductId = $_GET["editedDeliveryProductId"];
    //     $editedProductId =  $_GET["editedProductId"];
    //     $editedProductOldQuantity = $_GET["editedProductOldQuantity"];
    //     $editedProductNewQuantity = $_GET["editedProductNewQuantity"];

    //     $oldProductStorehouseTotalQuantity = DB::table('storehouse_stocks')->where('product_id', $editedProductId)->value('total_quantity');

    //     $editedProductQuantityDifference = $editedProductNewQuantity - $editedProductOldQuantity;
    //     $newProductStorehouseTotalQuantity = $oldProductStorehouseTotalQuantity - $editedProductQuantityDifference;

    //     $oldEditedDeliveryProductsProductRemainingQuantity = DB::table('delivery_product')->where('id', $editedDeliveryProductId)->value('remaining_quantity');
    //     $newEditedDeliveryProductsProductRemainingQuantity = $oldEditedDeliveryProductsProductRemainingQuantity - $editedProductQuantityDifference;

    //     if ($newProductStorehouseTotalQuantity < 0) {
    //         return response()->json(['message' => 'В склада няма достатъчна наличност.']);
    //     } else {
    //         if ($newEditedDeliveryProductsProductRemainingQuantity < 0) {
    //             return response()->json(['message' => 'От този продукт с този партиден номер няма достатъчна наличност.']);
    //         } elseif ($newEditedDeliveryProductsProductRemainingQuantity == 0) {
    //             return back();
    //         } else {
    //             // edit storehouse product quantity
    //             DB::table('storehouse_stocks')->where('product_id', $editedProductId)->update([
    //                 'total_quantity' => $newProductStorehouseTotalQuantity
    //             ]);

    //             // edit delivery_product remaining_quantity
    //             DB::table('delivery_product')->where('id', $editedDeliveryProductId)->update(['remaining_quantity' => $newEditedDeliveryProductsProductRemainingQuantity]);

    //             // edit selled-products product data
    //             DB::table('selled_products_list')->where('id', $editedId)->update([
    //                 'product_quantity' => $editedProductNewQuantity
    //             ]);
    //         }
    //     }
    // }


    // public function selledProductsShowDeleteProduct()
    // {
    //     $deletedId =  $_GET["deletedId"];
    //     $deletedDeliveryProductId = $_GET["deletedDeliveryProductId"];
    //     $deletedProductId =  $_GET["deletedProductId"];
    //     $deletedProductQuantity =  $_GET["deletedProductQuantity"];

    //     $oldStorehouseProductQuantity = DB::table('storehouse_stocks')->where('product_id', $deletedProductId)->value('total_quantity');
    //     $newStorehouseProductQuantity = $oldStorehouseProductQuantity + $deletedProductQuantity;

    //     $oldDeliveryProductsProductRemainingQuantity = DB::table('delivery_product')->where('id', $deletedDeliveryProductId)->value('remaining_quantity');
    //     $newDeliveryProductsProductRemainingQuantity = $oldDeliveryProductsProductRemainingQuantity + $deletedProductQuantity;

    //     // edit deleted product quantity from selled_products_list to storehouse
    //     DB::table('storehouse_stocks')->where('product_id', $deletedProductId)->update(['total_quantity' => $newStorehouseProductQuantity]);

    //     // edit delivery_product remaining_quantity
    //     DB::table('delivery_product')->where('id', $deletedDeliveryProductId)->update(['remaining_quantity' => $newDeliveryProductsProductRemainingQuantity]);

    //     // delete selled-products product data
    //     DB::table('selled_products_list')->where('id', $deletedId)->delete();
    // }


    // public function selledProductsShowAddNewProduct()
    // {
    //     $selledProductInvoiceId =  $_GET["selledProductInvoiceId"];
    //     $selledProductDeliveryProductIdArr = $_GET["modalDeliveryProductIdArr"];
    //     $selledProductProductIdArr = $_GET["modalProductIdArr"];
    //     $selledProductProductBatchNumberArr = $_GET["modalProductBatchNumberArr"];
    //     $selledProductProductQuantityArr = $_GET["modalProductQuantityArr"];

    //     for ($i=0; $i < count($selledProductProductIdArr) ; $i++) {
    //         $insertData = [
    //             'invoice_id' => $selledProductInvoiceId,
    //             'delivery_product_id' => $selledProductDeliveryProductIdArr[$i],
    //             'product_id' => $selledProductProductIdArr[$i],
    //             'product_batch_number' => $selledProductProductBatchNumberArr[$i],
    //             'product_quantity' => $selledProductProductQuantityArr[$i]
    //         ];
    //         DB::table('selled_products_list')->insert($insertData);

    //         // update product storehouse quantity
    //         $oldProductQuantity = DB::table('storehouse_stocks')->where('product_id', $selledProductProductIdArr[$i])->value('total_quantity');
    //         $newProductStorehouseQuantity = $oldProductQuantity - $selledProductProductQuantityArr[$i];
    //         DB::table('storehouse_stocks')->where('product_id', $selledProductProductIdArr[$i])->update(['total_quantity' => $newProductStorehouseQuantity]);

    //         // update product delivery remaining quantity
    //         $oldDeliveryProductRemainingQuantity = DB::table('delivery_product')->where('id', $selledProductDeliveryProductIdArr[$i])->value('remaining_quantity');
    //         $newDeliveryProductRemainingQuantity = $oldDeliveryProductRemainingQuantity - $selledProductProductQuantityArr[$i];
    //         DB::table('delivery_product')->where('id', $selledProductDeliveryProductIdArr[$i])->update(['remaining_quantity' => $newDeliveryProductRemainingQuantity]);
    //     }
    // }


    // public function selledProductsShowInlineEditHeaders()
    // {
    //     $selledProductsInvoiceId =  $_GET["selledProductsInvoiceId"];
    //     $newSelledProductsInvoiceDate =  $_GET["newSelledProductsInvoiceDate"];
    //     $newSelledProductsInvoiceCustomer =  $_GET["newSelledProductsInvoiceCustomer"];

    //     DB::table('selled_products_invoice')->where('id', $selledProductsInvoiceId)->update([
    //         'date' => $newSelledProductsInvoiceDate,
    //         'customer_id' => $newSelledProductsInvoiceCustomer
    //     ]);
    // }

}
