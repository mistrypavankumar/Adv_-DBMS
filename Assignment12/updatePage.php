<!-- 
    Name: Pavan Kumar Mistry
    Date: 03-12-2023
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <main class="w-full relative">
        <div>
            <div class="w-[92%] md:w-[40%] mx-auto">
                <h1 class="text-center text-3xl font-bold py-6">Enter Product Details</h1>

                <div class="w-full flex items-center justify-between border-2 p-6 rounded-lg">
                    <button class="py-2 px-3 rounded-lg bg-blue-500 hover:bg-blue-600 duration-500 text-white text-center" id="create-button">Create Record</button>
                    <button class="py-2 px-3 rounded-lg bg-green-500 hover:bg-green-600 duration-500 text-white text-center" id="edit-button">Edit Record</button>
                    <button class="py-2 px-3 rounded-lg bg-red-500 hover:bg-red-600 duration-500 text-white text-center" id="delete-button">Delete Record</button>
                </div>

                <form action="create.php" method="POST" id="product-form" class="p-6 border-2 rounded-lg mt-4 flex flex-col gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="productCode">Product Code</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="text" placeholder="Enter Product Code" name="productCode" required required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="productName">Product Name</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="text" placeholder="Enter Product Name" name="productName" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="productLine">Product Line</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="text" placeholder="Enter Product Line" name="productLine" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="productScale">Product Scale</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="text" placeholder="Enter Product Scale" name="productScale" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="productVendor">Product Vendor</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="text" placeholder="Enter Product Vendor" name="productVendor" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="productDescription">Product Description</label>
                        <textarea class="border-2 rounded-lg px-3 py-2 outline-none" placeholder="Enter Product Description" name="productDescription"></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="quantityInStock">Quantity in Stock</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="number" placeholder="Enter Quantity in Stock" name="quantityInStock" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="buyPrice">Buy Price</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="number" step="0.01" placeholder="Enter Buy Price" name="buyPrice" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="MSRP">MSRP</label>
                        <input class="border-2 rounded-lg px-3 py-2 outline-none" type="number" step="0.01" placeholder="Enter MSRP" name="MSRP" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <input name="action" onclick="setAction('save')" id="saveButton" class="md:w-[200px] md:mx-auto mt-5 border-2 rounded-lg px-3 py-2 outline-none bg-blue-500 hover:bg-blue-600 duration-500 text-white cursor-pointer" type="submit" value="Submit" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <input name="action" onclick="setAction('update')" id="updateButton" class="md:w-[200px] md:mx-auto mt-5 border-2 rounded-lg px-3 py-2 outline-none bg-green-500 hover:bg-green-600 duration-500 text-white cursor-pointer" type="submit" value="Update" required />
                    </div>
                </form>
            </div>
        </div>
    </main>


    <script>
        function setAction(actionType) {
            var form = document.getElementById('product-form');
            if (actionType === 'save') {
                form.action = 'create.php';
            } else if (actionType === 'update') {
                form.action = 'update.php';
            }
        }
    </script>
</body>

</html>